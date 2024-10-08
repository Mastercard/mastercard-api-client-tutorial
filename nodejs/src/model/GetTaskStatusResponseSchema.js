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

/**
 * The GetTaskStatusResponseSchema model module.
 * @module model/GetTaskStatusResponseSchema
 * @version 1.3.0
 */
class GetTaskStatusResponseSchema {
    /**
     * Constructs a new <code>GetTaskStatusResponseSchema</code>.
     * @alias module:model/GetTaskStatusResponseSchema
     */
    constructor() { 
        
        GetTaskStatusResponseSchema.initialize(this);
    }

    /**
     * Initializes the fields of this object.
     * This method is used by the constructors of any subclasses, in order to implement multiple inheritance (mix-ins).
     * Only for internal use.
     */
    static initialize(obj) { 
    }

    /**
     * Constructs a <code>GetTaskStatusResponseSchema</code> from a plain JavaScript object, optionally creating a new instance.
     * Copies all relevant properties from <code>data</code> to <code>obj</code> if supplied or a new instance if not.
     * @param {Object} data The plain JavaScript object bearing properties of interest.
     * @param {module:model/GetTaskStatusResponseSchema} obj Optional instance to populate.
     * @return {module:model/GetTaskStatusResponseSchema} The populated <code>GetTaskStatusResponseSchema</code> instance.
     */
    static constructFromObject(data, obj) {
        if (data) {
            obj = obj || new GetTaskStatusResponseSchema();

            if (data.hasOwnProperty('responseId')) {
                obj['responseId'] = ApiClient.convertToType(data['responseId'], 'String');
            }
            if (data.hasOwnProperty('responseHost')) {
                obj['responseHost'] = ApiClient.convertToType(data['responseHost'], 'String');
            }
            if (data.hasOwnProperty('status')) {
                obj['status'] = ApiClient.convertToType(data['status'], 'String');
            }
        }
        return obj;
    }

    /**
     * Validates the JSON data with respect to <code>GetTaskStatusResponseSchema</code>.
     * @param {Object} data The plain JavaScript object bearing properties of interest.
     * @return {boolean} to indicate whether the JSON data is valid with respect to <code>GetTaskStatusResponseSchema</code>.
     */
    static validateJSON(data) {
        // ensure the json data is a string
        if (data['responseId'] && !(typeof data['responseId'] === 'string' || data['responseId'] instanceof String)) {
            throw new Error("Expected the field `responseId` to be a primitive type in the JSON string but got " + data['responseId']);
        }
        // ensure the json data is a string
        if (data['responseHost'] && !(typeof data['responseHost'] === 'string' || data['responseHost'] instanceof String)) {
            throw new Error("Expected the field `responseHost` to be a primitive type in the JSON string but got " + data['responseHost']);
        }
        // ensure the json data is a string
        if (data['status'] && !(typeof data['status'] === 'string' || data['status'] instanceof String)) {
            throw new Error("Expected the field `status` to be a primitive type in the JSON string but got " + data['status']);
        }

        return true;
    }


}



/**
 * Unique identifier for the response. 
 * @member {String} responseId
 */
GetTaskStatusResponseSchema.prototype['responseId'] = undefined;

/**
 * The host that originated the request. Future calls in the same conversation may be routed to this host. 
 * @member {String} responseHost
 */
GetTaskStatusResponseSchema.prototype['responseHost'] = undefined;

/**
 * The status of the specified task. Must be either 'PENDING' (The Task has been recieved and is pending processing), 'IN_PROGRESS' (The task is currently in progress), 'COMPLETED' (The task was completed successfully) or 'FAILED' The task was processed but failed to complete successfully. 
 * @member {String} status
 */
GetTaskStatusResponseSchema.prototype['status'] = undefined;






export default GetTaskStatusResponseSchema;

