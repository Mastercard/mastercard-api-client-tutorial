<?php

namespace Mastercard\Developer\OAuth;

use PHPUnit\Framework\TestCase;
use Mastercard\Developer\OAuth\Test\TestUtils;

class OAuthTest extends TestCase {

    private static function callGetSignatureBaseString($params) {
        return TestUtils::callPrivateStatic('\OAuth', 'getSignatureBaseString', $params);
    }

    private static function callSignSignatureBaseString($params) {
        return TestUtils::callPrivateStatic('\OAuth', 'signSignatureBaseString', $params);
    }

    private static function callGetOAuthParamString($params) {
        return TestUtils::callPrivateStatic('\OAuth', 'getOAuthParamString', $params);
    }

    private static function callExtractQueryParams($params) {
        return TestUtils::callPrivateStatic('\OAuth', 'extractQueryParams', $params);
    }

    private static function callGetBaseUriString($params) {
        return TestUtils::callPrivateStatic('\OAuth', 'getBaseUriString', $params);
    }

    private static function callGetNonce($params) {
        return TestUtils::callPrivateStatic('\OAuth', 'getNonce', $params);
    }

    private static function callGetBodyHash($params) {
        return TestUtils::callPrivateStatic('\OAuth', 'getBodyHash', $params);
    }

    public function testExtractQueryParams_ShouldSupportDuplicateKeysAndEmptyValues() {

        // GIVEN
        $uri = 'https://sandbox.api.mastercard.com/audiences/v1/getcountries?offset=0&offset=1&length=10&empty&odd=';

        // WHEN
        $queryParams = self::callExtractQueryParams($uri);

        // THEN
        $this->assertEquals(4, sizeof($queryParams));
        $this->assertTrue(array('10') === $queryParams['length']);
        $this->assertTrue(array('0', '1') === $queryParams['offset']);
        $this->assertTrue(array('') === $queryParams['empty']);
        $this->assertTrue(array('') === $queryParams['odd']);
    }

    public function testExtractQueryParams_ShouldSupportRfcExample() {

        // GIVEN
        $uri = 'https://example.com/request?b5=%3D%253D&a3=a&c%40=&a2=r%20b'; // See: https://tools.ietf.org/html/rfc5849#section-3.4.1.3.1

        // WHEN
        $queryParams = self::callExtractQueryParams($uri);

        // THEN
        $this->assertEquals(4, sizeof($queryParams));
        $this->assertTrue(array('%3D%253D') === $queryParams['b5']);
        $this->assertTrue(array('a') === $queryParams['a3']);
        $this->assertTrue(array('') === $queryParams['c%40']);
        $this->assertTrue(array('r%20b') === $queryParams['a2']);
    }

    public function testExtractQueryParams_ShouldNotEncodeParams_WhenUriStringWithDecodedParams() {

        // GIVEN
        $uri = 'https://example.com/request?colon=:&plus=+&comma=,';

        // WHEN
        $queryParams = self::callExtractQueryParams($uri);

        // THEN
        $this->assertEquals(3, sizeof($queryParams));
        $this->assertTrue(array(':') === $queryParams['colon']);
        $this->assertTrue(array('+') === $queryParams['plus']);
        $this->assertTrue(array(',') === $queryParams['comma']);
    }

    public function testExtractQueryParams_ShouldEncodeParams_WhenUriStringWithEncodedParams() {

        // GIVEN
        $uri = 'https://example.com/request?colon=%3A&plus=%2B&comma=%2C';

        // WHEN
        $queryParams = self::callExtractQueryParams($uri);

        // THEN
        $this->assertEquals(3, sizeof($queryParams));
        $this->assertTrue(array('%3A') === $queryParams['colon']);
        $this->assertTrue(array('%2B') === $queryParams['plus']);
        $this->assertTrue(array('%2C') === $queryParams['comma']);
    }

    public function testParameterEncoding_ShouldCreateExpectedSignatureBaseString_WhenQueryParamsEncodedInUri() {

        // GIVEN
        $uri = 'https://example.com/?param=token1%3Atoken2';

        // WHEN
        $queryParams = self::callExtractQueryParams($uri);
        $paramString = self::callGetOAuthParamString(array($queryParams, array()));
        $baseString = self::callGetSignatureBaseString(array('https://example.com', 'GET', $paramString));

        // THEN
        $this->assertEquals('GET&https%3A%2F%2Fexample.com&param%3Dtoken1%253Atoken2', $baseString);
    }

    public function testParameterEncoding_ShouldCreateExpectedSignatureBaseString_WhenQueryParamsNotEncodedInUri() {

        // GIVEN
        $uri = 'https://example.com/?param=token1:token2';

        // WHEN
        $queryParams = self::callExtractQueryParams($uri);
        $paramString = self::callGetOAuthParamString(array($queryParams, array()));
        $baseString = self::callGetSignatureBaseString(array('https://example.com', 'GET', $paramString));

        // THEN
        $this->assertEquals('GET&https%3A%2F%2Fexample.com&param%3Dtoken1%3Atoken2', $baseString);
    }

