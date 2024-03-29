/*
 * MDES Digital Enablement API
 * These APIs are designed as RPC style stateless web services where each API endpoint represents an operation to be performed.  All request and response payloads are sent in the JSON (JavaScript Object Notation) data-interchange format. Each endpoint in the API specifies the HTTP Method used to access it. All strings in request and response objects are to be UTF-8 encoded.  Each API URI includes the major and minor version of API that it conforms to.  This will allow multiple concurrent versions of the API to be deployed simultaneously. <br><br> **Authentication** <br><br> Mastercard uses OAuth 1.0a with body hash extension for authenticating the API clients. This requires every request that you send to  Mastercard to be signed with an RSA private key. A private-public RSA key pair must be generated consisting of: <br><br> 1. A private key for the OAuth signature for API requests. It is recommended to keep the private key in a password-protected or hardware keystore. <br> 2. A public key is shared with Mastercard during the project setup process through either a certificate signing request (CSR) or the API Key Generator. Mastercard will use the public key to verify the OAuth signature that is provided on every API call.<br>  An OAUTH1.0a signer library is available on [GitHub](https://github.com/Mastercard/oauth1-signer-java) <br><br> **Encryption** <br><br> All communications between Issuer web service and the Mastercard gateway is encrypted using TLS. <br><br> **Additional Encryption of Sensitive Data** <br><br> In addition to the OAuth authentication, when using MDES Digital Enablement Service, any PCI sensitive and all account holder Personally Identifiable Information (PII) data must be encrypted. This requirement applies to the API fields containing encryptedData. Sensitive data is encrypted using a symmetric session (one-time-use) key. The symmetric session key is then wrapped with an RSA Public Key supplied by Mastercard during API setup phase (the Customer Encryption Key). <br>  Java Client Encryption Library available on [GitHub](https://github.com/Mastercard/client-encryption-java) 
 *
 * The version of the OpenAPI document: 1.3.0
 * 
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


package com.mastercard.developer.mdes_digital_enablement_client.model;

import java.util.Objects;
import java.util.Arrays;
import com.google.gson.TypeAdapter;
import com.google.gson.annotations.JsonAdapter;
import com.google.gson.annotations.SerializedName;
import com.google.gson.stream.JsonReader;
import com.google.gson.stream.JsonWriter;
import io.swagger.annotations.ApiModel;
import io.swagger.annotations.ApiModelProperty;
import java.io.IOException;

/**
 * ProductConfig
 */
@javax.annotation.Generated(value = "org.openapitools.codegen.languages.JavaClientCodegen", date = "2021-08-03T18:13:45.340+01:00[Europe/London]")
public class ProductConfig {
  public static final String SERIALIZED_NAME_BRAND_LOGO_ASSET_ID = "brandLogoAssetId";
  @SerializedName(SERIALIZED_NAME_BRAND_LOGO_ASSET_ID)
  private String brandLogoAssetId;

  public static final String SERIALIZED_NAME_ISSUER_LOGO_ASSET_ID = "issuerLogoAssetId";
  @SerializedName(SERIALIZED_NAME_ISSUER_LOGO_ASSET_ID)
  private String issuerLogoAssetId;

  public static final String SERIALIZED_NAME_IS_CO_BRANDED = "isCoBranded";
  @SerializedName(SERIALIZED_NAME_IS_CO_BRANDED)
  private Boolean isCoBranded;

  public static final String SERIALIZED_NAME_CO_BRAND_NAME = "coBrandName";
  @SerializedName(SERIALIZED_NAME_CO_BRAND_NAME)
  private String coBrandName;

  public static final String SERIALIZED_NAME_CO_BRAND_LOGO_ASSET_ID = "coBrandLogoAssetId";
  @SerializedName(SERIALIZED_NAME_CO_BRAND_LOGO_ASSET_ID)
  private String coBrandLogoAssetId;

  public static final String SERIALIZED_NAME_CARD_BACKGROUND_COMBINED_ASSET_ID = "cardBackgroundCombinedAssetId";
  @SerializedName(SERIALIZED_NAME_CARD_BACKGROUND_COMBINED_ASSET_ID)
  private String cardBackgroundCombinedAssetId;

  public static final String SERIALIZED_NAME_CARD_BACKGROUND_ASSET_ID = "cardBackgroundAssetId";
  @SerializedName(SERIALIZED_NAME_CARD_BACKGROUND_ASSET_ID)
  private String cardBackgroundAssetId;

