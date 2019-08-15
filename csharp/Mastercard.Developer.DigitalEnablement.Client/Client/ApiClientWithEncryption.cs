using Mastercard.Developer.ClientEncryption.RestSharp.Interceptors;
using RestSharp.Portable;
// ReSharper disable UnusedParameterInPartialMethod

namespace Mastercard.Developer.DigitalEnablement.Client.Client
{
    partial class ApiClient
    {
        public RestSharpFieldLevelEncryptionInterceptor EncryptionInterceptor { private get; set; }

        partial void InterceptRequest(IRestRequest request) => EncryptionInterceptor.InterceptRequest(request);
        partial void InterceptResponse(IRestRequest request, IRestResponse response)
        {
            EncryptionInterceptor.InterceptResponse(response);
        }
    }
}
