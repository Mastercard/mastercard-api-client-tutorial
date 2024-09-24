# ProductConfig


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**brand_logo_asset_id** | **str** | The MasterCard or Maestro brand logo associated with this card. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object  | 
**issuer_logo_asset_id** | **str** | The logo of the issuing bank. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object  | [optional] 
**is_co_branded** | **bool** | Whether the product is co-branded. Must be either true (this is a co-branded product) or false (this is not a co-branded product). Always returned in Product Configuration object  | [optional] 
**co_brand_name** | **str** | Textual name of the co-brand partner. Required if CoBranded is true, not present otherwise. **Conditional: Conditionally required if isCoBranded &#x3D; \&quot;true\&quot;. Not present otherwise**  | [optional] 
**co_brand_logo_asset_id** | **str** | The co-brand logo (if any) for this product. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset.  | [optional] 
**card_background_combined_asset_id** | **str** | The card image used to represent the digital card in the wallet. This ?combined? option contains the MasterCard, bank and any co- brand logos.  Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. **Conditional: either CardBackgroundCombined or CardBackground will be provided**  | [optional] 
**card_background_asset_id** | **str** | The card image used to represent the digital card in the wallet. This ?non-combined? option does not contain the MasterCard, bank, or co-brand logos. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. **Conditional: either CardBackgroundCombined or CardBackground will be provided**  | [optional] 
**icon_asset_id** | **str** | The icon representing the primary brand(s) associated with this product. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object  | [optional] 
**foreground_color** | **str** | Foreground color, used to overlay text on top of the card image. Always returned in Product Configuration object  | 
**issuer_name** | **str** | Name of the issuing bank. Always returned in Product Configuration object  | 
**short_description** | **str** | A short description for this product. Always returned in Product Configuration object  | 
**long_description** | **str** | A long description for this product.  | [optional] 
**customer_service_url** | **str** | Customer service website of the issuing bank.  | [optional] 
**customer_service_email** | **str** | Customer service email address of the issuing bank.  | [optional] 
**customer_service_phone_number** | **str** | Customer service phone number of the issuing bank.  | [optional] 
**issuer_mobile_app** | **object** | Contains one or more mobile app details that may be used to deep link from the Mobile Payment App to the issuer mobile app.  | [optional] 
**online_banking_login_url** | **str** | Logon URL for the issuing bank?s online banking website.  | [optional] 
**terms_and_conditions_url** | **str** | URL linking to the issuing bank?s terms and conditions for this product.  | [optional] 
**privacy_policy_url** | **str** | URL linking to the issuing bank?s privacy policy for this product.  | [optional] 
**issuer_product_config_code** | **str** | Freeform identifier for this product configuration as assigned by the issuer.  | [optional] 

## Example

```python
from openapi_client.models.product_config import ProductConfig

# TODO update the JSON string below
json = "{}"
# create an instance of ProductConfig from a JSON string
product_config_instance = ProductConfig.from_json(json)
# print the JSON string representation of the object
print(ProductConfig.to_json())

# convert the object into a dict
product_config_dict = product_config_instance.to_dict()
# create an instance of ProductConfig from a dict
product_config_from_dict = ProductConfig.from_dict(product_config_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


