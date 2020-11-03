# MdesForMerchants.EncryptedPayload

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**publicKeyFingerprint** | **String** | The fingerprint of the public key used to encrypt the ephemeral AES key.     __Max Length:64__  | 
**encryptedKey** | **String** | One-time use AES key encrypted by the MasterCard public key (as identified by publicKeyFingerprint) using the OAEP or PKCS#1 v1.5 scheme (depending on the value of oaepHashingAlgorithm.     __Max Length:512__  | 
**oaepHashingAlgorithm** | **String** | Hashing algorithm used with the OAEP scheme. Must be either SHA256 or SHA512.  | [optional] 
**iv** | **String** | The initialization vector used when encrypting data using the one-time use AES key. Must be exactly 16 bytes (32 character hex string) to match the block size. If not present, an IV of zero is assumed. Length - 32.  | [optional] 
**encryptedData** | [**NotifyTokenEncryptedPayload**](NotifyTokenEncryptedPayload.md) |  | 


