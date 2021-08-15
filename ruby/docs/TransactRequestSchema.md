# OpenapiClient::TransactRequestSchema

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **response_host** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] |
| **request_id** | **String** | Unique identifier for the request.  |  |
| **token_unique_reference** | **String** | Globally unique identifier for the Token, as assigned by MDES.  |  |
| **dsrp_type** | **String** | What type of DSRP cryptogram to create. Must be UCAF.  |  |
| **unpredictable_number** | **String** | HEX Encoded data (case sensitive) provided by the merchant to provide variability and uniqueness to the generation of a cryptogram.  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::TransactRequestSchema.new(
  response_host: site2.payment-app-provider.com,
  request_id: 123456,
  token_unique_reference: DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45,
  dsrp_type: UCAF,
  unpredictable_number: 23424563
)
```

