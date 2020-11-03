# OpenapiClient::AccountHolderData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_holder_name** | **String** | __(OPTIONAL)__ The name of the cardholder in the format LASTNAME/FIRSTNAME or FIRSTNAME LASTNAME&lt;br&gt; __Max Length:27__  | [optional] 
**account_holder_address** | [**BillingAddress**](BillingAddress.md) |  | [optional] 
**consumer_identifier** | **String** | __(OPTIONAL)__ Customer Identifier that may be required in some regions.&lt;br&gt; __Max Length:88__  | [optional] 
**account_holder_email_address** | **String** | __(OPTIONAL)__ The e-mail address of the Account Holder&lt;br&gt; __Max Length: 320__  | [optional] 
**account_holder_mobile_phone_number** | [**PhoneNumber**](PhoneNumber.md) |  | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::AccountHolderData.new(account_holder_name: null,
                                 account_holder_address: null,
                                 consumer_identifier: null,
                                 account_holder_email_address: null,
                                 account_holder_mobile_phone_number: null)
```


