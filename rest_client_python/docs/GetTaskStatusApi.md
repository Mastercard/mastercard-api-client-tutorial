# swagger_client.GetTaskStatusApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**get_task_status**](GetTaskStatusApi.md#get_task_status) | **POST** /digitization/static/1/0/getTaskStatus | Used to check the status of any asynchronous task that was previously requested.


# **get_task_status**
> GetTaskStatusResponseSchema get_task_status(get_task_status_request_schema=get_task_status_request_schema)

Used to check the status of any asynchronous task that was previously requested.

Used to check the status of any asynchronous task that was previously requested. 

### Example
```python
from __future__ import print_function
import time
import swagger_client
from swagger_client.rest import ApiException
from pprint import pprint

# create an instance of the API class
api_instance = swagger_client.GetTaskStatusApi()
get_task_status_request_schema = swagger_client.GetTaskStatusRequestSchema() # GetTaskStatusRequestSchema | Contains the details of the request message.  (optional)

try:
    # Used to check the status of any asynchronous task that was previously requested.
    api_response = api_instance.get_task_status(get_task_status_request_schema=get_task_status_request_schema)
    pprint(api_response)
except ApiException as e:
    print("Exception when calling GetTaskStatusApi->get_task_status: %s\n" % e)
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **get_task_status_request_schema** | [**GetTaskStatusRequestSchema**](GetTaskStatusRequestSchema.md)| Contains the details of the request message.  | [optional] 

### Return type

[**GetTaskStatusResponseSchema**](GetTaskStatusResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

