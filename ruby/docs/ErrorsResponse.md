# OpenapiClient::ErrorsResponse

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **error_code** | **String** | **CONDITIONAL** Returned in the event of an error and contains the reason the operation failed. Only use if errors object is not present.  | [optional] |
| **error_description** | **String** | **CONDITIONAL** Returned in the event of an error and contains a description of why the operation failed. Only use if errors object is not present.  | [optional] |
| **response_host** | **String** | The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] |
| **response_id** | **String** | Unique identifier for the response.  | [optional] |
| **errors** | [**Error**](Error.md) |  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::ErrorsResponse.new(
  error_code: null,
  error_description: null,
  response_host: site2.payment-app-provider.com,
  response_id: 123456,
  errors: null
)
```

