

# AccountHolderDataOutbound

**(CONDITIONAL)** Present in tokenize response if supported by the Merchant, if using a pushAccountReceipt and if there is account holder data associated with the pushAccountReceipt in case that the issuer decision is APPROVED. Refer to MDES Token Connect Token Requestor Implementation Guide and Specification  for more details. 

## Properties

| Name | Type | Description | Notes |
|------------ | ------------- | ------------- | -------------|
|**accountHolderName** | **String** | **(OPTIONAL)** The name of the cardholder  |  [optional] |
|**accountHolderAddress** | [**BillingAddress**](BillingAddress.md) |  |  [optional] |
|**accountHolderEmailAddress** | **String** | **(OPTIONAL)** The e-mail address of the Account Holder  |  [optional] |
|**accountHolderMobilePhoneNumber** | [**PhoneNumber**](PhoneNumber.md) |  |  [optional] |



