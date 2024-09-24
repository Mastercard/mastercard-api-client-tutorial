# SuspendApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|------------- | ------------- | -------------|
| [**createSuspend**](SuspendApi.md#createSuspend) | **POST** /digitization/static/1/0/suspend | Used to temporarily suspend one or more Tokens. |


<a id="createSuspend"></a>
# **createSuspend**
> SuspendResponseSchema createSuspend(suspendRequestSchema)

Used to temporarily suspend one or more Tokens.

This API is used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request. MDES will coordinate the suspension of the Tokens and notify any relevant parties that the Tokens have been suspended. A suspended Token can be unsuspended using the Unsuspend resource. 

### Example
```java
// Import classes:
import com.mastercard.developer.mdes_digital_enablement_client.ApiClient;
import com.mastercard.developer.mdes_digital_enablement_client.ApiException;
import com.mastercard.developer.mdes_digital_enablement_client.Configuration;
import com.mastercard.developer.mdes_digital_enablement_client.models.*;
import com.mastercard.developer.mdes_digital_enablement_client.api.SuspendApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("https://api.mastercard.com/mdes");

    SuspendApi apiInstance = new SuspendApi(defaultClient);
    SuspendRequestSchema suspendRequestSchema = new SuspendRequestSchema(); // SuspendRequestSchema | Contains the details of the request message. 
    try {
      SuspendResponseSchema result = apiInstance.createSuspend(suspendRequestSchema);
      System.out.println(result);
    } catch (ApiException e) {
      System.err.println("Exception when calling SuspendApi#createSuspend");
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
| **suspendRequestSchema** | [**SuspendRequestSchema**](SuspendRequestSchema.md)| Contains the details of the request message.  | [optional] |

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

