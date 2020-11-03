# OpenapiClient::PhoneNumber

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**country_dial_in_code** | **Float** | __(OPTIONAL)__ The country code for the phone number. E.g. 1 for US or 44 for UK.&lt;br&gt; __Max Length: 4__  | [optional] 
**phone_number** | **Float** | __(OPTIONAL)__ The phone number of the account holder &lt;br&gt;  __Max Length: 20__  | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::PhoneNumber.new(country_dial_in_code: null,
                                 phone_number: null)
```


