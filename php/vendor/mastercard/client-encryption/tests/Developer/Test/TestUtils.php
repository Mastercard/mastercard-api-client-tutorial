<?php

namespace Mastercard\Developer\Test;

use Mastercard\Developer\Encryption\EncryptionException;
use Mastercard\Developer\Encryption\FieldLevelEncryptionConfigBuilder;
use Mastercard\Developer\Encryption\FieldValueEncoding;
use Mastercard\Developer\Utils\EncryptionUtils;

class TestUtils {

    public static function callPrivateStatic($className, $functionName, $args) {
        if (is_string($args) || is_null($args)) {
            $args = array($args);
        }
        $class = new \ReflectionClass('Mastercard\Developer\Encryption' . $className);
        $method = $class->getMethod($functionName);
        $method->setAccessible(true);
        return $method->invokeArgs(null, $args);
    }

    public static function getTestEncryptionCertificate() {
        return EncryptionUtils::loadEncryptionCertificate('./resources/Certificates/test_certificate-2048.pem');
    }

    public static function getTestInvalidEncryptionCertificate() {
        return "not a certificate!";
    }

    public static function getTestDecryptionKey() {
        return EncryptionUtils::loadDecryptionKey('./resources/Keys/Pkcs8/test_key_pkcs8-2048.der');
    }

    public static function getTestFieldLevelEncryptionConfigBuilder() {
        return FieldLevelEncryptionConfigBuilder::aFieldLevelEncryptionConfig()
                ->withEncryptionCertificate(self::getTestEncryptionCertificate())
                ->withDecryptionKey(self::getTestDecryptionKey())
                ->withOaepPaddingDigestAlgorithm('SHA-256')
                ->withEncryptedValueFieldName('encryptedValue')
                ->withEncryptedKeyFieldName('encryptedKey')
                ->withIvFieldName('iv')
                ->withOaepPaddingDigestAlgorithmFieldName('oaepHashingAlgorithm')
                ->withEncryptionCertificateFingerprintFieldName('encryptionCertificateFingerprint')
                ->withEncryptionCertificateFingerprint('80810fc13a8319fcf0e2ec322c82a4c304b782cc3ce671176343cfe8160c2279')
                ->withEncryptionKeyFingerprintFieldName('encryptionKeyFingerprint')
                ->withEncryptionKeyFingerprint('761b003c1eade3a5490e5000d37887baa5e6ec0e226c07706e599451fc032a79')
                ->withFieldValueEncoding(FieldValueEncoding::HEX);
    }
}