  public static final String SERIALIZED_NAME_ICON_ASSET_ID = "iconAssetId";
  @SerializedName(SERIALIZED_NAME_ICON_ASSET_ID)
  private String iconAssetId;

  public static final String SERIALIZED_NAME_FOREGROUND_COLOR = "foregroundColor";
  @SerializedName(SERIALIZED_NAME_FOREGROUND_COLOR)
  private String foregroundColor;

  public static final String SERIALIZED_NAME_ISSUER_NAME = "issuerName";
  @SerializedName(SERIALIZED_NAME_ISSUER_NAME)
  private String issuerName;

  public static final String SERIALIZED_NAME_SHORT_DESCRIPTION = "shortDescription";
  @SerializedName(SERIALIZED_NAME_SHORT_DESCRIPTION)
  private String shortDescription;

  public static final String SERIALIZED_NAME_LONG_DESCRIPTION = "longDescription";
  @SerializedName(SERIALIZED_NAME_LONG_DESCRIPTION)
  private String longDescription;

  public static final String SERIALIZED_NAME_CUSTOMER_SERVICE_URL = "customerServiceUrl";
  @SerializedName(SERIALIZED_NAME_CUSTOMER_SERVICE_URL)
  private String customerServiceUrl;

  public static final String SERIALIZED_NAME_CUSTOMER_SERVICE_EMAIL = "customerServiceEmail";
  @SerializedName(SERIALIZED_NAME_CUSTOMER_SERVICE_EMAIL)
  private String customerServiceEmail;

  public static final String SERIALIZED_NAME_CUSTOMER_SERVICE_PHONE_NUMBER = "customerServicePhoneNumber";
  @SerializedName(SERIALIZED_NAME_CUSTOMER_SERVICE_PHONE_NUMBER)
  private String customerServicePhoneNumber;

  public static final String SERIALIZED_NAME_ISSUER_MOBILE_APP = "issuerMobileApp";
  @SerializedName(SERIALIZED_NAME_ISSUER_MOBILE_APP)
  private Object issuerMobileApp;

  public static final String SERIALIZED_NAME_ONLINE_BANKING_LOGIN_URL = "onlineBankingLoginUrl";
  @SerializedName(SERIALIZED_NAME_ONLINE_BANKING_LOGIN_URL)
  private String onlineBankingLoginUrl;

  public static final String SERIALIZED_NAME_TERMS_AND_CONDITIONS_URL = "termsAndConditionsUrl";
  @SerializedName(SERIALIZED_NAME_TERMS_AND_CONDITIONS_URL)
  private String termsAndConditionsUrl;

  public static final String SERIALIZED_NAME_PRIVACY_POLICY_URL = "privacyPolicyUrl";
  @SerializedName(SERIALIZED_NAME_PRIVACY_POLICY_URL)
  private String privacyPolicyUrl;

  public static final String SERIALIZED_NAME_ISSUER_PRODUCT_CONFIG_CODE = "issuerProductConfigCode";
  @SerializedName(SERIALIZED_NAME_ISSUER_PRODUCT_CONFIG_CODE)
  private String issuerProductConfigCode;


  public ProductConfig brandLogoAssetId(String brandLogoAssetId) {
    
    this.brandLogoAssetId = brandLogoAssetId;
    return this;
  }

   /**
   * The MasterCard or Maestro brand logo associated with this card. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object 
   * @return brandLogoAssetId
  **/
  @ApiModelProperty(example = "800200c9-629d-11e3-949a-0739d27e5a66", required = true, value = "The MasterCard or Maestro brand logo associated with this card. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object ")

  public String getBrandLogoAssetId() {
    return brandLogoAssetId;
  }


  public void setBrandLogoAssetId(String brandLogoAssetId) {
    this.brandLogoAssetId = brandLogoAssetId;
  }


  public ProductConfig issuerLogoAssetId(String issuerLogoAssetId) {
    
    this.issuerLogoAssetId = issuerLogoAssetId;
    return this;
  }

   /**
   * The logo of the issuing bank. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object 
   * @return issuerLogoAssetId
  **/
  @ApiModelProperty(example = "dbc55444-986a-4896-b41c-5d5e2dd431e2", required = true, value = "The logo of the issuing bank. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object ")

