# OpenapiClient::AuthenticationMethods

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **String** | Unique identifier assigned to this Authentication Method.  | [optional] |
| **type** | **String** | Specifies the authentication method type and provided in the tokenize response.  See table here - https://developer.mastercard.com/mdes-digital-enablement/documentation/code-and-formats/#authentication-method-codes  | [optional] |
| **value** | **String** | Specifies the authentication method value (meaning varies depending on the authentication method type).  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::AuthenticationMethods.new(
  id: 334123523456213450000,
  type: TEXT_TO_CARDHOLDER_NUMBER,
  value: 1
)
```

