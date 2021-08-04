# # TokenizeResponseSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **string** | The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host. | [optional]
**response_id** | **string** | Unique identifier for the response. | [optional]
**decision** | **string** | The tokenization decision for this digitization request. Must be either APPROVED (Digitization request was approved), DECLINED (Digitization request was declined) OR REQUIRE_ADDITIONAL_AUTHENTICATION Digitization request was approved but optionally requires additional authentication. One or more Authentication methods may be provided). | [optional]
**authentication_methods** | [**\DigitalEnablementClient\Model\AuthenticationMethods[]**](AuthenticationMethods.md) |  | [optional]
**token_unique_reference** | **string** | The unique reference allocated to the new Token. Serves as a unique identifier for all subsequent queries or management functions relating to this Token. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION. | [optional]
**pan_unique_reference** | **string** | The unique reference allocated to the Account Primary Account Number. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION. | [optional]
**product_config** | [**\DigitalEnablementClient\Model\ProductConfig**](ProductConfig.md) |  | [optional]
**token_info** | [**\DigitalEnablementClient\Model\TokenInfo**](TokenInfo.md) |  | [optional]
**token_detail** | [**\DigitalEnablementClient\Model\TokenDetail**](TokenDetail.md) |  | [optional]
**supports_authentication** | **bool** | (required)Flag to indicate if the issuer supports authentication of the cardholder on the token. Must be one of:   - TRUE   - FALSE | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
