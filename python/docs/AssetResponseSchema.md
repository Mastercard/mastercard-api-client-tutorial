# AssetResponseSchema


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**media_contents** | [**List[MediaContent]**](MediaContent.md) |  | [optional] 

## Example

```python
from openapi_client.models.asset_response_schema import AssetResponseSchema

# TODO update the JSON string below
json = "{}"
# create an instance of AssetResponseSchema from a JSON string
asset_response_schema_instance = AssetResponseSchema.from_json(json)
# print the JSON string representation of the object
print(AssetResponseSchema.to_json())

# convert the object into a dict
asset_response_schema_dict = asset_response_schema_instance.to_dict()
# create an instance of AssetResponseSchema from a dict
asset_response_schema_from_dict = AssetResponseSchema.from_dict(asset_response_schema_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


