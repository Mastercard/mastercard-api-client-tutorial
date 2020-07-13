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
    /// FundingAccountInfoEncryptedPayload
    /// </summary>
    [DataContract]
    public partial class FundingAccountInfoEncryptedPayload :  IEquatable<FundingAccountInfoEncryptedPayload>
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="FundingAccountInfoEncryptedPayload" /> class.
        /// </summary>
        /// <param name="publicKeyFingerprint">The fingerprint of the public key used to encrypt the ephemeral AES key.&lt;br&gt; __Max Length: 64__ .</param>
        /// <param name="encryptedKey">One-time use AES key encrypted by the MasterCard public key (as identified by publicKeyFingerprint) using the OAEP or PKCS#1 v1.5 scheme (depending on the value of oaepHashingAlgorithm. &lt;br&gt; __Max Length: 512__ .</param>
        /// <param name="oaepHashingAlgorithm">Hashing algorithm used with the OAEP scheme. Must be either SHA256 or SHA512. .</param>
        /// <param name="iv">The initialization vector used when encrypting data using the one-time use AES key. Must be exactly 16 bytes (32 character hex string) to match the block size. If not present, an IV of zero is assumed.  &lt;br&gt;__Length: 32__ .</param>
        /// <param name="encryptedData">encryptedData.</param>
        public FundingAccountInfoEncryptedPayload(string publicKeyFingerprint = default(string), string encryptedKey = default(string), string oaepHashingAlgorithm = default(string), string iv = default(string), FundingAccountData encryptedData = default(FundingAccountData))
        {
            this.PublicKeyFingerprint = publicKeyFingerprint;
            this.EncryptedKey = encryptedKey;
            this.OaepHashingAlgorithm = oaepHashingAlgorithm;
            this.Iv = iv;
            this.EncryptedData = encryptedData;
        }
        
        /// <summary>
        /// The fingerprint of the public key used to encrypt the ephemeral AES key.&lt;br&gt; __Max Length: 64__ 
        /// </summary>
        /// <value>The fingerprint of the public key used to encrypt the ephemeral AES key.&lt;br&gt; __Max Length: 64__ </value>
        [DataMember(Name="publicKeyFingerprint", EmitDefaultValue=false)]
        public string PublicKeyFingerprint { get; set; }

        /// <summary>
        /// One-time use AES key encrypted by the MasterCard public key (as identified by publicKeyFingerprint) using the OAEP or PKCS#1 v1.5 scheme (depending on the value of oaepHashingAlgorithm. &lt;br&gt; __Max Length: 512__ 
        /// </summary>
        /// <value>One-time use AES key encrypted by the MasterCard public key (as identified by publicKeyFingerprint) using the OAEP or PKCS#1 v1.5 scheme (depending on the value of oaepHashingAlgorithm. &lt;br&gt; __Max Length: 512__ </value>
        [DataMember(Name="encryptedKey", EmitDefaultValue=false)]
        public string EncryptedKey { get; set; }

        /// <summary>
        /// Hashing algorithm used with the OAEP scheme. Must be either SHA256 or SHA512. 
        /// </summary>
        /// <value>Hashing algorithm used with the OAEP scheme. Must be either SHA256 or SHA512. </value>
        [DataMember(Name="oaepHashingAlgorithm", EmitDefaultValue=false)]
        public string OaepHashingAlgorithm { get; set; }

        /// <summary>
        /// The initialization vector used when encrypting data using the one-time use AES key. Must be exactly 16 bytes (32 character hex string) to match the block size. If not present, an IV of zero is assumed.  &lt;br&gt;__Length: 32__ 
        /// </summary>
        /// <value>The initialization vector used when encrypting data using the one-time use AES key. Must be exactly 16 bytes (32 character hex string) to match the block size. If not present, an IV of zero is assumed.  &lt;br&gt;__Length: 32__ </value>
        [DataMember(Name="iv", EmitDefaultValue=false)]
        public string Iv { get; set; }

        /// <summary>
        /// Gets or Sets EncryptedData
        /// </summary>
        [DataMember(Name="encryptedData", EmitDefaultValue=false)]
        public FundingAccountData EncryptedData { get; set; }

        /// <summary>
        /// Returns the string presentation of the object
        /// </summary>
        /// <returns>String presentation of the object</returns>
        public override string ToString()
        {
            var sb = new StringBuilder();
            sb.Append("class FundingAccountInfoEncryptedPayload {\n");
            sb.Append("  PublicKeyFingerprint: ").Append(PublicKeyFingerprint).Append("\n");
            sb.Append("  EncryptedKey: ").Append(EncryptedKey).Append("\n");
            sb.Append("  OaepHashingAlgorithm: ").Append(OaepHashingAlgorithm).Append("\n");
            sb.Append("  Iv: ").Append(Iv).Append("\n");
            sb.Append("  EncryptedData: ").Append(EncryptedData).Append("\n");
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
            return this.Equals(input as FundingAccountInfoEncryptedPayload);
        }

        /// <summary>
        /// Returns true if FundingAccountInfoEncryptedPayload instances are equal
        /// </summary>
        /// <param name="input">Instance of FundingAccountInfoEncryptedPayload to be compared</param>
        /// <returns>Boolean</returns>
        public bool Equals(FundingAccountInfoEncryptedPayload input)
        {
            if (input == null)
                return false;

            return 
                (
                    this.PublicKeyFingerprint == input.PublicKeyFingerprint ||
                    (this.PublicKeyFingerprint != null &&
                    this.PublicKeyFingerprint.Equals(input.PublicKeyFingerprint))
                ) && 
                (
                    this.EncryptedKey == input.EncryptedKey ||
                    (this.EncryptedKey != null &&
                    this.EncryptedKey.Equals(input.EncryptedKey))
                ) && 
                (
                    this.OaepHashingAlgorithm == input.OaepHashingAlgorithm ||
                    (this.OaepHashingAlgorithm != null &&
                    this.OaepHashingAlgorithm.Equals(input.OaepHashingAlgorithm))
                ) && 
                (
                    this.Iv == input.Iv ||
                    (this.Iv != null &&
                    this.Iv.Equals(input.Iv))
                ) && 
                (
                    this.EncryptedData == input.EncryptedData ||
                    (this.EncryptedData != null &&
                    this.EncryptedData.Equals(input.EncryptedData))
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
                if (this.PublicKeyFingerprint != null)
                    hashCode = hashCode * 59 + this.PublicKeyFingerprint.GetHashCode();
                if (this.EncryptedKey != null)
                    hashCode = hashCode * 59 + this.EncryptedKey.GetHashCode();
                if (this.OaepHashingAlgorithm != null)
                    hashCode = hashCode * 59 + this.OaepHashingAlgorithm.GetHashCode();
                if (this.Iv != null)
                    hashCode = hashCode * 59 + this.Iv.GetHashCode();
                if (this.EncryptedData != null)
                    hashCode = hashCode * 59 + this.EncryptedData.GetHashCode();
                return hashCode;
            }
        }
    }

}
