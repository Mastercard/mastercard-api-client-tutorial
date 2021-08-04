# # TransactRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_host** | **string** | The host that originated the request. Future calls in the same conversation may be routed to this host. | [optional]
**request_id** | **string** | Unique identifier for the request. |
**token_unique_reference** | **string** | Globally unique identifier for the Token, as assigned by MDES. |
**dsrp_type** | **string** | What type of DSRP cryptogram to create. Must be UCAF. |
**unpredictable_number** | **string** | HEX Encoded data (case sensitive) provided by the merchant to provide variability and uniqueness to the generation of a cryptogram. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
