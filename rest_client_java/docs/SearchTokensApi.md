# SearchTokensApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**searchTokens**](SearchTokensApi.md#searchTokens) | **POST** /digitization/static/1/0/searchTokens | Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.


<a name="searchTokens"></a>
# **searchTokens**
> SearchTokensResponseSchema searchTokens(searchTokensRequestSchema)

Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.

This API is used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN. It may be used to check current Token(s) state or, in exception scenarios (such as network time out), to ensure that external systems remain in sync with the Token state as maintained by MDES. Deactivated tokens are not returned. 

### Example
```java
// Import classes:
//import io.swagger.client.ApiException;
//import io.swagger.client.api.SearchTokensApi;


SearchTokensApi apiInstance = new SearchTokensApi();
SearchTokensRequestSchema searchTokensRequestSchema = new SearchTokensRequestSchema(); // SearchTokensRequestSchema | Contains the details of the request message. 
try {
    SearchTokensResponseSchema result = apiInstance.searchTokens(searchTokensRequestSchema);
    System.out.println(result);
} catch (ApiException e) {
    System.err.println("Exception when calling SearchTokensApi#searchTokens");
    e.printStackTrace();
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **searchTokensRequestSchema** | [**SearchTokensRequestSchema**](SearchTokensRequestSchema.md)| Contains the details of the request message.  | [optional]

### Return type

[**SearchTokensResponseSchema**](SearchTokensResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

