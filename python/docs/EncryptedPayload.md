# EncryptedPayload


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**public_key_fingerprint** | **str** | The fingerprint of the public key used to encrypt the ephemeral AES key.  | 
**encrypted_key** | **str** | One-time use AES key encrypted by the MasterCard public key (as identified by publicKeyFingerprint) using the OAEP or PKCS#1 v1.5 scheme (depending on the value of oaepHashingAlgorithm.  | 
**oaep_hashing_algorithm** | **str** | Hashing algorithm used with the OAEP scheme. Must be either SHA256 or SHA512.  | [optional] 
**iv** | **str** | The initialization vector used when encrypting data using the one-time use AES key. Must be exactly 16 bytes (32 character hex string) to match the block size. If not present, an IV of zero is assumed. Length - 32.  | [optional] 
**encrypted_data** | [**NotifyTokenEncryptedPayload**](NotifyTokenEncryptedPayload.md) |  | 

## Example

```python
from openapi_client.models.encrypted_payload import EncryptedPayload

# TODO update the JSON string below
json = "{}"
# create an instance of EncryptedPayload from a JSON string
encrypted_payload_instance = EncryptedPayload.from_json(json)
# print the JSON string representation of the object
print(EncryptedPayload.to_json())

# convert the object into a dict
encrypted_payload_dict = encrypted_payload_instance.to_dict()
# create an instance of EncryptedPayload from a dict
encrypted_payload_from_dict = EncryptedPayload.from_dict(encrypted_payload_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


