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
 * TokenDetailDataGetTokenOnly
 */
@javax.annotation.Generated(value = "org.openapitools.codegen.languages.JavaClientCodegen", date = "2024-09-24T13:37:45.612619+01:00[Europe/Dublin]", comments = "Generator version: 7.5.0")
public class TokenDetailDataGetTokenOnly {
  public static final String SERIALIZED_NAME_TOKEN_NUMBER = "tokenNumber";
  @SerializedName(SERIALIZED_NAME_TOKEN_NUMBER)
  private String tokenNumber;

  public static final String SERIALIZED_NAME_EXPIRY_MONTH = "expiryMonth";
  @SerializedName(SERIALIZED_NAME_EXPIRY_MONTH)
  private String expiryMonth;

  public static final String SERIALIZED_NAME_EXPIRY_YEAR = "expiryYear";
  @SerializedName(SERIALIZED_NAME_EXPIRY_YEAR)
  private String expiryYear;

  public static final String SERIALIZED_NAME_PAYMENT_ACCOUNT_REFERENCE = "paymentAccountReference";
  @SerializedName(SERIALIZED_NAME_PAYMENT_ACCOUNT_REFERENCE)
  private String paymentAccountReference;

  public TokenDetailDataGetTokenOnly() {
  }

  public TokenDetailDataGetTokenOnly tokenNumber(String tokenNumber) {
    this.tokenNumber = tokenNumber;
    return this;
  }

   /**
   * The Token Primary Account Number of the Card. 
   * @return tokenNumber
  **/
  @javax.annotation.Nullable
  public String getTokenNumber() {
    return tokenNumber;
  }

  public void setTokenNumber(String tokenNumber) {
    this.tokenNumber = tokenNumber;
  }


  public TokenDetailDataGetTokenOnly expiryMonth(String expiryMonth) {
    this.expiryMonth = expiryMonth;
    return this;
  }

   /**
   * The month of the token expiration date. 
   * @return expiryMonth
  **/
  @javax.annotation.Nullable
  public String getExpiryMonth() {
    return expiryMonth;
  }

  public void setExpiryMonth(String expiryMonth) {
    this.expiryMonth = expiryMonth;
  }


  public TokenDetailDataGetTokenOnly expiryYear(String expiryYear) {
    this.expiryYear = expiryYear;
    return this;
  }

   /**
   * The year of the token expiration date. 
   * @return expiryYear
  **/
  @javax.annotation.Nullable
  public String getExpiryYear() {
    return expiryYear;
  }

  public void setExpiryYear(String expiryYear) {
    this.expiryYear = expiryYear;
  }


  public TokenDetailDataGetTokenOnly paymentAccountReference(String paymentAccountReference) {
    this.paymentAccountReference = paymentAccountReference;
    return this;
  }

   /**
   * The unique account reference assigned to the PAN. Conditionally returned if the Token Requestor has opted to receive PAR and providing PAR is assigned by Mastercard or the Issuer provides PAR in the authorization message response. 
   * @return paymentAccountReference
  **/
  @javax.annotation.Nullable
  public String getPaymentAccountReference() {
    return paymentAccountReference;
  }

  public void setPaymentAccountReference(String paymentAccountReference) {
    this.paymentAccountReference = paymentAccountReference;
  }



  @Override
  public boolean equals(Object o) {
    if (this == o) {
      return true;
    }
    if (o == null || getClass() != o.getClass()) {
      return false;
    }
    TokenDetailDataGetTokenOnly tokenDetailDataGetTokenOnly = (TokenDetailDataGetTokenOnly) o;
    return Objects.equals(this.tokenNumber, tokenDetailDataGetTokenOnly.tokenNumber) &&
        Objects.equals(this.expiryMonth, tokenDetailDataGetTokenOnly.expiryMonth) &&
        Objects.equals(this.expiryYear, tokenDetailDataGetTokenOnly.expiryYear) &&
        Objects.equals(this.paymentAccountReference, tokenDetailDataGetTokenOnly.paymentAccountReference);
  }

  @Override
  public int hashCode() {
    return Objects.hash(tokenNumber, expiryMonth, expiryYear, paymentAccountReference);
  }

  @Override
  public String toString() {
    StringBuilder sb = new StringBuilder();
    sb.append("class TokenDetailDataGetTokenOnly {\n");
    sb.append("    tokenNumber: ").append(toIndentedString(tokenNumber)).append("\n");
    sb.append("    expiryMonth: ").append(toIndentedString(expiryMonth)).append("\n");
    sb.append("    expiryYear: ").append(toIndentedString(expiryYear)).append("\n");
    sb.append("    paymentAccountReference: ").append(toIndentedString(paymentAccountReference)).append("\n");
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
    openapiFields.add("tokenNumber");
    openapiFields.add("expiryMonth");
    openapiFields.add("expiryYear");
    openapiFields.add("paymentAccountReference");

    // a set of required properties/fields (JSON key names)
    openapiRequiredFields = new HashSet<String>();
  }

