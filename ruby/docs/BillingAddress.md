# OpenapiClient::BillingAddress

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**line1** | **String** | __(OPTIONAL)__&lt;br&gt; The first line of the street address for the billing address.&lt;br&gt; __Max Length:64__  | [optional] 
**line2** | **String** | __(OPTIONAL)__ The second line of the street address for the billing address.&lt;br&gt; __Max Length:64__  | [optional] 
**city** | **String** | __(OPTIONAL)__&lt;br&gt; The city of the billing address.&lt;br&gt; __Max Length:32__  | [optional] 
**country_subdivision** | **String** | __(OPTIONAL)__&lt;br&gt; The state or country subdivision of the billing address.&lt;br&gt; __Max Length:12__  | [optional] 
**postal_code** | **String** | __(OPTIONAL)__&lt;br&gt; The postal of code of the billing address.&lt;br&gt; __Max Length:16__  | [optional] 
**country** | **String** | __(OPTIONAL)__ The country of the billing address. &lt;br&gt; __Max Length:3__  | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::BillingAddress.new(line1: 100 1st Street,
                                 line2: Apt. 4B,
                                 city: St. Louis,
                                 country_subdivision: MO,
                                 postal_code: 61000,
                                 country: USA)
```


