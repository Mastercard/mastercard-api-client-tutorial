# # TokenInfoForNTUAndGetToken

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**token_pan_suffix** | **string** | The last few digits (typically four) of the Token PAN. |
**account_pan_prefix** | **string** | The first few digits (typically six) of the Account PAN. |
**account_pan_suffix** | **string** | The last few digits (typically four) of the Account PAN. |
**token_expiry** | **string** | The expiry of the Token PAN, given in MMYY format. |
**account_pan_expiry** | **string** | The expiry of the Account PAN, given in MMYY format. | [optional]
**dsrp_capable** | **string** | Whether DSRP transactions are supported by this Token. Must be either &#39;true&#39; (DSRP capable) or &#39;false&#39; (Not DSRP capable). |
**token_assurance_level** | **int** | A value indicating the confidence level of the token to Account PAN binding. | [optional]
**product_category** | **string** | The product category of the Account PAN. When supplied will be one of the following values:    * CREDIT   * DEBIT   * PREPAID   * UNKNOWN | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
