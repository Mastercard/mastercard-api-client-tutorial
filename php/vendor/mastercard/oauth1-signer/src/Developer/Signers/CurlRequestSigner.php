<?php

namespace Mastercard\Developer\Signers;

use Mastercard\Developer\OAuth\OAuth;

/**
 * Utility class for adding the authorization header to cURL requests (see: http://php.net/manual/en/book.curl.php)
 */
class CurlRequestSigner extends BaseSigner {

    public function sign(&$handle, $method, &$headers = array(), $payload = null) {
        $uri = curl_getinfo($handle, CURLINFO_EFFECTIVE_URL);
        $authHeader = OAuth::getAuthorizationHeader($uri, $method, $payload, $this->consumerKey, $this->signingKey);
        $headers[] = OAuth::AUTHORIZATION_HEADER_NAME . ': ' . $authHeader;
        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
    }
}