# openapi_client.SuspendApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**create_suspend**](SuspendApi.md#create_suspend) | **POST** /digitization/static/1/0/suspend | Used to temporarily suspend one or more Tokens.


# **create_suspend**
> SuspendResponseSchema create_suspend(suspend_request_schema=suspend_request_schema)

Used to temporarily suspend one or more Tokens.

This API is used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request. MDES will coordinate the suspension of the Tokens and notify any relevant parties that the Tokens have been suspended. A suspended Token can be unsuspended using the Unsuspend resource. 

### Example


```python
import openapi_client
from openapi_client.models.suspend_request_schema import SuspendRequestSchema
from openapi_client.models.suspend_response_schema import SuspendResponseSchema
from openapi_client.rest import ApiException
from pprint import pprint

# Defining the host is optional and defaults to https://api.mastercard.com/mdes
# See configuration.py for a list of all supported configuration parameters.
configuration = openapi_client.Configuration(
    host = "https://api.mastercard.com/mdes"
)


# Enter a context with an instance of the API client
with openapi_client.ApiClient(configuration) as api_client:
    # Create an instance of the API class
    api_instance = openapi_client.SuspendApi(api_client)
    suspend_request_schema = openapi_client.SuspendRequestSchema() # SuspendRequestSchema | Contains the details of the request message.  (optional)

    try:
        # Used to temporarily suspend one or more Tokens.
        api_response = api_instance.create_suspend(suspend_request_schema=suspend_request_schema)
        print("The response of SuspendApi->create_suspend:\n")
        pprint(api_response)
    except Exception as e:
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

### HTTP response details

| Status code | Description | Response headers |
|-------------|-------------|------------------|
**200** | Contains the details of the response message.  |  -  |
**401** | Example gateway error response  |  -  |
**500** | Example application error response  |  -  |

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

