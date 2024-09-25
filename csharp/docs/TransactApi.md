# Acme.App.MastercardApi.Client.Api.TransactApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|--------|--------------|-------------|
| [**CreateTransact**](TransactApi.md#createtransact) | **POST** /remotetransaction/static/1/0/transact | Used by the Token Requestor to create a Digital Secure Remote Payment (\&quot;DSRP\&quot;) transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction. |

<a id="createtransact"></a>
# **CreateTransact**
> TransactResponseSchema CreateTransact (TransactRequestSchema transactRequestSchema = null)

Used by the Token Requestor to create a Digital Secure Remote Payment (\"DSRP\") transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.

This API is used by the Token Requestor to create a Digital Secure Remote Payment (\"DSRP\") transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction through a payment processor.  The entire response is encrypted. The caller may only transact using the Tokens belonging to them. 

### Example
```csharp
using System.Collections.Generic;
using System.Diagnostics;
using Acme.App.MastercardApi.Client.Api;
using Acme.App.MastercardApi.Client.Client;
using Acme.App.MastercardApi.Client.Model;

namespace Example
{
    public class CreateTransactExample
    {
        public static void Main()
        {
            Configuration config = new Configuration();
            config.BasePath = "https://api.mastercard.com/mdes";
            var apiInstance = new TransactApi(config);
            var transactRequestSchema = new TransactRequestSchema(); // TransactRequestSchema | Contains the details of the request message.  (optional) 

            try
            {
                // Used by the Token Requestor to create a Digital Secure Remote Payment (\"DSRP\") transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.
                TransactResponseSchema result = apiInstance.CreateTransact(transactRequestSchema);
                Debug.WriteLine(result);
            }
            catch (ApiException  e)
            {
                Debug.Print("Exception when calling TransactApi.CreateTransact: " + e.Message);
                Debug.Print("Status Code: " + e.ErrorCode);
                Debug.Print(e.StackTrace);
            }
        }
    }
}
```

#### Using the CreateTransactWithHttpInfo variant
This returns an ApiResponse object which contains the response data, status code and headers.

```csharp
try
{
    // Used by the Token Requestor to create a Digital Secure Remote Payment (\"DSRP\") transaction cryptogram using the credentials stored within MDES in order to perform a DSRP transaction.
    ApiResponse<TransactResponseSchema> response = apiInstance.CreateTransactWithHttpInfo(transactRequestSchema);
    Debug.Write("Status Code: " + response.StatusCode);
    Debug.Write("Response Headers: " + response.Headers);
    Debug.Write("Response Body: " + response.Data);
}
catch (ApiException e)
{
    Debug.Print("Exception when calling TransactApi.CreateTransactWithHttpInfo: " + e.Message);
    Debug.Print("Status Code: " + e.ErrorCode);
    Debug.Print(e.StackTrace);
}
```

### Parameters

| Name | Type | Description | Notes |
|------|------|-------------|-------|
| **transactRequestSchema** | [**TransactRequestSchema**](TransactRequestSchema.md) | Contains the details of the request message.  | [optional]  |

### Return type

[**TransactResponseSchema**](TransactResponseSchema.md)

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

