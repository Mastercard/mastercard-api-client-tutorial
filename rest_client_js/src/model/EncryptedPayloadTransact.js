/**
 * MDES for Merchants
 * The MDES APIs are designed as RPC style stateless web services where each API endpoint represents an operation to be performed.  All request and response payloads are sent in the JSON (JavaScript Object Notation) data-interchange format. Each endpoint in the API specifies the HTTP Method used to access it. All strings in request and response objects are to be UTF-8 encoded.  Each API URI includes the major and minor version of API that it conforms to.  This will allow multiple concurrent versions of the API to be deployed simultaneously.  
 *
 * The version of the OpenAPI document: 1.2.7
 * 
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 *
 */

import ApiClient from '../ApiClient';
import TransactEncryptedData from './TransactEncryptedData';

/**
 * The EncryptedPayloadTransact model module.
 * @module model/EncryptedPayloadTransact
 * @version 1.2.7
 */
class EncryptedPayloadTransact {
    /**
     * Constructs a new <code>EncryptedPayloadTransact</code>.
     * @alias module:model/EncryptedPayloadTransact
     */
    constructor() { 
        
        EncryptedPayloadTransact.initialize(this);
    }

    /**
     * Initializes the fields of this object.
     * This method is used by the constructors of any subclasses, in order to implement multiple inheritance (mix-ins).
     * Only for internal use.
     */
    static initialize(obj) { 
    }

    /**
     * Constructs a <code>EncryptedPayloadTransact</code> from a plain JavaScript object, optionally creating a new instance.
     * Copies all relevant properties from <code>data</code> to <code>obj</code> if supplied or a new instance if not.
     * @param {Object} data The plain JavaScript object bearing properties of interest.
     * @param {module:model/EncryptedPayloadTransact} obj Optional instance to populate.
     * @return {module:model/EncryptedPayloadTransact} The populated <code>EncryptedPayloadTransact</code> instance.
     */
    static constructFromObject(data, obj) {
        if (data) {
            obj = obj || new EncryptedPayloadTransact();

            if (data.hasOwnProperty('publicKeyFingerprint')) {
                obj['publicKeyFingerprint'] = ApiClient.convertToType(data['publicKeyFingerprint'], 'String');
            }
            if (data.hasOwnProperty('encryptedKey')) {
                obj['encryptedKey'] = ApiClient.convertToType(data['encryptedKey'], 'String');
            }
            if (data.hasOwnProperty('oaepHashingAlgorithm')) {
                obj['oaepHashingAlgorithm'] = ApiClient.convertToType(data['oaepHashingAlgorithm'], 'String');
            }
            if (data.hasOwnProperty('iv')) {
                obj['iv'] = ApiClient.convertToType(data['iv'], 'String');
            }
            if (data.hasOwnProperty('encryptedData')) {
                obj['encryptedData'] = TransactEncryptedData.constructFromObject(data['encryptedData']);
            }
        }
        return obj;
    }


}

/**
 * The fingerprint of the public key used to encrypt the ephemeral AES key.<br> __Max Length: 64__ 
 * @member {String} publicKeyFingerprint
 */
EncryptedPayloadTransact.prototype['publicKeyFingerprint'] = undefined;

/**
 * One-time use AES key encrypted by the MasterCard public key (as identified by publicKeyFingerprint) using the OAEP or PKCS#1 v1.5 scheme (depending on the value of oaepHashingAlgorithm. <br> __Max Length: 512__ 
 * @member {String} encryptedKey
 */
EncryptedPayloadTransact.prototype['encryptedKey'] = undefined;

/**
 * Hashing algorithm used with the OAEP scheme. Must be either SHA256 or SHA512. 
 * @member {String} oaepHashingAlgorithm
 */
EncryptedPayloadTransact.prototype['oaepHashingAlgorithm'] = undefined;

/**
 * The initialization vector used when encrypting data using the one-time use AES key. Must be exactly 16 bytes (32 character hex string) to match the block size. If not present, an IV of zero is assumed.  <br>__Length: 32__ 
 * @member {String} iv
 */
EncryptedPayloadTransact.prototype['iv'] = undefined;

/**
 * @member {module:model/TransactEncryptedData} encryptedData
 */
EncryptedPayloadTransact.prototype['encryptedData'] = undefined;






export default EncryptedPayloadTransact;

