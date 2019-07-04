# TransactRequestSchema

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **str** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**request_id** | **str** | Unique identifier for the request.  | 
**token_unique_reference** | **str** | Globally unique identifier for the Token, as assigned by MDES.    __Max Length:64__  | 
**dsrp_type** | **str** | What type of DSRP cryptogram to create. Must be either UCAF or M_CHIP.     __Max Length:64__  | 
**unpredictable_number** | **str** | HEX Encoded data (case sensitive) provided by the merchant to provide variability and uniqueness to the generation of a cryptogram.  __Length:8__  | 
**amount** | **str** | Transaction amount to be authorized. Note that refund transactions are not supported � this value must be a positive amount and can contain up to 12 digits, inclusive of any digits in the currency exponent.     __Max Length:13__  | [optional] 
**currency_code** | **str** | The transaction currency. Expressed as a 3-character ISO 4217 currency code.  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


