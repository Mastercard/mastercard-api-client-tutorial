# MdesForMerchants.UnSuspendResponseSchema

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**responseHost** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**responseId** | **String** | Unique identifier for the response.  | [optional] 
**tokens** | [**[TokenForLCM]**](TokenForLCM.md) |  | [optional] 
**errorCode** | **String** | __CONDITIONAL__&lt;br&gt; Returned in the event of and error and contains the reason the operation failed. Only use if errors object is not present.&lt;br&gt; __Max Length: 32__  | [optional] 
**errorDescription** | **String** | __CONDITIONAL__&lt;br&gt; Returned in the event of and error and contains a description of why the operation failed. Only use if errors object is not present. &lt;br&gt; __Max Length: 32__    | [optional] 
**errors** | [**Error**](Error.md) |  | [optional] 


