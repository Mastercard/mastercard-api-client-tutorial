# MdesForMerchants.GetTaskStatusRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**responseHost** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**requestId** | **String** | Unique identifier for the request.  | 
**tokenRequestorId** | **String** | 11-digit numeric ID provided by Mastercard that identifies the Token Requestor.   | 
**taskId** | **String** | Unique identifier for this task. Must be an identifier previously used when requesting a task.    __Max Length:64__  | 


