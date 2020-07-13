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
using System.Linq;
using System.IO;
using System.Text;
using System.Collections;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Runtime.Serialization;
using Newtonsoft.Json;
using Newtonsoft.Json.Converters;
using OpenAPIDateConverter = Mastercard.Developer.DigitalEnablement.Client.Client.OpenAPIDateConverter;

namespace Mastercard.Developer.DigitalEnablement.Client.Model
{
    /// <summary>
    /// TransactEncryptedData
    /// </summary>
    [DataContract]
    public partial class TransactEncryptedData :  IEquatable<TransactEncryptedData>
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="TransactEncryptedData" /> class.
        /// </summary>
        /// <param name="accountNumber">The Primary Account Number for the transaction – this is the Token PAN.  &lt;br&gt;__Min Length: 9__ &lt;br&gt;__Max Length: 19__ .</param>
        /// <param name="applicationExpiryDate">Application expiry date for the Token. Expressed in YYMMDD format.  &lt;br&gt; __Length: 6__ .</param>
        /// <param name="panSequenceNumber">Application PAN sequence number for the Token &lt;br&gt;  __Length: 2__ .</param>
        /// <param name="track2Equivalent">Track 2 equivalent data for the Token. Expressed according to ISO/IEC 7813, excluding start sentinel, end sentinel, and Longitudinal Redundancy Check (LRC), using hex nibble &#39;D&#39; as field separator, and padded to whole bytes using one hex nibble &#39;F&#39; as needed.  &lt;br&gt;   __Max Length: 38__ .</param>
        /// <param name="de48se43Data">Data for DE 48 Subelement 43 containing the cryptogram.&lt;br&gt; DSRP cryptogram is required to be sent in the DE104 – DPD (Digital Payment Data) field  – please refer to AN3363 bulletin for more details.&lt;br&gt; __Max Length: 32__ .</param>
        public TransactEncryptedData(string accountNumber = default(string), string applicationExpiryDate = default(string), string panSequenceNumber = default(string), string track2Equivalent = default(string), string de48se43Data = default(string))
        {
            this.AccountNumber = accountNumber;
            this.ApplicationExpiryDate = applicationExpiryDate;
            this.PanSequenceNumber = panSequenceNumber;
            this.Track2Equivalent = track2Equivalent;
            this.De48se43Data = de48se43Data;
        }
        
        /// <summary>
        /// The Primary Account Number for the transaction – this is the Token PAN.  &lt;br&gt;__Min Length: 9__ &lt;br&gt;__Max Length: 19__ 
        /// </summary>
        /// <value>The Primary Account Number for the transaction – this is the Token PAN.  &lt;br&gt;__Min Length: 9__ &lt;br&gt;__Max Length: 19__ </value>
        [DataMember(Name="accountNumber", EmitDefaultValue=false)]
        public string AccountNumber { get; set; }

        /// <summary>
        /// Application expiry date for the Token. Expressed in YYMMDD format.  &lt;br&gt; __Length: 6__ 
        /// </summary>
        /// <value>Application expiry date for the Token. Expressed in YYMMDD format.  &lt;br&gt; __Length: 6__ </value>
        [DataMember(Name="applicationExpiryDate", EmitDefaultValue=false)]
        public string ApplicationExpiryDate { get; set; }

        /// <summary>
        /// Application PAN sequence number for the Token &lt;br&gt;  __Length: 2__ 
        /// </summary>
        /// <value>Application PAN sequence number for the Token &lt;br&gt;  __Length: 2__ </value>
        [DataMember(Name="panSequenceNumber", EmitDefaultValue=false)]
        public string PanSequenceNumber { get; set; }

