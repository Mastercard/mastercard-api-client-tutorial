<?php

namespace Mastercard\Developer\Encryption;

/**
 * A class for storing the encryption/decryption configuration.
 * @package Mastercard\Developer\Encryption
 */
class FieldLevelEncryptionConfig {

    /**
     * A certificate object whose public key will be used for encryption.
     */
    private $encryptionCertificate;

    /**
     * The SHA-256 hex-encoded digest of the certificate used for encryption (optional, the digest will be
     * automatically computed if this field is null or empty).
     * Example: '4d9d7540be320429ffc8e6506f054525816e2d0e95a85247d5b58be713f28be0'
     */
    private $encryptionCertificateFingerprint;

    /**
     * The SHA-256 hex-encoded digest of the key used for encryption (optional, the digest will be
     * automatically computed if this field is null or empty).
     * Example: 'c3f8ef7053c4fb306f7476e7d1956f0aa992ff9dfdd5244b912a1d377ff3a84f'
     */
    private $encryptionKeyFingerprint;

    /**
     * A private key object to be used for decryption.
     */
    private $decryptionKey;

    /**
     * A list of JSON paths to encrypt in request payloads.
     * Example:
     * <pre>
     * array(
     *     '$.path.to.element.to.be.encrypted' => '$.path.to.object.where.to.store.encryption.fields'
     * )
     * </pre>
     */
    private $encryptionPaths = array();

    /**
     * A list of JSON paths to decrypt in response payloads.
     * Example:
     * <pre>
     * array(
     *     '$.path.to.object.with.encryption.fields' => '$.path.where.to.write.decrypted.element'
     * )
     * </pre>
     */
    private $decryptionPaths = array();

    /**
     * The digest algorithm to be used for the RSA OAEP padding. Example: 'SHA-512'.
     */
    private $oaepPaddingDigestAlgorithm;

    /**
     * The name of the payload field where to write/read the digest algorithm used for
     * the RSA OAEP padding (optional, the field won't be set if the name is null or empty).
     */
    private $oaepPaddingDigestAlgorithmFieldName;

    /**
     * The name of the HTTP header where to write/read the digest algorithm used for
     * the RSA OAEP padding (optional, the header won't be set if the name is null or empty).
     */
    private $oaepPaddingDigestAlgorithmHeaderName;

    /**
     * The name of the payload field where to write/read the initialization vector value.
     */
    private $ivFieldName;

    /**
     * The name of the header where to write/read the initialization vector value.
     */
    private $ivHeaderName;

    /**
     * The name of the payload field where to write/read the one-time usage encrypted symmetric key.
     */
    private $encryptedKeyFieldName;

    /**
     * The name of the header where to write/read the one-time usage encrypted symmetric key.
     */
    private $encryptedKeyHeaderName;

    /**
     * The name of the payload field where to write/read the encrypted data value.
     */
    private $encryptedValueFieldName;

    /**
     * The name of the payload field where to write/read the digest of the encryption
     * certificate (optional, the field won't be set if the name is null or empty).
     */
    private $encryptionCertificateFingerprintFieldName;

    /**
     * The name of the header where to write/read the digest of the encryption
     * certificate (optional, the header won't be set if the name is null or empty).
     */
    private $encryptionCertificateFingerprintHeaderName;

    /**
     * The name of the payload field where to write/read the digest of the encryption
     * key (optional, the field won't be set if the name is null or empty).
     */
    private $encryptionKeyFingerprintFieldName;

    /**
     * The name of the header where to write/read the digest of the encryption
     * key (optional, the header won't be set if the name is null or empty).
     */
    private $encryptionKeyFingerprintHeaderName;

    /**
     * How the field/header values have to be encoded.
     */
    private $fieldValueEncoding;

    /**
     * If the encryption parameters must be written to/read from HTTP headers.
     */
    public function useHttpHeaders() {
        return !empty($this->encryptedKeyHeaderName) && !empty($this->ivHeaderName);
    }

    /**
     * If the encryption parameters must be written to/read from HTTP payloads.
     */
    public function useHttpPayloads() {
        return !empty($this->encryptedKeyFieldName) && !empty($this->ivFieldName);
    }

