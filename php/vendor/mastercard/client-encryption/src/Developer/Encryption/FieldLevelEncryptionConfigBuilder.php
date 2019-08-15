<?php

namespace Mastercard\Developer\Encryption;

use Mastercard\Developer\Json\JsonPath;
use Mastercard\Developer\Utils\EncodingUtils;
use phpseclib\Crypt\Hash;

/**
 * A builder class for FieldLevelEncryptionConfig.
 * @see FieldLevelEncryptionConfig
 * @package Mastercard\Developer\Encryption
 */
class FieldLevelEncryptionConfigBuilder {

    private $encryptionCertificate;
    private $encryptionCertificateFingerprint;
    private $encryptionKeyFingerprint;
    private $decryptionKey;
    private $encryptionPaths = array();
    private $decryptionPaths = array();
    private $oaepPaddingDigestAlgorithm;
    private $ivFieldName;
    private $ivHeaderName;
    private $oaepPaddingDigestAlgorithmFieldName;
    private $oaepPaddingDigestAlgorithmHeaderName;
    private $encryptedKeyFieldName;
    private $encryptedKeyHeaderName;
    private $encryptedValueFieldName;
    private $encryptionCertificateFingerprintFieldName;
    private $encryptionCertificateFingerprintHeaderName;
    private $encryptionKeyFingerprintFieldName;
    private $encryptionKeyFingerprintHeaderName;
    private $fieldValueEncoding;

    private function __construct() {}

    /**
     * Get an instance of the builder.
     */
    public static function aFieldLevelEncryptionConfig() {
        return new FieldLevelEncryptionConfigBuilder();
    }

