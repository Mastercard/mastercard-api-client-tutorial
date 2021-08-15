# OpenapiClient::TokenizeApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**create_tokenize**](TokenizeApi.md#create_tokenize) | **POST** /digitization/static/1/0/tokenize |  |


## create_tokenize

> <TokenizeResponseSchema> create_tokenize(opts)



Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 

### Examples

```ruby
require 'time'
require 'openapi_client'

api_instance = OpenapiClient::TokenizeApi.new
opts = {
  tokenize_request_schema: OpenapiClient::TokenizeRequestSchema.new({token_type: 'CLOUD', token_requestor_id: '98765432101', task_id: '123456', funding_account_info: OpenapiClient::FundingAccountInfo.new}) # TokenizeRequestSchema | A Tokenize request is used to digitize a PAN. 
}

begin
  
  result = api_instance.create_tokenize(opts)
  p result
rescue OpenapiClient::ApiError => e
  puts "Error when calling TokenizeApi->create_tokenize: #{e}"
end
```

#### Using the create_tokenize_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<TokenizeResponseSchema>, Integer, Hash)> create_tokenize_with_http_info(opts)

```ruby
begin
  
  data, status_code, headers = api_instance.create_tokenize_with_http_info(opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <TokenizeResponseSchema>
rescue OpenapiClient::ApiError => e
  puts "Error when calling TokenizeApi->create_tokenize_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **tokenize_request_schema** | [**TokenizeRequestSchema**](TokenizeRequestSchema.md) | A Tokenize request is used to digitize a PAN.  | [optional] |

### Return type

[**TokenizeResponseSchema**](TokenizeResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

