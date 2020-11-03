# OpenapiClient::CardAccountDataOutbound

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_number** | **String** |  The account number of the credit or debit card.   __Min Length:9__&lt;br&gt;  __Max Length:19__  | [optional] 
**expiry_month** | **String** |   The expiry month for the account. Two numeric digits must be supplied.   __Format: MM__&lt;br&gt; __Exact Length:2__  | [optional] 
**expiry_year** | **String** | __(Required as minimum for Tokenization)__  The expiry year for the account. __Format: YY__ &lt;br&gt; __Exact Length:2__  | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::CardAccountDataOutbound.new(account_number: 5123456789012345,
                                 expiry_month: 09,
                                 expiry_year: 21)
```


