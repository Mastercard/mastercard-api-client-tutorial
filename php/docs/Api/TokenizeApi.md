# DigitalEnablementClient\TokenizeApi

All URIs are relative to https://api.mastercard.com/mdes.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createTokenize()**](TokenizeApi.md#createTokenize) | **POST** /digitization/static/1/0/tokenize | 


## `createTokenize()`

```php
createTokenize($tokenize_request_schema): \DigitalEnablementClient\Model\TokenizeResponseSchema
```



Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DigitalEnablementClient\Api\TokenizeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$tokenize_request_schema = new \DigitalEnablementClient\Model\TokenizeRequestSchema(); // \DigitalEnablementClient\Model\TokenizeRequestSchema | A Tokenize request is used to digitize a PAN.

try {
    $result = $apiInstance->createTokenize($tokenize_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TokenizeApi->createTokenize: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tokenize_request_schema** | [**\DigitalEnablementClient\Model\TokenizeRequestSchema**](../Model/TokenizeRequestSchema.md)| A Tokenize request is used to digitize a PAN. | [optional]

### Return type

[**\DigitalEnablementClient\Model\TokenizeResponseSchema**](../Model/TokenizeResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
