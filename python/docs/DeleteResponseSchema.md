# DeleteResponseSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **str** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**response_id** | **str** | Unique identifier for the response.  | [optional] 
**tokens** | [**List[TokenForLCM]**](TokenForLCM.md) |  | [optional] 

## Example

```python
from openapi_client.models.delete_response_schema import DeleteResponseSchema

# TODO update the JSON string below
json = "{}"
# create an instance of DeleteResponseSchema from a JSON string
delete_response_schema_instance = DeleteResponseSchema.from_json(json)
# print the JSON string representation of the object
print(DeleteResponseSchema.to_json())

# convert the object into a dict
delete_response_schema_dict = delete_response_schema_instance.to_dict()
# create an instance of DeleteResponseSchema from a dict
delete_response_schema_from_dict = DeleteResponseSchema.from_dict(delete_response_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


