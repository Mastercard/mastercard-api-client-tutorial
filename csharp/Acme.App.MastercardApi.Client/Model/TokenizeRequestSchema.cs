/*
 * MDES Digital Enablement API
 *
 * These APIs are designed as RPC style stateless web services where each API endpoint represents an operation to be performed.  All request and response payloads are sent in the JSON (JavaScript Object Notation) data-interchange format. Each endpoint in the API specifies the HTTP Method used to access it. All strings in request and response objects are to be UTF-8 encoded.  Each API URI includes the major and minor version of API that it conforms to.  This will allow multiple concurrent versions of the API to be deployed simultaneously. <br><br> **Authentication** <br><br> Mastercard uses OAuth 1.0a with body hash extension for authenticating the API clients. This requires every request that you send to  Mastercard to be signed with an RSA private key. A private-public RSA key pair must be generated consisting of: <br><br> 1. A private key for the OAuth signature for API requests. It is recommended to keep the private key in a password-protected or hardware keystore. <br> 2. A public key is shared with Mastercard during the project setup process through either a certificate signing request (CSR) or the API Key Generator. Mastercard will use the public key to verify the OAuth signature that is provided on every API call.<br>  An OAUTH1.0a signer library is available on [GitHub](https://github.com/Mastercard/oauth1-signer-java) <br><br> **Encryption** <br><br> All communications between Issuer web service and the Mastercard gateway is encrypted using TLS. <br><br> **Additional Encryption of Sensitive Data** <br><br> In addition to the OAuth authentication, when using MDES Digital Enablement Service, any PCI sensitive and all account holder Personally Identifiable Information (PII) data must be encrypted. This requirement applies to the API fields containing encryptedData. Sensitive data is encrypted using a symmetric session (one-time-use) key. The symmetric session key is then wrapped with an RSA Public Key supplied by Mastercard during API setup phase (the Customer Encryption Key). <br>  Java Client Encryption Library available on [GitHub](https://github.com/Mastercard/client-encryption-java) 
 *
 * The version of the OpenAPI document: 1.3.0
 * Generated by: https://github.com/openapitools/openapi-generator.git
 */


using System;
using System.Collections;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Linq;
using System.IO;
using System.Runtime.Serialization;
using System.Text;
using System.Text.RegularExpressions;
using Newtonsoft.Json;
using Newtonsoft.Json.Converters;
using Newtonsoft.Json.Linq;
using System.ComponentModel.DataAnnotations;
using OpenAPIDateConverter = Acme.App.MastercardApi.Client.Client.OpenAPIDateConverter;

