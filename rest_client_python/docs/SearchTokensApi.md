# swagger_client.SearchTokensApi

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
from __future__ import print_function
import time
import swagger_client
from swagger_client.rest import ApiException
from pprint import pprint

# create an instance of the API class
api_instance = swagger_client.SearchTokensApi()
search_tokens_request_schema = swagger_client.SearchTokensRequestSchema() # SearchTokensRequestSchema | Contains the details of the request message.  (optional)

try:
    # Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.
    api_response = api_instance.search_tokens(search_tokens_request_schema=search_tokens_request_schema)
    pprint(api_response)
except ApiException as e:
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

