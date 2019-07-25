<?php
namespace Mastercard\Developer\OAuth\Utils;

use PHPUnit\Framework\TestCase;

/**
 * @deprecated
 */
class SecurityUtilsTest extends TestCase {

    public function testLoadPrivateKey_ShouldReturnKey() {

        // GIVEN
        $keyContainerPath = './resources/test_key_container.p12';
        $keyAlias = 'mykeyalias';
        $keyPassword = 'Password1';

        // WHEN
        $privateKey = SecurityUtils::loadPrivateKey($keyContainerPath, $keyAlias, $keyPassword);

        // THEN
        $this->assertNotEmpty($privateKey);
    }
}
