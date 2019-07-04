<?php
namespace Mastercard\Developer\Utils;

/**
 * Utility class for loading certificates and keys.
 * @package Mastercard\Developer\Utils
 */
class EncryptionUtils {

    const CERTIFICATE_PEM_HEADER = '-----BEGIN CERTIFICATE-----';
    const CERTIFICATE_PEM_FOOTER = '-----END CERTIFICATE-----';
    const PKCS_1_PEM_HEADER = '-----BEGIN RSA PRIVATE KEY-----';
    const PKCS_1_PEM_FOOTER = '-----END RSA PRIVATE KEY-----';
    const PKCS_8_PEM_HEADER = '-----BEGIN PRIVATE KEY-----';
    const PKCS_8_PEM_FOOTER = '-----END PRIVATE KEY-----';

    private function __construct() {}

    /**
     * Create an X.509 resource from the certificate data at the given file path.
     * @throws \InvalidArgumentException
     */
    public static function loadEncryptionCertificate($certificatePath) {
        $certificateData = self::readFileContent($certificatePath);
        if (strpos($certificateData, self::CERTIFICATE_PEM_HEADER) !== FALSE) {
            // PEM encoded certificate
            return openssl_x509_read($certificateData);
        }

        // We assume it's a DER encoded certificate
        $certificatePem = EncodingUtils::derToPem($certificateData, self::CERTIFICATE_PEM_HEADER, self::CERTIFICATE_PEM_FOOTER);
        return openssl_x509_read($certificatePem);
    }

    /**
     * Create a RSA decryption key resource from a key inside a PKCS#12 container or from an encrypted key file (PEM or DER).
     * @throws \InvalidArgumentException
     */
    public static function loadDecryptionKey($pkcs12KeyFileOrKeyFilePath, $pkcs12DecryptionKeyAlias = null, $pkcs12DecryptionKeyPassword = null) {
        if (func_num_args() > 1) {
            return self::loadKeyFromPkcs12($pkcs12KeyFileOrKeyFilePath, $pkcs12DecryptionKeyAlias, $pkcs12DecryptionKeyPassword);
        } else {
            return self::loadKeyFromUnencryptedFile($pkcs12KeyFileOrKeyFilePath);
        }
    }

    private static function loadKeyFromPkcs12($pkcs12KeyFilePath, $decryptionKeyAlias, $decryptionKeyPassword) { //NOSONAR
        $keystoreData = self::readFileContent($pkcs12KeyFilePath);
        openssl_pkcs12_read($keystoreData, $certs, $decryptionKeyPassword);
        if (is_null($certs)) {
            throw new \InvalidArgumentException('Failed to open keystore with the provided password!');
        }

        return openssl_pkey_get_private($certs['pkey']);
    }

    private static function loadKeyFromUnencryptedFile($keyFilePath) {
        $keyData = self::readFileContent($keyFilePath);
        if (strpos($keyData, self::PKCS_1_PEM_HEADER) !== FALSE || strpos($keyData, self::PKCS_8_PEM_HEADER) !== FALSE) {
            // OpenSSL / PKCS#1 or  PKCS#8Base64 PEM encoded file
            return openssl_pkey_get_private($keyData);
        }

        // We assume it's a PKCS#8 DER encoded binary file
        $pkcs8Pem = EncodingUtils::derToPem($keyData, self::PKCS_8_PEM_HEADER, self::PKCS_8_PEM_FOOTER);
        return openssl_pkey_get_private($pkcs8Pem);
    }

    private static function readFileContent($path) {
        try {
            return file_get_contents($path);
        } catch (\Exception $e) {
            throw new \InvalidArgumentException('Failed to read the given file: ' . $path . '!', 0, $e);
        }
    }
}
