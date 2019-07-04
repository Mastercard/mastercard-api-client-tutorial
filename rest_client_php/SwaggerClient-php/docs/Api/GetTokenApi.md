# Swagger\Client\GetTokenApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getToken**](GetTokenApi.md#getToken) | **POST** /digitization/static/1/0/getToken | Used to get the status and details of a single given Token.


# **getToken**
> \Swagger\Client\Model\GetTokenResponseSchema getToken($get_token_request_schema)

Used to get the status and details of a single given Token.

This API is used to get the status and details of a single given Token. It may be used to check current Token state or in exception scenarios (such as network time out) to ensure that external systems remain in sync with the Token state as maintained by MDES. Optionally, if requested, the token number can also be provided in the response (in encrypted form).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\GetTokenApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$get_token_request_schema = new \Swagger\Client\Model\GetTokenRequestSchema(); // \Swagger\Client\Model\GetTokenRequestSchema | Contains the details of the request message.

try {
    $result = $apiInstance->getToken($get_token_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GetTokenApi->getToken: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **get_token_request_schema** | [**\Swagger\Client\Model\GetTokenRequestSchema**](../Model/GetTokenRequestSchema.md)| Contains the details of the request message. | [optional]

### Return type

[**\Swagger\Client\Model\GetTokenResponseSchema**](../Model/GetTokenResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

