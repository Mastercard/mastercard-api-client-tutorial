# openapi_client.DeleteApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete_digitization**](DeleteApi.md#delete_digitization) | **POST** /digitization/static/1/0/delete | Used to delete one or more Tokens. The API is limited to 10 Tokens per request.


# **delete_digitization**
> DeleteResponseSchema delete_digitization()

Used to delete one or more Tokens. The API is limited to 10 Tokens per request.

This API is used to delete one or more Tokens.  The API is limited to 10 Tokens per request. MDES will coordinate the deactivation of the Tokens and notify any relevant parties that the Tokens have now been deactivated. 

### Example

```python
import time
import openapi_client
from openapi_client.api import delete_api
from openapi_client.model.gateway_errors_response import GatewayErrorsResponse
from openapi_client.model.delete_response_schema import DeleteResponseSchema
from openapi_client.model.errors_response import ErrorsResponse
from openapi_client.model.delete_request_schema import DeleteRequestSchema
from pprint import pprint
# Defining the host is optional and defaults to https://api.mastercard.com/mdes
# See configuration.py for a list of all supported configuration parameters.
configuration = openapi_client.Configuration(
    host = "https://api.mastercard.com/mdes"
)


# Enter a context with an instance of the API client
with openapi_client.ApiClient() as api_client:
    # Create an instance of the API class
    api_instance = delete_api.DeleteApi(api_client)
    delete_request_schema = DeleteRequestSchema(
        response_host="site2.payment-app-provider.com",
        request_id="123456",
        payment_app_instance_id="123456789",
        token_unique_references=[
            "DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45",
        ],
        caused_by="CARDHOLDER",
        reason="Lost/stolen device",
        reason_code="SUSPECTED_FRAUD",
    ) # DeleteRequestSchema | Contains the details of the request message.  (optional)

    # example passing only required values which don't have defaults set
    # and optional values
    try:
        # Used to delete one or more Tokens. The API is limited to 10 Tokens per request.
        api_response = api_instance.delete_digitization(delete_request_schema=delete_request_schema)
        pprint(api_response)
    except openapi_client.ApiException as e:
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

