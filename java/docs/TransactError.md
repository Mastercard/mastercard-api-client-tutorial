

# TransactError

Only returned in the event of an error condition for the Transact API

## Properties

| Name | Type | Description | Notes |
|------------ | ------------- | ------------- | -------------|
|**source** | **String** | An element used to indicate the source of the issue causing this error. Must be one of  * &#39;MDES&#39;  * &#39;INPUT&#39;  |  [optional] |
|**errorCode** | **String** | A reason code or information pertaining to the error that has occurred. This will contain the error reported by the platform (e.g. authentication errors) or service (e.g. invalid TUR)  |  [optional] |
|**description** | **String** | Description of the reason why the operation failed.  |  [optional] |
|**reasonCode** | **String** | A reason code or information pertaining to the error that has occurred from the service (e.g. invalid TUR). See API Response Errors  |  [optional] |
|**errorDescription** | **String** | **DEPRECATED** Use description instead.  |  [optional] |



