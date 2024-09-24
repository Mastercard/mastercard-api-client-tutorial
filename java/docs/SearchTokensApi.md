# SearchTokensApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|------------- | ------------- | -------------|
| [**searchTokens**](SearchTokensApi.md#searchTokens) | **POST** /digitization/static/1/0/searchTokens | Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN. |


<a id="searchTokens"></a>
# **searchTokens**
> SearchTokensResponseSchema searchTokens(searchTokensRequestSchema)

Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.

This API is used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN. It may be used to check current Token(s) state or, in exception scenarios (such as network time out), to ensure that external systems remain in sync with the Token state as maintained by MDES. Deactivated tokens are not returned. 

### Example
```java
// Import classes:
import com.mastercard.developer.mdes_digital_enablement_client.ApiClient;
import com.mastercard.developer.mdes_digital_enablement_client.ApiException;
import com.mastercard.developer.mdes_digital_enablement_client.Configuration;
import com.mastercard.developer.mdes_digital_enablement_client.models.*;
import com.mastercard.developer.mdes_digital_enablement_client.api.SearchTokensApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("https://api.mastercard.com/mdes");

    SearchTokensApi apiInstance = new SearchTokensApi(defaultClient);
    SearchTokensRequestSchema searchTokensRequestSchema = new SearchTokensRequestSchema(); // SearchTokensRequestSchema | Contains the details of the request message. 
    try {
      SearchTokensResponseSchema result = apiInstance.searchTokens(searchTokensRequestSchema);
      System.out.println(result);
    } catch (ApiException e) {
      System.err.println("Exception when calling SearchTokensApi#searchTokens");
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
| **searchTokensRequestSchema** | [**SearchTokensRequestSchema**](SearchTokensRequestSchema.md)| Contains the details of the request message.  | [optional] |

### Return type

[**SearchTokensResponseSchema**](SearchTokensResponseSchema.md)

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

