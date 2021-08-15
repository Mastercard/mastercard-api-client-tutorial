# OpenapiClient::FundingAccountData

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **card_account_data** | [**CardAccountDataInbound**](CardAccountDataInbound.md) |  | [optional] |
| **account_holder_data** | [**AccountHolderData**](AccountHolderData.md) |  | [optional] |
| **source** | **String** | (**Required as minimum for Tokenization**) The source of the account. Must be one of   * ACCOUNT_ON_FILE   * ACCOUNT_ADDED_MANUALLY   * ACCOUNT_ADDED_VIA_APPLICATION  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::FundingAccountData.new(
  card_account_data: null,
  account_holder_data: null,
  source: ACCOUNT_ON_FILE
)
```

