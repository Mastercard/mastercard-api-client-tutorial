<?php
namespace Mastercard\Developer\OAuth\Utils;

/**
 * Utility class.
 * @deprecated Use AuthenticationUtils instead.
 * @see Mastercard\Developer\OAuth\Utils\AuthenticationUtils
 * @package Mastercard\Developer\OAuth\Utils
 */
class SecurityUtils {

    private function __construct() {}

    /**
     * @deprecated
     */
    public static function loadPrivateKey($pkcs12KeyFilePath, $keyAlias, $keyPassword) {
        return AuthenticationUtils::loadSigningKey($pkcs12KeyFilePath, $keyAlias, $keyPassword);
    }
}
