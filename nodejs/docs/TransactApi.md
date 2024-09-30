# MdesDigitalEnablementApi.TransactApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createTransact**](TransactApi.md#createTransact) | **POST** /remotetransaction/static/1/0/transact | Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.



## createTransact

> TransactResponseSchema createTransact(opts)

Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.

This API is used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction through a payment processor.  The entire response is encrypted. The caller may only transact using the Tokens belonging to them. 

### Example

```javascript
import MdesDigitalEnablementApi from 'mdes_digital_enablement_api';

let apiInstance = new MdesDigitalEnablementApi.TransactApi();
let opts = {
  'transactRequestSchema': new MdesDigitalEnablementApi.TransactRequestSchema() // TransactRequestSchema | Contains the details of the request message. 
};
apiInstance.createTransact(opts, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
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

