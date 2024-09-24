# TransactRequestSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **str** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**request_id** | **str** | Unique identifier for the request.  | 
**token_unique_reference** | **str** | Globally unique identifier for the Token, as assigned by MDES.  | 
**dsrp_type** | **str** | What type of DSRP cryptogram to create. Must be UCAF.  | 
**unpredictable_number** | **str** | HEX Encoded data (case sensitive) provided by the merchant to provide variability and uniqueness to the generation of a cryptogram.  | [optional] 

## Example

```python
from openapi_client.models.transact_request_schema import TransactRequestSchema

# TODO update the JSON string below
json = "{}"
# create an instance of TransactRequestSchema from a JSON string
transact_request_schema_instance = TransactRequestSchema.from_json(json)
# print the JSON string representation of the object
print(TransactRequestSchema.to_json())

# convert the object into a dict
transact_request_schema_dict = transact_request_schema_instance.to_dict()
# create an instance of TransactRequestSchema from a dict
transact_request_schema_from_dict = TransactRequestSchema.from_dict(transact_request_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


