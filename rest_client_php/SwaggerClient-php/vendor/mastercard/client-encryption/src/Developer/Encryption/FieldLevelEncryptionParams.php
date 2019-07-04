<?php

namespace Mastercard\Developer\Encryption;
use Mastercard\Developer\Utils\EncodingUtils;
use phpseclib\Crypt\RSA;

/**
 * Encryption parameters for computing field level encryption/decryption.
 * @package Mastercard\Developer\Encryption
 */
class FieldLevelEncryptionParams {

    const SYMMETRIC_CYPHER = 'AES-128-CBC';
    const SYMMETRIC_KEY_SIZE = 128;

    private $ivValue;
    private $encryptedKeyValue;
    private $oaepPaddingDigestAlgorithmValue;
    private $config;
    private $secretKey;
    private $iv;

    public function __construct($config, $ivValue, $encryptedKeyValue, $oaepPaddingDigestAlgorithmValue = null) {
        $this->ivValue = $ivValue;
        $this->encryptedKeyValue = $encryptedKeyValue;
        $this->oaepPaddingDigestAlgorithmValue = $oaepPaddingDigestAlgorithmValue;
        $this->config = $config;
    }

    /**
     * Generate encryption parameters.
     * @param $config A FieldLevelEncryptionConfig instance
     * @return FieldLevelEncryptionParams
     * @throws EncryptionException
     */
    public static function generate($config) {

        // Generate a random IV
        $ivLength = openssl_cipher_iv_length(self::SYMMETRIC_CYPHER);
        $iv = openssl_random_pseudo_bytes($ivLength);
        $ivValue = EncodingUtils::encodeBytes($iv, $config->getFieldValueEncoding());

        // Generate an AES secret key
        $secretKey = openssl_random_pseudo_bytes(self::SYMMETRIC_KEY_SIZE / 8);

        // Encrypt the secret key
        $encryptedSecretKeyBytes = self::wrapSecretKey($config, $secretKey);
        $encryptedKeyValue = EncodingUtils::encodeBytes($encryptedSecretKeyBytes, $config->getFieldValueEncoding());

        // Compute the OAEP padding digest algorithm
        $oaepPaddingDigestAlgorithmValue = str_replace('-', '', $config->getOaepPaddingDigestAlgorithm());

        $params = new FieldLevelEncryptionParams($config, $ivValue, $encryptedKeyValue, $oaepPaddingDigestAlgorithmValue);
        $params->secretKey = $secretKey;
        $params->iv = $iv;
        return $params;
    }

    public function getIvValue() {
        return $this->ivValue;
    }

    public function getEncryptedKeyValue() {
        return $this->encryptedKeyValue;
    }

    public function getOaepPaddingDigestAlgorithmValue() {
        return $this->oaepPaddingDigestAlgorithmValue;
    }

    /**
     * @throws EncryptionException
     */
    public function getIvBytes() {
        try {
            if (!empty($this->iv)) {
                return $this->iv;
            }
            // Decode the IV
            $this->iv = EncodingUtils::decodeValue($this->ivValue, $this->config->getFieldValueEncoding());
            return $this->iv;
        } catch (\Exception $e) {
            throw new EncryptionException('Failed to decode the provided IV value!', $e);
        }
    }

    /**
     * @throws EncryptionException
     */
    public function getSecretKeyBytes() {
        try {
            if (!empty($this->secretKey)) {
                return $this->secretKey;
            }
            // Decrypt the AES secret key
            $encryptedSecretKeyBytes = EncodingUtils::decodeValue($this->encryptedKeyValue, $this->config->getFieldValueEncoding());
            $this->secretKey = self::unwrapSecretKey($this->config, $encryptedSecretKeyBytes, $this->oaepPaddingDigestAlgorithmValue);
            return $this->secretKey;
        } catch (EncryptionException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new EncryptionException('Failed to decode and unwrap the provided secret key value!', $e);
        }
    }

    /**
     * @throws EncryptionException
     */
    private static function wrapSecretKey($config, $keyBytes) {
        try {
            $encryptionCertificate = $config->getEncryptionCertificate();
            $publicKey = openssl_pkey_get_details(openssl_pkey_get_public($encryptionCertificate));
            $rsa = self::getRsa($config->getOaepPaddingDigestAlgorithm(), $publicKey['key'], RSA::PUBLIC_FORMAT_PKCS1);
            return $rsa->encrypt($keyBytes);
        } catch (\Exception $e) {
            throw new EncryptionException('Failed to wrap secret key!', $e);
        }
    }

    /**
     * @throws EncryptionException
     */
    private static function unwrapSecretKey($config, $wrappedKeyBytes, $oaepPaddingDigestAlgorithm) {
        try {
            $decryptionKey = $config->getDecryptionKey();
            $rawPrivateKey = openssl_pkey_get_details($decryptionKey)['rsa'];
            $rsa = self::getRsa($oaepPaddingDigestAlgorithm, self::toDsigXmlPrivateKey($rawPrivateKey), RSA::PRIVATE_FORMAT_XML);
            return $rsa->decrypt($wrappedKeyBytes);
        } catch (\Exception $e) {
            throw new EncryptionException('Failed to unwrap secret key!', $e);
        }
    }

    private static function getRsa($oaepPaddingDigestAlgorithm, $key, $type) {
        $rsa = new RSA();
        $rsa->setEncryptionMode(RSA::ENCRYPTION_OAEP);
        $hash = strtolower(str_replace('-', '', $oaepPaddingDigestAlgorithm));
        $rsa->setMGFHash($hash);
        $rsa->setHash($hash);
        $rsa->loadKey($key, $type);
        return $rsa;
    }

    private static function toDsigXmlPrivateKey($raw) {
        return "<RSAKeyValue>\r\n" .
            '  <Modulus>' . base64_encode($raw['n']) . "</Modulus>\r\n" .
            '  <Exponent>' . base64_encode($raw['e']) . "</Exponent>\r\n" .
            '  <P>' . base64_encode($raw['p']) . "</P>\r\n" .
            '  <Q>' . base64_encode($raw['q']) . "</Q>\r\n" .
            '  <DP>' . base64_encode($raw['dmp1']) . "</DP>\r\n" .
            '  <DQ>' . base64_encode($raw['dmq1']) . "</DQ>\r\n" .
            '  <InverseQ>' . base64_encode($raw['iqmp']) . "</InverseQ>\r\n" .
            '  <D>' . base64_encode($raw['d']) . "</D>\r\n" .
            '</RSAKeyValue>';
    }
}