        /// <summary>
        /// Track 2 equivalent data for the Token. Expressed according to ISO/IEC 7813, excluding start sentinel, end sentinel, and Longitudinal Redundancy Check (LRC), using hex nibble &#39;D&#39; as field separator, and padded to whole bytes using one hex nibble &#39;F&#39; as needed.  &lt;br&gt;   __Max Length: 38__ 
        /// </summary>
        /// <value>Track 2 equivalent data for the Token. Expressed according to ISO/IEC 7813, excluding start sentinel, end sentinel, and Longitudinal Redundancy Check (LRC), using hex nibble &#39;D&#39; as field separator, and padded to whole bytes using one hex nibble &#39;F&#39; as needed.  &lt;br&gt;   __Max Length: 38__ </value>
        [DataMember(Name="track2Equivalent", EmitDefaultValue=false)]
        public string Track2Equivalent { get; set; }

        /// <summary>
        /// Data for DE 48 Subelement 43 containing the cryptogram.&lt;br&gt; DSRP cryptogram is required to be sent in the DE104 – DPD (Digital Payment Data) field  – please refer to AN3363 bulletin for more details.&lt;br&gt; __Max Length: 32__ 
        /// </summary>
        /// <value>Data for DE 48 Subelement 43 containing the cryptogram.&lt;br&gt; DSRP cryptogram is required to be sent in the DE104 – DPD (Digital Payment Data) field  – please refer to AN3363 bulletin for more details.&lt;br&gt; __Max Length: 32__ </value>
        [DataMember(Name="de48se43Data", EmitDefaultValue=false)]
        public string De48se43Data { get; set; }

        /// <summary>
        /// Returns the string presentation of the object
        /// </summary>
        /// <returns>String presentation of the object</returns>
        public override string ToString()
        {
            var sb = new StringBuilder();
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
            return JsonConvert.SerializeObject(this, Formatting.Indented);
        }

        /// <summary>
        /// Returns true if objects are equal
        /// </summary>
        /// <param name="input">Object to be compared</param>
        /// <returns>Boolean</returns>
        public override bool Equals(object input)
        {
            return this.Equals(input as TransactEncryptedData);
        }

        /// <summary>
        /// Returns true if TransactEncryptedData instances are equal
        /// </summary>
        /// <param name="input">Instance of TransactEncryptedData to be compared</param>
        /// <returns>Boolean</returns>
        public bool Equals(TransactEncryptedData input)
        {
            if (input == null)
                return false;

            return 
                (
                    this.AccountNumber == input.AccountNumber ||
                    (this.AccountNumber != null &&
                    this.AccountNumber.Equals(input.AccountNumber))
                ) && 
                (
                    this.ApplicationExpiryDate == input.ApplicationExpiryDate ||
                    (this.ApplicationExpiryDate != null &&
                    this.ApplicationExpiryDate.Equals(input.ApplicationExpiryDate))
                ) && 
                (
                    this.PanSequenceNumber == input.PanSequenceNumber ||
                    (this.PanSequenceNumber != null &&
                    this.PanSequenceNumber.Equals(input.PanSequenceNumber))
                ) && 
                (
                    this.Track2Equivalent == input.Track2Equivalent ||
                    (this.Track2Equivalent != null &&
                    this.Track2Equivalent.Equals(input.Track2Equivalent))
                ) && 
                (
                    this.De48se43Data == input.De48se43Data ||
                    (this.De48se43Data != null &&
                    this.De48se43Data.Equals(input.De48se43Data))
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
                if (this.AccountNumber != null)
                    hashCode = hashCode * 59 + this.AccountNumber.GetHashCode();
                if (this.ApplicationExpiryDate != null)
                    hashCode = hashCode * 59 + this.ApplicationExpiryDate.GetHashCode();
                if (this.PanSequenceNumber != null)
                    hashCode = hashCode * 59 + this.PanSequenceNumber.GetHashCode();
                if (this.Track2Equivalent != null)
                    hashCode = hashCode * 59 + this.Track2Equivalent.GetHashCode();
                if (this.De48se43Data != null)
                    hashCode = hashCode * 59 + this.De48se43Data.GetHashCode();
                return hashCode;
            }
        }
    }

}
