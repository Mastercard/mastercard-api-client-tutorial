# MdesForMerchants.FundingAccountInfo

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**panUniqueReference** | **String** |  __(CONDITIONAL)__ &lt;br&gt;  For repeat digitizations, the unique reference allocated to the Primary Account Number. When supplied, the tokenUniqueReferenceForPanInfo, accountNumber, expiryMonth and expiryYear must be omitted from CardInfoData. Only allowed if tokenUniqueReference and pushAccountReceipt are not present and encrypted data does not contain the account information. &lt;br&gt; __Max Length:64__  | [optional] 
**tokenUniqueReference** | **String** |  __(CONDITIONAL)__&lt;br&gt;  A unique reference assigned following the allocation of a token used to identify the token for the duration of its lifetime.  For repeat digitizations, the unique reference allocated to the token will be used to retrieve the financial account information. When supplied, the account information is omitted from FundingAccountData. Only allowed if panUniqueReference and pushAccountReceipt are not present and encrypted data does not contain the account information. &lt;br&gt; __Max Length:64__  | [optional] 
**pushAccountReceipt** | **String** | __(CONDITIONAL)__&lt;br&gt; The push account receipt is supplied by the Issuer to the Merchant during a push provisioning operation. The pushAccountReceipt is then submitted by the merchant in the tokenize request and will be used by MDES to retrieve the associated funding account information. Only allowed if panUniqueReference and tokenUniqueReference are not present and encrypted data does not contain the funding account information. Refer to the &lt;a href&#x3D;\&quot;https://developer.mastercard.com/page/push-provisioning-merchant\&quot;&gt;Push Provisioning Use Case Guide &lt;/a&gt;  for more information about pushAccountReceipt.  __Max Length:64__  | [optional] 
**encryptedPayload** | [**FundingAccountInfoEncryptedPayload**](FundingAccountInfoEncryptedPayload.md) |  | [optional] 


