

# TokenizeResponseSchema


## Properties

| Name | Type | Description | Notes |
|------------ | ------------- | ------------- | -------------|
|**responseHost** | **String** | The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host.  |  [optional] |
|**responseId** | **String** | Unique identifier for the response.  |  [optional] |
|**decision** | **String** | The tokenization decision for this digitization request. Must be either APPROVED (Digitization request was approved), DECLINED (Digitization request was declined) OR REQUIRE_ADDITIONAL_AUTHENTICATION Digitization request was approved but optionally requires additional authentication. One or more Authentication methods may be provided).  |  [optional] |
|**authenticationMethods** | [**List&lt;AuthenticationMethods&gt;**](AuthenticationMethods.md) |  |  [optional] |
|**tokenUniqueReference** | **String** | The unique reference allocated to the new Token. Serves as a unique identifier for all subsequent queries or management functions relating to this Token. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.  |  [optional] |
|**panUniqueReference** | **String** | The unique reference allocated to the Account Primary Account Number. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.  |  [optional] |
|**productConfig** | [**ProductConfig**](ProductConfig.md) |  |  [optional] |
|**tokenInfo** | [**TokenInfo**](TokenInfo.md) |  |  [optional] |
|**tokenDetail** | [**TokenDetail**](TokenDetail.md) |  |  [optional] |
|**supportsAuthentication** | **Boolean** | (required)Flag to indicate if the issuer supports authentication of the cardholder on the token. Must be one of:   - TRUE   - FALSE  |  [optional] |



