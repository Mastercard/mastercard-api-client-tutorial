# GetDigitalAssetsRequestSchemaEncryptedPayload

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**public_key_fingerprint** | **str** | The fingerpint of the public key used to encrypt the ephemeral AES key. __Max Length:64__  | 
**encrypted_key** | **str** | One-time use AES key encrypted by the Mastercard public key (as identified by publicKeyFingerprint) using the OEAP or PKCS#1 v1.5 scheme (depending on the value of oeapHashingAlgorithm.) __Max Length:512__  | 
**oaep_hashing_algorithm** | **str** | Hashing algorithm used with the OAEP scheme. Must be either SHA256 or SHA512.  | [optional] 
**encrypted_data** | [**GetDigitalAssetsEncryptedData**](GetDigitalAssetsEncryptedData.md) |  | 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


