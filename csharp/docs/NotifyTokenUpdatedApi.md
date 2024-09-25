# Acme.App.MastercardApi.Client.Api.NotifyTokenUpdatedApi

All URIs are relative to *https://api.mastercard.com/mdes*

| Method | HTTP request | Description |
|--------|--------------|-------------|
| [**NotifyTokenUpdateForTokenStateChange**](NotifyTokenUpdatedApi.md#notifytokenupdatefortokenstatechange) | **POST** /digitization/static/1/0/notifyTokenUpdated | Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed. |

<a id="notifytokenupdatefortokenstatechange"></a>
# **NotifyTokenUpdateForTokenStateChange**
> NotifyTokenUpdatedResponseSchema NotifyTokenUpdateForTokenStateChange (NotifyTokenUpdatedRequestSchema notifyTokenUpdatedRequestSchema = null)

Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.

This API is used by MDES to notify the Token Requestor of significant Token updates. Typical notification scenarios include  1. Informing the merchant a token is active 2. Informing the merchant a token has been suspended by the Issuer 3. Informing the merchant a token has been unsuspended by the Issuer 4. Informing the merchant a token has been deleted by the Issuer 5. Informing the merchant of a product configuration change (such as a change in Card Art) 6. Informing the merchant of underlying changes to the FPAN metadata associated to the token  **Connection Security**  Mastercard will connect via TLS protocol and verify the server certificate before establishing a connection to the client endpoint. During this handshake, the client server can request TLS client authentication. Mastercard will present a client certificate which identifies as ?ws.mastercard.com? This client certificate is issued by the Entrust L1K certificate and should be available in most trust stores.   **Conditional Objects**  The contents of the notifyTokenUpdated API will vary depending which of the above scneraios triggered the notification.  1. *productConfig* - Provided when Product Configuration has changed (e.g. such as card art). 2. *tokenInfo* - Provided when either the details of the token or associated FPAN have changed (such as token or PAN expiry).   The optional objects will always contain a minimum set of data which be returned regardless of whether or not updates have been made. These fields are denoted as required fields. 

### Example
```csharp
using System.Collections.Generic;
using System.Diagnostics;
using Acme.App.MastercardApi.Client.Api;
using Acme.App.MastercardApi.Client.Client;
using Acme.App.MastercardApi.Client.Model;

namespace Example
{
    public class NotifyTokenUpdateForTokenStateChangeExample
    {
        public static void Main()
        {
            Configuration config = new Configuration();
            config.BasePath = "https://api.mastercard.com/mdes";
            var apiInstance = new NotifyTokenUpdatedApi(config);
            var notifyTokenUpdatedRequestSchema = new NotifyTokenUpdatedRequestSchema(); // NotifyTokenUpdatedRequestSchema | Contains the details of the request message.  (optional) 

            try
            {
                // Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.
                NotifyTokenUpdatedResponseSchema result = apiInstance.NotifyTokenUpdateForTokenStateChange(notifyTokenUpdatedRequestSchema);
                Debug.WriteLine(result);
            }
            catch (ApiException  e)
            {
                Debug.Print("Exception when calling NotifyTokenUpdatedApi.NotifyTokenUpdateForTokenStateChange: " + e.Message);
                Debug.Print("Status Code: " + e.ErrorCode);
                Debug.Print(e.StackTrace);
            }
        }
    }
}
```

#### Using the NotifyTokenUpdateForTokenStateChangeWithHttpInfo variant
This returns an ApiResponse object which contains the response data, status code and headers.

```csharp
try
{
    // Outbound API used by MDES to notify the Token Requestor of significant Token updates, such as when the Token is activated, suspended, unsuspended or deleted; or when information about the Token or its product configuration has changed.
    ApiResponse<NotifyTokenUpdatedResponseSchema> response = apiInstance.NotifyTokenUpdateForTokenStateChangeWithHttpInfo(notifyTokenUpdatedRequestSchema);
    Debug.Write("Status Code: " + response.StatusCode);
    Debug.Write("Response Headers: " + response.Headers);
    Debug.Write("Response Body: " + response.Data);
}
catch (ApiException e)
{
    Debug.Print("Exception when calling NotifyTokenUpdatedApi.NotifyTokenUpdateForTokenStateChangeWithHttpInfo: " + e.Message);
    Debug.Print("Status Code: " + e.ErrorCode);
    Debug.Print(e.StackTrace);
}
```

### Parameters

| Name | Type | Description | Notes |
|------|------|-------------|-------|
| **notifyTokenUpdatedRequestSchema** | [**NotifyTokenUpdatedRequestSchema**](NotifyTokenUpdatedRequestSchema.md) | Contains the details of the request message.  | [optional]  |

### Return type

[**NotifyTokenUpdatedResponseSchema**](NotifyTokenUpdatedResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json


### HTTP response details
| Status code | Description | Response headers |
|-------------|-------------|------------------|
| **200** | Contains the details of the response message.  |  -  |

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

