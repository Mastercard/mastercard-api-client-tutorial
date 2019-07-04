
# GetTaskStatusRequestSchema

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**responseHost** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  |  [optional]
**requestId** | **String** | Unique identifier for the request.  | 
**tokenRequestorId** | **String** | Identifies the Token Requestor.  __Length:11__  |  [optional]
**taskId** | **String** | Unique identifier for this task. Must be an identifier previously used when requesting a task.    __Max Length:64__  | 



