# MdesForMerchants.TransactEncryptedData

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**accountNumber** | **String** | The Primary Account Number for the transaction � this is the Token PAN.  &lt;br&gt;__Min Length: 9__ &lt;br&gt;__Max Length: 19__  | [optional] 
**applicationExpiryDate** | **String** | Application expiry date for the Token. Expressed in YYMMDD format.  &lt;br&gt; __Length: 6__  | [optional] 
**panSequenceNumber** | **String** | Application PAN sequence number for the Token &lt;br&gt;  __Length: 2__  | [optional] 
**track2Equivalent** | **String** | Track 2 equivalent data for the Token. Expressed according to ISO/IEC 7813, excluding start sentinel, end sentinel, and Longitudinal Redundancy Check (LRC), using hex nibble &#39;D&#39; as field separator, and padded to whole bytes using one hex nibble &#39;F&#39; as needed.  &lt;br&gt;   __Max Length: 38__  | [optional] 
**de48se43Data** | **String** | Data for DE 48 Subelement 43 containing the cryptogram.&lt;br&gt; __Max Length: 32__  | [optional] 
**de55Data** | **String** | Data for DE 55 if present&lt;br&gt; __Max Length: 200__  | [optional] 


