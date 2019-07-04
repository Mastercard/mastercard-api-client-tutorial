# swagger_client.GetTokenApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**get_token**](GetTokenApi.md#get_token) | **POST** /digitization/static/1/0/getToken | Used to get the status and details of a single given Token.


# **get_token**
> GetTokenResponseSchema get_token(get_token_request_schema=get_token_request_schema)

Used to get the status and details of a single given Token.

This API is used to get the status and details of a single given Token. It may be used to check current Token state or in exception scenarios (such as network time out) to ensure that external systems remain in sync with the Token state as maintained by MDES. Optionally, if requested, the token number can also be provided in the response (in encrypted form).  

### Example
```python
from __future__ import print_function
import time
import swagger_client
from swagger_client.rest import ApiException
from pprint import pprint

# create an instance of the API class
api_instance = swagger_client.GetTokenApi()
get_token_request_schema = swagger_client.GetTokenRequestSchema() # GetTokenRequestSchema | Contains the details of the request message.  (optional)

try:
    # Used to get the status and details of a single given Token.
    api_response = api_instance.get_token(get_token_request_schema=get_token_request_schema)
    pprint(api_response)
except ApiException as e:
    print("Exception when calling GetTokenApi->get_token: %s\n" % e)
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **get_token_request_schema** | [**GetTokenRequestSchema**](GetTokenRequestSchema.md)| Contains the details of the request message.  | [optional] 

### Return type

[**GetTokenResponseSchema**](GetTokenResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

