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
    /// MediaContent
    /// </summary>
    [DataContract(Name = "mediaContent")]
    public partial class MediaContent : IValidatableObject
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="MediaContent" /> class.
        /// </summary>
        [JsonConstructorAttribute]
        protected MediaContent() { }
        /// <summary>
        /// Initializes a new instance of the <see cref="MediaContent" /> class.
        /// </summary>
        /// <param name="type">What type of media this is. Specified as a MIME type, which will be one of the following supported types  * applicatoin/pdf (for images must be a vector PDF image) * image/png (includes alpha channel) * text/plain * text/html  (required).</param>
        /// <param name="data">The data for this item of media. Base64-encoded data, given in the format as specified in ?type?.  (required).</param>
        /// <param name="height">For image assets, the height of this image. Specified in pixels. .</param>
        /// <param name="width">For image assets, the width of this image. Specified in pixels. .</param>
        public MediaContent(string type = default(string), string data = default(string), string height = default(string), string width = default(string))
        {
            // to ensure "type" is required (not null)
            if (type == null)
            {
                throw new ArgumentNullException("type is a required property for MediaContent and cannot be null");
            }
            this.Type = type;
            // to ensure "data" is required (not null)
            if (data == null)
            {
                throw new ArgumentNullException("data is a required property for MediaContent and cannot be null");
            }
            this.Data = data;
            this.Height = height;
            this.Width = width;
        }

        /// <summary>
        /// What type of media this is. Specified as a MIME type, which will be one of the following supported types  * applicatoin/pdf (for images must be a vector PDF image) * image/png (includes alpha channel) * text/plain * text/html 
        /// </summary>
        /// <value>What type of media this is. Specified as a MIME type, which will be one of the following supported types  * applicatoin/pdf (for images must be a vector PDF image) * image/png (includes alpha channel) * text/plain * text/html </value>
        /// <example>image/png</example>
        [DataMember(Name = "type", IsRequired = true, EmitDefaultValue = true)]
        public string Type { get; set; }

        /// <summary>
        /// The data for this item of media. Base64-encoded data, given in the format as specified in ?type?. 
        /// </summary>
        /// <value>The data for this item of media. Base64-encoded data, given in the format as specified in ?type?. </value>
        /// <example>iVBORw0KGgoAAAANSUhEUgAAAXcAAAF3CAIAAADRopypAAAABGdBTUEAANbY1E9YMgAAAAlwSFlzAAAASAAAAEgARslrPgAAGtNJREFUeNrt3W9oW</example>
        [DataMember(Name = "data", IsRequired = true, EmitDefaultValue = true)]
        public string Data { get; set; }

        /// <summary>
        /// For image assets, the height of this image. Specified in pixels. 
        /// </summary>
        /// <value>For image assets, the height of this image. Specified in pixels. </value>
        /// <example>375</example>
        [DataMember(Name = "height", EmitDefaultValue = false)]
        public string Height { get; set; }

        /// <summary>
        /// For image assets, the width of this image. Specified in pixels. 
        /// </summary>
        /// <value>For image assets, the width of this image. Specified in pixels. </value>
        /// <example>375</example>
        [DataMember(Name = "width", EmitDefaultValue = false)]
        public string Width { get; set; }

        /// <summary>
        /// Returns the string presentation of the object
        /// </summary>
        /// <returns>String presentation of the object</returns>
        public override string ToString()
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("class MediaContent {\n");
            sb.Append("  Type: ").Append(Type).Append("\n");
            sb.Append("  Data: ").Append(Data).Append("\n");
            sb.Append("  Height: ").Append(Height).Append("\n");
            sb.Append("  Width: ").Append(Width).Append("\n");
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
        IEnumerable<ValidationResult> IValidatableObject.Validate(ValidationContext validationContext)
        {
            // Type (string) maxLength
            if (this.Type != null && this.Type.Length > 32)
            {
                yield return new ValidationResult("Invalid value for Type, length must be less than 32.", new [] { "Type" });
            }

            // Height (string) maxLength
            if (this.Height != null && this.Height.Length > 6)
            {
                yield return new ValidationResult("Invalid value for Height, length must be less than 6.", new [] { "Height" });
            }

            // Width (string) maxLength
            if (this.Width != null && this.Width.Length > 6)
            {
                yield return new ValidationResult("Invalid value for Width, length must be less than 6.", new [] { "Width" });
            }

            yield break;
        }
    }

}