  public String getIssuerLogoAssetId() {
    return issuerLogoAssetId;
  }


  public void setIssuerLogoAssetId(String issuerLogoAssetId) {
    this.issuerLogoAssetId = issuerLogoAssetId;
  }


  public ProductConfig isCoBranded(Boolean isCoBranded) {
    
    this.isCoBranded = isCoBranded;
    return this;
  }

   /**
   * Whether the product is co-branded. Must be either true (this is a co-branded product) or false (this is not a co-branded product). Always returned in Product Configuration object 
   * @return isCoBranded
  **/
  @ApiModelProperty(example = "true", required = true, value = "Whether the product is co-branded. Must be either true (this is a co-branded product) or false (this is not a co-branded product). Always returned in Product Configuration object ")

  public Boolean getIsCoBranded() {
    return isCoBranded;
  }


  public void setIsCoBranded(Boolean isCoBranded) {
    this.isCoBranded = isCoBranded;
  }


  public ProductConfig coBrandName(String coBrandName) {
    
    this.coBrandName = coBrandName;
    return this;
  }

   /**
   * Textual name of the co-brand partner. Required if CoBranded is true, not present otherwise. **Conditional: Conditionally required if isCoBranded &#x3D; \&quot;true\&quot;. Not present otherwise** 
   * @return coBrandName
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "Co brand partner", value = "Textual name of the co-brand partner. Required if CoBranded is true, not present otherwise. **Conditional: Conditionally required if isCoBranded = \"true\". Not present otherwise** ")

  public String getCoBrandName() {
    return coBrandName;
  }


  public void setCoBrandName(String coBrandName) {
    this.coBrandName = coBrandName;
  }


  public ProductConfig coBrandLogoAssetId(String coBrandLogoAssetId) {
    
    this.coBrandLogoAssetId = coBrandLogoAssetId;
    return this;
  }

   /**
   * The co-brand logo (if any) for this product. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. 
   * @return coBrandLogoAssetId
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "dbc55444-496a-4896-b41c-5d5e2dd431e2", value = "The co-brand logo (if any) for this product. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. ")

  public String getCoBrandLogoAssetId() {
    return coBrandLogoAssetId;
  }


  public void setCoBrandLogoAssetId(String coBrandLogoAssetId) {
    this.coBrandLogoAssetId = coBrandLogoAssetId;
  }


  public ProductConfig cardBackgroundCombinedAssetId(String cardBackgroundCombinedAssetId) {
    
    this.cardBackgroundCombinedAssetId = cardBackgroundCombinedAssetId;
    return this;
  }

   /**
   * The card image used to represent the digital card in the wallet. This ?combined? option contains the MasterCard, bank and any co- brand logos.  Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. **Conditional: either CardBackgroundCombined or CardBackground will be provided** 
   * @return cardBackgroundCombinedAssetId
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "739d27e5-629d-11e3-949a-0800200c9a66", value = "The card image used to represent the digital card in the wallet. This ?combined? option contains the MasterCard, bank and any co- brand logos.  Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. **Conditional: either CardBackgroundCombined or CardBackground will be provided** ")

  public String getCardBackgroundCombinedAssetId() {
    return cardBackgroundCombinedAssetId;
  }


  public void setCardBackgroundCombinedAssetId(String cardBackgroundCombinedAssetId) {
    this.cardBackgroundCombinedAssetId = cardBackgroundCombinedAssetId;
  }


  public ProductConfig cardBackgroundAssetId(String cardBackgroundAssetId) {
    
    this.cardBackgroundAssetId = cardBackgroundAssetId;
    return this;
  }

   /**
   * The card image used to represent the digital card in the wallet. This ?non-combined? option does not contain the MasterCard, bank, or co-brand logos. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. **Conditional: either CardBackgroundCombined or CardBackground will be provided** 
   * @return cardBackgroundAssetId
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "456d27e5-629d-11e3-949a-0800200c9a66", value = "The card image used to represent the digital card in the wallet. This ?non-combined? option does not contain the MasterCard, bank, or co-brand logos. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. **Conditional: either CardBackgroundCombined or CardBackground will be provided** ")

  public String getCardBackgroundAssetId() {
    return cardBackgroundAssetId;
  }


  public void setCardBackgroundAssetId(String cardBackgroundAssetId) {
    this.cardBackgroundAssetId = cardBackgroundAssetId;
  }


  public ProductConfig iconAssetId(String iconAssetId) {
    
    this.iconAssetId = iconAssetId;
    return this;
  }

   /**
   * The icon representing the primary brand(s) associated with this product. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object 
   * @return iconAssetId
  **/
  @ApiModelProperty(example = "739d87e5-629d-11e3-949a-0800200c9a66", required = true, value = "The icon representing the primary brand(s) associated with this product. Provided as an Asset ID ? use the Get Asset API to retrieve the actual asset. Always returned in Product Configuration object ")

