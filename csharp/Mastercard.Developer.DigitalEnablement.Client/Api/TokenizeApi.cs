/* 
 * MDES for Merchants
 *
 * The MDES APIs are designed as RPC style stateless web services where each API endpoint represents an operation to be performed.  All request and response payloads are sent in the JSON (JavaScript Object Notation) data-interchange format. Each endpoint in the API specifies the HTTP Method used to access it. All strings in request and response objects are to be UTF-8 encoded.  Each API URI includes the major and minor version of API that it conforms to.  This will allow multiple concurrent versions of the API to be deployed simultaneously. <br> __Authentication__ Mastercard uses OAuth 1.0a with body hash extension for authenticating the API clients. This requires every request that you send to  Mastercard to be signed with an RSA private key. A private-public RSA key pair must be generated consisting of: <br> 1 . A private key for the OAuth signature for API requests. It is recommended to keep the private key in a password-protected or hardware keystore. <br> 2. A public key is shared with Mastercard during the project setup process through either a certificate signing request (CSR) or the API Key Generator. Mastercard will use the public key to verify the OAuth signature that is provided on every API call.<br>  An OAUTH1.0a signer library is available on [GitHub](https://github.com/Mastercard/oauth1-signer-java) <br>  __Encryption__<br>  All communications between Issuer web service and the Mastercard gateway is encrypted using TLS. <br> __Additional Encryption of Sensitive Data__ In addition to the OAuth authentication, when using MDES Digital Enablement Service, any PCI sensitive and all account holder Personally Identifiable Information (PII) data must be encrypted. This requirement applies to the API fields containing encryptedData. Sensitive data is encrypted using a symmetric session (one-time-use) key. The symmetric session key is then wrapped with an RSA Public Key supplied by Mastercard during API setup phase (the Customer Encryption Key). <br>  Java Client Encryption Library available on [GitHub](https://github.com/Mastercard/client-encryption-java) 
 *
 * The version of the OpenAPI document: 1.2.10
 * 
 * Generated by: https://github.com/openapitools/openapi-generator.git
 */

using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Linq;
using RestSharp.Portable;
using Mastercard.Developer.DigitalEnablement.Client.Client;
using Mastercard.Developer.DigitalEnablement.Client.Model;

namespace Mastercard.Developer.DigitalEnablement.Client.Api
{
    /// <summary>
    /// Represents a collection of functions to interact with the API endpoints
    /// </summary>
    public interface ITokenizeApi : IApiAccessor
    {
        #region Synchronous Operations
        /// <summary>
        /// Used to digitize a card to create a server-based Token.
        /// </summary>
        /// <remarks>
        /// Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 
        /// </remarks>
        /// <exception cref="Mastercard.Developer.DigitalEnablement.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="tokenizeRequestSchema">A Tokenize request is used to digitize a PAN.   (optional)</param>
        /// <returns>TokenizeResponseSchema</returns>
        TokenizeResponseSchema CreateTokenize (TokenizeRequestSchema tokenizeRequestSchema = default(TokenizeRequestSchema));

        /// <summary>
        /// Used to digitize a card to create a server-based Token.
        /// </summary>
        /// <remarks>
        /// Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 
        /// </remarks>
        /// <exception cref="Mastercard.Developer.DigitalEnablement.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="tokenizeRequestSchema">A Tokenize request is used to digitize a PAN.   (optional)</param>
        /// <returns>ApiResponse of TokenizeResponseSchema</returns>
        ApiResponse<TokenizeResponseSchema> CreateTokenizeWithHttpInfo (TokenizeRequestSchema tokenizeRequestSchema = default(TokenizeRequestSchema));
        #endregion Synchronous Operations
        #region Asynchronous Operations
        /// <summary>
        /// Used to digitize a card to create a server-based Token.
        /// </summary>
        /// <remarks>
        /// Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 
        /// </remarks>
        /// <exception cref="Mastercard.Developer.DigitalEnablement.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="tokenizeRequestSchema">A Tokenize request is used to digitize a PAN.   (optional)</param>
        /// <returns>Task of TokenizeResponseSchema</returns>
        System.Threading.Tasks.Task<TokenizeResponseSchema> CreateTokenizeAsync (TokenizeRequestSchema tokenizeRequestSchema = default(TokenizeRequestSchema));

