# FundingAccountInfo


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**pan_unique_reference** | **str** | **(CONDITIONAL)** For repeat digitizations, the unique reference allocated to the Primary Account Number. When supplied, the tokenUniqueReferenceForPanInfo, accountNumber, expiryMonth and expiryYear must be omitted from CardInfoData. Only allowed if Only allowed if tokenUniqueReference and pushAccountReceipt are not present and encrypted data does not contain the account information.  | [optional] 
**token_unique_reference** | **str** | **(CONDITIONAL)** A unique reference assigned following the allocation of a token used to identify the token for the duration of its lifetime.  For repeat digitizations, the unique reference allocated to the token will be used to retrieve the financial account information. When supplied, the account information is omitted from FundingAccountData. Only allowed if panUniqueReference and pushAccountReceipt are not present and encrypted data does not contain the account information.  | [optional] 
**encrypted_payload** | [**FundingAccountInfoEncryptedPayload**](FundingAccountInfoEncryptedPayload.md) |  | [optional] 

## Example

```python
from openapi_client.models.funding_account_info import FundingAccountInfo

# TODO update the JSON string below
json = "{}"
# create an instance of FundingAccountInfo from a JSON string
funding_account_info_instance = FundingAccountInfo.from_json(json)
# print the JSON string representation of the object
print(FundingAccountInfo.to_json())

# convert the object into a dict
funding_account_info_dict = funding_account_info_instance.to_dict()
# create an instance of FundingAccountInfo from a dict
funding_account_info_from_dict = FundingAccountInfo.from_dict(funding_account_info_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


