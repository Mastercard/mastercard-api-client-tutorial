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
import com.mastercard.developer.mdes_digital_enablement_client.model.EncryptedPayload;
import java.io.IOException;
import java.util.Arrays;

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
 * NotifyTokenUpdatedRequestSchema
 */
@javax.annotation.Generated(value = "org.openapitools.codegen.languages.JavaClientCodegen", date = "2024-09-24T13:37:45.612619+01:00[Europe/Dublin]", comments = "Generator version: 7.5.0")
public class NotifyTokenUpdatedRequestSchema {
  public static final String SERIALIZED_NAME_RESPONSE_HOST = "responseHost";
  @SerializedName(SERIALIZED_NAME_RESPONSE_HOST)
  private String responseHost;

  public static final String SERIALIZED_NAME_REQUEST_ID = "requestId";
  @SerializedName(SERIALIZED_NAME_REQUEST_ID)
  private String requestId;

  public static final String SERIALIZED_NAME_ENCRYPTED_PAYLOAD = "encryptedPayload";
  @SerializedName(SERIALIZED_NAME_ENCRYPTED_PAYLOAD)
  private EncryptedPayload encryptedPayload;

  public NotifyTokenUpdatedRequestSchema() {
  }

  public NotifyTokenUpdatedRequestSchema responseHost(String responseHost) {
    this.responseHost = responseHost;
    return this;
  }

   /**
   * The host that originated the request. Future calls in the same conversation should be routed to this host. 
   * @return responseHost
  **/
  @javax.annotation.Nonnull
  public String getResponseHost() {
    return responseHost;
  }

  public void setResponseHost(String responseHost) {
    this.responseHost = responseHost;
  }