        /// <summary>
        /// Used to digitize a card to create a server-based Token.
        /// </summary>
        /// <remarks>
        /// Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 
        /// </remarks>
        /// <exception cref="Mastercard.Developer.DigitalEnablement.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="tokenizeRequestSchema">A Tokenize request is used to digitize a PAN.   (optional)</param>
        /// <returns>Task of ApiResponse (TokenizeResponseSchema)</returns>
        System.Threading.Tasks.Task<ApiResponse<TokenizeResponseSchema>> CreateTokenizeAsyncWithHttpInfo (TokenizeRequestSchema tokenizeRequestSchema = default(TokenizeRequestSchema));
        #endregion Asynchronous Operations
    }

    /// <summary>
    /// Represents a collection of functions to interact with the API endpoints
    /// </summary>
    public partial class TokenizeApi : ITokenizeApi
    {
        private Mastercard.Developer.DigitalEnablement.Client.Client.ExceptionFactory _exceptionFactory = (name, response) => null;

        /// <summary>
        /// Initializes a new instance of the <see cref="TokenizeApi"/> class.
        /// </summary>
        /// <returns></returns>
        public TokenizeApi(String basePath)
        {
            this.Configuration = new Mastercard.Developer.DigitalEnablement.Client.Client.Configuration { BasePath = basePath };

            ExceptionFactory = Mastercard.Developer.DigitalEnablement.Client.Client.Configuration.DefaultExceptionFactory;
        }

        /// <summary>
        /// Initializes a new instance of the <see cref="TokenizeApi"/> class
        /// </summary>
        /// <returns></returns>
        public TokenizeApi()
        {
            this.Configuration = Mastercard.Developer.DigitalEnablement.Client.Client.Configuration.Default;

            ExceptionFactory = Mastercard.Developer.DigitalEnablement.Client.Client.Configuration.DefaultExceptionFactory;
        }

        /// <summary>
        /// Initializes a new instance of the <see cref="TokenizeApi"/> class
        /// using Configuration object
        /// </summary>
        /// <param name="configuration">An instance of Configuration</param>
        /// <returns></returns>
        public TokenizeApi(Mastercard.Developer.DigitalEnablement.Client.Client.Configuration configuration = null)
        {
            if (configuration == null) // use the default one in Configuration
                this.Configuration = Mastercard.Developer.DigitalEnablement.Client.Client.Configuration.Default;
            else
                this.Configuration = configuration;

            ExceptionFactory = Mastercard.Developer.DigitalEnablement.Client.Client.Configuration.DefaultExceptionFactory;
        }

        /// <summary>
        /// Gets the base path of the API client.
        /// </summary>
        /// <value>The base path</value>
        public String GetBasePath()
        {
            return this.Configuration.ApiClient.RestClient.BaseUrl.ToString();
        }

        /// <summary>
        /// Sets the base path of the API client.
        /// </summary>
        /// <value>The base path</value>
        [Obsolete("SetBasePath is deprecated, please do 'Configuration.ApiClient = new ApiClient(\"http://new-path\")' instead.")]
        public void SetBasePath(String basePath)
        {
            // do nothing
        }

        /// <summary>
        /// Gets or sets the configuration object
        /// </summary>
        /// <value>An instance of the Configuration</value>
        public Mastercard.Developer.DigitalEnablement.Client.Client.Configuration Configuration {get; set;}

        /// <summary>
        /// Provides a factory method hook for the creation of exceptions.
        /// </summary>
        public Mastercard.Developer.DigitalEnablement.Client.Client.ExceptionFactory ExceptionFactory
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
        /// Gets the default header.
        /// </summary>
        /// <returns>Dictionary of HTTP header</returns>
        [Obsolete("DefaultHeader is deprecated, please use Configuration.DefaultHeader instead.")]
        public IDictionary<String, String> DefaultHeader()
        {
            return new ReadOnlyDictionary<string, string>(this.Configuration.DefaultHeader);
        }

