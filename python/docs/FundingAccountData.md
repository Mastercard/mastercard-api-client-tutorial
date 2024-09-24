# FundingAccountData


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**card_account_data** | [**CardAccountDataInbound**](CardAccountDataInbound.md) |  | [optional] 
**account_holder_data** | [**AccountHolderData**](AccountHolderData.md) |  | [optional] 
**source** | **str** | (**Required as minimum for Tokenization**) The source of the account. Must be one of   * ACCOUNT_ON_FILE   * ACCOUNT_ADDED_MANUALLY   * ACCOUNT_ADDED_VIA_APPLICATION  | [optional] 

## Example

```python
from openapi_client.models.funding_account_data import FundingAccountData

# TODO update the JSON string below
json = "{}"
# create an instance of FundingAccountData from a JSON string
funding_account_data_instance = FundingAccountData.from_json(json)
# print the JSON string representation of the object
print(FundingAccountData.to_json())

# convert the object into a dict
funding_account_data_dict = funding_account_data_instance.to_dict()
# create an instance of FundingAccountData from a dict
funding_account_data_from_dict = FundingAccountData.from_dict(funding_account_data_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


