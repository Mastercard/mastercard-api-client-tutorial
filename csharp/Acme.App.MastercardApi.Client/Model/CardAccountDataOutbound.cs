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
    /// **(CONDITIONAL)** The credit or debit card information for the account that is being tokenized.  Present in tokenize response if supported by the Token Requestor, if using a pushAccountReceipt and if there is a card account associated with the pushAccountReceipt in case that the issuer decision is not DECLINED. 
    /// </summary>
    [DataContract(Name = "CardAccountData_outbound")]
    public partial class CardAccountDataOutbound : IValidatableObject
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="CardAccountDataOutbound" /> class.
        /// </summary>
        /// <param name="accountNumber">The account number of the credit or debit card. .</param>
        /// <param name="expiryMonth"> The expiry month for the account. Two numeric digits must be supplied. **Format: MM** .</param>
        /// <param name="expiryYear">**(Required as minimum for Tokenization)** The expiry year for the account. **Format: YY** .</param>
        public CardAccountDataOutbound(string accountNumber = default(string), string expiryMonth = default(string), string expiryYear = default(string))
        {
            this.AccountNumber = accountNumber;
            this.ExpiryMonth = expiryMonth;
            this.ExpiryYear = expiryYear;
        }

        /// <summary>
        /// The account number of the credit or debit card. 
        /// </summary>
        /// <value>The account number of the credit or debit card. </value>
        /// <example>5123456789012345</example>
        [DataMember(Name = "accountNumber", EmitDefaultValue = false)]
        public string AccountNumber { get; set; }

        /// <summary>
        ///  The expiry month for the account. Two numeric digits must be supplied. **Format: MM** 
        /// </summary>
        /// <value> The expiry month for the account. Two numeric digits must be supplied. **Format: MM** </value>
        /// <example>09</example>
        [DataMember(Name = "expiryMonth", EmitDefaultValue = false)]
        public string ExpiryMonth { get; set; }

        /// <summary>
        /// **(Required as minimum for Tokenization)** The expiry year for the account. **Format: YY** 
        /// </summary>
        /// <value>**(Required as minimum for Tokenization)** The expiry year for the account. **Format: YY** </value>
        /// <example>21</example>
        [DataMember(Name = "expiryYear", EmitDefaultValue = false)]
        public string ExpiryYear { get; set; }

        /// <summary>
        /// Returns the string presentation of the object
        /// </summary>
        /// <returns>String presentation of the object</returns>
        public override string ToString()
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("class CardAccountDataOutbound {\n");
            sb.Append("  AccountNumber: ").Append(AccountNumber).Append("\n");
            sb.Append("  ExpiryMonth: ").Append(ExpiryMonth).Append("\n");
            sb.Append("  ExpiryYear: ").Append(ExpiryYear).Append("\n");
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
            // AccountNumber (string) maxLength
            if (this.AccountNumber != null && this.AccountNumber.Length > 19)
            {
                yield return new ValidationResult("Invalid value for AccountNumber, length must be less than 19.", new [] { "AccountNumber" });
            }

            // AccountNumber (string) minLength
            if (this.AccountNumber != null && this.AccountNumber.Length < 9)
            {
                yield return new ValidationResult("Invalid value for AccountNumber, length must be greater than 9.", new [] { "AccountNumber" });
            }

            // ExpiryMonth (string) maxLength
            if (this.ExpiryMonth != null && this.ExpiryMonth.Length > 2)
            {
                yield return new ValidationResult("Invalid value for ExpiryMonth, length must be less than 2.", new [] { "ExpiryMonth" });
            }

            // ExpiryMonth (string) minLength
            if (this.ExpiryMonth != null && this.ExpiryMonth.Length < 2)
            {
                yield return new ValidationResult("Invalid value for ExpiryMonth, length must be greater than 2.", new [] { "ExpiryMonth" });
            }

            // ExpiryYear (string) maxLength
            if (this.ExpiryYear != null && this.ExpiryYear.Length > 2)
            {
                yield return new ValidationResult("Invalid value for ExpiryYear, length must be less than 2.", new [] { "ExpiryYear" });
            }

            // ExpiryYear (string) minLength
            if (this.ExpiryYear != null && this.ExpiryYear.Length < 2)
            {
                yield return new ValidationResult("Invalid value for ExpiryYear, length must be greater than 2.", new [] { "ExpiryYear" });
            }

            yield break;
        }
    }

}
