# OpenapiClient::TokenInfoForNTUAndGetToken

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **token_pan_suffix** | **String** | The last few digits (typically four) of the Token PAN.  |  |
| **account_pan_prefix** | **String** | The first few digits (typically six) of the Account PAN.  |  |
| **account_pan_suffix** | **String** | The last few digits (typically four) of the Account PAN.  |  |
| **token_expiry** | **String** | The expiry of the Token PAN, given in MMYY format.  |  |
| **account_pan_expiry** | **String** | The expiry of the Account PAN, given in MMYY format.  | [optional] |
| **dsrp_capable** | **String** | Whether DSRP transactions are supported by this Token. Must be either &#39;true&#39; (DSRP capable) or &#39;false&#39; (Not DSRP capable).  |  |
| **token_assurance_level** | **Integer** | A value indicating the confidence level of the token to Account PAN binding.  | [optional] |
| **product_category** | **String** | The product category of the Account PAN. When supplied will be one of the following values:    * CREDIT   * DEBIT   * PREPAID   * UNKNOWN  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::TokenInfoForNTUAndGetToken.new(
  token_pan_suffix: 0001,
  account_pan_prefix: 500000,
  account_pan_suffix: 0011,
  token_expiry: 921,
  account_pan_expiry: 921,
  dsrp_capable: true,
  token_assurance_level: 3,
  product_category: CREDIT
)
```

