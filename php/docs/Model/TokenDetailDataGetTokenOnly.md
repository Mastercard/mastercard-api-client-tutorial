# # TokenDetailDataGetTokenOnly

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**token_number** | **string** | The Token Primary Account Number of the Card.  &lt;br&gt;__Max Length: 19__ &lt;br&gt;__Min Length: 9__ | [optional] 
**expiry_month** | **string** | The month of the token expiration date. &lt;br&gt; __Max Length: 2__ | [optional] 
**expiry_year** | **string** | The year of the token expiration date. &lt;br&gt; __Max Length: 2__ | [optional] 
**payment_account_reference** | **string** | The unique account reference assigned to the PAN. Conditionally returned if the Token Requestor has opted to receive PAR and providing PAR is assigned by Mastercard or the Issuer provides PAR in the authorization message response. &lt;br&gt;    __Max Length: 29__ | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


