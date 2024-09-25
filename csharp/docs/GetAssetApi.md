# Acme.App.MastercardApi.Client.Api.GetAssetApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|--------|--------------|-------------|
| [**GetAsset**](GetAssetApi.md#getasset) | **GET** /assets/static/1/0/asset/{AssetId} | Used to retrieve static Assets from the MDES repository. |

<a id="getasset"></a>
# **GetAsset**
> AssetResponseSchema GetAsset (string assetId)

Used to retrieve static Assets from the MDES repository.

This API is used to retrieve static Assets from MDES?s repository, such as - Card art, MasterCard brand logos, Issuers? logos, and Terms and Conditions. Every Asset in the repository is referenced using an Asset ID. Once an Asset has been assigned to an Asset ID, the contents of the Asset will not change. If contents do need to change (for example, Issuer has supplied new artwork for a product), they will be updated in the repository and be assigned a new Asset ID.  Different types of Assets are supported in the repository, such as images and text files; and for each type of Asset, multiple formats may be supported. For example, a single image Asset may be supported in various file formats; or variant sizes, allowing the Token Requestor to select the most appropriate format to use for a particular target device. 

### Example
```csharp
using System.Collections.Generic;
using System.Diagnostics;
using Acme.App.MastercardApi.Client.Api;
using Acme.App.MastercardApi.Client.Client;
using Acme.App.MastercardApi.Client.Model;

namespace Example
{
    public class GetAssetExample
    {
        public static void Main()
        {
            Configuration config = new Configuration();
            config.BasePath = "https://api.mastercard.com/mdes";
            var apiInstance = new GetAssetApi(config);
            var assetId = "assetId_example";  // string | An Asset ID corresponds to an individual Digital Asset. Digital Assets are returned as part of the Product Configuration from the Tokenize Response. The Asset ID itself is supplied as a Get request in the form of https://{INSERT ENVIRONMENT URL HERE}/mdes/assets/static/1/0/asset/{AssetID} - See JSON examples for details. 

            try
            {
                // Used to retrieve static Assets from the MDES repository.
                AssetResponseSchema result = apiInstance.GetAsset(assetId);
                Debug.WriteLine(result);
            }
            catch (ApiException  e)
            {
                Debug.Print("Exception when calling GetAssetApi.GetAsset: " + e.Message);
                Debug.Print("Status Code: " + e.ErrorCode);
                Debug.Print(e.StackTrace);
            }
        }
    }
}
```

#### Using the GetAssetWithHttpInfo variant
This returns an ApiResponse object which contains the response data, status code and headers.

```csharp
try
{
    // Used to retrieve static Assets from the MDES repository.
    ApiResponse<AssetResponseSchema> response = apiInstance.GetAssetWithHttpInfo(assetId);
    Debug.Write("Status Code: " + response.StatusCode);
    Debug.Write("Response Headers: " + response.Headers);
    Debug.Write("Response Body: " + response.Data);
}
catch (ApiException e)
{
    Debug.Print("Exception when calling GetAssetApi.GetAssetWithHttpInfo: " + e.Message);
    Debug.Print("Status Code: " + e.ErrorCode);
    Debug.Print(e.StackTrace);
}
```

### Parameters

| Name | Type | Description | Notes |
|------|------|-------------|-------|
| **assetId** | **string** | An Asset ID corresponds to an individual Digital Asset. Digital Assets are returned as part of the Product Configuration from the Tokenize Response. The Asset ID itself is supplied as a Get request in the form of https://{INSERT ENVIRONMENT URL HERE}/mdes/assets/static/1/0/asset/{AssetID} - See JSON examples for details.  |  |

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
| **200** | Contains the details of the response message.  |  -  |
| **0** | unexpected error  |  -  |

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

