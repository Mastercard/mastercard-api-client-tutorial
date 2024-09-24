

# TransactRequestSchema


## Properties

| Name | Type | Description | Notes |
|------------ | ------------- | ------------- | -------------|
|**responseHost** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  |  [optional] |
|**requestId** | **String** | Unique identifier for the request.  |  |
|**tokenUniqueReference** | **String** | Globally unique identifier for the Token, as assigned by MDES.  |  |
|**dsrpType** | **String** | What type of DSRP cryptogram to create. Must be UCAF.  |  |
|**unpredictableNumber** | **String** | HEX Encoded data (case sensitive) provided by the merchant to provide variability and uniqueness to the generation of a cryptogram.  |  [optional] |



