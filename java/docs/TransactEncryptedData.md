

# TransactEncryptedData


## Properties

| Name | Type | Description | Notes |
|------------ | ------------- | ------------- | -------------|
|**accountNumber** | **String** | The Primary Account Number for the transaction ? this is the Token PAN.  |  [optional] |
|**applicationExpiryDate** | **String** | Application expiry date for the Token. Expressed in YYMMDD format.  |  [optional] |
|**panSequenceNumber** | **String** | Application PAN sequence number for the Token  |  [optional] |
|**track2Equivalent** | **String** | Track 2 equivalent data for the Token. Expressed according to ISO/IEC 7813, excluding start sentinel, end sentinel, and Longitudinal Redundancy Check (LRC), using hex nibble &#39;D&#39; as field separator, and padded to whole bytes using one hex nibble &#39;F&#39; as needed.  |  [optional] |
|**de48se43Data** | **String** | Data for DE 48 Subelement 43 containing the cryptogram. DSRP cryptogram must be sent in DE104. Please refer to AN 3363 for details.  |  [optional] |



