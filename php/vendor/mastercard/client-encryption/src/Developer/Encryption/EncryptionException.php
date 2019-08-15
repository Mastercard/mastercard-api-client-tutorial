<?php

namespace Mastercard\Developer\Encryption;

use Exception;

class EncryptionException extends Exception {

    public function __construct($message = "", Exception $previous = null) {
        parent::__construct($message, 0, $previous);
    }
}