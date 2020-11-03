# OpenapiClient::GetTokenRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**request_id** | **String** | Unique identifier for the request.  | 
**payment_app_instance_id** | **String** | Identifier for the specific Mobile Payment App instance, unique across a given Wallet Identifier. This value cannot be changed after digitization. This field is alphanumeric and additionally web-safe base64 characters per RFC 4648 (minus \&quot;-\&quot;, underscore \&quot;_\&quot;) up to a maximum length of 48, &#x3D; should not be URL encoded. Conditional - not applicable for server-based tokens but required otherwise.     __Max Length:48__  | [optional] 
**token_unique_reference** | **String** | The specific Token to be queried.     __Max Length:64__   | 
**include_token_detail** | **String** | Flag to indicate if the encrypted token should be returned.     __Max Length:5__   | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::GetTokenRequestSchema.new(response_host: site2.payment-app-provider.com,
                                 request_id: 123456,
                                 payment_app_instance_id: 123456789,
                                 token_unique_reference: DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45,
                                 include_token_detail: true)
```


