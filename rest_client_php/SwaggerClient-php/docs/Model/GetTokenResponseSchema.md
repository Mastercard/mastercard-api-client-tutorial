# GetTokenResponseSchema

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_id** | **string** | Unique identifier for the response. | [optional] 
**token** | [**\Swagger\Client\Model\Token**](Token.md) |  | [optional] 
**token_detail** | [**\Swagger\Client\Model\TokenDetail**](TokenDetail.md) |  | [optional] 
**error_code** | **string** | __CONDITIONAL__&lt;br&gt; Returned in the event of and error and contains the reason the operation failed. Only use if errors object is not present.&lt;br&gt; __Max Length: 32__ | [optional] 
**error_description** | **string** | __CONDITIONAL__&lt;br&gt; Returned in the event of and error and contains a description of why the operation failed. Only use if errors object is not present.&lt;br&gt; __Max Length: 32__ | [optional] 
**errors** | [**\Swagger\Client\Model\Error**](Error.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


