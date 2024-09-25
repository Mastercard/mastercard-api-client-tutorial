# Acme.App.MastercardApi.Client.Api.SuspendApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|--------|--------------|-------------|
| [**CreateSuspend**](SuspendApi.md#createsuspend) | **POST** /digitization/static/1/0/suspend | Used to temporarily suspend one or more Tokens. |

<a id="createsuspend"></a>
# **CreateSuspend**
> SuspendResponseSchema CreateSuspend (SuspendRequestSchema suspendRequestSchema = null)

Used to temporarily suspend one or more Tokens.

This API is used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request. MDES will coordinate the suspension of the Tokens and notify any relevant parties that the Tokens have been suspended. A suspended Token can be unsuspended using the Unsuspend resource. 

### Example
```csharp
using System.Collections.Generic;
using System.Diagnostics;
using Acme.App.MastercardApi.Client.Api;
using Acme.App.MastercardApi.Client.Client;
using Acme.App.MastercardApi.Client.Model;

namespace Example
{
    public class CreateSuspendExample
    {
        public static void Main()
        {
            Configuration config = new Configuration();
            config.BasePath = "https://api.mastercard.com/mdes";
            var apiInstance = new SuspendApi(config);
            var suspendRequestSchema = new SuspendRequestSchema(); // SuspendRequestSchema | Contains the details of the request message.  (optional) 

            try
            {
                // Used to temporarily suspend one or more Tokens.
                SuspendResponseSchema result = apiInstance.CreateSuspend(suspendRequestSchema);
                Debug.WriteLine(result);
            }
            catch (ApiException  e)
            {
                Debug.Print("Exception when calling SuspendApi.CreateSuspend: " + e.Message);
                Debug.Print("Status Code: " + e.ErrorCode);
                Debug.Print(e.StackTrace);
            }
        }
    }
}
```

#### Using the CreateSuspendWithHttpInfo variant
This returns an ApiResponse object which contains the response data, status code and headers.

```csharp
try
{
    // Used to temporarily suspend one or more Tokens.
    ApiResponse<SuspendResponseSchema> response = apiInstance.CreateSuspendWithHttpInfo(suspendRequestSchema);
    Debug.Write("Status Code: " + response.StatusCode);
    Debug.Write("Response Headers: " + response.Headers);
    Debug.Write("Response Body: " + response.Data);
}
catch (ApiException e)
{
    Debug.Print("Exception when calling SuspendApi.CreateSuspendWithHttpInfo: " + e.Message);
    Debug.Print("Status Code: " + e.ErrorCode);
    Debug.Print(e.StackTrace);
}
```

### Parameters

| Name | Type | Description | Notes |
|------|------|-------------|-------|
| **suspendRequestSchema** | [**SuspendRequestSchema**](SuspendRequestSchema.md) | Contains the details of the request message.  | [optional]  |

### Return type

[**SuspendResponseSchema**](SuspendResponseSchema.md)

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

