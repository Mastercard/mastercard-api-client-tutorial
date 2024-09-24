

# TokenInfoForNTUAndGetToken


## Properties

| Name | Type | Description | Notes |
|------------ | ------------- | ------------- | -------------|
|**tokenPanSuffix** | **String** | The last few digits (typically four) of the Token PAN.  |  |
|**accountPanPrefix** | **String** | The first few digits (typically six) of the Account PAN.  |  |
|**accountPanSuffix** | **String** | The last few digits (typically four) of the Account PAN.  |  |
|**tokenExpiry** | **String** | The expiry of the Token PAN, given in MMYY format.  |  |
|**accountPanExpiry** | **String** | The expiry of the Account PAN, given in MMYY format.  |  [optional] |
|**dsrpCapable** | **String** | Whether DSRP transactions are supported by this Token. Must be either &#39;true&#39; (DSRP capable) or &#39;false&#39; (Not DSRP capable).  |  |
|**tokenAssuranceLevel** | **Integer** | A value indicating the confidence level of the token to Account PAN binding.  |  [optional] |
|**productCategory** | **String** | The product category of the Account PAN. When supplied will be one of the following values:    * CREDIT   * DEBIT   * PREPAID   * UNKNOWN  |  [optional] |



