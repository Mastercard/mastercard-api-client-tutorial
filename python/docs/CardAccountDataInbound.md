# CardAccountDataInbound

**(CONDITIONAL)** Required in Tokenize or Search Tokens unless a valid panUniqueReference, tokenUniqueReference or pushAccountReceipt is also given in FundingAccountInfo. 

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_number** | **str** | The account number of the credit or debit card. **(CONDITIONAL)** required in a Tokenize, or Get Digital Asset request, unless a valid panUniqueReference or tokenUniqueReference or pushAccountReceipt was given in FundingAccountInfo. **NOTE**:Only 6 digits can be supplied in SearchTokens if the TokenUniqueReference is provided in fundingAccountInfo.  | [optional] 
**expiry_month** | **str** | The expiry month for the account. Two numeric digits must be supplied. Only supplied in tokenization requests if panUniqueReference or tokenUniqueReferenceForPanInfo or pushAccountReceipt is not present. **Format: MM**  | [optional] 
**expiry_year** | **str** | **(Required as minimum for Tokenization)** The expiry year for the account. Only supplied in tokenization requests if panUniqueReference or tokenUniqueReferenceForPanInfo or pushAccountReceipt is not present. **Format: YY**  | [optional] 
**security_code** | **str** | **(OPTIONAL)** The security code for the account can optionally be provided for Tokenization. If provided, the validity will be checked. Optional in a Tokenize request, not present otherwise.  | [optional] 

## Example

```python
from openapi_client.models.card_account_data_inbound import CardAccountDataInbound

# TODO update the JSON string below
json = "{}"
# create an instance of CardAccountDataInbound from a JSON string
card_account_data_inbound_instance = CardAccountDataInbound.from_json(json)
# print the JSON string representation of the object
print(CardAccountDataInbound.to_json())

# convert the object into a dict
card_account_data_inbound_dict = card_account_data_inbound_instance.to_dict()
# create an instance of CardAccountDataInbound from a dict
card_account_data_inbound_from_dict = CardAccountDataInbound.from_dict(card_account_data_inbound_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


