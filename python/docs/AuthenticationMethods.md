# AuthenticationMethods

\"authenticationMethods not currently used for MDES for Merchants\" 

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | Unique identifier assigned to this Authentication Method.  | [optional] 
**type** | **str** | Specifies the authentication method type and provided in the tokenize response.  See table here - https://developer.mastercard.com/mdes-digital-enablement/documentation/code-and-formats/#authentication-method-codes  | [optional] 
**value** | **str** | Specifies the authentication method value (meaning varies depending on the authentication method type).  | [optional] 

## Example

```python
from openapi_client.models.authentication_methods import AuthenticationMethods

# TODO update the JSON string below
json = "{}"
# create an instance of AuthenticationMethods from a JSON string
authentication_methods_instance = AuthenticationMethods.from_json(json)
# print the JSON string representation of the object
print(AuthenticationMethods.to_json())

# convert the object into a dict
authentication_methods_dict = authentication_methods_instance.to_dict()
# create an instance of AuthenticationMethods from a dict
authentication_methods_from_dict = AuthenticationMethods.from_dict(authentication_methods_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


