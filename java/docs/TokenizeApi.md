# TokenizeApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|------------- | ------------- | -------------|
| [**createTokenize**](TokenizeApi.md#createTokenize) | **POST** /digitization/static/1/0/tokenize |  |


<a id="createTokenize"></a>
# **createTokenize**
> TokenizeResponseSchema createTokenize(tokenizeRequestSchema)



Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 

### Example
```java
// Import classes:
import com.mastercard.developer.mdes_digital_enablement_client.ApiClient;
import com.mastercard.developer.mdes_digital_enablement_client.ApiException;
import com.mastercard.developer.mdes_digital_enablement_client.Configuration;
import com.mastercard.developer.mdes_digital_enablement_client.models.*;
import com.mastercard.developer.mdes_digital_enablement_client.api.TokenizeApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("https://api.mastercard.com/mdes");

    TokenizeApi apiInstance = new TokenizeApi(defaultClient);
    TokenizeRequestSchema tokenizeRequestSchema = new TokenizeRequestSchema(); // TokenizeRequestSchema | A Tokenize request is used to digitize a PAN. 
    try {
      TokenizeResponseSchema result = apiInstance.createTokenize(tokenizeRequestSchema);
      System.out.println(result);
    } catch (ApiException e) {
      System.err.println("Exception when calling TokenizeApi#createTokenize");
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
| **tokenizeRequestSchema** | [**TokenizeRequestSchema**](TokenizeRequestSchema.md)| A Tokenize request is used to digitize a PAN.  | [optional] |

### Return type

[**TokenizeResponseSchema**](TokenizeResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

### HTTP response details
| Status code | Description | Response headers |
|-------------|-------------|------------------|
| **200** | Contains the details of the token response message when a push account receipt is supplied in the tokenize request.  |  -  |
| **401** | Example gateway error response  |  -  |
| **500** | Example application error response  |  -  |

