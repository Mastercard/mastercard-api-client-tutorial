# OpenapiClient::GetTaskStatusApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**get_task_status**](GetTaskStatusApi.md#get_task_status) | **POST** /digitization/static/1/0/getTaskStatus | Used to check the status of any asynchronous task that was previously requested. |


## get_task_status

> <GetTaskStatusResponseSchema> get_task_status(opts)

Used to check the status of any asynchronous task that was previously requested.

Used to check the status of any asynchronous task that was previously requested. 

### Examples

```ruby
require 'time'
require 'openapi_client'

api_instance = OpenapiClient::GetTaskStatusApi.new
opts = {
  get_task_status_request_schema: OpenapiClient::GetTaskStatusRequestSchema.new({request_id: '123456', token_requestor_id: '98765432101', task_id: '123456'}) # GetTaskStatusRequestSchema | Contains the details of the request message. 
}

begin
  # Used to check the status of any asynchronous task that was previously requested.
  result = api_instance.get_task_status(opts)
  p result
rescue OpenapiClient::ApiError => e
  puts "Error when calling GetTaskStatusApi->get_task_status: #{e}"
end
```

#### Using the get_task_status_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<GetTaskStatusResponseSchema>, Integer, Hash)> get_task_status_with_http_info(opts)

```ruby
begin
  # Used to check the status of any asynchronous task that was previously requested.
  data, status_code, headers = api_instance.get_task_status_with_http_info(opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <GetTaskStatusResponseSchema>
rescue OpenapiClient::ApiError => e
  puts "Error when calling GetTaskStatusApi->get_task_status_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **get_task_status_request_schema** | [**GetTaskStatusRequestSchema**](GetTaskStatusRequestSchema.md) | Contains the details of the request message.  | [optional] |

### Return type

[**GetTaskStatusResponseSchema**](GetTaskStatusResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