    public function testGetBodyHash() {
        $this->assertEquals('47DEQpj8HBSa+/TImW+5JCeuQeRkm5NMpJWZG3hSuFU=', self::callGetBodyHash(NULL));
        $this->assertEquals('47DEQpj8HBSa+/TImW+5JCeuQeRkm5NMpJWZG3hSuFU=', self::callGetBodyHash(''));
        $this->assertEquals('+Z+PWW2TJDnPvRcTgol+nKO3LT7xm8smnsg+//XMIyI=', self::callGetBodyHash('{"foõ":"bar"}'));
    }

    public function testGetOAuthParamString_ShouldSupportRfcExample() {
        $queryParameters = array();
        $queryParameters['b5'] = array('%3D%253D');
        $queryParameters['a3'] = array('a', '2%20q');
        $queryParameters['c%40'] = array('');
        $queryParameters['a2'] = array('r%20b');
        $queryParameters['c2'] = array('');
        $oauthParameters = array();
        $oauthParameters['oauth_consumer_key'] = '9djdj82h48djs9d2';
        $oauthParameters['oauth_token'] = 'kkk9d7dh3k39sjv7';
        $oauthParameters['oauth_signature_method'] = 'HMAC-SHA1';
        $oauthParameters['oauth_timestamp'] = '137131201';
        $oauthParameters['oauth_nonce'] = '7d8f3e4a';

        $paramString = self::callGetOAuthParamString(array($queryParameters, $oauthParameters));
        $this->assertEquals('a2=r%20b&a3=2%20q&a3=a&b5=%3D%253D&c%40=&c2=&oauth_consumer_key=9djdj82h48djs9d2&oauth_nonce=7d8f3e4a&oauth_signature_method=HMAC-SHA1&oauth_timestamp=137131201&oauth_token=kkk9d7dh3k39sjv7', $paramString);
    }

    public function testGetOAuthParamString_ShouldUseAscendingByteValueOrdering() {
        $queryParameters = array();
        $queryParameters['b'] = array('b');
        $queryParameters['A'] = array('a', 'A');
        $queryParameters['B'] = array('B');
        $queryParameters['a'] = array('A', 'a');
        $queryParameters['0'] = array('0');
        $oauthParameters = array();

        $paramString = self::callGetOAuthParamString(array($queryParameters, $oauthParameters));
        $this->assertEquals('0=0&A=A&A=a&B=B&a=A&a=a&b=b', $paramString);
    }

    public function testGetBaseUriString_ShouldSupportRfcExamples() {
        $this->assertEquals('https://www.example.net:8080/', self::callGetBaseUriString('https://www.example.net:8080'));
        $this->assertEquals('http://example.com/r%20v/X', self::callGetBaseUriString('http://EXAMPLE.COM:80/r%20v/X?id=123'));
    }

    public function testGetBaseUriString_ShouldRemoveRedundantPorts() {
        $this->assertEquals('https://api.mastercard.com/test', self::callGetBaseUriString('https://api.mastercard.com:443/test?query=param'));
        $this->assertEquals('http://api.mastercard.com/test', self::callGetBaseUriString('http://api.mastercard.com:80/test'));
        $this->assertEquals('https://api.mastercard.com:17443/test', self::callGetBaseUriString('https://api.mastercard.com:17443/test?query=param'));
    }

    public function testGetBaseUriString_ShouldRemoveFragments() {
        $this->assertEquals('https://api.mastercard.com/test', self::callGetBaseUriString('https://api.mastercard.com/test?query=param#fragment'));
    }

    public function testGetBaseUriString_ShouldAddTrailingSlash() {
        $this->assertEquals('https://api.mastercard.com/', self::callGetBaseUriString('https://api.mastercard.com'));
    }

    public function testGetBaseUriString_ShouldUseLowercaseSchemesAndHosts() {
        $this->assertEquals('https://api.mastercard.com/TEST', self::callGetBaseUriString('HTTPS://API.MASTERCARD.COM/TEST'));
    }

    public function testGetSignatureBaseString_Nominal() {
        $method = 'POST';
        $queryParameters = array();
        $queryParameters['param2'] = array('hello');
        $queryParameters['first_param'] = array('value', 'othervalue');
        $oauthParameters = array();
        $oauthParameters['oauth_nonce'] = 'randomnonce';
        $oauthParameters['oauth_body_hash'] = 'body/hash';
        $oauthParamString = self::callGetOAuthParamString(array($queryParameters, $oauthParameters));
        $actualSignatureBaseString = self::callGetSignatureBaseString(array('https://api.mastercard.com', $method, $oauthParamString));
        $expectedSignatureBaseString = 'POST&https%3A%2F%2Fapi.mastercard.com&first_param%3Dothervalue%26first_param%3Dvalue%26oauth_body_hash%3Dbody%2Fhash%26oauth_nonce%3Drandomnonce%26param2%3Dhello';
        $this->assertEquals($expectedSignatureBaseString, $actualSignatureBaseString);
    }

