# GetTokenResponseSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_id** | **str** | Unique identifier for the response.  | [optional] 
**token** | [**TokenForGetToken**](TokenForGetToken.md) |  | [optional] 
**token_detail** | [**TokenDetailGetTokenOnly**](TokenDetailGetTokenOnly.md) |  | [optional] 

## Example

```python
from openapi_client.models.get_token_response_schema import GetTokenResponseSchema

# TODO update the JSON string below
json = "{}"
# create an instance of GetTokenResponseSchema from a JSON string
get_token_response_schema_instance = GetTokenResponseSchema.from_json(json)
# print the JSON string representation of the object
print(GetTokenResponseSchema.to_json())

# convert the object into a dict
get_token_response_schema_dict = get_token_response_schema_instance.to_dict()
# create an instance of GetTokenResponseSchema from a dict
get_token_response_schema_from_dict = GetTokenResponseSchema.from_dict(get_token_response_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


