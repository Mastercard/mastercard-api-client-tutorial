# openapi_client.NotifyTokenUpdatedApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**notify_token_update__for_token_state_change**](NotifyTokenUpdatedApi.md#notify_token_update__for_token_state_change) | **POST** /digitization/static/1/0/notifyTokenUpdated | Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.


# **notify_token_update__for_token_state_change**
> NotifyTokenUpdatedResponseSchema notify_token_update__for_token_state_change()

Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.

This API is used by MDES to notify the Token Requestor of significant Token updates. Typical notification scenarios include  1. Informing the merchant a token is active 2. Informing the merchant a token has been suspended by the Issuer 3. Informing the merchant a token has been unsuspended by the Issuer 4. Informing the merchant a token has been deleted by the Issuer 5. Informing the merchant of a product configuration change (such as a change in Card Art) 6. Informing the merchant of underlying changes to the FPAN metadata associated to the token  **Connection Security**  Mastercard will connect via TLS protocol and verify the server certificate before establishing a connection to the client endpoint. During this handshake, the client server can request TLS client authentication. Mastercard will present a client certificate which identifies as ?ws.mastercard.com? This client certificate is issued by the Entrust L1K certificate and should be available in most trust stores.   **Conditional Objects**  The contents of the notifyTokenUpdated API will vary depending which of the above scneraios triggered the notification.  1. *productConfig* - Provided when Product Configuration has changed (e.g. such as card art). 2. *tokenInfo* - Provided when either the details of the token or associated FPAN have changed (such as token or PAN expiry).   The optional objects will always contain a minimum set of data which be returned regardless of whether or not updates have been made. These fields are denoted as required fields. 

### Example

```python
import time
import openapi_client
from openapi_client.api import notify_token_updated_api
from openapi_client.model.notify_token_updated_response_schema import NotifyTokenUpdatedResponseSchema
from openapi_client.model.notify_token_updated_request_schema import NotifyTokenUpdatedRequestSchema
from pprint import pprint
# Defining the host is optional and defaults to https://api.mastercard.com/mdes
# See configuration.py for a list of all supported configuration parameters.
configuration = openapi_client.Configuration(
    host = "https://api.mastercard.com/mdes"
)


# Enter a context with an instance of the API client
with openapi_client.ApiClient() as api_client:
    # Create an instance of the API class
    api_instance = notify_token_updated_api.NotifyTokenUpdatedApi(api_client)
    notify_token_updated_request_schema = NotifyTokenUpdatedRequestSchema(
        response_host="site2.payment-app-provider.com",
        request_id="123456",
        encrypted_payload=EncryptedPayload(
            public_key_fingerprint="4c4ead5927f0df8117f178eea9308daa58e27c2b",
            encrypted_key="A1B2C3D4E5F6112233445566",
            oaep_hashing_algorithm="SHA512",
            iv="NA",
            encrypted_data=NotifyTokenEncryptedPayload(
                tokens=[
                    TokenForNTU(
                        token_unique_reference="DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45",
                        token_requestor_id="98765432101",
                        status="SUSPENDED",
                        event_reason_code="SUSPECTED_FRAUD",
                        suspended_by=[
                            "CARDHOLDER",
                        ],
                        status_timestamp="status_timestamp_example",
                        product_config=ProductConfig(
                            brand_logo_asset_id="800200c9-629d-11e3-949a-0739d27e5a66",
                            issuer_logo_asset_id="dbc55444-986a-4896-b41c-5d5e2dd431e2",
                            is_co_branded=True,
                            co_brand_name="Co brand partner",
                            co_brand_logo_asset_id="dbc55444-496a-4896-b41c-5d5e2dd431e2",
                            card_background_combined_asset_id="739d27e5-629d-11e3-949a-0800200c9a66",
                            card_background_asset_id="456d27e5-629d-11e3-949a-0800200c9a66",
                            icon_asset_id="739d87e5-629d-11e3-949a-0800200c9a66",
                            foreground_color="0",
                            issuer_name="Issuing Bank",
                            short_description="Bank Rewards MasterCard",
                            long_description="Bank Rewards MasterCard with the super duper rewards program",
                            customer_service_url="https://bank.com/customerservice",
                            customer_service_email="customerservice@bank.com",
                            customer_service_phone_number="1234567891",
                            issuer_mobile_app={},
                            online_banking_login_url="bank.com",
                            terms_and_conditions_url="https://bank.com/termsAndConditions",
                            privacy_policy_url="https://bank.com/privacy",
                            issuer_product_config_code="123456",
                        ),
                        token_info=TokenInfoForNTUAndGetToken(
                            token_pan_suffix="0001",
                            account_pan_prefix="500000",
                            account_pan_suffix="0011",
                            token_expiry="921",
                            account_pan_expiry="921",
                            dsrp_capable="true",
                            token_assurance_level=3,
                            product_category="CREDIT",
                        ),
                    ),
                ],
            ),
        ),
    ) # NotifyTokenUpdatedRequestSchema | Contains the details of the request message.  (optional)

    # example passing only required values which don't have defaults set
    # and optional values
    try:
        # Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.
        api_response = api_instance.notify_token_update__for_token_state_change(notify_token_updated_request_schema=notify_token_updated_request_schema)
        pprint(api_response)
    except openapi_client.ApiException as e:
        print("Exception when calling NotifyTokenUpdatedApi->notify_token_update__for_token_state_change: %s\n" % e)
```


### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **notify_token_updated_request_schema** | [**NotifyTokenUpdatedRequestSchema**](NotifyTokenUpdatedRequestSchema.md)| Contains the details of the request message.  | [optional]

### Return type

[**NotifyTokenUpdatedResponseSchema**](NotifyTokenUpdatedResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json


### HTTP response details
| Status code | Description | Response headers |
|-------------|-------------|------------------|
**200** | Contains the details of the response message.  |  -  |

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

