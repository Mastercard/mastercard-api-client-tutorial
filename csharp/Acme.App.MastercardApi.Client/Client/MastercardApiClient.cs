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
        private readonly RestSharpFieldLevelEncryptionInterceptor _encryptionInterceptor;
        
        /// <summary>
        /// 
        /// </summary>
        /// <param name="signingKey"></param>
        /// <param name="basePath"></param>
        /// <param name="consumerKey"></param>
        /// <param name="config"></param>
        public ApiClient(RSA signingKey, string basePath, string consumerKey, FieldLevelEncryptionConfig config)
        {
            _baseUrl = basePath;
            _basePath = new Uri(basePath);
            _signer = new RestSharpSigner(consumerKey, signingKey);
            _encryptionInterceptor = new RestSharpFieldLevelEncryptionInterceptor(config);
        }

        partial void InterceptRequest(IRestRequest request)
        {
            _encryptionInterceptor.InterceptRequest(request);
            _signer.Sign(this._basePath, request);
        }
    }
}
