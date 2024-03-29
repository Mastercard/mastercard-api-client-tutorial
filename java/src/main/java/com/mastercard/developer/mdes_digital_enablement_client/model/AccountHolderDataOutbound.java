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
import com.mastercard.developer.mdes_digital_enablement_client.model.BillingAddress;
import com.mastercard.developer.mdes_digital_enablement_client.model.PhoneNumber;
import io.swagger.annotations.ApiModel;
import io.swagger.annotations.ApiModelProperty;
import java.io.IOException;

/**
 * **(CONDITIONAL)** Present in tokenize response if supported by the Merchant, if using a pushAccountReceipt and if there is account holder data associated with the pushAccountReceipt in case that the issuer decision is APPROVED. Refer to MDES Token Connect Token Requestor Implementation Guide and Specification  for more details. 
 */
@ApiModel(description = "**(CONDITIONAL)** Present in tokenize response if supported by the Merchant, if using a pushAccountReceipt and if there is account holder data associated with the pushAccountReceipt in case that the issuer decision is APPROVED. Refer to MDES Token Connect Token Requestor Implementation Guide and Specification  for more details. ")
@javax.annotation.Generated(value = "org.openapitools.codegen.languages.JavaClientCodegen", date = "2021-08-03T18:13:45.340+01:00[Europe/London]")
public class AccountHolderDataOutbound {
  public static final String SERIALIZED_NAME_ACCOUNT_HOLDER_NAME = "accountHolderName";
  @SerializedName(SERIALIZED_NAME_ACCOUNT_HOLDER_NAME)
  private String accountHolderName;

  public static final String SERIALIZED_NAME_ACCOUNT_HOLDER_ADDRESS = "accountHolderAddress";
  @SerializedName(SERIALIZED_NAME_ACCOUNT_HOLDER_ADDRESS)
  private BillingAddress accountHolderAddress;

  public static final String SERIALIZED_NAME_ACCOUNT_HOLDER_EMAIL_ADDRESS = "accountHolderEmailAddress";
  @SerializedName(SERIALIZED_NAME_ACCOUNT_HOLDER_EMAIL_ADDRESS)
  private String accountHolderEmailAddress;

  public static final String SERIALIZED_NAME_ACCOUNT_HOLDER_MOBILE_PHONE_NUMBER = "accountHolderMobilePhoneNumber";
  @SerializedName(SERIALIZED_NAME_ACCOUNT_HOLDER_MOBILE_PHONE_NUMBER)
  private PhoneNumber accountHolderMobilePhoneNumber;


  public AccountHolderDataOutbound accountHolderName(String accountHolderName) {
    
    this.accountHolderName = accountHolderName;
    return this;
  }

   /**
   * **(OPTIONAL)** The name of the cardholder 
   * @return accountHolderName
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(value = "**(OPTIONAL)** The name of the cardholder ")

  public String getAccountHolderName() {
    return accountHolderName;
  }


  public void setAccountHolderName(String accountHolderName) {
    this.accountHolderName = accountHolderName;
  }


  public AccountHolderDataOutbound accountHolderAddress(BillingAddress accountHolderAddress) {
    
    this.accountHolderAddress = accountHolderAddress;
    return this;
  }

   /**
   * Get accountHolderAddress
   * @return accountHolderAddress
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(value = "")

  public BillingAddress getAccountHolderAddress() {
    return accountHolderAddress;
  }


  public void setAccountHolderAddress(BillingAddress accountHolderAddress) {
    this.accountHolderAddress = accountHolderAddress;
  }


  public AccountHolderDataOutbound accountHolderEmailAddress(String accountHolderEmailAddress) {
    
    this.accountHolderEmailAddress = accountHolderEmailAddress;
    return this;
  }

   /**
   * **(OPTIONAL)** The e-mail address of the Account Holder 
   * @return accountHolderEmailAddress
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(value = "**(OPTIONAL)** The e-mail address of the Account Holder ")

  public String getAccountHolderEmailAddress() {
    return accountHolderEmailAddress;
  }


  public void setAccountHolderEmailAddress(String accountHolderEmailAddress) {
    this.accountHolderEmailAddress = accountHolderEmailAddress;
  }


  public AccountHolderDataOutbound accountHolderMobilePhoneNumber(PhoneNumber accountHolderMobilePhoneNumber) {
    
    this.accountHolderMobilePhoneNumber = accountHolderMobilePhoneNumber;
    return this;
  }

   /**
   * Get accountHolderMobilePhoneNumber
   * @return accountHolderMobilePhoneNumber
  **/
  @javax.annotation.Nullable
  @ApiModelProperty(value = "")

  public PhoneNumber getAccountHolderMobilePhoneNumber() {
    return accountHolderMobilePhoneNumber;
  }


  public void setAccountHolderMobilePhoneNumber(PhoneNumber accountHolderMobilePhoneNumber) {
    this.accountHolderMobilePhoneNumber = accountHolderMobilePhoneNumber;
  }


  @Override
  public boolean equals(Object o) {
    if (this == o) {
      return true;
    }
    if (o == null || getClass() != o.getClass()) {
      return false;
    }
    AccountHolderDataOutbound accountHolderDataOutbound = (AccountHolderDataOutbound) o;
    return Objects.equals(this.accountHolderName, accountHolderDataOutbound.accountHolderName) &&
        Objects.equals(this.accountHolderAddress, accountHolderDataOutbound.accountHolderAddress) &&
        Objects.equals(this.accountHolderEmailAddress, accountHolderDataOutbound.accountHolderEmailAddress) &&
        Objects.equals(this.accountHolderMobilePhoneNumber, accountHolderDataOutbound.accountHolderMobilePhoneNumber);
  }

  @Override
  public int hashCode() {
    return Objects.hash(accountHolderName, accountHolderAddress, accountHolderEmailAddress, accountHolderMobilePhoneNumber);
  }

  @Override
  public String toString() {
    StringBuilder sb = new StringBuilder();
    sb.append("class AccountHolderDataOutbound {\n");
    sb.append("    accountHolderName: ").append(toIndentedString(accountHolderName)).append("\n");
    sb.append("    accountHolderAddress: ").append(toIndentedString(accountHolderAddress)).append("\n");
    sb.append("    accountHolderEmailAddress: ").append(toIndentedString(accountHolderEmailAddress)).append("\n");
    sb.append("    accountHolderMobilePhoneNumber: ").append(toIndentedString(accountHolderMobilePhoneNumber)).append("\n");
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

