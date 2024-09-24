# TokenInfo


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**token_pan_suffix** | **str** | The last few digits (typically four) of the Token PAN.  | 
**account_pan_suffix** | **str** | The last few digits (typically four) of the Account PAN.  | 
**token_expiry** | **str** | The expiry of the Token PAN, given in MMYY format.  | 
**account_pan_expiry** | **str** | The expiry of the Account PAN, given in MMYY format.  | [optional] 
**dsrp_capable** | **bool** | Whether DSRP transactions are supported by this Token. Must be either &#39;true&#39; (DSRP capable) or &#39;false&#39; (Not DSRP capable).  | 
**token_assurance_level** | **int** | A value indicating the confidence level of the token to Account PAN binding.  | [optional] 
**product_category** | **str** | The product category of the Account PAN. When supplied will be one of the following values:    * CREDIT   * DEBIT   * PREPAID   * UNKNOWN  | [optional] 

## Example

```python
from openapi_client.models.token_info import TokenInfo

# TODO update the JSON string below
json = "{}"
# create an instance of TokenInfo from a JSON string
token_info_instance = TokenInfo.from_json(json)
# print the JSON string representation of the object
print(TokenInfo.to_json())

# convert the object into a dict
token_info_dict = token_info_instance.to_dict()
# create an instance of TokenInfo from a dict
token_info_from_dict = TokenInfo.from_dict(token_info_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


