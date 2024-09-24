# TokenizeRequestSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **str** | \&quot;The host that originated the request. Future calls in the same conversation may be routed to this host. Must be provided as: host[:port][/contextRoot] Where port and contextRoot are optional. If contextRoot is not provided, the default (per the URL Scheme) is assumed and must be used.\&quot;  | [optional] 
**request_id** | **str** | Unique identifier for the request.  | [optional] 
**token_type** | **str** | The type of Token requested. Must be CLOUD  | 
**token_requestor_id** | **str** | 11-digit numeric ID provided by Mastercard that identifies the Token Requestor.  | 
**task_id** | **str** | Identifier for this task as assigned by the Token Requestor, unique across a given Token Requestor Identifier. May be used in the Get Task Status API to query the status of this task.  | 
**funding_account_info** | [**FundingAccountInfo**](FundingAccountInfo.md) |  | 
**consumer_language** | **str** | Language preference selected by the consumer. Formatted as an ISO- 639-1 two-letter language code.  | [optional] 
**tokenization_authentication_value** | **str** | The Tokenization Authentication Value (TAV) as cryptographically signed by the Issuer to authorize this digitization request.  | [optional] 
**decisioning_data** | [**DecisioningData**](DecisioningData.md) |  | [optional] 

## Example

```python
from openapi_client.models.tokenize_request_schema import TokenizeRequestSchema

# TODO update the JSON string below
json = "{}"
# create an instance of TokenizeRequestSchema from a JSON string
tokenize_request_schema_instance = TokenizeRequestSchema.from_json(json)
# print the JSON string representation of the object
print(TokenizeRequestSchema.to_json())

# convert the object into a dict
tokenize_request_schema_dict = tokenize_request_schema_instance.to_dict()
# create an instance of TokenizeRequestSchema from a dict
tokenize_request_schema_from_dict = TokenizeRequestSchema.from_dict(tokenize_request_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


