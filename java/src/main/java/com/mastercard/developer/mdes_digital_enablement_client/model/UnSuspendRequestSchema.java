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
import com.google.gson.TypeAdapter;
import com.google.gson.annotations.JsonAdapter;
import com.google.gson.annotations.SerializedName;
import com.google.gson.stream.JsonReader;
import com.google.gson.stream.JsonWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;
import com.google.gson.JsonArray;
import com.google.gson.JsonDeserializationContext;
import com.google.gson.JsonDeserializer;
import com.google.gson.JsonElement;
import com.google.gson.JsonObject;
import com.google.gson.JsonParseException;
import com.google.gson.TypeAdapterFactory;
import com.google.gson.reflect.TypeToken;
import com.google.gson.TypeAdapter;
import com.google.gson.stream.JsonReader;
import com.google.gson.stream.JsonWriter;
import java.io.IOException;

import java.lang.reflect.Type;
import java.util.HashMap;
import java.util.HashSet;
import java.util.List;
import java.util.Map;
import java.util.Set;

import com.mastercard.developer.mdes_digital_enablement_client.JSON;

/**
 * UnSuspendRequestSchema
 */
@javax.annotation.Generated(value = "org.openapitools.codegen.languages.JavaClientCodegen", date = "2024-09-24T13:37:45.612619+01:00[Europe/Dublin]", comments = "Generator version: 7.5.0")
public class UnSuspendRequestSchema {
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
  private List<String> tokenUniqueReferences = new ArrayList<>();

  public static final String SERIALIZED_NAME_CAUSED_BY = "causedBy";
  @SerializedName(SERIALIZED_NAME_CAUSED_BY)
  private String causedBy;

  public static final String SERIALIZED_NAME_REASON = "reason";
  @SerializedName(SERIALIZED_NAME_REASON)
  private String reason;

  public static final String SERIALIZED_NAME_REASON_CODE = "reasonCode";
  @SerializedName(SERIALIZED_NAME_REASON_CODE)
  private String reasonCode;

  public UnSuspendRequestSchema() {
  }

  public UnSuspendRequestSchema responseHost(String responseHost) {
    this.responseHost = responseHost;
    return this;
  }

   /**
   * The host that originated the request. Future calls in the same conversation may be routed to this host. 
   * @return responseHost
  **/
  @javax.annotation.Nullable
  public String getResponseHost() {
    return responseHost;
  }

  public void setResponseHost(String responseHost) {
    this.responseHost = responseHost;
  }


  public UnSuspendRequestSchema requestId(String requestId) {
    this.requestId = requestId;
    return this;
  }

   /**
   * Unique identifier for the request. 
   * @return requestId
  **/
  @javax.annotation.Nonnull
  public String getRequestId() {
    return requestId;
  }

  public void setRequestId(String requestId) {
    this.requestId = requestId;
  }


  public UnSuspendRequestSchema paymentAppInstanceId(String paymentAppInstanceId) {
    this.paymentAppInstanceId = paymentAppInstanceId;
    return this;
  }

   /**
   * Identifier for the specific Mobile Payment App instance, unique across a given Wallet Identifier. This value cannot be changed after digitization. This field is alphanumeric and additionally web-safe base64 characters per RFC 4648 (minus \&quot;-\&quot;, underscore \&quot;_\&quot;) up to a maximum length of 48, &#x3D; should not be URL encoded. Conditional - not applicable for server based tokens but required otherwise. 
   * @return paymentAppInstanceId
  **/
  @javax.annotation.Nullable
  public String getPaymentAppInstanceId() {
    return paymentAppInstanceId;
  }

  public void setPaymentAppInstanceId(String paymentAppInstanceId) {
    this.paymentAppInstanceId = paymentAppInstanceId;
  }


  public UnSuspendRequestSchema tokenUniqueReferences(List<String> tokenUniqueReferences) {
    this.tokenUniqueReferences = tokenUniqueReferences;
    return this;
  }

  public UnSuspendRequestSchema addTokenUniqueReferencesItem(String tokenUniqueReferencesItem) {
    if (this.tokenUniqueReferences == null) {
      this.tokenUniqueReferences = new ArrayList<>();
    }
    this.tokenUniqueReferences.add(tokenUniqueReferencesItem);
    return this;
  }

   /**
   * The specific Token to be unsuspended. Array of more or more valid references as assigned by MDES 
   * @return tokenUniqueReferences
  **/
  @javax.annotation.Nonnull
  public List<String> getTokenUniqueReferences() {
    return tokenUniqueReferences;
  }

  public void setTokenUniqueReferences(List<String> tokenUniqueReferences) {
    this.tokenUniqueReferences = tokenUniqueReferences;
  }


