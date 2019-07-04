# SwaggerClient::GetTokenApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**get_token**](GetTokenApi.md#get_token) | **POST** /digitization/static/1/0/getToken | Used to get the status and details of a single given Token.


# **get_token**
> GetTokenResponseSchema get_token(opts)

Used to get the status and details of a single given Token.

This API is used to get the status and details of a single given Token. It may be used to check current Token state or in exception scenarios (such as network time out) to ensure that external systems remain in sync with the Token state as maintained by MDES. Optionally, if requested, the token number can also be provided in the response (in encrypted form).  

### Example
```ruby
# load the gem
require 'swagger_client'

api_instance = SwaggerClient::GetTokenApi.new

opts = { 
  get_token_request_schema: SwaggerClient::GetTokenRequestSchema.new # GetTokenRequestSchema | Contains the details of the request message. 
}

begin
  #Used to get the status and details of a single given Token.
  result = api_instance.get_token(opts)
  p result
rescue SwaggerClient::ApiError => e
  puts "Exception when calling GetTokenApi->get_token: #{e}"
end
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **get_token_request_schema** | [**GetTokenRequestSchema**](GetTokenRequestSchema.md)| Contains the details of the request message.  | [optional] 

### Return type

[**GetTokenResponseSchema**](GetTokenResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json



