# openapi_client.UnsuspendApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**create_unsuspend**](UnsuspendApi.md#create_unsuspend) | **POST** /digitization/static/1/0/unsuspend | Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.


# **create_unsuspend**
> UnSuspendResponseSchema create_unsuspend()

Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.

This API is used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request. MDES will coordinate the unsuspension of the Tokens and notify any relevant parties that the Tokens have now been unsuspended. 

### Example

```python
import time
import openapi_client
from openapi_client.api import unsuspend_api
from openapi_client.model.gateway_errors_response import GatewayErrorsResponse
from openapi_client.model.errors_response import ErrorsResponse
from openapi_client.model.un_suspend_response_schema import UnSuspendResponseSchema
from openapi_client.model.un_suspend_request_schema import UnSuspendRequestSchema
from pprint import pprint
# Defining the host is optional and defaults to https://api.mastercard.com/mdes
# See configuration.py for a list of all supported configuration parameters.
configuration = openapi_client.Configuration(
    host = "https://api.mastercard.com/mdes"
)


# Enter a context with an instance of the API client
with openapi_client.ApiClient() as api_client:
    # Create an instance of the API class
    api_instance = unsuspend_api.UnsuspendApi(api_client)
    un_suspend_request_schema = UnSuspendRequestSchema(
        response_host="site2.payment-app-provider.com",
        request_id="123456",
        payment_app_instance_id="123456789",
        token_unique_references=[
            "DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45",
        ],
        caused_by="CARDHOLDER",
        reason="Lost/stolen device",
        reason_code="SUSPECTED_FRAUD",
    ) # UnSuspendRequestSchema | Contains the details of the request message.  (optional)

    # example passing only required values which don't have defaults set
    # and optional values
    try:
        # Used to unsuspend one or more previously suspended Tokens. The API is limited to 10 Tokens per request.
        api_response = api_instance.create_unsuspend(un_suspend_request_schema=un_suspend_request_schema)
        pprint(api_response)
    except openapi_client.ApiException as e:
        print("Exception when calling UnsuspendApi->create_unsuspend: %s\n" % e)
```


### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **un_suspend_request_schema** | [**UnSuspendRequestSchema**](UnSuspendRequestSchema.md)| Contains the details of the request message.  | [optional]

### Return type

[**UnSuspendResponseSchema**](UnSuspendResponseSchema.md)

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

