# TokenDetailData


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payment_account_reference** | **str** | \&quot;The unique account reference assigned to the PAN. Conditionally returned if the Token Requestor has opted to receive PAR and providing PAR is assigned by Mastercard or the Issuer provides PAR in the authorization message response.\&quot;  | [optional] 

## Example

```python
from openapi_client.models.token_detail_data import TokenDetailData

# TODO update the JSON string below
json = "{}"
# create an instance of TokenDetailData from a JSON string
token_detail_data_instance = TokenDetailData.from_json(json)
# print the JSON string representation of the object
print(TokenDetailData.to_json())

# convert the object into a dict
token_detail_data_dict = token_detail_data_instance.to_dict()
# create an instance of TokenDetailData from a dict
token_detail_data_from_dict = TokenDetailData.from_dict(token_detail_data_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


