# ErrorsResponse


## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**error_code** | **str** | **CONDITIONAL** Returned in the event of an error and contains the reason the operation failed. Only use if errors object is not present.  | [optional] 
**error_description** | **str** | **CONDITIONAL** Returned in the event of an error and contains a description of why the operation failed. Only use if errors object is not present.  | [optional] 
**response_host** | **str** | The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**response_id** | **str** | Unique identifier for the response.  | [optional] 
**errors** | [**Error**](Error.md) |  | [optional] 
**any string name** | **bool, date, datetime, dict, float, int, list, str, none_type** | any string name can be used but the value must be the correct type | [optional]

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


