# OpenapiClient::PhoneNumber

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **country_dial_in_code** | **Float** | **(OPTIONAL)** The country code for the phone number. E.g. 1 for US or 44 for UK.  | [optional] |
| **phone_number** | **Float** | **(OPTIONAL)** The phone number of the account holder  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::PhoneNumber.new(
  country_dial_in_code: 44,
  phone_number: null
)
```

