# TransactApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createTransact**](TransactApi.md#createTransact) | **POST** /remotetransaction/static/1/0/transact | Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.


<a name="createTransact"></a>
# **createTransact**
> TransactResponseSchema createTransact(transactRequestSchema)

Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.

This API is used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction through a payment processor.  The entire response is encrypted. The caller may only transact using the Tokens belonging to them. 

### Example
```java
// Import classes:
//import io.swagger.client.ApiException;
//import io.swagger.client.api.TransactApi;


TransactApi apiInstance = new TransactApi();
TransactRequestSchema transactRequestSchema = new TransactRequestSchema(); // TransactRequestSchema | Contains the details of the request message. 
try {
    TransactResponseSchema result = apiInstance.createTransact(transactRequestSchema);
    System.out.println(result);
} catch (ApiException e) {
    System.err.println("Exception when calling TransactApi#createTransact");
    e.printStackTrace();
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **transactRequestSchema** | [**TransactRequestSchema**](TransactRequestSchema.md)| Contains the details of the request message.  | [optional]

### Return type

[**TransactResponseSchema**](TransactResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

