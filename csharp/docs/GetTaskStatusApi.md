# Acme.App.MastercardApi.Client.Api.GetTaskStatusApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|--------|--------------|-------------|
| [**GetTaskStatus**](GetTaskStatusApi.md#gettaskstatus) | **POST** /digitization/static/1/0/getTaskStatus | Used to check the status of any asynchronous task that was previously requested. |

<a id="gettaskstatus"></a>
# **GetTaskStatus**
> GetTaskStatusResponseSchema GetTaskStatus (GetTaskStatusRequestSchema getTaskStatusRequestSchema = null)

Used to check the status of any asynchronous task that was previously requested.

Used to check the status of any asynchronous task that was previously requested. 

### Example
```csharp
using System.Collections.Generic;
using System.Diagnostics;
using Acme.App.MastercardApi.Client.Api;
using Acme.App.MastercardApi.Client.Client;
using Acme.App.MastercardApi.Client.Model;

namespace Example
{
    public class GetTaskStatusExample
    {
        public static void Main()
        {
            Configuration config = new Configuration();
            config.BasePath = "https://api.mastercard.com/mdes";
            var apiInstance = new GetTaskStatusApi(config);
            var getTaskStatusRequestSchema = new GetTaskStatusRequestSchema(); // GetTaskStatusRequestSchema | Contains the details of the request message.  (optional) 

            try
            {
                // Used to check the status of any asynchronous task that was previously requested.
                GetTaskStatusResponseSchema result = apiInstance.GetTaskStatus(getTaskStatusRequestSchema);
                Debug.WriteLine(result);
            }
            catch (ApiException  e)
            {
                Debug.Print("Exception when calling GetTaskStatusApi.GetTaskStatus: " + e.Message);
                Debug.Print("Status Code: " + e.ErrorCode);
                Debug.Print(e.StackTrace);
            }
        }
    }
}
```

#### Using the GetTaskStatusWithHttpInfo variant
This returns an ApiResponse object which contains the response data, status code and headers.

```csharp
try
{
    // Used to check the status of any asynchronous task that was previously requested.
    ApiResponse<GetTaskStatusResponseSchema> response = apiInstance.GetTaskStatusWithHttpInfo(getTaskStatusRequestSchema);
    Debug.Write("Status Code: " + response.StatusCode);
    Debug.Write("Response Headers: " + response.Headers);
    Debug.Write("Response Body: " + response.Data);
}
catch (ApiException e)
{
    Debug.Print("Exception when calling GetTaskStatusApi.GetTaskStatusWithHttpInfo: " + e.Message);
    Debug.Print("Status Code: " + e.ErrorCode);
    Debug.Print(e.StackTrace);
}
```

### Parameters

| Name | Type | Description | Notes |
|------|------|-------------|-------|
| **getTaskStatusRequestSchema** | [**GetTaskStatusRequestSchema**](GetTaskStatusRequestSchema.md) | Contains the details of the request message.  | [optional]  |

### Return type

[**GetTaskStatusResponseSchema**](GetTaskStatusResponseSchema.md)

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

