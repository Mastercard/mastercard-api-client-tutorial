# TransactError

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source** | **str** | An element used to indicate the source of the issue causing this error. Must be one of   * &#39;MDES&#39;  * &#39;INPUT&#39; &lt;br&gt; __Max Length: 32__  | [optional] 
**error_code** | **str** | A reason code or information pertaining to the error that has occurred. This will contain the error reported by the platform (e.g. authentication errors) or service (e.g. invalid TUR)&lt;br&gt; __Max Length: 100__  | [optional] 
**description** | **str** | Description of the reason why the operation failed. &lt;br&gt; __Max Length: 256__  | [optional] 
**reason_code** | **str** | A reason code or information pertaining to the error that has occurred from the service (e.g. invalid TUR). See API Response Errors&lt;br&gt; __Max Length: 100__          | [optional] 
**error_description** | **str** | __DEPRECATED__&lt;br&gt; Use description instead.&lt;br&gt; __Max Length: 100__   | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