namespace Acme.App.MastercardApi.Client.Model
{
    /// <summary>
    /// TokenizeRequestSchema
    /// </summary>
    [DataContract(Name = "TokenizeRequestSchema")]
    public partial class TokenizeRequestSchema : IValidatableObject
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="TokenizeRequestSchema" /> class.
        /// </summary>
        [JsonConstructorAttribute]
        protected TokenizeRequestSchema() { }
        /// <summary>
        /// Initializes a new instance of the <see cref="TokenizeRequestSchema" /> class.
        /// </summary>
        /// <param name="responseHost">\&quot;The host that originated the request. Future calls in the same conversation may be routed to this host. Must be provided as: host[:port][/contextRoot] Where port and contextRoot are optional. If contextRoot is not provided, the default (per the URL Scheme) is assumed and must be used.\&quot; .</param>
        /// <param name="requestId">Unique identifier for the request. .</param>
        /// <param name="tokenType">The type of Token requested. Must be CLOUD  (required).</param>
        /// <param name="tokenRequestorId">11-digit numeric ID provided by Mastercard that identifies the Token Requestor.  (required).</param>
        /// <param name="taskId">Identifier for this task as assigned by the Token Requestor, unique across a given Token Requestor Identifier. May be used in the Get Task Status API to query the status of this task.  (required).</param>
        /// <param name="fundingAccountInfo">fundingAccountInfo (required).</param>
        /// <param name="consumerLanguage">Language preference selected by the consumer. Formatted as an ISO- 639-1 two-letter language code. .</param>
        /// <param name="tokenizationAuthenticationValue">The Tokenization Authentication Value (TAV) as cryptographically signed by the Issuer to authorize this digitization request. .</param>
        /// <param name="decisioningData">decisioningData.</param>
        public TokenizeRequestSchema(string responseHost = default(string), string requestId = default(string), string tokenType = default(string), string tokenRequestorId = default(string), string taskId = default(string), FundingAccountInfo fundingAccountInfo = default(FundingAccountInfo), string consumerLanguage = default(string), string tokenizationAuthenticationValue = default(string), DecisioningData decisioningData = default(DecisioningData))
        {
            // to ensure "tokenType" is required (not null)
            if (tokenType == null)
            {
                throw new ArgumentNullException("tokenType is a required property for TokenizeRequestSchema and cannot be null");
            }
            this.TokenType = tokenType;
            // to ensure "tokenRequestorId" is required (not null)
            if (tokenRequestorId == null)
            {
                throw new ArgumentNullException("tokenRequestorId is a required property for TokenizeRequestSchema and cannot be null");
            }
            this.TokenRequestorId = tokenRequestorId;
            // to ensure "taskId" is required (not null)
            if (taskId == null)
            {
                throw new ArgumentNullException("taskId is a required property for TokenizeRequestSchema and cannot be null");
            }
            this.TaskId = taskId;
            // to ensure "fundingAccountInfo" is required (not null)
            if (fundingAccountInfo == null)
            {
                throw new ArgumentNullException("fundingAccountInfo is a required property for TokenizeRequestSchema and cannot be null");
            }
            this.FundingAccountInfo = fundingAccountInfo;
            this.ResponseHost = responseHost;
            this.RequestId = requestId;
            this.ConsumerLanguage = consumerLanguage;
            this.TokenizationAuthenticationValue = tokenizationAuthenticationValue;
            this.DecisioningData = decisioningData;
        }

        /// <summary>
        /// \&quot;The host that originated the request. Future calls in the same conversation may be routed to this host. Must be provided as: host[:port][/contextRoot] Where port and contextRoot are optional. If contextRoot is not provided, the default (per the URL Scheme) is assumed and must be used.\&quot; 
        /// </summary>
        /// <value>\&quot;The host that originated the request. Future calls in the same conversation may be routed to this host. Must be provided as: host[:port][/contextRoot] Where port and contextRoot are optional. If contextRoot is not provided, the default (per the URL Scheme) is assumed and must be used.\&quot; </value>
        /// <example>site1.your-server.com</example>
        [DataMember(Name = "responseHost", EmitDefaultValue = false)]
        public string ResponseHost { get; set; }

        /// <summary>
        /// Unique identifier for the request. 
        /// </summary>
        /// <value>Unique identifier for the request. </value>
        /// <example>123456</example>
        [DataMember(Name = "requestId", EmitDefaultValue = false)]
        public string RequestId { get; set; }

        /// <summary>
        /// The type of Token requested. Must be CLOUD 
        /// </summary>
        /// <value>The type of Token requested. Must be CLOUD </value>
        /// <example>CLOUD</example>
        [DataMember(Name = "tokenType", IsRequired = true, EmitDefaultValue = true)]
        public string TokenType { get; set; }

        /// <summary>
        /// 11-digit numeric ID provided by Mastercard that identifies the Token Requestor. 
        /// </summary>
        /// <value>11-digit numeric ID provided by Mastercard that identifies the Token Requestor. </value>
        /// <example>98765432101</example>
        [DataMember(Name = "tokenRequestorId", IsRequired = true, EmitDefaultValue = true)]
        public string TokenRequestorId { get; set; }

        /// <summary>
        /// Identifier for this task as assigned by the Token Requestor, unique across a given Token Requestor Identifier. May be used in the Get Task Status API to query the status of this task. 
        /// </summary>
        /// <value>Identifier for this task as assigned by the Token Requestor, unique across a given Token Requestor Identifier. May be used in the Get Task Status API to query the status of this task. </value>
        /// <example>123456</example>
        [DataMember(Name = "taskId", IsRequired = true, EmitDefaultValue = true)]
        public string TaskId { get; set; }

        /// <summary>
        /// Gets or Sets FundingAccountInfo
        /// </summary>
        [DataMember(Name = "fundingAccountInfo", IsRequired = true, EmitDefaultValue = true)]
        public FundingAccountInfo FundingAccountInfo { get; set; }

