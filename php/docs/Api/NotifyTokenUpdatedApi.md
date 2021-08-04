# DigitalEnablementClient\NotifyTokenUpdatedApi

All URIs are relative to https://api.mastercard.com/mdes.

Method | HTTP request | Description
------------- | ------------- | -------------
[**notifyTokenUpdateForTokenStateChange()**](NotifyTokenUpdatedApi.md#notifyTokenUpdateForTokenStateChange) | **POST** /digitization/static/1/0/notifyTokenUpdated | Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.


## `notifyTokenUpdateForTokenStateChange()`

```php
notifyTokenUpdateForTokenStateChange($notify_token_updated_request_schema): \DigitalEnablementClient\Model\NotifyTokenUpdatedResponseSchema
```

Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.

This API is used by MDES to notify the Token Requestor of significant Token updates. Typical notification scenarios include  1. Informing the merchant a token is active 2. Informing the merchant a token has been suspended by the Issuer 3. Informing the merchant a token has been unsuspended by the Issuer 4. Informing the merchant a token has been deleted by the Issuer 5. Informing the merchant of a product configuration change (such as a change in Card Art) 6. Informing the merchant of underlying changes to the FPAN metadata associated to the token  **Connection Security**  Mastercard will connect via TLS protocol and verify the server certificate before establishing a connection to the client endpoint. During this handshake, the client server can request TLS client authentication. Mastercard will present a client certificate which identifies as ?ws.mastercard.com? This client certificate is issued by the Entrust L1K certificate and should be available in most trust stores.   **Conditional Objects**  The contents of the notifyTokenUpdated API will vary depending which of the above scneraios triggered the notification.  1. *productConfig* - Provided when Product Configuration has changed (e.g. such as card art). 2. *tokenInfo* - Provided when either the details of the token or associated FPAN have changed (such as token or PAN expiry).   The optional objects will always contain a minimum set of data which be returned regardless of whether or not updates have been made. These fields are denoted as required fields.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DigitalEnablementClient\Api\NotifyTokenUpdatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$notify_token_updated_request_schema = new \DigitalEnablementClient\Model\NotifyTokenUpdatedRequestSchema(); // \DigitalEnablementClient\Model\NotifyTokenUpdatedRequestSchema | Contains the details of the request message.

try {
    $result = $apiInstance->notifyTokenUpdateForTokenStateChange($notify_token_updated_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NotifyTokenUpdatedApi->notifyTokenUpdateForTokenStateChange: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **notify_token_updated_request_schema** | [**\DigitalEnablementClient\Model\NotifyTokenUpdatedRequestSchema**](../Model/NotifyTokenUpdatedRequestSchema.md)| Contains the details of the request message. | [optional]

### Return type

[**\DigitalEnablementClient\Model\NotifyTokenUpdatedResponseSchema**](../Model/NotifyTokenUpdatedResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
