# Acme.App.MastercardApi.Client.Model.TokenizeResponseSchema
## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**ResponseHost** | **string** | The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host.   | [optional] 
**ResponseId** | **string** | Unique identifier for the response.  | [optional] 
**Decision** | **string** | The tokenization decision for this digitization request. Must be either APPROVED (Digitization request was approved), DECLINED (Digitization request was declined) OR REQUIRE_ADDITIONAL_AUTHENTICATION Digitization request was approved but optionally requires additional authentication. One or more Authentication methods may be provided).  | [optional] 
**AuthenticationMethods** | [**List&lt;AuthenticationMethods&gt;**](AuthenticationMethods.md) |  | [optional] 
**TokenUniqueReference** | **string** | The unique reference allocated to the new Token. Serves as a unique identifier for all subsequent queries or management functions relating to this Token. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.    __Max Length:64__  | [optional] 
**PanUniqueReference** | **string** | The unique reference allocated to the Account Primary Account Number. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.  __Max Length:64__  | [optional] 
**ProductConfig** | [**ProductConfig**](ProductConfig.md) |  | [optional] 
**TokenInfo** | [**TokenInfo**](TokenInfo.md) |  | [optional] 
**TokenDetail** | [**TokenDetail**](TokenDetail.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

