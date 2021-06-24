# Acme.App.MastercardApi.Client.Model.TransactEncryptedData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**AccountNumber** | **string** | The Primary Account Number for the transaction ? this is the Token PAN.  | [optional] 
**ApplicationExpiryDate** | **string** | Application expiry date for the Token. Expressed in YYMMDD format.  | [optional] 
**PanSequenceNumber** | **string** | Application PAN sequence number for the Token  | [optional] 
**Track2Equivalent** | **string** | Track 2 equivalent data for the Token. Expressed according to ISO/IEC 7813, excluding start sentinel, end sentinel, and Longitudinal Redundancy Check (LRC), using hex nibble &#39;D&#39; as field separator, and padded to whole bytes using one hex nibble &#39;F&#39; as needed.  | [optional] 
**De48se43Data** | **string** | Data for DE 48 Subelement 43 containing the cryptogram. DSRP cryptogram must be sent in DE104. Please refer to AN 3363 for details.  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

