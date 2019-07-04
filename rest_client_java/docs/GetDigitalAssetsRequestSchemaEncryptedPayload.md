
# GetDigitalAssetsRequestSchemaEncryptedPayload

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**publicKeyFingerprint** | **String** | The fingerpint of the public key used to encrypt the ephemeral AES key. __Max Length:64__  | 
**encryptedKey** | **String** | One-time use AES key encrypted by the Mastercard public key (as identified by publicKeyFingerprint) using the OEAP or PKCS#1 v1.5 scheme (depending on the value of oeapHashingAlgorithm.) __Max Length:512__  | 
**oaepHashingAlgorithm** | **String** | Hashing algorithm used with the OAEP scheme. Must be either SHA256 or SHA512.  |  [optional]
**encryptedData** | [**GetDigitalAssetsEncryptedData**](GetDigitalAssetsEncryptedData.md) |  | 



