# MediaContent


## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **str** | What type of media this is. Specified as a MIME type, which will be one of the following supported types  * applicatoin/pdf (for images must be a vector PDF image) * image/png (includes alpha channel) * text/plain * text/html  | 
**data** | **str** | The data for this item of media. Base64-encoded data, given in the format as specified in ?type?.  | 
**height** | **str** | For image assets, the height of this image. Specified in pixels.  | [optional] 
**width** | **str** | For image assets, the width of this image. Specified in pixels.  | [optional] 
**any string name** | **bool, date, datetime, dict, float, int, list, str, none_type** | any string name can be used but the value must be the correct type | [optional]

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


