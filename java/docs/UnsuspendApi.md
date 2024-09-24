# UnsuspendApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|------------- | ------------- | -------------|
| [**createUnsuspend**](UnsuspendApi.md#createUnsuspend) | **POST** /digitization/static/1/0/unsuspend | Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request. |


<a id="createUnsuspend"></a>
# **createUnsuspend**
> UnSuspendResponseSchema createUnsuspend(unSuspendRequestSchema)

Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.

This API is used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request. MDES will coordinate the unsuspension of the Tokens and notify any relevant parties that the Tokens have now been unsuspended. 

### Example
```java
// Import classes:
import com.mastercard.developer.mdes_digital_enablement_client.ApiClient;
import com.mastercard.developer.mdes_digital_enablement_client.ApiException;
import com.mastercard.developer.mdes_digital_enablement_client.Configuration;
import com.mastercard.developer.mdes_digital_enablement_client.models.*;
import com.mastercard.developer.mdes_digital_enablement_client.api.UnsuspendApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("https://api.mastercard.com/mdes");

    UnsuspendApi apiInstance = new UnsuspendApi(defaultClient);
    UnSuspendRequestSchema unSuspendRequestSchema = new UnSuspendRequestSchema(); // UnSuspendRequestSchema | Contains the details of the request message. 
    try {
      UnSuspendResponseSchema result = apiInstance.createUnsuspend(unSuspendRequestSchema);
      System.out.println(result);
    } catch (ApiException e) {
      System.err.println("Exception when calling UnsuspendApi#createUnsuspend");
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
| **unSuspendRequestSchema** | [**UnSuspendRequestSchema**](UnSuspendRequestSchema.md)| Contains the details of the request message.  | [optional] |

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

