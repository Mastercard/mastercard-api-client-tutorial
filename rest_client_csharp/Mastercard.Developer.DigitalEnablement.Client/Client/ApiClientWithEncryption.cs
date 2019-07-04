using Mastercard.Developer.ClientEncryption.RestSharp.Interceptors;
using RestSharp.Portable;
// ReSharper disable UnusedParameterInPartialMethod

namespace Mastercard.Developer.DigitalEnablement.Client.Client
{
    partial class ApiClient
    {
        public RestSharpFieldLevelEncryptionInterceptor EncryptionInterceptor { private get; set; }
        
        partial void InterceptRequest(IRestRequest request)
        {
            WithDummyQueryParams(request);
            EncryptionInterceptor.InterceptRequest(request);
        }
        
        partial void InterceptResponse(IRestRequest request, IRestResponse response) => EncryptionInterceptor.InterceptResponse(response);

        private static void WithDummyQueryParams(IRestRequest request)
        {
            // colon=%3A&plus=%2B&comma=%2C
            request.AddQueryParameter("colon", ":");
            request.AddQueryParameter("plus", "+");
            request.AddQueryParameter("comma", ",");
        }
    }
}
