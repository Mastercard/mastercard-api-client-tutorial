# SwaggerClient::CardInfoData

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_number** | **String** | __(Required as minimum for Tokenization)__ The account number to be encrypted for tokenization. Only supplied if panUniqueReference or tokenUniqueReferenceForPanInfo is not present.   __Min Length:9__&lt;br&gt; __Max Length:19__  | [optional] 
**expiry_month** | **String** | __(Required as minimum for Tokenization)__ The expiry month for the account. Only supplied if panUniqueReference or tokenUniqueReferenceForPanInfo is not present. Two numeric digits must be supplied. __Format: MM__&lt;br&gt; __Exact Length:2__  | [optional] 
**expiry_year** | **String** | __(Required as minimum for Tokenization)__  The expiry year for the account. Only supplied if panUniqueReference or tokenUniqueReferenceForPanInfo is not present. &lt;br&gt; __Format: YY__&lt;br&gt; __Exact Length:2__  | [optional] 
**source** | **String** | (__Required as minimum for Tokenization__)  The source of the account.   __Max Length:32__  | [optional] 
**cardholder_name** | **String** | __(OPTIONAL)__ The name of the cardholder&lt;br&gt; __Max Length:27__  | [optional] 
**security_code** | **String** | __(OPTIONAL)__ The security code for the account can optionally be provided for Tokenization. If provided, the validity will be checked.  __Max Length:3__  | [optional] 
**billing_address** | [**BillingAddress**](BillingAddress.md) |  | [optional] 


