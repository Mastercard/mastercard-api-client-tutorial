/*
 * MDES Digital Enablement API
 *
 * These APIs are designed as RPC style stateless web services where each API endpoint represents an operation to be performed.  All request and response payloads are sent in the JSON (JavaScript Object Notation) data-interchange format. Each endpoint in the API specifies the HTTP Method used to access it. All strings in request and response objects are to be UTF-8 encoded.  Each API URI includes the major and minor version of API that it conforms to.  This will allow multiple concurrent versions of the API to be deployed simultaneously. <br><br> **Authentication** <br><br> Mastercard uses OAuth 1.0a with body hash extension for authenticating the API clients. This requires every request that you send to  Mastercard to be signed with an RSA private key. A private-public RSA key pair must be generated consisting of: <br><br> 1. A private key for the OAuth signature for API requests. It is recommended to keep the private key in a password-protected or hardware keystore. <br> 2. A public key is shared with Mastercard during the project setup process through either a certificate signing request (CSR) or the API Key Generator. Mastercard will use the public key to verify the OAuth signature that is provided on every API call.<br>  An OAUTH1.0a signer library is available on [GitHub](https://github.com/Mastercard/oauth1-signer-java) <br><br> **Encryption** <br><br> All communications between Issuer web service and the Mastercard gateway is encrypted using TLS. <br><br> **Additional Encryption of Sensitive Data** <br><br> In addition to the OAuth authentication, when using MDES Digital Enablement Service, any PCI sensitive and all account holder Personally Identifiable Information (PII) data must be encrypted. This requirement applies to the API fields containing encryptedData. Sensitive data is encrypted using a symmetric session (one-time-use) key. The symmetric session key is then wrapped with an RSA Public Key supplied by Mastercard during API setup phase (the Customer Encryption Key). <br>  Java Client Encryption Library available on [GitHub](https://github.com/Mastercard/client-encryption-java) 
 *
 * The version of the OpenAPI document: 1.3.0
 * Generated by: https://github.com/openapitools/openapi-generator.git
 */


using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Linq;
using System.Net;
using System.Net.Mime;
using Acme.App.MastercardApi.Client.Client;
using Acme.App.MastercardApi.Client.Model;

namespace Acme.App.MastercardApi.Client.Api
{

    /// <summary>
    /// Represents a collection of functions to interact with the API endpoints
    /// </summary>
    public interface INotifyTokenUpdatedApiSync : IApiAccessor
    {
        #region Synchronous Operations
        /// <summary>
        /// Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.
        /// </summary>
        /// <remarks>
        /// This API is used by MDES to notify the Token Requestor of significant Token updates. Typical notification scenarios include  1. Informing the merchant a token is active 2. Informing the merchant a token has been suspended by the Issuer 3. Informing the merchant a token has been unsuspended by the Issuer 4. Informing the merchant a token has been deleted by the Issuer 5. Informing the merchant of a product configuration change (such as a change in Card Art) 6. Informing the merchant of underlying changes to the FPAN metadata associated to the token  **Connection Security**  Mastercard will connect via TLS protocol and verify the server certificate before establishing a connection to the client endpoint. During this handshake, the client server can request TLS client authentication. Mastercard will present a client certificate which identifies as ?ws.mastercard.com? This client certificate is issued by the Entrust L1K certificate and should be available in most trust stores.   **Conditional Objects**  The contents of the notifyTokenUpdated API will vary depending which of the above scneraios triggered the notification.  1. *productConfig* - Provided when Product Configuration has changed (e.g. such as card art). 2. *tokenInfo* - Provided when either the details of the token or associated FPAN have changed (such as token or PAN expiry).   The optional objects will always contain a minimum set of data which be returned regardless of whether or not updates have been made. These fields are denoted as required fields. 
        /// </remarks>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="notifyTokenUpdatedRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <param name="operationIndex">Index associated with the operation.</param>
        /// <returns>NotifyTokenUpdatedResponseSchema</returns>
        NotifyTokenUpdatedResponseSchema NotifyTokenUpdateForTokenStateChange(NotifyTokenUpdatedRequestSchema notifyTokenUpdatedRequestSchema = default(NotifyTokenUpdatedRequestSchema), int operationIndex = 0);

