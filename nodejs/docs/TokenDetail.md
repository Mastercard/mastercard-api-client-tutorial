# MdesForMerchants.TokenDetail

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**tokenUniqueReference** | **String** | Globally unique identifier for the Token, as assigned by MDES.&lt;br&gt;     __Max Length:64__  | [optional] 
**publicKeyFingerprint** | **String** | The certificate fingerprint identifying the public key used to encrypt the ephemeral AES key.&lt;br&gt;     __Max Length:64__ Hex-encoded data (case-insensitive).  | [optional] 
**encryptedKey** | **String** | One-time use AES key encrypted by the MasterCard public key (as identified by &#39;publicKeyFingerprint&#39;) using the OAEP or RSA Encryption Standard PKCS #1 v1.5 scheme (depending on the value of &#39;oaepHashingAlgorithm&#39;. Requirement is for a 128-bit key (with 256-bit key supported as an option).&lt;br&gt;     __Max Length:512__  | [optional] 
**oaepHashingAlgorithm** | **String** | Hashing algorithm used with the OAEP scheme. If omitted, then the RSA Encryption Standard PKCS #1 v1.5 will be used. Must be either &#39;SHA256&#39; (Use the SHA-256 algorithm) or &#39;SHA512&#39; (Use the SHA-512 algorithm).&lt;br&gt;     __Max Length:6__  | [optional] 
**iv** | **String** | It is recommended to supply a random initialization vector when encrypting the data using the one-time use AES key. Must be exactly 16 bytes (32 character hex string) to match the block size. Hex-encoded data (case-insensitive).  __Max Length:32__  | [optional] 
**encryptedData** | [**TokenDetailData**](TokenDetailData.md) |  | [optional] 


