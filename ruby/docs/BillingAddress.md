# OpenapiClient::BillingAddress

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **line1** | **String** | **(OPTIONAL)** The first line of the street address for the billing address.  | [optional] |
| **line2** | **String** | **(OPTIONAL)** The second line of the street address for the billing address.  | [optional] |
| **city** | **String** | **(OPTIONAL)** The city of the billing address.  | [optional] |
| **country_subdivision** | **String** | **(OPTIONAL)** The state or country subdivision of the billing address.  | [optional] |
| **postal_code** | **String** | **(OPTIONAL)** The postal of code of the billing address.  | [optional] |
| **country** | **String** | **(OPTIONAL)** The country of the billing address.  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::BillingAddress.new(
  line1: 100 1st Street,
  line2: Apt. 4B,
  city: St. Louis,
  country_subdivision: MO,
  postal_code: 61000,
  country: USA
)
```

