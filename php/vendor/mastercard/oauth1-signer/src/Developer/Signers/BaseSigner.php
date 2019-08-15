<?php

namespace Mastercard\Developer\Signers;

abstract class BaseSigner {

    protected $consumerKey;
    protected $signingKey;

    public function __construct($consumerKey, $signingKey) {
        $this->consumerKey = $consumerKey;
        $this->signingKey = $signingKey;
    }
}