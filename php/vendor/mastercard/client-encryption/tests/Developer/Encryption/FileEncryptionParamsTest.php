<?php

namespace Mastercard\Developer\Encryption;

use Mastercard\Developer\Test\TestUtils;
use PHPUnit\Framework\TestCase;

class FileEncryptionParamsTest extends TestCase {

    private static function callWrapSecretKey($params) {
        return TestUtils::callPrivateStatic('\FieldLevelEncryptionParams', 'wrapSecretKey', $params);
    }

    private static function callUnwrapSecretKey($params) {
        return TestUtils::callPrivateStatic('\FieldLevelEncryptionParams', 'unwrapSecretKey', $params);
    }
    
    public function testGenerate_Nominal() {

        // GIVEN
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionCertificateFingerprint(null)
            ->withEncryptionKeyFingerprint(null)
            ->build();

        // WHEN
        $params = FieldLevelEncryptionparams::generate($config);

        // THEN
        $this->assertNotEmpty($params->getIvValue());
        $this->assertTrue(ctype_xdigit($params->getIvValue()));
        $this->assertNotEmpty($params->getIvBytes());
        $this->assertNotEmpty($params->getEncryptedKeyValue());
        $this->assertTrue(ctype_xdigit($params->getEncryptedKeyValue()));
        $this->assertNotEmpty($params->getSecretKeyBytes());
        $this->assertEquals('SHA256', $params->getOaepPaddingDigestAlgorithmValue());
    }

    public function testGetIvBytes_ShouldThrowEncryptionException_WhenFailsToDecodeIV() {

        // GIVEN
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()->build();
        $params = new FieldLevelEncryptionParams($config, 'INVALID VALUE', null);

        // THEN
        $this->expectException(EncryptionException::class);
        $this->expectExceptionMessage('Failed to decode the provided IV value!');

        // WHEN
        $params->getIvBytes();
    }

    public function testGetSecretKeyBytes_ShouldThrowEncryptionException_WhenFailsToReadEncryptedKey() {

        // GIVEN
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()->build();
        $params = new FieldLevelEncryptionParams($config, null, 'INVALID VALUE');

        // THEN
        $this->expectException(EncryptionException::class);
        $this->expectExceptionMessage('Failed to decode and unwrap the provided secret key value!');

        // WHEN
        $params->getSecretKeyBytes();
    }

    public function testWrapUnwrapSecretKey_ShouldReturnTheOriginalKey() {

        // GIVEN
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()->build();
        $originalKeyBytes = base64_Decode('mZzmzoURXI3Vk0vdsPkcFw==');

        // WHEN
        $wrappedKeyBytes = self::callWrapSecretKey(array($config, $originalKeyBytes));
        $unwrappedKeyBytes = self::callUnwrapSecretKey(array($config, $wrappedKeyBytes, $config->getOaepPaddingDigestAlgorithm()));

        // THEN
        $this->assertEquals($originalKeyBytes, $unwrappedKeyBytes);
    }

    public function testUnwrapSecretKey_InteroperabilityTest_OaepSha256() {

        // GIVEN
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->build();
        $wrappedKey = 'ZLB838BRWW2/BtdFFAWBRYShw/gBxXSwItpxEZ9zaSVEDHo7n+SyVYU7mayd+9vHkR8OdpqwpXM68t0VOrWI8LD8A2pRaYx8ICyhVFya4OeiWlde05Rhsk+TNwwREPbiw1RgjT8aedRJJYbAZdLb9XEI415Kb/UliHyvsdHMb6vKyYIjUHB/pSGAAmgds56IhIJGfvnBLPZfSHmGgiBT8WXLRuuf1v48aIadH9S0FfoyVGTaLYr+2eznSTAFC0ZBnzebM3mQI5NGQNviTnEJ0y+uZaLE/mthiKgkv1ZybyDPx2xJK2n05sNzfIWKmnI/SOb65RZLlo1Q+N868l2m9g==';

        // WHEN
        $unwrappedKeyBytes = self::callUnwrapSecretKey(array($config, base64_decode($wrappedKey), $config->getOaepPaddingDigestAlgorithm()));

        // THEN
        $expectedKeyBytes = base64_decode('mZzmzoURXI3Vk0vdsPkcFw==');
        $this->assertEquals($expectedKeyBytes, $unwrappedKeyBytes);
    }

    public function testUnwrapSecretKey_InteroperabilityTest_OaepSha512() {

        // GIVEN
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withOaepPaddingDigestAlgorithm('SHA-512')
            ->build();
        $wrappedKey = 'RuruMYP5rG6VP5vS4kVznIrSOjUzXyOhtD7bYlVqwniWTvxxZC73UDluwDhpLwX5QJCsCe8TcwGiQRX1u+yWpBveHDRmDa03hrc3JRJALEKPyN5tnt5w7aI4dLRnLuNoXbYoTSc4V47Z3gaaK6q2rEjydx2sQ/SyVmeUJN7NgxkhtHTyVWTymEM1ythL+AaaQ5AaXedhpWKhG06XYZIX4KV7T9cHEn+See6RVGGB2RUPHBJjrxJo5JoVSfnWN0gkTMyuwbmVaTWfsowbvh8GFibFT7h3uXyI3b79NiauyB7scXp9WidGues3MrTx4dKZrSbs3uHxzPKmCDZimuKfwg==';

        // WHEN
        $unwrappedKeyBytes = self::callUnwrapSecretKey(array($config, base64_decode($wrappedKey), $config->getOaepPaddingDigestAlgorithm()));

        // THEN
        $expectedKeyBytes = base64_decode('mZzmzoURXI3Vk0vdsPkcFw==');
        $this->assertEquals($expectedKeyBytes, $unwrappedKeyBytes);
    }
}