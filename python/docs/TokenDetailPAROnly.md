# TokenDetailPAROnly


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**token_unique_reference** | **str** | Globally unique identifier for the Token, as assigned by MDES.&lt;br&gt;  | [optional] 
**public_key_fingerprint** | **str** | The certificate fingerprint identifying the public key used to encrypt the ephemeral AES key.  | [optional] 
**encrypted_key** | **str** | One-time use AES key encrypted by the MasterCard public key (as identified by &#39;publicKeyFingerprint&#39;) using the OAEP or RSA Encryption Standard PKCS #1 v1.5 scheme (depending on the value of &#39;oaepHashingAlgorithm&#39;. Requirement is for a 128-bit key (with 256-bit key supported as an option).  | [optional] 
**oaep_hashing_algorithm** | **str** | Hashing algorithm used with the OAEP scheme. If omitted, then the RSA Encryption Standard PKCS #1 v1.5 will be used. Must be either &#39;SHA256&#39; (Use the SHA-256 algorithm) or &#39;SHA512&#39; (Use the SHA-512 algorithm).  | [optional] 
**iv** | **str** | It is recommended to supply a random initialization vector when encrypting the data using the one-time use AES key. Must be exactly 16 bytes (32 character hex string) to match the block size. Hex-encoded data (case-insensitive).  | [optional] 
**encrypted_data** | [**TokenDetailDataPAROnly**](TokenDetailDataPAROnly.md) |  | [optional] 

## Example

```python
from openapi_client.models.token_detail_par_only import TokenDetailPAROnly

# TODO update the JSON string below
json = "{}"
# create an instance of TokenDetailPAROnly from a JSON string
token_detail_par_only_instance = TokenDetailPAROnly.from_json(json)
# print the JSON string representation of the object
print(TokenDetailPAROnly.to_json())

# convert the object into a dict
token_detail_par_only_dict = token_detail_par_only_instance.to_dict()
# create an instance of TokenDetailPAROnly from a dict
token_detail_par_only_from_dict = TokenDetailPAROnly.from_dict(token_detail_par_only_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


