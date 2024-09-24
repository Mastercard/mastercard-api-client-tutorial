# openapi_client.SearchTokensApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**search_tokens**](SearchTokensApi.md#search_tokens) | **POST** /digitization/static/1/0/searchTokens | Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.


# **search_tokens**
> SearchTokensResponseSchema search_tokens(search_tokens_request_schema=search_tokens_request_schema)

Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.

This API is used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN. It may be used to check current Token(s) state or, in exception scenarios (such as network time out), to ensure that external systems remain in sync with the Token state as maintained by MDES. Deactivated tokens are not returned. 

### Example


```python
import openapi_client
from openapi_client.models.search_tokens_request_schema import SearchTokensRequestSchema
from openapi_client.models.search_tokens_response_schema import SearchTokensResponseSchema
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
    api_instance = openapi_client.SearchTokensApi(api_client)
    search_tokens_request_schema = openapi_client.SearchTokensRequestSchema() # SearchTokensRequestSchema | Contains the details of the request message.  (optional)

    try:
        # Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.
        api_response = api_instance.search_tokens(search_tokens_request_schema=search_tokens_request_schema)
        print("The response of SearchTokensApi->search_tokens:\n")
        pprint(api_response)
    except Exception as e:
        print("Exception when calling SearchTokensApi->search_tokens: %s\n" % e)
```



### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **search_tokens_request_schema** | [**SearchTokensRequestSchema**](SearchTokensRequestSchema.md)| Contains the details of the request message.  | [optional] 

### Return type

[**SearchTokensResponseSchema**](SearchTokensResponseSchema.md)

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

