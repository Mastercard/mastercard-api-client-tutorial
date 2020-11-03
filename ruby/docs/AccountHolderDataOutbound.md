# OpenapiClient::AccountHolderDataOutbound

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_holder_name** | **String** | __(OPTIONAL)__ The name of the cardholder&lt;br&gt; __Max Length:27__  | [optional] 
**account_holder_address** | [**BillingAddress**](BillingAddress.md) |  | [optional] 
**account_holder_email_address** | **String** | __(OPTIONAL)__ The e-mail address of the Account Holder&lt;br&gt; __Max Length:320__  | [optional] 
**account_holder_mobile_phone_number** | [**PhoneNumber**](PhoneNumber.md) |  | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::AccountHolderDataOutbound.new(account_holder_name: null,
                                 account_holder_address: null,
                                 account_holder_email_address: null,
                                 account_holder_mobile_phone_number: null)
```


