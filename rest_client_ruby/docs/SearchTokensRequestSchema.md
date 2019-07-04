# SwaggerClient::SearchTokensRequestSchema

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**request_id** | **String** | Unique identifier for the request.  | 
**response_host** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**card_info** | [**CardInfo**](CardInfo.md) |  | [optional] 
**token_requestor_id** | **String** | Identifies the Token Requestor. Only tokens associated with the token requestor will be returned. Length - 11.   | [optional] 


