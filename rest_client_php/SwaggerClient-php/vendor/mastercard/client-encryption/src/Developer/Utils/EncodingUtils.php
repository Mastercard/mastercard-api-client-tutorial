<?php
namespace Mastercard\Developer\Utils;

use Mastercard\Developer\Encryption\FieldValueEncoding;

class EncodingUtils {

    private function __construct() {}

    static function encodeBytes($bytes, $encoding) {
        return $encoding === FieldValueEncoding::HEX ? self::hexEncode($bytes) : base64_encode($bytes);
    }

    static function decodeValue($value, $encoding) {
        return $encoding === FieldValueEncoding::HEX ? self::hexDecode($value) : base64_decode($value);
    }

    static function hexEncode($bytes) {
        if ('' === $bytes) {
            return '';
        }
        if (empty($bytes)) {
            throw new \InvalidArgumentException('Can\'t hex encode an empty value!');
        }
        return bin2hex($bytes);
    }

    static function hexDecode($value) {
        if ('' === $value) {
            return '';
        }
        if (empty($value)) {
            throw new \InvalidArgumentException('Can\'t hex decode an empty value!');
        }
        if (!ctype_xdigit($value)) {
            throw new \InvalidArgumentException('The provided value is not an hex string!');
        }
        return hex2bin($value);
    }

    static function derToPem($der, $header, $footer) {
        return $header . "\r\n". chunk_split(base64_encode($der), 64, "\r\n") . $footer;
    }

    static function pemToDer($pem, $header, $footer) {
        $der = str_replace($header, '', $pem);
        $der = str_replace($footer, '', $der);
        return base64_decode($der);
    }
}