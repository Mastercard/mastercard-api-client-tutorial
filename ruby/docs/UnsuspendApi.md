# OpenapiClient::UnsuspendApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**create_unsuspend**](UnsuspendApi.md#create_unsuspend) | **POST** /digitization/static/1/0/unsuspend | Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.



## create_unsuspend

> UnSuspendResponseSchema create_unsuspend(opts)

Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.

This API is used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request. MDES will coordinate the unsuspension of the Tokens and notify any relevant parties that the Tokens have now been unsuspended. 

### Example

```ruby
# load the gem
require 'openapi_client'

api_instance = OpenapiClient::UnsuspendApi.new
opts = {
  unsuspend_request_schema: OpenapiClient::UnSuspendRequestSchema.new # UnSuspendRequestSchema | Contains the details of the request message. 
}

begin
  #Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.
  result = api_instance.create_unsuspend(opts)
  p result
rescue OpenapiClient::ApiError => e
  puts "Exception when calling UnsuspendApi->create_unsuspend: #{e}"
end
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **unsuspend_request_schema** | [**UnSuspendRequestSchema**](UnSuspendRequestSchema.md)| Contains the details of the request message.  | [optional] 

### Return type

[**UnSuspendResponseSchema**](UnSuspendResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