  public UnSuspendRequestSchema causedBy(String causedBy) {
    this.causedBy = causedBy;
    return this;
  }

   /**
   * Who or what caused the Token to be unsuspended. Must be either the &#39;CARDHOLDER&#39; (operation requested by the Cardholder) or &#39;TOKEN_REQUESTOR&#39; (operation requested by the token requestor). 
   * @return causedBy
  **/
  @javax.annotation.Nonnull
  public String getCausedBy() {
    return causedBy;
  }

  public void setCausedBy(String causedBy) {
    this.causedBy = causedBy;
  }


  public UnSuspendRequestSchema reason(String reason) {
    this.reason = reason;
    return this;
  }

   /**
   * Free form reason why the Tokens are being suspended. 
   * @return reason
  **/
  @javax.annotation.Nullable
  public String getReason() {
    return reason;
  }

  public void setReason(String reason) {
    this.reason = reason;
  }


  public UnSuspendRequestSchema reasonCode(String reasonCode) {
    this.reasonCode = reasonCode;
    return this;
  }

   /**
   * The reason for the action to be unsuspended. Must be one of &#39;SUSPECTED_FRAUD&#39; (suspected fraudulent token transactions), &#39;OTHER&#39; (Other - default used if value not provided). 
   * @return reasonCode
  **/
  @javax.annotation.Nonnull
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
    UnSuspendRequestSchema unSuspendRequestSchema = (UnSuspendRequestSchema) o;
    return Objects.equals(this.responseHost, unSuspendRequestSchema.responseHost) &&
        Objects.equals(this.requestId, unSuspendRequestSchema.requestId) &&
        Objects.equals(this.paymentAppInstanceId, unSuspendRequestSchema.paymentAppInstanceId) &&
        Objects.equals(this.tokenUniqueReferences, unSuspendRequestSchema.tokenUniqueReferences) &&
        Objects.equals(this.causedBy, unSuspendRequestSchema.causedBy) &&
        Objects.equals(this.reason, unSuspendRequestSchema.reason) &&
        Objects.equals(this.reasonCode, unSuspendRequestSchema.reasonCode);
  }

  @Override
  public int hashCode() {
    return Objects.hash(responseHost, requestId, paymentAppInstanceId, tokenUniqueReferences, causedBy, reason, reasonCode);
  }

  @Override
  public String toString() {
    StringBuilder sb = new StringBuilder();
    sb.append("class UnSuspendRequestSchema {\n");
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


  public static HashSet<String> openapiFields;
  public static HashSet<String> openapiRequiredFields;

  static {
    // a set of all properties/fields (JSON key names)
    openapiFields = new HashSet<String>();
    openapiFields.add("responseHost");
    openapiFields.add("requestId");
    openapiFields.add("paymentAppInstanceId");
    openapiFields.add("tokenUniqueReferences");
    openapiFields.add("causedBy");
    openapiFields.add("reason");
    openapiFields.add("reasonCode");

    // a set of required properties/fields (JSON key names)
    openapiRequiredFields = new HashSet<String>();
    openapiRequiredFields.add("requestId");
    openapiRequiredFields.add("tokenUniqueReferences");
    openapiRequiredFields.add("causedBy");
    openapiRequiredFields.add("reasonCode");
  }

 /**
  * Validates the JSON Element and throws an exception if issues found
  *
  * @param jsonElement JSON Element
  * @throws IOException if the JSON Element is invalid with respect to UnSuspendRequestSchema
  */
  public static void validateJsonElement(JsonElement jsonElement) throws IOException {
      if (jsonElement == null) {
        if (!UnSuspendRequestSchema.openapiRequiredFields.isEmpty()) { // has required fields but JSON element is null
          throw new IllegalArgumentException(String.format("The required field(s) %s in UnSuspendRequestSchema is not found in the empty JSON string", UnSuspendRequestSchema.openapiRequiredFields.toString()));
        }
      }

      Set<Map.Entry<String, JsonElement>> entries = jsonElement.getAsJsonObject().entrySet();
      // check to see if the JSON string contains additional fields
      for (Map.Entry<String, JsonElement> entry : entries) {
        if (!UnSuspendRequestSchema.openapiFields.contains(entry.getKey())) {
          throw new IllegalArgumentException(String.format("The field `%s` in the JSON string is not defined in the `UnSuspendRequestSchema` properties. JSON: %s", entry.getKey(), jsonElement.toString()));
        }
      }

      // check to make sure all required properties/fields are present in the JSON string
      for (String requiredField : UnSuspendRequestSchema.openapiRequiredFields) {
        if (jsonElement.getAsJsonObject().get(requiredField) == null) {
          throw new IllegalArgumentException(String.format("The required field `%s` is not found in the JSON string: %s", requiredField, jsonElement.toString()));
        }
      }
        JsonObject jsonObj = jsonElement.getAsJsonObject();
      if ((jsonObj.get("responseHost") != null && !jsonObj.get("responseHost").isJsonNull()) && !jsonObj.get("responseHost").isJsonPrimitive()) {
        throw new IllegalArgumentException(String.format("Expected the field `responseHost` to be a primitive type in the JSON string but got `%s`", jsonObj.get("responseHost").toString()));
      }
      if (!jsonObj.get("requestId").isJsonPrimitive()) {
        throw new IllegalArgumentException(String.format("Expected the field `requestId` to be a primitive type in the JSON string but got `%s`", jsonObj.get("requestId").toString()));
      }
      if ((jsonObj.get("paymentAppInstanceId") != null && !jsonObj.get("paymentAppInstanceId").isJsonNull()) && !jsonObj.get("paymentAppInstanceId").isJsonPrimitive()) {
        throw new IllegalArgumentException(String.format("Expected the field `paymentAppInstanceId` to be a primitive type in the JSON string but got `%s`", jsonObj.get("paymentAppInstanceId").toString()));
      }
      // ensure the required json array is present
      if (jsonObj.get("tokenUniqueReferences") == null) {
        throw new IllegalArgumentException("Expected the field `linkedContent` to be an array in the JSON string but got `null`");
      } else if (!jsonObj.get("tokenUniqueReferences").isJsonArray()) {
        throw new IllegalArgumentException(String.format("Expected the field `tokenUniqueReferences` to be an array in the JSON string but got `%s`", jsonObj.get("tokenUniqueReferences").toString()));
      }
      if (!jsonObj.get("causedBy").isJsonPrimitive()) {
        throw new IllegalArgumentException(String.format("Expected the field `causedBy` to be a primitive type in the JSON string but got `%s`", jsonObj.get("causedBy").toString()));
      }
      if ((jsonObj.get("reason") != null && !jsonObj.get("reason").isJsonNull()) && !jsonObj.get("reason").isJsonPrimitive()) {
        throw new IllegalArgumentException(String.format("Expected the field `reason` to be a primitive type in the JSON string but got `%s`", jsonObj.get("reason").toString()));
      }
      if (!jsonObj.get("reasonCode").isJsonPrimitive()) {
        throw new IllegalArgumentException(String.format("Expected the field `reasonCode` to be a primitive type in the JSON string but got `%s`", jsonObj.get("reasonCode").toString()));
      }
  }

  public static class CustomTypeAdapterFactory implements TypeAdapterFactory {
    @SuppressWarnings("unchecked")
    @Override
    public <T> TypeAdapter<T> create(Gson gson, TypeToken<T> type) {
       if (!UnSuspendRequestSchema.class.isAssignableFrom(type.getRawType())) {
         return null; // this class only serializes 'UnSuspendRequestSchema' and its subtypes
       }
       final TypeAdapter<JsonElement> elementAdapter = gson.getAdapter(JsonElement.class);
       final TypeAdapter<UnSuspendRequestSchema> thisAdapter
                        = gson.getDelegateAdapter(this, TypeToken.get(UnSuspendRequestSchema.class));

       return (TypeAdapter<T>) new TypeAdapter<UnSuspendRequestSchema>() {
           @Override
           public void write(JsonWriter out, UnSuspendRequestSchema value) throws IOException {
             JsonObject obj = thisAdapter.toJsonTree(value).getAsJsonObject();
             elementAdapter.write(out, obj);
           }

           @Override
           public UnSuspendRequestSchema read(JsonReader in) throws IOException {
             JsonElement jsonElement = elementAdapter.read(in);
             validateJsonElement(jsonElement);
             return thisAdapter.fromJsonTree(jsonElement);
           }

       }.nullSafe();
    }
  }

 /**
  * Create an instance of UnSuspendRequestSchema given an JSON string
  *
  * @param jsonString JSON string
  * @return An instance of UnSuspendRequestSchema
  * @throws IOException if the JSON string is invalid with respect to UnSuspendRequestSchema
  */
  public static UnSuspendRequestSchema fromJson(String jsonString) throws IOException {
    return JSON.getGson().fromJson(jsonString, UnSuspendRequestSchema.class);
  }

 /**
  * Convert an instance of UnSuspendRequestSchema to an JSON string
  *
  * @return JSON string
  */
  public String toJson() {
    return JSON.getGson().toJson(this);
  }
}

