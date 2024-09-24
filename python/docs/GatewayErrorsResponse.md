# GatewayErrorsResponse


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**errors** | [**GatewayErrorsSchema**](GatewayErrorsSchema.md) |  | [optional] 

## Example

```python
from openapi_client.models.gateway_errors_response import GatewayErrorsResponse

# TODO update the JSON string below
json = "{}"
# create an instance of GatewayErrorsResponse from a JSON string
gateway_errors_response_instance = GatewayErrorsResponse.from_json(json)
# print the JSON string representation of the object
print(GatewayErrorsResponse.to_json())

# convert the object into a dict
gateway_errors_response_dict = gateway_errors_response_instance.to_dict()
# create an instance of GatewayErrorsResponse from a dict
gateway_errors_response_from_dict = GatewayErrorsResponse.from_dict(gateway_errors_response_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


