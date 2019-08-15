<?php

namespace Mastercard\Developer\Signers;

use Mastercard\Developer\OAuth\Test\TestUtils;
use PHPUnit\Framework\TestCase;

class CurlRequestSignerTest extends TestCase {

    public function testSign_ShouldAddOAuth1HeaderToPostRequest() {

        // GIVEN
        $signingKey = TestUtils::getTestSigningKey();
        $consumerKey = 'Some key';
        $method = 'POST';
        $uri = 'http://httpbin.org/';
        $payload = json_encode(['foo' => 'bår']);
        $headers = array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload)
        );
        $handle = curl_init($uri);
        curl_setopt_array($handle, array(
            CURLINFO_HEADER_OUT => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $payload)
        );

        // WHEN
        $instanceUnderTest = new CurlRequestSigner($consumerKey, $signingKey);
        $instanceUnderTest->sign($handle, $method, $headers, $payload);
        curl_exec($handle); // There is no way of reading HTTP headers without having the request successfully sent

        // THEN
        $headerInfo = curl_getinfo($handle, CURLINFO_HEADER_OUT);
        $this->assertTrue(strpos($headerInfo, 'Authorization: OAuth') > 0);
    }

    public function testSign_ShouldAddOAuth1HeaderToGetRequest() {

        // GIVEN
        $signingKey = TestUtils::getTestSigningKey();
        $consumerKey = 'Some key';
        $method = 'GET';
        $uri = 'http://httpbin.org/';
        $handle = curl_init($uri);
        curl_setopt_array($handle, array(
            CURLINFO_HEADER_OUT => 1,
            CURLOPT_RETURNTRANSFER => 1)
        );
        // WHEN
        $instanceUnderTest = new CurlRequestSigner($consumerKey, $signingKey);
        $instanceUnderTest->sign($handle, $method);
        curl_exec($handle); // There is no way of reading HTTP headers without having the request successfully sent

        // THEN
        $headerInfo = curl_getinfo($handle, CURLINFO_HEADER_OUT);
        $this->assertTrue(strpos($headerInfo, 'Authorization: OAuth') > 0);
    }
}