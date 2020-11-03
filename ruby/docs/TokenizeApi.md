# OpenapiClient::TokenizeApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**create_tokenize**](TokenizeApi.md#create_tokenize) | **POST** /digitization/static/1/0/tokenize | Used to digitize a card to create a server-based Token.



## create_tokenize

> TokenizeResponseSchema create_tokenize(opts)

Used to digitize a card to create a server-based Token.

Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 

### Example

```ruby
# load the gem
require 'openapi_client'

api_instance = OpenapiClient::TokenizeApi.new
opts = {
  tokenize_request_schema: OpenapiClient::TokenizeRequestSchema.new # TokenizeRequestSchema | A Tokenize request is used to digitize a PAN.  
}

begin
  #Used to digitize a card to create a server-based Token.
  result = api_instance.create_tokenize(opts)
  p result
rescue OpenapiClient::ApiError => e
  puts "Exception when calling TokenizeApi->create_tokenize: #{e}"
end
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tokenize_request_schema** | [**TokenizeRequestSchema**](TokenizeRequestSchema.md)| A Tokenize request is used to digitize a PAN.   | [optional] 

### Return type

[**TokenizeResponseSchema**](TokenizeResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

