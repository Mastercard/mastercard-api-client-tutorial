# DecisioningData


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**recommendation** | **str** | **(OPTIONAL)** Digitization decision recommended by the Token Requestor. Must be either APPROVED (Recommend a decision of Approved), DECLINED (Recommend a decision of Decline).  | [optional] 
**recommendation_algorithm_version** | **str** | **(OPTIONAL)** Version of the algorithm used by the Token Requestor to determine its recommendation. Must be a value of \&quot;01\&quot;. Other values may be supported in the future.  | [optional] 
**device_score** | **str** | **(OPTIONAL)** Score assigned by the Token Requestor for the target device being provisioned. Must be a value from 1 to 5.  | [optional] 
**account_score** | **str** | **(OPTIONAL)** Score assigned by the Token Requestor for the consumer account or relationship. Must be a value from 1 to 5.  | [optional] 
**recommendation_reasons** | **List[str]** | **(OPTIONAL)** Code indicating the reasons the Token Requestor is suggesting the digitization decision.  See table here - https://developer.mastercard.com/mdes-digital-enablement/documentation/code-and-formats/#recommendation-reason-codes  | [optional] 
**device_current_location** | **str** | **(OPTIONAL)** Latitude and longitude in the format \&quot;(sign) latitude, (sign) longitude\&quot; with a precision of 2 decimal places.  Ex - \&quot;38.63, -90.25\&quot;  Latitude is between -90 and 90.  Longitude between -180 and 180. Relates to the target device being provisioned. If there is no target device, then this should be the current consumer location, if available.  | [optional] 
**device_ip_address** | **str** | **(OPTIONAL)** The IP address of the device through which the device reaches the internet. This may be a temporary or permanent IP address assigned to a home router, or the IP address of a gateway through which the device connects to a network. IPv4 address format of 4 octets separated by \&quot;.\&quot; Ex - 127.0.0.1 Relates to the target device being provisioned. If there is no target device, then this should be the current consumer IP address, if available.  | [optional] 
**mobile_number_suffix** | **str** | **(OPTIONAL)** The last few digits (typically four) of the consumer&#39;s mobile phone number as available on file or on the consumer&#39;s current device, which may or may not be the mobile number of the target device being provisioned.  | [optional] 
**account_id_hash** | **str** | **(OPTIONAL)** SHA-256 hash of the Cardholder?s account ID with the Token Requestor. Typically expected to be an email address.  | [optional] 

## Example

```python
from openapi_client.models.decisioning_data import DecisioningData

# TODO update the JSON string below
json = "{}"
# create an instance of DecisioningData from a JSON string
decisioning_data_instance = DecisioningData.from_json(json)
# print the JSON string representation of the object
print(DecisioningData.to_json())

# convert the object into a dict
decisioning_data_dict = decisioning_data_instance.to_dict()
# create an instance of DecisioningData from a dict
decisioning_data_from_dict = DecisioningData.from_dict(decisioning_data_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


