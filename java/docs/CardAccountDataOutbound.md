

# CardAccountDataOutbound

__(CONDITIONAL)__<br> The credit or debit card information for the account that is being tokenized.  Present in tokenize response if supported by the Token Requestor, if using a pushAccountReceipt and if there is a card account associated with the pushAccountReceipt in case that the issuer decision is not DECLINED. </br> 
## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**accountNumber** | **String** |  The account number of the credit or debit card.   __Min Length:9__&lt;br&gt;  __Max Length:19__  |  [optional]
**expiryMonth** | **String** |   The expiry month for the account. Two numeric digits must be supplied.   __Format: MM__&lt;br&gt; __Exact Length:2__  |  [optional]
**expiryYear** | **String** | __(Required as minimum for Tokenization)__  The expiry year for the account. __Format: YY__ &lt;br&gt; __Exact Length:2__  |  [optional]



