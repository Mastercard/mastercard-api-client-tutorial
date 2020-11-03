# DigitalEnablementClient\SearchTokensApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**searchTokens**](SearchTokensApi.md#searchTokens) | **POST** /digitization/static/1/0/searchTokens | Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.



## searchTokens

> \DigitalEnablementClient\Model\SearchTokensResponseSchema searchTokens($search_tokens_request_schema)

Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.

This API is used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN. It may be used to check current Token(s) state or, in exception scenarios (such as network time out), to ensure that external systems remain in sync with the Token state as maintained by MDES. Deactivated tokens are not returned.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new DigitalEnablementClient\Api\SearchTokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$search_tokens_request_schema = new \DigitalEnablementClient\Model\SearchTokensRequestSchema(); // \DigitalEnablementClient\Model\SearchTokensRequestSchema | Contains the details of the request message.

try {
    $result = $apiInstance->searchTokens($search_tokens_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SearchTokensApi->searchTokens: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **search_tokens_request_schema** | [**\DigitalEnablementClient\Model\SearchTokensRequestSchema**](../Model/SearchTokensRequestSchema.md)| Contains the details of the request message. | [optional]

### Return type

[**\DigitalEnablementClient\Model\SearchTokensResponseSchema**](../Model/SearchTokensResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

