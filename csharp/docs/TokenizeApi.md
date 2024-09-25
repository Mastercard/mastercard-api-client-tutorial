# Acme.App.MastercardApi.Client.Api.TokenizeApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|--------|--------------|-------------|
| [**CreateTokenize**](TokenizeApi.md#createtokenize) | **POST** /digitization/static/1/0/tokenize |  |

<a id="createtokenize"></a>
# **CreateTokenize**
> TokenizeResponseSchema CreateTokenize (TokenizeRequestSchema tokenizeRequestSchema = null)



Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 

### Example
```csharp
using System.Collections.Generic;
using System.Diagnostics;
using Acme.App.MastercardApi.Client.Api;
using Acme.App.MastercardApi.Client.Client;
using Acme.App.MastercardApi.Client.Model;

namespace Example
{
    public class CreateTokenizeExample
    {
        public static void Main()
        {
            Configuration config = new Configuration();
            config.BasePath = "https://api.mastercard.com/mdes";
            var apiInstance = new TokenizeApi(config);
            var tokenizeRequestSchema = new TokenizeRequestSchema(); // TokenizeRequestSchema | A Tokenize request is used to digitize a PAN.  (optional) 

            try
            {
                TokenizeResponseSchema result = apiInstance.CreateTokenize(tokenizeRequestSchema);
                Debug.WriteLine(result);
            }
            catch (ApiException  e)
            {
                Debug.Print("Exception when calling TokenizeApi.CreateTokenize: " + e.Message);
                Debug.Print("Status Code: " + e.ErrorCode);
                Debug.Print(e.StackTrace);
            }
        }
    }
}
```

#### Using the CreateTokenizeWithHttpInfo variant
This returns an ApiResponse object which contains the response data, status code and headers.

```csharp
try
{
    ApiResponse<TokenizeResponseSchema> response = apiInstance.CreateTokenizeWithHttpInfo(tokenizeRequestSchema);
    Debug.Write("Status Code: " + response.StatusCode);
    Debug.Write("Response Headers: " + response.Headers);
    Debug.Write("Response Body: " + response.Data);
}
catch (ApiException e)
{
    Debug.Print("Exception when calling TokenizeApi.CreateTokenizeWithHttpInfo: " + e.Message);
    Debug.Print("Status Code: " + e.ErrorCode);
    Debug.Print(e.StackTrace);
}
```

### Parameters

| Name | Type | Description | Notes |
|------|------|-------------|-------|
| **tokenizeRequestSchema** | [**TokenizeRequestSchema**](TokenizeRequestSchema.md) | A Tokenize request is used to digitize a PAN.  | [optional]  |

### Return type

[**TokenizeResponseSchema**](TokenizeResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json


### HTTP response details
| Status code | Description | Response headers |
|-------------|-------------|------------------|
| **200** | Contains the details of the token response message when a push account receipt is supplied in the tokenize request.  |  -  |
| **401** | Example gateway error response  |  -  |
| **500** | Example application error response  |  -  |

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

