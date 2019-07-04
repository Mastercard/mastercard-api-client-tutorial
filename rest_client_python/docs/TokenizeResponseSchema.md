# TokenizeResponseSchema

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **str** | The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host.   | [optional] 
**response_id** | **str** | Unique identifier for the response.  | [optional] 
**decision** | **str** | The tokenization decision for this digitization request. Must be either APPROVED (Digitization request was approved), DECLINED (Digitization request was declined) OR REQUIRE_ADDITIONAL_AUTHENTICATION Digitization request was approved but optionally requires additional authentication. One or more Authentication methods may be provided).  | [optional] 
**authentication_methods** | [**list[AuthenticationMethods]**](AuthenticationMethods.md) |  | [optional] 
**token_unique_reference** | **str** | The unique reference allocated to the new Token. Serves as a unique identifier for all subsequent queries or management functions relating to this Token. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.    __Max Length:64__  | [optional] 
**pan_unique_reference** | **str** | The unique reference allocated to the Account Primary Account Number. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.  __Max Length:64__  | [optional] 
**product_config** | [**ProductConfig**](ProductConfig.md) |  | [optional] 
**token_info** | [**TokenInfo**](TokenInfo.md) |  | [optional] 
**token_detail** | [**TokenDetailTokenizeResponse**](TokenDetailTokenizeResponse.md) |  | [optional] 
**error_code** | **str** | __CONDITIONAL__&lt;br&gt; Returned in the event of and error and contains the reason the operation failed. Only use if errors object is not present.&lt;br&gt; __Max Length: 32__  | [optional] 
**error_description** | **str** | __CONDITIONAL__&lt;br&gt; Returned in the event of and error and contains a description of why the operation failed. Only use if errors object is not present.&lt;br&gt; __Max Length: 32__    | [optional] 
**errors** | [**Error**](Error.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


