# OpenapiClient::TokenForGetToken

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **token_unique_reference** | **String** | The unique reference allocated to the Token which is always present even if an error occurs. maxLength: 64  | [optional] |
| **token_requestor_id** | **String** | Identifies the Token Requestor. &lt;br&gt; minLength: 11 maxLength: 11  | [optional] |
| **status** | **String** | The current status of Token. Must be either:  * &#39;INACTIVE&#39; (Token has not yet been activated)  * &#39;ACTIVE&#39; (Token is active and ready to transact)  * &#39;SUSPENDED&#39; (Token is suspended and unable to transact)  * &#39;DEACTIVATED&#39; (Token has been permanently deactivated). maxLength: 32  | [optional] |
| **suspended_by** | **Array&lt;String&gt;** | (CONDITIONAL only supplied if status is SUSPENDED) Who or what caused the Token to be suspended One or more values of:    * ISSUER - Suspended by the Issuer.    * TOKEN_REQUESTOR - Suspended by the Token Requestor    * MOBILE_PIN_LOCKED - Suspended due to the Mobile PIN being locked    * CARDHOLDER - Suspended by the Cardholder  | [optional] |
| **status_timestamp** | **String** | The date and time the token status was last updated. Expressed in ISO 8601 extended format as one of the following:    * YYYY-MM-DDThh:mm:ss[.sss]Z    * YYYY-MM-DDThh:mm:ss[.sss]±hh:mm    * Where [.sss] is optional and can be 1 to 3 digits.  | [optional] |
| **product_config** | [**ProductConfig**](ProductConfig.md) |  | [optional] |
| **token_info** | [**TokenInfoForNTUAndGetToken**](TokenInfoForNTUAndGetToken.md) |  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::TokenForGetToken.new(
  token_unique_reference: DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45,
  token_requestor_id: 98765432101,
  status: SUSPENDED,
  suspended_by: null,
  status_timestamp: null,
  product_config: null,
  token_info: null
)
```

