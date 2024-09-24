# MediaContent


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **str** | What type of media this is. Specified as a MIME type, which will be one of the following supported types  * applicatoin/pdf (for images must be a vector PDF image) * image/png (includes alpha channel) * text/plain * text/html  | 
**data** | **str** | The data for this item of media. Base64-encoded data, given in the format as specified in ?type?.  | 
**height** | **str** | For image assets, the height of this image. Specified in pixels.  | [optional] 
**width** | **str** | For image assets, the width of this image. Specified in pixels.  | [optional] 

## Example

```python
from openapi_client.models.media_content import MediaContent

# TODO update the JSON string below
json = "{}"
# create an instance of MediaContent from a JSON string
media_content_instance = MediaContent.from_json(json)
# print the JSON string representation of the object
print(MediaContent.to_json())

# convert the object into a dict
media_content_dict = media_content_instance.to_dict()
# create an instance of MediaContent from a dict
media_content_from_dict = MediaContent.from_dict(media_content_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


