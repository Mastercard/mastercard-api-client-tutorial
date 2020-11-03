# OpenapiClient::TokenDetailData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_holder_data** | [**AccountHolderData**](AccountHolderData.md) |  | [optional] 
**payment_account_reference** | **String** | \&quot;The unique account reference assigned to the PAN. Conditionally returned if the Token Requestor has opted to receive PAR and providing PAR is assigned by Mastercard or the Issuer provides PAR in the authorization message response.    __Max Length:__ - 29\&quot;  | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::TokenDetailData.new(account_holder_data: null,
                                 payment_account_reference: 5001a9f027e5629d11e3949a0800a)
```


