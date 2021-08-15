# OpenapiClient::SuspendRequestSchema

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **response_host** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] |
| **request_id** | **String** | Unique identifier for the request.  |  |
| **payment_app_instance_id** | **String** | Identifier for the specific Mobile Payment App instance, unique across a given Wallet Identifier. This value cannot be changed after digitization. This field is alphanumeric and additionally web-safe base64 characters per RFC 4648 (minus \&quot;-\&quot;, underscore \&quot;_\&quot;) up to a maximum length of 48, &#x3D; should not be URL encoded. Conditional - not applicable for server based tokens but required otherwise.  | [optional] |
| **token_unique_references** | **Array&lt;String&gt;** | The specific Token to be suspended. Array of more or more valid references as assigned by MDES  |  |
| **caused_by** | **String** | Who or what caused the Token to be suspended. Must be either the &#39;CARDHOLDER&#39; (operation requested by the Cardholder) or &#39;TOKEN_REQUESTOR&#39; (operation requested by the token requestor).  |  |
| **reason** | **String** | Free form reason why the Tokens are being suspended.  | [optional] |
| **reason_code** | **String** | The reason for the action to be suspended. Must be one of &#39;SUSPECTED_FRAUD&#39; (suspected fraudulent token transactions), &#39;OTHER&#39; (Other - default used if value not provided).  |  |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::SuspendRequestSchema.new(
  response_host: site2.payment-app-provider.com,
  request_id: 123456,
  payment_app_instance_id: 123456789,
  token_unique_references: DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45,
  caused_by: CARDHOLDER,
  reason: Lost/stolen device,
  reason_code: SUSPECTED_FRAUD
)
```

