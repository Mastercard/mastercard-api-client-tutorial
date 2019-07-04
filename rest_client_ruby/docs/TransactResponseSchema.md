# SwaggerClient::TransactResponseSchema

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response_id** | **String** | Unique identifier for the response.  | [optional] 
**response_host** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**encrypted_payload** | [**EncryptedPayloadTransact**](EncryptedPayloadTransact.md) |  | [optional] 
**errors** | [**TransactError**](TransactError.md) |  | [optional] 


