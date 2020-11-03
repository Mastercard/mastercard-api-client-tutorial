# DigitalEnablementClient\GetTaskStatusApi

All URIs are relative to *https://api.mastercard.com/mdes*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getTaskStatus**](GetTaskStatusApi.md#getTaskStatus) | **POST** /digitization/static/1/0/getTaskStatus | Used to check the status of any asynchronous task that was previously requested.



## getTaskStatus

> \DigitalEnablementClient\Model\GetTaskStatusResponseSchema getTaskStatus($get_task_status_request_schema)

Used to check the status of any asynchronous task that was previously requested.

Used to check the status of any asynchronous task that was previously requested.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new DigitalEnablementClient\Api\GetTaskStatusApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$get_task_status_request_schema = new \DigitalEnablementClient\Model\GetTaskStatusRequestSchema(); // \DigitalEnablementClient\Model\GetTaskStatusRequestSchema | Contains the details of the request message.

try {
    $result = $apiInstance->getTaskStatus($get_task_status_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GetTaskStatusApi->getTaskStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **get_task_status_request_schema** | [**\DigitalEnablementClient\Model\GetTaskStatusRequestSchema**](../Model/GetTaskStatusRequestSchema.md)| Contains the details of the request message. | [optional]

### Return type

[**\DigitalEnablementClient\Model\GetTaskStatusResponseSchema**](../Model/GetTaskStatusResponseSchema.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

