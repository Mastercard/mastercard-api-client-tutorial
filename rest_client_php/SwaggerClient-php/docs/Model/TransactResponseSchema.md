# TransactResponseSchema

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_id** | **string** | Unique identifier for the response. | [optional] 
**response_host** | **string** | The host that originated the request. Future calls in the same conversation may be routed to this host. | [optional] 
**encrypted_payload** | [**\Swagger\Client\Model\EncryptedPayloadTransact**](EncryptedPayloadTransact.md) |  | [optional] 
**errors** | [**\Swagger\Client\Model\TransactError**](TransactError.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


