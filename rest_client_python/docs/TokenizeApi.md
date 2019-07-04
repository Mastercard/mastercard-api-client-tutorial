# swagger_client.TokenizeApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**create_tokenize**](TokenizeApi.md#create_tokenize) | **POST** /digitization/static/1/0/tokenize | Used to digitize a card to create a server-based Token.


# **create_tokenize**
> TokenizeResponseSchema create_tokenize(tokenize_request_schema=tokenize_request_schema)

Used to digitize a card to create a server-based Token.

Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 

### Example
```python
from __future__ import print_function
import time
import swagger_client
from swagger_client.rest import ApiException
from pprint import pprint

# create an instance of the API class
api_instance = swagger_client.TokenizeApi()
tokenize_request_schema = swagger_client.TokenizeRequestSchema() # TokenizeRequestSchema | A Tokenize request is used to digitize a PAN.   (optional)

try:
    # Used to digitize a card to create a server-based Token.
    api_response = api_instance.create_tokenize(tokenize_request_schema=tokenize_request_schema)
    pprint(api_response)
except ApiException as e:
    print("Exception when calling TokenizeApi->create_tokenize: %s\n" % e)
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tokenize_request_schema** | [**TokenizeRequestSchema**](TokenizeRequestSchema.md)| A Tokenize request is used to digitize a PAN.   | [optional] 

### Return type

[**TokenizeResponseSchema**](TokenizeResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

