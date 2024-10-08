/**
 * MDES Digital Enablement API
 * These APIs are designed as RPC style stateless web services where each API endpoint represents an operation to be performed.  All request and response payloads are sent in the JSON (JavaScript Object Notation) data-interchange format. Each endpoint in the API specifies the HTTP Method used to access it. All strings in request and response objects are to be UTF-8 encoded.  Each API URI includes the major and minor version of API that it conforms to.  This will allow multiple concurrent versions of the API to be deployed simultaneously. <br><br> **Authentication** <br><br> Mastercard uses OAuth 1.0a with body hash extension for authenticating the API clients. This requires every request that you send to  Mastercard to be signed with an RSA private key. A private-public RSA key pair must be generated consisting of: <br><br> 1. A private key for the OAuth signature for API requests. It is recommended to keep the private key in a password-protected or hardware keystore. <br> 2. A public key is shared with Mastercard during the project setup process through either a certificate signing request (CSR) or the API Key Generator. Mastercard will use the public key to verify the OAuth signature that is provided on every API call.<br>  An OAUTH1.0a signer library is available on [GitHub](https://github.com/Mastercard/oauth1-signer-java) <br><br> **Encryption** <br><br> All communications between Issuer web service and the Mastercard gateway is encrypted using TLS. <br><br> **Additional Encryption of Sensitive Data** <br><br> In addition to the OAuth authentication, when using MDES Digital Enablement Service, any PCI sensitive and all account holder Personally Identifiable Information (PII) data must be encrypted. This requirement applies to the API fields containing encryptedData. Sensitive data is encrypted using a symmetric session (one-time-use) key. The symmetric session key is then wrapped with an RSA Public Key supplied by Mastercard during API setup phase (the Customer Encryption Key). <br>  Java Client Encryption Library available on [GitHub](https://github.com/Mastercard/client-encryption-java) 
 *
 * The version of the OpenAPI document: 1.3.0
 * 
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 *
 */

import ApiClient from '../ApiClient';
import BillingAddress from './BillingAddress';
import PhoneNumber from './PhoneNumber';

/**
 * The AccountHolderData model module.
 * @module model/AccountHolderData
 * @version 1.3.0
 */
class AccountHolderData {
    /**
     * Constructs a new <code>AccountHolderData</code>.
     * @alias module:model/AccountHolderData
     */
    constructor() { 
        
        AccountHolderData.initialize(this);
    }

    /**
     * Initializes the fields of this object.
     * This method is used by the constructors of any subclasses, in order to implement multiple inheritance (mix-ins).
     * Only for internal use.
     */
    static initialize(obj) { 
    }

    /**
     * Constructs a <code>AccountHolderData</code> from a plain JavaScript object, optionally creating a new instance.
     * Copies all relevant properties from <code>data</code> to <code>obj</code> if supplied or a new instance if not.
     * @param {Object} data The plain JavaScript object bearing properties of interest.
     * @param {module:model/AccountHolderData} obj Optional instance to populate.
     * @return {module:model/AccountHolderData} The populated <code>AccountHolderData</code> instance.
     */
    static constructFromObject(data, obj) {
        if (data) {
            obj = obj || new AccountHolderData();

            if (data.hasOwnProperty('accountHolderName')) {
                obj['accountHolderName'] = ApiClient.convertToType(data['accountHolderName'], 'String');
            }
            if (data.hasOwnProperty('accountHolderAddress')) {
                obj['accountHolderAddress'] = BillingAddress.constructFromObject(data['accountHolderAddress']);
            }
            if (data.hasOwnProperty('consumerIdentifier')) {
                obj['consumerIdentifier'] = ApiClient.convertToType(data['consumerIdentifier'], 'String');
            }
            if (data.hasOwnProperty('accountHolderEmailAddress')) {
                obj['accountHolderEmailAddress'] = ApiClient.convertToType(data['accountHolderEmailAddress'], 'String');
            }
            if (data.hasOwnProperty('accountHolderMobilePhoneNumber')) {
                obj['accountHolderMobilePhoneNumber'] = PhoneNumber.constructFromObject(data['accountHolderMobilePhoneNumber']);
            }
        }
        return obj;
    }

    /**
     * Validates the JSON data with respect to <code>AccountHolderData</code>.
     * @param {Object} data The plain JavaScript object bearing properties of interest.
     * @return {boolean} to indicate whether the JSON data is valid with respect to <code>AccountHolderData</code>.
     */
    static validateJSON(data) {
        // ensure the json data is a string
        if (data['accountHolderName'] && !(typeof data['accountHolderName'] === 'string' || data['accountHolderName'] instanceof String)) {
            throw new Error("Expected the field `accountHolderName` to be a primitive type in the JSON string but got " + data['accountHolderName']);
        }
        // validate the optional field `accountHolderAddress`
        if (data['accountHolderAddress']) { // data not null
          BillingAddress.validateJSON(data['accountHolderAddress']);
        }
        // ensure the json data is a string
        if (data['consumerIdentifier'] && !(typeof data['consumerIdentifier'] === 'string' || data['consumerIdentifier'] instanceof String)) {
            throw new Error("Expected the field `consumerIdentifier` to be a primitive type in the JSON string but got " + data['consumerIdentifier']);
        }
        // ensure the json data is a string
        if (data['accountHolderEmailAddress'] && !(typeof data['accountHolderEmailAddress'] === 'string' || data['accountHolderEmailAddress'] instanceof String)) {
            throw new Error("Expected the field `accountHolderEmailAddress` to be a primitive type in the JSON string but got " + data['accountHolderEmailAddress']);
        }
        // validate the optional field `accountHolderMobilePhoneNumber`
        if (data['accountHolderMobilePhoneNumber']) { // data not null
          PhoneNumber.validateJSON(data['accountHolderMobilePhoneNumber']);
        }

        return true;
    }


}



/**
 * **(OPTIONAL)** The name of the cardholder in the format LASTNAME/FIRSTNAME or FIRSTNAME LASTNAME 
 * @member {String} accountHolderName
 */
AccountHolderData.prototype['accountHolderName'] = undefined;

/**
 * @member {module:model/BillingAddress} accountHolderAddress
 */
AccountHolderData.prototype['accountHolderAddress'] = undefined;

/**
 * **(OPTIONAL)** Customer Identifier that may be required in some regions. 
 * @member {String} consumerIdentifier
 */
AccountHolderData.prototype['consumerIdentifier'] = undefined;

/**
 * **(OPTIONAL)** The e-mail address of the Account Holder 
 * @member {String} accountHolderEmailAddress
 */
AccountHolderData.prototype['accountHolderEmailAddress'] = undefined;

/**
 * @member {module:model/PhoneNumber} accountHolderMobilePhoneNumber
 */
AccountHolderData.prototype['accountHolderMobilePhoneNumber'] = undefined;






export default AccountHolderData;

