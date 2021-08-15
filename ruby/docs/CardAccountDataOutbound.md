# OpenapiClient::CardAccountDataOutbound

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **account_number** | **String** | The account number of the credit or debit card.  | [optional] |
| **expiry_month** | **String** |  The expiry month for the account. Two numeric digits must be supplied. **Format: MM**  | [optional] |
| **expiry_year** | **String** | **(Required as minimum for Tokenization)** The expiry year for the account. **Format: YY**  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::CardAccountDataOutbound.new(
  account_number: 5123456789012345,
  expiry_month: 09,
  expiry_year: 21
)
```

