# Acme.App.MastercardApi.Client.Model.TokenInfo

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**TokenPanSuffix** | **string** | The last few digits (typically four) of the Token PAN.  | 
**AccountPanSuffix** | **string** | The last few digits (typically four) of the Account PAN.  | 
**TokenExpiry** | **string** | The expiry of the Token PAN, given in MMYY format.  | 
**AccountPanExpiry** | **string** | The expiry of the Account PAN, given in MMYY format.  | [optional] 
**DsrpCapable** | **string** | Whether DSRP transactions are supported by this Token. Must be either &#39;true&#39; (DSRP capable) or &#39;false&#39; (Not DSRP capable).  | 
**TokenAssuranceLevel** | **int** | A value indicating the confidence level of the token to Account PAN binding.  | [optional] 
**ProductCategory** | **string** | The product category of the Account PAN. When supplied will be one of the following values:    * CREDIT   * DEBIT   * PREPAID   * UNKNOWN  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

