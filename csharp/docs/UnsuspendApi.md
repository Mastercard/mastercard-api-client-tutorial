# Acme.App.MastercardApi.Client.Api.UnsuspendApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**CreateUnsuspend**](UnsuspendApi.md#createunsuspend) | **POST** /digitization/static/1/0/unsuspend | Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.



## CreateUnsuspend

> UnSuspendResponseSchema CreateUnsuspend (UnSuspendRequestSchema unsuspendRequestSchema = null)

Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.

This API is used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request. MDES will coordinate the unsuspension of the Tokens and notify any relevant parties that the Tokens have now been unsuspended. 

### Example

```csharp
using System.Collections.Generic;
using System.Diagnostics;
using Acme.App.MastercardApi.Client.Api;
using Acme.App.MastercardApi.Client.Client;
using Acme.App.MastercardApi.Client.Model;

namespace Example
{
    public class CreateUnsuspendExample
    {
        public static void Main()
        {
            Configuration.Default.BasePath = "https://api.mastercard.com/mdes";
            var apiInstance = new UnsuspendApi(Configuration.Default);
            var unsuspendRequestSchema = new UnSuspendRequestSchema(); // UnSuspendRequestSchema | Contains the details of the request message.  (optional) 

            try
            {
                // Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.
                UnSuspendResponseSchema result = apiInstance.CreateUnsuspend(unsuspendRequestSchema);
                Debug.WriteLine(result);
            }
            catch (ApiException e)
            {
                Debug.Print("Exception when calling UnsuspendApi.CreateUnsuspend: " + e.Message );
                Debug.Print("Status Code: "+ e.ErrorCode);
                Debug.Print(e.StackTrace);
            }
        }
    }
}
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **unsuspendRequestSchema** | [**UnSuspendRequestSchema**](UnSuspendRequestSchema.md)| Contains the details of the request message.  | [optional] 

### Return type

[**UnSuspendResponseSchema**](UnSuspendResponseSchema.md)

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

[[Back to top]](#)
[[Back to API list]](../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../README.md#documentation-for-models)
[[Back to README]](../README.md)

