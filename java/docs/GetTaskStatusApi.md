# GetTaskStatusApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|------------- | ------------- | -------------|
| [**getTaskStatus**](GetTaskStatusApi.md#getTaskStatus) | **POST** /digitization/static/1/0/getTaskStatus | Used to check the status of any asynchronous task that was previously requested. |


<a id="getTaskStatus"></a>
# **getTaskStatus**
> GetTaskStatusResponseSchema getTaskStatus(getTaskStatusRequestSchema)

Used to check the status of any asynchronous task that was previously requested.

Used to check the status of any asynchronous task that was previously requested. 

### Example
```java
// Import classes:
import com.mastercard.developer.mdes_digital_enablement_client.ApiClient;
import com.mastercard.developer.mdes_digital_enablement_client.ApiException;
import com.mastercard.developer.mdes_digital_enablement_client.Configuration;
import com.mastercard.developer.mdes_digital_enablement_client.models.*;
import com.mastercard.developer.mdes_digital_enablement_client.api.GetTaskStatusApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("https://api.mastercard.com/mdes");

    GetTaskStatusApi apiInstance = new GetTaskStatusApi(defaultClient);
    GetTaskStatusRequestSchema getTaskStatusRequestSchema = new GetTaskStatusRequestSchema(); // GetTaskStatusRequestSchema | Contains the details of the request message. 
    try {
      GetTaskStatusResponseSchema result = apiInstance.getTaskStatus(getTaskStatusRequestSchema);
      System.out.println(result);
    } catch (ApiException e) {
      System.err.println("Exception when calling GetTaskStatusApi#getTaskStatus");
      System.err.println("Status code: " + e.getCode());
      System.err.println("Reason: " + e.getResponseBody());
      System.err.println("Response headers: " + e.getResponseHeaders());
      e.printStackTrace();
    }
  }
}
```

### Parameters

| Name | Type | Description  | Notes |
|------------- | ------------- | ------------- | -------------|
| **getTaskStatusRequestSchema** | [**GetTaskStatusRequestSchema**](GetTaskStatusRequestSchema.md)| Contains the details of the request message.  | [optional] |

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

