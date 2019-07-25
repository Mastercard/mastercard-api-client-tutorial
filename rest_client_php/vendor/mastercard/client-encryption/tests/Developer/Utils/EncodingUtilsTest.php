<?php
namespace Mastercard\Developer\Utils;

use phpseclib\Crypt\Hash;
use PHPUnit\Framework\TestCase;

class EncodingUtilsTest extends TestCase {

    public function testHexEncode() {
        $this->assertEquals('00', EncodingUtils::hexEncode("\0"));
        $this->assertEquals('736f6d652064617461', EncodingUtils::hexEncode('some data'));
        $this->assertEquals('', EncodingUtils::hexEncode(''));
    }

    public function testHexEncode_ShouldThrowInvalidArgumentException_WhenNullValue() {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Can\'t hex encode an empty value!');
        EncodingUtils::hexEncode(null);
    }

    public function testHexEncode_ShouldKeepLeadingZeros() {
        $hex = EncodingUtils::hexEncode((new Hash('sha256'))->hash('WIDDIES'));
        $this->assertEquals('000000c71f1bda5b63f5165243e10394bc9ebf62e394ef7c6e049c920ea1b181', $hex);
    }

    public function testHexDecode() {
        $this->assertEquals("\0", EncodingUtils::hexDecode('00'));
        $this->assertEquals('some data', EncodingUtils::hexDecode('736f6d652064617461'));
        $this->assertEquals('some data', EncodingUtils::hexDecode('736F6D652064617461'));
        $this->assertEquals('', EncodingUtils::hexDecode(''));
    }

    public function testHexDecode_ShouldThrowInvalidArgumentException_WhenNotAnHexValue() {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The provided value is not an hex string!');
        EncodingUtils::hexDecode('not an hex string!');
    }

    public function testHexDecode_ShouldThrowInvalidArgumentException_WhenNullValue() {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Can\'t hex decode an empty value!');
        EncodingUtils::hexDecode(null);
    }
}