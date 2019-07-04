# SwaggerClient::DeleteApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete_digitization**](DeleteApi.md#delete_digitization) | **POST** /digitization/static/1/0/delete | Used to delete one or more Tokens. The API is limited to 10 Tokens per request.


# **delete_digitization**
> DeleteResponseSchema delete_digitization(opts)

Used to delete one or more Tokens. The API is limited to 10 Tokens per request.

This API is used to delete one or more Tokens.  The API is limited to 10 Tokens per request. MDES will coordinate the deactivation of the Tokens and notify any relevant parties that the Tokens have now been deactivated. 

### Example
```ruby
# load the gem
require 'swagger_client'

api_instance = SwaggerClient::DeleteApi.new

opts = { 
  delete_request_schema: SwaggerClient::DeleteRequestSchema.new # DeleteRequestSchema | Contains the details of the request message. 
}

begin
  #Used to delete one or more Tokens. The API is limited to 10 Tokens per request.
  result = api_instance.delete_digitization(opts)
  p result
rescue SwaggerClient::ApiError => e
  puts "Exception when calling DeleteApi->delete_digitization: #{e}"
end
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **delete_request_schema** | [**DeleteRequestSchema**](DeleteRequestSchema.md)| Contains the details of the request message.  | [optional] 

### Return type

[**DeleteResponseSchema**](DeleteResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json



