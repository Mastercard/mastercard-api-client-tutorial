# OpenapiClient::TransactRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**request_id** | **String** | Unique identifier for the request.  | 
**token_unique_reference** | **String** | Globally unique identifier for the Token, as assigned by MDES.    __Max Length:64__  | 
**dsrp_type** | **String** | What type of DSRP cryptogram to create. Must be either UCAF or M_CHIP.     __Max Length:64__  | 
**unpredictable_number** | **String** | __CONDITIONAL__&lt;br&gt;HEX Encoded data (case sensitive) provided by the merchant to provide variability and uniqueness to the generation of a cryptogram.  Required if the shouldGenerateUnpredictableNumber flag is not set during on-boarding.&lt;br&gt; __Length:8__            | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::TransactRequestSchema.new(response_host: site2.payment-app-provider.com,
                                 request_id: 123456,
                                 token_unique_reference: DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45,
                                 dsrp_type: UCAF,
                                 unpredictable_number: 23424563)
```


