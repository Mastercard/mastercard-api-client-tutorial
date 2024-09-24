# EncryptedPayloadTransact


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**public_key_fingerprint** | **str** | The fingerprint of the public key used to encrypt the ephemeral AES key.  | [optional] 
**encrypted_key** | **str** | One-time use AES key encrypted by the MasterCard public key (as identified by publicKeyFingerprint) using the OAEP or PKCS#1 v1.5 scheme (depending on the value of oaepHashingAlgorithm.  | [optional] 
**oaep_hashing_algorithm** | **str** | Hashing algorithm used with the OAEP scheme. Must be either SHA256 or SHA512.  | [optional] 
**iv** | **str** | The initialization vector used when encrypting data using the one-time use AES key. Must be exactly 16 bytes (32 character hex string) to match the block size. If not present, an IV of zero is assumed.  | [optional] 
**encrypted_data** | [**TransactEncryptedData**](TransactEncryptedData.md) |  | [optional] 

## Example

```python
from openapi_client.models.encrypted_payload_transact import EncryptedPayloadTransact

# TODO update the JSON string below
json = "{}"
# create an instance of EncryptedPayloadTransact from a JSON string
encrypted_payload_transact_instance = EncryptedPayloadTransact.from_json(json)
# print the JSON string representation of the object
print(EncryptedPayloadTransact.to_json())

# convert the object into a dict
encrypted_payload_transact_dict = encrypted_payload_transact_instance.to_dict()
# create an instance of EncryptedPayloadTransact from a dict
encrypted_payload_transact_from_dict = EncryptedPayloadTransact.from_dict(encrypted_payload_transact_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


