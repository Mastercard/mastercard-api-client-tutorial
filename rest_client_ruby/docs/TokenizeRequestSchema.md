# SwaggerClient::TokenizeRequestSchema

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **String** | \&quot;The host that originated the request. Future calls in the same conversation may be routed to this host. Must be provided as: host[:port][/contextRoot] Where port and contextRoot are optional. If contextRoot is not provided, the default (per the URL Scheme) is assumed and must be used.\&quot;  | [optional] 
**request_id** | **String** | Unique identifier for the request.  | [optional] 
**token_type** | **String** | The type of Token requested. Must be CLOUD       __Max Length:32__     | 
**token_requestor_id** | **String** | Identifies the Token Requestor       __Max Length:11__   | 
**task_id** | **String** | Identifier for this task as assigned by the Token Requestor, unique across a given Token Requestor Identifier. May be used in the Get Task Status API to query the status of this task.      __Max Length:64__  | 
**card_info** | [**CardInfo**](CardInfo.md) |  | 
**consumer_language** | **String** | Language preference selected by the consumer. Formatted as an ISO- 639-1 two-letter language code.    __Max Length:2__  | [optional] 
**tokenization_authentication_value** | **String** | The Tokenization Authentication Value (TAV) as cryptographically signed by the Issuer to authorize this digitization request.      __Max Length:2048__  | [optional] 
**decisioning_data** | [**DecisioningData**](DecisioningData.md) |  | [optional] 


