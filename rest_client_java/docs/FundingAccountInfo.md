
# FundingAccountInfo

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**panUniqueReference** | **String** |  __(CONDITIONAL)__ &lt;br&gt;  For repeat digitizations, the unique reference allocated to the Primary Account Number. When supplied, the tokenUniqueReferenceForPanInfo, accountNumber, expiryMonth and expiryYear must be omitted from CardInfoData.   Only allowed if  tokenUniqueReferenceForPanInfo is not present and encrypted data does not contain the account information. &lt;br&gt; __Max Length:64__  |  [optional]
**tokenUniqueReference** | **String** |  __(CONDITIONAL)__&lt;br&gt;  A unique reference assigned following the allocation of a token used to identify the token for the duration of its lifetime.  For repeat digitizations, the unique reference allocated to the token will be used to retrieve the financial account information. When supplied, the account information is omitted from FundingAccountData &lt;br&gt; __Max Length:64__  |  [optional]
**encryptedPayload** | [**FundingAccountInfoEncryptedPayload**](FundingAccountInfoEncryptedPayload.md) | __(CONDITIONAL)__   |  [optional]



