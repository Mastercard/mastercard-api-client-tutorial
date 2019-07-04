# oauth1-signer-nodejs

[![](https://travis-ci.org/Mastercard/oauth1-signer-nodejs.svg?branch=master)](https://travis-ci.org/Mastercard/oauth1-signer-nodejs)
[![](https://sonarcloud.io/api/project_badges/measure?project=Mastercard_oauth1-signer-nodejs&metric=alert_status)](https://sonarcloud.io/dashboard?id=Mastercard_oauth1-signer-nodejs) 
[![](https://img.shields.io/npm/v/mastercard-oauth1-signer.svg)](https://www.npmjs.com/package/mastercard-oauth1-signer)
[![](https://img.shields.io/badge/license-MIT-yellow.svg)](https://github.com/Mastercard/oauth1-signer-nodejs/blob/master/LICENSE)

## Table of Contents
- [Overview](#overview)
  * [Compatibility](#compatibility)
  * [References](#references)
- [Usage](#usage)
  * [Prerequisites](#prerequisites)
  * [Adding the Library to Your Project](#adding-the-library-to-your-project)
  * [Loading the Signing Key](#loading-the-signing-key)  
  * [Creating the OAuth Authorization Header](#creating-the-oauth-authorization-header)
  * [Integrating with OpenAPI Generator API Client Libraries](#integrating-with-openapi-generator-api-client-libraries)
  
## Overview <a name="overview"></a>
Zero dependency library for generating a Mastercard API compliant OAuth signature.

### Compatibility <a name="compatibility"></a>
Node 6.12.3+

There shouldn't be any Node compatibility issues with this package, but it's a good idea to keep your Node versions up-to-date. 
It is recommended that you use one of the LTS Node.js releases, or one of the [more general recent releases](https://github.com/nodejs/Release). 
A Node version manager such as [nvm](https://github.com/creationix/nvm) (Mac and Linux) or [nvm-windows](https://github.com/coreybutler/nvm-windows) 
is a good way to stay on top of this.

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
npm i mastercard-oauth1-signer
```

### Loading the Signing Key <a name="loading-the-signing-key"></a>

The following code shows how to load the private key using `node-forge`:

```javascript
const forge = require("node-forge");
const fs = require("fs");
const p12Content = fs.readFileSync("<insert PKCS#12 key file path>", 'binary');
const p12Asn1 = forge.asn1.fromDer(p12Content, false);
const p12 = forge.pkcs12.pkcs12FromAsn1(p12Asn1, false, "<insert key password>");
const keyObj = p12.getBags({
    friendlyName: "<insert key alias>",
    bagType: forge.pki.oids.pkcs8ShroudedKeyBag
}).friendlyName[0];
const signingKey = forge.pki.privateKeyToPem(keyObj.key);
```

### Creating the OAuth Authorization Header <a name="creating-the-oauth-authorization-header"></a>
The method that does all the heavy lifting is `getAuthorizationHeader`. You can call into it directly and as long as you provide the correct parameters, it will return a string that you can add into your request's `Authorization` header.

```javascript
const consumerKey = "<insert consumer key>";
const uri = "https://sandbox.api.mastercard.com/service";
const method = "POST";
const payload = "Hello world!";

const oauth = require('mastercard-oauth1-signer');
const authHeader = oauth.getAuthorizationHeader(uri, method, payload, consumerKey, signingKey);
```

### Integrating with OpenAPI Generator API Client Libraries <a name="integrating-with-openapi-generator-api-client-libraries"></a>

[OpenAPI Generator](https://github.com/OpenAPITools/openapi-generator) generates API client libraries from [OpenAPI Specs](https://github.com/OAI/OpenAPI-Specification). 
It provides generators and library templates for supporting multiple languages and frameworks.

Generators currently supported:
+ [javascript](#javascript)

#### javascript <a name="javascript"></a>

##### OpenAPI Generator

Client libraries can be generated using the following command:
```shell
java -jar openapi-generator-cli.jar generate -i openapi-spec.yaml -g javascript -o out
```
See also: 
* [OpenAPI Generator (executable)](https://mvnrepository.com/artifact/org.openapitools/openapi-generator-cli)
* [CONFIG OPTIONS for javascript](https://github.com/OpenAPITools/openapi-generator/blob/master/docs/generators/javascript.md)

##### Overriding `applyAuthToRequest`

The Authorization header can be added before sending the requests by overriding the `applyAuthToRequest` function: 

```javascript
const service = require('../service/index.js');
const apiClient = require('../service/ApiClient.js');
const client = apiClient.instance;
client.basePath = "https://sandbox.api.mastercard.com";
client.applyAuthToRequest = function(request) {
    const _end = request._end;
    request._end = function() {
        const authHeader = oauth.getAuthorizationHeader(request.url, request.method, request._data, consumerKey, signingKey);
        request.req.setHeader('Authorization', authHeader);
        _end.call(request);
    }
    return request;
};
const serviceApi = new service.ServiceApi();
const opts = {}
const callback = function(error, data, response) {
    // ...
};
serviceApi.call(opts, callback);
// ...
```
