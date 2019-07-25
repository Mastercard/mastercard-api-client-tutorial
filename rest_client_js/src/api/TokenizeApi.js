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
import ErrorsResponse from '../model/ErrorsResponse';
import TokenizeRequestSchema from '../model/TokenizeRequestSchema';
import TokenizeResponseSchema from '../model/TokenizeResponseSchema';

/**
* Tokenize service.
* @module api/TokenizeApi
* @version 1.2.7
*/
export default class TokenizeApi {

    /**
    * Constructs a new TokenizeApi. 
    * @alias module:api/TokenizeApi
    * @class
    * @param {module:ApiClient} [apiClient] Optional API client implementation to use,
    * default to {@link module:ApiClient#instance} if unspecified.
    */
    constructor(apiClient) {
        this.apiClient = apiClient || ApiClient.instance;
    }


    /**
     * Callback function to receive the result of the createTokenize operation.
     * @callback module:api/TokenizeApi~createTokenizeCallback
     * @param {String} error Error message, if any.
     * @param {module:model/TokenizeResponseSchema} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Used to digitize a card to create a server-based Token.
     * Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 
     * @param {Object} opts Optional parameters
     * @param {module:model/TokenizeRequestSchema} opts.tokenizeRequestSchema A Tokenize request is used to digitize a PAN.  
     * @param {module:api/TokenizeApi~createTokenizeCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/TokenizeResponseSchema}
     */
    createTokenize(opts, callback) {
      opts = opts || {};
      let postBody = opts['tokenizeRequestSchema'];

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
      let returnType = TokenizeResponseSchema;
      return this.apiClient.callApi(
        '/digitization/static/1/0/tokenize', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }


}
