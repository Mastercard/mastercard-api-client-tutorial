<?php
namespace Mastercard\Developer\OAuth\Utils;

/**
 * Utility class.
 * @package Mastercard\Developer\OAuth\Utils
 */
class AuthenticationUtils {

    private function __construct() {}

    /**
     * Load a RSA signing key out of a PKCS#12 container.
     */
    public static function loadSigningKey($pkcs12KeyFilePath, $signingKeyAlias, $signingKeyPassword) { //NOSONAR
        try {
            $keystore = file_get_contents($pkcs12KeyFilePath);
        } catch (\Exception $e) {
            throw new \InvalidArgumentException('Failed to read the given file: ' . $pkcs12KeyFilePath . '!', 0, $e);
        }

        openssl_pkcs12_read($keystore, $certs, $signingKeyPassword);
        if (is_null($certs)) {
            throw new \InvalidArgumentException('Failed to open keystore with the provided password!');
        }

        return openssl_get_privatekey($certs['pkey']);
    }
}
