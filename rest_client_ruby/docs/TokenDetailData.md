# SwaggerClient::TokenDetailData

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**token_number** | **String** | Globally unique identifier for the Token, as assigned by MDES.     __Max Length:64__  | [optional] 
**expiry_month** | **String** | The expiry month for the account.  | [optional] 
**expiry_year** | **String** | The expiry year for the account.  | [optional] 
**data_valid_until_timestamp** | **String** | \&quot;The date/time after which this CardInfoData object is considered invalid. If present, all systems must reject this CardInfoData object after this time and treat it as invalid data. Must be expressed in ISO 8601 extended format as one of the following: YYYY-MM-DDThh:mm:ss[.sss]Z YYYY-MM-DDThh:mm:ss[.sss]�hh:mm Where [.sss] is optional and can be 1 to 3 digits. Must be a value no more than 30 days in the future. MasterCard recommends using a value of (Current Time + 30 minutes).\&quot;  | [optional] 
**payment_account_reference** | **String** | \&quot;The unique account reference assigned to the PAN. Conditionally returned if the Token Requestor has opted to receive PAR and providing PAR is assigned by Mastercard or the Issuer provides PAR in the authorization message response.    __Max Length:__ - 29\&quot;  | [optional] 


