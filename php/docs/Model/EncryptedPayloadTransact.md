# # EncryptedPayloadTransact

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**public_key_fingerprint** | **string** | The fingerprint of the public key used to encrypt the ephemeral AES key. | [optional]
**encrypted_key** | **string** | One-time use AES key encrypted by the MasterCard public key (as identified by publicKeyFingerprint) using the OAEP or PKCS#1 v1.5 scheme (depending on the value of oaepHashingAlgorithm. | [optional]
**oaep_hashing_algorithm** | **string** | Hashing algorithm used with the OAEP scheme. Must be either SHA256 or SHA512. | [optional]
**iv** | **string** | The initialization vector used when encrypting data using the one-time use AES key. Must be exactly 16 bytes (32 character hex string) to match the block size. If not present, an IV of zero is assumed. | [optional]
**encrypted_data** | [**\DigitalEnablementClient\Model\TransactEncryptedData**](TransactEncryptedData.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
