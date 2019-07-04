# GetTaskStatusApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getTaskStatus**](GetTaskStatusApi.md#getTaskStatus) | **POST** /digitization/static/1/0/getTaskStatus | Used to check the status of any asynchronous task that was previously requested.


<a name="getTaskStatus"></a>
# **getTaskStatus**
> GetTaskStatusResponseSchema getTaskStatus(getTaskStatusRequestSchema)

Used to check the status of any asynchronous task that was previously requested.

Used to check the status of any asynchronous task that was previously requested. 

### Example
```java
// Import classes:
//import io.swagger.client.ApiException;
//import io.swagger.client.api.GetTaskStatusApi;


GetTaskStatusApi apiInstance = new GetTaskStatusApi();
GetTaskStatusRequestSchema getTaskStatusRequestSchema = new GetTaskStatusRequestSchema(); // GetTaskStatusRequestSchema | Contains the details of the request message. 
try {
    GetTaskStatusResponseSchema result = apiInstance.getTaskStatus(getTaskStatusRequestSchema);
    System.out.println(result);
} catch (ApiException e) {
    System.err.println("Exception when calling GetTaskStatusApi#getTaskStatus");
    e.printStackTrace();
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **getTaskStatusRequestSchema** | [**GetTaskStatusRequestSchema**](GetTaskStatusRequestSchema.md)| Contains the details of the request message.  | [optional]

### Return type

[**GetTaskStatusResponseSchema**](GetTaskStatusResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

