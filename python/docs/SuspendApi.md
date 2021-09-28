# openapi_client.SuspendApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**create_suspend**](SuspendApi.md#create_suspend) | **POST** /digitization/static/1/0/suspend | Used to temporarily suspend one or more Tokens.


# **create_suspend**
> SuspendResponseSchema create_suspend()

Used to temporarily suspend one or more Tokens.

This API is used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request. MDES will coordinate the suspension of the Tokens and notify any relevant parties that the Tokens have been suspended. A suspended Token can be unsuspended using the Unsuspend resource. 

### Example

```python
import time
import openapi_client
from openapi_client.api import suspend_api
from openapi_client.model.gateway_errors_response import GatewayErrorsResponse
from openapi_client.model.suspend_request_schema import SuspendRequestSchema
from openapi_client.model.errors_response import ErrorsResponse
from openapi_client.model.suspend_response_schema import SuspendResponseSchema
from pprint import pprint
# Defining the host is optional and defaults to https://api.mastercard.com/mdes
# See configuration.py for a list of all supported configuration parameters.
configuration = openapi_client.Configuration(
    host = "https://api.mastercard.com/mdes"
)


# Enter a context with an instance of the API client
with openapi_client.ApiClient() as api_client:
    # Create an instance of the API class
    api_instance = suspend_api.SuspendApi(api_client)
    suspend_request_schema = SuspendRequestSchema(
        response_host="site2.payment-app-provider.com",
        request_id="123456",
        payment_app_instance_id="123456789",
        token_unique_references=[
            "DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45",
        ],
        caused_by="CARDHOLDER",
        reason="Lost/stolen device",
        reason_code="SUSPECTED_FRAUD",
    ) # SuspendRequestSchema | Contains the details of the request message.  (optional)

    # example passing only required values which don't have defaults set
    # and optional values
    try:
        # Used to temporarily suspend one or more Tokens.
        api_response = api_instance.create_suspend(suspend_request_schema=suspend_request_schema)
        pprint(api_response)
    except openapi_client.ApiException as e:
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

