# DeleteRequestSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **str** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**request_id** | **str** | Unique identifier for the request.  | 
**payment_app_instance_id** | **str** | Identifier for the specific Mobile Payment App instance, unique across a given Wallet Identifier. This value cannot be changed after digitization. This field is alphanumeric and additionally web-safe base64 characters per RFC 4648 (minus \&quot;-\&quot;, underscore \&quot;_\&quot;) up to a maximum length of 48, &#x3D; should not be URL encoded. Conditional - not applicable for server based tokens but required otherwise.  | [optional] 
**token_unique_references** | **List[str]** | The specific Token to be deleted. Array of more or more valid references as assigned by MDES  | 
**caused_by** | **str** | Who or what caused the Token to be deleted. Must be either the &#39;CARDHOLDER&#39; (operation requested by the Cardholder) or &#39;TOKEN_REQUESTOR&#39; (operation requested by the token requestor).  | 
**reason** | **str** | Free form reason why the Tokens are being suspended.  | [optional] 
**reason_code** | **str** | The reason for the action to be deleted. Must be one of &#39;SUSPECTED_FRAUD&#39; (suspected fraudulent token transactions), &#39;OTHER&#39; (Other - default used if value not provided).  | 

## Example

```python
from openapi_client.models.delete_request_schema import DeleteRequestSchema

# TODO update the JSON string below
json = "{}"
# create an instance of DeleteRequestSchema from a JSON string
delete_request_schema_instance = DeleteRequestSchema.from_json(json)
# print the JSON string representation of the object
print(DeleteRequestSchema.to_json())

# convert the object into a dict
delete_request_schema_dict = delete_request_schema_instance.to_dict()
# create an instance of DeleteRequestSchema from a dict
delete_request_schema_from_dict = DeleteRequestSchema.from_dict(delete_request_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


