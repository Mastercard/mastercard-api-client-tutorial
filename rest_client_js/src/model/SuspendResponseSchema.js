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
import Error from './Error';
import TokenForLCM from './TokenForLCM';

/**
 * The SuspendResponseSchema model module.
 * @module model/SuspendResponseSchema
 * @version 1.2.7
 */
class SuspendResponseSchema {
    /**
     * Constructs a new <code>SuspendResponseSchema</code>.
     * @alias module:model/SuspendResponseSchema
     */
    constructor() { 
        
        SuspendResponseSchema.initialize(this);
    }

    /**
     * Initializes the fields of this object.
     * This method is used by the constructors of any subclasses, in order to implement multiple inheritance (mix-ins).
     * Only for internal use.
     */
    static initialize(obj) { 
    }

    /**
     * Constructs a <code>SuspendResponseSchema</code> from a plain JavaScript object, optionally creating a new instance.
     * Copies all relevant properties from <code>data</code> to <code>obj</code> if supplied or a new instance if not.
     * @param {Object} data The plain JavaScript object bearing properties of interest.
     * @param {module:model/SuspendResponseSchema} obj Optional instance to populate.
     * @return {module:model/SuspendResponseSchema} The populated <code>SuspendResponseSchema</code> instance.
     */
    static constructFromObject(data, obj) {
        if (data) {
            obj = obj || new SuspendResponseSchema();

            if (data.hasOwnProperty('responseHost')) {
                obj['responseHost'] = ApiClient.convertToType(data['responseHost'], 'String');
            }
            if (data.hasOwnProperty('responseId')) {
                obj['responseId'] = ApiClient.convertToType(data['responseId'], 'String');
            }
            if (data.hasOwnProperty('tokens')) {
                obj['tokens'] = ApiClient.convertToType(data['tokens'], [TokenForLCM]);
            }
            if (data.hasOwnProperty('errorCode')) {
                obj['errorCode'] = ApiClient.convertToType(data['errorCode'], 'String');
            }
            if (data.hasOwnProperty('errorDescription')) {
                obj['errorDescription'] = ApiClient.convertToType(data['errorDescription'], 'String');
            }
            if (data.hasOwnProperty('errors')) {
                obj['errors'] = Error.constructFromObject(data['errors']);
            }
        }
        return obj;
    }


}

/**
 * The host that originated the request. Future calls in the same conversation may be routed to this host. 
 * @member {String} responseHost
 */
SuspendResponseSchema.prototype['responseHost'] = undefined;

/**
 * Unique identifier for the response. 
 * @member {String} responseId
 */
SuspendResponseSchema.prototype['responseId'] = undefined;

/**
 * @member {Array.<module:model/TokenForLCM>} tokens
 */
SuspendResponseSchema.prototype['tokens'] = undefined;

/**
 * __CONDITIONAL__<br> Returned in the event of and error and contains the reason the operation failed. Only use if errors object is not present.<br> __Max Length: 32__ 
 * @member {String} errorCode
 */
SuspendResponseSchema.prototype['errorCode'] = undefined;

/**
 * __CONDITIONAL__<br> Returned in the event of and error and contains a description of why the operation failed. Only use if errors object is not present.<br> __Max Length: 32__   
 * @member {String} errorDescription
 */
SuspendResponseSchema.prototype['errorDescription'] = undefined;

/**
 * @member {module:model/Error} errors
 */
SuspendResponseSchema.prototype['errors'] = undefined;






export default SuspendResponseSchema;

