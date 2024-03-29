# Error

Only returned in the event of an error condition.

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source** | **str** | An element used to indicate the source of the issue causing this error. Must be one of  * &#39;MDES&#39;  * &#39;INPUT&#39;  | [optional] 
**error_code** | **str** | An error code generated by the gateway if the error occurs before reaching the MDES application. maxLength: 100  | [optional] 
**description** | **str** | Description of the reason the operation failed. See API Response Errors  | [optional] 
**reason_code** | **str** | A reason code for the error that has occurred.  | [optional] 
**recoverable** | **bool** | Generated by the gateway to indicate if the request could presented again for processing. Either \&quot;TRUE\&quot; or \&quot;FALSE\&quot;  | [optional] 
**any string name** | **bool, date, datetime, dict, float, int, list, str, none_type** | any string name can be used but the value must be the correct type | [optional]

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


