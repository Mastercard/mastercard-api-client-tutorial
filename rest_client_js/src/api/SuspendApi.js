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


import ApiClient from "../ApiClient";
import SuspendRequestSchema from '../model/SuspendRequestSchema';
import SuspendResponseSchema from '../model/SuspendResponseSchema';

/**
* Suspend service.
* @module api/SuspendApi
* @version 1.2.7
*/
export default class SuspendApi {

    /**
    * Constructs a new SuspendApi. 
    * @alias module:api/SuspendApi
    * @class
    * @param {module:ApiClient} [apiClient] Optional API client implementation to use,
    * default to {@link module:ApiClient#instance} if unspecified.
    */
    constructor(apiClient) {
        this.apiClient = apiClient || ApiClient.instance;
    }


    /**
     * Callback function to receive the result of the createSuspend operation.
     * @callback module:api/SuspendApi~createSuspendCallback
     * @param {String} error Error message, if any.
     * @param {module:model/SuspendResponseSchema} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request.
     * This API is used to temporarily suspend one or more Tokens (for example, suspending all Tokens on a device in response to the device being lost).  The API is limited to 10 Tokens per request. MDES will coordinate the suspension of the Tokens and notify any relevant parties that the Tokens have been suspended. A suspended Token can be unsuspended using the Unsuspend resource. 
     * @param {Object} opts Optional parameters
     * @param {module:model/SuspendRequestSchema} opts.suspendRequestSchema Contains the details of the request message. 
     * @param {module:api/SuspendApi~createSuspendCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/SuspendResponseSchema}
     */
    createSuspend(opts, callback) {
      opts = opts || {};
      let postBody = opts['suspendRequestSchema'];

      let pathParams = {
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = ['application/json'];
      let accepts = ['application/json'];
      let returnType = SuspendResponseSchema;
      return this.apiClient.callApi(
        '/digitization/static/1/0/suspend', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }


}
