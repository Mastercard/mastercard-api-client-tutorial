# OpenapiClient::TransactEncryptedData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_number** | **String** | The Primary Account Number for the transaction – this is the Token PAN.  &lt;br&gt;__Min Length: 9__ &lt;br&gt;__Max Length: 19__  | [optional] 
**application_expiry_date** | **String** | Application expiry date for the Token. Expressed in YYMMDD format.  &lt;br&gt; __Length: 6__  | [optional] 
**pan_sequence_number** | **String** | Application PAN sequence number for the Token &lt;br&gt;  __Length: 2__  | [optional] 
**track2_equivalent** | **String** | Track 2 equivalent data for the Token. Expressed according to ISO/IEC 7813, excluding start sentinel, end sentinel, and Longitudinal Redundancy Check (LRC), using hex nibble &#39;D&#39; as field separator, and padded to whole bytes using one hex nibble &#39;F&#39; as needed.  &lt;br&gt;   __Max Length: 38__  | [optional] 
**de48se43_data** | **String** | Data for DE 48 Subelement 43 containing the cryptogram.&lt;br&gt; DSRP cryptogram is required to be sent in the DE104 – DPD (Digital Payment Data) field  – please refer to AN3363 bulletin for more details.&lt;br&gt; __Max Length: 32__  | [optional] 

## Code Sample

```ruby
require 'OpenapiClient'

instance = OpenapiClient::TransactEncryptedData.new(account_number: 5480981500100002,
                                 application_expiry_date: 210931,
                                 pan_sequence_number: 01,
                                 track2_equivalent: 5480981500100002D18112011000000000000F,
                                 de48se43_data: 11223344556677889900112233445566778899)
```


