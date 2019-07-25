<?php
namespace Mastercard\Developer\Utils;

use PHPUnit\Framework\TestCase;

class EncryptionUtilsTest extends TestCase {

    public function testLoadEncryptionCertificate_ShouldSupportPem() {

        // GIVEN
        $certificatePath = './resources/Certificates/test_certificate-2048.pem';

        // WHEN
        $certificate = EncryptionUtils::loadEncryptionCertificate($certificatePath);

        // THEN
        $this->assertNotEmpty($certificate);
        $this->assertNotFalse($certificate);
        $this->assertEquals(2048, openssl_pkey_get_details(openssl_pkey_get_public($certificate))['bits']);
    }

    public function testLoadEncryptionCertificate_ShouldSupportDer() {

        // GIVEN
        $certificatePath = './resources/Certificates/test_certificate-2048.der';

        // WHEN
        $certificate = EncryptionUtils::loadEncryptionCertificate($certificatePath);

        // THEN
        $this->assertNotEmpty($certificate);
        $this->assertNotFalse($certificate);
        $this->assertEquals(2048, openssl_pkey_get_details(openssl_pkey_get_public($certificate))['bits']);
    }

    public function testLoadEncryptionCertificate_ShouldThrowInvalidArgumentException_WhenFileDoesNotExists() {

        // GIVEN
        $certificatePath = './resources/some file';

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Failed to read the given file: ./resources/some file!');

        // WHEN
        EncryptionUtils::loadEncryptionCertificate($certificatePath);
    }

    public function testLoadDecryptionKey_ShouldSupportPkcs8Der() {

        // GIVEN
        $keyPath = './resources/Keys/Pkcs8/test_key_pkcs8-2048.der';

        // WHEN
        $privateKey = EncryptionUtils::loadDecryptionKey($keyPath);

        // THEN
        $this->assertNotEmpty($privateKey);
        $this->assertNotFalse($privateKey);
        $this->assertEquals(2048, openssl_pkey_get_details($privateKey)['bits']);
    }

    public function testLoadDecryptionKey_ShouldSupportPkcs8Base64Pem() {

        // GIVEN
        $keyPath = './resources/Keys/Pkcs8/test_key_pkcs8-2048.pem';

        // WHEN
        $privateKey = EncryptionUtils::loadDecryptionKey($keyPath);

        // THEN
        $this->assertNotEmpty($privateKey);
        $this->assertNotFalse($privateKey);
        $this->assertEquals(2048, openssl_pkey_get_details($privateKey)['bits']);
    }

    public function testLoadDecryptionKey_ShouldSupportPkcs1Base64Pem() {

        // GIVEN
        $keyPath = './resources/Keys/Pkcs1/test_key_pkcs1-2048.pem';

        // WHEN
        $privateKey = EncryptionUtils::loadDecryptionKey($keyPath);

        // THEN
        $this->assertNotEmpty($privateKey);
        $this->assertNotFalse($privateKey);
        $this->assertEquals(2048, openssl_pkey_get_details($privateKey)['bits']);
    }

    public function testLoadDecryptionKey_ShouldReturnFalse_WhenInvalidKey() {

        // GIVEN
        $keyPath = './resources/Keys/Pkcs8/test_invalid_key.der';

        // WHEN
        $privateKey = EncryptionUtils::loadDecryptionKey($keyPath);

        // THEN
        $this->assertFalse($privateKey);
    }

    public function testLoadDecryptionKey_ShouldThrowInvalidArgumentException_WhenKeyFileDoesNotExist() {

        // GIVEN
        $keyPath = './resources/some file';

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Failed to read the given file: ./resources/some file!');

        // WHEN
        EncryptionUtils::loadDecryptionKey($keyPath);
    }

    public function testLoadDecryptionKey_ShouldSupportPkcs12() {

        // GIVEN
        $keyContainerPath = './resources/Keys/Pkcs12/test_key.p12';
        $keyAlias = 'mykeyalias';
        $keyPassword = 'Password1';

        // WHEN
        $privateKey = EncryptionUtils::loadDecryptionKey($keyContainerPath, $keyAlias, $keyPassword);

        // THEN
        $this->assertNotEmpty($privateKey);
        $this->assertNotFalse($privateKey);
        $this->assertEquals(2048, openssl_pkey_get_details($privateKey)['bits']);
    }

    public function testLoadDecryptionKey_ShouldThrowInvalidArgumentException_WhenWrongPassword() {

        // GIVEN
        $keyContainerPath = './resources/Keys/Pkcs12/test_key.p12';
        $keyAlias = 'mykeyalias';
        $keyPassword = 'Wrong password';

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Failed to open keystore with the provided password!');

        // WHEN
        EncryptionUtils::loadDecryptionKey($keyContainerPath, $keyAlias, $keyPassword);
    }

    public function testLoadDecryptionKey_ShouldThrowInvalidArgumentException_WhenFileDoesNotExists() {

        // GIVEN
        $keyContainerPath = './resources/some file';
        $keyAlias = 'mykeyalias';
        $keyPassword = 'Password1';

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Failed to read the given file: ./resources/some file!');

        // WHEN
        EncryptionUtils::loadDecryptionKey($keyContainerPath, $keyAlias, $keyPassword);
    }
}
