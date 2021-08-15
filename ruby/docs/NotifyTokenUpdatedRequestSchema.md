# OpenapiClient::NotifyTokenUpdatedRequestSchema

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **response_host** | **String** | The host that originated the request. Future calls in the same conversation should be routed to this host.  |  |
| **request_id** | **String** | Unique identifier for the request.  |  |
| **encrypted_payload** | [**EncryptedPayload**](EncryptedPayload.md) |  |  |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::NotifyTokenUpdatedRequestSchema.new(
  response_host: site2.payment-app-provider.com,
  request_id: 123456,
  encrypted_payload: null
)
```

