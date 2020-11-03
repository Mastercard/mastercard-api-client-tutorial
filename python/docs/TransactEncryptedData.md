# TransactEncryptedData

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_number** | **str** | The Primary Account Number for the transaction – this is the Token PAN.  &lt;br&gt;__Min Length: 9__ &lt;br&gt;__Max Length: 19__  | [optional] 
**application_expiry_date** | **str** | Application expiry date for the Token. Expressed in YYMMDD format.  &lt;br&gt; __Length: 6__  | [optional] 
**pan_sequence_number** | **str** | Application PAN sequence number for the Token &lt;br&gt;  __Length: 2__  | [optional] 
**track2_equivalent** | **str** | Track 2 equivalent data for the Token. Expressed according to ISO/IEC 7813, excluding start sentinel, end sentinel, and Longitudinal Redundancy Check (LRC), using hex nibble &#39;D&#39; as field separator, and padded to whole bytes using one hex nibble &#39;F&#39; as needed.  &lt;br&gt;   __Max Length: 38__  | [optional] 
**de48se43_data** | **str** | Data for DE 48 Subelement 43 containing the cryptogram.&lt;br&gt; DSRP cryptogram is required to be sent in the DE104 – DPD (Digital Payment Data) field  – please refer to AN3363 bulletin for more details.&lt;br&gt; __Max Length: 32__  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


