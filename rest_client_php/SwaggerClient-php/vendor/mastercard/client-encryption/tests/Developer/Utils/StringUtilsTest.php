<?php
namespace Mastercard\Developer\Utils;

use PHPUnit\Framework\TestCase;

class StringUtilsTest extends TestCase {

    public function testContains() {
        $this->assertTrue(StringUtils::contains('Hello', ''));
        $this->assertTrue(StringUtils::contains('Hello', 'el'));
        $this->assertFalse(StringUtils::contains('Hello', 'le'));
        $this->assertFalse(StringUtils::contains('Hello', '-Hello-'));
    }

    public function testStartWith() {
        $this->assertTrue(StringUtils::startsWith('Hello', ''));
        $this->assertTrue(StringUtils::startsWith('Hello', 'He'));
        $this->assertFalse(StringUtils::startsWith('Hello', 'le'));
        $this->assertFalse(StringUtils::startsWith('Hello', '-Hello-'));
    }

    public function testEndWith() {
        $this->assertTrue(StringUtils::endsWith('Hello', ''));
        $this->assertTrue(StringUtils::endsWith('Hello', 'lo'));
        $this->assertFalse(StringUtils::endsWith('Hello', 'le'));
        $this->assertFalse(StringUtils::endsWith('Hello', '-Hello-'));
    }
}