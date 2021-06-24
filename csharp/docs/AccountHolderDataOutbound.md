# Acme.App.MastercardApi.Client.Model.AccountHolderDataOutbound
**(CONDITIONAL)** Present in tokenize response if supported by the Merchant, if using a pushAccountReceipt and if there is account holder data associated with the pushAccountReceipt in case that the issuer decision is APPROVED. Refer to MDES Token Connect Token Requestor Implementation Guide and Specification  for more details. 

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**AccountHolderName** | **string** | **(OPTIONAL)** The name of the cardholder  | [optional] 
**AccountHolderAddress** | [**BillingAddress**](BillingAddress.md) |  | [optional] 
**AccountHolderEmailAddress** | **string** | **(OPTIONAL)** The e-mail address of the Account Holder  | [optional] 
**AccountHolderMobilePhoneNumber** | [**PhoneNumber**](PhoneNumber.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

