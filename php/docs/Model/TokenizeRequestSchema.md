# # TokenizeRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **string** | \&quot;The host that originated the request. Future calls in the same conversation may be routed to this host. Must be provided as: host[:port][/contextRoot] Where port and contextRoot are optional. If contextRoot is not provided, the default (per the URL Scheme) is assumed and must be used.\&quot; | [optional] 
**request_id** | **string** | Unique identifier for the request. | [optional] 
**token_type** | **string** | The type of Token requested. Must be CLOUD       __Max Length:32__ | 
**token_requestor_id** | **string** | 11-digit numeric ID provided by Mastercard that identifies the Token Requestor. | 
**task_id** | **string** | Identifier for this task as assigned by the Token Requestor, unique across a given Token Requestor Identifier. May be used in the Get Task Status API to query the status of this task.      __Max Length:64__ | 
**funding_account_info** | [**\DigitalEnablementClient\Model\FundingAccountInfo**](FundingAccountInfo.md) |  | 
**consumer_language** | **string** | Language preference selected by the consumer. Formatted as an ISO- 639-1 two-letter language code.    __Max Length:2__ | [optional] 
**tokenization_authentication_value** | **string** | The Tokenization Authentication Value (TAV) as cryptographically signed by the Issuer to authorize this digitization request.      __Max Length:2048__ | [optional] 
**decisioning_data** | [**\DigitalEnablementClient\Model\DecisioningData**](DecisioningData.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


