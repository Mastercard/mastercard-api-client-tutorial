# TokenizeApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createTokenize**](TokenizeApi.md#createTokenize) | **POST** /digitization/static/1/0/tokenize | Used to digitize a card to create a server-based Token.


<a name="createTokenize"></a>
# **createTokenize**
> TokenizeResponseSchema createTokenize(tokenizeRequestSchema)

Used to digitize a card to create a server-based Token.

Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 

### Example
```java
// Import classes:
//import io.swagger.client.ApiException;
//import io.swagger.client.api.TokenizeApi;


TokenizeApi apiInstance = new TokenizeApi();
TokenizeRequestSchema tokenizeRequestSchema = new TokenizeRequestSchema(); // TokenizeRequestSchema | A Tokenize request is used to digitize a PAN.  
try {
    TokenizeResponseSchema result = apiInstance.createTokenize(tokenizeRequestSchema);
    System.out.println(result);
} catch (ApiException e) {
    System.err.println("Exception when calling TokenizeApi#createTokenize");
    e.printStackTrace();
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tokenizeRequestSchema** | [**TokenizeRequestSchema**](TokenizeRequestSchema.md)| A Tokenize request is used to digitize a PAN.   | [optional]

### Return type

[**TokenizeResponseSchema**](TokenizeResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

