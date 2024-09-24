# AccountHolderDataOutbound

**(CONDITIONAL)** Present in tokenize response if supported by the Merchant, if using a pushAccountReceipt and if there is account holder data associated with the pushAccountReceipt in case that the issuer decision is APPROVED. Refer to MDES Token Connect Token Requestor Implementation Guide and Specification  for more details. 

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_holder_name** | **str** | **(OPTIONAL)** The name of the cardholder  | [optional] 
**account_holder_address** | [**BillingAddress**](BillingAddress.md) |  | [optional] 
**account_holder_email_address** | **str** | **(OPTIONAL)** The e-mail address of the Account Holder  | [optional] 
**account_holder_mobile_phone_number** | [**PhoneNumber**](PhoneNumber.md) |  | [optional] 

## Example

```python
from openapi_client.models.account_holder_data_outbound import AccountHolderDataOutbound

# TODO update the JSON string below
json = "{}"
# create an instance of AccountHolderDataOutbound from a JSON string
account_holder_data_outbound_instance = AccountHolderDataOutbound.from_json(json)
# print the JSON string representation of the object
print(AccountHolderDataOutbound.to_json())

# convert the object into a dict
account_holder_data_outbound_dict = account_holder_data_outbound_instance.to_dict()
# create an instance of AccountHolderDataOutbound from a dict
account_holder_data_outbound_from_dict = AccountHolderDataOutbound.from_dict(account_holder_data_outbound_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


