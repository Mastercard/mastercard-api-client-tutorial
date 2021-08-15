# OpenapiClient::FundingAccountInfoEncryptedPayload

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **public_key_fingerprint** | **String** | The fingerprint of the public key used to encrypt the ephemeral AES key.  | [optional] |
| **encrypted_key** | **String** | One-time use AES key encrypted by the MasterCard public key (as identified by publicKeyFingerprint) using the OAEP or PKCS#1 v1.5 scheme (depending on the value of oaepHashingAlgorithm.  | [optional] |
| **oaep_hashing_algorithm** | **String** | Hashing algorithm used with the OAEP scheme. Must be either SHA256 or SHA512.  | [optional] |
| **iv** | **String** | The initialization vector used when encrypting data using the one-time use AES key. Must be exactly 16 bytes (32 character hex string) to match the block size. If not present, an IV of zero is assumed.  | [optional] |
| **encrypted_data** | [**FundingAccountData**](FundingAccountData.md) |  | [optional] |

## Example

```ruby
require 'openapi_client'

instance = OpenapiClient::FundingAccountInfoEncryptedPayload.new(
  public_key_fingerprint: 4c4ead5927f0df8117f178eea9308daa58e27c2b,
  encrypted_key: A1B2C3D4E5F6112233445566,
  oaep_hashing_algorithm: SHA512,
  iv: NA,
  encrypted_data: null
)
```

