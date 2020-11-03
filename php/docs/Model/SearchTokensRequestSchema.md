# # SearchTokensRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**request_id** | **string** | Unique identifier for the request. | 
**response_host** | **string** | The host that originated the request. Future calls in the same conversation may be routed to this host. | [optional] 
**funding_account_info** | [**\DigitalEnablementClient\Model\FundingAccountInfo**](FundingAccountInfo.md) |  | [optional] 
**token_requestor_id** | **string** | Identifies the Token Requestor. Only tokens associated with the token requestor will be returned. Length - 11. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