    /**
     * FieldLevelEncryptionConfig constructor.
     */
    public function __construct($encryptionCertificate, $encryptionCertificateFingerprint, $encryptionKeyFingerprint, $decryptionKey, $encryptionPaths, $decryptionPaths, $oaepPaddingDigestAlgorithm, $oaepPaddingDigestAlgorithmFieldName, $oaepPaddingDigestAlgorithmHeaderName, $ivFieldName, $ivHeaderName, $encryptedKeyFieldName, $encryptedKeyHeaderName, $encryptedValueFieldName, $encryptionCertificateFingerprintFieldName, $encryptionCertificateFingerprintHeaderName, $encryptionKeyFingerprintFieldName, $encryptionKeyFingerprintHeaderName, $fieldValueEncoding) {
        $this->encryptionCertificate = $encryptionCertificate;
        $this->encryptionCertificateFingerprint = $encryptionCertificateFingerprint;
        $this->encryptionKeyFingerprint = $encryptionKeyFingerprint;
        $this->decryptionKey = $decryptionKey;
        $this->encryptionPaths = $encryptionPaths;
        $this->decryptionPaths = $decryptionPaths;
        $this->oaepPaddingDigestAlgorithm = $oaepPaddingDigestAlgorithm;
        $this->oaepPaddingDigestAlgorithmFieldName = $oaepPaddingDigestAlgorithmFieldName;
        $this->oaepPaddingDigestAlgorithmHeaderName = $oaepPaddingDigestAlgorithmHeaderName;
        $this->ivFieldName = $ivFieldName;
        $this->ivHeaderName = $ivHeaderName;
        $this->encryptedKeyFieldName = $encryptedKeyFieldName;
        $this->encryptedKeyHeaderName = $encryptedKeyHeaderName;
        $this->encryptedValueFieldName = $encryptedValueFieldName;
        $this->encryptionCertificateFingerprintFieldName = $encryptionCertificateFingerprintFieldName;
        $this->encryptionCertificateFingerprintHeaderName = $encryptionCertificateFingerprintHeaderName;
        $this->encryptionKeyFingerprintFieldName = $encryptionKeyFingerprintFieldName;
        $this->encryptionKeyFingerprintHeaderName = $encryptionKeyFingerprintHeaderName;
        $this->fieldValueEncoding = $fieldValueEncoding;
    }

    public function getEncryptionCertificate() {
        return $this->encryptionCertificate;
    }

    public function getEncryptionCertificateFingerprint() {
        return $this->encryptionCertificateFingerprint;
    }

    public function getEncryptionKeyFingerprint() {
        return $this->encryptionKeyFingerprint;
    }

    public function getDecryptionKey() {
        return $this->decryptionKey;
    }

    public function getEncryptionPaths() {
        return $this->encryptionPaths;
    }

    public function getDecryptionPaths() {
        return $this->decryptionPaths;
    }

    public function getOaepPaddingDigestAlgorithm() {
        return $this->oaepPaddingDigestAlgorithm;
    }

    public function getOaepPaddingDigestAlgorithmFieldName() {
        return $this->oaepPaddingDigestAlgorithmFieldName;
    }

    public function getOaepPaddingDigestAlgorithmHeaderName() {
        return $this->oaepPaddingDigestAlgorithmHeaderName;
    }

    public function getIvFieldName() {
        return $this->ivFieldName;
    }

    public function getIvHeaderName() {
        return $this->ivHeaderName;
    }

    public function getEncryptedKeyFieldName() {
        return $this->encryptedKeyFieldName;
    }

    public function getEncryptedKeyHeaderName() {
        return $this->encryptedKeyHeaderName;
    }

    public function getEncryptedValueFieldName() {
        return $this->encryptedValueFieldName;
    }

    public function getEncryptionCertificateFingerprintFieldName() {
        return $this->encryptionCertificateFingerprintFieldName;
    }

    public function getEncryptionCertificateFingerprintHeaderName() {
        return $this->encryptionCertificateFingerprintHeaderName;
    }

    public function getEncryptionKeyFingerprintFieldName() {
        return $this->encryptionKeyFingerprintFieldName;
    }

    public function getEncryptionKeyFingerprintHeaderName() {
        return $this->encryptionKeyFingerprintHeaderName;
    }

    public function getFieldValueEncoding() {
        return $this->fieldValueEncoding;
    }
}