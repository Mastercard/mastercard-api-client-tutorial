# GetTokenRequestSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **str** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**request_id** | **str** | Unique identifier for the request.  | 
**payment_app_instance_id** | **str** | Identifier for the specific Mobile Payment App instance, unique across a given Wallet Identifier. This value cannot be changed after digitization. This field is alphanumeric and additionally web-safe base64 characters per RFC 4648 (minus \&quot;-\&quot;, underscore \&quot;_\&quot;) up to a maximum length of 48, &#x3D; should not be URL encoded. Conditional - not applicable for server-based tokens but required otherwise.  | [optional] 
**token_unique_reference** | **str** | The specific Token to be queried.  | 
**include_token_detail** | **str** | Flag to indicate if the encrypted token should be returned.  | [optional] 

## Example

```python
from openapi_client.models.get_token_request_schema import GetTokenRequestSchema

# TODO update the JSON string below
json = "{}"
# create an instance of GetTokenRequestSchema from a JSON string
get_token_request_schema_instance = GetTokenRequestSchema.from_json(json)
# print the JSON string representation of the object
print(GetTokenRequestSchema.to_json())

# convert the object into a dict
get_token_request_schema_dict = get_token_request_schema_instance.to_dict()
# create an instance of GetTokenRequestSchema from a dict
get_token_request_schema_from_dict = GetTokenRequestSchema.from_dict(get_token_request_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


