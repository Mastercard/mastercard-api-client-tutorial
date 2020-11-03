# DigitalEnablementClient\DeleteApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteDigitization**](DeleteApi.md#deleteDigitization) | **POST** /digitization/static/1/0/delete | Used to delete one or more Tokens. The API is limited to 10 Tokens per request.



## deleteDigitization

> \DigitalEnablementClient\Model\DeleteResponseSchema deleteDigitization($delete_request_schema)

Used to delete one or more Tokens. The API is limited to 10 Tokens per request.

This API is used to delete one or more Tokens.  The API is limited to 10 Tokens per request. MDES will coordinate the deactivation of the Tokens and notify any relevant parties that the Tokens have now been deactivated.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new DigitalEnablementClient\Api\DeleteApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$delete_request_schema = new \DigitalEnablementClient\Model\DeleteRequestSchema(); // \DigitalEnablementClient\Model\DeleteRequestSchema | Contains the details of the request message.

try {
    $result = $apiInstance->deleteDigitization($delete_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeleteApi->deleteDigitization: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **delete_request_schema** | [**\DigitalEnablementClient\Model\DeleteRequestSchema**](../Model/DeleteRequestSchema.md)| Contains the details of the request message. | [optional]

### Return type

[**\DigitalEnablementClient\Model\DeleteResponseSchema**](../Model/DeleteResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