        /// <summary>
        /// Language preference selected by the consumer. Formatted as an ISO- 639-1 two-letter language code. 
        /// </summary>
        /// <value>Language preference selected by the consumer. Formatted as an ISO- 639-1 two-letter language code. </value>
        /// <example>en</example>
        [DataMember(Name = "consumerLanguage", EmitDefaultValue = false)]
        public string ConsumerLanguage { get; set; }

        /// <summary>
        /// The Tokenization Authentication Value (TAV) as cryptographically signed by the Issuer to authorize this digitization request. 
        /// </summary>
        /// <value>The Tokenization Authentication Value (TAV) as cryptographically signed by the Issuer to authorize this digitization request. </value>
        /// <example>RHVtbXkgYmFzZSA2NCBkYXRhIC0gdGhpcyBpcyBub3QgYSByZWFsIFRBViBleGFtcGxl</example>
        [DataMember(Name = "tokenizationAuthenticationValue", EmitDefaultValue = false)]
        public string TokenizationAuthenticationValue { get; set; }

        /// <summary>
        /// Gets or Sets DecisioningData
        /// </summary>
        [DataMember(Name = "decisioningData", EmitDefaultValue = false)]
        public DecisioningData DecisioningData { get; set; }

        /// <summary>
        /// Returns the string presentation of the object
        /// </summary>
        /// <returns>String presentation of the object</returns>
        public override string ToString()
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("class TokenizeRequestSchema {\n");
            sb.Append("  ResponseHost: ").Append(ResponseHost).Append("\n");
            sb.Append("  RequestId: ").Append(RequestId).Append("\n");
            sb.Append("  TokenType: ").Append(TokenType).Append("\n");
            sb.Append("  TokenRequestorId: ").Append(TokenRequestorId).Append("\n");
            sb.Append("  TaskId: ").Append(TaskId).Append("\n");
            sb.Append("  FundingAccountInfo: ").Append(FundingAccountInfo).Append("\n");
            sb.Append("  ConsumerLanguage: ").Append(ConsumerLanguage).Append("\n");
            sb.Append("  TokenizationAuthenticationValue: ").Append(TokenizationAuthenticationValue).Append("\n");
            sb.Append("  DecisioningData: ").Append(DecisioningData).Append("\n");
            sb.Append("}\n");
            return sb.ToString();
        }

        /// <summary>
        /// Returns the JSON string presentation of the object
        /// </summary>
        /// <returns>JSON string presentation of the object</returns>
        public virtual string ToJson()
        {
            return Newtonsoft.Json.JsonConvert.SerializeObject(this, Newtonsoft.Json.Formatting.Indented);
        }

        /// <summary>
        /// To validate all properties of the instance
        /// </summary>
        /// <param name="validationContext">Validation context</param>
        /// <returns>Validation Result</returns>
        IEnumerable<System.ComponentModel.DataAnnotations.ValidationResult> IValidatableObject.Validate(ValidationContext validationContext)
        {
            // TokenType (string) maxLength
            if (this.TokenType != null && this.TokenType.Length > 32)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for TokenType, length must be less than 32.", new [] { "TokenType" });
            }

            // TokenRequestorId (string) maxLength
            if (this.TokenRequestorId != null && this.TokenRequestorId.Length > 11)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for TokenRequestorId, length must be less than 11.", new [] { "TokenRequestorId" });
            }

            // TaskId (string) maxLength
            if (this.TaskId != null && this.TaskId.Length > 64)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for TaskId, length must be less than 64.", new [] { "TaskId" });
            }

            // ConsumerLanguage (string) maxLength
            if (this.ConsumerLanguage != null && this.ConsumerLanguage.Length > 2)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for ConsumerLanguage, length must be less than 2.", new [] { "ConsumerLanguage" });
            }

            // TokenizationAuthenticationValue (string) maxLength
            if (this.TokenizationAuthenticationValue != null && this.TokenizationAuthenticationValue.Length > 2048)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for TokenizationAuthenticationValue, length must be less than 2048.", new [] { "TokenizationAuthenticationValue" });
            }

            yield break;
        }
    }

}
