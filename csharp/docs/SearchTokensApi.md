# Acme.App.MastercardApi.Client.Api.SearchTokensApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|--------|--------------|-------------|
| [**SearchTokens**](SearchTokensApi.md#searchtokens) | **POST** /digitization/static/1/0/searchTokens | Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN. |

<a id="searchtokens"></a>
# **SearchTokens**
> SearchTokensResponseSchema SearchTokens (SearchTokensRequestSchema searchTokensRequestSchema = null)

Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.

This API is used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN. It may be used to check current Token(s) state or, in exception scenarios (such as network time out), to ensure that external systems remain in sync with the Token state as maintained by MDES. Deactivated tokens are not returned. 

### Example
```csharp
using System.Collections.Generic;
using System.Diagnostics;
using Acme.App.MastercardApi.Client.Api;
using Acme.App.MastercardApi.Client.Client;
using Acme.App.MastercardApi.Client.Model;

namespace Example
{
    public class SearchTokensExample
    {
        public static void Main()
        {
            Configuration config = new Configuration();
            config.BasePath = "https://api.mastercard.com/mdes";
            var apiInstance = new SearchTokensApi(config);
            var searchTokensRequestSchema = new SearchTokensRequestSchema(); // SearchTokensRequestSchema | Contains the details of the request message.  (optional) 

            try
            {
                // Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.
                SearchTokensResponseSchema result = apiInstance.SearchTokens(searchTokensRequestSchema);
                Debug.WriteLine(result);
            }
            catch (ApiException  e)
            {
                Debug.Print("Exception when calling SearchTokensApi.SearchTokens: " + e.Message);
                Debug.Print("Status Code: " + e.ErrorCode);
                Debug.Print(e.StackTrace);
            }
        }
    }
}
```

#### Using the SearchTokensWithHttpInfo variant
This returns an ApiResponse object which contains the response data, status code and headers.

```csharp
try
{
    // Used to get basic token information for all tokens on a specified device, or all tokens mapped to the given Account PAN.
    ApiResponse<SearchTokensResponseSchema> response = apiInstance.SearchTokensWithHttpInfo(searchTokensRequestSchema);
    Debug.Write("Status Code: " + response.StatusCode);
    Debug.Write("Response Headers: " + response.Headers);
    Debug.Write("Response Body: " + response.Data);
}
catch (ApiException e)
{
    Debug.Print("Exception when calling SearchTokensApi.SearchTokensWithHttpInfo: " + e.Message);
    Debug.Print("Status Code: " + e.ErrorCode);
    Debug.Print(e.StackTrace);
}
```

### Parameters

| Name | Type | Description | Notes |
|------|------|-------------|-------|
| **searchTokensRequestSchema** | [**SearchTokensRequestSchema**](SearchTokensRequestSchema.md) | Contains the details of the request message.  | [optional]  |

### Return type

[**SearchTokensResponseSchema**](SearchTokensResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json


### HTTP response details
| Status code | Description | Response headers |
|-------------|-------------|------------------|
| **200** | Contains the details of the response message.  |  -  |
| **401** | Example gateway error response  |  -  |
| **500** | Example application error response  |  -  |

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

