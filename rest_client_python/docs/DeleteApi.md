# swagger_client.DeleteApi

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
from __future__ import print_function
import time
import swagger_client
from swagger_client.rest import ApiException
from pprint import pprint

# create an instance of the API class
api_instance = swagger_client.DeleteApi()
delete_request_schema = swagger_client.DeleteRequestSchema() # DeleteRequestSchema | Contains the details of the request message.  (optional)

try:
    # Used to delete one or more Tokens. The API is limited to 10 Tokens per request.
    api_response = api_instance.delete_digitization(delete_request_schema=delete_request_schema)
    pprint(api_response)
except ApiException as e:
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

