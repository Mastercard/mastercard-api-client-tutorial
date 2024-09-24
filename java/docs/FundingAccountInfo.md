

# FundingAccountInfo


## Properties

| Name | Type | Description | Notes |
|------------ | ------------- | ------------- | -------------|
|**panUniqueReference** | **String** | **(CONDITIONAL)** For repeat digitizations, the unique reference allocated to the Primary Account Number. When supplied, the tokenUniqueReferenceForPanInfo, accountNumber, expiryMonth and expiryYear must be omitted from CardInfoData. Only allowed if Only allowed if tokenUniqueReference and pushAccountReceipt are not present and encrypted data does not contain the account information.  |  [optional] |
|**tokenUniqueReference** | **String** | **(CONDITIONAL)** A unique reference assigned following the allocation of a token used to identify the token for the duration of its lifetime.  For repeat digitizations, the unique reference allocated to the token will be used to retrieve the financial account information. When supplied, the account information is omitted from FundingAccountData. Only allowed if panUniqueReference and pushAccountReceipt are not present and encrypted data does not contain the account information.  |  [optional] |
|**encryptedPayload** | [**FundingAccountInfoEncryptedPayload**](FundingAccountInfoEncryptedPayload.md) |  |  [optional] |



