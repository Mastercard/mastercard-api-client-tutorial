# FundingAccountInfoEncryptedPayload

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**public_key_fingerprint** | **string** | The fingerprint of the public key used to encrypt the ephemeral AES key.&lt;br&gt; __Max Length: 64__ | [optional] 
**encrypted_key** | **string** | One-time use AES key encrypted by the MasterCard public key (as identified by publicKeyFingerprint) using the OAEP or PKCS#1 v1.5 scheme (depending on the value of oaepHashingAlgorithm. &lt;br&gt; __Max Length: 512__ | [optional] 
**oaep_hashing_algorithm** | **string** | Hashing algorithm used with the OAEP scheme. Must be either SHA256 or SHA512. | [optional] 
**iv** | **string** | The initialization vector used when encrypting data using the one-time use AES key. Must be exactly 16 bytes (32 character hex string) to match the block size. If not present, an IV of zero is assumed.  &lt;br&gt;__Length: 32__ | [optional] 
**encrypted_data** | [**\Swagger\Client\Model\FundingAccountData**](FundingAccountData.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


