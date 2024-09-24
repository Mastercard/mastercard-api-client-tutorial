# SearchTokensResponseSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **str** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**response_id** | **str** | Unique identifier for the response.  | [optional] 
**tokens** | [**List[Token]**](Token.md) |  | [optional] 

## Example

```python
from openapi_client.models.search_tokens_response_schema import SearchTokensResponseSchema

# TODO update the JSON string below
json = "{}"
# create an instance of SearchTokensResponseSchema from a JSON string
search_tokens_response_schema_instance = SearchTokensResponseSchema.from_json(json)
# print the JSON string representation of the object
print(SearchTokensResponseSchema.to_json())

# convert the object into a dict
search_tokens_response_schema_dict = search_tokens_response_schema_instance.to_dict()
# create an instance of SearchTokensResponseSchema from a dict
search_tokens_response_schema_from_dict = SearchTokensResponseSchema.from_dict(search_tokens_response_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