        /// <summary>
        /// Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.
        /// </summary>
        /// <remarks>
        /// This API is used by MDES to notify the Token Requestor of significant Token updates. Typical notification scenarios include  1. Informing the merchant a token is active 2. Informing the merchant a token has been suspended by the Issuer 3. Informing the merchant a token has been unsuspended by the Issuer 4. Informing the merchant a token has been deleted by the Issuer 5. Informing the merchant of a product configuration change (such as a change in Card Art) 6. Informing the merchant of underlying changes to the FPAN metadata associated to the token  **Connection Security**  Mastercard will connect via TLS protocol and verify the server certificate before establishing a connection to the client endpoint. During this handshake, the client server can request TLS client authentication. Mastercard will present a client certificate which identifies as ?ws.mastercard.com? This client certificate is issued by the Entrust L1K certificate and should be available in most trust stores.   **Conditional Objects**  The contents of the notifyTokenUpdated API will vary depending which of the above scneraios triggered the notification.  1. *productConfig* - Provided when Product Configuration has changed (e.g. such as card art). 2. *tokenInfo* - Provided when either the details of the token or associated FPAN have changed (such as token or PAN expiry).   The optional objects will always contain a minimum set of data which be returned regardless of whether or not updates have been made. These fields are denoted as required fields. 
        /// </remarks>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="notifyTokenUpdatedRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <param name="operationIndex">Index associated with the operation.</param>
        /// <returns>ApiResponse of NotifyTokenUpdatedResponseSchema</returns>
        ApiResponse<NotifyTokenUpdatedResponseSchema> NotifyTokenUpdateForTokenStateChangeWithHttpInfo(NotifyTokenUpdatedRequestSchema notifyTokenUpdatedRequestSchema = default(NotifyTokenUpdatedRequestSchema), int operationIndex = 0);
        #endregion Synchronous Operations
    }

    /// <summary>
    /// Represents a collection of functions to interact with the API endpoints
    /// </summary>
    public interface INotifyTokenUpdatedApiAsync : IApiAccessor
    {
        #region Asynchronous Operations
        /// <summary>
        /// Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.
        /// </summary>
        /// <remarks>
        /// This API is used by MDES to notify the Token Requestor of significant Token updates. Typical notification scenarios include  1. Informing the merchant a token is active 2. Informing the merchant a token has been suspended by the Issuer 3. Informing the merchant a token has been unsuspended by the Issuer 4. Informing the merchant a token has been deleted by the Issuer 5. Informing the merchant of a product configuration change (such as a change in Card Art) 6. Informing the merchant of underlying changes to the FPAN metadata associated to the token  **Connection Security**  Mastercard will connect via TLS protocol and verify the server certificate before establishing a connection to the client endpoint. During this handshake, the client server can request TLS client authentication. Mastercard will present a client certificate which identifies as ?ws.mastercard.com? This client certificate is issued by the Entrust L1K certificate and should be available in most trust stores.   **Conditional Objects**  The contents of the notifyTokenUpdated API will vary depending which of the above scneraios triggered the notification.  1. *productConfig* - Provided when Product Configuration has changed (e.g. such as card art). 2. *tokenInfo* - Provided when either the details of the token or associated FPAN have changed (such as token or PAN expiry).   The optional objects will always contain a minimum set of data which be returned regardless of whether or not updates have been made. These fields are denoted as required fields. 
        /// </remarks>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="notifyTokenUpdatedRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <param name="operationIndex">Index associated with the operation.</param>
        /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
        /// <returns>Task of NotifyTokenUpdatedResponseSchema</returns>
        System.Threading.Tasks.Task<NotifyTokenUpdatedResponseSchema> NotifyTokenUpdateForTokenStateChangeAsync(NotifyTokenUpdatedRequestSchema notifyTokenUpdatedRequestSchema = default(NotifyTokenUpdatedRequestSchema), int operationIndex = 0, System.Threading.CancellationToken cancellationToken = default(System.Threading.CancellationToken));

