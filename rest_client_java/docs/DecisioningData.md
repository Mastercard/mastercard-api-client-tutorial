
# DecisioningData

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**recommendation** | **String** | __(OPTIONAL)__ &lt;br&gt; Digitization decision recommended by the Token Requestor. Must be either APPROVED (Recommend a decision of Approved), DECLINED (Recommend a decision of Decline). &lt;br&gt;   __Max Length:64__  |  [optional]
**recommendationAlgorithmVersion** | **String** | __(OPTIONAL)__ &lt;br&gt; Version of the algorithm used by the Token Requestor to determine its recommendation. Must be a value of \&quot;01\&quot;. Other values may be supported in the future.&lt;br&gt;     __Max Length:16__  |  [optional]
**deviceScore** | **String** | __(OPTIONAL)__ &lt;br&gt; Score assigned by the Token Requestor for the target device being provisioned. Must be a value from 1 to 5.  |  [optional]
**accountScore** | **String** | __(OPTIONAL)__ &lt;br&gt; Score assigned by the Token Requestor for the consumer account or relationship. Must be a value from 1 to 5.  |  [optional]
**recommendationReasons** | **List&lt;String&gt;** | __(OPTIONAL)__ &lt;br&gt; Code indicating the reasons the Token Requestor is suggesting the digitization decision.  See table here - https://developer.mastercard.com/page/mdes-digitization-recommendation-reason-codes  |  [optional]
**deviceCurrentLocation** | **String** | __(OPTIONAL)__ &lt;br&gt; Latitude and longitude in the format \&quot;(sign) latitude, (sign) longitude\&quot; with a precision of 2 decimal places.  Ex - \&quot;38.63, -90.25\&quot;  Latitude is between -90 and 90.  Longitude between -180 and 180. Relates to the target device being provisioned. If there is no target device, then this should be the current consumer location, if available. &lt;br&gt;    __Max Length:14__  |  [optional]
**deviceIpAddress** | **String** | __(OPTIONAL)__ &lt;br&gt; The IP address of the device through which the device reaches the internet. This may be a temporary or permanent IP address assigned to a home router, or the IP address of a gateway through which the device connects to a network. IPv4 address format of 4 octets separated by \&quot;.\&quot; Ex - 127.0.0.1 Relates to the target device being provisioned. If there is no target device, then this should be the current consumer IP address, if available.&lt;br&gt;     __Max Length:15__  |  [optional]
**mobileNumberSuffix** | **String** | __(OPTIONAL)__&lt;br&gt; The last few digits (typically four) of the consumer&#39;s mobile phone number as available on file or on the consumer&#39;s current device, which may or may not be the mobile number of the target device being provisioned.&lt;br&gt;     __Max Length:32__  |  [optional]
**accountIdHash** | **String** | __(OPTIONAL)__ &lt;br&gt; SHA-256 hash of the Cardholder�s account ID with the Token Requestor. Typically expected to be an email address.&lt;br&gt;  __Max Length:64__ Alpha-Numeric and Hex-encoded data (case-insensitive).  |  [optional]



