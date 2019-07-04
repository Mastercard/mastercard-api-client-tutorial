# MdesForMerchants.NotifyTokenUpdatedApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**notifyTokenUpdateForTokenStateChange**](NotifyTokenUpdatedApi.md#notifyTokenUpdateForTokenStateChange) | **POST** /digitization/static/1/0/notifyTokenUpdated | Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.


<a name="notifyTokenUpdateForTokenStateChange"></a>
# **notifyTokenUpdateForTokenStateChange**
> NotifyTokenUpdatedResponseSchema notifyTokenUpdateForTokenStateChange(opts)

Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.

This API is used by MDES to notify the Token Requestor of significant Token updates. Typical notification scenarios include  &lt;br&gt; &lt;br&gt;  1. Informing the merchant a token is active 2. Informing the merchant a token has been suspended by the Issuer 3. Informing the merchant a token has been unsuspended by the Issuer 4. Informing the merchant a token has been deleted by the Issuer 5. Informing the merchant of a product configuration change (such as a change in Card Art) 6. Informing the merchant of underlying changes to the FPAN metadata associated to the token&lt;br&gt;   __Connection Security__&lt;br&gt; Mastercard will connect via TLS protocol and verify the server certificate before establishing a connection to the client endpoint. During this handshake, the client server can request TLS client authentication. Mastercard will present a client certificate which identifies as �ws.mastercard.com� This client certificate is issued by the Entrust L1K certificate and should be available in most trust stores.  &lt;br&gt;&lt;br&gt; __Conditional Objects__&lt;br&gt; The contents of the notifyTokenUpdated API will vary depending which of the above scneraios triggered the notification. &lt;br&gt;   1. *productConfig* - Provided when Product Configuration has changed (e.g. such as card art).      2. *tokenInfo* - Provided when either the details of the token or associated FPAN have changed (such as token or PAN expiry).      The optional objects will always contain a minimum set of data which be returned regardless of whether or not updates have been made. These fields are denoted as required fields.&lt;br&gt;     

### Example
```javascript
var MdesForMerchants = require('mdes_for_merchants');

var apiInstance = new MdesForMerchants.NotifyTokenUpdatedApi();

var opts = { 
  'notifyTokenUpdatedRequestSchema': new MdesForMerchants.NotifyTokenUpdatedRequestSchema() // NotifyTokenUpdatedRequestSchema | Contains the details of the request message. 
};

var callback = function(error, data, response) {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
};
apiInstance.notifyTokenUpdateForTokenStateChange(opts, callback);
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **notifyTokenUpdatedRequestSchema** | [**NotifyTokenUpdatedRequestSchema**](NotifyTokenUpdatedRequestSchema.md)| Contains the details of the request message.  | [optional] 

### Return type

[**NotifyTokenUpdatedResponseSchema**](NotifyTokenUpdatedResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

