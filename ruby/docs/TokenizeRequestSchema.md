# OpenapiClient::TokenizeRequestSchema

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **response_host** | **String** | \&quot;The host that originated the request. Future calls in the same conversation may be routed to this host. Must be provided as: host[:port][/contextRoot] Where port and contextRoot are optional. If contextRoot is not provided, the default (per the URL Scheme) is assumed and must be used.\&quot;  | [optional] |
| **request_id** | **String** | Unique identifier for the request.  | [optional] |
| **token_type** | **String** | The type of Token requested. Must be CLOUD  |  |
| **token_requestor_id** | **String** | 11-digit numeric ID provided by Mastercard that identifies the Token Requestor.  |  |
| **task_id** | **String** | Identifier for this task as assigned by the Token Requestor, unique across a given Token Requestor Identifier. May be used in the Get Task Status API to query the status of this task.  |  |
| **funding_account_info** | [**FundingAccountInfo**](FundingAccountInfo.md) |  |  |
| **consumer_language** | **String** | Language preference selected by the consumer. Formatted as an ISO- 639-1 two-letter language code.  | [optional] |
| **tokenization_authentication_value** | **String** | The Tokenization Authentication Value (TAV) as cryptographically signed by the Issuer to authorize this digitization request.  | [optional] |
| **decisioning_data** | [**DecisioningData**](DecisioningData.md) |  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::TokenizeRequestSchema.new(
  response_host: site1.your-server.com,
  request_id: 123456,
  token_type: CLOUD,
  token_requestor_id: 98765432101,
  task_id: 123456,
  funding_account_info: null,
  consumer_language: en,
  tokenization_authentication_value: RHVtbXkgYmFzZSA2NCBkYXRhIC0gdGhpcyBpcyBub3QgYSByZWFsIFRBViBleGFtcGxl,
  decisioning_data: null
)
```