    public function testSignSignatureBaseString() {
        $expectedSignatureString = 'IJeNKYGfUhFtj5OAPRI92uwfjJJLCej3RCMLbp7R6OIYJhtwxnTkloHQ2bgV7fks4GT/A7rkqrgUGk0ewbwIC6nS3piJHyKVc7rvQXZuCQeeeQpFzLRiH3rsb+ZS+AULK+jzDje4Fb+BQR6XmxuuJmY6YrAKkj13Ln4K6bZJlSxOizbNvt+Htnx+hNd4VgaVBeJKcLhHfZbWQxK76nMnjY7nDcM/2R6LUIR2oLG1L9m55WP3bakAvmOr392ulv1+mWCwDAZZzQ4lakDD2BTu0ZaVsvBW+mcKFxYeTq7SyTQMM4lEwFPJ6RLc8jJJ+veJXHekLVzWg4qHRtzNBLz1mA==';
        $this->assertEquals($expectedSignatureString, self::callSignSignatureBaseString(array('baseString', TestUtils::getTestSigningKey())));
    }

    public function testGetSignatureBaseString_Integrated() {
        $body = '<?xml version="1.0" encoding="Windows-1252"?><ns2:TerminationInquiryRequest xmlns:ns2="http://mastercard.com/termination"><AcquirerId>1996</AcquirerId><TransactionReferenceNumber>1</TransactionReferenceNumber><Merchant><Name>TEST</Name><DoingBusinessAsName>TEST</DoingBusinessAsName><PhoneNumber>5555555555</PhoneNumber><NationalTaxId>1234567890</NationalTaxId><Address><Line1>5555 Test Lane</Line1><City>TEST</City><CountrySubdivision>XX</CountrySubdivision><PostalCode>12345</PostalCode><Country>USA</Country></Address><Principal><FirstName>John</FirstName><LastName>Smith</LastName><NationalId>1234567890</NationalId><PhoneNumber>5555555555</PhoneNumber><Address><Line1>5555 Test Lane</Line1><City>TEST</City><CountrySubdivision>XX</CountrySubdivision><PostalCode>12345</PostalCode><Country>USA</Country></Address><DriversLicense><Number>1234567890</Number><CountrySubdivision>XX</CountrySubdivision></DriversLicense></Principal></Merchant></ns2:TerminationInquiryRequest>';
        $method = 'POST';
        $uri = 'https://sandbox.api.mastercard.com/fraud/merchant/v1/termination-inquiry?Format=XML&PageOffset=0&PageLength=10';
        $queryParameters = self::callExtractQueryParams($uri);
        $oauthParameters = array();
        $oauthParameters['oauth_consumer_key'] = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
        $oauthParameters['oauth_nonce'] = '1111111111111111111';
        $oauthParameters['oauth_signature_method'] = 'RSA-SHA256';
        $oauthParameters['oauth_timestamp'] = '1111111111';
        $oauthParameters['oauth_version'] = '1.0';
        $oauthParameters['oauth_body_hash'] = self::callGetBodyHash($body);

        $oauthParamString = self::callGetOAuthParamString(array($queryParameters, $oauthParameters));
        $actualSignatureBaseString = self::callGetSignatureBaseString(array(self::callGetBaseUriString($uri), $method, $oauthParamString));
        $expectedSignatureBaseString = 'POST&https%3A%2F%2Fsandbox.api.mastercard.com%2Ffraud%2Fmerchant%2Fv1%2Ftermination-inquiry&Format%3DXML%26PageLength%3D10%26PageOffset%3D0%26oauth_body_hash%3Dh2Pd7zlzEZjZVIKB4j94UZn%2FxxoR3RoCjYQ9%2FJdadGQ%3D%26oauth_consumer_key%3Dxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx%26oauth_nonce%3D1111111111111111111%26oauth_signature_method%3DRSA-SHA256%26oauth_timestamp%3D1111111111%26oauth_version%3D1.0';
        $this->assertEquals($expectedSignatureBaseString, $actualSignatureBaseString);
    }

    public function testRawUrlEncode() {
        $this->assertEquals('Format%3DXML', rawurlencode('Format=XML'));
        $this->assertEquals('WhqqH%2BTU95VgZMItpdq78BWb4cE%3D', rawurlencode('WhqqH+TU95VgZMItpdq78BWb4cE='));
        $this->assertEquals('WhqqH%2BTU95VgZMItpdq78BWb4cE%3D%26o', rawurlencode('WhqqH+TU95VgZMItpdq78BWb4cE=&o'));
        $this->assertEquals('WhqqH%2BTU95VgZ~Itpdq78BWb4cE%3D%26o', rawurlencode('WhqqH+TU95VgZ~Itpdq78BWb4cE=&o')); // Tilde stays unescaped
    }

    public function testGetNonce_ShouldHaveLengthOf16() {
        $nonce = self::callGetNonce(array());
        $this->assertEquals(16, strlen($nonce));
    }

}