  public String getIconAssetId() {
    return iconAssetId;
  }


  public void setIconAssetId(String iconAssetId) {
    this.iconAssetId = iconAssetId;
  }


  public ProductConfig foregroundColor(String foregroundColor) {
    
    this.foregroundColor = foregroundColor;
    return this;
  }

   /**
   * Foreground color, used to overlay text on top of the card image. Always returned in Product Configuration object 
   * @return foregroundColor
  **/
  @ApiModelProperty(example = "0", required = true, value = "Foreground color, used to overlay text on top of the card image. Always returned in Product Configuration object ")

  public String getForegroundColor() {
    return foregroundColor;
  }


  public void setForegroundColor(String foregroundColor) {
    this.foregroundColor = foregroundColor;
  }


  public ProductConfig issuerName(String issuerName) {
    
    this.issuerName = issuerName;
    return this;
  }

   /**
   * Name of the issuing bank. Always returned in Product Configuration object 
   * @return issuerName
  **/
  @ApiModelProperty(example = "Issuing Bank", required = true, value = "Name of the issuing bank. Always returned in Product Configuration object ")

  public String getIssuerName() {
    return issuerName;
  }


  public void setIssuerName(String issuerName) {
    this.issuerName = issuerName;
  }


  public ProductConfig shortDescription(String shortDescription) {
    
    this.shortDescription = shortDescription;
    return this;
  }

   /**
   * A short description for this product. Always returned in Product Configuration object 
   * @return shortDescription
  **/
  @ApiModelProperty(example = "Bank Rewards MasterCard", required = true, value = "A short description for this product. Always returned in Product Configuration object ")

  public String getShortDescription() {
    return shortDescription;
  }


  public void setShortDescription(String shortDescription) {
    this.shortDescription = shortDescription;
  }


  public ProductConfig longDescription(String longDescription) {
    
    this.longDescription = longDescription;
    return this;
  }

