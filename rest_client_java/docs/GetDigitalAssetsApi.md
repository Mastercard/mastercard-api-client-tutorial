# GetDigitalAssetsApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDigitalAssets**](GetDigitalAssetsApi.md#getDigitalAssets) | **POST** /digitization/#env/1/0/getDigitalAssets | Used to retrieve digital assets derived from a funding PAN.


<a name="getDigitalAssets"></a>
# **getDigitalAssets**
> GetDigitalAssetsResponseSchema getDigitalAssets(encryptedPayload)

Used to retrieve digital assets derived from a funding PAN.

Get Digital Asset API is used to retrieve digital assets from a funding pan.  

### Example
```java
// Import classes:
//import io.swagger.client.ApiException;
//import io.swagger.client.api.GetDigitalAssetsApi;


GetDigitalAssetsApi apiInstance = new GetDigitalAssetsApi();
GetDigitalAssetsRequestSchema encryptedPayload = new GetDigitalAssetsRequestSchema(); // GetDigitalAssetsRequestSchema | Contains an encrypted CardAccountData object. 
try {
    GetDigitalAssetsResponseSchema result = apiInstance.getDigitalAssets(encryptedPayload);
    System.out.println(result);
} catch (ApiException e) {
    System.err.println("Exception when calling GetDigitalAssetsApi#getDigitalAssets");
    e.printStackTrace();
}
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

