# GatewayErrorsSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**error** | [**List[GatewayError]**](GatewayError.md) |  | [optional] 

## Example

```python
from openapi_client.models.gateway_errors_schema import GatewayErrorsSchema

# TODO update the JSON string below
json = "{}"
# create an instance of GatewayErrorsSchema from a JSON string
gateway_errors_schema_instance = GatewayErrorsSchema.from_json(json)
# print the JSON string representation of the object
print(GatewayErrorsSchema.to_json())

# convert the object into a dict
gateway_errors_schema_dict = gateway_errors_schema_instance.to_dict()
# create an instance of GatewayErrorsSchema from a dict
gateway_errors_schema_from_dict = GatewayErrorsSchema.from_dict(gateway_errors_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