        /// <summary>
        /// Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.
        /// </summary>
        /// <remarks>
        /// This API is used by MDES to notify the Token Requestor of significant Token updates. Typical notification scenarios include  1. Informing the merchant a token is active 2. Informing the merchant a token has been suspended by the Issuer 3. Informing the merchant a token has been unsuspended by the Issuer 4. Informing the merchant a token has been deleted by the Issuer 5. Informing the merchant of a product configuration change (such as a change in Card Art) 6. Informing the merchant of underlying changes to the FPAN metadata associated to the token  **Connection Security**  Mastercard will connect via TLS protocol and verify the server certificate before establishing a connection to the client endpoint. During this handshake, the client server can request TLS client authentication. Mastercard will present a client certificate which identifies as ?ws.mastercard.com? This client certificate is issued by the Entrust L1K certificate and should be available in most trust stores.   **Conditional Objects**  The contents of the notifyTokenUpdated API will vary depending which of the above scneraios triggered the notification.  1. *productConfig* - Provided when Product Configuration has changed (e.g. such as card art). 2. *tokenInfo* - Provided when either the details of the token or associated FPAN have changed (such as token or PAN expiry).   The optional objects will always contain a minimum set of data which be returned regardless of whether or not updates have been made. These fields are denoted as required fields. 
        /// </remarks>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="notifyTokenUpdatedRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <param name="operationIndex">Index associated with the operation.</param>
        /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
        /// <returns>Task of ApiResponse (NotifyTokenUpdatedResponseSchema)</returns>
        System.Threading.Tasks.Task<ApiResponse<NotifyTokenUpdatedResponseSchema>> NotifyTokenUpdateForTokenStateChangeWithHttpInfoAsync(NotifyTokenUpdatedRequestSchema notifyTokenUpdatedRequestSchema = default(NotifyTokenUpdatedRequestSchema), int operationIndex = 0, System.Threading.CancellationToken cancellationToken = default(System.Threading.CancellationToken));
        #endregion Asynchronous Operations
    }

    /// <summary>
    /// Represents a collection of functions to interact with the API endpoints
    /// </summary>
    public interface INotifyTokenUpdatedApi : INotifyTokenUpdatedApiSync, INotifyTokenUpdatedApiAsync
    {

    }

    /// <summary>
    /// Represents a collection of functions to interact with the API endpoints
    /// </summary>
    public partial class NotifyTokenUpdatedApi : INotifyTokenUpdatedApi
    {
        private Acme.App.MastercardApi.Client.Client.ExceptionFactory _exceptionFactory = (name, response) => null;

        /// <summary>
        /// Initializes a new instance of the <see cref="NotifyTokenUpdatedApi"/> class.
        /// </summary>
        /// <returns></returns>
        public NotifyTokenUpdatedApi() : this((string)null)
        {
        }

        /// <summary>
        /// Initializes a new instance of the <see cref="NotifyTokenUpdatedApi"/> class.
        /// </summary>
        /// <returns></returns>
        public NotifyTokenUpdatedApi(string basePath)
        {
            this.Configuration = Acme.App.MastercardApi.Client.Client.Configuration.MergeConfigurations(
                Acme.App.MastercardApi.Client.Client.GlobalConfiguration.Instance,
                new Acme.App.MastercardApi.Client.Client.Configuration { BasePath = basePath }
            );
            this.Client = new Acme.App.MastercardApi.Client.Client.ApiClient(this.Configuration.BasePath);
            this.AsynchronousClient = new Acme.App.MastercardApi.Client.Client.ApiClient(this.Configuration.BasePath);
            this.ExceptionFactory = Acme.App.MastercardApi.Client.Client.Configuration.DefaultExceptionFactory;
        }

        /// <summary>
        /// Initializes a new instance of the <see cref="NotifyTokenUpdatedApi"/> class
        /// using Configuration object
        /// </summary>
        /// <param name="configuration">An instance of Configuration</param>
        /// <returns></returns>
        public NotifyTokenUpdatedApi(Acme.App.MastercardApi.Client.Client.Configuration configuration)
        {
            if (configuration == null) throw new ArgumentNullException("configuration");

            this.Configuration = Acme.App.MastercardApi.Client.Client.Configuration.MergeConfigurations(
                Acme.App.MastercardApi.Client.Client.GlobalConfiguration.Instance,
                configuration
            );
            this.Client = new Acme.App.MastercardApi.Client.Client.ApiClient(this.Configuration.BasePath);
            this.AsynchronousClient = new Acme.App.MastercardApi.Client.Client.ApiClient(this.Configuration.BasePath);
            ExceptionFactory = Acme.App.MastercardApi.Client.Client.Configuration.DefaultExceptionFactory;
        }

