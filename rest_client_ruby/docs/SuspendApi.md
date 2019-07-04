# SwaggerClient::SuspendApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**create_suspend**](SuspendApi.md#create_suspend) | **POST** /digitization/static/1/0/suspend | Used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request.


# **create_suspend**
> SuspendResponseSchema create_suspend(opts)

Used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request.

This API is used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request. MDES will coordinate the suspension of the Tokens and notify any relevant parties that the Tokens have been suspended. A suspended Token can be unsuspended using the Unsuspend resource. 

### Example
```ruby
# load the gem
require 'swagger_client'

api_instance = SwaggerClient::SuspendApi.new

opts = { 
  suspend_request_schema: SwaggerClient::SuspendRequestSchema.new # SuspendRequestSchema | Contains the details of the request message. 
}

begin
  #Used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request.
  result = api_instance.create_suspend(opts)
  p result
rescue SwaggerClient::ApiError => e
  puts "Exception when calling SuspendApi->create_suspend: #{e}"
end
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **suspend_request_schema** | [**SuspendRequestSchema**](SuspendRequestSchema.md)| Contains the details of the request message.  | [optional] 

### Return type

[**SuspendResponseSchema**](SuspendResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json



