# OpenapiClient::DeleteApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**delete_digitization**](DeleteApi.md#delete_digitization) | **POST** /digitization/static/1/0/delete | Used to delete one or more Tokens. The API is limited to 10 Tokens per request. |


## delete_digitization

> <DeleteResponseSchema> delete_digitization(opts)

Used to delete one or more Tokens. The API is limited to 10 Tokens per request.

This API is used to delete one or more Tokens.  The API is limited to 10 Tokens per request. MDES will coordinate the deactivation of the Tokens and notify any relevant parties that the Tokens have now been deactivated. 

### Examples

```ruby
require 'time'
require 'openapi_client'

api_instance = OpenapiClient::DeleteApi.new
opts = {
  delete_request_schema: OpenapiClient::DeleteRequestSchema.new({request_id: '123456', token_unique_references: ['token_unique_references_example'], caused_by: 'CARDHOLDER', reason_code: 'SUSPECTED_FRAUD'}) # DeleteRequestSchema | Contains the details of the request message. 
}

begin
  # Used to delete one or more Tokens. The API is limited to 10 Tokens per request.
  result = api_instance.delete_digitization(opts)
  p result
rescue OpenapiClient::ApiError => e
  puts "Error when calling DeleteApi->delete_digitization: #{e}"
end
```

#### Using the delete_digitization_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<DeleteResponseSchema>, Integer, Hash)> delete_digitization_with_http_info(opts)

```ruby
begin
  # Used to delete one or more Tokens. The API is limited to 10 Tokens per request.
  data, status_code, headers = api_instance.delete_digitization_with_http_info(opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <DeleteResponseSchema>
rescue OpenapiClient::ApiError => e
  puts "Error when calling DeleteApi->delete_digitization_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **delete_request_schema** | [**DeleteRequestSchema**](DeleteRequestSchema.md) | Contains the details of the request message.  | [optional] |

### Return type

[**DeleteResponseSchema**](DeleteResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

