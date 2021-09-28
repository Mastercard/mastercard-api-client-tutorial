# TokenInfo


## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**token_pan_suffix** | **str** | The last few digits (typically four) of the Token PAN.  | 
**account_pan_suffix** | **str** | The last few digits (typically four) of the Account PAN.  | 
**token_expiry** | **str** | The expiry of the Token PAN, given in MMYY format.  | 
**dsrp_capable** | **bool** | Whether DSRP transactions are supported by this Token. Must be either &#39;true&#39; (DSRP capable) or &#39;false&#39; (Not DSRP capable).  | 
**account_pan_expiry** | **str** | The expiry of the Account PAN, given in MMYY format.  | [optional] 
**token_assurance_level** | **int** | A value indicating the confidence level of the token to Account PAN binding.  | [optional] 
**product_category** | **str** | The product category of the Account PAN. When supplied will be one of the following values:    * CREDIT   * DEBIT   * PREPAID   * UNKNOWN  | [optional] 
**any string name** | **bool, date, datetime, dict, float, int, list, str, none_type** | any string name can be used but the value must be the correct type | [optional]

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


