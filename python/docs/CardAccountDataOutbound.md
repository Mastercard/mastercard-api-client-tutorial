# CardAccountDataOutbound

**(CONDITIONAL)** The credit or debit card information for the account that is being tokenized.  Present in tokenize response if supported by the Token Requestor, if using a pushAccountReceipt and if there is a card account associated with the pushAccountReceipt in case that the issuer decision is not DECLINED. 

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_number** | **str** | The account number of the credit or debit card.  | [optional] 
**expiry_month** | **str** |  The expiry month for the account. Two numeric digits must be supplied. **Format: MM**  | [optional] 
**expiry_year** | **str** | **(Required as minimum for Tokenization)** The expiry year for the account. **Format: YY**  | [optional] 

## Example

```python
from openapi_client.models.card_account_data_outbound import CardAccountDataOutbound

# TODO update the JSON string below
json = "{}"
# create an instance of CardAccountDataOutbound from a JSON string
card_account_data_outbound_instance = CardAccountDataOutbound.from_json(json)
# print the JSON string representation of the object
print(CardAccountDataOutbound.to_json())

# convert the object into a dict
card_account_data_outbound_dict = card_account_data_outbound_instance.to_dict()
# create an instance of CardAccountDataOutbound from a dict
card_account_data_outbound_from_dict = CardAccountDataOutbound.from_dict(card_account_data_outbound_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


