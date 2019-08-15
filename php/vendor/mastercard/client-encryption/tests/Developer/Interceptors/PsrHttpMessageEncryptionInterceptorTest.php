<?php
namespace Mastercard\Developer\Interceptors;

use GuzzleHttp\Psr7\Response;
use Mastercard\Developer\Encryption\EncryptionException;
use Mastercard\Developer\Test\TestUtils;
use Mastercard\Developer\Utils\StringUtils;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\Request; // GuzzleHttp requests are implementing the PSR RequestInterface

class PsrHttpMessageEncryptionInterceptorTest extends TestCase {

    public function testInterceptRequest_ShouldEncryptRequestPayloadAndUpdateContentLengthHeader() {

        // GIVEN
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('$.foo', '$.encryptedFoo')
            ->build();
        $payload = '{"foo":"bår"}';
        $headers = ['Content-Type' => 'application/json'];
        $request = new Request('POST', 'https://api.mastercard.com/service', $headers, $payload);

        // WHEN
        $instanceUnderTest = new PsrHttpMessageEncryptionInterceptor($config);
        $outRequest = $instanceUnderTest->interceptRequest($request);

        // THEN
        $this->assertSame($outRequest, $request);
        $encryptedPayload = $request->getBody()->__toString();
        $this->assertFalse(StringUtils::contains($encryptedPayload, 'foo'));
        $this->assertTrue(StringUtils::contains($encryptedPayload, 'encryptedFoo'));
        $this->assertEquals(1, sizeof($request->getHeader('Content-Length')));
        $this->assertEquals(strval(strlen($encryptedPayload)), $request->getHeader('Content-Length')[0]);
    }

    public function testInterceptRequest_ShouldDoNothing_WhenNoPayload() {

        // GIVEN
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('$.foo', '$.encryptedFoo')
            ->build();
        $request = new Request('GET', 'https://api.mastercard.com/service');
        $initialHeaderCount = sizeof($request->getHeaders());

        // WHEN
        $instanceUnderTest = new PsrHttpMessageEncryptionInterceptor($config);
        $outRequest = $instanceUnderTest->interceptRequest($request);

        // THEN
        $this->assertSame($outRequest, $request);
        $this->assertEmpty($request->getBody()->__toString());
        $this->assertEquals($initialHeaderCount, sizeof($request->getHeaders()));
    }

    public function testInterceptRequest_ShouldThrowEncryptionException_WhenEncryptionFails() {

        // GIVEN
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('$.foo', '$.encryptedFoo')
            ->withEncryptionCertificate(TestUtils::getTestInvalidEncryptionCertificate()) // Invalid certificate
            ->build();
        $payload = '{"foo":"bår"}';
        $headers = ['Content-Type' => 'application/json'];
        $request = new Request('POST', 'https://api.mastercard.com/service', $headers, $payload);

        // THEN
        $this->expectException(EncryptionException::class);
        $this->expectExceptionMessage('Failed to wrap secret key!');

        // WHEN
        $instanceUnderTest = new PsrHttpMessageEncryptionInterceptor($config);
        $instanceUnderTest->interceptRequest($request);
    }

