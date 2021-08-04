# # ErrorsResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**error_code** | **string** | **CONDITIONAL** Returned in the event of an error and contains the reason the operation failed. Only use if errors object is not present. | [optional]
**error_description** | **string** | **CONDITIONAL** Returned in the event of an error and contains a description of why the operation failed. Only use if errors object is not present. | [optional]
**response_host** | **string** | The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host. | [optional]
**response_id** | **string** | Unique identifier for the response. | [optional]
**errors** | [**\DigitalEnablementClient\Model\Error**](Error.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
