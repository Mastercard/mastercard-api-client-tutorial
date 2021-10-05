package com.mastercard.developer.mdes_digital_enablement_client.api;

import com.mastercard.developer.encryption.FieldLevelEncryptionConfig;
import com.mastercard.developer.encryption.FieldLevelEncryptionConfigBuilder;
import com.mastercard.developer.interceptors.OkHttpFieldLevelEncryptionInterceptor;
import com.mastercard.developer.interceptors.OkHttpOAuth1Interceptor;
import com.mastercard.developer.mdes_digital_enablement_client.ApiClient;
import com.mastercard.developer.mdes_digital_enablement_client.model.*;
import com.mastercard.developer.utils.AuthenticationUtils;
import com.mastercard.developer.utils.EncryptionUtils;
import org.junit.Assert;
import org.junit.BeforeClass;
import org.junit.Test;

import java.security.PrivateKey;
import java.security.cert.Certificate;

import static com.mastercard.developer.encryption.FieldLevelEncryptionConfig.FieldValueEncoding;

/**
 * API tests for TokenizeApi
 */
public class TokenizeApiTest {

    //
    // TODO: add your credentials here or those dummy values will cause an INVALID_CLIENT_ID error to be returned 😀
    //
    private final static String consumerKey = "000000000000000000000000000000000000000000000000!000000000000000000000000000000000000000000000000";
    private final static String signingKeyAlias = "fake-key";
    private final static String signingKeyPassword = "fakepassword";
    private final static String signingKeyPkcs12FilePath = "src/test/resources/fake-signing-key.p12";

    // Encryption keys to be used in Sandbox (see: https://mstr.cd/2T53Ltv)
    private final static String encryptionCertificateFilePath = "src/test/resources/digital-enablement-sandbox-encryption-key.crt";
    private final static String decryptionKeyFilePath = "src/test/resources/digital-enablement-sandbox-decryption-key.key";

    private static PrivateKey signingKey;
    private static FieldLevelEncryptionConfig config;

    @BeforeClass
    public static void before() throws Exception {
        Certificate encryptionCertificate = EncryptionUtils.loadEncryptionCertificate(encryptionCertificateFilePath);
        PrivateKey decryptionKey = EncryptionUtils.loadDecryptionKey(decryptionKeyFilePath);
        signingKey = AuthenticationUtils.loadSigningKey(signingKeyPkcs12FilePath, signingKeyAlias, signingKeyPassword);
        config = FieldLevelEncryptionConfigBuilder.aFieldLevelEncryptionConfig()
                .withEncryptionPath("$.fundingAccountInfo.encryptedPayload.encryptedData", "$.fundingAccountInfo.encryptedPayload")
                .withEncryptionPath("$.encryptedPayload.encryptedData", "$.encryptedPayload")
                .withDecryptionPath("$.tokenDetail", "$.tokenDetail.encryptedData")
                .withDecryptionPath("$.encryptedPayload", "$.encryptedPayload.encryptedData")
                .withEncryptionCertificate(encryptionCertificate)
                .withDecryptionKey(decryptionKey)
                .withOaepPaddingDigestAlgorithm("SHA-512")
                .withEncryptedValueFieldName("encryptedData")
                .withEncryptedKeyFieldName("encryptedKey")
                .withIvFieldName("iv")
                .withOaepPaddingDigestAlgorithmFieldName("oaepHashingAlgorithm")
                .withEncryptionCertificateFingerprintFieldName("publicKeyFingerprint")
                .withFieldValueEncoding(FieldValueEncoding.HEX)
                .build();
    }

    @Test
    public void createTokenizeTest() throws Exception {
        ApiClient client = new ApiClient();
        client.setBasePath("https://sandbox.api.mastercard.com/mdes");
        client.setDebugging(true);

        client.setHttpClient(client.getHttpClient()
                .newBuilder()
                .addInterceptor(new OkHttpFieldLevelEncryptionInterceptor(config))
                .addInterceptor(new OkHttpOAuth1Interceptor(consumerKey, signingKey))
                .build()
        );

        TokenizeApi api = new TokenizeApi(client);
        TokenizeRequestSchema tokenizeRequestSchema = buildTokenizeRequestSchema();
        TokenizeResponseSchema response = api.createTokenize(tokenizeRequestSchema);
        Assert.assertNotNull(response);
        Assert.assertEquals("APPROVED", response.getDecision());
        assert response.getTokenDetail() != null;
        assert response.getTokenDetail().getEncryptedData() != null;
        Assert.assertEquals("500181d9f8e0629211e3949a08002", response.getTokenDetail().getEncryptedData().getPaymentAccountReference());
    }

    private static TokenizeRequestSchema buildTokenizeRequestSchema() {
        return new TokenizeRequestSchema()
                .requestId("123456")
                .responseHost("site1.your-server.com")
                .taskId("123456")
                .tokenType("CLOUD")
                .fundingAccountInfo(buildFundingAccountInfo())
                .consumerLanguage("en")
                .tokenizationAuthenticationValue("RHVtbXkgYmFzZSA2NCBkYXRhIC0gdGhpcyBpcyBub3QgYSByZWFsIFRBViBleGFtcGxl")
                .tokenRequestorId("98765432101");
    }

    private static FundingAccountInfo buildFundingAccountInfo() {
        return new FundingAccountInfo()
                .encryptedPayload(buildFundingAccountInfoEncryptedPayload());
    }

    private static FundingAccountInfoEncryptedPayload buildFundingAccountInfoEncryptedPayload() {
        return new FundingAccountInfoEncryptedPayload()
                .encryptedData(buildFundingAccountData());
    }

    private static FundingAccountData buildFundingAccountData() {
        return new FundingAccountData()
                .accountHolderData(buildAccountHolderData())
                .source("ACCOUNT_ON_FILE")
                .cardAccountData(buildCardAccountDataInbound());
    }

    private static CardAccountDataInbound buildCardAccountDataInbound() {
        return new CardAccountDataInbound()
                .accountNumber("5123456789012345")
                .securityCode("123")
                .expiryYear("25")
                .expiryMonth("09");
    }

    private static AccountHolderData buildAccountHolderData() {
        return new AccountHolderData()
                .accountHolderAddress(buildBillingAddress())
                .accountHolderName("John Doe");
    }

    private static BillingAddress buildBillingAddress() {
        return new BillingAddress()
                .line1("100 1st Street")
                .line2("Apt. 4B")
                .city("St. Louis")
                .countrySubdivision("MO")
                .postalCode("61000")
                .country("USA");
    }
}
