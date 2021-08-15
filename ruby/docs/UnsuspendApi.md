# OpenapiClient::UnsuspendApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**create_unsuspend**](UnsuspendApi.md#create_unsuspend) | **POST** /digitization/static/1/0/unsuspend | Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request. |


## create_unsuspend

> <UnSuspendResponseSchema> create_unsuspend(opts)

Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.

This API is used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request. MDES will coordinate the unsuspension of the Tokens and notify any relevant parties that the Tokens have now been unsuspended. 

### Examples

```ruby
require 'time'
require 'openapi_client'

api_instance = OpenapiClient::UnsuspendApi.new
opts = {
  un_suspend_request_schema: OpenapiClient::UnSuspendRequestSchema.new({request_id: '123456', token_unique_references: ['token_unique_references_example'], caused_by: 'CARDHOLDER', reason_code: 'SUSPECTED_FRAUD'}) # UnSuspendRequestSchema | Contains the details of the request message. 
}

begin
  # Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.
  result = api_instance.create_unsuspend(opts)
  p result
rescue OpenapiClient::ApiError => e
  puts "Error when calling UnsuspendApi->create_unsuspend: #{e}"
end
```

#### Using the create_unsuspend_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<UnSuspendResponseSchema>, Integer, Hash)> create_unsuspend_with_http_info(opts)

```ruby
begin
  # Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.
  data, status_code, headers = api_instance.create_unsuspend_with_http_info(opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <UnSuspendResponseSchema>
rescue OpenapiClient::ApiError => e
  puts "Error when calling UnsuspendApi->create_unsuspend_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **un_suspend_request_schema** | [**UnSuspendRequestSchema**](UnSuspendRequestSchema.md) | Contains the details of the request message.  | [optional] |

### Return type

[**UnSuspendResponseSchema**](UnSuspendResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

