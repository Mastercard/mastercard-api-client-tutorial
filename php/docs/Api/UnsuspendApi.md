# DigitalEnablementClient\UnsuspendApi

All URIs are relative to https://api.mastercard.com/mdes.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createUnsuspend()**](UnsuspendApi.md#createUnsuspend) | **POST** /digitization/static/1/0/unsuspend | Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.


## `createUnsuspend()`

```php
createUnsuspend($un_suspend_request_schema): \DigitalEnablementClient\Model\UnSuspendResponseSchema
```

Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.

This API is used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request. MDES will coordinate the unsuspension of the Tokens and notify any relevant parties that the Tokens have now been unsuspended.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DigitalEnablementClient\Api\UnsuspendApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$un_suspend_request_schema = new \DigitalEnablementClient\Model\UnSuspendRequestSchema(); // \DigitalEnablementClient\Model\UnSuspendRequestSchema | Contains the details of the request message.

try {
    $result = $apiInstance->createUnsuspend($un_suspend_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UnsuspendApi->createUnsuspend: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **un_suspend_request_schema** | [**\DigitalEnablementClient\Model\UnSuspendRequestSchema**](../Model/UnSuspendRequestSchema.md)| Contains the details of the request message. | [optional]

### Return type

[**\DigitalEnablementClient\Model\UnSuspendResponseSchema**](../Model/UnSuspendResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
