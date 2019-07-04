# swagger_client.GetAssetApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**get_asset**](GetAssetApi.md#get_asset) | **GET** /assets/static/1/0/asset/{AssetId} | Used to retrieve static Assets from MDES�s repository, such as Card art, MasterCard brand logos, Issuer logos, and Terms and Conditions.


# **get_asset**
> AssetResponseSchema get_asset(asset_id)

Used to retrieve static Assets from MDES�s repository, such as Card art, MasterCard brand logos, Issuer logos, and Terms and Conditions.

This API is used to retrieve static Assets from MDES�s repository, such as - Card art, MasterCard brand logos, Issuers� logos, and Terms and Conditions. Every Asset in the repository is referenced using an Asset ID. Once an Asset has been assigned to an Asset ID, the contents of the Asset will not change. If contents do need to change (for example, Issuer has supplied new artwork for a product), they will be updated in the repository and be assigned a new Asset ID.  Different types of Assets are supported in the repository, such as images and text files; and for each type of Asset, multiple formats may be supported. For example, a single image Asset may be supported in various file formats; or variant sizes, allowing the Token Requestor to select the most appropriate format to use for a particular target device. 

### Example
```python
from __future__ import print_function
import time
import swagger_client
from swagger_client.rest import ApiException
from pprint import pprint

# create an instance of the API class
api_instance = swagger_client.GetAssetApi()
asset_id = 'asset_id_example' # str | An Asset ID corresponds to an individual Digital Asset. Digital Assets are returned as part of the Product Configuration from the Tokenize Response. The Asset ID itself is supplied as a Get request in the form of https://{INSERT ENVIRONMENT URL HERE}/mdes/assets/static/1/0/asset/{AssetID} - See JSON examples for details.  

try:
    # Used to retrieve static Assets from MDES�s repository, such as Card art, MasterCard brand logos, Issuer logos, and Terms and Conditions.
    api_response = api_instance.get_asset(asset_id)
    pprint(api_response)
except ApiException as e:
    print("Exception when calling GetAssetApi->get_asset: %s\n" % e)
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **asset_id** | **str**| An Asset ID corresponds to an individual Digital Asset. Digital Assets are returned as part of the Product Configuration from the Tokenize Response. The Asset ID itself is supplied as a Get request in the form of https://{INSERT ENVIRONMENT URL HERE}/mdes/assets/static/1/0/asset/{AssetID} - See JSON examples for details.   | 

### Return type

[**AssetResponseSchema**](AssetResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

