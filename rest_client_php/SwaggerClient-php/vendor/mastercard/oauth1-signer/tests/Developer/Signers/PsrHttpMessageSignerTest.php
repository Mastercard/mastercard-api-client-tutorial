<?php

namespace Mastercard\Developer\Signers;

use Mastercard\Developer\OAuth\Test\TestUtils;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\Request; // GuzzleHttp requests are implementing the PSR RequestInterface

class PsrHttpMessageSignerTest extends TestCase {

    public function testSign_ShouldAddOAuth1HeaderToPostRequest() {

        // GIVEN
        $signingKey = TestUtils::getTestSigningKey();
        $consumerKey = 'Some key';
        $body = '{"foo":"bår"}';
        $headers = ['Content-Type' => 'application/json'];
        $request = new Request('POST', 'https://api.mastercard.com/service', $headers, $body);

        // WHEN
        $instanceUnderTest = new PsrHttpMessageSigner($consumerKey, $signingKey);
        $outRequest = $instanceUnderTest->sign($request);

        // THEN
        $this->assertNotEmpty($outRequest);
        $this->assertSame($outRequest, $request);
        $authorizationHeaderValue = $request->getHeader('Authorization')[0];
        $this->assertNotEmpty($authorizationHeaderValue);
        $this->assertEquals(strlen('OAuth '), strpos($authorizationHeaderValue, 'oauth_consumer_key'));
    }

    public function testSign_ShouldAddOAuth1HeaderToGetRequest() {

        // GIVEN
        $signingKey = TestUtils::getTestSigningKey();
        $consumerKey = 'Some key';
        $request = new Request('GET', 'https://api.mastercard.com/service');

        // WHEN
        $instanceUnderTest = new PsrHttpMessageSigner($consumerKey, $signingKey);
        $outRequest = $instanceUnderTest->sign($request);

        // THEN
        $this->assertNotEmpty($outRequest);
        $this->assertSame($outRequest, $request);
        $authorizationHeaderValue = $request->getHeader('Authorization')[0];
        $this->assertNotEmpty($authorizationHeaderValue);
        $this->assertEquals(0, strpos($authorizationHeaderValue, 'OAuth'));
    }
}