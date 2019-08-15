# client-encryption-php

[![](https://travis-ci.org/Mastercard/client-encryption-php.svg?branch=master)](https://travis-ci.org/Mastercard/client-encryption-php)
[![](https://sonarcloud.io/api/project_badges/measure?project=Mastercard_client-encryption-php&metric=alert_status)](https://sonarcloud.io/dashboard?id=Mastercard_client-encryption-php) 
[![](https://img.shields.io/packagist/v/mastercard/client-encryption.svg)](https://packagist.org/packages/mastercard/client-encryption)
[![](https://img.shields.io/badge/license-MIT-yellow.svg)](https://github.com/Mastercard/client-encryption-php/blob/master/LICENSE)

## Table of Contents
- [Overview](#overview)
  * [Compatibility](#compatibility)
  * [References](#references)
- [Usage](#usage)
  * [Prerequisites](#prerequisites)
  * [Adding the Library to Your Project](#adding-the-library-to-your-project)
  * [Loading the Encryption Certificate](#loading-the-encryption-certificate) 
  * [Loading the Decryption Key](#loading-the-decryption-key)
  * [Performing Field Level Encryption and Decryption](#performing-field-level-encryption-and-decryption)
  * [Integrating with OpenAPI Generator API Client Libraries](#integrating-with-openapi-generator-api-client-libraries)

## Overview <a name="overview"></a>
Library for Mastercard API compliant payload encryption/decryption.

### Compatibility <a name="compatibility"></a>
PHP 5.6+

### References <a name="references"></a>
<img src="https://user-images.githubusercontent.com/3964455/55345820-c520a280-54a8-11e9-8235-407199fa1d97.png" alt="Encryption of sensitive data" width="75%" height="75%"/>

## Usage <a name="usage"></a>
### Prerequisites <a name="prerequisites"></a>
Before using this library, you will need to set up a project in the [Mastercard Developers Portal](https://developer.mastercard.com). 

As part of this set up, you'll receive:
* A public request encryption certificate (aka _Client Encryption Keys_)
* A private response decryption key (aka _Mastercard Encryption Keys_)

### Adding the Library to Your Project <a name="adding-the-library-to-your-project"></a>

```shell
composer require mastercard/client-encryption
```

### Loading the Encryption Certificate <a name="loading-the-encryption-certificate"></a>

A certificate resource can be created from a file by calling `EncryptionUtils::loadEncryptionCertificate`:
```php
use Mastercard\Developer\Utils\EncryptionUtils;
// ...
$encryptionCertificate = EncryptionUtils::loadEncryptionCertificate('<insert certificate file path>');
```

Supported certificate formats: PEM, DER.

### Loading the Decryption Key <a name="loading-the-decryption-key"></a>

#### From a PKCS#12 Key Store

A private key resource can be created from a PKCS#12 key store by calling `EncryptionUtils::loadDecryptionKey` the following way:
```php
use Mastercard\Developer\Utils\EncryptionUtils;
// ...
$decryptionKey = EncryptionUtils::loadDecryptionKey(
                                    '<insert PKCS#12 key file path>', 
                                    '<insert key alias>', 
                                    '<insert key password>');
```

#### From an Unencrypted Key File

A private key resource can be created from an unencrypted key file by calling `EncryptionUtils::loadDecryptionKey` the following way:
```php
use Mastercard\Developer\Utils\EncryptionUtils;
// ...
$decryptionKey = EncryptionUtils::loadDecryptionKey('<insert key file path>');
```

Supported RSA key formats:
* PKCS#1 PEM (starts with '-----BEGIN RSA PRIVATE KEY-----')
* PKCS#8 PEM (starts with '-----BEGIN PRIVATE KEY-----')
* Binary DER-encoded PKCS#8

### Performing Field Level Encryption and Decryption <a name="performing-field-level-encryption-and-decryption"></a>

+ [Introduction](#introduction)
+ [Configuring the Field Level Encryption](#configuring-the-field-level-encryption)
+ [Performing Encryption](#performing-encryption)
+ [Performing Decryption](#performing-decryption)
+ [Encrypting Entire Payloads](#encrypting-entire-payloads)
+ [Decrypting Entire Payloads](#decrypting-entire-payloads)
+ [Using HTTP Headers for Encryption Params](#using-http-headers-for-encryption-params)

#### Introduction <a name="introduction"></a>

The core methods responsible for payload encryption and decryption are `encryptPayload` and `decryptPayload` in the `FieldLevelEncryption` class.

* `encryptPayload` usage:
```php
use Mastercard\Developer\Encryption;
// ...
$encryptedRequestPayload = FieldLevelEncryption::encryptPayload($requestPayload, $config);
```

* `decryptPayload` usage:
```php
use Mastercard\Developer\Encryption;
// ...
$responsePayload = FieldLevelEncryption::decryptPayload($encryptedResponsePayload, $config);
```

#### Configuring the Field Level Encryption <a name="configuring-the-field-level-encryption"></a>
Use the `FieldLevelEncryptionConfigBuilder` to create `FieldLevelEncryptionConfig` instances. Example:
```php
use Mastercard\Developer\Encryption;
// ...
$config = FieldLevelEncryptionConfigBuilder::aFieldLevelEncryptionConfig()
    ->withEncryptionCertificate($encryptionCertificate)
    ->withDecryptionKey($decryptionKey)
    ->withEncryptionPath('$.path.to.foo', '$.path.to.encryptedFoo')
    ->withDecryptionPath('$.path.to.encryptedFoo', '$.path.to.foo')
    ->withOaepPaddingDigestAlgorithm('SHA-256')
    ->withEncryptedValueFieldName('encryptedValue')
    ->withEncryptedKeyFieldName('encryptedKey')
    ->withIvFieldName('iv')
    ->withFieldValueEncoding(FieldValueEncoding::HEX)
    ->build();
```

See also:
* [FieldLevelEncryptionConfig.php](https://github.com/Mastercard/client-encryption-php/blob/master/src/Developer/Encryption/FieldLevelEncryptionConfig.php) for all config options
* [Service configurations in PHP](https://github.com/Mastercard/client-encryption-php/wiki/Service-Configurations-in-PHP) wiki page

#### Performing Encryption <a name="performing-encryption"></a>

Call `FieldLevelEncryption::encryptPayload` with a JSON request payload and a `FieldLevelEncryptionConfig` instance.

Example using the configuration [above](#configuring-the-field-level-encryption):
```php
use Mastercard\Developer\Encryption;
// ...
$payload = '{
    "path": {
        "to": {
            "foo": {
                "sensitiveField1": "sensitiveValue1",
                "sensitiveField2": "sensitiveValue2"
            }
        }
    }
}';
$encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);
echo (json_encode(json_decode($encryptedPayload), JSON_PRETTY_PRINT));
```

Output:
```json
{
    "path": {
        "to": {
            "encryptedFoo": {
                "iv": "7f1105fb0c684864a189fb3709ce3d28",
                "encryptedKey": "67f467d1b653d98411a0c6d3c(...)ffd4c09dd42f713a51bff2b48f937c8",
                "encryptedValue": "b73aabd267517fc09ed72455c2(...)dffb5fa04bf6e6ce9ade1ff514ed6141"
            }
        }
    }
}
```

#### Performing Decryption <a name="performing-decryption"></a>

Call `FieldLevelEncryption::decryptPayload` with a JSON response payload and a `FieldLevelEncryptionConfig` instance.

Example using the configuration [above](#configuring-the-field-level-encryption):
```php
use Mastercard\Developer\Encryption;
// ...
$encryptedPayload = '{
    "path": {
        "to": {
            "encryptedFoo": {
                "iv": "e5d313c056c411170bf07ac82ede78c9",
                "encryptedKey": "e3a56746c0f9109d18b3a2652b76(...)f16d8afeff36b2479652f5c24ae7bd",
                "encryptedValue": "809a09d78257af5379df0c454dcdf(...)353ed59fe72fd4a7735c69da4080e74f"
            }
        }
    }
}';
$payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);
echo (json_encode(json_decode($payload), JSON_PRETTY_PRINT));
```

Output:
```json
{
    "path": {
        "to": {
            "foo": {
                "sensitiveField1": "sensitiveValue1",
                "sensitiveField2": "sensitiveValue2"
            }
        }
    }
}
```

#### Encrypting Entire Payloads <a name="encrypting-entire-payloads"></a>

Entire payloads can be encrypted using the '$' operator as encryption path:

```php
use Mastercard\Developer\Encryption;
// ...
$config = FieldLevelEncryptionConfigBuilder::aFieldLevelEncryptionConfig()
    ->withEncryptionCertificate(encryptionCertificate)
    ->withEncryptionPath('$', '$')
    // ...
    ->build();
```

Example:
```php
use Mastercard\Developer\Encryption;
// ...
$payload = '{
    "sensitiveField1": "sensitiveValue1",
    "sensitiveField2": "sensitiveValue2"
}';
$encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);
echo (json_encode(json_decode($encryptedPayload), JSON_PRETTY_PRINT));
```

Output:
```json
{
    "iv": "1b9396c98ab2bfd195de661d70905a45",
    "encryptedKey": "7d5112fa08e554e3dbc455d0628(...)52e826dd10311cf0d63bbfb231a1a63ecc13",
    "encryptedValue": "e5e9340f4d2618d27f8955828c86(...)379b13901a3b1e2efed616b6750a90fd379515"
}
```

#### Decrypting Entire Payloads <a name="decrypting-entire-payloads"></a>

Entire payloads can be decrypted using the '$' operator as decryption path:

```php
use Mastercard\Developer\Encryption;
// ...
$config = FieldLevelEncryptionConfigBuilder::aFieldLevelEncryptionConfig()
    ->withDecryptionKey(decryptionKey)
    ->withDecryptionPath('$', '$')
    // ...
    ->build();
```

Example:
```php
use Mastercard\Developer\Encryption;
// ...
$encryptedPayload = '{
    "iv": "1b9396c98ab2bfd195de661d70905a45",
    "encryptedKey": "7d5112fa08e554e3dbc455d0628(...)52e826dd10311cf0d63bbfb231a1a63ecc13",
    "encryptedValue": "e5e9340f4d2618d27f8955828c86(...)379b13901a3b1e2efed616b6750a90fd379515"
}';
$payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);
echo (json_encode(json_decode($payload), JSON_PRETTY_PRINT));
```

Output:
```json
{
    "sensitiveField1": "sensitiveValue1",
    "sensitiveField2": "sensitiveValue2"
}
```

#### Using HTTP Headers for Encryption Params <a name="using-http-headers-for-encryption-params"></a>

In the sections above, encryption parameters (initialization vector, encrypted symmetric key, etc.) are part of the HTTP payloads.

Here is how to configure the library for using HTTP headers instead.

##### Configuration for Using HTTP Headers <a name="configuration-for-using-http-headers"></a>

Call `with{Param}HeaderName` instead of `with{Param}FieldName` when building a `FieldLevelEncryptionConfig` instance. Example:
```php
use Mastercard\Developer\Encryption;
// ...
$config = FieldLevelEncryptionConfigBuilder::aFieldLevelEncryptionConfig()
    ->withEncryptionCertificate(encryptionCertificate)
    ->withDecryptionKey(decryptionKey)
    ->withEncryptionPath('$', '$')
    ->withDecryptionPath('$', '$')
    ->withOaepPaddingDigestAlgorithm('SHA-256')
    ->withEncryptedValueFieldName('data')
    ->withIvHeaderName('x-iv')
    ->withEncryptedKeyHeaderName('x-encrypted-key')
    // ...
    ->withFieldValueEncoding(FieldValueEncoding::HEX)
    ->build();
```

See also:
* [FieldLevelEncryptionConfig.php](https://github.com/Mastercard/client-encryption-php/blob/master/src/Developer/Encryption/FieldLevelEncryptionConfig.php) for all config options
* [Service configurations in PHP](https://github.com/Mastercard/client-encryption-php/wiki/Service-Configurations-in-PHP) wiki page

##### Encrypting Using HTTP Headers

Encryption can be performed using the following steps:

1. Generate parameters by calling `FieldLevelEncryptionParams::generate`:

```php
$params = FieldLevelEncryptionParams::generate($config);
```

2. Update the request headers:

```php
$request->setHeader($config->getIvHeaderName(), $params->getIvValue());
$request->setHeader($config->getEncryptedKeyHeaderName(), $params->getEncryptedKeyValue());
// ...
```

3. Call `encryptPayload` with params:
```php
FieldLevelEncryption::encryptPayload($payload, $config, $params);
```

Example using the configuration [above](#configuration-for-using-http-headers):

```php
$payload = '{
    "sensitiveField1": "sensitiveValue1",
    "sensitiveField2": "sensitiveValue2"
}';
$encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config, $params);
echo (json_encode(json_decode($encryptedPayload), JSON_PRETTY_PRINT));
```

Output:
```json
{
    "data": "53b5f07ee46403af2e92abab900853(...)d560a0a08a1ed142099e3f4c84fe5e5"
}
```

##### Decrypting Using HTTP Headers

Decryption can be performed using the following steps:

1. Read the response headers:

```php
$ivValue = $response->getHeader($config->getIvHeaderName());
$encryptedKeyValue = $response->getHeader($config->getEncryptedKeyHeaderName());
// ...
```

2. Create a `FieldLevelEncryptionParams` instance:

```php
$params = new FieldLevelEncryptionParams($config, $ivValue, $encryptedKeyValue, ..., );
```

3. Call `decryptPayload` with params:
```php
FieldLevelEncryption::decryptPayload($encryptedPayload, $config, $params);
```

Example using the configuration [above](#configuration-for-using-http-headers):

```php
$encryptedPayload = '{
    "data": "53b5f07ee46403af2e92abab900853(...)d560a0a08a1ed142099e3f4c84fe5e5"
}';
$payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config, $params);
echo (json_encode(json_decode($payload), JSON_PRETTY_PRINT));
```

Output:
```json
{
    "sensitiveField1": "sensitiveValue1",
    "sensitiveField2": "sensitiveValue2"
}
```

### Integrating with OpenAPI Generator API Client Libraries <a name="integrating-with-openapi-generator-api-client-libraries"></a>

[OpenAPI Generator](https://github.com/OpenAPITools/openapi-generator) generates API client libraries from [OpenAPI Specs](https://github.com/OAI/OpenAPI-Specification). 
It provides generators and library templates for supporting multiple languages and frameworks.

This project provides you with some interceptor classes you can use when configuring your API client. 
These classes will take care of encrypting request and decrypting response payloads, but also of updating HTTP headers when needed.

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

##### Usage of the `PsrHttpMessageEncryptionInterceptor`

```php
use GuzzleHttp;
use OpenAPI\Client\Api\ServiceApi;
use OpenAPI\Client\Configuration
use Mastercard\Developer\Signers\PsrHttpMessageSigner;
use Mastercard\Developer\Interceptors\PsrHttpMessageEncryptionInterceptor;
// ...

$stack = new GuzzleHttp\HandlerStack();
$stack->setHandler(new GuzzleHttp\Handler\CurlHandler());
$fieldLevelEncryptionConfig = FieldLevelEncryptionConfigBuilder::aFieldLevelEncryptionConfig()
    // ...
    ->build();
$fieldLevelEncryptionInterceptor = new PsrHttpMessageEncryptionInterceptor($fieldLevelEncryptionConfig);
$stack->push(GuzzleHttp\Middleware::mapRequest([$fieldLevelEncryptionInterceptor, 'interceptRequest']));
$stack->push(GuzzleHttp\Middleware::mapResponse([$fieldLevelEncryptionInterceptor, 'interceptResponse']));
$stack->push(GuzzleHttp\Middleware::mapRequest([new PsrHttpMessageSigner($consumerKey, $signingKey), 'sign']));
$options = ['handler' => $stack];
$client = new GuzzleHttp\Client($options);
$config = new Configuration();
$config->setHost('https://sandbox.api.mastercard.com');
$serviceApi = new ServiceApi($client, $config);
// ...
```
