# openapi_client.TransactApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**create_transact**](TransactApi.md#create_transact) | **POST** /remotetransaction/static/1/0/transact | Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.


# **create_transact**
> TransactResponseSchema create_transact(transact_request_schema=transact_request_schema)

Used by the Token Requestor to create a Digital Secure Remote Payment (\"DSRP\") transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.

This API is used by the Token Requestor to create a Digital Secure Remote Payment (\"DSRP\") transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction through a payment processor.  The entire response is encrypted. The caller may only transact using the Tokens belonging to them. 

### Example


```python
import openapi_client
from openapi_client.models.transact_request_schema import TransactRequestSchema
from openapi_client.models.transact_response_schema import TransactResponseSchema
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
    api_instance = openapi_client.TransactApi(api_client)
    transact_request_schema = openapi_client.TransactRequestSchema() # TransactRequestSchema | Contains the details of the request message.  (optional)

    try:
        # Used by the Token Requestor to create a Digital Secure Remote Payment (\"DSRP\") transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.
        api_response = api_instance.create_transact(transact_request_schema=transact_request_schema)
        print("The response of TransactApi->create_transact:\n")
        pprint(api_response)
    except Exception as e:
        print("Exception when calling TransactApi->create_transact: %s\n" % e)
```



### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **transact_request_schema** | [**TransactRequestSchema**](TransactRequestSchema.md)| Contains the details of the request message.  | [optional] 

### Return type

[**TransactResponseSchema**](TransactResponseSchema.md)

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

