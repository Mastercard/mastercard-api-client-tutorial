# TransactEncryptedData


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_number** | **str** | The Primary Account Number for the transaction ? this is the Token PAN.  | [optional] 
**application_expiry_date** | **str** | Application expiry date for the Token. Expressed in YYMMDD format.  | [optional] 
**pan_sequence_number** | **str** | Application PAN sequence number for the Token  | [optional] 
**track2_equivalent** | **str** | Track 2 equivalent data for the Token. Expressed according to ISO/IEC 7813, excluding start sentinel, end sentinel, and Longitudinal Redundancy Check (LRC), using hex nibble &#39;D&#39; as field separator, and padded to whole bytes using one hex nibble &#39;F&#39; as needed.  | [optional] 
**de48se43_data** | **str** | Data for DE 48 Subelement 43 containing the cryptogram. DSRP cryptogram must be sent in DE104. Please refer to AN 3363 for details.  | [optional] 

## Example

```python
from openapi_client.models.transact_encrypted_data import TransactEncryptedData

# TODO update the JSON string below
json = "{}"
# create an instance of TransactEncryptedData from a JSON string
transact_encrypted_data_instance = TransactEncryptedData.from_json(json)
# print the JSON string representation of the object
print(TransactEncryptedData.to_json())

# convert the object into a dict
transact_encrypted_data_dict = transact_encrypted_data_instance.to_dict()
# create an instance of TransactEncryptedData from a dict
transact_encrypted_data_from_dict = TransactEncryptedData.from_dict(transact_encrypted_data_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


