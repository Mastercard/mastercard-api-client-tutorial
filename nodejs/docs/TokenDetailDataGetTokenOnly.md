# MdesForMerchants.TokenDetailDataGetTokenOnly

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**tokenNumber** | **String** | The Token Primary Account Number of the Card.  &lt;br&gt;__Max Length: 19__ &lt;br&gt;__Min Length: 9__  | [optional] 
**expiryMonth** | **String** | The month of the token expiration date. &lt;br&gt; __Max Length: 2__  | [optional] 
**expiryYear** | **String** | The year of the token expiration date. &lt;br&gt; __Max Length: 2__  | [optional] 
**paymentAccountReference** | **String** | The unique account reference assigned to the PAN. Conditionally returned if the Token Requestor has opted to receive PAR and providing PAR is assigned by Mastercard or the Issuer provides PAR in the authorization message response. &lt;br&gt;    __Max Length: 29__  | [optional] 


