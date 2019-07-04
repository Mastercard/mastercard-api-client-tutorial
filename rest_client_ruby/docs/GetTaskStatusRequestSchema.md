# SwaggerClient::GetTaskStatusRequestSchema

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**request_id** | **String** | Unique identifier for the request.  | 
**token_requestor_id** | **String** | Identifies the Token Requestor.  __Length:11__  | [optional] 
**task_id** | **String** | Unique identifier for this task. Must be an identifier previously used when requesting a task.    __Max Length:64__  | 


