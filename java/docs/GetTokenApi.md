# GetTokenApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|------------- | ------------- | -------------|
| [**getToken**](GetTokenApi.md#getToken) | **POST** /digitization/static/1/0/getToken | Used to get the status and details of a single given Token. |


<a id="getToken"></a>
# **getToken**
> GetTokenResponseSchema getToken(getTokenRequestSchema)

Used to get the status and details of a single given Token.

This API is used to get the status and details of a single given Token. It may be used to check current Token state or in exception scenarios (such as network time out) to ensure that external systems remain in sync with the Token state as maintained by MDES. Optionally, if requested, the token number can also be provided in the response (in encrypted form). 

### Example
```java
// Import classes:
import com.mastercard.developer.mdes_digital_enablement_client.ApiClient;
import com.mastercard.developer.mdes_digital_enablement_client.ApiException;
import com.mastercard.developer.mdes_digital_enablement_client.Configuration;
import com.mastercard.developer.mdes_digital_enablement_client.models.*;
import com.mastercard.developer.mdes_digital_enablement_client.api.GetTokenApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("https://api.mastercard.com/mdes");

    GetTokenApi apiInstance = new GetTokenApi(defaultClient);
    GetTokenRequestSchema getTokenRequestSchema = new GetTokenRequestSchema(); // GetTokenRequestSchema | Contains the details of the request message. 
    try {
      GetTokenResponseSchema result = apiInstance.getToken(getTokenRequestSchema);
      System.out.println(result);
    } catch (ApiException e) {
      System.err.println("Exception when calling GetTokenApi#getToken");
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
| **getTokenRequestSchema** | [**GetTokenRequestSchema**](GetTokenRequestSchema.md)| Contains the details of the request message.  | [optional] |

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