    public function testInterceptRequest_ShouldEncryptRequestPayloadAndAddEncryptionHttpHeaders_WhenRequestedInConfig() {
        
        // GIVEN
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('$.foo', '$.encryptedFoo')
            ->withIvHeaderName('x-iv')
            ->withEncryptedKeyHeaderName('x-encrypted-key')
            ->withOaepPaddingDigestAlgorithmHeaderName('x-oaep-padding-digest-algorithm')
            ->withEncryptionCertificateFingerprintHeaderName('x-encryption-certificate-fingerprint')
            ->withEncryptionKeyFingerprintHeaderName('x-encryption-key-fingerprint')
            ->build();
        $payload = '{"foo":"bår"}';
        $headers = [
            'Content-Type' => 'application/json',
            'x-encryption-certificate-fingerprint' => 'some previous value'
        ];
        $request = new Request('POST', 'https://api.mastercard.com/service', $headers, $payload);

        // WHEN
        $instanceUnderTest = new PsrHttpMessageEncryptionInterceptor($config);
        $outRequest = $instanceUnderTest->interceptRequest($request);

        // THEN
        $this->assertSame($outRequest, $request);
        $encryptedPayload = $request->getBody()->__toString();
        $this->assertFalse(StringUtils::contains($encryptedPayload, 'foo'));
        $this->assertTrue(StringUtils::contains($encryptedPayload, 'encryptedFoo'));
        $this->assertEquals(1, sizeof($request->getHeader('Content-Length')));
        $this->assertEquals(strval(strlen($encryptedPayload)), $request->getHeader('Content-Length')[0]);
        $this->assertEquals(1, sizeof($request->getHeader('x-iv')));
        $this->assertEquals(1, sizeof($request->getHeader('x-encrypted-key')));
        $this->assertEquals('SHA256', $request->getHeader('x-oaep-padding-digest-algorithm')[0]);
        $this->assertEquals(1, sizeof($request->getHeader('x-encryption-certificate-fingerprint')));
        $this->assertEquals('80810fc13a8319fcf0e2ec322c82a4c304b782cc3ce671176343cfe8160c2279', $request->getHeader('x-encryption-certificate-fingerprint')[0]);
        $this->assertEquals('761b003c1eade3a5490e5000d37887baa5e6ec0e226c07706e599451fc032a79', $request->getHeader('x-encryption-key-fingerprint')[0]);
    }

    public function testInterceptResponse_ShouldDecryptResponsePayloadAndUpdateContentLengthHeader() {
        
        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "a32059c51607d0d02e823faecda5fb15",
                "encryptedKey": "a31cfe7a7981b72428c013270619554c1d645c04b9d51c7eaf996f55749ef62fd7c7f8d334f95913be41ae38c46d192670fd1acb84ebb85a00cd997f1a9a3f782229c7bf5f0fdf49fe404452d7ed4fd41fbb95b787d25893fbf3d2c75673cecc8799bbe3dd7eb4fe6d3f744b377572cdf8aba1617194e10475b6cd6a8dd4fb8264f8f51534d8f7ac7c10b4ce9c44d15066724b03a0ab0edd512f9e6521fdb5841cd6964e457d6b4a0e45ba4aac4e77d6bbe383d6147e751fa88bc26278bb9690f9ee84b17123b887be2dcef0873f4f9f2c895d90e23456fafb01b99885e31f01a3188f0ad47edf22999cc1d0ddaf49e1407375117b5d66f1f185f2b57078d255",
                "encryptedValue": "21d754bdb4567d35d58720c9f8364075",
                "oaepHashingAlgorithm": "SHA256"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('$.encryptedData', '$.data')
            ->build();
        $headers = ['Content-Type' => 'application/json'];
        $response = new Response(200, $headers, $encryptedPayload);

        // WHEN
        $instanceUnderTest = new PsrHttpMessageEncryptionInterceptor($config);
        $outResponse = $instanceUnderTest->interceptResponse($response);

        // THEN
        $this->assertSame($outResponse, $response);
        $payload = $response->getBody()->__toString();
        $this->assertJsonStringEqualsJsonString('{"data":"string"}', $payload);
        $this->assertEquals(1, sizeof($response->getHeader('Content-Length')));
        $this->assertEquals(strval(strlen($payload)), $response->getHeader('Content-Length')[0]);
    }

    public function testInterceptResponse_ShouldDoNothing_WhenNoPayload() {
        
        // GIVEN
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()->build();
        $response = new Response(200);

        // WHEN
        $instanceUnderTest = new PsrHttpMessageEncryptionInterceptor($config);
        $outResponse = $instanceUnderTest->interceptResponse($response);

        // THEN
        $this->assertSame($outResponse, $response);
        $this->assertEmpty($response->getBody()->__toString());
        $this->assertEquals(0, sizeof($response->getHeaders()));
    }

