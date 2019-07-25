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
import DeleteRequestSchema from '../model/DeleteRequestSchema';
import DeleteResponseSchema from '../model/DeleteResponseSchema';
import ErrorsResponse from '../model/ErrorsResponse';

/**
* Delete service.
* @module api/DeleteApi
* @version 1.2.7
*/
export default class DeleteApi {

    /**
    * Constructs a new DeleteApi. 
    * @alias module:api/DeleteApi
    * @class
    * @param {module:ApiClient} [apiClient] Optional API client implementation to use,
    * default to {@link module:ApiClient#instance} if unspecified.
    */
    constructor(apiClient) {
        this.apiClient = apiClient || ApiClient.instance;
    }


    /**
     * Callback function to receive the result of the deleteDigitization operation.
     * @callback module:api/DeleteApi~deleteDigitizationCallback
     * @param {String} error Error message, if any.
     * @param {module:model/DeleteResponseSchema} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Used to delete one or more Tokens. The API is limited to 10 Tokens per request.
     * This API is used to delete one or more Tokens.  The API is limited to 10 Tokens per request. MDES will coordinate the deactivation of the Tokens and notify any relevant parties that the Tokens have now been deactivated. 
     * @param {Object} opts Optional parameters
     * @param {module:model/DeleteRequestSchema} opts.deleteRequestSchema Contains the details of the request message. 
     * @param {module:api/DeleteApi~deleteDigitizationCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/DeleteResponseSchema}
     */
    deleteDigitization(opts, callback) {
      opts = opts || {};
      let postBody = opts['deleteRequestSchema'];

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
      let returnType = DeleteResponseSchema;
      return this.apiClient.callApi(
        '/digitization/static/1/0/delete', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }


}
