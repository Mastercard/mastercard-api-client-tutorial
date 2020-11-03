# MdesForMerchants.SearchTokensRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**requestId** | **String** | Unique identifier for the request.  | 
**responseHost** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**fundingAccountInfo** | [**FundingAccountInfo**](FundingAccountInfo.md) |  | [optional] 
**tokenRequestorId** | **String** | Identifies the Token Requestor. Only tokens associated with the token requestor will be returned. Length - 11.   | [optional] 


