# MdesForMerchants.TokenizeResponseSchema

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**responseHost** | **String** | The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host.   | [optional] 
**responseId** | **String** | Unique identifier for the response.  | [optional] 
**decision** | **String** | The tokenization decision for this digitization request. Must be either APPROVED (Digitization request was approved), DECLINED (Digitization request was declined) OR REQUIRE_ADDITIONAL_AUTHENTICATION Digitization request was approved but optionally requires additional authentication. One or more Authentication methods may be provided).  | [optional] 
**authenticationMethods** | [**[AuthenticationMethods]**](AuthenticationMethods.md) |  | [optional] 
**tokenUniqueReference** | **String** | The unique reference allocated to the new Token. Serves as a unique identifier for all subsequent queries or management functions relating to this Token. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.    __Max Length:64__  | [optional] 
**panUniqueReference** | **String** | The unique reference allocated to the Account Primary Account Number. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.  __Max Length:64__  | [optional] 
**productConfig** | [**ProductConfig**](ProductConfig.md) |  | [optional] 
**tokenInfo** | [**TokenInfo**](TokenInfo.md) |  | [optional] 
**tokenDetail** | [**TokenDetailTokenizeResponse**](TokenDetailTokenizeResponse.md) |  | [optional] 
**errorCode** | **String** | __CONDITIONAL__&lt;br&gt; Returned in the event of and error and contains the reason the operation failed. Only use if errors object is not present.&lt;br&gt; __Max Length: 32__  | [optional] 
**errorDescription** | **String** | __CONDITIONAL__&lt;br&gt; Returned in the event of and error and contains a description of why the operation failed. Only use if errors object is not present.&lt;br&gt; __Max Length: 32__    | [optional] 
**errors** | [**Error**](Error.md) |  | [optional] 


