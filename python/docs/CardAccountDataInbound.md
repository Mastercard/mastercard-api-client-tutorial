# CardAccountDataInbound

__(CONDITIONAL)__ <br> Required in Tokenize or Search Tokens unless a valid panUniqueReference, tokenUniqueReference or pushAccountReceipt is also given in FundingAccountInfo. 
## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_number** | **str** | The account number of the credit or debit card.   __(CONDITIONAL)__ &lt;br&gt;required in a Tokenize, or Get Digital Asset request, unless a valid panUniqueReference or tokenUniqueReference or pushAccountReceipt was given in FundingAccountInfo.  &lt;/br&gt;&lt;/br&gt;  __Min Length:9 (See note)__&lt;/br&gt; __Max Length:19__ &lt;/br&gt; &lt;/br&gt; __NOTE__: Only 6 digits can be supplied in SearchTokens if the TokenUniqueReference is provided in fundingAccountInfo.  | [optional] 
**expiry_month** | **str** |   The expiry month for the account. Two numeric digits must be supplied.  &lt;br&gt;Only supplied in tokenization requests if panUniqueReference or tokenUniqueReferenceForPanInfo or pushAccountReceipt is not present.  __Format: MM__&lt;br&gt; __Exact Length:2__  | [optional] 
**expiry_year** | **str** | __(Required as minimum for Tokenization)__  The expiry year for the account. &lt;br&gt;Only supplied in tokenization requests if panUniqueReference or tokenUniqueReferenceForPanInfo or pushAccountReceipt is not present.   __Format: YY__ &lt;br&gt; __Exact Length:2__  | [optional] 
**security_code** | **str** | __(OPTIONAL)__ The security code for the account can optionally be provided for Tokenization. If provided, the validity will be checked. &lt;br&gt; Optional in a Tokenize request, not present otherwise. __Max Length:3__  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


