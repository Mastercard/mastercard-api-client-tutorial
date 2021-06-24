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
import java.util.ArrayList;
import java.util.List;

/**
 * DeleteRequestSchema
 */
@javax.annotation.Generated(value = "org.openapitools.codegen.languages.JavaClientCodegen", date = "2021-06-24T14:19:40.105+01:00[Europe/London]")
public class DeleteRequestSchema {
  public static final String SERIALIZED_NAME_RESPONSE_HOST = "responseHost";
  @SerializedName(SERIALIZED_NAME_RESPONSE_HOST)
  private String responseHost;

  public static final String SERIALIZED_NAME_REQUEST_ID = "requestId";
  @SerializedName(SERIALIZED_NAME_REQUEST_ID)
  private String requestId;

  public static final String SERIALIZED_NAME_PAYMENT_APP_INSTANCE_ID = "paymentAppInstanceId";
  @SerializedName(SERIALIZED_NAME_PAYMENT_APP_INSTANCE_ID)
  private String paymentAppInstanceId;

  public static final String SERIALIZED_NAME_TOKEN_UNIQUE_REFERENCES = "tokenUniqueReferences";
  @SerializedName(SERIALIZED_NAME_TOKEN_UNIQUE_REFERENCES)
  private List<String> tokenUniqueReferences = new ArrayList<String>();

  public static final String SERIALIZED_NAME_CAUSED_BY = "causedBy";
  @SerializedName(SERIALIZED_NAME_CAUSED_BY)
  private String causedBy;

  public static final String SERIALIZED_NAME_REASON = "reason";
  @SerializedName(SERIALIZED_NAME_REASON)
  private String reason;

  public static final String SERIALIZED_NAME_REASON_CODE = "reasonCode";
  @SerializedName(SERIALIZED_NAME_REASON_CODE)
  private String reasonCode;


  public DeleteRequestSchema responseHost(String responseHost) {
    
    this.responseHost = responseHost;
    return this;
  }

   /**
   * The host that originated the request. Future calls in the same conversation may be routed to this host. 
   * @return responseHost
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "site2.payment-app-provider.com", value = "The host that originated the request. Future calls in the same conversation may be routed to this host. ")

  public String getResponseHost() {
    return responseHost;
  }


  public void setResponseHost(String responseHost) {
    this.responseHost = responseHost;
  }


  public DeleteRequestSchema requestId(String requestId) {
    
    this.requestId = requestId;
    return this;
  }

   /**
   * Unique identifier for the request. 
   * @return requestId
  **/
  @ApiModelProperty(example = "123456", required = true, value = "Unique identifier for the request. ")

  public String getRequestId() {
    return requestId;
  }


  public void setRequestId(String requestId) {
    this.requestId = requestId;
  }


  public DeleteRequestSchema paymentAppInstanceId(String paymentAppInstanceId) {
    
    this.paymentAppInstanceId = paymentAppInstanceId;
    return this;
  }

   /**
   * Identifier for the specific Mobile Payment App instance, unique across a given Wallet Identifier. This value cannot be changed after digitization. This field is alphanumeric and additionally web-safe base64 characters per RFC 4648 (minus \&quot;-\&quot;, underscore \&quot;_\&quot;) up to a maximum length of 48, &#x3D; should not be URL encoded. Conditional - not applicable for server based tokens but required otherwise. 
   * @return paymentAppInstanceId
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "123456789", value = "Identifier for the specific Mobile Payment App instance, unique across a given Wallet Identifier. This value cannot be changed after digitization. This field is alphanumeric and additionally web-safe base64 characters per RFC 4648 (minus \"-\", underscore \"_\") up to a maximum length of 48, = should not be URL encoded. Conditional - not applicable for server based tokens but required otherwise. ")

  public String getPaymentAppInstanceId() {
    return paymentAppInstanceId;
  }


  public void setPaymentAppInstanceId(String paymentAppInstanceId) {
    this.paymentAppInstanceId = paymentAppInstanceId;
  }


  public DeleteRequestSchema tokenUniqueReferences(List<String> tokenUniqueReferences) {
    
    this.tokenUniqueReferences = tokenUniqueReferences;
    return this;
  }

  public DeleteRequestSchema addTokenUniqueReferencesItem(String tokenUniqueReferencesItem) {
    this.tokenUniqueReferences.add(tokenUniqueReferencesItem);
    return this;
  }

   /**
   * The specific Token to be deleted. Array of more or more valid references as assigned by MDES 
   * @return tokenUniqueReferences
  **/
  @ApiModelProperty(example = "DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45", required = true, value = "The specific Token to be deleted. Array of more or more valid references as assigned by MDES ")