        /// <summary>
        /// Add default header.
        /// </summary>
        /// <param name="key">Header field name.</param>
        /// <param name="value">Header field value.</param>
        /// <returns></returns>
        [Obsolete("AddDefaultHeader is deprecated, please use Configuration.AddDefaultHeader instead.")]
        public void AddDefaultHeader(string key, string value)
        {
            this.Configuration.AddDefaultHeader(key, value);
        }

        /// <summary>
        /// Used to digitize a card to create a server-based Token. Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 
        /// </summary>
        /// <exception cref="Mastercard.Developer.DigitalEnablement.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="tokenizeRequestSchema">A Tokenize request is used to digitize a PAN.   (optional)</param>
        /// <returns>TokenizeResponseSchema</returns>
        public TokenizeResponseSchema CreateTokenize (TokenizeRequestSchema tokenizeRequestSchema = default(TokenizeRequestSchema))
        {
             ApiResponse<TokenizeResponseSchema> localVarResponse = CreateTokenizeWithHttpInfo(tokenizeRequestSchema);
             return localVarResponse.Data;
        }

        /// <summary>
        /// Used to digitize a card to create a server-based Token. Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 
        /// </summary>
        /// <exception cref="Mastercard.Developer.DigitalEnablement.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="tokenizeRequestSchema">A Tokenize request is used to digitize a PAN.   (optional)</param>
        /// <returns>ApiResponse of TokenizeResponseSchema</returns>
        public ApiResponse<TokenizeResponseSchema> CreateTokenizeWithHttpInfo (TokenizeRequestSchema tokenizeRequestSchema = default(TokenizeRequestSchema))
        {

            var localVarPath = "./digitization/static/1/0/tokenize";
            var localVarPathParams = new Dictionary<String, String>();
            var localVarQueryParams = new List<KeyValuePair<String, String>>();
            var localVarHeaderParams = new Dictionary<String, String>(this.Configuration.DefaultHeader);
            var localVarFormParams = new Dictionary<String, String>();
            var localVarFileParams = new Dictionary<String, FileParameter>();
            Object localVarPostBody = null;

            // to determine the Content-Type header
            String[] localVarHttpContentTypes = new String[] {
                "application/json"
            };
            String localVarHttpContentType = this.Configuration.ApiClient.SelectHeaderContentType(localVarHttpContentTypes);

            // to determine the Accept header
            String[] localVarHttpHeaderAccepts = new String[] {
                "application/json"
            };
            String localVarHttpHeaderAccept = this.Configuration.ApiClient.SelectHeaderAccept(localVarHttpHeaderAccepts);
            if (localVarHttpHeaderAccept != null)
                localVarHeaderParams.Add("Accept", localVarHttpHeaderAccept);

            if (tokenizeRequestSchema != null && tokenizeRequestSchema.GetType() != typeof(byte[]))
            {
                localVarPostBody = this.Configuration.ApiClient.Serialize(tokenizeRequestSchema); // http body (model) parameter
            }
            else
            {
                localVarPostBody = tokenizeRequestSchema; // byte array
            }


            // make the HTTP request
            IRestResponse localVarResponse = (IRestResponse) this.Configuration.ApiClient.CallApi(localVarPath,
                Method.POST, localVarQueryParams, localVarPostBody, localVarHeaderParams, localVarFormParams, localVarFileParams,
                localVarPathParams, localVarHttpContentType);

            int localVarStatusCode = (int) localVarResponse.StatusCode;

            if (ExceptionFactory != null)
            {
                Exception exception = ExceptionFactory("CreateTokenize", localVarResponse);
                if (exception != null) throw exception;
            }

            return new ApiResponse<TokenizeResponseSchema>(localVarStatusCode,
                localVarResponse.Headers.ToDictionary(x => x.Key, x => string.Join(",", x.Value)),
                (TokenizeResponseSchema) this.Configuration.ApiClient.Deserialize(localVarResponse, typeof(TokenizeResponseSchema)));
        }

