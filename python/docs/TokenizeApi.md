# openapi_client.TokenizeApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**create_tokenize**](TokenizeApi.md#create_tokenize) | **POST** /digitization/static/1/0/tokenize | 


# **create_tokenize**
> TokenizeResponseSchema create_tokenize(tokenize_request_schema=tokenize_request_schema)



Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 

### Example


```python
import openapi_client
from openapi_client.models.tokenize_request_schema import TokenizeRequestSchema
from openapi_client.models.tokenize_response_schema import TokenizeResponseSchema
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
    api_instance = openapi_client.TokenizeApi(api_client)
    tokenize_request_schema = openapi_client.TokenizeRequestSchema() # TokenizeRequestSchema | A Tokenize request is used to digitize a PAN.  (optional)

    try:
        api_response = api_instance.create_tokenize(tokenize_request_schema=tokenize_request_schema)
        print("The response of TokenizeApi->create_tokenize:\n")
        pprint(api_response)
    except Exception as e:
        print("Exception when calling TokenizeApi->create_tokenize: %s\n" % e)
```



### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tokenize_request_schema** | [**TokenizeRequestSchema**](TokenizeRequestSchema.md)| A Tokenize request is used to digitize a PAN.  | [optional] 

### Return type

[**TokenizeResponseSchema**](TokenizeResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

### HTTP response details

| Status code | Description | Response headers |
|-------------|-------------|------------------|
**200** | Contains the details of the token response message when a push account receipt is supplied in the tokenize request.  |  -  |
**401** | Example gateway error response  |  -  |
**500** | Example application error response  |  -  |

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

