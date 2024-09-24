# TokenizeResponseSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **str** | The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**response_id** | **str** | Unique identifier for the response.  | [optional] 
**decision** | **str** | The tokenization decision for this digitization request. Must be either APPROVED (Digitization request was approved), DECLINED (Digitization request was declined) OR REQUIRE_ADDITIONAL_AUTHENTICATION Digitization request was approved but optionally requires additional authentication. One or more Authentication methods may be provided).  | [optional] 
**authentication_methods** | [**List[AuthenticationMethods]**](AuthenticationMethods.md) |  | [optional] 
**token_unique_reference** | **str** | The unique reference allocated to the new Token. Serves as a unique identifier for all subsequent queries or management functions relating to this Token. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.  | [optional] 
**pan_unique_reference** | **str** | The unique reference allocated to the Account Primary Account Number. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.  | [optional] 
**product_config** | [**ProductConfig**](ProductConfig.md) |  | [optional] 
**token_info** | [**TokenInfo**](TokenInfo.md) |  | [optional] 
**token_detail** | [**TokenDetail**](TokenDetail.md) |  | [optional] 
**supports_authentication** | **bool** | (required)Flag to indicate if the issuer supports authentication of the cardholder on the token. Must be one of:   - TRUE   - FALSE  | [optional] 

## Example

```python
from openapi_client.models.tokenize_response_schema import TokenizeResponseSchema

# TODO update the JSON string below
json = "{}"
# create an instance of TokenizeResponseSchema from a JSON string
tokenize_response_schema_instance = TokenizeResponseSchema.from_json(json)
# print the JSON string representation of the object
print(TokenizeResponseSchema.to_json())

# convert the object into a dict
tokenize_response_schema_dict = tokenize_response_schema_instance.to_dict()
# create an instance of TokenizeResponseSchema from a dict
tokenize_response_schema_from_dict = TokenizeResponseSchema.from_dict(tokenize_response_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


