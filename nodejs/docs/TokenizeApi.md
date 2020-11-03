# MdesForMerchants.TokenizeApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createTokenize**](TokenizeApi.md#createTokenize) | **POST** /digitization/static/1/0/tokenize | Used to digitize a card to create a server-based Token.



## createTokenize

> TokenizeResponseSchema createTokenize(opts)

Used to digitize a card to create a server-based Token.

Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 

### Example

```javascript
var MdesForMerchants = require('mdes_for_merchants');

var apiInstance = new MdesForMerchants.TokenizeApi();
var opts = {
  'tokenizeRequestSchema': new MdesForMerchants.TokenizeRequestSchema() // TokenizeRequestSchema | A Tokenize request is used to digitize a PAN.  
};
var callback = function(error, data, response) {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
};
apiInstance.createTokenize(opts, callback);
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

