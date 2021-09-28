# GetTaskStatusRequestSchema


## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**request_id** | **str** | Unique identifier for the request.  | 
**token_requestor_id** | **str** | 11-digit numeric ID provided by Mastercard that identifies the Token Requestor.  | 
**task_id** | **str** | Unique identifier for this task. Must be an identifier previously used when requesting a task.  | 
**response_host** | **str** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**any string name** | **bool, date, datetime, dict, float, int, list, str, none_type** | any string name can be used but the value must be the correct type | [optional]

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


