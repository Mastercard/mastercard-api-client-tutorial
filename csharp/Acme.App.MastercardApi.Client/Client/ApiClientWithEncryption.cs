using System;
using System.Security.Cryptography;
using Mastercard.Developer.ClientEncryption.RestSharpV2.Interceptors;
using Mastercard.Developer.OAuth1Signer.RestSharpV2.Signers;
using RestSharp;
// ReSharper disable UnusedParameterInPartialMethod

namespace Acme.App.MastercardApi.Client.Client
{
    partial class ApiClient
    {
        private Uri BasePath { get; }
        private RestSharpSigner Signer { get; }
        public RestSharpFieldLevelEncryptionInterceptor EncryptionInterceptor { private get; set; }
        
        public ApiClient(RSA signingKey, string basePath, string consumerKey)
        {
            _baseUrl = basePath;
            BasePath = new Uri(basePath);
            Signer = new RestSharpSigner(consumerKey, signingKey);
        }

        partial void InterceptRequest(IRestRequest request)
        {
            EncryptionInterceptor.InterceptRequest(request);
            Signer.Sign(this.BasePath, request);
        }
    }
}
