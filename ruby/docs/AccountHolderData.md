# OpenapiClient::AccountHolderData

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **account_holder_name** | **String** | **(OPTIONAL)** The name of the cardholder in the format LASTNAME/FIRSTNAME or FIRSTNAME LASTNAME  | [optional] |
| **account_holder_address** | [**BillingAddress**](BillingAddress.md) |  | [optional] |
| **consumer_identifier** | **String** | **(OPTIONAL)** Customer Identifier that may be required in some regions.  | [optional] |
| **account_holder_email_address** | **String** | **(OPTIONAL)** The e-mail address of the Account Holder  | [optional] |
| **account_holder_mobile_phone_number** | [**PhoneNumber**](PhoneNumber.md) |  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::AccountHolderData.new(
  account_holder_name: null,
  account_holder_address: null,
  consumer_identifier: null,
  account_holder_email_address: null,
  account_holder_mobile_phone_number: null
)
```

