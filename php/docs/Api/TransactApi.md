# DigitalEnablementClient\TransactApi

All URIs are relative to https://api.mastercard.com/mdes.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createTransact()**](TransactApi.md#createTransact) | **POST** /remotetransaction/static/1/0/transact | Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.


## `createTransact()`

```php
createTransact($transact_request_schema): \DigitalEnablementClient\Model\TransactResponseSchema
```

Used by the Token Requestor to create a Digital Secure Remote Payment (\"DSRP\") transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.

This API is used by the Token Requestor to create a Digital Secure Remote Payment (\"DSRP\") transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction through a payment processor.  The entire response is encrypted. The caller may only transact using the Tokens belonging to them.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DigitalEnablementClient\Api\TransactApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$transact_request_schema = new \DigitalEnablementClient\Model\TransactRequestSchema(); // \DigitalEnablementClient\Model\TransactRequestSchema | Contains the details of the request message.

try {
    $result = $apiInstance->createTransact($transact_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactApi->createTransact: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **transact_request_schema** | [**\DigitalEnablementClient\Model\TransactRequestSchema**](../Model/TransactRequestSchema.md)| Contains the details of the request message. | [optional]

### Return type

[**\DigitalEnablementClient\Model\TransactResponseSchema**](../Model/TransactResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
