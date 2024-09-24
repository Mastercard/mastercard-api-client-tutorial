

# ProductConfig


## Properties

| Name | Type | Description | Notes |
|------------ | ------------- | ------------- | -------------|
|**brandLogoAssetId** | **String** | The MasterCard or Maestro brand logo associated with this card. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object  |  |
|**issuerLogoAssetId** | **String** | The logo of the issuing bank. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object  |  |
|**isCoBranded** | **Boolean** | Whether the product is co-branded. Must be either true (this is a co-branded product) or false (this is not a co-branded product). Always returned in Product Configuration object  |  |
|**coBrandName** | **String** | Textual name of the co-brand partner. Required if CoBranded is true, not present otherwise. **Conditional: Conditionally required if isCoBranded &#x3D; \&quot;true\&quot;. Not present otherwise**  |  [optional] |
|**coBrandLogoAssetId** | **String** | The co-brand logo (if any) for this product. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset.  |  [optional] |
|**cardBackgroundCombinedAssetId** | **String** | The card image used to represent the digital card in the wallet. This ?combined? option contains the MasterCard, bank and any co- brand logos.  Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. **Conditional: either CardBackgroundCombined or CardBackground will be provided**  |  [optional] |
|**cardBackgroundAssetId** | **String** | The card image used to represent the digital card in the wallet. This ?non-combined? option does not contain the MasterCard, bank, or co-brand logos. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. **Conditional: either CardBackgroundCombined or CardBackground will be provided**  |  [optional] |
|**iconAssetId** | **String** | The icon representing the primary brand(s) associated with this product. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object  |  |
|**foregroundColor** | **String** | Foreground color, used to overlay text on top of the card image. Always returned in Product Configuration object  |  |
|**issuerName** | **String** | Name of the issuing bank. Always returned in Product Configuration object  |  |
|**shortDescription** | **String** | A short description for this product. Always returned in Product Configuration object  |  |
|**longDescription** | **String** | A long description for this product.  |  [optional] |
|**customerServiceUrl** | **String** | Customer service website of the issuing bank.  |  [optional] |
|**customerServiceEmail** | **String** | Customer service email address of the issuing bank.  |  [optional] |
|**customerServicePhoneNumber** | **String** | Customer service phone number of the issuing bank.  |  [optional] |
|**issuerMobileApp** | **Object** | Contains one or more mobile app details that may be used to deep link from the Mobile Payment App to the issuer mobile app.  |  [optional] |
|**onlineBankingLoginUrl** | **String** | Logon URL for the issuing bank?s online banking website.  |  [optional] |
|**termsAndConditionsUrl** | **String** | URL linking to the issuing bank?s terms and conditions for this product.  |  [optional] |
|**privacyPolicyUrl** | **String** | URL linking to the issuing bank?s privacy policy for this product.  |  [optional] |
|**issuerProductConfigCode** | **String** | Freeform identifier for this product configuration as assigned by the issuer.  |  [optional] |



