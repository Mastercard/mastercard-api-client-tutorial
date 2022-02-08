using System.Security.Cryptography.X509Certificates;
using Acme.App.MastercardApi.Client.Api;
using Acme.App.MastercardApi.Client.Client;
using Acme.App.MastercardApi.Client.Model;
using Mastercard.Developer.ClientEncryption.Core.Encryption;
using Mastercard.Developer.ClientEncryption.Core.Utils;
using Mastercard.Developer.OAuth1Signer.Core.Utils;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using static Mastercard.Developer.ClientEncryption.Core.Encryption.FieldLevelEncryptionConfig;

namespace Acme.App.MastercardApi.Client.Tests
{
    [TestClass]
    public class TokenizeApiTest
    {
        //
        // TODO: add your credentials here or those dummy values will cause an INVALID_CLIENT_ID error to be returned 😀
        //
        private const string ConsumerKey = "000000000000000000000000000000000000000000000000!000000000000000000000000000000000000000000000000";
        private const string SigningKeyAlias = "fake-key";
        private const string SigningKeyPassword = "fakepassword";
        private const string SigningKeyPkcs12FilePath = "./_Resources/fake-signing-key.p12";
        private const string BasePath = "https://sandbox.api.mastercard.com/mdes/";

        private static ApiClient _client;
        
        // Encryption keys to be used in Sandbox (see: https://mstr.cd/2T53Ltv)
        private const string EncryptionCertificateFilePath = "./_Resources/digital-enablement-sandbox-encryption-key.crt";
        private const string DecryptionKeyFilePath = "./_Resources/digital-enablement-sandbox-decryption-key.key";

        [ClassInitialize]
        public static void Before(TestContext context)
        {
            SetupApiClient();
        }

        private static void SetupApiClient()
        {
            var signingKey = AuthenticationUtils.LoadSigningKey(SigningKeyPkcs12FilePath, SigningKeyAlias,
                SigningKeyPassword, X509KeyStorageFlags.MachineKeySet | X509KeyStorageFlags.Exportable);
            var encryptionCertificate = EncryptionUtils.LoadEncryptionCertificate(EncryptionCertificateFilePath);
            var decryptionKey = EncryptionUtils.LoadDecryptionKey(DecryptionKeyFilePath);
            
            var config = FieldLevelEncryptionConfigBuilder.AFieldLevelEncryptionConfig()
                .WithEncryptionPath("$.fundingAccountInfo.encryptedPayload.encryptedData", "$.fundingAccountInfo.encryptedPayload")
                .WithEncryptionPath("$.encryptedPayload.encryptedData", "$.encryptedPayload")
                .WithDecryptionPath("$.tokenDetail", "$.tokenDetail.encryptedData")
                .WithDecryptionPath("$.encryptedPayload", "$.encryptedPayload.encryptedData")
                .WithEncryptionCertificate(encryptionCertificate)
                .WithDecryptionKey(decryptionKey)
                .WithEncryptionCertificateFingerprint("243E6992EA467F1CBB9973FACFCC3BF17B5CD007")
                .WithOaepPaddingDigestAlgorithm("SHA-512")
                .WithEncryptedValueFieldName("encryptedData")
                .WithEncryptedKeyFieldName("encryptedKey")
                .WithIvFieldName("iv")
                .WithOaepPaddingDigestAlgorithmFieldName("oaepHashingAlgorithm")
                .WithEncryptionCertificateFingerprintFieldName("publicKeyFingerprint")
                .WithValueEncoding(FieldValueEncoding.Hex)
                .Build();
            
            _client = new ApiClient(signingKey, BasePath, ConsumerKey, config);
        }

        [TestMethod]
        public void TestTokenizeEndpoint()
        {
            var tokenizeApi = new TokenizeApi {Client = _client};
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

        private static FundingAccountInfo BuildFundingAccountInfo() =>
            new FundingAccountInfo(
                string.Empty,
                string.Empty,
                BuildFundingAccountInfoPayload());

        private static FundingAccountInfoEncryptedPayload BuildFundingAccountInfoPayload() =>
            new FundingAccountInfoEncryptedPayload(
                string.Empty,
                string.Empty,
                string.Empty,
                string.Empty,
                BuildFundingAccountData());

        private static FundingAccountData BuildFundingAccountData() =>
            new FundingAccountData(
                BuildCardAccountDataInbound(),
                BuildAccountHolderData(),
                "ACCOUNT_ON_FILE");

        private static AccountHolderData BuildAccountHolderData() =>
            new AccountHolderData(
                "John Doe",
                BuildBillingAddress());

        private static CardAccountDataInbound BuildCardAccountDataInbound() =>
            new CardAccountDataInbound(
                "5123456789012345",
                "09",
                "25",
                "123");

        private static BillingAddress BuildBillingAddress() =>
            new BillingAddress
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
