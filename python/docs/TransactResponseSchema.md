# TransactResponseSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_id** | **str** | Unique identifier for the response.  | [optional] 
**response_host** | **str** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**encrypted_payload** | [**EncryptedPayloadTransact**](EncryptedPayloadTransact.md) |  | [optional] 

## Example

```python
from openapi_client.models.transact_response_schema import TransactResponseSchema

# TODO update the JSON string below
json = "{}"
# create an instance of TransactResponseSchema from a JSON string
transact_response_schema_instance = TransactResponseSchema.from_json(json)
# print the JSON string representation of the object
print(TransactResponseSchema.to_json())

# convert the object into a dict
transact_response_schema_dict = transact_response_schema_instance.to_dict()
# create an instance of TransactResponseSchema from a dict
transact_response_schema_from_dict = TransactResponseSchema.from_dict(transact_response_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


