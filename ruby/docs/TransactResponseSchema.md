# OpenapiClient::TransactResponseSchema

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **response_id** | **String** | Unique identifier for the response.  | [optional] |
| **response_host** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] |
| **encrypted_payload** | [**EncryptedPayloadTransact**](EncryptedPayloadTransact.md) |  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::TransactResponseSchema.new(
  response_id: null,
  response_host: site2.payment-app-provider.com,
  encrypted_payload: null
)
```

