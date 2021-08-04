# # TransactError

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source** | **string** | An element used to indicate the source of the issue causing this error. Must be one of  * &#39;MDES&#39;  * &#39;INPUT&#39; | [optional]
**error_code** | **string** | A reason code or information pertaining to the error that has occurred. This will contain the error reported by the platform (e.g. authentication errors) or service (e.g. invalid TUR) | [optional]
**description** | **string** | Description of the reason why the operation failed. | [optional]
**reason_code** | **string** | A reason code or information pertaining to the error that has occurred from the service (e.g. invalid TUR). See API Response Errors | [optional]
**error_description** | **string** | **DEPRECATED** Use description instead. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
