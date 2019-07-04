# GetTaskStatusRequestSchema

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **string** | The host that originated the request. Future calls in the same conversation may be routed to this host. | [optional] 
**request_id** | **string** | Unique identifier for the request. | 
**token_requestor_id** | **string** | Identifies the Token Requestor.  __Length:11__ | [optional] 
**task_id** | **string** | Unique identifier for this task. Must be an identifier previously used when requesting a task.    __Max Length:64__ | 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


