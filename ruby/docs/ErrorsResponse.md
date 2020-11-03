# OpenapiClient::ErrorsResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**error_code** | **String** | __CONDITIONAL__&lt;br&gt; Returned in the event of an error and contains the reason the operation failed. Only use if errors object is not present. &lt;br&gt; __Max Length: 32__  | [optional] 
**error_description** | **String** | __CONDITIONAL__&lt;br&gt; Returned in the event of an error and contains a description of why the operation failed. Only use if errors object is not present. &lt;br&gt; __Max Length: 32__   | [optional] 
**response_host** | **String** | The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host.   | [optional] 
**response_id** | **String** | Unique identifier for the response.  | [optional] 
**errors** | [**Error**](Error.md) |  | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::ErrorsResponse.new(error_code: null,
                                 error_description: null,
                                 response_host: site2.payment-app-provider.com,
                                 response_id: 123456,
                                 errors: null)
```


