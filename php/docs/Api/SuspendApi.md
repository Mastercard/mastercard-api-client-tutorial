# DigitalEnablementClient\SuspendApi

All URIs are relative to https://api.mastercard.com/mdes.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createSuspend()**](SuspendApi.md#createSuspend) | **POST** /digitization/static/1/0/suspend | Used to temporarily suspend one or more Tokens.


## `createSuspend()`

```php
createSuspend($suspend_request_schema): \DigitalEnablementClient\Model\SuspendResponseSchema
```

Used to temporarily suspend one or more Tokens.

This API is used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request. MDES will coordinate the suspension of the Tokens and notify any relevant parties that the Tokens have been suspended. A suspended Token can be unsuspended using the Unsuspend resource.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DigitalEnablementClient\Api\SuspendApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$suspend_request_schema = new \DigitalEnablementClient\Model\SuspendRequestSchema(); // \DigitalEnablementClient\Model\SuspendRequestSchema | Contains the details of the request message.

try {
    $result = $apiInstance->createSuspend($suspend_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuspendApi->createSuspend: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **suspend_request_schema** | [**\DigitalEnablementClient\Model\SuspendRequestSchema**](../Model/SuspendRequestSchema.md)| Contains the details of the request message. | [optional]

### Return type

[**\DigitalEnablementClient\Model\SuspendResponseSchema**](../Model/SuspendResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
