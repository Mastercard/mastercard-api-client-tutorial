# OpenapiClient::AccountHolderDataOutbound

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **account_holder_name** | **String** | **(OPTIONAL)** The name of the cardholder  | [optional] |
| **account_holder_address** | [**BillingAddress**](BillingAddress.md) |  | [optional] |
| **account_holder_email_address** | **String** | **(OPTIONAL)** The e-mail address of the Account Holder  | [optional] |
| **account_holder_mobile_phone_number** | [**PhoneNumber**](PhoneNumber.md) |  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::AccountHolderDataOutbound.new(
  account_holder_name: null,
  account_holder_address: null,
  account_holder_email_address: null,
  account_holder_mobile_phone_number: null
)
```

