# openapi_client.GetTaskStatusApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**get_task_status**](GetTaskStatusApi.md#get_task_status) | **POST** /digitization/static/1/0/getTaskStatus | Used to check the status of any asynchronous task that was previously requested.


# **get_task_status**
> GetTaskStatusResponseSchema get_task_status()

Used to check the status of any asynchronous task that was previously requested.

Used to check the status of any asynchronous task that was previously requested. 

### Example

```python
import time
import openapi_client
from openapi_client.api import get_task_status_api
from openapi_client.model.get_task_status_response_schema import GetTaskStatusResponseSchema
from openapi_client.model.get_task_status_request_schema import GetTaskStatusRequestSchema
from openapi_client.model.gateway_errors_response import GatewayErrorsResponse
from openapi_client.model.errors_response import ErrorsResponse
from pprint import pprint
# Defining the host is optional and defaults to https://api.mastercard.com/mdes
# See configuration.py for a list of all supported configuration parameters.
configuration = openapi_client.Configuration(
    host = "https://api.mastercard.com/mdes"
)


# Enter a context with an instance of the API client
with openapi_client.ApiClient() as api_client:
    # Create an instance of the API class
    api_instance = get_task_status_api.GetTaskStatusApi(api_client)
    get_task_status_request_schema = GetTaskStatusRequestSchema(
        response_host="site2.payment-app-provider.com",
        request_id="123456",
        token_requestor_id="98765432101",
        task_id="123456",
    ) # GetTaskStatusRequestSchema | Contains the details of the request message.  (optional)

    # example passing only required values which don't have defaults set
    # and optional values
    try:
        # Used to check the status of any asynchronous task that was previously requested.
        api_response = api_instance.get_task_status(get_task_status_request_schema=get_task_status_request_schema)
        pprint(api_response)
    except openapi_client.ApiException as e:
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


### HTTP response details
| Status code | Description | Response headers |
|-------------|-------------|------------------|
**200** | Contains the details of the response message.  |  -  |
**401** | Example gateway error response  |  -  |
**500** | Example application error response  |  -  |

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

