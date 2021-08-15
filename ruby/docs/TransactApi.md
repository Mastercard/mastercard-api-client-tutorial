# OpenapiClient::TransactApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**create_transact**](TransactApi.md#create_transact) | **POST** /remotetransaction/static/1/0/transact | Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction. |


## create_transact

> <TransactResponseSchema> create_transact(opts)

Used by the Token Requestor to create a Digital Secure Remote Payment (\"DSRP\") transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.

This API is used by the Token Requestor to create a Digital Secure Remote Payment (\"DSRP\") transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction through a payment processor.  The entire response is encrypted. The caller may only transact using the Tokens belonging to them. 

### Examples

```ruby
require 'time'
require 'openapi_client'

api_instance = OpenapiClient::TransactApi.new
opts = {
  transact_request_schema: OpenapiClient::TransactRequestSchema.new({request_id: '123456', token_unique_reference: 'DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45', dsrp_type: 'UCAF'}) # TransactRequestSchema | Contains the details of the request message. 
}

begin
  # Used by the Token Requestor to create a Digital Secure Remote Payment (\"DSRP\") transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.
  result = api_instance.create_transact(opts)
  p result
rescue OpenapiClient::ApiError => e
  puts "Error when calling TransactApi->create_transact: #{e}"
end
```

#### Using the create_transact_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<TransactResponseSchema>, Integer, Hash)> create_transact_with_http_info(opts)

```ruby
begin
  # Used by the Token Requestor to create a Digital Secure Remote Payment (\"DSRP\") transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.
  data, status_code, headers = api_instance.create_transact_with_http_info(opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <TransactResponseSchema>
rescue OpenapiClient::ApiError => e
  puts "Error when calling TransactApi->create_transact_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **transact_request_schema** | [**TransactRequestSchema**](TransactRequestSchema.md) | Contains the details of the request message.  | [optional] |

### Return type

[**TransactResponseSchema**](TransactResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

