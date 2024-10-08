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
    /// TransactEncryptedData
    /// </summary>
    [DataContract(Name = "transactEncryptedData")]
    public partial class TransactEncryptedData : IValidatableObject
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="TransactEncryptedData" /> class.
        /// </summary>
        /// <param name="accountNumber">The Primary Account Number for the transaction ? this is the Token PAN. .</param>
        /// <param name="applicationExpiryDate">Application expiry date for the Token. Expressed in YYMMDD format. .</param>
        /// <param name="panSequenceNumber">Application PAN sequence number for the Token .</param>
        /// <param name="track2Equivalent">Track 2 equivalent data for the Token. Expressed according to ISO/IEC 7813, excluding start sentinel, end sentinel, and Longitudinal Redundancy Check (LRC), using hex nibble &#39;D&#39; as field separator, and padded to whole bytes using one hex nibble &#39;F&#39; as needed. .</param>
        /// <param name="de48se43Data">Data for DE 48 Subelement 43 containing the cryptogram. DSRP cryptogram must be sent in DE104. Please refer to AN 3363 for details. .</param>
        public TransactEncryptedData(string accountNumber = default(string), string applicationExpiryDate = default(string), string panSequenceNumber = default(string), string track2Equivalent = default(string), string de48se43Data = default(string))
        {
            this.AccountNumber = accountNumber;
            this.ApplicationExpiryDate = applicationExpiryDate;
            this.PanSequenceNumber = panSequenceNumber;
            this.Track2Equivalent = track2Equivalent;
            this.De48se43Data = de48se43Data;
        }

        /// <summary>
        /// The Primary Account Number for the transaction ? this is the Token PAN. 
        /// </summary>
        /// <value>The Primary Account Number for the transaction ? this is the Token PAN. </value>
        /// <example>5480981500100002</example>
        [DataMember(Name = "accountNumber", EmitDefaultValue = false)]
        public string AccountNumber { get; set; }

        /// <summary>
        /// Application expiry date for the Token. Expressed in YYMMDD format. 
        /// </summary>
        /// <value>Application expiry date for the Token. Expressed in YYMMDD format. </value>
        /// <example>210931</example>
        [DataMember(Name = "applicationExpiryDate", EmitDefaultValue = false)]
        public string ApplicationExpiryDate { get; set; }

        /// <summary>
        /// Application PAN sequence number for the Token 
        /// </summary>
        /// <value>Application PAN sequence number for the Token </value>
        /// <example>01</example>
        [DataMember(Name = "panSequenceNumber", EmitDefaultValue = false)]
        public string PanSequenceNumber { get; set; }

        /// <summary>
        /// Track 2 equivalent data for the Token. Expressed according to ISO/IEC 7813, excluding start sentinel, end sentinel, and Longitudinal Redundancy Check (LRC), using hex nibble &#39;D&#39; as field separator, and padded to whole bytes using one hex nibble &#39;F&#39; as needed. 
        /// </summary>
        /// <value>Track 2 equivalent data for the Token. Expressed according to ISO/IEC 7813, excluding start sentinel, end sentinel, and Longitudinal Redundancy Check (LRC), using hex nibble &#39;D&#39; as field separator, and padded to whole bytes using one hex nibble &#39;F&#39; as needed. </value>
        /// <example>5480981500100002D18112011000000000000F</example>
        [DataMember(Name = "track2Equivalent", EmitDefaultValue = false)]
        public string Track2Equivalent { get; set; }

        /// <summary>
        /// Data for DE 48 Subelement 43 containing the cryptogram. DSRP cryptogram must be sent in DE104. Please refer to AN 3363 for details. 
        /// </summary>
        /// <value>Data for DE 48 Subelement 43 containing the cryptogram. DSRP cryptogram must be sent in DE104. Please refer to AN 3363 for details. </value>
        /// <example>11223344556677889900112233445566778899</example>
        [DataMember(Name = "de48se43Data", EmitDefaultValue = false)]
        public string De48se43Data { get; set; }

        /// <summary>
        /// Returns the string presentation of the object
        /// </summary>
        /// <returns>String presentation of the object</returns>
        public override string ToString()
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("class TransactEncryptedData {\n");
            sb.Append("  AccountNumber: ").Append(AccountNumber).Append("\n");
            sb.Append("  ApplicationExpiryDate: ").Append(ApplicationExpiryDate).Append("\n");
            sb.Append("  PanSequenceNumber: ").Append(PanSequenceNumber).Append("\n");
            sb.Append("  Track2Equivalent: ").Append(Track2Equivalent).Append("\n");
            sb.Append("  De48se43Data: ").Append(De48se43Data).Append("\n");
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
            // AccountNumber (string) maxLength
            if (this.AccountNumber != null && this.AccountNumber.Length > 19)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for AccountNumber, length must be less than 19.", new [] { "AccountNumber" });
            }

            // AccountNumber (string) minLength
            if (this.AccountNumber != null && this.AccountNumber.Length < 9)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for AccountNumber, length must be greater than 9.", new [] { "AccountNumber" });
            }

            // ApplicationExpiryDate (string) maxLength
            if (this.ApplicationExpiryDate != null && this.ApplicationExpiryDate.Length > 6)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for ApplicationExpiryDate, length must be less than 6.", new [] { "ApplicationExpiryDate" });
            }

            // ApplicationExpiryDate (string) minLength
            if (this.ApplicationExpiryDate != null && this.ApplicationExpiryDate.Length < 6)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for ApplicationExpiryDate, length must be greater than 6.", new [] { "ApplicationExpiryDate" });
            }

            // PanSequenceNumber (string) maxLength
            if (this.PanSequenceNumber != null && this.PanSequenceNumber.Length > 2)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for PanSequenceNumber, length must be less than 2.", new [] { "PanSequenceNumber" });
            }

            // PanSequenceNumber (string) minLength
            if (this.PanSequenceNumber != null && this.PanSequenceNumber.Length < 2)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for PanSequenceNumber, length must be greater than 2.", new [] { "PanSequenceNumber" });
            }

            // Track2Equivalent (string) maxLength
            if (this.Track2Equivalent != null && this.Track2Equivalent.Length > 38)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for Track2Equivalent, length must be less than 38.", new [] { "Track2Equivalent" });
            }

            // De48se43Data (string) maxLength
            if (this.De48se43Data != null && this.De48se43Data.Length > 32)
            {
                yield return new System.ComponentModel.DataAnnotations.ValidationResult("Invalid value for De48se43Data, length must be less than 32.", new [] { "De48se43Data" });
            }

            yield break;
        }
    }

}
