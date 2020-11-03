# OpenapiClient::TransactError

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source** | **String** | An element used to indicate the source of the issue causing this error. Must be one of   * &#39;MDES&#39;  * &#39;INPUT&#39; &lt;br&gt; __Max Length: 32__  | [optional] 
**error_code** | **String** | A reason code or information pertaining to the error that has occurred. This will contain the error reported by the platform (e.g. authentication errors) or service (e.g. invalid TUR)&lt;br&gt; __Max Length: 100__  | [optional] 
**description** | **String** | Description of the reason why the operation failed. &lt;br&gt; __Max Length: 256__  | [optional] 
**reason_code** | **String** | A reason code or information pertaining to the error that has occurred from the service (e.g. invalid TUR). See API Response Errors&lt;br&gt; __Max Length: 100__          | [optional] 
**error_description** | **String** | __DEPRECATED__&lt;br&gt; Use description instead.&lt;br&gt; __Max Length: 100__   | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::TransactError.new(source: null,
                                 error_code: null,
                                 description: null,
                                 reason_code: null,
                                 error_description: null)
```


