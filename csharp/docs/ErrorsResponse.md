# Acme.App.MastercardApi.Client.Model.ErrorsResponse
## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**ErrorCode** | **string** | __CONDITIONAL__&lt;br&gt; Returned in the event of an error and contains the reason the operation failed. Only use if errors object is not present. &lt;br&gt; __Max Length: 32__  | [optional] 
**ErrorDescription** | **string** | __CONDITIONAL__&lt;br&gt; Returned in the event of an error and contains a description of why the operation failed. Only use if errors object is not present. &lt;br&gt; __Max Length: 32__   | [optional] 
**ResponseHost** | **string** | The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host.   | [optional] 
**ResponseId** | **string** | Unique identifier for the response.  | [optional] 
**Errors** | [**Error**](Error.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