        /// <summary>
        /// Initializes a new instance of the <see cref="NotifyTokenUpdatedApi"/> class
        /// using a Configuration object and client instance.
        /// </summary>
        /// <param name="client">The client interface for synchronous API access.</param>
        /// <param name="asyncClient">The client interface for asynchronous API access.</param>
        /// <param name="configuration">The configuration object.</param>
        public NotifyTokenUpdatedApi(Acme.App.MastercardApi.Client.Client.ISynchronousClient client, Acme.App.MastercardApi.Client.Client.IAsynchronousClient asyncClient, Acme.App.MastercardApi.Client.Client.IReadableConfiguration configuration)
        {
            if (client == null) throw new ArgumentNullException("client");
            if (asyncClient == null) throw new ArgumentNullException("asyncClient");
            if (configuration == null) throw new ArgumentNullException("configuration");

            this.Client = client;
            this.AsynchronousClient = asyncClient;
            this.Configuration = configuration;
            this.ExceptionFactory = Acme.App.MastercardApi.Client.Client.Configuration.DefaultExceptionFactory;
        }

        /// <summary>
        /// The client for accessing this underlying API asynchronously.
        /// </summary>
        public Acme.App.MastercardApi.Client.Client.IAsynchronousClient AsynchronousClient { get; set; }

        /// <summary>
        /// The client for accessing this underlying API synchronously.
        /// </summary>
        public Acme.App.MastercardApi.Client.Client.ISynchronousClient Client { get; set; }

        /// <summary>
        /// Gets the base path of the API client.
        /// </summary>
        /// <value>The base path</value>
        public string GetBasePath()
        {
            return this.Configuration.BasePath;
        }

        /// <summary>
        /// Gets or sets the configuration object
        /// </summary>
        /// <value>An instance of the Configuration</value>
        public Acme.App.MastercardApi.Client.Client.IReadableConfiguration Configuration { get; set; }

        /// <summary>
        /// Provides a factory method hook for the creation of exceptions.
        /// </summary>
        public Acme.App.MastercardApi.Client.Client.ExceptionFactory ExceptionFactory
        {
            get
            {
                if (_exceptionFactory != null && _exceptionFactory.GetInvocationList().Length > 1)
                {
                    throw new InvalidOperationException("Multicast delegate for ExceptionFactory is unsupported.");
                }
                return _exceptionFactory;
            }
            set { _exceptionFactory = value; }
        }

        /// <summary>
        /// Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed. This API is used by MDES to notify the Token Requestor of significant Token updates. Typical notification scenarios include  1. Informing the merchant a token is active 2. Informing the merchant a token has been suspended by the Issuer 3. Informing the merchant a token has been unsuspended by the Issuer 4. Informing the merchant a token has been deleted by the Issuer 5. Informing the merchant of a product configuration change (such as a change in Card Art) 6. Informing the merchant of underlying changes to the FPAN metadata associated to the token  **Connection Security**  Mastercard will connect via TLS protocol and verify the server certificate before establishing a connection to the client endpoint. During this handshake, the client server can request TLS client authentication. Mastercard will present a client certificate which identifies as ?ws.mastercard.com? This client certificate is issued by the Entrust L1K certificate and should be available in most trust stores.   **Conditional Objects**  The contents of the notifyTokenUpdated API will vary depending which of the above scneraios triggered the notification.  1. *productConfig* - Provided when Product Configuration has changed (e.g. such as card art). 2. *tokenInfo* - Provided when either the details of the token or associated FPAN have changed (such as token or PAN expiry).   The optional objects will always contain a minimum set of data which be returned regardless of whether or not updates have been made. These fields are denoted as required fields. 
        /// </summary>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="notifyTokenUpdatedRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <param name="operationIndex">Index associated with the operation.</param>
        /// <returns>NotifyTokenUpdatedResponseSchema</returns>
        public NotifyTokenUpdatedResponseSchema NotifyTokenUpdateForTokenStateChange(NotifyTokenUpdatedRequestSchema notifyTokenUpdatedRequestSchema = default(NotifyTokenUpdatedRequestSchema), int operationIndex = 0)
        {
            Acme.App.MastercardApi.Client.Client.ApiResponse<NotifyTokenUpdatedResponseSchema> localVarResponse = NotifyTokenUpdateForTokenStateChangeWithHttpInfo(notifyTokenUpdatedRequestSchema);
            return localVarResponse.Data;
        }

