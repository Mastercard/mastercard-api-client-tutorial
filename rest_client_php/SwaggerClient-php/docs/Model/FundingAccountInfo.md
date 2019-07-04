# FundingAccountInfo

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**pan_unique_reference** | **string** | __(CONDITIONAL)__ &lt;br&gt;  For repeat digitizations, the unique reference allocated to the Primary Account Number. When supplied, the tokenUniqueReferenceForPanInfo, accountNumber, expiryMonth and expiryYear must be omitted from CardInfoData.   Only allowed if  tokenUniqueReferenceForPanInfo is not present and encrypted data does not contain the account information. &lt;br&gt; __Max Length:64__ | [optional] 
**token_unique_reference** | **string** | __(CONDITIONAL)__&lt;br&gt;  A unique reference assigned following the allocation of a token used to identify the token for the duration of its lifetime.  For repeat digitizations, the unique reference allocated to the token will be used to retrieve the financial account information. When supplied, the account information is omitted from FundingAccountData &lt;br&gt; __Max Length:64__ | [optional] 
**encrypted_payload** | [**\Swagger\Client\Model\FundingAccountInfoEncryptedPayload**](FundingAccountInfoEncryptedPayload.md) | __(CONDITIONAL)__ | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


