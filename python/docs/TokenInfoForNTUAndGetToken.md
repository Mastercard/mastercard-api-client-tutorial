# TokenInfoForNTUAndGetToken


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**token_pan_suffix** | **str** | The last few digits (typically four) of the Token PAN.  | 
**account_pan_prefix** | **str** | The first few digits (typically six) of the Account PAN.  | 
**account_pan_suffix** | **str** | The last few digits (typically four) of the Account PAN.  | 
**token_expiry** | **str** | The expiry of the Token PAN, given in MMYY format.  | 
**account_pan_expiry** | **str** | The expiry of the Account PAN, given in MMYY format.  | [optional] 
**dsrp_capable** | **str** | Whether DSRP transactions are supported by this Token. Must be either &#39;true&#39; (DSRP capable) or &#39;false&#39; (Not DSRP capable).  | 
**token_assurance_level** | **int** | A value indicating the confidence level of the token to Account PAN binding.  | [optional] 
**product_category** | **str** | The product category of the Account PAN. When supplied will be one of the following values:    * CREDIT   * DEBIT   * PREPAID   * UNKNOWN  | [optional] 

## Example

```python
from openapi_client.models.token_info_for_ntu_and_get_token import TokenInfoForNTUAndGetToken

# TODO update the JSON string below
json = "{}"
# create an instance of TokenInfoForNTUAndGetToken from a JSON string
token_info_for_ntu_and_get_token_instance = TokenInfoForNTUAndGetToken.from_json(json)
# print the JSON string representation of the object
print(TokenInfoForNTUAndGetToken.to_json())

# convert the object into a dict
token_info_for_ntu_and_get_token_dict = token_info_for_ntu_and_get_token_instance.to_dict()
# create an instance of TokenInfoForNTUAndGetToken from a dict
token_info_for_ntu_and_get_token_from_dict = TokenInfoForNTUAndGetToken.from_dict(token_info_for_ntu_and_get_token_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


