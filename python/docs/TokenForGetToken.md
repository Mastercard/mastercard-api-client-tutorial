# TokenForGetToken


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**token_unique_reference** | **str** | The unique reference allocated to the Token which is always present even if an error occurs. maxLength: 64  | [optional] 
**token_requestor_id** | **str** | Identifies the Token Requestor. &lt;br&gt; minLength: 11 maxLength: 11  | [optional] 
**status** | **str** | The current status of Token. Must be either:  * &#39;INACTIVE&#39; (Token has not yet been activated)  * &#39;ACTIVE&#39; (Token is active and ready to transact)  * &#39;SUSPENDED&#39; (Token is suspended and unable to transact)  * &#39;DEACTIVATED&#39; (Token has been permanently deactivated). maxLength: 32  | [optional] 
**suspended_by** | **List[str]** | (CONDITIONAL only supplied if status is SUSPENDED) Who or what caused the Token to be suspended One or more values of:    * ISSUER - Suspended by the Issuer.    * TOKEN_REQUESTOR - Suspended by the Token Requestor    * MOBILE_PIN_LOCKED - Suspended due to the Mobile PIN being locked    * CARDHOLDER - Suspended by the Cardholder  | [optional] 
**status_timestamp** | **str** | The date and time the token status was last updated. Expressed in ISO 8601 extended format as one of the following:    * YYYY-MM-DDThh:mm:ss[.sss]Z    * YYYY-MM-DDThh:mm:ss[.sss]±hh:mm    * Where [.sss] is optional and can be 1 to 3 digits.  | [optional] 
**product_config** | [**ProductConfig**](ProductConfig.md) |  | [optional] 
**token_info** | [**TokenInfoForNTUAndGetToken**](TokenInfoForNTUAndGetToken.md) |  | [optional] 

## Example

```python
from openapi_client.models.token_for_get_token import TokenForGetToken

# TODO update the JSON string below
json = "{}"
# create an instance of TokenForGetToken from a JSON string
token_for_get_token_instance = TokenForGetToken.from_json(json)
# print the JSON string representation of the object
print(TokenForGetToken.to_json())

# convert the object into a dict
token_for_get_token_dict = token_for_get_token_instance.to_dict()
# create an instance of TokenForGetToken from a dict
token_for_get_token_from_dict = TokenForGetToken.from_dict(token_for_get_token_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


