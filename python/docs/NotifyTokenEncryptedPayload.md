# NotifyTokenEncryptedPayload


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**tokens** | [**List[TokenForNTU]**](TokenForNTU.md) |  | [optional] 

## Example

```python
from openapi_client.models.notify_token_encrypted_payload import NotifyTokenEncryptedPayload

# TODO update the JSON string below
json = "{}"
# create an instance of NotifyTokenEncryptedPayload from a JSON string
notify_token_encrypted_payload_instance = NotifyTokenEncryptedPayload.from_json(json)
# print the JSON string representation of the object
print(NotifyTokenEncryptedPayload.to_json())

# convert the object into a dict
notify_token_encrypted_payload_dict = notify_token_encrypted_payload_instance.to_dict()
# create an instance of NotifyTokenEncryptedPayload from a dict
notify_token_encrypted_payload_from_dict = NotifyTokenEncryptedPayload.from_dict(notify_token_encrypted_payload_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


