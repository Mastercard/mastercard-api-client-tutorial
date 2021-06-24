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
    public interface ITransactApiSync : IApiAccessor
    {
        #region Synchronous Operations
        /// <summary>
        /// Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.
        /// </summary>
        /// <remarks>
        /// This API is used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction through a payment processor.  The entire response is encrypted. The caller may only transact using the Tokens belonging to them. 
        /// </remarks>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="transactRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <returns>TransactResponseSchema</returns>
        TransactResponseSchema CreateTransact(TransactRequestSchema transactRequestSchema = default(TransactRequestSchema));

        /// <summary>
        /// Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.
        /// </summary>
        /// <remarks>
        /// This API is used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction through a payment processor.  The entire response is encrypted. The caller may only transact using the Tokens belonging to them. 
        /// </remarks>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="transactRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <returns>ApiResponse of TransactResponseSchema</returns>
        ApiResponse<TransactResponseSchema> CreateTransactWithHttpInfo(TransactRequestSchema transactRequestSchema = default(TransactRequestSchema));
        #endregion Synchronous Operations
    }

    /// <summary>
    /// Represents a collection of functions to interact with the API endpoints
    /// </summary>
    public interface ITransactApiAsync : IApiAccessor
    {
        #region Asynchronous Operations
        /// <summary>
        /// Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.
        /// </summary>
        /// <remarks>
        /// This API is used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction through a payment processor.  The entire response is encrypted. The caller may only transact using the Tokens belonging to them. 
        /// </remarks>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="transactRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
        /// <returns>Task of TransactResponseSchema</returns>
        System.Threading.Tasks.Task<TransactResponseSchema> CreateTransactAsync(TransactRequestSchema transactRequestSchema = default(TransactRequestSchema), System.Threading.CancellationToken cancellationToken = default(System.Threading.CancellationToken));

        /// <summary>
        /// Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.
        /// </summary>
        /// <remarks>
        /// This API is used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction through a payment processor.  The entire response is encrypted. The caller may only transact using the Tokens belonging to them. 
        /// </remarks>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="transactRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
        /// <returns>Task of ApiResponse (TransactResponseSchema)</returns>
        System.Threading.Tasks.Task<ApiResponse<TransactResponseSchema>> CreateTransactWithHttpInfoAsync(TransactRequestSchema transactRequestSchema = default(TransactRequestSchema), System.Threading.CancellationToken cancellationToken = default(System.Threading.CancellationToken));
        #endregion Asynchronous Operations
    }

    /// <summary>
    /// Represents a collection of functions to interact with the API endpoints
    /// </summary>
    public interface ITransactApi : ITransactApiSync, ITransactApiAsync
    {

    }

    /// <summary>
    /// Represents a collection of functions to interact with the API endpoints
    /// </summary>
    public partial class TransactApi : ITransactApi
    {
        private Acme.App.MastercardApi.Client.Client.ExceptionFactory _exceptionFactory = (name, response) => null;

        /// <summary>
        /// Initializes a new instance of the <see cref="TransactApi"/> class.
        /// </summary>
        /// <returns></returns>
        public TransactApi() : this((string)null)
        {
        }

        /// <summary>
        /// Initializes a new instance of the <see cref="TransactApi"/> class.
        /// </summary>
        /// <returns></returns>
        public TransactApi(String basePath)
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
        /// Initializes a new instance of the <see cref="TransactApi"/> class
        /// using Configuration object
        /// </summary>
        /// <param name="configuration">An instance of Configuration</param>
        /// <returns></returns>
        public TransactApi(Acme.App.MastercardApi.Client.Client.Configuration configuration)
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
        /// Initializes a new instance of the <see cref="TransactApi"/> class
        /// using a Configuration object and client instance.
        /// </summary>
        /// <param name="client">The client interface for synchronous API access.</param>
        /// <param name="asyncClient">The client interface for asynchronous API access.</param>
        /// <param name="configuration">The configuration object.</param>
        public TransactApi(Acme.App.MastercardApi.Client.Client.ISynchronousClient client, Acme.App.MastercardApi.Client.Client.IAsynchronousClient asyncClient, Acme.App.MastercardApi.Client.Client.IReadableConfiguration configuration)
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
        public String GetBasePath()
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
        /// Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction. This API is used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction through a payment processor.  The entire response is encrypted. The caller may only transact using the Tokens belonging to them. 
        /// </summary>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="transactRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <returns>TransactResponseSchema</returns>
        public TransactResponseSchema CreateTransact(TransactRequestSchema transactRequestSchema = default(TransactRequestSchema))
        {
            Acme.App.MastercardApi.Client.Client.ApiResponse<TransactResponseSchema> localVarResponse = CreateTransactWithHttpInfo(transactRequestSchema);
            return localVarResponse.Data;
        }

        /// <summary>
        /// Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction. This API is used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction through a payment processor.  The entire response is encrypted. The caller may only transact using the Tokens belonging to them. 
        /// </summary>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="transactRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <returns>ApiResponse of TransactResponseSchema</returns>
        public Acme.App.MastercardApi.Client.Client.ApiResponse<TransactResponseSchema> CreateTransactWithHttpInfo(TransactRequestSchema transactRequestSchema = default(TransactRequestSchema))
        {
            Acme.App.MastercardApi.Client.Client.RequestOptions localVarRequestOptions = new Acme.App.MastercardApi.Client.Client.RequestOptions();

            String[] _contentTypes = new String[] {
                "application/json"
            };

            // to determine the Accept header
            String[] _accepts = new String[] {
                "application/json"
            };

            var localVarContentType = Acme.App.MastercardApi.Client.Client.ClientUtils.SelectHeaderContentType(_contentTypes);
            if (localVarContentType != null) localVarRequestOptions.HeaderParameters.Add("Content-Type", localVarContentType);

            var localVarAccept = Acme.App.MastercardApi.Client.Client.ClientUtils.SelectHeaderAccept(_accepts);
            if (localVarAccept != null) localVarRequestOptions.HeaderParameters.Add("Accept", localVarAccept);

            localVarRequestOptions.Data = transactRequestSchema;


            // make the HTTP request
            var localVarResponse = this.Client.Post<TransactResponseSchema>("/remotetransaction/static/1/0/transact", localVarRequestOptions, this.Configuration);

            if (this.ExceptionFactory != null)
            {
                Exception _exception = this.ExceptionFactory("CreateTransact", localVarResponse);
                if (_exception != null) throw _exception;
            }

            return localVarResponse;
        }

        /// <summary>
        /// Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction. This API is used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction through a payment processor.  The entire response is encrypted. The caller may only transact using the Tokens belonging to them. 
        /// </summary>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="transactRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
        /// <returns>Task of TransactResponseSchema</returns>
        public async System.Threading.Tasks.Task<TransactResponseSchema> CreateTransactAsync(TransactRequestSchema transactRequestSchema = default(TransactRequestSchema), System.Threading.CancellationToken cancellationToken = default(System.Threading.CancellationToken))
        {
            Acme.App.MastercardApi.Client.Client.ApiResponse<TransactResponseSchema> localVarResponse = await CreateTransactWithHttpInfoAsync(transactRequestSchema, cancellationToken).ConfigureAwait(false);
            return localVarResponse.Data;
        }

        /// <summary>
        /// Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction. This API is used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction through a payment processor.  The entire response is encrypted. The caller may only transact using the Tokens belonging to them. 
        /// </summary>
        /// <exception cref="Acme.App.MastercardApi.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="transactRequestSchema">Contains the details of the request message.  (optional)</param>
        /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
        /// <returns>Task of ApiResponse (TransactResponseSchema)</returns>
        public async System.Threading.Tasks.Task<Acme.App.MastercardApi.Client.Client.ApiResponse<TransactResponseSchema>> CreateTransactWithHttpInfoAsync(TransactRequestSchema transactRequestSchema = default(TransactRequestSchema), System.Threading.CancellationToken cancellationToken = default(System.Threading.CancellationToken))
        {

            Acme.App.MastercardApi.Client.Client.RequestOptions localVarRequestOptions = new Acme.App.MastercardApi.Client.Client.RequestOptions();

            String[] _contentTypes = new String[] {
                "application/json"
            };

            // to determine the Accept header
            String[] _accepts = new String[] {
                "application/json"
            };


            var localVarContentType = Acme.App.MastercardApi.Client.Client.ClientUtils.SelectHeaderContentType(_contentTypes);
            if (localVarContentType != null) localVarRequestOptions.HeaderParameters.Add("Content-Type", localVarContentType);

            var localVarAccept = Acme.App.MastercardApi.Client.Client.ClientUtils.SelectHeaderAccept(_accepts);
            if (localVarAccept != null) localVarRequestOptions.HeaderParameters.Add("Accept", localVarAccept);

            localVarRequestOptions.Data = transactRequestSchema;


            // make the HTTP request

            var localVarResponse = await this.AsynchronousClient.PostAsync<TransactResponseSchema>("/remotetransaction/static/1/0/transact", localVarRequestOptions, this.Configuration, cancellationToken).ConfigureAwait(false);

            if (this.ExceptionFactory != null)
            {
                Exception _exception = this.ExceptionFactory("CreateTransact", localVarResponse);
                if (_exception != null) throw _exception;
            }

            return localVarResponse;
        }

    }
}
