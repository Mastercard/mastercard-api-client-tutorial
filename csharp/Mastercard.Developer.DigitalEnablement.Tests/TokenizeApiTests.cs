using System;
using Mastercard.Developer.ClientEncryption.Core.Encryption;
using Mastercard.Developer.ClientEncryption.Core.Utils;
using Mastercard.Developer.ClientEncryption.RestSharp.Interceptors;
using Mastercard.Developer.OAuth1Signer.Core.Utils;
using Mastercard.Developer.OAuth1Signer.RestSharp.Authenticators;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using Mastercard.Developer.DigitalEnablement.Client.Api;
using Mastercard.Developer.DigitalEnablement.Client.Client;
using Mastercard.Developer.DigitalEnablement.Client.Model;
using System.Security.Cryptography.X509Certificates;
using static Mastercard.Developer.ClientEncryption.Core.Encryption.FieldLevelEncryptionConfig;

namespace Mastercard.Developer.DigitalEnablement.Tests
{
    [TestClass]
    public class TokenizeApiTest
    {
        //
        // TODO: update me!
        //
        private const string ConsumerKey = "000000000000000000000000000000000000000000000000!000000000000000000000000000000000000000000000000";
        private const string SigningKeyAlias = "fake-key";
        private const string SigningKeyPassword = "fakepassword";
        private const string SigningKeyPkcs12FilePath = "./_Resources/fake-signing-key.p12";
        private const string EncryptionCertificateFilePath = "./_Resources/digital-enablement-sandbox-encryption-key.crt";
        private const string DecryptionKeyFilePath = "./_Resources/digital-enablement-sandbox-decryption-key.key";

        [ClassInitialize]
        public static void Before(TestContext context)
        {
            SetupApiClient();
        }

        private static void SetupApiClient()
        {
            var signingKey = AuthenticationUtils.LoadSigningKey(SigningKeyPkcs12FilePath, SigningKeyAlias, SigningKeyPassword, X509KeyStorageFlags.MachineKeySet | X509KeyStorageFlags.Exportable);
            var encryptionCertificate = EncryptionUtils.LoadEncryptionCertificate(EncryptionCertificateFilePath);
            var decryptionKey = EncryptionUtils.LoadDecryptionKey(DecryptionKeyFilePath);

            var fieldLevelEncryptionConfig = FieldLevelEncryptionConfigBuilder.AFieldLevelEncryptionConfig()
                .WithEncryptionPath("$.cardInfo.encryptedData", "$.cardInfo") // Before version 1.2.9
                .WithEncryptionPath("$.fundingAccountInfo.encryptedPayload.encryptedData", "$.fundingAccountInfo.encryptedPayload")
                .WithEncryptionPath("$.encryptedPayload.encryptedData", "$.encryptedPayload")
                .WithDecryptionPath("$.tokenDetail", "$.tokenDetail.encryptedData")
                .WithDecryptionPath("$.encryptedPayload", "$.encryptedPayload.encryptedData")
                .WithEncryptionCertificate(encryptionCertificate)
                .WithDecryptionKey(decryptionKey)
                .WithOaepPaddingDigestAlgorithm("SHA-512")
                .WithEncryptedValueFieldName("encryptedData")
                .WithEncryptedKeyFieldName("encryptedKey")
                .WithIvFieldName("iv")
                .WithOaepPaddingDigestAlgorithmFieldName("oaepHashingAlgorithm")
                .WithEncryptionCertificateFingerprintFieldName("publicKeyFingerprint")
                .WithValueEncoding(FieldValueEncoding.Hex)
                .Build();

            var config = Configuration.Default;
            config.BasePath = "https://sandbox.api.mastercard.com/mdes/";
            config.ApiClient.RestClient.Authenticator = new RestSharpOAuth1Authenticator(ConsumerKey, signingKey, new Uri(config.BasePath));
            config.ApiClient.EncryptionInterceptor = new RestSharpFieldLevelEncryptionInterceptor(fieldLevelEncryptionConfig);
        }

        [TestMethod]
        public void TestTokenizeEndpoint()
        {
            var tokenizeApi = new TokenizeApi(Configuration.Default);
            var response = tokenizeApi.CreateTokenize(BuildTokenizeRequestSchema());
            Assert.IsNotNull(response);
            Assert.AreEqual("APPROVED", response.Decision);
            Assert.AreEqual("500181d9f8e0629211e3949a08002", response.TokenDetail.EncryptedData.PaymentAccountReference);
        }

        private static TokenizeRequestSchema BuildTokenizeRequestSchema()
        {
            return new TokenizeRequestSchema("site1.your-server.com",
                "123456",
                "CLOUD",
                "98765432101",
                "123456",
                BuildFundingAccountInfo(),
                "en",
                "RHVtbXkgYmFzZSA2NCBkYXRhIC0gdGhpcyBpcyBub3QgYSByZWFsIFRBViBleGFtcGxl");
        }

        private static FundingAccountInfo BuildFundingAccountInfo()
        {
            return new FundingAccountInfo(
                string.Empty,
                string.Empty,
                string.Empty,
                BuildFundingAccountInfoEncryptedPayload());
        }

        private static FundingAccountInfoEncryptedPayload BuildFundingAccountInfoEncryptedPayload()
        {
            return new FundingAccountInfoEncryptedPayload(
                string.Empty,
                string.Empty,
                string.Empty,
                string.Empty,
                BuildFundingAccountData());
        }

        private static FundingAccountData BuildFundingAccountData()
        {
            return new FundingAccountData(
                BuildCardAccountDataInbound(),
                BuildAccountHolderData(),
                "ACCOUNT_ON_FILE");
        }

        private static AccountHolderData BuildAccountHolderData()
        {
            return new AccountHolderData(
                "John Doe",
                BuildBillingAddress());
        }

        private static CardAccountDataInbound BuildCardAccountDataInbound()
        {
            return new CardAccountDataInbound(
                "5123456789012345",
                "09",
                "21",
                "123");
        }

        private static BillingAddress BuildBillingAddress()
        {
            return new BillingAddress
            {
                Line1 = "100 1st Street",
                Line2 = "Apt. 4B",
                City = "St. Louis",
                Country = "USA",
                CountrySubdivision = "MO",
                PostalCode = "61000"
            };
        }
    }
}
