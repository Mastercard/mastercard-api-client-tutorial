<?php

namespace Mastercard\Developer\OAuth;

class OAuth {

    const AUTHORIZATION_HEADER_NAME = 'Authorization';

    /**
     * Creates a Mastercard API compliant OAuth Authorization header.
     * @return string
     * @throws \InvalidArgumentException
     */
    public static function getAuthorizationHeader($uri, $method, $payload, $consumerKey, $signingKey) {
        if (empty($uri)) {
            throw new \InvalidArgumentException('URI must be set!');
        }

        if (empty($method)) {
            throw new \InvalidArgumentException('HTTP method must be set!');
        }

        if (empty($consumerKey)) {
            throw new \InvalidArgumentException('Consumer key must be set!');
        }

        if (empty($signingKey)) {
            throw new \InvalidArgumentException('Signing key must be set!');
        }

        $queryParameters = self::extractQueryParams($uri);
        $oauthParameters = [];
        $oauthParameters['oauth_consumer_key'] = $consumerKey;
        $oauthParameters['oauth_nonce'] = self::getNonce();
        $oauthParameters['oauth_timestamp'] = self::getTimestamp();
        $oauthParameters['oauth_signature_method'] = 'RSA-SHA256';
        $oauthParameters['oauth_version'] = '1.0';
        $oauthParameters['oauth_body_hash'] = self::getBodyHash($payload);

        // Compute the OAuth signature
        $oauthParamString = self::getOAuthParamString($queryParameters, $oauthParameters);
        $baseUri = self::getBaseUriString($uri);
        $signatureBaseString = self::getSignatureBaseString($baseUri, $method, $oauthParamString);
        $oauthParameters['oauth_signature'] = self::signSignatureBaseString($signatureBaseString, $signingKey);

        // Constructs and returns a valid Authorization header as per https://tools.ietf.org/html/rfc5849#section-3.5.1
        $result = '';
        foreach ($oauthParameters as $key => $value) {
            $result .= (strlen($result) == 0 ? 'OAuth ' : ',');
            $result .=  $key . '="' . rawurlencode($value) . '"';
        }
        return $result;
    }

    /**
     * Parse query parameters out of the URL. https://tools.ietf.org/html/rfc5849#section-3.4.1.3
     * @return array
     * @throws \InvalidArgumentException
     */
    private static function extractQueryParams($uri) {
        $uriParts = parse_url($uri);
        if (!$uriParts) {
            throw new \InvalidArgumentException('URI is not valid!');
        }

        if (!array_key_exists('host', $uriParts)) {
            throw new \InvalidArgumentException('No URI host!');
        }

        if (!array_key_exists('query', $uriParts)) {
            return array();
        }

        $rawQueryString = $uriParts['query'];
        $decodedQueryString = rawurldecode($rawQueryString);
        $mustEncode = $decodedQueryString != $rawQueryString;

        $queryParameters = [];
        $rawParams = explode('&', $rawQueryString);
        foreach ($rawParams as $index => $pair) {
            if (empty($pair)) {
                continue;
            }
            $index = strpos($pair, '=');
            $key = rawurldecode($index > 0 ? substr($pair, 0, $index) : $pair);
            $value = ($index > 0 && strlen($pair) > $index + 1) ? rawurldecode(substr($pair, $index + 1)) : '';
            $encodedKey =  $mustEncode ? rawurlencode($key) : $key;
            $encodedValue = $mustEncode ? rawurlencode($value) : $value;
            if (!array_key_exists($encodedKey, $queryParameters)) {
                $queryParameters[$encodedKey] = array();
            }
            array_push($queryParameters[$encodedKey], $encodedValue);
        }

        return $queryParameters;
    }

    /**
     * Generates a hash based on request payload as per https://tools.ietf.org/id/draft-eaton-oauth-bodyhash-00.html.
     * "If the request does not have an entity body, the hash should be taken over the empty string".
     * @return string
     */
    private static function getBodyHash($payload) {
        return base64_encode(hash('sha256', $payload, true));
    }

    /**
     * Lexicographically sort all parameters and concatenate them into a string as per https://tools.ietf.org/html/rfc5849#section-3.4.1.3.2.
     * @return string
     */
    private static function getOAuthParamString($queryParameters, $oauthParameters) {
        foreach ($oauthParameters as $key => $value) {
            $oauthParameters[$key] = array($value);
        }
        $allParameters = array_merge($queryParameters, $oauthParameters);
        ksort($allParameters, SORT_NATURAL);

        // Build the OAuth parameter string
        $parameterString = '';
        foreach ($allParameters as $key => $values) {
            asort($values, SORT_NATURAL); // Keys with same name are sorted by their values
            foreach ($values as $value) {
                $parameterString .= (strlen($parameterString) == 0 ? '' : '&');
                $parameterString .=  $key . '=' . $value;
            }
        }
        return $parameterString;
    }

    /**
     * Normalizes the URL as per https://tools.ietf.org/html/rfc5849#section-3.4.1.2.
     * @return string
     * @throws \InvalidArgumentException
     */
    private static function getBaseUriString($uriString) {
        $uriParts = parse_url($uriString);
        if (!$uriParts) {
            throw new \InvalidArgumentException('URI is not valid!');
        }

        // Remove query and fragment
        $normalizedUrl = strtolower($uriParts['scheme']) . '://' . strtolower($uriParts['host']);

        if (array_key_exists('port', $uriParts)) {
            // Remove port if it matches the default for scheme
            $port = $uriParts['port'];
            if (!empty($port) && $port != 80 && $port != 443) {
                $normalizedUrl .= ':' . $port;
            }
        }

        $path = '';
        if (array_key_exists('path', $uriParts)) {
            $path = $uriParts['path'];
        }
        if (empty($path)) {
            $path = '/';
        }
        return $normalizedUrl . $path;
    }

    /**
     * Generate a valid signature base string as per https://tools.ietf.org/html/rfc5849#section-3.4.1.
     * @return string
     */
    private static function getSignatureBaseString($baseUri, $httpMethod, $oauthParamString) {
        return strtoupper($httpMethod)                   // Uppercase HTTP method
              . '&' . rawurlencode($baseUri)            // Base URI
              . '&' . rawurlencode($oauthParamString);  // OAuth parameter string
    }

    /**
     * Signs the signature base string using an RSA private key. The methodology is described at
     * https://tools.ietf.org/html/rfc5849#section-3.4.3 but Mastercard uses the stronger SHA-256 algorithm
     * as a replacement for the described SHA1 which is no longer considered secure.
     * @return string
     */
    private static function signSignatureBaseString($baseString, $privateKey) {
        openssl_sign($baseString, $signature, $privateKey, "SHA256");
        return base64_encode($signature);
    }

    /**
     * Generates a random string for replay protection as per https://tools.ietf.org/html/rfc5849#section-3.3.
     * @return string
     */
    private static function getNonce($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Returns UNIX Timestamp as required per https://tools.ietf.org/html/rfc5849#section-3.3.
     * @return int
     */
    private static function getTimestamp() {
        return time();
    }
}