 /**
  * Validates the JSON Element and throws an exception if issues found
  *
  * @param jsonElement JSON Element
  * @throws IOException if the JSON Element is invalid with respect to TokenDetailDataGetTokenOnly
  */
  public static void validateJsonElement(JsonElement jsonElement) throws IOException {
      if (jsonElement == null) {
        if (!TokenDetailDataGetTokenOnly.openapiRequiredFields.isEmpty()) { // has required fields but JSON element is null
          throw new IllegalArgumentException(String.format("The required field(s) %s in TokenDetailDataGetTokenOnly is not found in the empty JSON string", TokenDetailDataGetTokenOnly.openapiRequiredFields.toString()));
        }
      }

      Set<Map.Entry<String, JsonElement>> entries = jsonElement.getAsJsonObject().entrySet();
      // check to see if the JSON string contains additional fields
      for (Map.Entry<String, JsonElement> entry : entries) {
        if (!TokenDetailDataGetTokenOnly.openapiFields.contains(entry.getKey())) {
          throw new IllegalArgumentException(String.format("The field `%s` in the JSON string is not defined in the `TokenDetailDataGetTokenOnly` properties. JSON: %s", entry.getKey(), jsonElement.toString()));
        }
      }
        JsonObject jsonObj = jsonElement.getAsJsonObject();
      if ((jsonObj.get("tokenNumber") != null && !jsonObj.get("tokenNumber").isJsonNull()) && !jsonObj.get("tokenNumber").isJsonPrimitive()) {
        throw new IllegalArgumentException(String.format("Expected the field `tokenNumber` to be a primitive type in the JSON string but got `%s`", jsonObj.get("tokenNumber").toString()));
      }
      if ((jsonObj.get("expiryMonth") != null && !jsonObj.get("expiryMonth").isJsonNull()) && !jsonObj.get("expiryMonth").isJsonPrimitive()) {
        throw new IllegalArgumentException(String.format("Expected the field `expiryMonth` to be a primitive type in the JSON string but got `%s`", jsonObj.get("expiryMonth").toString()));
      }
      if ((jsonObj.get("expiryYear") != null && !jsonObj.get("expiryYear").isJsonNull()) && !jsonObj.get("expiryYear").isJsonPrimitive()) {
        throw new IllegalArgumentException(String.format("Expected the field `expiryYear` to be a primitive type in the JSON string but got `%s`", jsonObj.get("expiryYear").toString()));
      }
      if ((jsonObj.get("paymentAccountReference") != null && !jsonObj.get("paymentAccountReference").isJsonNull()) && !jsonObj.get("paymentAccountReference").isJsonPrimitive()) {
        throw new IllegalArgumentException(String.format("Expected the field `paymentAccountReference` to be a primitive type in the JSON string but got `%s`", jsonObj.get("paymentAccountReference").toString()));
      }
  }

  public static class CustomTypeAdapterFactory implements TypeAdapterFactory {
    @SuppressWarnings("unchecked")
    @Override
    public <T> TypeAdapter<T> create(Gson gson, TypeToken<T> type) {
       if (!TokenDetailDataGetTokenOnly.class.isAssignableFrom(type.getRawType())) {
         return null; // this class only serializes 'TokenDetailDataGetTokenOnly' and its subtypes
       }
       final TypeAdapter<JsonElement> elementAdapter = gson.getAdapter(JsonElement.class);
       final TypeAdapter<TokenDetailDataGetTokenOnly> thisAdapter
                        = gson.getDelegateAdapter(this, TypeToken.get(TokenDetailDataGetTokenOnly.class));

       return (TypeAdapter<T>) new TypeAdapter<TokenDetailDataGetTokenOnly>() {
           @Override
           public void write(JsonWriter out, TokenDetailDataGetTokenOnly value) throws IOException {
             JsonObject obj = thisAdapter.toJsonTree(value).getAsJsonObject();
             elementAdapter.write(out, obj);
           }

           @Override
           public TokenDetailDataGetTokenOnly read(JsonReader in) throws IOException {
             JsonElement jsonElement = elementAdapter.read(in);
             validateJsonElement(jsonElement);
             return thisAdapter.fromJsonTree(jsonElement);
           }

       }.nullSafe();
    }
  }

 /**
  * Create an instance of TokenDetailDataGetTokenOnly given an JSON string
  *
  * @param jsonString JSON string
  * @return An instance of TokenDetailDataGetTokenOnly
  * @throws IOException if the JSON string is invalid with respect to TokenDetailDataGetTokenOnly
  */
  public static TokenDetailDataGetTokenOnly fromJson(String jsonString) throws IOException {
    return JSON.getGson().fromJson(jsonString, TokenDetailDataGetTokenOnly.class);
  }

 /**
  * Convert an instance of TokenDetailDataGetTokenOnly to an JSON string
  *
  * @return JSON string
  */
  public String toJson() {
    return JSON.getGson().toJson(this);
  }
}

