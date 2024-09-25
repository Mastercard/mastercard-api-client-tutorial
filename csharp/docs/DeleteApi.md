# Acme.App.MastercardApi.Client.Api.DeleteApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|--------|--------------|-------------|
| [**DeleteDigitization**](DeleteApi.md#deletedigitization) | **POST** /digitization/static/1/0/delete | Used to delete one or more Tokens. The API is limited to 10 Tokens per request. |

<a id="deletedigitization"></a>
# **DeleteDigitization**
> DeleteResponseSchema DeleteDigitization (DeleteRequestSchema deleteRequestSchema = null)

Used to delete one or more Tokens. The API is limited to 10 Tokens per request.

This API is used to delete one or more Tokens.  The API is limited to 10 Tokens per request. MDES will coordinate the deactivation of the Tokens and notify any relevant parties that the Tokens have now been deactivated. 

### Example
```csharp
using System.Collections.Generic;
using System.Diagnostics;
using Acme.App.MastercardApi.Client.Api;
using Acme.App.MastercardApi.Client.Client;
using Acme.App.MastercardApi.Client.Model;

namespace Example
{
    public class DeleteDigitizationExample
    {
        public static void Main()
        {
            Configuration config = new Configuration();
            config.BasePath = "https://api.mastercard.com/mdes";
            var apiInstance = new DeleteApi(config);
            var deleteRequestSchema = new DeleteRequestSchema(); // DeleteRequestSchema | Contains the details of the request message.  (optional) 

            try
            {
                // Used to delete one or more Tokens. The API is limited to 10 Tokens per request.
                DeleteResponseSchema result = apiInstance.DeleteDigitization(deleteRequestSchema);
                Debug.WriteLine(result);
            }
            catch (ApiException  e)
            {
                Debug.Print("Exception when calling DeleteApi.DeleteDigitization: " + e.Message);
                Debug.Print("Status Code: " + e.ErrorCode);
                Debug.Print(e.StackTrace);
            }
        }
    }
}
```

#### Using the DeleteDigitizationWithHttpInfo variant
This returns an ApiResponse object which contains the response data, status code and headers.

```csharp
try
{
    // Used to delete one or more Tokens. The API is limited to 10 Tokens per request.
    ApiResponse<DeleteResponseSchema> response = apiInstance.DeleteDigitizationWithHttpInfo(deleteRequestSchema);
    Debug.Write("Status Code: " + response.StatusCode);
    Debug.Write("Response Headers: " + response.Headers);
    Debug.Write("Response Body: " + response.Data);
}
catch (ApiException e)
{
    Debug.Print("Exception when calling DeleteApi.DeleteDigitizationWithHttpInfo: " + e.Message);
    Debug.Print("Status Code: " + e.ErrorCode);
    Debug.Print(e.StackTrace);
}
```

### Parameters

| Name | Type | Description | Notes |
|------|------|-------------|-------|
| **deleteRequestSchema** | [**DeleteRequestSchema**](DeleteRequestSchema.md) | Contains the details of the request message.  | [optional]  |

### Return type

[**DeleteResponseSchema**](DeleteResponseSchema.md)

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

