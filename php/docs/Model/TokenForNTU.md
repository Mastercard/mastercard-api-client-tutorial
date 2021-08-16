# # TokenForNTU

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**token_unique_reference** | **string** | The unique reference allocated to the Token which is always present even if an error occurs. &lt;br&gt; maxLength: 64 | [optional]
**token_requestor_id** | **string** | Identifies the Token Requestor. &lt;br&gt; minLength: 11 maxLength: 11 | [optional]
**status** | **string** | The current status of Token. Must be either: * &#39;INACTIVE&#39; (Token has not yet been activated) * &#39;ACTIVE&#39; (Token is active and ready to transact) * &#39;SUSPENDED&#39; (Token is suspended and unable to transact) * &#39;DEACTIVATED&#39; (Token has been permanently deactivated).&lt;br&gt; maxLength: 32 | [optional]
**event_reason_code** | **string** | An optional Reason Code provided by the Issuer to explain why the token status has changed. Not present if the Issuer has not supplied a reason code. Note: Recommended that Partners be resilient to new values as new reason codes may be added in the future without notice. * &#39;DEVICE_LOST&#39; - Cardholder confirmed token device lost. * &#39;DEVICE_STOLEN&#39; - Cardholder confirmed token device stolen. * &#39;SUSPECTED_FRAUD&#39; -  Issuer or cardholder reported fraudulent token transactions. * &#39;ACCOUNT_CLOSED&#39; - Account closed. * &#39;NOT_FRAUD&#39; - Issuer or cardholder confirmed no fraudulent token transactions. * &#39;DEVICE_FOUND&#39; - Cardholder reported token device found or not stolen. * &#39;REDIGITIZATION_COMPLETE&#39; - Token has been re-digitized successfully with either the expiry date extended or both expiry and token number changed. * &#39;OTHER&#39; -  Other. &lt;br&gt; maxLength: 32 | [optional]
**suspended_by** | **string[]** | (CONDITIONAL only supplied if status is SUSPENDED) Who or what caused the Token to be suspended One or more values of:   * ISSUER - Suspended by the Issuer.   * TOKEN_REQUESTOR - Suspended by the Token Requestor   * MOBILE_PIN_LOCKED - Suspended due to the Mobile PIN being locked   * CARDHOLDER - Suspended by the Cardholder &lt;br&gt; | [optional]
**status_timestamp** | **string** | The date and time the token status was last updated. Expressed in ISO 8601 extended format as one of the following:   * YYYY-MM-DDThh:mm:ss[.sss]Z   * YYYY-MM-DDThh:mm:ss[.sss]±hh:mm   * Where [.sss] is optional and can be 1 to 3 digits. &lt;br&gt; | [optional]
**product_config** | [**\DigitalEnablementClient\Model\ProductConfig**](ProductConfig.md) |  | [optional]
**token_info** | [**\DigitalEnablementClient\Model\TokenInfoForNTUAndGetToken**](TokenInfoForNTUAndGetToken.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)