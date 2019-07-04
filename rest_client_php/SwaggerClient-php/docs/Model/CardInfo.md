# CardInfo

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**pan_unique_reference** | **string** | __(CONDITIONAL)__ &lt;br&gt;  For repeat digitizations, the unique reference allocated to the Primary Account Number. When supplied, the tokenUniqueReferenceForPanInfo, accountNumber, expiryMonth and expiryYear must be omitted from CardInfoData.   Only allowed if  tokenUniqueReferenceForPanInfo is not present and encrypted data does not contain the account information. &lt;br&gt; __Max Length:64__ | [optional] 
**token_unique_reference_for_pan_info** | **string** | __(CONDITIONAL)__&lt;br&gt;  For repeat digitizations, the unique reference allocated to the token will be used to retrieve the account number and expiration date. When supplied, the panUniqueReference, accountNumber, expiryMonth and expiryYear must be omitted from CardInfoData.    Only allowed if panUniqueReference is not present and encrypted data does not contain the account information. &lt;br&gt; __Max Length:64__ | [optional] 
**public_key_fingerprint** | **string** | The fingerprint of the public key used to encrypt the ephemeral AES key. Required if encryptedData is present.&lt;br&gt;     __Max Length:64__ Hex-encoded data (case-insensitive). | [optional] 
**encrypted_key** | **string** | One-time use AES key encrypted by the MasterCard public key (as identified by &#39;publicKeyFingerprint&#39;) using the OAEP or RSA Encryption Standard PKCS #1 v1.5  (depending on the value of &#39;oaepHashingAlgorithm&#39;. Requirement is for a 128-bit key (with 256-bit key supported as an option). Required if encrypted data is present. &lt;br&gt;   __Max Length:512__ Hex-encoded data (case-insensitive).\&quot; | [optional] 
**oaep_hashing_algorithm** | **string** | Hashing algorithm used with the OAEP scheme. Must be either SHA256 or SHA512.     __Max Length:6__ | [optional] 
**iv** | **string** | It is recommended to supply a random initialization vector when encrypting the data using the one-time use AES key. Must be exactly 16 bytes (32 character hex string) to match the block size. Hex-encoded data (case-insensitive).  &lt;br&gt;__Max Length:32__ | [optional] 
**encrypted_data** | [**\Swagger\Client\Model\CardInfoData**](CardInfoData.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