        /// <summary>
        /// Used to digitize a card to create a server-based Token. Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 
        /// </summary>
        /// <exception cref="Mastercard.Developer.DigitalEnablement.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="tokenizeRequestSchema">A Tokenize request is used to digitize a PAN.   (optional)</param>
        /// <returns>Task of TokenizeResponseSchema</returns>
        public async System.Threading.Tasks.Task<TokenizeResponseSchema> CreateTokenizeAsync (TokenizeRequestSchema tokenizeRequestSchema = default(TokenizeRequestSchema))
        {
             ApiResponse<TokenizeResponseSchema> localVarResponse = await CreateTokenizeAsyncWithHttpInfo(tokenizeRequestSchema);
             return localVarResponse.Data;

        }

        /// <summary>
        /// Used to digitize a card to create a server-based Token. Used to digitize a card to create a server-based Token. MDES will perform both card availability and eligibility checks to check that this specific card is eligible for digitization. As both availability and eligibility are combined, only a Tokenization Authorization message is sent to the issuer as part of this request to authorize the digitization. No Tokenization Eligibility message is sent. The digitization decision will be one of Approved or Declined. 
        /// </summary>
        /// <exception cref="Mastercard.Developer.DigitalEnablement.Client.Client.ApiException">Thrown when fails to make API call</exception>
        /// <param name="tokenizeRequestSchema">A Tokenize request is used to digitize a PAN.   (optional)</param>
        /// <returns>Task of ApiResponse (TokenizeResponseSchema)</returns>
        public async System.Threading.Tasks.Task<ApiResponse<TokenizeResponseSchema>> CreateTokenizeAsyncWithHttpInfo (TokenizeRequestSchema tokenizeRequestSchema = default(TokenizeRequestSchema))
        {

            var localVarPath = "./digitization/static/1/0/tokenize";
            var localVarPathParams = new Dictionary<String, String>();
            var localVarQueryParams = new List<KeyValuePair<String, String>>();
            var localVarHeaderParams = new Dictionary<String, String>(this.Configuration.DefaultHeader);
            var localVarFormParams = new Dictionary<String, String>();
            var localVarFileParams = new Dictionary<String, FileParameter>();
            Object localVarPostBody = null;

            // to determine the Content-Type header
            String[] localVarHttpContentTypes = new String[] {
                "application/json"
            };
            String localVarHttpContentType = this.Configuration.ApiClient.SelectHeaderContentType(localVarHttpContentTypes);

            // to determine the Accept header
            String[] localVarHttpHeaderAccepts = new String[] {
                "application/json"
            };
            String localVarHttpHeaderAccept = this.Configuration.ApiClient.SelectHeaderAccept(localVarHttpHeaderAccepts);
            if (localVarHttpHeaderAccept != null)
                localVarHeaderParams.Add("Accept", localVarHttpHeaderAccept);

            if (tokenizeRequestSchema != null && tokenizeRequestSchema.GetType() != typeof(byte[]))
            {
                localVarPostBody = this.Configuration.ApiClient.Serialize(tokenizeRequestSchema); // http body (model) parameter
            }
            else
            {
                localVarPostBody = tokenizeRequestSchema; // byte array
            }


            // make the HTTP request
            IRestResponse localVarResponse = (IRestResponse) await this.Configuration.ApiClient.CallApiAsync(localVarPath,
                Method.POST, localVarQueryParams, localVarPostBody, localVarHeaderParams, localVarFormParams, localVarFileParams,
                localVarPathParams, localVarHttpContentType);

            int localVarStatusCode = (int) localVarResponse.StatusCode;

            if (ExceptionFactory != null)
            {
                Exception exception = ExceptionFactory("CreateTokenize", localVarResponse);
                if (exception != null) throw exception;
            }

            return new ApiResponse<TokenizeResponseSchema>(localVarStatusCode,
                localVarResponse.Headers.ToDictionary(x => x.Key, x => string.Join(",", x.Value)),
                (TokenizeResponseSchema) this.Configuration.ApiClient.Deserialize(localVarResponse, typeof(TokenizeResponseSchema)));
        }

    }
}
