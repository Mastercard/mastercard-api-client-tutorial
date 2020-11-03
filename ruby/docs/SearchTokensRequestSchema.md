# OpenapiClient::SearchTokensRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**request_id** | **String** | Unique identifier for the request.  | 
**response_host** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**funding_account_info** | [**FundingAccountInfo**](FundingAccountInfo.md) |  | [optional] 
**token_requestor_id** | **String** | Identifies the Token Requestor. Only tokens associated with the token requestor will be returned. Length - 11.   | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::SearchTokensRequestSchema.new(request_id: 123456,
                                 response_host: site2.payment-app-provider.com,
                                 funding_account_info: null,
                                 token_requestor_id: 98765432101)
```


