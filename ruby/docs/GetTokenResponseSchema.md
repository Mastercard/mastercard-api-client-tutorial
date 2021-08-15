# OpenapiClient::GetTokenResponseSchema

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **response_id** | **String** | Unique identifier for the response.  | [optional] |
| **token** | [**TokenForGetToken**](TokenForGetToken.md) |  | [optional] |
| **token_detail** | [**TokenDetailGetTokenOnly**](TokenDetailGetTokenOnly.md) |  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::GetTokenResponseSchema.new(
  response_id: 123456,
  token: null,
  token_detail: null
)
```

