# OpenapiClient::TokenDetailDataGetTokenOnly

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**token_number** | **String** | The Token Primary Account Number of the Card.  &lt;br&gt;__Max Length: 19__ &lt;br&gt;__Min Length: 9__  | [optional] 
**expiry_month** | **String** | The month of the token expiration date. &lt;br&gt; __Max Length: 2__  | [optional] 
**expiry_year** | **String** | The year of the token expiration date. &lt;br&gt; __Max Length: 2__  | [optional] 
**payment_account_reference** | **String** | The unique account reference assigned to the PAN. Conditionally returned if the Token Requestor has opted to receive PAR and providing PAR is assigned by Mastercard or the Issuer provides PAR in the authorization message response. &lt;br&gt;    __Max Length: 29__  | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::TokenDetailDataGetTokenOnly.new(token_number: 5123456789012345,
                                 expiry_month: 12,
                                 expiry_year: 20,
                                 payment_account_reference: 5001a9f027e5629d11e3949a0800a)
```


