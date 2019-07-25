<?php
namespace Mastercard\Developer\Utils;

use Mastercard\Developer\Encryption\EncryptionException;
use PHPUnit\Framework\TestCase;

class EncryptionExceptionTest extends TestCase {

    public function testConstructor() {

        $this->expectException(EncryptionException::class);
        $this->expectExceptionMessage('Something happened!');
        $this->expectExceptionCode(0);

        throw new EncryptionException('Something happened!', new \InvalidArgumentException());
    }
}