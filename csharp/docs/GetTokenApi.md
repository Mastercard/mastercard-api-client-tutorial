# Acme.App.MastercardApi.Client.Api.GetTokenApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|--------|--------------|-------------|
| [**GetToken**](GetTokenApi.md#gettoken) | **POST** /digitization/static/1/0/getToken | Used to get the status and details of a single given Token. |

<a id="gettoken"></a>
# **GetToken**
> GetTokenResponseSchema GetToken (GetTokenRequestSchema getTokenRequestSchema = null)

Used to get the status and details of a single given Token.

This API is used to get the status and details of a single given Token. It may be used to check current Token state or in exception scenarios (such as network time out) to ensure that external systems remain in sync with the Token state as maintained by MDES. Optionally, if requested, the token number can also be provided in the response (in encrypted form). 

### Example
```csharp
using System.Collections.Generic;
using System.Diagnostics;
using Acme.App.MastercardApi.Client.Api;
using Acme.App.MastercardApi.Client.Client;
using Acme.App.MastercardApi.Client.Model;

namespace Example
{
    public class GetTokenExample
    {
        public static void Main()
        {
            Configuration config = new Configuration();
            config.BasePath = "https://api.mastercard.com/mdes";
            var apiInstance = new GetTokenApi(config);
            var getTokenRequestSchema = new GetTokenRequestSchema(); // GetTokenRequestSchema | Contains the details of the request message.  (optional) 

            try
            {
                // Used to get the status and details of a single given Token.
                GetTokenResponseSchema result = apiInstance.GetToken(getTokenRequestSchema);
                Debug.WriteLine(result);
            }
            catch (ApiException  e)
            {
                Debug.Print("Exception when calling GetTokenApi.GetToken: " + e.Message);
                Debug.Print("Status Code: " + e.ErrorCode);
                Debug.Print(e.StackTrace);
            }
        }
    }
}
```

#### Using the GetTokenWithHttpInfo variant
This returns an ApiResponse object which contains the response data, status code and headers.

```csharp
try
{
    // Used to get the status and details of a single given Token.
    ApiResponse<GetTokenResponseSchema> response = apiInstance.GetTokenWithHttpInfo(getTokenRequestSchema);
    Debug.Write("Status Code: " + response.StatusCode);
    Debug.Write("Response Headers: " + response.Headers);
    Debug.Write("Response Body: " + response.Data);
}
catch (ApiException e)
{
    Debug.Print("Exception when calling GetTokenApi.GetTokenWithHttpInfo: " + e.Message);
    Debug.Print("Status Code: " + e.ErrorCode);
    Debug.Print(e.StackTrace);
}
```

### Parameters

| Name | Type | Description | Notes |
|------|------|-------------|-------|
| **getTokenRequestSchema** | [**GetTokenRequestSchema**](GetTokenRequestSchema.md) | Contains the details of the request message.  | [optional]  |

### Return type

[**GetTokenResponseSchema**](GetTokenResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json


### HTTP response details
| Status code | Description | Response headers |
|-------------|-------------|------------------|
| **200** | Contains the details of the response message.  |  -  |
| **401** | Example gateway error response  |  -  |
| **500** | Example application error response  |  -  |

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

