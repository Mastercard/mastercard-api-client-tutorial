
# Acme.App.MastercardApi.Client.Model.ProductConfig

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**BrandLogoAssetId** | **string** | The MasterCard or Maestro brand logo associated with this card. Provided as an Asset ID – use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object &lt;br&gt;    __Max Length: 64__&lt;br&gt; __Required: Yes__  | [optional] 
**IssuerLogoAssetId** | **string** | The logo of the issuing bank. Provided as an Asset ID – use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object &lt;br&gt;     __Max Length:64__&lt;br&gt; __Required: Yes__  | [optional] 
**IsCoBranded** | **string** | Whether the product is co-branded. Must be either true (this is a co-branded product) or false (this is not a co-branded product). Always returned in Product Configuration object &lt;br&gt;    __Max Length:5__&lt;br&gt; __Required: Yes__  | [optional] 
**CoBrandName** | **string** | Textual name of the co-brand partner. Required if CoBranded is true, not present otherwise.  &lt;br&gt;   __Max Length:128__&lt;br&gt; __Required: Conditional – required if isCoBranded &#x3D; \&quot;true\&quot;. Not present otherwise__  | [optional] 
**CoBrandLogoAssetId** | **string** | The co-brand logo (if any) for this product. Provided as an Asset ID – use the Get Asset API to retrieve the actual asset. &lt;br&gt;   __Max Length:64__&lt;br&gt; __Required: No__  | [optional] 
**CardBackgroundCombinedAssetId** | **string** | The card image used to represent the digital card in the wallet. This ‘combined’ option contains the MasterCard, bank and any co- brand logos.  Provided as an Asset ID – use the Get Asset API to retrieve the actual asset.     __Max Length:64__&lt;br&gt; __Required: Conditional – either CardBackgroundCombined or CardBackground will be provided__  | [optional] 
**CardBackgroundAssetId** | **string** | The card image used to represent the digital card in the wallet. This ‘non-combined’ option does not contain the MasterCard, bank, or co-brand logos. Provided as an Asset ID – use the Get Asset API to retrieve the actual asset. &lt;br&gt;     __Max Length:64__&lt;br&gt; __Required: Conditional – either CardBackgroundCombined or CardBackground will be provided__  | [optional] 
**IconAssetId** | **string** | The icon representing the primary brand(s) associated with this product. Provided as an Asset ID – use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object&lt;br&gt;    __Max Length:64__&lt;br&gt; __Required: Yes__  | [optional] 
**ForegroundColor** | **string** | Foreground color, used to overlay text on top of the card image. Always returned in Product Configuration object&lt;br&gt;    __Max Length:6__ Hexadecimal RGB color format (case-insensitive).&lt;br&gt; __Required: Yes__  | [optional] 
**IssuerName** | **string** | Name of the issuing bank. Always returned in Product Configuration object &lt;br&gt;    __Max Length:64__&lt;br&gt; __Required: Yes__  | [optional] 
**ShortDescription** | **string** | A short description for this product. Always returned in Product Configuration object  &lt;br&gt;   __Max Length:128__&lt;br&gt; __Required: Yes__  | [optional] 
**LongDescription** | **string** | A long description for this product.  &lt;br&gt;   __Max Length:256__&lt;br&gt; __Required: No__  | [optional] 
**CustomerServiceUrl** | **string** | Customer service website of the issuing bank. &lt;br&gt;    __Max Length:128__&lt;br&gt; __Required: No__  | [optional] 
**CustomerServiceEmail** | **string** | Customer service email address of the issuing bank. &lt;br&gt;    __Max Length:64__&lt;br&gt; __Required: No__  | [optional] 
**CustomerServicePhoneNumber** | **string** | Customer service phone number of the issuing bank. &lt;br&gt;    __Max Length:64__&lt;br&gt; __Required: No__  | [optional] 
**IssuerMobileApp** | [**Object**](.md) | Contains one or more mobile app details that may be used to deep link from the Mobile Payment App to the issuer mobile app. &lt;br&gt;    __Max Length:64__&lt;br&gt; __Required: No__  | [optional] 
**OnlineBankingLoginUrl** | **string** | Logon URL for the issuing bank’s online banking website.&lt;br&gt;     __Max Length:128__  | [optional] 
**TermsAndConditionsUrl** | **string** | URL linking to the issuing bank’s terms and conditions for this product.&lt;br&gt;     __Max Length:128__&lt;br&gt; __Required: No__  | [optional] 
**PrivacyPolicyUrl** | **string** | URL linking to the issuing bank’s privacy policy for this product.&lt;br&gt;     __Max Length:128__&lt;br&gt; __Required: No__  | [optional] 
**IssuerProductConfigCode** | **string** | Freeform identifier for this product configuration as assigned by the issuer.&lt;br&gt;     __Max Length:128__&lt;br&gt; __Required: No__  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models)
[[Back to API list]](../README.md#documentation-for-api-endpoints)
[[Back to README]](../README.md)

