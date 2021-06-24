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
import com.mastercard.developer.mdes_digital_enablement_client.model.AuthenticationMethods;
import com.mastercard.developer.mdes_digital_enablement_client.model.ProductConfig;
import com.mastercard.developer.mdes_digital_enablement_client.model.TokenDetail;
import com.mastercard.developer.mdes_digital_enablement_client.model.TokenInfo;
import io.swagger.annotations.ApiModel;
import io.swagger.annotations.ApiModelProperty;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

/**
 * TokenizeResponseSchema
 */
@javax.annotation.Generated(value = "org.openapitools.codegen.languages.JavaClientCodegen", date = "2021-06-24T14:19:40.105+01:00[Europe/London]")
public class TokenizeResponseSchema {
  public static final String SERIALIZED_NAME_RESPONSE_HOST = "responseHost";
  @SerializedName(SERIALIZED_NAME_RESPONSE_HOST)
  private String responseHost;

  public static final String SERIALIZED_NAME_RESPONSE_ID = "responseId";
  @SerializedName(SERIALIZED_NAME_RESPONSE_ID)
  private String responseId;

  public static final String SERIALIZED_NAME_DECISION = "decision";
  @SerializedName(SERIALIZED_NAME_DECISION)
  private String decision;

  public static final String SERIALIZED_NAME_AUTHENTICATION_METHODS = "authenticationMethods";
  @SerializedName(SERIALIZED_NAME_AUTHENTICATION_METHODS)
  private List<AuthenticationMethods> authenticationMethods = null;

  public static final String SERIALIZED_NAME_TOKEN_UNIQUE_REFERENCE = "tokenUniqueReference";
  @SerializedName(SERIALIZED_NAME_TOKEN_UNIQUE_REFERENCE)
  private String tokenUniqueReference;

  public static final String SERIALIZED_NAME_PAN_UNIQUE_REFERENCE = "panUniqueReference";
  @SerializedName(SERIALIZED_NAME_PAN_UNIQUE_REFERENCE)
  private String panUniqueReference;

  public static final String SERIALIZED_NAME_PRODUCT_CONFIG = "productConfig";
  @SerializedName(SERIALIZED_NAME_PRODUCT_CONFIG)
  private ProductConfig productConfig;

  public static final String SERIALIZED_NAME_TOKEN_INFO = "tokenInfo";
  @SerializedName(SERIALIZED_NAME_TOKEN_INFO)
  private TokenInfo tokenInfo;

  public static final String SERIALIZED_NAME_TOKEN_DETAIL = "tokenDetail";
  @SerializedName(SERIALIZED_NAME_TOKEN_DETAIL)
  private TokenDetail tokenDetail;


  public TokenizeResponseSchema responseHost(String responseHost) {
    
    this.responseHost = responseHost;
    return this;
  }

