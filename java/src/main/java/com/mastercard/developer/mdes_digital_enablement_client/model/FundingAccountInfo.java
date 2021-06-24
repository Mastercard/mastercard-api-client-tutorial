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
import com.mastercard.developer.mdes_digital_enablement_client.model.FundingAccountInfoEncryptedPayload;
import io.swagger.annotations.ApiModel;
import io.swagger.annotations.ApiModelProperty;
import java.io.IOException;

/**
 * FundingAccountInfo
 */
@javax.annotation.Generated(value = "org.openapitools.codegen.languages.JavaClientCodegen", date = "2021-06-24T14:19:40.105+01:00[Europe/London]")
public class FundingAccountInfo {
  public static final String SERIALIZED_NAME_PAN_UNIQUE_REFERENCE = "panUniqueReference";
  @SerializedName(SERIALIZED_NAME_PAN_UNIQUE_REFERENCE)
  private String panUniqueReference;

  public static final String SERIALIZED_NAME_TOKEN_UNIQUE_REFERENCE = "tokenUniqueReference";
  @SerializedName(SERIALIZED_NAME_TOKEN_UNIQUE_REFERENCE)
  private String tokenUniqueReference;

  public static final String SERIALIZED_NAME_ENCRYPTED_PAYLOAD = "encryptedPayload";
  @SerializedName(SERIALIZED_NAME_ENCRYPTED_PAYLOAD)
  private FundingAccountInfoEncryptedPayload encryptedPayload;


  public FundingAccountInfo panUniqueReference(String panUniqueReference) {
    
    this.panUniqueReference = panUniqueReference;
    return this;
  }

   /**
   * **(CONDITIONAL)** For repeat digitizations, the unique reference allocated to the Primary Account Number. When supplied, the tokenUniqueReferenceForPanInfo, accountNumber, expiryMonth and expiryYear must be omitted from CardInfoData. Only allowed if Only allowed if tokenUniqueReference and pushAccountReceipt are not present and encrypted data does not contain the account information. 
   * @return panUniqueReference
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(value = "**(CONDITIONAL)** For repeat digitizations, the unique reference allocated to the Primary Account Number. When supplied, the tokenUniqueReferenceForPanInfo, accountNumber, expiryMonth and expiryYear must be omitted from CardInfoData. Only allowed if Only allowed if tokenUniqueReference and pushAccountReceipt are not present and encrypted data does not contain the account information. ")

  public String getPanUniqueReference() {
    return panUniqueReference;
  }


  public void setPanUniqueReference(String panUniqueReference) {
    this.panUniqueReference = panUniqueReference;
  }


  public FundingAccountInfo tokenUniqueReference(String tokenUniqueReference) {
    
    this.tokenUniqueReference = tokenUniqueReference;
    return this;
  }

   /**
   * **(CONDITIONAL)** A unique reference assigned following the allocation of a token used to identify the token for the duration of its lifetime.  For repeat digitizations, the unique reference allocated to the token will be used to retrieve the financial account information. When supplied, the account information is omitted from FundingAccountData. Only allowed if panUniqueReference and pushAccountReceipt are not present and encrypted data does not contain the account information. 
   * @return tokenUniqueReference
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(value = "**(CONDITIONAL)** A unique reference assigned following the allocation of a token used to identify the token for the duration of its lifetime.  For repeat digitizations, the unique reference allocated to the token will be used to retrieve the financial account information. When supplied, the account information is omitted from FundingAccountData. Only allowed if panUniqueReference and pushAccountReceipt are not present and encrypted data does not contain the account information. ")

  public String getTokenUniqueReference() {
    return tokenUniqueReference;
  }


  public void setTokenUniqueReference(String tokenUniqueReference) {
    this.tokenUniqueReference = tokenUniqueReference;
  }


  public FundingAccountInfo encryptedPayload(FundingAccountInfoEncryptedPayload encryptedPayload) {
    
    this.encryptedPayload = encryptedPayload;
    return this;
  }

   /**
   * Get encryptedPayload
   * @return encryptedPayload
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(value = "")

  public FundingAccountInfoEncryptedPayload getEncryptedPayload() {
    return encryptedPayload;
  }


  public void setEncryptedPayload(FundingAccountInfoEncryptedPayload encryptedPayload) {
    this.encryptedPayload = encryptedPayload;
  }


  @Override
  public boolean equals(Object o) {
    if (this == o) {
      return true;
    }
    if (o == null || getClass() != o.getClass()) {
      return false;
    }
    FundingAccountInfo fundingAccountInfo = (FundingAccountInfo) o;
    return Objects.equals(this.panUniqueReference, fundingAccountInfo.panUniqueReference) &&
        Objects.equals(this.tokenUniqueReference, fundingAccountInfo.tokenUniqueReference) &&
        Objects.equals(this.encryptedPayload, fundingAccountInfo.encryptedPayload);
  }

  @Override
  public int hashCode() {
    return Objects.hash(panUniqueReference, tokenUniqueReference, encryptedPayload);
  }

  @Override
  public String toString() {
    StringBuilder sb = new StringBuilder();
    sb.append("class FundingAccountInfo {\n");
    sb.append("    panUniqueReference: ").append(toIndentedString(panUniqueReference)).append("\n");
    sb.append("    tokenUniqueReference: ").append(toIndentedString(tokenUniqueReference)).append("\n");
    sb.append("    encryptedPayload: ").append(toIndentedString(encryptedPayload)).append("\n");
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

