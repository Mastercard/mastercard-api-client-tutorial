/*
 * MDES for Merchants
 * The MDES APIs are designed as RPC style stateless web services where each API endpoint represents an operation to be performed.  All request and response payloads are sent in the JSON (JavaScript Object Notation) data-interchange format. Each endpoint in the API specifies the HTTP Method used to access it. All strings in request and response objects are to be UTF-8 encoded.  Each API URI includes the major and minor version of API that it conforms to.  This will allow multiple concurrent versions of the API to be deployed simultaneously.  
 *
 * The version of the OpenAPI document: 1.2.7
 * 
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


package org.openapitools.client.api;

import org.openapitools.client.ApiCallback;
import org.openapitools.client.ApiClient;
import org.openapitools.client.ApiException;
import org.openapitools.client.ApiResponse;
import org.openapitools.client.Configuration;
import org.openapitools.client.Pair;
import org.openapitools.client.ProgressRequestBody;
import org.openapitools.client.ProgressResponseBody;

import com.google.gson.reflect.TypeToken;

import java.io.IOException;


import org.openapitools.client.model.ErrorsResponse;
import org.openapitools.client.model.GetTaskStatusRequestSchema;
import org.openapitools.client.model.GetTaskStatusResponseSchema;

import java.lang.reflect.Type;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class GetTaskStatusApi {
    private ApiClient localVarApiClient;

    public GetTaskStatusApi() {
        this(Configuration.getDefaultApiClient());
    }

    public GetTaskStatusApi(ApiClient apiClient) {
        this.localVarApiClient = apiClient;
    }

    public ApiClient getApiClient() {
        return localVarApiClient;
    }

    public void setApiClient(ApiClient apiClient) {
        this.localVarApiClient = apiClient;
    }

    /**
     * Build call for getTaskStatus
     * @param getTaskStatusRequestSchema Contains the details of the request message.  (optional)
     * @param _callback Callback for upload/download progress
     * @return Call to execute
     * @throws ApiException If fail to serialize the request body object
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> Contains the details of the response message.  </td><td>  -  </td></tr>
        <tr><td> 0 </td><td> unexpected error  </td><td>  -  </td></tr>
     </table>
     */
    public okhttp3.Call getTaskStatusCall(GetTaskStatusRequestSchema getTaskStatusRequestSchema, final ApiCallback _callback) throws ApiException {
        Object localVarPostBody = getTaskStatusRequestSchema;

        // create path and map variables
        String localVarPath = "/digitization/static/1/0/getTaskStatus";

        List<Pair> localVarQueryParams = new ArrayList<Pair>();
        List<Pair> localVarCollectionQueryParams = new ArrayList<Pair>();
        Map<String, String> localVarHeaderParams = new HashMap<String, String>();
        Map<String, Object> localVarFormParams = new HashMap<String, Object>();
        final String[] localVarAccepts = {
            "application/json"
        };
        final String localVarAccept = localVarApiClient.selectHeaderAccept(localVarAccepts);
        if (localVarAccept != null) {
            localVarHeaderParams.put("Accept", localVarAccept);
        }

        final String[] localVarContentTypes = {
            "application/json"
        };
        final String localVarContentType = localVarApiClient.selectHeaderContentType(localVarContentTypes);
        localVarHeaderParams.put("Content-Type", localVarContentType);

        String[] localVarAuthNames = new String[] {  };
        return localVarApiClient.buildCall(localVarPath, "POST", localVarQueryParams, localVarCollectionQueryParams, localVarPostBody, localVarHeaderParams, localVarFormParams, localVarAuthNames, _callback);
    }

    @SuppressWarnings("rawtypes")
    private okhttp3.Call getTaskStatusValidateBeforeCall(GetTaskStatusRequestSchema getTaskStatusRequestSchema, final ApiCallback _callback) throws ApiException {
        

        okhttp3.Call localVarCall = getTaskStatusCall(getTaskStatusRequestSchema, _callback);
        return localVarCall;

    }

    /**
     * Used to check the status of any asynchronous task that was previously requested.
     * Used to check the status of any asynchronous task that was previously requested. 
     * @param getTaskStatusRequestSchema Contains the details of the request message.  (optional)
     * @return GetTaskStatusResponseSchema
     * @throws ApiException If fail to call the API, e.g. server error or cannot deserialize the response body
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> Contains the details of the response message.  </td><td>  -  </td></tr>
        <tr><td> 0 </td><td> unexpected error  </td><td>  -  </td></tr>
     </table>
     */
    public GetTaskStatusResponseSchema getTaskStatus(GetTaskStatusRequestSchema getTaskStatusRequestSchema) throws ApiException {
        ApiResponse<GetTaskStatusResponseSchema> localVarResp = getTaskStatusWithHttpInfo(getTaskStatusRequestSchema);
        return localVarResp.getData();
    }

    /**
     * Used to check the status of any asynchronous task that was previously requested.
     * Used to check the status of any asynchronous task that was previously requested. 
     * @param getTaskStatusRequestSchema Contains the details of the request message.  (optional)
     * @return ApiResponse&lt;GetTaskStatusResponseSchema&gt;
     * @throws ApiException If fail to call the API, e.g. server error or cannot deserialize the response body
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> Contains the details of the response message.  </td><td>  -  </td></tr>
        <tr><td> 0 </td><td> unexpected error  </td><td>  -  </td></tr>
     </table>
     */
    public ApiResponse<GetTaskStatusResponseSchema> getTaskStatusWithHttpInfo(GetTaskStatusRequestSchema getTaskStatusRequestSchema) throws ApiException {
        okhttp3.Call localVarCall = getTaskStatusValidateBeforeCall(getTaskStatusRequestSchema, null);
        Type localVarReturnType = new TypeToken<GetTaskStatusResponseSchema>(){}.getType();
        return localVarApiClient.execute(localVarCall, localVarReturnType);
    }

    /**
     * Used to check the status of any asynchronous task that was previously requested. (asynchronously)
     * Used to check the status of any asynchronous task that was previously requested. 
     * @param getTaskStatusRequestSchema Contains the details of the request message.  (optional)
     * @param _callback The callback to be executed when the API call finishes
     * @return The request call
     * @throws ApiException If fail to process the API call, e.g. serializing the request body object
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> Contains the details of the response message.  </td><td>  -  </td></tr>
        <tr><td> 0 </td><td> unexpected error  </td><td>  -  </td></tr>
     </table>
     */
    public okhttp3.Call getTaskStatusAsync(GetTaskStatusRequestSchema getTaskStatusRequestSchema, final ApiCallback<GetTaskStatusResponseSchema> _callback) throws ApiException {

        okhttp3.Call localVarCall = getTaskStatusValidateBeforeCall(getTaskStatusRequestSchema, _callback);
        Type localVarReturnType = new TypeToken<GetTaskStatusResponseSchema>(){}.getType();
        localVarApiClient.executeAsync(localVarCall, localVarReturnType, _callback);
        return localVarCall;
    }
}