  public NotifyTokenUpdatedRequestSchema requestId(String requestId) {
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


  public NotifyTokenUpdatedRequestSchema encryptedPayload(EncryptedPayload encryptedPayload) {
    this.encryptedPayload = encryptedPayload;
    return this;
  }

   /**
   * Get encryptedPayload
   * @return encryptedPayload
  **/
  @javax.annotation.Nonnull
  public EncryptedPayload getEncryptedPayload() {
    return encryptedPayload;
  }

  public void setEncryptedPayload(EncryptedPayload encryptedPayload) {
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
    NotifyTokenUpdatedRequestSchema notifyTokenUpdatedRequestSchema = (NotifyTokenUpdatedRequestSchema) o;
    return Objects.equals(this.responseHost, notifyTokenUpdatedRequestSchema.responseHost) &&
        Objects.equals(this.requestId, notifyTokenUpdatedRequestSchema.requestId) &&
        Objects.equals(this.encryptedPayload, notifyTokenUpdatedRequestSchema.encryptedPayload);
  }

  @Override
  public int hashCode() {
    return Objects.hash(responseHost, requestId, encryptedPayload);
  }

  @Override
  public String toString() {
    StringBuilder sb = new StringBuilder();
    sb.append("class NotifyTokenUpdatedRequestSchema {\n");
    sb.append("    responseHost: ").append(toIndentedString(responseHost)).append("\n");
    sb.append("    requestId: ").append(toIndentedString(requestId)).append("\n");
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


  public static HashSet<String> openapiFields;
  public static HashSet<String> openapiRequiredFields;

  static {
    // a set of all properties/fields (JSON key names)
    openapiFields = new HashSet<String>();
    openapiFields.add("responseHost");
    openapiFields.add("requestId");
    openapiFields.add("encryptedPayload");

    // a set of required properties/fields (JSON key names)
    openapiRequiredFields = new HashSet<String>();
    openapiRequiredFields.add("responseHost");
    openapiRequiredFields.add("requestId");
    openapiRequiredFields.add("encryptedPayload");
  }

 /**
  * Validates the JSON Element and throws an exception if issues found
  *
  * @param jsonElement JSON Element
  * @throws IOException if the JSON Element is invalid with respect to NotifyTokenUpdatedRequestSchema
  */
  public static void validateJsonElement(JsonElement jsonElement) throws IOException {
      if (jsonElement == null) {
        if (!NotifyTokenUpdatedRequestSchema.openapiRequiredFields.isEmpty()) { // has required fields but JSON element is null
          throw new IllegalArgumentException(String.format("The required field(s) %s in NotifyTokenUpdatedRequestSchema is not found in the empty JSON string", NotifyTokenUpdatedRequestSchema.openapiRequiredFields.toString()));
        }
      }

      Set<Map.Entry<String, JsonElement>> entries = jsonElement.getAsJsonObject().entrySet();
      // check to see if the JSON string contains additional fields
      for (Map.Entry<String, JsonElement> entry : entries) {
        if (!NotifyTokenUpdatedRequestSchema.openapiFields.contains(entry.getKey())) {
          throw new IllegalArgumentException(String.format("The field `%s` in the JSON string is not defined in the `NotifyTokenUpdatedRequestSchema` properties. JSON: %s", entry.getKey(), jsonElement.toString()));
        }
      }

      // check to make sure all required properties/fields are present in the JSON string
      for (String requiredField : NotifyTokenUpdatedRequestSchema.openapiRequiredFields) {
        if (jsonElement.getAsJsonObject().get(requiredField) == null) {
          throw new IllegalArgumentException(String.format("The required field `%s` is not found in the JSON string: %s", requiredField, jsonElement.toString()));
        }
      }
        JsonObject jsonObj = jsonElement.getAsJsonObject();
      if (!jsonObj.get("responseHost").isJsonPrimitive()) {
        throw new IllegalArgumentException(String.format("Expected the field `responseHost` to be a primitive type in the JSON string but got `%s`", jsonObj.get("responseHost").toString()));
      }
      if (!jsonObj.get("requestId").isJsonPrimitive()) {
        throw new IllegalArgumentException(String.format("Expected the field `requestId` to be a primitive type in the JSON string but got `%s`", jsonObj.get("requestId").toString()));
      }
      // validate the required field `encryptedPayload`
      EncryptedPayload.validateJsonElement(jsonObj.get("encryptedPayload"));
  }

  public static class CustomTypeAdapterFactory implements TypeAdapterFactory {
    @SuppressWarnings("unchecked")
    @Override
    public <T> TypeAdapter<T> create(Gson gson, TypeToken<T> type) {
       if (!NotifyTokenUpdatedRequestSchema.class.isAssignableFrom(type.getRawType())) {
         return null; // this class only serializes 'NotifyTokenUpdatedRequestSchema' and its subtypes
       }
       final TypeAdapter<JsonElement> elementAdapter = gson.getAdapter(JsonElement.class);
       final TypeAdapter<NotifyTokenUpdatedRequestSchema> thisAdapter
                        = gson.getDelegateAdapter(this, TypeToken.get(NotifyTokenUpdatedRequestSchema.class));

       return (TypeAdapter<T>) new TypeAdapter<NotifyTokenUpdatedRequestSchema>() {
           @Override
           public void write(JsonWriter out, NotifyTokenUpdatedRequestSchema value) throws IOException {
             JsonObject obj = thisAdapter.toJsonTree(value).getAsJsonObject();
             elementAdapter.write(out, obj);
           }

           @Override
           public NotifyTokenUpdatedRequestSchema read(JsonReader in) throws IOException {
             JsonElement jsonElement = elementAdapter.read(in);
             validateJsonElement(jsonElement);
             return thisAdapter.fromJsonTree(jsonElement);
           }

       }.nullSafe();
    }
  }

 /**
  * Create an instance of NotifyTokenUpdatedRequestSchema given an JSON string
  *
  * @param jsonString JSON string
  * @return An instance of NotifyTokenUpdatedRequestSchema
  * @throws IOException if the JSON string is invalid with respect to NotifyTokenUpdatedRequestSchema
  */
  public static NotifyTokenUpdatedRequestSchema fromJson(String jsonString) throws IOException {
    return JSON.getGson().fromJson(jsonString, NotifyTokenUpdatedRequestSchema.class);
  }

 /**
  * Convert an instance of NotifyTokenUpdatedRequestSchema to an JSON string
  *
  * @return JSON string
  */
  public String toJson() {
    return JSON.getGson().toJson(this);
  }
}

