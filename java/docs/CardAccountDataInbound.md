

# CardAccountDataInbound

**(CONDITIONAL)** Required in Tokenize or Search Tokens unless a valid panUniqueReference, tokenUniqueReference or pushAccountReceipt is also given in FundingAccountInfo. 

## Properties

| Name | Type | Description | Notes |
|------------ | ------------- | ------------- | -------------|
|**accountNumber** | **String** | The account number of the credit or debit card. **(CONDITIONAL)** required in a Tokenize, or Get Digital Asset request, unless a valid panUniqueReference or tokenUniqueReference or pushAccountReceipt was given in FundingAccountInfo. **NOTE**:Only 6 digits can be supplied in SearchTokens if the TokenUniqueReference is provided in fundingAccountInfo.  |  [optional] |
|**expiryMonth** | **String** | The expiry month for the account. Two numeric digits must be supplied. Only supplied in tokenization requests if panUniqueReference or tokenUniqueReferenceForPanInfo or pushAccountReceipt is not present. **Format: MM**  |  [optional] |
|**expiryYear** | **String** | **(Required as minimum for Tokenization)** The expiry year for the account. Only supplied in tokenization requests if panUniqueReference or tokenUniqueReferenceForPanInfo or pushAccountReceipt is not present. **Format: YY**  |  [optional] |
|**securityCode** | **String** | **(OPTIONAL)** The security code for the account can optionally be provided for Tokenization. If provided, the validity will be checked. Optional in a Tokenize request, not present otherwise.  |  [optional] |



