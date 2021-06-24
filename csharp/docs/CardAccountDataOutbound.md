# Acme.App.MastercardApi.Client.Model.CardAccountDataOutbound
**(CONDITIONAL)** The credit or debit card information for the account that is being tokenized.  Present in tokenize response if supported by the Token Requestor, if using a pushAccountReceipt and if there is a card account associated with the pushAccountReceipt in case that the issuer decision is not DECLINED. 

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**AccountNumber** | **string** | The account number of the credit or debit card.  | [optional] 
**ExpiryMonth** | **string** |  The expiry month for the account. Two numeric digits must be supplied. **Format: MM**  | [optional] 
**ExpiryYear** | **string** | **(Required as minimum for Tokenization)** The expiry year for the account. **Format: YY**  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

