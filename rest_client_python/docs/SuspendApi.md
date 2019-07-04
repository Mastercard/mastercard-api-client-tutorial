# swagger_client.SuspendApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**create_suspend**](SuspendApi.md#create_suspend) | **POST** /digitization/static/1/0/suspend | Used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request.


# **create_suspend**
> SuspendResponseSchema create_suspend(suspend_request_schema=suspend_request_schema)

Used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request.

This API is used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request. MDES will coordinate the suspension of the Tokens and notify any relevant parties that the Tokens have been suspended. A suspended Token can be unsuspended using the Unsuspend resource. 

### Example
```python
from __future__ import print_function
import time
import swagger_client
from swagger_client.rest import ApiException
from pprint import pprint

# create an instance of the API class
api_instance = swagger_client.SuspendApi()
suspend_request_schema = swagger_client.SuspendRequestSchema() # SuspendRequestSchema | Contains the details of the request message.  (optional)

try:
    # Used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request.
    api_response = api_instance.create_suspend(suspend_request_schema=suspend_request_schema)
    pprint(api_response)
except ApiException as e:
    print("Exception when calling SuspendApi->create_suspend: %s\n" % e)
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