        /// <summary>
        /// Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed. This API is used by MDES to notify the Token Requestor of significant Token updates. Typical notification scenarios include  1. Informing the merchant a token is active 2. Informing the merchant a token has been suspended by the Issuer 3. Informing the merchant a token has been unsuspended by the Issuer 4. Informing the merchant a token has been deleted by the Issuer 5. Informing the merchant of a product configuration change (such as a change in Card Art) 6. Informing the merchant of underlying changes to the FPAN metadata associated to the token  **Connection Security**  Mastercard will connect via TLS protocol and verify the server certificate before establishing a connection to the client endpoint. During this handshake, the client server can request TLS client authentication. Mastercard will present a client certificate which identifies as ?ws.mastercard.com? This client certificate is issued by the Entrust L1K certificate and should be available in most trust stores.   **Conditional Objects**  The contents of the notifyTokenUpdated API will vary depending which of the above scneraios triggered the notification.  1. *productConfig* - Provided when Product Configuration has changed (e.g. such as card art). 2. *tokenInfo* - Provided when either the details of the token or associated FPAN have changed (such as token or PAN expiry).   The optional objects will always contain a minimum set of data which be returned regardless of whether or not updates have been made. These fields are denoted as required fields. 
        /// </summary>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="notifyTokenUpdatedRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <param name="operationIndex">Index associated with the operation.</param>
        /// <returns>ApiResponse of NotifyTokenUpdatedResponseSchema</returns>
        public Acme.App.MastercardApi.Client.Client.ApiResponse<NotifyTokenUpdatedResponseSchema> NotifyTokenUpdateForTokenStateChangeWithHttpInfo(NotifyTokenUpdatedRequestSchema notifyTokenUpdatedRequestSchema = default(NotifyTokenUpdatedRequestSchema), int operationIndex = 0)
        {
            Acme.App.MastercardApi.Client.Client.RequestOptions localVarRequestOptions = new Acme.App.MastercardApi.Client.Client.RequestOptions();

            string[] _contentTypes = new string[] {
                "application/json"
            };

            // to determine the Accept header
            string[] _accepts = new string[] {
                "application/json"
            };

            var localVarContentType = Acme.App.MastercardApi.Client.Client.ClientUtils.SelectHeaderContentType(_contentTypes);
            if (localVarContentType != null)
            {
                localVarRequestOptions.HeaderParameters.Add("Content-Type", localVarContentType);
            }

            var localVarAccept = Acme.App.MastercardApi.Client.Client.ClientUtils.SelectHeaderAccept(_accepts);
            if (localVarAccept != null)
            {
                localVarRequestOptions.HeaderParameters.Add("Accept", localVarAccept);
            }

            localVarRequestOptions.Data = notifyTokenUpdatedRequestSchema;

            localVarRequestOptions.Operation = "NotifyTokenUpdatedApi.NotifyTokenUpdateForTokenStateChange";
            localVarRequestOptions.OperationIndex = operationIndex;


            // make the HTTP request
            var localVarResponse = this.Client.Post<NotifyTokenUpdatedResponseSchema>("/digitization/static/1/0/notifyTokenUpdated", localVarRequestOptions, this.Configuration);
            if (this.ExceptionFactory != null)
            {
                Exception _exception = this.ExceptionFactory("NotifyTokenUpdateForTokenStateChange", localVarResponse);
                if (_exception != null)
                {
                    throw _exception;
                }
            }

            return localVarResponse;
        }

        /// <summary>
        /// Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed. This API is used by MDES to notify the Token Requestor of significant Token updates. Typical notification scenarios include  1. Informing the merchant a token is active 2. Informing the merchant a token has been suspended by the Issuer 3. Informing the merchant a token has been unsuspended by the Issuer 4. Informing the merchant a token has been deleted by the Issuer 5. Informing the merchant of a product configuration change (such as a change in Card Art) 6. Informing the merchant of underlying changes to the FPAN metadata associated to the token  **Connection Security**  Mastercard will connect via TLS protocol and verify the server certificate before establishing a connection to the client endpoint. During this handshake, the client server can request TLS client authentication. Mastercard will present a client certificate which identifies as ?ws.mastercard.com? This client certificate is issued by the Entrust L1K certificate and should be available in most trust stores.   **Conditional Objects**  The contents of the notifyTokenUpdated API will vary depending which of the above scneraios triggered the notification.  1. *productConfig* - Provided when Product Configuration has changed (e.g. such as card art). 2. *tokenInfo* - Provided when either the details of the token or associated FPAN have changed (such as token or PAN expiry).   The optional objects will always contain a minimum set of data which be returned regardless of whether or not updates have been made. These fields are denoted as required fields. 
        /// </summary>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="notifyTokenUpdatedRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <param name="operationIndex">Index associated with the operation.</param>
        /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
        /// <returns>Task of NotifyTokenUpdatedResponseSchema</returns>
        public async System.Threading.Tasks.Task<NotifyTokenUpdatedResponseSchema> NotifyTokenUpdateForTokenStateChangeAsync(NotifyTokenUpdatedRequestSchema notifyTokenUpdatedRequestSchema = default(NotifyTokenUpdatedRequestSchema), int operationIndex = 0, System.Threading.CancellationToken cancellationToken = default(System.Threading.CancellationToken))
        {
            Acme.App.MastercardApi.Client.Client.ApiResponse<NotifyTokenUpdatedResponseSchema> localVarResponse = await NotifyTokenUpdateForTokenStateChangeWithHttpInfoAsync(notifyTokenUpdatedRequestSchema, operationIndex, cancellationToken).ConfigureAwait(false);
            return localVarResponse.Data;
        }

