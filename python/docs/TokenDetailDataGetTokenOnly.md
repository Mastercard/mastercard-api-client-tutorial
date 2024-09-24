# TokenDetailDataGetTokenOnly


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**token_number** | **str** | The Token Primary Account Number of the Card.  | [optional] 
**expiry_month** | **str** | The month of the token expiration date.  | [optional] 
**expiry_year** | **str** | The year of the token expiration date.  | [optional] 
**payment_account_reference** | **str** | The unique account reference assigned to the PAN. Conditionally returned if the Token Requestor has opted to receive PAR and providing PAR is assigned by Mastercard or the Issuer provides PAR in the authorization message response.  | [optional] 

## Example

```python
from openapi_client.models.token_detail_data_get_token_only import TokenDetailDataGetTokenOnly

# TODO update the JSON string below
json = "{}"
# create an instance of TokenDetailDataGetTokenOnly from a JSON string
token_detail_data_get_token_only_instance = TokenDetailDataGetTokenOnly.from_json(json)
# print the JSON string representation of the object
print(TokenDetailDataGetTokenOnly.to_json())

# convert the object into a dict
token_detail_data_get_token_only_dict = token_detail_data_get_token_only_instance.to_dict()
# create an instance of TokenDetailDataGetTokenOnly from a dict
token_detail_data_get_token_only_from_dict = TokenDetailDataGetTokenOnly.from_dict(token_detail_data_get_token_only_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