    /**
     * @see FieldLevelEncryptionConfig::encryptionCertificate.
     */
    public function withEncryptionCertificate($encryptionCertificate) {
        $this->encryptionCertificate = $encryptionCertificate;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::encryptionCertificateFingerprint.
     */
    public function withEncryptionCertificateFingerprint($encryptionCertificateFingerprint) {
        $this->encryptionCertificateFingerprint = $encryptionCertificateFingerprint;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::encryptionKeyFingerprint.
     */
    public function withEncryptionKeyFingerprint($encryptionKeyFingerprint) {
        $this->encryptionKeyFingerprint = $encryptionKeyFingerprint;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::decryptionKey.
     */
    public function withDecryptionKey($decryptionKey) {
        $this->decryptionKey = $decryptionKey;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::encryptionPaths.
     */
    public function withEncryptionPath($jsonPathIn, $jsonPathOut) {
        $this->encryptionPaths[$jsonPathIn] = $jsonPathOut;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::decryptionPaths.
     */
    public function withDecryptionPath($jsonPathIn, $jsonPathOut) {
        $this->decryptionPaths[$jsonPathIn] = $jsonPathOut;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::oaepPaddingDigestAlgorithm.
     */
    public function withOaepPaddingDigestAlgorithm($oaepPaddingDigestAlgorithm) {
        $this->oaepPaddingDigestAlgorithm = $oaepPaddingDigestAlgorithm;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::ivFieldName.
     */
    public function withIvFieldName($ivFieldName) {
        $this->ivFieldName = $ivFieldName;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::oaepPaddingDigestAlgorithmFieldName.
     */
    public function withOaepPaddingDigestAlgorithmFieldName($oaepPaddingDigestAlgorithmFieldName) {
        $this->oaepPaddingDigestAlgorithmFieldName = $oaepPaddingDigestAlgorithmFieldName;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::encryptedKeyFieldName.
     */
    public function withEncryptedKeyFieldName($encryptedKeyFieldName) {
        $this->encryptedKeyFieldName = $encryptedKeyFieldName;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::encryptedValueFieldName.
     */
    public function withEncryptedValueFieldName($encryptedValueFieldName) {
        $this->encryptedValueFieldName = $encryptedValueFieldName;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::encryptionCertificateFingerprintFieldName.
     */
    public function withEncryptionCertificateFingerprintFieldName($encryptionCertificateFingerprintFieldName) {
        $this->encryptionCertificateFingerprintFieldName = $encryptionCertificateFingerprintFieldName;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::encryptionKeyFingerprintFieldName.
     */
    public function withEncryptionKeyFingerprintFieldName($encryptionKeyFingerprintFieldName) {
        $this->encryptionKeyFingerprintFieldName = $encryptionKeyFingerprintFieldName;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::fieldValueEncoding.
     */
    public function withFieldValueEncoding($fieldValueEncoding) {
        $this->fieldValueEncoding = $fieldValueEncoding;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::ivHeaderName.
     */
    public function withIvHeaderName($ivHeaderName) {
        $this->ivHeaderName = $ivHeaderName;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::oaepPaddingDigestAlgorithmHeaderName.
     */
    public function withOaepPaddingDigestAlgorithmHeaderName($oaepPaddingDigestAlgorithmHeaderName) {
        $this->oaepPaddingDigestAlgorithmHeaderName = $oaepPaddingDigestAlgorithmHeaderName;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::encryptedKeyHeaderName.
     */
    public function withEncryptedKeyHeaderName($encryptedKeyHeaderName) {
        $this->encryptedKeyHeaderName = $encryptedKeyHeaderName;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::encryptionCertificateFingerprintHeaderName.
     */
    public function withEncryptionCertificateFingerprintHeaderName($encryptionCertificateFingerprintHeaderName) {
        $this->encryptionCertificateFingerprintHeaderName = $encryptionCertificateFingerprintHeaderName;
        return $this;
    }

    /**
     * @see FieldLevelEncryptionConfig::encryptionKeyFingerprintHeaderName.
     */
    public function withEncryptionKeyFingerprintHeaderName($encryptionKeyFingerprintHeaderName) {
        $this->encryptionKeyFingerprintHeaderName = $encryptionKeyFingerprintHeaderName;
        return $this;
    }

    /**
     * Build a FieldLevelEncryptionConfig.
     * @see FieldLevelEncryptionConfig
     * @throws EncryptionException, InvalidArgumentException
     */
    public function build() {

        $this->checkJsonPathParameterValues();
        $this->checkParameterValues();
        $this->checkParameterConsistency();

        $this->computeEncryptionCertificateFingerprintWhenNeeded();
        $this->computeEncryptionKeyFingerprintWhenNeeded();

        return new FieldLevelEncryptionConfig(
            $this->encryptionCertificate,
            $this->encryptionCertificateFingerprint,
            $this->encryptionKeyFingerprint,
            $this->decryptionKey,
            $this->encryptionPaths,
            $this->decryptionPaths,
            $this->oaepPaddingDigestAlgorithm,
            $this->oaepPaddingDigestAlgorithmFieldName,
            $this->oaepPaddingDigestAlgorithmHeaderName,
            $this->ivFieldName,
            $this->ivHeaderName,
            $this->encryptedKeyFieldName,
            $this->encryptedKeyHeaderName,
            $this->encryptedValueFieldName,
            $this->encryptionCertificateFingerprintFieldName,
            $this->encryptionCertificateFingerprintHeaderName,
            $this->encryptionKeyFingerprintFieldName,
            $this->encryptionKeyFingerprintHeaderName,
            $this->fieldValueEncoding
        );
    }

    private function checkJsonPathParameterValues() {
        foreach ($this->decryptionPaths as $jsonPathIn => $jsonPathOut) {
            if (!JsonPath::isPathDefinite($jsonPathIn) || !JsonPath::isPathDefinite($jsonPathOut)) {
                throw new \InvalidArgumentException('JSON paths for decryption must point to a single item!');
            }
        }
        foreach ($this->encryptionPaths as $jsonPathIn => $jsonPathOut) {
            if (!JsonPath::isPathDefinite($jsonPathIn) || !JsonPath::isPathDefinite($jsonPathOut)) {
                throw new \InvalidArgumentException('JSON paths for encryption must point to a single item!');
            }
        }
    }

    private function checkParameterValues() {
        if (empty($this->oaepPaddingDigestAlgorithm)) {
            throw new \InvalidArgumentException('The digest algorithm for OAEP cannot be empty!');
        }

        if ('SHA-256' !== $this->oaepPaddingDigestAlgorithm && 'SHA-512' !== $this->oaepPaddingDigestAlgorithm) {
            throw new \InvalidArgumentException('Unsupported OAEP digest algorithm: ' . $this->oaepPaddingDigestAlgorithm . '!');
        }

        if (empty($this->fieldValueEncoding)) {
            throw new \InvalidArgumentException('Value encoding for fields and headers cannot be empty!');
        }

        if (empty($this->ivFieldName) && empty($this->ivHeaderName)) {
            throw new \InvalidArgumentException('At least one of IV field name or IV header name must be set!');
        }

        if (empty($this->encryptedKeyFieldName) && empty($this->encryptedKeyHeaderName)) {
            throw new \InvalidArgumentException('At least one of encrypted key field name or encrypted key header name must be set!');
        }

        if (empty($this->encryptedValueFieldName)) {
            throw new \InvalidArgumentException('Encrypted value field name cannot be empty!');
        }
    }

    private function checkParameterConsistency () {
        if (!empty($this->decryptionPaths) && empty($this->decryptionKey)) {
            throw new \InvalidArgumentException('Can\'t decrypt without decryption key!');
        }

        if (!empty($this->encryptionPaths) && empty($this->encryptionCertificate)) {
            throw new \InvalidArgumentException('Can\'t encrypt without encryption key!');
        }

        if (!empty($this->ivHeaderName) && empty($this->encryptedKeyHeaderName)
            || empty($this->ivHeaderName) && !empty($this->encryptedKeyHeaderName)) {
            throw new \InvalidArgumentException('IV header name and encrypted key header name must be both set or both unset!');
        }

        if (!empty($this->ivFieldName) && empty($this->encryptedKeyFieldName)
            || empty($this->ivFieldName) && !empty($this->encryptedKeyFieldName)) {
            throw new \InvalidArgumentException('IV field name and encrypted key field name must be both set or both unset!');
        }
    }

    private function computeEncryptionCertificateFingerprintWhenNeeded() {
        $providedEncryptionCertificate = $this->encryptionCertificate;
        if (empty($providedEncryptionCertificate) || !empty($this->encryptionCertificateFingerprint)) {
            // No encryption certificate set or certificate fingerprint already provided
            return;
        }
        try {
            $this->encryptionCertificateFingerprint = openssl_x509_fingerprint($providedEncryptionCertificate, 'sha256');
        } catch (\Exception $e) {
            throw new EncryptionException('Failed to compute encryption certificate fingerprint!', $e);
        }
    }

    private function computeEncryptionKeyFingerprintWhenNeeded() {
        $providedEncryptionCertificate = $this->encryptionCertificate;
        if (empty($providedEncryptionCertificate) || !empty($this->encryptionKeyFingerprint)) {
            // No encryption certificate set or key fingerprint already provided
            return;
        }
        try {
            $publicKeyPem = openssl_pkey_get_details(openssl_pkey_get_public($providedEncryptionCertificate))['key'];
            $publicKeyDer = EncodingUtils::pemToDer($publicKeyPem, '-----BEGIN PUBLIC KEY-----', '-----END PUBLIC KEY-----');
            $hash = new Hash('sha256');
            $this->encryptionKeyFingerprint = EncodingUtils::encodeBytes($hash->hash($publicKeyDer), FieldValueEncoding::HEX);
        } catch (\Exception $e) {
            throw new EncryptionException('Failed to compute encryption key fingerprint!', $e);
        }
    }
}