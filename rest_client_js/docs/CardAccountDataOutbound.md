# MdesForMerchants.CardAccountDataOutbound

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**accountNumber** | **String** | The account number of the credit or debit card.   &lt;br&gt;Only supplied in tokenization requests if panUniqueReference or tokenUniqueReferenceForPanInfo is not present.  &lt;br&gt; Only returned in tokenization response if a pushAccountReceipt was supplied in the tokenization request and if there is account holder data associated with the push account receipt in case that the issuer decision is APPROVED  __Min Length:9__&lt;br&gt;  __Max Length:19__  | [optional] 
**expiryMonth** | **String** |   The expiry month for the account. Two numeric digits must be supplied.  &lt;br&gt;Only supplied in tokenization requests if panUniqueReference or tokenUniqueReferenceForPanInfo is not present. &lt;br&gt; Only returned in tokenization response if a pushAccountReceipt was supplied in the tokenization request and if there is account holder data associated with the push account receipt in case that the issuer decision is APPROVED   __Format: MM__&lt;br&gt; __Exact Length:2__  | [optional] 
**expiryYear** | **String** | __(Required as minimum for Tokenization)__  The expiry year for the account. &lt;br&gt;Only supplied in tokenization requests if panUniqueReference or tokenUniqueReferenceForPanInfo is not present. &lt;br&gt; Only returned in tokenization response if a pushAccountReceipt was supplied in the tokenization request and if there is account holder data associated with the push account receipt in case that the issuer decision is APPROVED __Format: YY__ &lt;br&gt; __Exact Length:2__  | [optional] 


