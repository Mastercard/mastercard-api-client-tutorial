# OpenapiClient::GetTaskStatusRequestSchema

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **response_host** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] |
| **request_id** | **String** | Unique identifier for the request.  |  |
| **token_requestor_id** | **String** | 11-digit numeric ID provided by Mastercard that identifies the Token Requestor.  |  |
| **task_id** | **String** | Unique identifier for this task. Must be an identifier previously used when requesting a task.  |  |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::GetTaskStatusRequestSchema.new(
  response_host: site2.payment-app-provider.com,
  request_id: 123456,
  token_requestor_id: 98765432101,
  task_id: 123456
)
```

