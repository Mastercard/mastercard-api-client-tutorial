# Swagger\Client\UnsuspendApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createUnsuspend**](UnsuspendApi.md#createUnsuspend) | **POST** /digitization/static/1/0/unsuspend | Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.


# **createUnsuspend**
> \Swagger\Client\Model\UnSuspendResponseSchema createUnsuspend($unsuspend_request_schema)

Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.

This API is used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request. MDES will coordinate the unsuspension of the Tokens and notify any relevant parties that the Tokens have now been unsuspended.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\UnsuspendApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$unsuspend_request_schema = new \Swagger\Client\Model\UnSuspendRequestSchema(); // \Swagger\Client\Model\UnSuspendRequestSchema | Contains the details of the request message.

try {
    $result = $apiInstance->createUnsuspend($unsuspend_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UnsuspendApi->createUnsuspend: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **unsuspend_request_schema** | [**\Swagger\Client\Model\UnSuspendRequestSchema**](../Model/UnSuspendRequestSchema.md)| Contains the details of the request message. | [optional]

### Return type

[**\Swagger\Client\Model\UnSuspendResponseSchema**](../Model/UnSuspendResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

