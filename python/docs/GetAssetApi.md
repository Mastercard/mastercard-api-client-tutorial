# openapi_client.GetAssetApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**get_asset**](GetAssetApi.md#get_asset) | **GET** /assets/static/1/0/asset/{AssetId} | Used to retrieve static Assets from the MDES repository.


# **get_asset**
> AssetResponseSchema get_asset(asset_id)

Used to retrieve static Assets from the MDES repository.

This API is used to retrieve static Assets from MDES?s repository, such as - Card art, MasterCard brand logos, Issuers? logos, and Terms and Conditions. Every Asset in the repository is referenced using an Asset ID. Once an Asset has been assigned to an Asset ID, the contents of the Asset will not change. If contents do need to change (for example, Issuer has supplied new artwork for a product), they will be updated in the repository and be assigned a new Asset ID.  Different types of Assets are supported in the repository, such as images and text files; and for each type of Asset, multiple formats may be supported. For example, a single image Asset may be supported in various file formats; or variant sizes, allowing the Token Requestor to select the most appropriate format to use for a particular target device. 

### Example


```python
import openapi_client
from openapi_client.models.asset_response_schema import AssetResponseSchema
from openapi_client.rest import ApiException
from pprint import pprint

# Defining the host is optional and defaults to https://api.mastercard.com/mdes
# See configuration.py for a list of all supported configuration parameters.
configuration = openapi_client.Configuration(
    host = "https://api.mastercard.com/mdes"
)


# Enter a context with an instance of the API client
with openapi_client.ApiClient(configuration) as api_client:
    # Create an instance of the API class
    api_instance = openapi_client.GetAssetApi(api_client)
    asset_id = 'asset_id_example' # str | An Asset ID corresponds to an individual Digital Asset. Digital Assets are returned as part of the Product Configuration from the Tokenize Response. The Asset ID itself is supplied as a Get request in the form of https://{INSERT ENVIRONMENT URL HERE}/mdes/assets/static/1/0/asset/{AssetID} - See JSON examples for details. 

    try:
        # Used to retrieve static Assets from the MDES repository.
        api_response = api_instance.get_asset(asset_id)
        print("The response of GetAssetApi->get_asset:\n")
        pprint(api_response)
    except Exception as e:
        print("Exception when calling GetAssetApi->get_asset: %s\n" % e)
```



### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **asset_id** | **str**| An Asset ID corresponds to an individual Digital Asset. Digital Assets are returned as part of the Product Configuration from the Tokenize Response. The Asset ID itself is supplied as a Get request in the form of https://{INSERT ENVIRONMENT URL HERE}/mdes/assets/static/1/0/asset/{AssetID} - See JSON examples for details.  | 

### Return type

[**AssetResponseSchema**](AssetResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

### HTTP response details

| Status code | Description | Response headers |
|-------------|-------------|------------------|
**200** | Contains the details of the response message.  |  -  |
**0** | unexpected error  |  -  |

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

