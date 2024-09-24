# GetTaskStatusResponseSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_id** | **str** | Unique identifier for the response.  | [optional] 
**response_host** | **str** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**status** | **str** | The status of the specified task. Must be either &#39;PENDING&#39; (The Task has been recieved and is pending processing), &#39;IN_PROGRESS&#39; (The task is currently in progress), &#39;COMPLETED&#39; (The task was completed successfully) or &#39;FAILED&#39; The task was processed but failed to complete successfully.  | [optional] 

## Example

```python
from openapi_client.models.get_task_status_response_schema import GetTaskStatusResponseSchema

# TODO update the JSON string below
json = "{}"
# create an instance of GetTaskStatusResponseSchema from a JSON string
get_task_status_response_schema_instance = GetTaskStatusResponseSchema.from_json(json)
# print the JSON string representation of the object
print(GetTaskStatusResponseSchema.to_json())

# convert the object into a dict
get_task_status_response_schema_dict = get_task_status_response_schema_instance.to_dict()
# create an instance of GetTaskStatusResponseSchema from a dict
get_task_status_response_schema_from_dict = GetTaskStatusResponseSchema.from_dict(get_task_status_response_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


