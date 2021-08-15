# OpenapiClient::TokenDetailDataGetTokenOnly

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **token_number** | **String** | The Token Primary Account Number of the Card.  | [optional] |
| **expiry_month** | **String** | The month of the token expiration date.  | [optional] |
| **expiry_year** | **String** | The year of the token expiration date.  | [optional] |
| **payment_account_reference** | **String** | The unique account reference assigned to the PAN. Conditionally returned if the Token Requestor has opted to receive PAR and providing PAR is assigned by Mastercard or the Issuer provides PAR in the authorization message response.  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::TokenDetailDataGetTokenOnly.new(
  token_number: null,
  expiry_month: null,
  expiry_year: null,
  payment_account_reference: 5001a9f027e5629d11e3949a0800a
)
```

