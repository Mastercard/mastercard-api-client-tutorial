

# TransactRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**responseHost** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  |  [optional]
**requestId** | **String** | Unique identifier for the request.  | 
**tokenUniqueReference** | **String** | Globally unique identifier for the Token, as assigned by MDES.    __Max Length:64__  | 
**dsrpType** | **String** | What type of DSRP cryptogram to create. Must be either UCAF or M_CHIP.     __Max Length:64__  | 
**unpredictableNumber** | **String** | __CONDITIONAL__&lt;br&gt;HEX Encoded data (case sensitive) provided by the merchant to provide variability and uniqueness to the generation of a cryptogram.  Required if the shouldGenerateUnpredictableNumber flag is not set during on-boarding.&lt;br&gt; __Length:8__            |  [optional]



