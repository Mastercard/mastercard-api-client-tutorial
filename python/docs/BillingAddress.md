# BillingAddress


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**line1** | **str** | **(OPTIONAL)** The first line of the street address for the billing address.  | [optional] 
**line2** | **str** | **(OPTIONAL)** The second line of the street address for the billing address.  | [optional] 
**city** | **str** | **(OPTIONAL)** The city of the billing address.  | [optional] 
**country_subdivision** | **str** | **(OPTIONAL)** The state or country subdivision of the billing address.  | [optional] 
**postal_code** | **str** | **(OPTIONAL)** The postal of code of the billing address.  | [optional] 
**country** | **str** | **(OPTIONAL)** The country of the billing address.  | [optional] 

## Example

```python
from openapi_client.models.billing_address import BillingAddress

# TODO update the JSON string below
json = "{}"
# create an instance of BillingAddress from a JSON string
billing_address_instance = BillingAddress.from_json(json)
# print the JSON string representation of the object
print(BillingAddress.to_json())

# convert the object into a dict
billing_address_dict = billing_address_instance.to_dict()
# create an instance of BillingAddress from a dict
billing_address_from_dict = BillingAddress.from_dict(billing_address_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


