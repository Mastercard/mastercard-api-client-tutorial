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
    /// TransactRequestSchema
    /// </summary>
    [DataContract(Name = "TransactRequestSchema")]
    public partial class TransactRequestSchema : IEquatable<TransactRequestSchema>, IValidatableObject
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="TransactRequestSchema" /> class.
        /// </summary>
        [JsonConstructorAttribute]
        protected TransactRequestSchema() { }
        /// <summary>
        /// Initializes a new instance of the <see cref="TransactRequestSchema" /> class.
        /// </summary>
        /// <param name="responseHost">The host that originated the request. Future calls in the same conversation may be routed to this host. .</param>
        /// <param name="requestId">Unique identifier for the request.  (required).</param>
        /// <param name="tokenUniqueReference">Globally unique identifier for the Token, as assigned by MDES.  (required).</param>
        /// <param name="dsrpType">What type of DSRP cryptogram to create. Must be either UCAF or M_CHIP.  (required).</param>
        /// <param name="unpredictableNumber">HEX Encoded data (case sensitive) provided by the merchant to provide variability and uniqueness to the generation of a cryptogram. .</param>
        public TransactRequestSchema(string responseHost = default(string), string requestId = default(string), string tokenUniqueReference = default(string), string dsrpType = default(string), string unpredictableNumber = default(string))
        {
            // to ensure "requestId" is required (not null)
            this.RequestId = requestId ?? throw new ArgumentNullException("requestId is a required property for TransactRequestSchema and cannot be null");
            // to ensure "tokenUniqueReference" is required (not null)
            this.TokenUniqueReference = tokenUniqueReference ?? throw new ArgumentNullException("tokenUniqueReference is a required property for TransactRequestSchema and cannot be null");
            // to ensure "dsrpType" is required (not null)
            this.DsrpType = dsrpType ?? throw new ArgumentNullException("dsrpType is a required property for TransactRequestSchema and cannot be null");
            this.ResponseHost = responseHost;
            this.UnpredictableNumber = unpredictableNumber;
        }

        /// <summary>
        /// The host that originated the request. Future calls in the same conversation may be routed to this host. 
        /// </summary>
        /// <value>The host that originated the request. Future calls in the same conversation may be routed to this host. </value>
        [DataMember(Name = "responseHost", EmitDefaultValue = false)]
        public string ResponseHost { get; set; }

        /// <summary>
        /// Unique identifier for the request. 
        /// </summary>
        /// <value>Unique identifier for the request. </value>
        [DataMember(Name = "requestId", IsRequired = true, EmitDefaultValue = false)]
        public string RequestId { get; set; }

        /// <summary>
        /// Globally unique identifier for the Token, as assigned by MDES. 
        /// </summary>
        /// <value>Globally unique identifier for the Token, as assigned by MDES. </value>
        [DataMember(Name = "tokenUniqueReference", IsRequired = true, EmitDefaultValue = false)]
        public string TokenUniqueReference { get; set; }

        /// <summary>
        /// What type of DSRP cryptogram to create. Must be either UCAF or M_CHIP. 
        /// </summary>
        /// <value>What type of DSRP cryptogram to create. Must be either UCAF or M_CHIP. </value>
        [DataMember(Name = "dsrpType", IsRequired = true, EmitDefaultValue = false)]
        public string DsrpType { get; set; }

        /// <summary>
        /// HEX Encoded data (case sensitive) provided by the merchant to provide variability and uniqueness to the generation of a cryptogram. 
        /// </summary>
        /// <value>HEX Encoded data (case sensitive) provided by the merchant to provide variability and uniqueness to the generation of a cryptogram. </value>
        [DataMember(Name = "unpredictableNumber", EmitDefaultValue = false)]
        public string UnpredictableNumber { get; set; }

        /// <summary>
        /// Returns the string presentation of the object
        /// </summary>
        /// <returns>String presentation of the object</returns>
        public override string ToString()
        {
            var sb = new StringBuilder();
            sb.Append("class TransactRequestSchema {\n");
            sb.Append("  ResponseHost: ").Append(ResponseHost).Append("\n");
            sb.Append("  RequestId: ").Append(RequestId).Append("\n");
            sb.Append("  TokenUniqueReference: ").Append(TokenUniqueReference).Append("\n");
            sb.Append("  DsrpType: ").Append(DsrpType).Append("\n");
            sb.Append("  UnpredictableNumber: ").Append(UnpredictableNumber).Append("\n");
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
            return this.Equals(input as TransactRequestSchema);
        }

        /// <summary>
        /// Returns true if TransactRequestSchema instances are equal
        /// </summary>
        /// <param name="input">Instance of TransactRequestSchema to be compared</param>
        /// <returns>Boolean</returns>
        public bool Equals(TransactRequestSchema input)
        {
            if (input == null)
                return false;

            return 
                (
                    this.ResponseHost == input.ResponseHost ||
                    (this.ResponseHost != null &&
                    this.ResponseHost.Equals(input.ResponseHost))
                ) && 
                (
                    this.RequestId == input.RequestId ||
                    (this.RequestId != null &&
                    this.RequestId.Equals(input.RequestId))
                ) && 
                (
                    this.TokenUniqueReference == input.TokenUniqueReference ||
                    (this.TokenUniqueReference != null &&
                    this.TokenUniqueReference.Equals(input.TokenUniqueReference))
                ) && 
                (
                    this.DsrpType == input.DsrpType ||
                    (this.DsrpType != null &&
                    this.DsrpType.Equals(input.DsrpType))
                ) && 
                (
                    this.UnpredictableNumber == input.UnpredictableNumber ||
                    (this.UnpredictableNumber != null &&
                    this.UnpredictableNumber.Equals(input.UnpredictableNumber))
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
                if (this.ResponseHost != null)
                    hashCode = hashCode * 59 + this.ResponseHost.GetHashCode();
                if (this.RequestId != null)
                    hashCode = hashCode * 59 + this.RequestId.GetHashCode();
                if (this.TokenUniqueReference != null)
                    hashCode = hashCode * 59 + this.TokenUniqueReference.GetHashCode();
                if (this.DsrpType != null)
                    hashCode = hashCode * 59 + this.DsrpType.GetHashCode();
                if (this.UnpredictableNumber != null)
                    hashCode = hashCode * 59 + this.UnpredictableNumber.GetHashCode();
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
            // TokenUniqueReference (string) maxLength
            if(this.TokenUniqueReference != null && this.TokenUniqueReference.Length > 64)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for TokenUniqueReference, length must be less than 64.", new [] { "TokenUniqueReference" });
            }

            // DsrpType (string) maxLength
            if(this.DsrpType != null && this.DsrpType.Length > 64)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for DsrpType, length must be less than 64.", new [] { "DsrpType" });
            }

            // UnpredictableNumber (string) maxLength
            if(this.UnpredictableNumber != null && this.UnpredictableNumber.Length > 8)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for UnpredictableNumber, length must be less than 8.", new [] { "UnpredictableNumber" });
            }

            // UnpredictableNumber (string) minLength
            if(this.UnpredictableNumber != null && this.UnpredictableNumber.Length < 8)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for UnpredictableNumber, length must be greater than 8.", new [] { "UnpredictableNumber" });
            }

            yield break;
        }
    }

}
