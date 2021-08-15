# OpenapiClient::NotifyTokenUpdatedApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**notify_token_update__for_token_state_change**](NotifyTokenUpdatedApi.md#notify_token_update__for_token_state_change) | **POST** /digitization/static/1/0/notifyTokenUpdated | Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed. |


## notify_token_update__for_token_state_change

> <NotifyTokenUpdatedResponseSchema> notify_token_update__for_token_state_change(opts)

Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.

This API is used by MDES to notify the Token Requestor of significant Token updates. Typical notification scenarios include  1. Informing the merchant a token is active 2. Informing the merchant a token has been suspended by the Issuer 3. Informing the merchant a token has been unsuspended by the Issuer 4. Informing the merchant a token has been deleted by the Issuer 5. Informing the merchant of a product configuration change (such as a change in Card Art) 6. Informing the merchant of underlying changes to the FPAN metadata associated to the token  **Connection Security**  Mastercard will connect via TLS protocol and verify the server certificate before establishing a connection to the client endpoint. During this handshake, the client server can request TLS client authentication. Mastercard will present a client certificate which identifies as ?ws.mastercard.com? This client certificate is issued by the Entrust L1K certificate and should be available in most trust stores.   **Conditional Objects**  The contents of the notifyTokenUpdated API will vary depending which of the above scneraios triggered the notification.  1. *productConfig* - Provided when Product Configuration has changed (e.g. such as card art). 2. *tokenInfo* - Provided when either the details of the token or associated FPAN have changed (such as token or PAN expiry).   The optional objects will always contain a minimum set of data which be returned regardless of whether or not updates have been made. These fields are denoted as required fields. 

### Examples

```ruby
require 'time'
require 'openapi_client'

api_instance = OpenapiClient::NotifyTokenUpdatedApi.new
opts = {
  notify_token_updated_request_schema: OpenapiClient::NotifyTokenUpdatedRequestSchema.new({response_host: 'site2.payment-app-provider.com', request_id: '123456', encrypted_payload: OpenapiClient::EncryptedPayload.new({public_key_fingerprint: '4c4ead5927f0df8117f178eea9308daa58e27c2b', encrypted_key: 'A1B2C3D4E5F6112233445566', encrypted_data: OpenapiClient::NotifyTokenEncryptedPayload.new})}) # NotifyTokenUpdatedRequestSchema | Contains the details of the request message. 
}

begin
  # Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.
  result = api_instance.notify_token_update__for_token_state_change(opts)
  p result
rescue OpenapiClient::ApiError => e
  puts "Error when calling NotifyTokenUpdatedApi->notify_token_update__for_token_state_change: #{e}"
end
```

#### Using the notify_token_update__for_token_state_change_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<NotifyTokenUpdatedResponseSchema>, Integer, Hash)> notify_token_update__for_token_state_change_with_http_info(opts)

```ruby
begin
  # Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.
  data, status_code, headers = api_instance.notify_token_update__for_token_state_change_with_http_info(opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <NotifyTokenUpdatedResponseSchema>
rescue OpenapiClient::ApiError => e
  puts "Error when calling NotifyTokenUpdatedApi->notify_token_update__for_token_state_change_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **notify_token_updated_request_schema** | [**NotifyTokenUpdatedRequestSchema**](NotifyTokenUpdatedRequestSchema.md) | Contains the details of the request message.  | [optional] |

### Return type

[**NotifyTokenUpdatedResponseSchema**](NotifyTokenUpdatedResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

