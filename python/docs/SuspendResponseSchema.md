# SuspendResponseSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **str** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**response_id** | **str** | Unique identifier for the response.  | [optional] 
**tokens** | [**List[TokenForLCM]**](TokenForLCM.md) |  | [optional] 

## Example

```python
from openapi_client.models.suspend_response_schema import SuspendResponseSchema

# TODO update the JSON string below
json = "{}"
# create an instance of SuspendResponseSchema from a JSON string
suspend_response_schema_instance = SuspendResponseSchema.from_json(json)
# print the JSON string representation of the object
print(SuspendResponseSchema.to_json())

# convert the object into a dict
suspend_response_schema_dict = suspend_response_schema_instance.to_dict()
# create an instance of SuspendResponseSchema from a dict
suspend_response_schema_from_dict = SuspendResponseSchema.from_dict(suspend_response_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


