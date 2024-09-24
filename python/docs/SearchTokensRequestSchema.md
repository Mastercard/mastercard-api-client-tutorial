# SearchTokensRequestSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**request_id** | **str** | Unique identifier for the request.  | 
**response_host** | **str** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**funding_account_info** | [**FundingAccountInfo**](FundingAccountInfo.md) |  | [optional] 
**token_requestor_id** | **str** | Identifies the Token Requestor. Only tokens associated with the token requestor will be returned. Length - 11.  | [optional] 

## Example

```python
from openapi_client.models.search_tokens_request_schema import SearchTokensRequestSchema

# TODO update the JSON string below
json = "{}"
# create an instance of SearchTokensRequestSchema from a JSON string
search_tokens_request_schema_instance = SearchTokensRequestSchema.from_json(json)
# print the JSON string representation of the object
print(SearchTokensRequestSchema.to_json())

# convert the object into a dict
search_tokens_request_schema_dict = search_tokens_request_schema_instance.to_dict()
# create an instance of SearchTokensRequestSchema from a dict
search_tokens_request_schema_from_dict = SearchTokensRequestSchema.from_dict(search_tokens_request_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


