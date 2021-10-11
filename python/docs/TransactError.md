# TransactError

Only returned in the event of an error condition for the Transact API

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source** | **str** | An element used to indicate the source of the issue causing this error. Must be one of  * &#39;MDES&#39;  * &#39;INPUT&#39;  | [optional] 
**error_code** | **str** | A reason code or information pertaining to the error that has occurred. This will contain the error reported by the platform (e.g. authentication errors) or service (e.g. invalid TUR)  | [optional] 
**description** | **str** | Description of the reason why the operation failed.  | [optional] 
**reason_code** | **str** | A reason code or information pertaining to the error that has occurred from the service (e.g. invalid TUR). See API Response Errors  | [optional] 
**error_description** | **str** | **DEPRECATED** Use description instead.  | [optional] 
**any string name** | **bool, date, datetime, dict, float, int, list, str, none_type** | any string name can be used but the value must be the correct type | [optional]

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


