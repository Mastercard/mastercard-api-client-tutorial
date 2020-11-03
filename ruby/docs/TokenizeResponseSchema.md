# OpenapiClient::TokenizeResponseSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **String** | The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host.   | [optional] 
**response_id** | **String** | Unique identifier for the response.  | [optional] 
**decision** | **String** | The tokenization decision for this digitization request. Must be either APPROVED (Digitization request was approved), DECLINED (Digitization request was declined) OR REQUIRE_ADDITIONAL_AUTHENTICATION Digitization request was approved but optionally requires additional authentication. One or more Authentication methods may be provided).  | [optional] 
**authentication_methods** | [**Array&lt;AuthenticationMethods&gt;**](AuthenticationMethods.md) |  | [optional] 
**token_unique_reference** | **String** | The unique reference allocated to the new Token. Serves as a unique identifier for all subsequent queries or management functions relating to this Token. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.    __Max Length:64__  | [optional] 
**pan_unique_reference** | **String** | The unique reference allocated to the Account Primary Account Number. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.  __Max Length:64__  | [optional] 
**product_config** | [**ProductConfig**](ProductConfig.md) |  | [optional] 
**token_info** | [**TokenInfo**](TokenInfo.md) |  | [optional] 
**token_detail** | [**TokenDetail**](TokenDetail.md) |  | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::TokenizeResponseSchema.new(response_host: site2.payment-app-provider.com,
                                 response_id: 123456,
                                 decision: APPROVED,
                                 authentication_methods: null,
                                 token_unique_reference: DWSPMC000000000132d72d4fcb2f4136a0532d3093ff1a45,
                                 pan_unique_reference: FWSPMC000000000159f71f703d2141efaf04dd26803f922b,
                                 product_config: null,
                                 token_info: null,
                                 token_detail: null)
```


