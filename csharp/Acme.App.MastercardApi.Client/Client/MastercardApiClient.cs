using System;
using System.Security.Cryptography;
using Mastercard.Developer.ClientEncryption.Core.Encryption;
using Mastercard.Developer.ClientEncryption.RestSharpV2.Interceptors;
using Mastercard.Developer.OAuth1Signer.RestSharpV2.Signers;
using RestSharp;

namespace Acme.App.MastercardApi.Client.Client
{
    partial class ApiClient
    {
        private readonly Uri _basePath;
        private readonly RestSharpSigner _signer;
        private readonly RestSharpEncryptionInterceptor _encryptionInterceptor;

        /// <summary>
        /// Construct an ApiClient which will automatically:
        /// - Sign requests
        /// - Encrypt/decrypt requests and responses
        /// </summary>
        public ApiClient(RSA signingKey, string basePath, string consumerKey, EncryptionConfig config)
        {
            _baseUrl = basePath;
            _basePath = new Uri(basePath);
            _signer = new RestSharpSigner(consumerKey, signingKey);
            _encryptionInterceptor = RestSharpEncryptionInterceptor.From(config);
        }

        partial void InterceptRequest(RestRequest request)
        {
            _encryptionInterceptor.InterceptRequest(request);
            _signer.Sign(_basePath, request);
        }
    }
}
