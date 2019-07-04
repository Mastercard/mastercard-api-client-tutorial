# MdesForMerchants.GetDigitalAssetsApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDigitalAssets**](GetDigitalAssetsApi.md#getDigitalAssets) | **POST** /digitization/#env/1/0/getDigitalAssets | Used to retrieve digital assets derived from a funding PAN.


<a name="getDigitalAssets"></a>
# **getDigitalAssets**
> GetDigitalAssetsResponseSchema getDigitalAssets(opts)

Used to retrieve digital assets derived from a funding PAN.

Get Digital Asset API is used to retrieve digital assets from a funding pan.  

### Example
```javascript
var MdesForMerchants = require('mdes_for_merchants');

var apiInstance = new MdesForMerchants.GetDigitalAssetsApi();

var opts = { 
  'encryptedPayload': new MdesForMerchants.GetDigitalAssetsRequestSchema() // GetDigitalAssetsRequestSchema | Contains an encrypted CardAccountData object. 
};

var callback = function(error, data, response) {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
};
apiInstance.getDigitalAssets(opts, callback);
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **encryptedPayload** | [**GetDigitalAssetsRequestSchema**](GetDigitalAssetsRequestSchema.md)| Contains an encrypted CardAccountData object.  | [optional] 

### Return type

[**GetDigitalAssetsResponseSchema**](GetDigitalAssetsResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

