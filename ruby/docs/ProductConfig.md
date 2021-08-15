# OpenapiClient::ProductConfig

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **brand_logo_asset_id** | **String** | The MasterCard or Maestro brand logo associated with this card. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object  |  |
| **issuer_logo_asset_id** | **String** | The logo of the issuing bank. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object  |  |
| **is_co_branded** | **Boolean** | Whether the product is co-branded. Must be either true (this is a co-branded product) or false (this is not a co-branded product). Always returned in Product Configuration object  |  |
| **co_brand_name** | **String** | Textual name of the co-brand partner. Required if CoBranded is true, not present otherwise. **Conditional: Conditionally required if isCoBranded &#x3D; \&quot;true\&quot;. Not present otherwise**  | [optional] |
| **co_brand_logo_asset_id** | **String** | The co-brand logo (if any) for this product. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset.  | [optional] |
| **card_background_combined_asset_id** | **String** | The card image used to represent the digital card in the wallet. This ?combined? option contains the MasterCard, bank and any co- brand logos.  Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. **Conditional: either CardBackgroundCombined or CardBackground will be provided**  | [optional] |
| **card_background_asset_id** | **String** | The card image used to represent the digital card in the wallet. This ?non-combined? option does not contain the MasterCard, bank, or co-brand logos. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. **Conditional: either CardBackgroundCombined or CardBackground will be provided**  | [optional] |
| **icon_asset_id** | **String** | The icon representing the primary brand(s) associated with this product. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object  |  |
| **foreground_color** | **String** | Foreground color, used to overlay text on top of the card image. Always returned in Product Configuration object  |  |
| **issuer_name** | **String** | Name of the issuing bank. Always returned in Product Configuration object  |  |
| **short_description** | **String** | A short description for this product. Always returned in Product Configuration object  |  |
| **long_description** | **String** | A long description for this product.  | [optional] |
| **customer_service_url** | **String** | Customer service website of the issuing bank.  | [optional] |
| **customer_service_email** | **String** | Customer service email address of the issuing bank.  | [optional] |
| **customer_service_phone_number** | **String** | Customer service phone number of the issuing bank.  | [optional] |
| **issuer_mobile_app** | **Object** | Contains one or more mobile app details that may be used to deep link from the Mobile Payment App to the issuer mobile app.  | [optional] |
| **online_banking_login_url** | **String** | Logon URL for the issuing bank?s online banking website.  | [optional] |
| **terms_and_conditions_url** | **String** | URL linking to the issuing bank?s terms and conditions for this product.  | [optional] |
| **privacy_policy_url** | **String** | URL linking to the issuing bank?s privacy policy for this product.  | [optional] |
| **issuer_product_config_code** | **String** | Freeform identifier for this product configuration as assigned by the issuer.  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::ProductConfig.new(
  brand_logo_asset_id: 800200c9-629d-11e3-949a-0739d27e5a66,
  issuer_logo_asset_id: dbc55444-986a-4896-b41c-5d5e2dd431e2,
  is_co_branded: true,
  co_brand_name: Co brand partner,
  co_brand_logo_asset_id: dbc55444-496a-4896-b41c-5d5e2dd431e2,
  card_background_combined_asset_id: 739d27e5-629d-11e3-949a-0800200c9a66,
  card_background_asset_id: 456d27e5-629d-11e3-949a-0800200c9a66,
  icon_asset_id: 739d87e5-629d-11e3-949a-0800200c9a66,
  foreground_color: 0,
  issuer_name: Issuing Bank,
  short_description: Bank Rewards MasterCard,
  long_description: Bank Rewards MasterCard with the super duper rewards program,
  customer_service_url: https://bank.com/customerservice,
  customer_service_email: customerservice@bank.com,
  customer_service_phone_number: 1234567891,
  issuer_mobile_app: null,
  online_banking_login_url: bank.com,
  terms_and_conditions_url: https://bank.com/termsAndConditions,
  privacy_policy_url: https://bank.com/privacy,
  issuer_product_config_code: 123456
)
```

