# SwaggerClient::GetDigitalAssetsApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**get_digital_assets**](GetDigitalAssetsApi.md#get_digital_assets) | **POST** /digitization/#env/1/0/getDigitalAssets | Used to retrieve digital assets derived from a funding PAN.


# **get_digital_assets**
> GetDigitalAssetsResponseSchema get_digital_assets(opts)

Used to retrieve digital assets derived from a funding PAN.

Get Digital Asset API is used to retrieve digital assets from a funding pan.  

### Example
```ruby
# load the gem
require 'swagger_client'

api_instance = SwaggerClient::GetDigitalAssetsApi.new

opts = { 
  encrypted_payload: SwaggerClient::GetDigitalAssetsRequestSchema.new # GetDigitalAssetsRequestSchema | Contains an encrypted CardAccountData object. 
}

begin
  #Used to retrieve digital assets derived from a funding PAN.
  result = api_instance.get_digital_assets(opts)
  p result
rescue SwaggerClient::ApiError => e
  puts "Exception when calling GetDigitalAssetsApi->get_digital_assets: #{e}"
end
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



