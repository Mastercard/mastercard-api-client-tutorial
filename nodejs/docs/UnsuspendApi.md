# MdesDigitalEnablementApi.UnsuspendApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createUnsuspend**](UnsuspendApi.md#createUnsuspend) | **POST** /digitization/static/1/0/unsuspend | Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.



## createUnsuspend

> UnSuspendResponseSchema createUnsuspend(opts)

Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.

This API is used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request. MDES will coordinate the unsuspension of the Tokens and notify any relevant parties that the Tokens have now been unsuspended. 

### Example

```javascript
var MdesDigitalEnablementApi = require('mdes_digital_enablement_api');

var apiInstance = new MdesDigitalEnablementApi.UnsuspendApi();
var opts = {
  'unSuspendRequestSchema': new MdesDigitalEnablementApi.UnSuspendRequestSchema() // UnSuspendRequestSchema | Contains the details of the request message. 
};
var callback = function(error, data, response) {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
};
apiInstance.createUnsuspend(opts, callback);
```

### Parameters



Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **unSuspendRequestSchema** | [**UnSuspendRequestSchema**](UnSuspendRequestSchema.md)| Contains the details of the request message.  | [optional] 

### Return type

[**UnSuspendResponseSchema**](UnSuspendResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

