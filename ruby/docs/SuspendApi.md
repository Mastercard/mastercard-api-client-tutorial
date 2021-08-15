# OpenapiClient::SuspendApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**create_suspend**](SuspendApi.md#create_suspend) | **POST** /digitization/static/1/0/suspend | Used to temporarily suspend one or more Tokens. |


## create_suspend

> <SuspendResponseSchema> create_suspend(opts)

Used to temporarily suspend one or more Tokens.

This API is used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request. MDES will coordinate the suspension of the Tokens and notify any relevant parties that the Tokens have been suspended. A suspended Token can be unsuspended using the Unsuspend resource. 

### Examples

```ruby
require 'time'
require 'openapi_client'

api_instance = OpenapiClient::SuspendApi.new
opts = {
  suspend_request_schema: OpenapiClient::SuspendRequestSchema.new({request_id: '123456', token_unique_references: ['token_unique_references_example'], caused_by: 'CARDHOLDER', reason_code: 'SUSPECTED_FRAUD'}) # SuspendRequestSchema | Contains the details of the request message. 
}

begin
  # Used to temporarily suspend one or more Tokens.
  result = api_instance.create_suspend(opts)
  p result
rescue OpenapiClient::ApiError => e
  puts "Error when calling SuspendApi->create_suspend: #{e}"
end
```

#### Using the create_suspend_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<SuspendResponseSchema>, Integer, Hash)> create_suspend_with_http_info(opts)

```ruby
begin
  # Used to temporarily suspend one or more Tokens.
  data, status_code, headers = api_instance.create_suspend_with_http_info(opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <SuspendResponseSchema>
rescue OpenapiClient::ApiError => e
  puts "Error when calling SuspendApi->create_suspend_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **suspend_request_schema** | [**SuspendRequestSchema**](SuspendRequestSchema.md) | Contains the details of the request message.  | [optional] |

### Return type

[**SuspendResponseSchema**](SuspendResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

