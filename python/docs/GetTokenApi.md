# openapi_client.GetTokenApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**get_token**](GetTokenApi.md#get_token) | **POST** /digitization/static/1/0/getToken | Used to get the status and details of a single given Token.


# **get_token**
> GetTokenResponseSchema get_token()

Used to get the status and details of a single given Token.

This API is used to get the status and details of a single given Token. It may be used to check current Token state or in exception scenarios (such as network time out) to ensure that external systems remain in sync with the Token state as maintained by MDES. Optionally, if requested, the token number can also be provided in the response (in encrypted form). 

### Example

```python
import time
import openapi_client
from openapi_client.api import get_token_api
from openapi_client.model.get_token_response_schema import GetTokenResponseSchema
from openapi_client.model.gateway_errors_response import GatewayErrorsResponse
from openapi_client.model.errors_response import ErrorsResponse
from openapi_client.model.get_token_request_schema import GetTokenRequestSchema
from pprint import pprint
# Defining the host is optional and defaults to https://api.mastercard.com/mdes
# See configuration.py for a list of all supported configuration parameters.
configuration = openapi_client.Configuration(
    host = "https://api.mastercard.com/mdes"
)


# Enter a context with an instance of the API client
with openapi_client.ApiClient() as api_client:
    # Create an instance of the API class
    api_instance = get_token_api.GetTokenApi(api_client)
    get_token_request_schema = GetTokenRequestSchema(
        response_host="site2.payment-app-provider.com",
        request_id="123456",
        payment_app_instance_id="123456789",
        token_unique_reference="DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45",
        include_token_detail="true",
    ) # GetTokenRequestSchema | Contains the details of the request message.  (optional)

    # example passing only required values which don't have defaults set
    # and optional values
    try:
        # Used to get the status and details of a single given Token.
        api_response = api_instance.get_token(get_token_request_schema=get_token_request_schema)
        pprint(api_response)
    except openapi_client.ApiException as e:
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

