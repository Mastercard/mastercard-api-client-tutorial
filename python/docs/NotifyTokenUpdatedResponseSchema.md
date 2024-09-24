# NotifyTokenUpdatedResponseSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **str** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**response_id** | **str** | Unique identifier for the response.  | [optional] 

## Example

```python
from openapi_client.models.notify_token_updated_response_schema import NotifyTokenUpdatedResponseSchema

# TODO update the JSON string below
json = "{}"
# create an instance of NotifyTokenUpdatedResponseSchema from a JSON string
notify_token_updated_response_schema_instance = NotifyTokenUpdatedResponseSchema.from_json(json)
# print the JSON string representation of the object
print(NotifyTokenUpdatedResponseSchema.to_json())

# convert the object into a dict
notify_token_updated_response_schema_dict = notify_token_updated_response_schema_instance.to_dict()
# create an instance of NotifyTokenUpdatedResponseSchema from a dict
notify_token_updated_response_schema_from_dict = NotifyTokenUpdatedResponseSchema.from_dict(notify_token_updated_response_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


