# openapi_client.DeleteApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete_digitization**](DeleteApi.md#delete_digitization) | **POST** /digitization/static/1/0/delete | Used to delete one or more Tokens. The API is limited to 10 Tokens per request.


# **delete_digitization**
> DeleteResponseSchema delete_digitization(delete_request_schema=delete_request_schema)

Used to delete one or more Tokens. The API is limited to 10 Tokens per request.

This API is used to delete one or more Tokens.  The API is limited to 10 Tokens per request. MDES will coordinate the deactivation of the Tokens and notify any relevant parties that the Tokens have now been deactivated. 

### Example


```python
import openapi_client
from openapi_client.models.delete_request_schema import DeleteRequestSchema
from openapi_client.models.delete_response_schema import DeleteResponseSchema
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
    api_instance = openapi_client.DeleteApi(api_client)
    delete_request_schema = openapi_client.DeleteRequestSchema() # DeleteRequestSchema | Contains the details of the request message.  (optional)

    try:
        # Used to delete one or more Tokens. The API is limited to 10 Tokens per request.
        api_response = api_instance.delete_digitization(delete_request_schema=delete_request_schema)
        print("The response of DeleteApi->delete_digitization:\n")
        pprint(api_response)
    except Exception as e:
        print("Exception when calling DeleteApi->delete_digitization: %s\n" % e)
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

### HTTP response details

| Status code | Description | Response headers |
|-------------|-------------|------------------|
**200** | Contains the details of the response message.  |  -  |
**401** | Example gateway error response  |  -  |
**500** | Example application error response  |  -  |

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

