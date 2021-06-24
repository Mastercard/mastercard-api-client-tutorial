# Acme.App.MastercardApi.Client.Model.TransactError
Only returned in the event of an error condition for the Transact API

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**Source** | **string** | An element used to indicate the source of the issue causing this error. Must be one of  * &#39;MDES&#39;  * &#39;INPUT&#39;  | [optional] 
**ErrorCode** | **string** | A reason code or information pertaining to the error that has occurred. This will contain the error reported by the platform (e.g. authentication errors) or service (e.g. invalid TUR)  | [optional] 
**Description** | **string** | Description of the reason why the operation failed.  | [optional] 
**ReasonCode** | **string** | A reason code or information pertaining to the error that has occurred from the service (e.g. invalid TUR). See API Response Errors  | [optional] 
**ErrorDescription** | **string** | **DEPRECATED** Use description instead.  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

