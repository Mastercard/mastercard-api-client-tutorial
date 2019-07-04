# swagger_client.GetDigitalAssetsApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**get_digital_assets**](GetDigitalAssetsApi.md#get_digital_assets) | **POST** /digitization/#env/1/0/getDigitalAssets | Used to retrieve digital assets derived from a funding PAN.


# **get_digital_assets**
> GetDigitalAssetsResponseSchema get_digital_assets(encrypted_payload=encrypted_payload)

Used to retrieve digital assets derived from a funding PAN.

Get Digital Asset API is used to retrieve digital assets from a funding pan.  

### Example
```python
from __future__ import print_function
import time
import swagger_client
from swagger_client.rest import ApiException
from pprint import pprint

# create an instance of the API class
api_instance = swagger_client.GetDigitalAssetsApi()
encrypted_payload = swagger_client.GetDigitalAssetsRequestSchema() # GetDigitalAssetsRequestSchema | Contains an encrypted CardAccountData object.  (optional)

try:
    # Used to retrieve digital assets derived from a funding PAN.
    api_response = api_instance.get_digital_assets(encrypted_payload=encrypted_payload)
    pprint(api_response)
except ApiException as e:
    print("Exception when calling GetDigitalAssetsApi->get_digital_assets: %s\n" % e)
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **encrypted_payload** | [**GetDigitalAssetsRequestSchema**](GetDigitalAssetsRequestSchema.md)| Contains an encrypted CardAccountData object.  | [optional] 

### Return type

[**GetDigitalAssetsResponseSchema**](GetDigitalAssetsResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

