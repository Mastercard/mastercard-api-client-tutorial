# OpenapiClient::MediaContent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **String** | What type of media this is. Specified as a MIME type, which will be one of the following supported types   * applicatoin/pdf (for images must be a vector PDF image) * image/png (includes alpha channel) * text/plain  * text/html  __Max Length:32__   | 
**data** | **String** | The data for this item of media. Base64-encoded data, given in the format as specified in ‘type’.  | 
**height** | **String** | For image assets, the height of this image. Specified in pixels.     __Max Length:6__   | [optional] 
**width** | **String** | For image assets, the width of this image. Specified in pixels.        __Max Length:6__   | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::MediaContent.new(type: image/png,
                                 data: iVBORw0KGgoAAAANSUhEUgAAAXcAAAF3CAIAAADRopypAAAABGdBTUEAANbY1E9YMgAAAAlwSFlzAAAASAAAAEgARslrPgAAGtNJREFUeNrt3W9oW,
                                 height: 375,
                                 width: 375)
```


