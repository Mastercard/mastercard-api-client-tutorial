# GetTaskStatusRequestSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **str** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**request_id** | **str** | Unique identifier for the request.  | 
**token_requestor_id** | **str** | 11-digit numeric ID provided by Mastercard that identifies the Token Requestor.  | 
**task_id** | **str** | Unique identifier for this task. Must be an identifier previously used when requesting a task.  | 

## Example

```python
from openapi_client.models.get_task_status_request_schema import GetTaskStatusRequestSchema

# TODO update the JSON string below
json = "{}"
# create an instance of GetTaskStatusRequestSchema from a JSON string
get_task_status_request_schema_instance = GetTaskStatusRequestSchema.from_json(json)
# print the JSON string representation of the object
print(GetTaskStatusRequestSchema.to_json())

# convert the object into a dict
get_task_status_request_schema_dict = get_task_status_request_schema_instance.to_dict()
# create an instance of GetTaskStatusRequestSchema from a dict
get_task_status_request_schema_from_dict = GetTaskStatusRequestSchema.from_dict(get_task_status_request_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


