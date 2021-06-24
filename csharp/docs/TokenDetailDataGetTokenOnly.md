# Acme.App.MastercardApi.Client.Model.TokenDetailDataGetTokenOnly

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**TokenNumber** | **string** | The Token Primary Account Number of the Card.  | [optional] 
**ExpiryMonth** | **string** | The month of the token expiration date.  | [optional] 
**ExpiryYear** | **string** | The year of the token expiration date.  | [optional] 
**AccountHolderData** | [**AccountHolderDataOutbound**](AccountHolderDataOutbound.md) |  | [optional] 
**PaymentAccountReference** | **string** | The unique account reference assigned to the PAN. Conditionally returned if the Token Requestor has opted to receive PAR and providing PAR is assigned by Mastercard or the Issuer provides PAR in the authorization message response.  | [optional] 
**CardAccountData** | [**CardAccountDataOutbound**](CardAccountDataOutbound.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

