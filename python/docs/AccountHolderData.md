# AccountHolderData


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_holder_name** | **str** | **(OPTIONAL)** The name of the cardholder in the format LASTNAME/FIRSTNAME or FIRSTNAME LASTNAME  | [optional] 
**account_holder_address** | [**BillingAddress**](BillingAddress.md) |  | [optional] 
**consumer_identifier** | **str** | **(OPTIONAL)** Customer Identifier that may be required in some regions.  | [optional] 
**account_holder_email_address** | **str** | **(OPTIONAL)** The e-mail address of the Account Holder  | [optional] 
**account_holder_mobile_phone_number** | [**PhoneNumber**](PhoneNumber.md) |  | [optional] 

## Example

```python
from openapi_client.models.account_holder_data import AccountHolderData

# TODO update the JSON string below
json = "{}"
# create an instance of AccountHolderData from a JSON string
account_holder_data_instance = AccountHolderData.from_json(json)
# print the JSON string representation of the object
print(AccountHolderData.to_json())

# convert the object into a dict
account_holder_data_dict = account_holder_data_instance.to_dict()
# create an instance of AccountHolderData from a dict
account_holder_data_from_dict = AccountHolderData.from_dict(account_holder_data_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


