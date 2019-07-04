# DeleteApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteDigitization**](DeleteApi.md#deleteDigitization) | **POST** /digitization/static/1/0/delete | Used to delete one or more Tokens. The API is limited to 10 Tokens per request.


<a name="deleteDigitization"></a>
# **deleteDigitization**
> DeleteResponseSchema deleteDigitization(deleteRequestSchema)

Used to delete one or more Tokens. The API is limited to 10 Tokens per request.

This API is used to delete one or more Tokens.  The API is limited to 10 Tokens per request. MDES will coordinate the deactivation of the Tokens and notify any relevant parties that the Tokens have now been deactivated. 

### Example
```java
// Import classes:
//import io.swagger.client.ApiException;
//import io.swagger.client.api.DeleteApi;


DeleteApi apiInstance = new DeleteApi();
DeleteRequestSchema deleteRequestSchema = new DeleteRequestSchema(); // DeleteRequestSchema | Contains the details of the request message. 
try {
    DeleteResponseSchema result = apiInstance.deleteDigitization(deleteRequestSchema);
    System.out.println(result);
} catch (ApiException e) {
    System.err.println("Exception when calling DeleteApi#deleteDigitization");
    e.printStackTrace();
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **deleteRequestSchema** | [**DeleteRequestSchema**](DeleteRequestSchema.md)| Contains the details of the request message.  | [optional]

### Return type

[**DeleteResponseSchema**](DeleteResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

