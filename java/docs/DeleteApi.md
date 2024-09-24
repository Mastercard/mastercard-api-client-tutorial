# DeleteApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|------------- | ------------- | -------------|
| [**deleteDigitization**](DeleteApi.md#deleteDigitization) | **POST** /digitization/static/1/0/delete | Used to delete one or more Tokens. The API is limited to 10 Tokens per request. |


<a id="deleteDigitization"></a>
# **deleteDigitization**
> DeleteResponseSchema deleteDigitization(deleteRequestSchema)

Used to delete one or more Tokens. The API is limited to 10 Tokens per request.

This API is used to delete one or more Tokens.  The API is limited to 10 Tokens per request. MDES will coordinate the deactivation of the Tokens and notify any relevant parties that the Tokens have now been deactivated. 

### Example
```java
// Import classes:
import com.mastercard.developer.mdes_digital_enablement_client.ApiClient;
import com.mastercard.developer.mdes_digital_enablement_client.ApiException;
import com.mastercard.developer.mdes_digital_enablement_client.Configuration;
import com.mastercard.developer.mdes_digital_enablement_client.models.*;
import com.mastercard.developer.mdes_digital_enablement_client.api.DeleteApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("https://api.mastercard.com/mdes");

    DeleteApi apiInstance = new DeleteApi(defaultClient);
    DeleteRequestSchema deleteRequestSchema = new DeleteRequestSchema(); // DeleteRequestSchema | Contains the details of the request message. 
    try {
      DeleteResponseSchema result = apiInstance.deleteDigitization(deleteRequestSchema);
      System.out.println(result);
    } catch (ApiException e) {
      System.err.println("Exception when calling DeleteApi#deleteDigitization");
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
| **deleteRequestSchema** | [**DeleteRequestSchema**](DeleteRequestSchema.md)| Contains the details of the request message.  | [optional] |

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

