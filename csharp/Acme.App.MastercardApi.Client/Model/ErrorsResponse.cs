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
    /// ErrorsResponse
    /// </summary>
    [DataContract(Name = "ErrorsResponse")]
    public partial class ErrorsResponse : IEquatable<ErrorsResponse>, IValidatableObject
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="ErrorsResponse" /> class.
        /// </summary>
        /// <param name="errorCode">**CONDITIONAL** Returned in the event of an error and contains the reason the operation failed. Only use if errors object is not present. .</param>
        /// <param name="errorDescription">**CONDITIONAL** Returned in the event of an error and contains a description of why the operation failed. Only use if errors object is not present. .</param>
        /// <param name="responseHost">The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host. .</param>
        /// <param name="responseId">Unique identifier for the response. .</param>
        /// <param name="errors">errors.</param>
        public ErrorsResponse(string errorCode = default(string), string errorDescription = default(string), string responseHost = default(string), string responseId = default(string), Error errors = default(Error))
        {
            this.ErrorCode = errorCode;
            this.ErrorDescription = errorDescription;
            this.ResponseHost = responseHost;
            this.ResponseId = responseId;
            this.Errors = errors;
        }

        /// <summary>
        /// **CONDITIONAL** Returned in the event of an error and contains the reason the operation failed. Only use if errors object is not present. 
        /// </summary>
        /// <value>**CONDITIONAL** Returned in the event of an error and contains the reason the operation failed. Only use if errors object is not present. </value>
        [DataMember(Name = "errorCode", EmitDefaultValue = false)]
        public string ErrorCode { get; set; }

        /// <summary>
        /// **CONDITIONAL** Returned in the event of an error and contains a description of why the operation failed. Only use if errors object is not present. 
        /// </summary>
        /// <value>**CONDITIONAL** Returned in the event of an error and contains a description of why the operation failed. Only use if errors object is not present. </value>
        [DataMember(Name = "errorDescription", EmitDefaultValue = false)]
        public string ErrorDescription { get; set; }

        /// <summary>
        /// The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host. 
        /// </summary>
        /// <value>The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host. </value>
        [DataMember(Name = "responseHost", EmitDefaultValue = false)]
        public string ResponseHost { get; set; }

        /// <summary>
        /// Unique identifier for the response. 
        /// </summary>
        /// <value>Unique identifier for the response. </value>
        [DataMember(Name = "responseId", EmitDefaultValue = false)]
        public string ResponseId { get; set; }

        /// <summary>
        /// Gets or Sets Errors
        /// </summary>
        [DataMember(Name = "Errors", EmitDefaultValue = false)]
        public Error Errors { get; set; }

        /// <summary>
        /// Returns the string presentation of the object
        /// </summary>
        /// <returns>String presentation of the object</returns>
        public override string ToString()
        {
            var sb = new StringBuilder();
            sb.Append("class ErrorsResponse {\n");
            sb.Append("  ErrorCode: ").Append(ErrorCode).Append("\n");
            sb.Append("  ErrorDescription: ").Append(ErrorDescription).Append("\n");
            sb.Append("  ResponseHost: ").Append(ResponseHost).Append("\n");
            sb.Append("  ResponseId: ").Append(ResponseId).Append("\n");
            sb.Append("  Errors: ").Append(Errors).Append("\n");
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
        /// Returns true if objects are equal
        /// </summary>
        /// <param name="input">Object to be compared</param>
        /// <returns>Boolean</returns>
        public override bool Equals(object input)
        {
            return this.Equals(input as ErrorsResponse);
        }

        /// <summary>
        /// Returns true if ErrorsResponse instances are equal
        /// </summary>
        /// <param name="input">Instance of ErrorsResponse to be compared</param>
        /// <returns>Boolean</returns>
        public bool Equals(ErrorsResponse input)
        {
            if (input == null)
                return false;

            return 
                (
                    this.ErrorCode == input.ErrorCode ||
                    (this.ErrorCode != null &&
                    this.ErrorCode.Equals(input.ErrorCode))
                ) && 
                (
                    this.ErrorDescription == input.ErrorDescription ||
                    (this.ErrorDescription != null &&
                    this.ErrorDescription.Equals(input.ErrorDescription))
                ) && 
                (
                    this.ResponseHost == input.ResponseHost ||
                    (this.ResponseHost != null &&
                    this.ResponseHost.Equals(input.ResponseHost))
                ) && 
                (
                    this.ResponseId == input.ResponseId ||
                    (this.ResponseId != null &&
                    this.ResponseId.Equals(input.ResponseId))
                ) && 
                (
                    this.Errors == input.Errors ||
                    (this.Errors != null &&
                    this.Errors.Equals(input.Errors))
                );
        }

        /// <summary>
        /// Gets the hash code
        /// </summary>
        /// <returns>Hash code</returns>
        public override int GetHashCode()
        {
            unchecked // Overflow is fine, just wrap
            {
                int hashCode = 41;
                if (this.ErrorCode != null)
                    hashCode = hashCode * 59 + this.ErrorCode.GetHashCode();
                if (this.ErrorDescription != null)
                    hashCode = hashCode * 59 + this.ErrorDescription.GetHashCode();
                if (this.ResponseHost != null)
                    hashCode = hashCode * 59 + this.ResponseHost.GetHashCode();
                if (this.ResponseId != null)
                    hashCode = hashCode * 59 + this.ResponseId.GetHashCode();
                if (this.Errors != null)
                    hashCode = hashCode * 59 + this.Errors.GetHashCode();
                return hashCode;
            }
        }

        /// <summary>
        /// To validate all properties of the instance
        /// </summary>
        /// <param name="validationContext">Validation context</param>
        /// <returns>Validation Result</returns>
        IEnumerable<System.ComponentModel.DataAnnotations.ValidationResult> IValidatableObject.Validate(ValidationContext validationContext)
        {
            // ErrorCode (string) maxLength
            if(this.ErrorCode != null && this.ErrorCode.Length > 32)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for ErrorCode, length must be less than 32.", new [] { "ErrorCode" });
            }

            // ErrorDescription (string) maxLength
            if(this.ErrorDescription != null && this.ErrorDescription.Length > 32)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for ErrorDescription, length must be less than 32.", new [] { "ErrorDescription" });
            }

            yield break;
        }
    }

}
