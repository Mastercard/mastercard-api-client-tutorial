# ErrorsResponse


## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**error_code** | **str** | **CONDITIONAL** Returned in the event of an error and contains the reason the operation failed. Only use if errors object is not present.  | [optional] 
**error_description** | **str** | **CONDITIONAL** Returned in the event of an error and contains a description of why the operation failed. Only use if errors object is not present.  | [optional] 
**response_host** | **str** | The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host.  | [optional] 
**response_id** | **str** | Unique identifier for the response.  | [optional] 
**errors** | [**Error**](Error.md) |  | [optional] 

## Example

```python
from openapi_client.models.errors_response import ErrorsResponse

# TODO update the JSON string below
json = "{}"
# create an instance of ErrorsResponse from a JSON string
errors_response_instance = ErrorsResponse.from_json(json)
# print the JSON string representation of the object
print(ErrorsResponse.to_json())

# convert the object into a dict
errors_response_dict = errors_response_instance.to_dict()
# create an instance of ErrorsResponse from a dict
errors_response_from_dict = ErrorsResponse.from_dict(errors_response_dict)
```
[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