   /**
   * A long description for this product. 
   * @return longDescription
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "Bank Rewards MasterCard with the super duper rewards program", value = "A long description for this product. ")

  public String getLongDescription() {
    return longDescription;
  }


  public void setLongDescription(String longDescription) {
    this.longDescription = longDescription;
  }


  public ProductConfig customerServiceUrl(String customerServiceUrl) {
    
    this.customerServiceUrl = customerServiceUrl;
    return this;
  }

   /**
   * Customer service website of the issuing bank. 
   * @return customerServiceUrl
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "https://bank.com/customerservice", value = "Customer service website of the issuing bank. ")

  public String getCustomerServiceUrl() {
    return customerServiceUrl;
  }


  public void setCustomerServiceUrl(String customerServiceUrl) {
    this.customerServiceUrl = customerServiceUrl;
  }


  public ProductConfig customerServiceEmail(String customerServiceEmail) {
    
    this.customerServiceEmail = customerServiceEmail;
    return this;
  }

   /**
   * Customer service email address of the issuing bank. 
   * @return customerServiceEmail
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "customerservice@bank.com", value = "Customer service email address of the issuing bank. ")

  public String getCustomerServiceEmail() {
    return customerServiceEmail;
  }


  public void setCustomerServiceEmail(String customerServiceEmail) {
    this.customerServiceEmail = customerServiceEmail;
  }


  public ProductConfig customerServicePhoneNumber(String customerServicePhoneNumber) {
    
    this.customerServicePhoneNumber = customerServicePhoneNumber;
    return this;
  }

   /**
   * Customer service phone number of the issuing bank. 
   * @return customerServicePhoneNumber
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "1234567891", value = "Customer service phone number of the issuing bank. ")

  public String getCustomerServicePhoneNumber() {
    return customerServicePhoneNumber;
  }


  public void setCustomerServicePhoneNumber(String customerServicePhoneNumber) {
    this.customerServicePhoneNumber = customerServicePhoneNumber;
  }


  public ProductConfig issuerMobileApp(Object issuerMobileApp) {
    
    this.issuerMobileApp = issuerMobileApp;
    return this;
  }

   /**
   * Contains one or more mobile app details that may be used to deep link from the Mobile Payment App to the issuer mobile app. 
   * @return issuerMobileApp
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(value = "Contains one or more mobile app details that may be used to deep link from the Mobile Payment App to the issuer mobile app. ")

  public Object getIssuerMobileApp() {
    return issuerMobileApp;
  }


  public void setIssuerMobileApp(Object issuerMobileApp) {
    this.issuerMobileApp = issuerMobileApp;
  }


  public ProductConfig onlineBankingLoginUrl(String onlineBankingLoginUrl) {
    
    this.onlineBankingLoginUrl = onlineBankingLoginUrl;
    return this;
  }

   /**
   * Logon URL for the issuing bank?s online banking website. 
   * @return onlineBankingLoginUrl
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "bank.com", value = "Logon URL for the issuing bank?s online banking website. ")

  public String getOnlineBankingLoginUrl() {
    return onlineBankingLoginUrl;
  }


  public void setOnlineBankingLoginUrl(String onlineBankingLoginUrl) {
    this.onlineBankingLoginUrl = onlineBankingLoginUrl;
  }


  public ProductConfig termsAndConditionsUrl(String termsAndConditionsUrl) {
    
    this.termsAndConditionsUrl = termsAndConditionsUrl;
    return this;
  }

   /**
   * URL linking to the issuing bank?s terms and conditions for this product. 
   * @return termsAndConditionsUrl
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "https://bank.com/termsAndConditions", value = "URL linking to the issuing bank?s terms and conditions for this product. ")

  public String getTermsAndConditionsUrl() {
    return termsAndConditionsUrl;
  }


  public void setTermsAndConditionsUrl(String termsAndConditionsUrl) {
    this.termsAndConditionsUrl = termsAndConditionsUrl;
  }


  public ProductConfig privacyPolicyUrl(String privacyPolicyUrl) {
    
    this.privacyPolicyUrl = privacyPolicyUrl;
    return this;
  }

   /**
   * URL linking to the issuing bank?s privacy policy for this product. 
   * @return privacyPolicyUrl
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "https://bank.com/privacy", value = "URL linking to the issuing bank?s privacy policy for this product. ")

  public String getPrivacyPolicyUrl() {
    return privacyPolicyUrl;
  }


  public void setPrivacyPolicyUrl(String privacyPolicyUrl) {
    this.privacyPolicyUrl = privacyPolicyUrl;
  }


  public ProductConfig issuerProductConfigCode(String issuerProductConfigCode) {
    
    this.issuerProductConfigCode = issuerProductConfigCode;
    return this;
  }

   /**
   * Freeform identifier for this product configuration as assigned by the issuer. 
   * @return issuerProductConfigCode
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "123456", value = "Freeform identifier for this product configuration as assigned by the issuer. ")

  public String getIssuerProductConfigCode() {
    return issuerProductConfigCode;
  }


  public void setIssuerProductConfigCode(String issuerProductConfigCode) {
    this.issuerProductConfigCode = issuerProductConfigCode;
  }


  @Override
  public boolean equals(Object o) {
    if (this == o) {
      return true;
    }
    if (o == null || getClass() != o.getClass()) {
      return false;
    }
    ProductConfig productConfig = (ProductConfig) o;
    return Objects.equals(this.brandLogoAssetId, productConfig.brandLogoAssetId) &&
        Objects.equals(this.issuerLogoAssetId, productConfig.issuerLogoAssetId) &&
        Objects.equals(this.isCoBranded, productConfig.isCoBranded) &&
        Objects.equals(this.coBrandName, productConfig.coBrandName) &&
        Objects.equals(this.coBrandLogoAssetId, productConfig.coBrandLogoAssetId) &&
        Objects.equals(this.cardBackgroundCombinedAssetId, productConfig.cardBackgroundCombinedAssetId) &&
        Objects.equals(this.cardBackgroundAssetId, productConfig.cardBackgroundAssetId) &&
        Objects.equals(this.iconAssetId, productConfig.iconAssetId) &&
        Objects.equals(this.foregroundColor, productConfig.foregroundColor) &&
        Objects.equals(this.issuerName, productConfig.issuerName) &&
        Objects.equals(this.shortDescription, productConfig.shortDescription) &&
        Objects.equals(this.longDescription, productConfig.longDescription) &&
        Objects.equals(this.customerServiceUrl, productConfig.customerServiceUrl) &&
        Objects.equals(this.customerServiceEmail, productConfig.customerServiceEmail) &&
        Objects.equals(this.customerServicePhoneNumber, productConfig.customerServicePhoneNumber) &&
        Objects.equals(this.issuerMobileApp, productConfig.issuerMobileApp) &&
        Objects.equals(this.onlineBankingLoginUrl, productConfig.onlineBankingLoginUrl) &&
        Objects.equals(this.termsAndConditionsUrl, productConfig.termsAndConditionsUrl) &&
        Objects.equals(this.privacyPolicyUrl, productConfig.privacyPolicyUrl) &&
        Objects.equals(this.issuerProductConfigCode, productConfig.issuerProductConfigCode);
  }

  @Override
  public int hashCode() {
    return Objects.hash(brandLogoAssetId, issuerLogoAssetId, isCoBranded, coBrandName, coBrandLogoAssetId, cardBackgroundCombinedAssetId, cardBackgroundAssetId, iconAssetId, foregroundColor, issuerName, shortDescription, longDescription, customerServiceUrl, customerServiceEmail, customerServicePhoneNumber, issuerMobileApp, onlineBankingLoginUrl, termsAndConditionsUrl, privacyPolicyUrl, issuerProductConfigCode);
  }

  @Override
  public String toString() {
    StringBuilder sb = new StringBuilder();
    sb.append("class ProductConfig {\n");
    sb.append("    brandLogoAssetId: ").append(toIndentedString(brandLogoAssetId)).append("\n");
    sb.append("    issuerLogoAssetId: ").append(toIndentedString(issuerLogoAssetId)).append("\n");
    sb.append("    isCoBranded: ").append(toIndentedString(isCoBranded)).append("\n");
    sb.append("    coBrandName: ").append(toIndentedString(coBrandName)).append("\n");
    sb.append("    coBrandLogoAssetId: ").append(toIndentedString(coBrandLogoAssetId)).append("\n");
    sb.append("    cardBackgroundCombinedAssetId: ").append(toIndentedString(cardBackgroundCombinedAssetId)).append("\n");
    sb.append("    cardBackgroundAssetId: ").append(toIndentedString(cardBackgroundAssetId)).append("\n");
    sb.append("    iconAssetId: ").append(toIndentedString(iconAssetId)).append("\n");
    sb.append("    foregroundColor: ").append(toIndentedString(foregroundColor)).append("\n");
    sb.append("    issuerName: ").append(toIndentedString(issuerName)).append("\n");
    sb.append("    shortDescription: ").append(toIndentedString(shortDescription)).append("\n");
    sb.append("    longDescription: ").append(toIndentedString(longDescription)).append("\n");
    sb.append("    customerServiceUrl: ").append(toIndentedString(customerServiceUrl)).append("\n");
    sb.append("    customerServiceEmail: ").append(toIndentedString(customerServiceEmail)).append("\n");
    sb.append("    customerServicePhoneNumber: ").append(toIndentedString(customerServicePhoneNumber)).append("\n");
    sb.append("    issuerMobileApp: ").append(toIndentedString(issuerMobileApp)).append("\n");
    sb.append("    onlineBankingLoginUrl: ").append(toIndentedString(onlineBankingLoginUrl)).append("\n");
    sb.append("    termsAndConditionsUrl: ").append(toIndentedString(termsAndConditionsUrl)).append("\n");
    sb.append("    privacyPolicyUrl: ").append(toIndentedString(privacyPolicyUrl)).append("\n");
    sb.append("    issuerProductConfigCode: ").append(toIndentedString(issuerProductConfigCode)).append("\n");
    sb.append("}");
    return sb.toString();
  }

  /**
   * Convert the given object to string with each line indented by 4 spaces
   * (except the first line).
   */
  private String toIndentedString(Object o) {
    if (o == null) {
      return "null";
    }
    return o.toString().replace("\n", "\n    ");
  }

}