    public function testInterceptResponse_ShouldThrowEncryptionException_WhenDecryptionFails() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "a2c494ca28dec4f3d6ce7d68b1044cfe",
                "encryptedKey": "NOT A VALID KEY!",
                "encryptedValue": "0672589113046bf692265b6ea6088184"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('$.encryptedData', '$.data')
            ->build();
        $headers = ['Content-Type' => 'application/json'];
        $response = new Response(200, $headers, $encryptedPayload);

        // THEN
        $this->expectException(EncryptionException::class);
        $this->expectExceptionMessage('Failed to decode and unwrap the provided secret key value!');

        // WHEN
        $instanceUnderTest = new PsrHttpMessageEncryptionInterceptor($config);
        $instanceUnderTest->interceptResponse($response);
    }

    public function testInterceptRequest_ShouldDecryptResponsePayloadAndRemoveEncryptionHttpHeaders_WhenRequestedInConfig() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "encryptedValue": "21d754bdb4567d35d58720c9f8364075"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('$.encryptedData', '$.data')
            ->withIvHeaderName('x-iv')
            ->withEncryptedKeyHeaderName('x-encrypted-key')
            ->withOaepPaddingDigestAlgorithmHeaderName('x-oaep-padding-digest-algorithm')
            ->withEncryptionCertificateFingerprintHeaderName('x-encryption-certificate-fingerprint')
            ->withEncryptionKeyFingerprintHeaderName('x-encryption-key-fingerprint')
            ->build();
        $headers = [
            'content-length' => '100',
            'x-iv' => 'a32059c51607d0d02e823faecda5fb15',
            'x-encrypted-key' => 'a31cfe7a7981b72428c013270619554c1d645c04b9d51c7eaf996f55749ef62fd7c7f8d334f95913be41ae38c46d192670fd1acb84ebb85a00cd997f1a9a3f782229c7bf5f0fdf49fe404452d7ed4fd41fbb95b787d25893fbf3d2c75673cecc8799bbe3dd7eb4fe6d3f744b377572cdf8aba1617194e10475b6cd6a8dd4fb8264f8f51534d8f7ac7c10b4ce9c44d15066724b03a0ab0edd512f9e6521fdb5841cd6964e457d6b4a0e45ba4aac4e77d6bbe383d6147e751fa88bc26278bb9690f9ee84b17123b887be2dcef0873f4f9f2c895d90e23456fafb01b99885e31f01a3188f0ad47edf22999cc1d0ddaf49e1407375117b5d66f1f185f2b57078d255',
            'x-oaep-padding-digest-algorithm' => 'SHA256',
            'x-encryption-key-fingerprint' => '761b003c1eade3a5490e5000d37887baa5e6ec0e226c07706e599451fc032a79',
            'X-ENCRYPTION-CERTIFICATE-FINGERPRINT' => '80810fc13a8319fcf0e2ec322c82a4c304b782cc3ce671176343cfe8160c2279'
        ];
        $response = new Response(200, $headers, $encryptedPayload);

        // WHEN
        $instanceUnderTest = new PsrHttpMessageEncryptionInterceptor($config);
        $outResponse = $instanceUnderTest->interceptResponse($response);

        // THEN
        $this->assertSame($outResponse, $response);
        $payload = $response->getBody()->__toString();
        $this->assertJsonStringEqualsJsonString('{"data":"string"}', $payload);
        $this->assertEquals(1, sizeof($response->getHeader('Content-Length')));
        $this->assertEquals(strval(strlen($payload)), $response->getHeader('Content-Length')[0]);
        $this->assertEquals(0, sizeof($response->getHeader('x-iv')));
        $this->assertEquals(0, sizeof($response->getHeader('x-encrypted-key')));
        $this->assertEquals(0, sizeof($response->getHeader('x-oaep-padding-digest-algorithm')));
        $this->assertEquals(0, sizeof($response->getHeader('x-encryption-key-fingerprint')));
        $this->assertEquals(0, sizeof($response->getHeader('x-encryption-certificate-fingerprint')));
    }
}