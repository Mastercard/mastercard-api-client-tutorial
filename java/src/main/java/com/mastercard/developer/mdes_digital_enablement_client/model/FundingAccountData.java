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
import com.mastercard.developer.mdes_digital_enablement_client.model.AccountHolderData;
import com.mastercard.developer.mdes_digital_enablement_client.model.CardAccountDataInbound;
import io.swagger.annotations.ApiModel;
import io.swagger.annotations.ApiModelProperty;
import java.io.IOException;

/**
 * FundingAccountData
 */
@javax.annotation.Generated(value = "org.openapitools.codegen.languages.JavaClientCodegen", date = "2021-08-03T18:13:45.340+01:00[Europe/London]")
public class FundingAccountData {
  public static final String SERIALIZED_NAME_CARD_ACCOUNT_DATA = "cardAccountData";
  @SerializedName(SERIALIZED_NAME_CARD_ACCOUNT_DATA)
  private CardAccountDataInbound cardAccountData;

  public static final String SERIALIZED_NAME_ACCOUNT_HOLDER_DATA = "accountHolderData";
  @SerializedName(SERIALIZED_NAME_ACCOUNT_HOLDER_DATA)
  private AccountHolderData accountHolderData;

  public static final String SERIALIZED_NAME_SOURCE = "source";
  @SerializedName(SERIALIZED_NAME_SOURCE)
  private String source;


  public FundingAccountData cardAccountData(CardAccountDataInbound cardAccountData) {
    
    this.cardAccountData = cardAccountData;
    return this;
  }

   /**
   * Get cardAccountData
   * @return cardAccountData
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(value = "")

  public CardAccountDataInbound getCardAccountData() {
    return cardAccountData;
  }


  public void setCardAccountData(CardAccountDataInbound cardAccountData) {
    this.cardAccountData = cardAccountData;
  }


  public FundingAccountData accountHolderData(AccountHolderData accountHolderData) {
    
    this.accountHolderData = accountHolderData;
    return this;
  }

   /**
   * Get accountHolderData
   * @return accountHolderData
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(value = "")

  public AccountHolderData getAccountHolderData() {
    return accountHolderData;
  }


  public void setAccountHolderData(AccountHolderData accountHolderData) {
    this.accountHolderData = accountHolderData;
  }


  public FundingAccountData source(String source) {
    
    this.source = source;
    return this;
  }

   /**
   * (**Required as minimum for Tokenization**) The source of the account. Must be one of   * ACCOUNT_ON_FILE   * ACCOUNT_ADDED_MANUALLY   * ACCOUNT_ADDED_VIA_APPLICATION 
   * @return source
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "ACCOUNT_ON_FILE", value = "(**Required as minimum for Tokenization**) The source of the account. Must be one of   * ACCOUNT_ON_FILE   * ACCOUNT_ADDED_MANUALLY   * ACCOUNT_ADDED_VIA_APPLICATION ")

  public String getSource() {
    return source;
  }


  public void setSource(String source) {
    this.source = source;
  }


  @Override
  public boolean equals(Object o) {
    if (this == o) {
      return true;
    }
    if (o == null || getClass() != o.getClass()) {
      return false;
    }
    FundingAccountData fundingAccountData = (FundingAccountData) o;
    return Objects.equals(this.cardAccountData, fundingAccountData.cardAccountData) &&
        Objects.equals(this.accountHolderData, fundingAccountData.accountHolderData) &&
        Objects.equals(this.source, fundingAccountData.source);
  }

  @Override
  public int hashCode() {
    return Objects.hash(cardAccountData, accountHolderData, source);
  }

  @Override
  public String toString() {
    StringBuilder sb = new StringBuilder();
    sb.append("class FundingAccountData {\n");
    sb.append("    cardAccountData: ").append(toIndentedString(cardAccountData)).append("\n");
    sb.append("    accountHolderData: ").append(toIndentedString(accountHolderData)).append("\n");
    sb.append("    source: ").append(toIndentedString(source)).append("\n");
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