   /**
   * The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host. 
   * @return responseHost
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "site2.payment-app-provider.com", value = "The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host. ")

  public String getResponseHost() {
    return responseHost;
  }


  public void setResponseHost(String responseHost) {
    this.responseHost = responseHost;
  }


  public TokenizeResponseSchema responseId(String responseId) {
    
    this.responseId = responseId;
    return this;
  }

   /**
   * Unique identifier for the response. 
   * @return responseId
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "123456", value = "Unique identifier for the response. ")

  public String getResponseId() {
    return responseId;
  }


  public void setResponseId(String responseId) {
    this.responseId = responseId;
  }


  public TokenizeResponseSchema decision(String decision) {
    
    this.decision = decision;
    return this;
  }

   /**
   * The tokenization decision for this digitization request. Must be either APPROVED (Digitization request was approved), DECLINED (Digitization request was declined) OR REQUIRE_ADDITIONAL_AUTHENTICATION Digitization request was approved but optionally requires additional authentication. One or more Authentication methods may be provided). 
   * @return decision
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "APPROVED", value = "The tokenization decision for this digitization request. Must be either APPROVED (Digitization request was approved), DECLINED (Digitization request was declined) OR REQUIRE_ADDITIONAL_AUTHENTICATION Digitization request was approved but optionally requires additional authentication. One or more Authentication methods may be provided). ")

  public String getDecision() {
    return decision;
  }


  public void setDecision(String decision) {
    this.decision = decision;
  }


  public TokenizeResponseSchema authenticationMethods(List<AuthenticationMethods> authenticationMethods) {
    
    this.authenticationMethods = authenticationMethods;
    return this;
  }

  public TokenizeResponseSchema addAuthenticationMethodsItem(AuthenticationMethods authenticationMethodsItem) {
    if (this.authenticationMethods == null) {
      this.authenticationMethods = new ArrayList<AuthenticationMethods>();
    }
    this.authenticationMethods.add(authenticationMethodsItem);
    return this;
  }

   /**
   * Get authenticationMethods
   * @return authenticationMethods
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(value = "")

  public List<AuthenticationMethods> getAuthenticationMethods() {
    return authenticationMethods;
  }


  public void setAuthenticationMethods(List<AuthenticationMethods> authenticationMethods) {
    this.authenticationMethods = authenticationMethods;
  }


  public TokenizeResponseSchema tokenUniqueReference(String tokenUniqueReference) {
    
    this.tokenUniqueReference = tokenUniqueReference;
    return this;
  }

   /**
   * The unique reference allocated to the new Token. Serves as a unique identifier for all subsequent queries or management functions relating to this Token. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION. 
   * @return tokenUniqueReference
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45", value = "The unique reference allocated to the new Token. Serves as a unique identifier for all subsequent queries or management functions relating to this Token. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION. ")

  public String getTokenUniqueReference() {
    return tokenUniqueReference;
  }


  public void setTokenUniqueReference(String tokenUniqueReference) {
    this.tokenUniqueReference = tokenUniqueReference;
  }


  public TokenizeResponseSchema panUniqueReference(String panUniqueReference) {
    
    this.panUniqueReference = panUniqueReference;
    return this;
  }

   /**
   * The unique reference allocated to the Account Primary Account Number. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION. 
   * @return panUniqueReference
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "FWSPMC000000000159f71f703d2141efaf04dd26803f922b", value = "The unique reference allocated to the Account Primary Account Number. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION. ")

  public String getPanUniqueReference() {
    return panUniqueReference;
  }


  public void setPanUniqueReference(String panUniqueReference) {
    this.panUniqueReference = panUniqueReference;
  }


  public TokenizeResponseSchema productConfig(ProductConfig productConfig) {
    
    this.productConfig = productConfig;
    return this;
  }

   /**
   * Get productConfig
   * @return productConfig
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(value = "")

  public ProductConfig getProductConfig() {
    return productConfig;
  }


  public void setProductConfig(ProductConfig productConfig) {
    this.productConfig = productConfig;
  }


  public TokenizeResponseSchema tokenInfo(TokenInfo tokenInfo) {
    
    this.tokenInfo = tokenInfo;
    return this;
  }

   /**
   * Get tokenInfo
   * @return tokenInfo
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(value = "")

  public TokenInfo getTokenInfo() {
    return tokenInfo;
  }


  public void setTokenInfo(TokenInfo tokenInfo) {
    this.tokenInfo = tokenInfo;
  }


  public TokenizeResponseSchema tokenDetail(TokenDetail tokenDetail) {
    
    this.tokenDetail = tokenDetail;
    return this;
  }

   /**
   * Get tokenDetail
   * @return tokenDetail
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(value = "")

  public TokenDetail getTokenDetail() {
    return tokenDetail;
  }


  public void setTokenDetail(TokenDetail tokenDetail) {
    this.tokenDetail = tokenDetail;
  }


  @Override
  public boolean equals(Object o) {
    if (this == o) {
      return true;
    }
    if (o == null || getClass() != o.getClass()) {
      return false;
    }
    TokenizeResponseSchema tokenizeResponseSchema = (TokenizeResponseSchema) o;
    return Objects.equals(this.responseHost, tokenizeResponseSchema.responseHost) &&
        Objects.equals(this.responseId, tokenizeResponseSchema.responseId) &&
        Objects.equals(this.decision, tokenizeResponseSchema.decision) &&
        Objects.equals(this.authenticationMethods, tokenizeResponseSchema.authenticationMethods) &&
        Objects.equals(this.tokenUniqueReference, tokenizeResponseSchema.tokenUniqueReference) &&
        Objects.equals(this.panUniqueReference, tokenizeResponseSchema.panUniqueReference) &&
        Objects.equals(this.productConfig, tokenizeResponseSchema.productConfig) &&
        Objects.equals(this.tokenInfo, tokenizeResponseSchema.tokenInfo) &&
        Objects.equals(this.tokenDetail, tokenizeResponseSchema.tokenDetail);
  }

  @Override
  public int hashCode() {
    return Objects.hash(responseHost, responseId, decision, authenticationMethods, tokenUniqueReference, panUniqueReference, productConfig, tokenInfo, tokenDetail);
  }

  @Override
  public String toString() {
    StringBuilder sb = new StringBuilder();
    sb.append("class TokenizeResponseSchema {\n");
    sb.append("    responseHost: ").append(toIndentedString(responseHost)).append("\n");
    sb.append("    responseId: ").append(toIndentedString(responseId)).append("\n");
    sb.append("    decision: ").append(toIndentedString(decision)).append("\n");
    sb.append("    authenticationMethods: ").append(toIndentedString(authenticationMethods)).append("\n");
    sb.append("    tokenUniqueReference: ").append(toIndentedString(tokenUniqueReference)).append("\n");
    sb.append("    panUniqueReference: ").append(toIndentedString(panUniqueReference)).append("\n");
    sb.append("    productConfig: ").append(toIndentedString(productConfig)).append("\n");
    sb.append("    tokenInfo: ").append(toIndentedString(tokenInfo)).append("\n");
    sb.append("    tokenDetail: ").append(toIndentedString(tokenDetail)).append("\n");
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

