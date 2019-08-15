<?php

namespace Mastercard\Developer\Signers;

use Psr\Http\Message\RequestInterface;
use Mastercard\Developer\OAuth\OAuth;

/**
 * Utility class for signing RequestInterface objects (see: https://www.php-fig.org/psr/psr-7/)
 */
class PsrHttpMessageSigner extends BaseSigner {

    public function sign(RequestInterface &$request) {
        $uri = $request->getUri()->__toString();
        $method = $request->getMethod();
        $body = $request->getBody()->__toString();
        $authHeader = OAuth::getAuthorizationHeader($uri, $method, $body , $this->consumerKey, $this->signingKey);
        $request = $request->withHeader(OAuth::AUTHORIZATION_HEADER_NAME, $authHeader); //NOSONAR
        return $request;
    }
}