# GetTaskStatusResponseSchema

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_id** | **str** | Unique identifier for the response.  | [optional] 
**response_host** | **str** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**status** | **str** | The status of the specified task. Must be either &#39;PENDING&#39; (The Task has been recieved and is pending processing), &#39;IN_PROGRESS&#39; (The task is currently in progress), &#39;COMPLETED&#39; (The task was completed successfully) or &#39;FAILED&#39; The task was processed but failed to complete successfully.     __Max Length:64__  | [optional] 
**error_code** | **str** | __CONDITIONAL__&lt;br&gt; Returned in the event of and error and contains the reason the operation failed. Only use if errors object is not present.&lt;br&gt; __Max Length: 32__  | [optional] 
**error_description** | **str** | __CONDITIONAL__&lt;br&gt; Returned in the event of and error and contains a description of why the operation failed. Only use if errors object is not present.&lt;br&gt; __Max Length: 32__    | [optional] 
**errors** | [**Error**](Error.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


