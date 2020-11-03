# # TransactRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **string** | The host that originated the request. Future calls in the same conversation may be routed to this host. | [optional] 
**request_id** | **string** | Unique identifier for the request. | 
**token_unique_reference** | **string** | Globally unique identifier for the Token, as assigned by MDES.    __Max Length:64__ | 
**dsrp_type** | **string** | What type of DSRP cryptogram to create. Must be either UCAF or M_CHIP.     __Max Length:64__ | 
**unpredictable_number** | **string** | __CONDITIONAL__&lt;br&gt;HEX Encoded data (case sensitive) provided by the merchant to provide variability and uniqueness to the generation of a cryptogram.  Required if the shouldGenerateUnpredictableNumber flag is not set during on-boarding.&lt;br&gt; __Length:8__ | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


