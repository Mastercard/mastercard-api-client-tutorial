# TokenizeRequestSchema


## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**token_type** | **str** | The type of Token requested. Must be CLOUD  | 
**token_requestor_id** | **str** | 11-digit numeric ID provided by Mastercard that identifies the Token Requestor.  | 
**task_id** | **str** | Identifier for this task as assigned by the Token Requestor, unique across a given Token Requestor Identifier. May be used in the Get Task Status API to query the status of this task.  | 
**funding_account_info** | [**FundingAccountInfo**](FundingAccountInfo.md) |  | 
**response_host** | **str** | \&quot;The host that originated the request. Future calls in the same conversation may be routed to this host. Must be provided as: host[:port][/contextRoot] Where port and contextRoot are optional. If contextRoot is not provided, the default (per the URL Scheme) is assumed and must be used.\&quot;  | [optional] 
**request_id** | **str** | Unique identifier for the request.  | [optional] 
**consumer_language** | **str** | Language preference selected by the consumer. Formatted as an ISO- 639-1 two-letter language code.  | [optional] 
**tokenization_authentication_value** | **str** | The Tokenization Authentication Value (TAV) as cryptographically signed by the Issuer to authorize this digitization request.  | [optional] 
**decisioning_data** | [**DecisioningData**](DecisioningData.md) |  | [optional] 
**any string name** | **bool, date, datetime, dict, float, int, list, str, none_type** | any string name can be used but the value must be the correct type | [optional]

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


