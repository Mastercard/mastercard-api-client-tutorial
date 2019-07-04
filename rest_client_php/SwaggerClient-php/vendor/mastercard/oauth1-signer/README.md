# oauth1-signer-php

[![](https://travis-ci.org/Mastercard/oauth1-signer-php.svg?branch=master)](https://travis-ci.org/Mastercard/oauth1-signer-php)
[![](https://sonarcloud.io/api/project_badges/measure?project=Mastercard_oauth1-signer-php&metric=alert_status)](https://sonarcloud.io/dashboard?id=Mastercard_oauth1-signer-php) 
[![](https://img.shields.io/packagist/v/mastercard/oauth1-signer.svg)](https://packagist.org/packages/mastercard/oauth1-signer)
[![](https://img.shields.io/badge/license-MIT-yellow.svg)](https://github.com/Mastercard/oauth1-signer-php/blob/master/LICENSE)

## Table of Contents
- [Overview](#overview)
  * [Compatibility](#compatibility)
  * [References](#references)
- [Usage](#usage)
  * [Prerequisites](#prerequisites)
  * [Adding the Library to Your Project](#adding-the-library-to-your-project)
  * [Loading the Signing Key](#loading-the-signing-key) 
  * [Creating the OAuth Authorization Header](#creating-the-oauth-authorization-header)
  * [Signing HTTP Client Request Objects](#signing-http-client-request-objects)
  * [Integrating with OpenAPI Generator API Client Libraries](#integrating-with-openapi-generator-api-client-libraries)
  
## Overview <a name="overview"></a>
Zero dependency library for generating a Mastercard API compliant OAuth signature.

### Compatibility <a name="compatibility"></a>
PHP 5.6+

### References <a name="references"></a>
* [OAuth 1.0a specification](https://tools.ietf.org/html/rfc5849)
* [Body hash extension for non application/x-www-form-urlencoded payloads](https://tools.ietf.org/id/draft-eaton-oauth-bodyhash-00.html)

## Usage <a name="usage"></a>
### Prerequisites <a name="prerequisites"></a>
Before using this library, you will need to set up a project in the [Mastercard Developers Portal](https://developer.mastercard.com). 

As part of this set up, you'll receive credentials for your app:
* A consumer key (displayed on the Mastercard Developer Portal)
* A private request signing key (matching the public certificate displayed on the Mastercard Developer Portal)

### Adding the Library to Your Project <a name="adding-the-library-to-your-project"></a>

```shell
composer require mastercard/oauth1-signer
```

### Loading the Signing Key <a name="loading-the-signing-key"></a>

A private key object can be created by calling the `AuthenticationUtils::loadSigningKey` function:

```php
use Mastercard\Developer\OAuth\Utils\AuthenticationUtils;
// ...
$signingKey = AuthenticationUtils::loadSigningKey(
                '<insert PKCS#12 key file path>',
                '<insert key alias>', 
                '<insert key password>');
```

### Creating the OAuth Authorization Header <a name="creating-the-oauth-authorization-header"></a>
The method that does all the heavy lifting is `OAuth::getAuthorizationHeader`. You can call into it directly and as long as you provide the correct parameters, it will return a string that you can add into your request's `Authorization` header.

```php
use Mastercard\Developer\OAuth\OAuth;
// ...
$consumerKey = '<insert consumer key>';
$uri = 'https://sandbox.api.mastercard.com/service';
$method = 'POST';
$payload = 'Hello world!';
$authHeader = OAuth::getAuthorizationHeader($uri, $method, $payload, $consumerKey, $signingKey);
```

### Signing HTTP Client Request Objects <a name="signing-http-client-request-objects"></a>

Alternatively, you can use helper classes for some of the commonly used HTTP clients.

These classes, provided in the `Mastercard\Developer\Signers\` namespace, will modify the provided request object in-place and will add the correct `Authorization` header. Once instantiated with a consumer key and private key, these objects can be reused. 

Usage briefly described below, but you can also refer to the test namespace for examples. 

+ [cURL](#curl)
+ [GuzzleHttp](#guzzlehttp)

#### cURL <a name="curl"></a>

##### POST example

```php
use Mastercard\Developer\Signers\CurlRequestSigner;
// ...
$method = 'POST';
$uri = 'https://sandbox.api.mastercard.com/service';
$payload = json_encode(['foo' => 'bår']);
$headers = array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload)
);
$handle = curl_init($uri);
curl_setopt_array($handle, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_CUSTOMREQUEST => $method, CURLOPT_POSTFIELDS => $payload));
$signer = new CurlRequestSigner($consumerKey, $signingKey);
$signer->sign($handle, $method, $headers, $payload);
$result = curl_exec($handle);
curl_close($handle);
```

##### GET example

```php
use Mastercard\Developer\Signers\CurlRequestSigner;
// ...
$method = 'GET';
$baseUri = 'https://sandbox.api.mastercard.com/service';
$queryParams = array('param1' => 'with spaces', 'param2' => 'encoded#symbol');
$uri = $baseUri . '?' . http_build_query($queryParams);
$handle = curl_init($uri);
curl_setopt_array($handle, array(CURLOPT_RETURNTRANSFER => 1));
$signer = new CurlRequestSigner($consumerKey, $signingKey);
$signer->sign($handle, $method);
$result = curl_exec($handle);
curl_close($handle);
```

#### GuzzleHttp <a name="guzzlehttp"></a>
```php
use GuzzleHttp\Psr7\Request;
use Mastercard\Developer\Signers\PsrHttpMessageSigner;
// ...
$payload = '{"foo":"bår"}';
$headers = ['Content-Type' => 'application/json'];
$request = new Request('POST', 'https://sandbox.api.mastercard.com/service', $headers, $payload);
$signer = new PsrHttpMessageSigner($consumerKey, $signingKey);
$signer.sign($request);
```

### Integrating with OpenAPI Generator API Client Libraries <a name="integrating-with-openapi-generator-api-client-libraries"></a>

[OpenAPI Generator](https://github.com/OpenAPITools/openapi-generator) generates API client libraries from [OpenAPI Specs](https://github.com/OAI/OpenAPI-Specification). 
It provides generators and library templates for supporting multiple languages and frameworks.

This project provides you with classes you can use when configuring your API client. These classes will take care of adding the correct `Authorization` header before sending the request.

Generators currently supported:
+ [php](#php)

#### php <a name="php"></a>

##### OpenAPI Generator

Client libraries can be generated using the following command:
```shell
java -jar openapi-generator-cli.jar generate -i openapi-spec.yaml -g php -o out
```
See also: 
* [OpenAPI Generator (executable)](https://mvnrepository.com/artifact/org.openapitools/openapi-generator-cli)
* [CONFIG OPTIONS for php](https://github.com/OpenAPITools/openapi-generator/blob/master/docs/generators/php.md)

##### Usage of the `PsrHttpMessageSigner`

```php
use GuzzleHttp;
use OpenAPI\Client\Api\ServiceApi;
use OpenAPI\Client\Configuration
use Mastercard\Developer\Signers\PsrHttpMessageSigner;
// ...
$stack = new GuzzleHttp\HandlerStack();
$stack->setHandler(new GuzzleHttp\Handler\CurlHandler());
$stack->push(GuzzleHttp\Middleware::mapRequest([new PsrHttpMessageSigner($consumerKey, $signingKey), 'sign']));
$options = ['handler' => $stack];
$client = new GuzzleHttp\Client($options);
$config = new Configuration();
$config->setHost('https://sandbox.api.mastercard.com');
$serviceApi = new ServiceApi($client, $config);
// ...
```
