# openapi_client.SearchTokensApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**search_tokens**](SearchTokensApi.md#search_tokens) | **POST** /digitization/static/1/0/searchTokens | Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.


# **search_tokens**
> SearchTokensResponseSchema search_tokens()

Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.

This API is used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN. It may be used to check current Token(s) state or, in exception scenarios (such as network time out), to ensure that external systems remain in sync with the Token state as maintained by MDES. Deactivated tokens are not returned. 

### Example

```python
import time
import openapi_client
from openapi_client.api import search_tokens_api
from openapi_client.model.gateway_errors_response import GatewayErrorsResponse
from openapi_client.model.search_tokens_response_schema import SearchTokensResponseSchema
from openapi_client.model.errors_response import ErrorsResponse
from openapi_client.model.search_tokens_request_schema import SearchTokensRequestSchema
from pprint import pprint
# Defining the host is optional and defaults to https://api.mastercard.com/mdes
# See configuration.py for a list of all supported configuration parameters.
configuration = openapi_client.Configuration(
    host = "https://api.mastercard.com/mdes"
)


# Enter a context with an instance of the API client
with openapi_client.ApiClient() as api_client:
    # Create an instance of the API class
    api_instance = search_tokens_api.SearchTokensApi(api_client)
    search_tokens_request_schema = SearchTokensRequestSchema(
        request_id="123456",
        response_host="site2.payment-app-provider.com",
        funding_account_info=FundingAccountInfo(
            pan_unique_reference="pan_unique_reference_example",
            token_unique_reference="token_unique_reference_example",
            encrypted_payload=FundingAccountInfoEncryptedPayload(
                public_key_fingerprint="4c4ead5927f0df8117f178eea9308daa58e27c2b",
                encrypted_key="A1B2C3D4E5F6112233445566",
                oaep_hashing_algorithm="SHA512",
                iv="NA",
                encrypted_data=FundingAccountData(
                    card_account_data=CardAccountDataInbound(
                        account_number="5123456789012345",
                        expiry_month="09",
                        expiry_year="21",
                        security_code="123",
                    ),
                    account_holder_data=AccountHolderData(
                        account_holder_name="account_holder_name_example",
                        account_holder_address=BillingAddress(
                            line1="100 1st Street",
                            line2="Apt. 4B",
                            city="St. Louis",
                            country_subdivision="MO",
                            postal_code="61000",
                            country="USA",
                        ),
                        consumer_identifier="consumer_identifier_example",
                        account_holder_email_address="account_holder_email_address_example",
                        account_holder_mobile_phone_number=PhoneNumber(
                            country_dial_in_code=44,
                            phone_number=3.14,
                        ),
                    ),
                    source="ACCOUNT_ON_FILE",
                ),
            ),
        ),
        token_requestor_id="98765432101",
    ) # SearchTokensRequestSchema | Contains the details of the request message.  (optional)

    # example passing only required values which don't have defaults set
    # and optional values
    try:
        # Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.
        api_response = api_instance.search_tokens(search_tokens_request_schema=search_tokens_request_schema)
        pprint(api_response)
    except openapi_client.ApiException as e:
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

