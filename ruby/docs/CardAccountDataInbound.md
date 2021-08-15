# OpenapiClient::CardAccountDataInbound

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **account_number** | **String** | The account number of the credit or debit card. **(CONDITIONAL)** required in a Tokenize, or Get Digital Asset request, unless a valid panUniqueReference or tokenUniqueReference or pushAccountReceipt was given in FundingAccountInfo. **NOTE**:Only 6 digits can be supplied in SearchTokens if the TokenUniqueReference is provided in fundingAccountInfo.  | [optional] |
| **expiry_month** | **String** | The expiry month for the account. Two numeric digits must be supplied. Only supplied in tokenization requests if panUniqueReference or tokenUniqueReferenceForPanInfo or pushAccountReceipt is not present. **Format: MM**  | [optional] |
| **expiry_year** | **String** | **(Required as minimum for Tokenization)** The expiry year for the account. Only supplied in tokenization requests if panUniqueReference or tokenUniqueReferenceForPanInfo or pushAccountReceipt is not present. **Format: YY**  | [optional] |
| **security_code** | **String** | **(OPTIONAL)** The security code for the account can optionally be provided for Tokenization. If provided, the validity will be checked. Optional in a Tokenize request, not present otherwise.  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::CardAccountDataInbound.new(
  account_number: 5123456789012345,
  expiry_month: 09,
  expiry_year: 21,
  security_code: 123
)
```

