# CardAccountDataOutbound

**(CONDITIONAL)** The credit or debit card information for the account that is being tokenized.  Present in tokenize response if supported by the Token Requestor, if using a pushAccountReceipt and if there is a card account associated with the pushAccountReceipt in case that the issuer decision is not DECLINED. 

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_number** | **str** | The account number of the credit or debit card.  | [optional] 
**expiry_month** | **str** |  The expiry month for the account. Two numeric digits must be supplied. **Format: MM**  | [optional] 
**expiry_year** | **str** | **(Required as minimum for Tokenization)** The expiry year for the account. **Format: YY**  | [optional] 
**any string name** | **bool, date, datetime, dict, float, int, list, str, none_type** | any string name can be used but the value must be the correct type | [optional]

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


