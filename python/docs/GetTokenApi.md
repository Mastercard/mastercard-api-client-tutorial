# openapi_client.GetTokenApi

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
import openapi_client
from openapi_client.models.get_token_request_schema import GetTokenRequestSchema
from openapi_client.models.get_token_response_schema import GetTokenResponseSchema
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
    api_instance = openapi_client.GetTokenApi(api_client)
    get_token_request_schema = openapi_client.GetTokenRequestSchema() # GetTokenRequestSchema | Contains the details of the request message.  (optional)

    try:
        # Used to get the status and details of a single given Token.
        api_response = api_instance.get_token(get_token_request_schema=get_token_request_schema)
        print("The response of GetTokenApi->get_token:\n")
        pprint(api_response)
    except Exception as e:
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

### HTTP response details

| Status code | Description | Response headers |
|-------------|-------------|------------------|
**200** | Contains the details of the response message.  |  -  |
**401** | Example gateway error response  |  -  |
**500** | Example application error response  |  -  |

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