        /// <summary>
        /// Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed. This API is used by MDES to notify the Token Requestor of significant Token updates. Typical notification scenarios include  1. Informing the merchant a token is active 2. Informing the merchant a token has been suspended by the Issuer 3. Informing the merchant a token has been unsuspended by the Issuer 4. Informing the merchant a token has been deleted by the Issuer 5. Informing the merchant of a product configuration change (such as a change in Card Art) 6. Informing the merchant of underlying changes to the FPAN metadata associated to the token  **Connection Security**  Mastercard will connect via TLS protocol and verify the server certificate before establishing a connection to the client endpoint. During this handshake, the client server can request TLS client authentication. Mastercard will present a client certificate which identifies as ?ws.mastercard.com? This client certificate is issued by the Entrust L1K certificate and should be available in most trust stores.   **Conditional Objects**  The contents of the notifyTokenUpdated API will vary depending which of the above scneraios triggered the notification.  1. *productConfig* - Provided when Product Configuration has changed (e.g. such as card art). 2. *tokenInfo* - Provided when either the details of the token or associated FPAN have changed (such as token or PAN expiry).   The optional objects will always contain a minimum set of data which be returned regardless of whether or not updates have been made. These fields are denoted as required fields. 
        /// </summary>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="notifyTokenUpdatedRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <param name="operationIndex">Index associated with the operation.</param>
        /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
        /// <returns>Task of ApiResponse (NotifyTokenUpdatedResponseSchema)</returns>
        public async System.Threading.Tasks.Task<Acme.App.MastercardApi.Client.Client.ApiResponse<NotifyTokenUpdatedResponseSchema>> NotifyTokenUpdateForTokenStateChangeWithHttpInfoAsync(NotifyTokenUpdatedRequestSchema notifyTokenUpdatedRequestSchema = default(NotifyTokenUpdatedRequestSchema), int operationIndex = 0, System.Threading.CancellationToken cancellationToken = default(System.Threading.CancellationToken))
        {

            Acme.App.MastercardApi.Client.Client.RequestOptions localVarRequestOptions = new Acme.App.MastercardApi.Client.Client.RequestOptions();

            string[] _contentTypes = new string[] {
                "application/json"
            };

            // to determine the Accept header
            string[] _accepts = new string[] {
                "application/json"
            };

            var localVarContentType = Acme.App.MastercardApi.Client.Client.ClientUtils.SelectHeaderContentType(_contentTypes);
            if (localVarContentType != null)
            {
                localVarRequestOptions.HeaderParameters.Add("Content-Type", localVarContentType);
            }

            var localVarAccept = Acme.App.MastercardApi.Client.Client.ClientUtils.SelectHeaderAccept(_accepts);
            if (localVarAccept != null)
            {
                localVarRequestOptions.HeaderParameters.Add("Accept", localVarAccept);
            }

            localVarRequestOptions.Data = notifyTokenUpdatedRequestSchema;

            localVarRequestOptions.Operation = "NotifyTokenUpdatedApi.NotifyTokenUpdateForTokenStateChange";
            localVarRequestOptions.OperationIndex = operationIndex;


            // make the HTTP request
            var localVarResponse = await this.AsynchronousClient.PostAsync<NotifyTokenUpdatedResponseSchema>("/digitization/static/1/0/notifyTokenUpdated", localVarRequestOptions, this.Configuration, cancellationToken).ConfigureAwait(false);

            if (this.ExceptionFactory != null)
            {
                Exception _exception = this.ExceptionFactory("NotifyTokenUpdateForTokenStateChange", localVarResponse);
                if (_exception != null)
                {
                    throw _exception;
                }
            }

            return localVarResponse;
        }

    }
}
