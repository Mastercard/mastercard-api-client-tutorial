
# Acme.App.MastercardApi.Client.Model.TokenInfo

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**TokenPanSuffix** | **string** | The last few digits (typically four) of the Token PAN.&lt;br&gt;     __Max Length:8__&lt;br&gt; __Required: Yes__  | [optional] 
**AccountPanSuffix** | **string** | The last few digits (typically four) of the Account PAN.&lt;br&gt;     __Max Length:8__&lt;br&gt; __Required: Yes__  | [optional] 
**TokenExpiry** | **string** | The expiry of the Token PAN, given in MMYY format.&lt;br&gt;     __Max Length:4__&lt;br&gt; __Required: Yes__  | [optional] 
**AccountPanExpiry** | **string** | The expiry of the Account PAN, given in MMYY format. &lt;br&gt; __Max Length: 4__&lt;br&gt; __Required: No__  | [optional] 
**DsrpCapable** | **string** | Whether DSRP transactions are supported by this Token. Must be either &#39;true&#39; (DSRP capable) or &#39;false&#39; (Not DSRP capable).&lt;br&gt; __Max Length: 5__&lt;br&gt; __Required: Yes__  | [optional] 
**TokenAssuranceLevel** | **string** | A value indicating the confidence level of the token to Account PAN binding.&lt;br&gt;     __Max Length:2__&lt;br&gt; __Required: No__  | [optional] 
**ProductCategory** | **string** | The product category of the Account PAN. When supplied will be one of the following values -  * CREDIT * DEBIT * PREPAID * UNKNOWN  __Max Length: 32__&lt;br&gt; __Required: No__  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models)
[[Back to API list]](../README.md#documentation-for-api-endpoints)
[[Back to README]](../README.md)

