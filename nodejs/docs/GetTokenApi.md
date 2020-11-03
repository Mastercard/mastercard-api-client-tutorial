# MdesForMerchants.GetTokenApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getToken**](GetTokenApi.md#getToken) | **POST** /digitization/static/1/0/getToken | Used to get the status and details of a single given Token.



## getToken

> GetTokenResponseSchema getToken(opts)

Used to get the status and details of a single given Token.

This API is used to get the status and details of a single given Token. It may be used to check current Token state or in exception scenarios (such as network time out) to ensure that external systems remain in sync with the Token state as maintained by MDES. Optionally, if requested, the token number can also be provided in the response (in encrypted form).  

### Example

```javascript
var MdesForMerchants = require('mdes_for_merchants');

var apiInstance = new MdesForMerchants.GetTokenApi();
var opts = {
  'getTokenRequestSchema': new MdesForMerchants.GetTokenRequestSchema() // GetTokenRequestSchema | Contains the details of the request message. 
};
var callback = function(error, data, response) {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
};
apiInstance.getToken(opts, callback);
```

### Parameters



Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **getTokenRequestSchema** | [**GetTokenRequestSchema**](GetTokenRequestSchema.md)| Contains the details of the request message.  | [optional] 

### Return type

[**GetTokenResponseSchema**](GetTokenResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

