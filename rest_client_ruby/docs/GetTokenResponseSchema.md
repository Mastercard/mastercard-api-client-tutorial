# SwaggerClient::GetTokenResponseSchema

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_id** | **String** | Unique identifier for the response.  | [optional] 
**token** | [**Token**](Token.md) |  | [optional] 
**token_detail** | [**TokenDetail**](TokenDetail.md) |  | [optional] 
**error_code** | **String** | __CONDITIONAL__&lt;br&gt; Returned in the event of and error and contains the reason the operation failed. Only use if errors object is not present.&lt;br&gt; __Max Length: 32__  | [optional] 
**error_description** | **String** | __CONDITIONAL__&lt;br&gt; Returned in the event of and error and contains a description of why the operation failed. Only use if errors object is not present.&lt;br&gt; __Max Length: 32__    | [optional] 
**errors** | [**Error**](Error.md) |  | [optional] 