  public List<String> getTokenUniqueReferences() {
    return tokenUniqueReferences;
  }


  public void setTokenUniqueReferences(List<String> tokenUniqueReferences) {
    this.tokenUniqueReferences = tokenUniqueReferences;
  }


  public DeleteRequestSchema causedBy(String causedBy) {
    
    this.causedBy = causedBy;
    return this;
  }

   /**
   * Who or what caused the Token to be deleted. Must be either the &#39;CARDHOLDER&#39; (operation requested by the Cardholder) or &#39;TOKEN_REQUESTOR&#39; (operation requested by the token requestor). 
   * @return causedBy
  **/
  @ApiModelProperty(example = "CARDHOLDER", required = true, value = "Who or what caused the Token to be deleted. Must be either the 'CARDHOLDER' (operation requested by the Cardholder) or 'TOKEN_REQUESTOR' (operation requested by the token requestor). ")

  public String getCausedBy() {
    return causedBy;
  }


  public void setCausedBy(String causedBy) {
    this.causedBy = causedBy;
  }


  public DeleteRequestSchema reason(String reason) {
    
    this.reason = reason;
    return this;
  }

   /**
   * Free form reason why the Tokens are being suspended. 
   * @return reason
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(example = "Lost/stolen device", value = "Free form reason why the Tokens are being suspended. ")

  public String getReason() {
    return reason;
  }


  public void setReason(String reason) {
    this.reason = reason;
  }


  public DeleteRequestSchema reasonCode(String reasonCode) {
    
    this.reasonCode = reasonCode;
    return this;
  }

   /**
   * The reason for the action to be deleted. Must be one of &#39;SUSPECTED_FRAUD&#39; (suspected fraudulent token transactions), &#39;OTHER&#39; (Other - default used if value not provided). 
   * @return reasonCode
  **/
  @ApiModelProperty(example = "SUSPECTED_FRAUD", required = true, value = "The reason for the action to be deleted. Must be one of 'SUSPECTED_FRAUD' (suspected fraudulent token transactions), 'OTHER' (Other - default used if value not provided). ")

  public String getReasonCode() {
    return reasonCode;
  }


  public void setReasonCode(String reasonCode) {
    this.reasonCode = reasonCode;
  }


  @Override
  public boolean equals(Object o) {
    if (this == o) {
      return true;
    }
    if (o == null || getClass() != o.getClass()) {
      return false;
    }
    DeleteRequestSchema deleteRequestSchema = (DeleteRequestSchema) o;
    return Objects.equals(this.responseHost, deleteRequestSchema.responseHost) &&
        Objects.equals(this.requestId, deleteRequestSchema.requestId) &&
        Objects.equals(this.paymentAppInstanceId, deleteRequestSchema.paymentAppInstanceId) &&
        Objects.equals(this.tokenUniqueReferences, deleteRequestSchema.tokenUniqueReferences) &&
        Objects.equals(this.causedBy, deleteRequestSchema.causedBy) &&
        Objects.equals(this.reason, deleteRequestSchema.reason) &&
        Objects.equals(this.reasonCode, deleteRequestSchema.reasonCode);
  }

  @Override
  public int hashCode() {
    return Objects.hash(responseHost, requestId, paymentAppInstanceId, tokenUniqueReferences, causedBy, reason, reasonCode);
  }

  @Override
  public String toString() {
    StringBuilder sb = new StringBuilder();
    sb.append("class DeleteRequestSchema {\n");
    sb.append("    responseHost: ").append(toIndentedString(responseHost)).append("\n");
    sb.append("    requestId: ").append(toIndentedString(requestId)).append("\n");
    sb.append("    paymentAppInstanceId: ").append(toIndentedString(paymentAppInstanceId)).append("\n");
    sb.append("    tokenUniqueReferences: ").append(toIndentedString(tokenUniqueReferences)).append("\n");
    sb.append("    causedBy: ").append(toIndentedString(causedBy)).append("\n");
    sb.append("    reason: ").append(toIndentedString(reason)).append("\n");
    sb.append("    reasonCode: ").append(toIndentedString(reasonCode)).append("\n");
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

