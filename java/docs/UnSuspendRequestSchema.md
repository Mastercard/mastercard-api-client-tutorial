

# UnSuspendRequestSchema


## Properties

| Name | Type | Description | Notes |
|------------ | ------------- | ------------- | -------------|
|**responseHost** | **String** | The host that originated the request. Future calls in the same conversation may be routed to this host.  |  [optional] |
|**requestId** | **String** | Unique identifier for the request.  |  |
|**paymentAppInstanceId** | **String** | Identifier for the specific Mobile Payment App instance, unique across a given Wallet Identifier. This value cannot be changed after digitization. This field is alphanumeric and additionally web-safe base64 characters per RFC 4648 (minus \&quot;-\&quot;, underscore \&quot;_\&quot;) up to a maximum length of 48, &#x3D; should not be URL encoded. Conditional - not applicable for server based tokens but required otherwise.  |  [optional] |
|**tokenUniqueReferences** | **List&lt;String&gt;** | The specific Token to be unsuspended. Array of more or more valid references as assigned by MDES  |  |
|**causedBy** | **String** | Who or what caused the Token to be unsuspended. Must be either the &#39;CARDHOLDER&#39; (operation requested by the Cardholder) or &#39;TOKEN_REQUESTOR&#39; (operation requested by the token requestor).  |  |
|**reason** | **String** | Free form reason why the Tokens are being suspended.  |  [optional] |
|**reasonCode** | **String** | The reason for the action to be unsuspended. Must be one of &#39;SUSPECTED_FRAUD&#39; (suspected fraudulent token transactions), &#39;OTHER&#39; (Other - default used if value not provided).  |  |



