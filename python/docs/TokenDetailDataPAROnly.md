# TokenDetailDataPAROnly


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payment_account_reference** | **str** | The unique account reference assigned to the PAN. Conditionally returned if the Token Requestor has opted to receive PAR and providing PAR is assigned by Mastercard or the Issuer provides PAR in the authorization message response.  | [optional] 

## Example

```python
from openapi_client.models.token_detail_data_par_only import TokenDetailDataPAROnly

# TODO update the JSON string below
json = "{}"
# create an instance of TokenDetailDataPAROnly from a JSON string
token_detail_data_par_only_instance = TokenDetailDataPAROnly.from_json(json)
# print the JSON string representation of the object
print(TokenDetailDataPAROnly.to_json())

# convert the object into a dict
token_detail_data_par_only_dict = token_detail_data_par_only_instance.to_dict()
# create an instance of TokenDetailDataPAROnly from a dict
token_detail_data_par_only_from_dict = TokenDetailDataPAROnly.from_dict(token_detail_data_par_only_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


