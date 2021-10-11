# openapi_client.TokenizeApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**create_tokenize**](TokenizeApi.md#create_tokenize) | **POST** /digitization/static/1/0/tokenize | 


# **create_tokenize**
> TokenizeResponseSchema create_tokenize()



Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 

### Example

```python
import time
import openapi_client
from openapi_client.api import tokenize_api
from openapi_client.model.gateway_errors_response import GatewayErrorsResponse
from openapi_client.model.tokenize_request_schema import TokenizeRequestSchema
from openapi_client.model.errors_response import ErrorsResponse
from openapi_client.model.tokenize_response_schema import TokenizeResponseSchema
from pprint import pprint
# Defining the host is optional and defaults to https://api.mastercard.com/mdes
# See configuration.py for a list of all supported configuration parameters.
configuration = openapi_client.Configuration(
    host = "https://api.mastercard.com/mdes"
)


# Enter a context with an instance of the API client
with openapi_client.ApiClient() as api_client:
    # Create an instance of the API class
    api_instance = tokenize_api.TokenizeApi(api_client)
    tokenize_request_schema = TokenizeRequestSchema(
        response_host="site1.your-server.com",
        request_id="123456",
        token_type="CLOUD",
        token_requestor_id="98765432101",
        task_id="123456",
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
        consumer_language="en",
        tokenization_authentication_value="RHVtbXkgYmFzZSA2NCBkYXRhIC0gdGhpcyBpcyBub3QgYSByZWFsIFRBViBleGFtcGxl",
        decisioning_data=DecisioningData(
            recommendation="APPROVED",
            recommendation_algorithm_version="01",
            device_score="1",
            account_score="1",
            recommendation_reasons=[
                "LONG_ACCOUNT_TENURE",
            ],
            device_current_location="38.63,-90.25",
            device_ip_address="127.0.0.1",
            mobile_number_suffix="3456",
            account_id_hash="account_id_hash_example",
        ),
    ) # TokenizeRequestSchema | A Tokenize request is used to digitize a PAN.  (optional)

    # example passing only required values which don't have defaults set
    # and optional values
    try:
        api_response = api_instance.create_tokenize(tokenize_request_schema=tokenize_request_schema)
        pprint(api_response)
    except openapi_client.ApiException as e:
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

