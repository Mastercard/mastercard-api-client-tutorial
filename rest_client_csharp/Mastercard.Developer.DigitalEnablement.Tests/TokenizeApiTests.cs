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

namespace Mastercard.Developer.DigitalEnablement.Tests
{
    [TestClass]
    public class Test
    {
        private const string ConsumerKey = ""; // TODO
        private const string SigningKeyAlias = ""; // TODO
        private const string SigningKeyPassword = ""; // TODO
        private const string SigningKeyPkcs12FilePath = ""; // TODO
        private const string EncryptionCertificateFingerprint = ""; // TODO
        private const string EncryptionCertificateFilePath = ""; // TODO
        private const string DecryptionKeyFilePath = ""; // TODO

        [ClassInitialize]
        public static void Before(TestContext context)
        {
            SetupApiClient();
        }

        private static void SetupApiClient()
        {
            var signingKey = AuthenticationUtils.LoadSigningKey(SigningKeyPkcs12FilePath, SigningKeyAlias, SigningKeyPassword);
            var encryptionCertificate = EncryptionUtils.LoadEncryptionCertificate(EncryptionCertificateFilePath);
            var decryptionKey = EncryptionUtils.LoadDecryptionKey(DecryptionKeyFilePath);

            var fieldLevelEncryptionConfig = FieldLevelEncryptionConfigBuilder.AFieldLevelEncryptionConfig()
                .WithEncryptionPath("$.cardInfo.encryptedData", "$.cardInfo")
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
                .WithEncryptionCertificateFingerprint(EncryptionCertificateFingerprint)
                .WithValueEncoding(FieldLevelEncryptionConfig.FieldValueEncoding.Hex)
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

        private static TransactRequestSchema BuildTransactRequestSchema()
        {
            return new TransactRequestSchema(null,
                "111111",
                "DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45",
                "UCAF",
                "A1B2C3D4");
        }

        private static GetTokenRequestSchema BuildGetTokenRequestSchema()
        {
            return new GetTokenRequestSchema(null,
                "123456",
                "123456789",
                "DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45",
                "true");
        }

        private static TokenizeRequestSchema BuildTokenizeRequestSchema()
        {
            return new TokenizeRequestSchema(null, 
                "123456", 
                "CLOUD", 
                "98765432101", 
                "123456",
                BuildCardInfo());
        }

        private static CardInfo BuildCardInfo()
        {
            return new CardInfo
            {
                EncryptedData = BuildCardInfoData()
            };
        }

        private static CardInfoData BuildCardInfoData()
        {
            return new CardInfoData
            {
                BillingAddress = BuildBillingAddress(),
                AccountNumber = "5123456789012345",
                Source = "CARD_ON_FILE",
                CardholderName = "John Doe",
                SecurityCode = "123",
                ExpiryYear = "21",
                ExpiryMonth = "09"
            };
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
