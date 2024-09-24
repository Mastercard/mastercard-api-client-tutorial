# FundingAccountInfoEncryptedPayload


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**public_key_fingerprint** | **str** | The fingerprint of the public key used to encrypt the ephemeral AES key.  | [optional] 
**encrypted_key** | **str** | One-time use AES key encrypted by the MasterCard public key (as identified by publicKeyFingerprint) using the OAEP or PKCS#1 v1.5 scheme (depending on the value of oaepHashingAlgorithm.  | [optional] 
**oaep_hashing_algorithm** | **str** | Hashing algorithm used with the OAEP scheme. Must be either SHA256 or SHA512.  | [optional] 
**iv** | **str** | The initialization vector used when encrypting data using the one-time use AES key. Must be exactly 16 bytes (32 character hex string) to match the block size. If not present, an IV of zero is assumed.  | [optional] 
**encrypted_data** | [**FundingAccountData**](FundingAccountData.md) |  | [optional] 

## Example

```python
from openapi_client.models.funding_account_info_encrypted_payload import FundingAccountInfoEncryptedPayload

# TODO update the JSON string below
json = "{}"
# create an instance of FundingAccountInfoEncryptedPayload from a JSON string
funding_account_info_encrypted_payload_instance = FundingAccountInfoEncryptedPayload.from_json(json)
# print the JSON string representation of the object
print(FundingAccountInfoEncryptedPayload.to_json())

# convert the object into a dict
funding_account_info_encrypted_payload_dict = funding_account_info_encrypted_payload_instance.to_dict()
# create an instance of FundingAccountInfoEncryptedPayload from a dict
funding_account_info_encrypted_payload_from_dict = FundingAccountInfoEncryptedPayload.from_dict(funding_account_info_encrypted_payload_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


