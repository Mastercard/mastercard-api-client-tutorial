<?php
namespace Mastercard\Developer\Interceptors;

use Mastercard\Developer\Encryption\EncryptionException;
use Mastercard\Developer\Encryption\FieldLevelEncryption;
use Mastercard\Developer\Encryption\FieldLevelEncryptionParams;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Utility class for encrypting RequestInterface and decrypting ResponseInterface payloads (see: https://www.php-fig.org/psr/psr-7/)
 * @package Mastercard\Developer\Interceptors
 */
class PsrHttpMessageEncryptionInterceptor {

    private $config;

    /**
     * PsrHttpMessageEncryptionInterceptor constructor.
     * @param $config A FieldLevelEncryptionConfig instance
     */
    public function __construct($config) {
        $this->config = $config;
    }

    /**
     * Encrypt payloads from RequestInterface objects when needed.
     * @param $request A RequestInterface object
     * @return The updated RequestInterface object
     * @throws EncryptionException
     */
    public function interceptRequest(RequestInterface &$request) {
        try {
            // Check request actually has a payload
            $body = $request->getBody();
            $payload = $body->__toString();
            if (empty($payload)) {
                // Nothing to encrypt
                return $request;
            }

            // Encrypt fields & update headers
            if ($this->config->useHttpHeaders()) {
                // Generate encryption params and add them as HTTP headers
                $params = FieldLevelEncryptionParams::generate($this->config);
                self::updateHeader($request, $this->config->getIvHeaderName(), $params->getIvValue());
                self::updateHeader($request, $this->config->getEncryptedKeyHeaderName(), $params->getEncryptedKeyValue());
                self::updateHeader($request, $this->config->getEncryptionCertificateFingerprintHeaderName(), $this->config->getEncryptionCertificateFingerprint());
                self::updateHeader($request, $this->config->getEncryptionKeyFingerprintHeaderName(), $this->config->getEncryptionKeyFingerprint());
                self::updateHeader($request, $this->config->getOaepPaddingDigestAlgorithmHeaderName(), $params->getOaepPaddingDigestAlgorithmValue());
                $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $this->config, $params);
            } else {
                // Encryption params will be stored in the payload
                $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $this->config);
            }

            // Update body and content length
            $updatedBody = new PsrStreamInterfaceImpl();
            $updatedBody->write($encryptedPayload);
            $request = $request->withBody($updatedBody);
            self::updateHeader($request, 'Content-Length', $updatedBody->getSize());
            return $request;

        } catch (EncryptionException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new EncryptionException('Failed to intercept and encrypt request!', $e);
        }
    }

    /**
     * Decrypt payloads from ResponseInterface objects when needed.
     * @param $response A ResponseInterface object
     * @return The updated ResponseInterface object
     * @throws EncryptionException
     */
    public function interceptResponse(ResponseInterface &$response) {
        try {
            // Read response payload
            $body = $response->getBody();
            $payload = $body->__toString();
            if (empty($payload)) {
                // Nothing to decrypt
                return $response;
            }

            // Decrypt fields & update headers
            if ($this->config->useHttpHeaders()) {
                // Read encryption params from HTTP headers and delete headers
                $ivValue = self::readAndRemoveHeader($response, $this->config->getIvHeaderName());
                $encryptedKeyValue = self::readAndRemoveHeader($response, $this->config->getEncryptedKeyHeaderName());
                $oaepPaddingDigestAlgorithmValue = self::readAndRemoveHeader($response, $this->config->getOaepPaddingDigestAlgorithmHeaderName());
                self::readAndRemoveHeader($response, $this->config->getEncryptionCertificateFingerprintHeaderName());
                self::readAndRemoveHeader($response, $this->config->getEncryptionKeyFingerprintHeaderName());
                $params = new FieldLevelEncryptionParams($this->config, $ivValue, $encryptedKeyValue, $oaepPaddingDigestAlgorithmValue);
                $decryptedPayload = FieldLevelEncryption::decryptPayload($payload, $this->config, $params);
            } else {
                // Encryption params are stored in the payload
                $decryptedPayload = FieldLevelEncryption::decryptPayload($payload, $this->config);
            }

            // Update body and content length
            $updatedBody = new PsrStreamInterfaceImpl();
            $updatedBody->write($decryptedPayload);
            $response = $response->withBody($updatedBody);
            self::updateHeader($response, 'Content-Length', $updatedBody->getSize());
            return $response;

        } catch (EncryptionException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new EncryptionException('Failed to intercept and decrypt response!', $e);
        }
    }

    private static function updateHeader(&$message, $name, $value) {
        if (empty($name)) {
            // Do nothing
            return $message;
        }
        $message = $message->withHeader($name, $value);
    }

    private static function readAndRemoveHeader(&$message, $name) {
        if (empty($name)) {
            return null;
        }
        if (!$message->hasHeader($name)) {
            return null;
        }
        $values = $message->getHeader($name);
        $message = $message->withoutHeader($name);
        return $values[0];
    }
}