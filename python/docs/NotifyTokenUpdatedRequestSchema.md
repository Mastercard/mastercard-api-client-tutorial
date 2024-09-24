# NotifyTokenUpdatedRequestSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **str** | The host that originated the request. Future calls in the same conversation should be routed to this host.  | 
**request_id** | **str** | Unique identifier for the request.  | 
**encrypted_payload** | [**EncryptedPayload**](EncryptedPayload.md) |  | 

## Example

```python
from openapi_client.models.notify_token_updated_request_schema import NotifyTokenUpdatedRequestSchema

# TODO update the JSON string below
json = "{}"
# create an instance of NotifyTokenUpdatedRequestSchema from a JSON string
notify_token_updated_request_schema_instance = NotifyTokenUpdatedRequestSchema.from_json(json)
# print the JSON string representation of the object
print(NotifyTokenUpdatedRequestSchema.to_json())

# convert the object into a dict
notify_token_updated_request_schema_dict = notify_token_updated_request_schema_instance.to_dict()
# create an instance of NotifyTokenUpdatedRequestSchema from a dict
notify_token_updated_request_schema_from_dict = NotifyTokenUpdatedRequestSchema.from_dict(notify_token_updated_request_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


