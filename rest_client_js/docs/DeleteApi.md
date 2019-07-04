# MdesForMerchants.DeleteApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteDigitization**](DeleteApi.md#deleteDigitization) | **POST** /digitization/static/1/0/delete | Used to delete one or more Tokens. The API is limited to 10 Tokens per request.


<a name="deleteDigitization"></a>
# **deleteDigitization**
> DeleteResponseSchema deleteDigitization(opts)

Used to delete one or more Tokens. The API is limited to 10 Tokens per request.

This API is used to delete one or more Tokens.  The API is limited to 10 Tokens per request. MDES will coordinate the deactivation of the Tokens and notify any relevant parties that the Tokens have now been deactivated. 

### Example
```javascript
var MdesForMerchants = require('mdes_for_merchants');

var apiInstance = new MdesForMerchants.DeleteApi();

var opts = { 
  'deleteRequestSchema': new MdesForMerchants.DeleteRequestSchema() // DeleteRequestSchema | Contains the details of the request message. 
};

var callback = function(error, data, response) {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
};
apiInstance.deleteDigitization(opts, callback);
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

