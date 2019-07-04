# Swagger\Client\GetDigitalAssetsApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDigitalAssets**](GetDigitalAssetsApi.md#getDigitalAssets) | **POST** /digitization/#env/1/0/getDigitalAssets | Used to retrieve digital assets derived from a funding PAN.


# **getDigitalAssets**
> \Swagger\Client\Model\GetDigitalAssetsResponseSchema getDigitalAssets($encrypted_payload)

Used to retrieve digital assets derived from a funding PAN.

Get Digital Asset API is used to retrieve digital assets from a funding pan.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\GetDigitalAssetsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$encrypted_payload = new \Swagger\Client\Model\GetDigitalAssetsRequestSchema(); // \Swagger\Client\Model\GetDigitalAssetsRequestSchema | Contains an encrypted CardAccountData object.

try {
    $result = $apiInstance->getDigitalAssets($encrypted_payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GetDigitalAssetsApi->getDigitalAssets: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **encrypted_payload** | [**\Swagger\Client\Model\GetDigitalAssetsRequestSchema**](../Model/GetDigitalAssetsRequestSchema.md)| Contains an encrypted CardAccountData object. | [optional]

### Return type

[**\Swagger\Client\Model\GetDigitalAssetsResponseSchema**](../Model/GetDigitalAssetsResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

