<?php
/**
 * TokenizeApiTest
 * PHP version 5
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

namespace DigitalEnablementClient\Client;

use DigitalEnablementClient\Api\TokenizeApi;
use DigitalEnablementClient\ApiException;
use Mastercard\Developer\Encryption\FieldLevelEncryptionConfigBuilder;
use Mastercard\Developer\Encryption\FieldValueEncoding;
use Mastercard\Developer\Interceptors\PsrHttpMessageEncryptionInterceptor;
use Mastercard\Developer\OAuth\Utils\AuthenticationUtils;
use Mastercard\Developer\Utils\EncryptionUtils;
use PHPUnit\Framework\TestCase;
use Mastercard\Developer\Signers\PsrHttpMessageSigner;
use DigitalEnablementClient\Configuration;
use DigitalEnablementClient\Model\FundingAccountInfoEncryptedPayload;
use DigitalEnablementClient\Model\TokenizeRequestSchema;
use DigitalEnablementClient\Model\BillingAddress;
use DigitalEnablementClient\Model\AccountHolderData;
use DigitalEnablementClient\Model\CardAccountDataInbound;
use DigitalEnablementClient\Model\FundingAccountData;
use DigitalEnablementClient\Model\FundingAccountInfo;
use GuzzleHttp;

/**
 * TokenizeApiTest Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class TokenizeApiTest extends TestCase
{
    private $client;
    private $config;

    //
    // TODO: add your credentials here or those dummy values will cause an INVALID_CLIENT_ID error to be returned.
    //
    const ConsumerKey = "000000000000000000000000000000000000000000000000!000000000000000000000000000000000000000000000000";
    const SigningKeyAlias = "fake-key";
    const SigningKeyPassword = "fakepassword";
    const SigningKeyPkcs12FilePath = "./resources/fake-signing-key.p12";

    // Encryption keys from https://developer.mastercard.com/page/digital-enablement-api-sandbox-configuration
    const EncryptionCertificateFilePath = "./resources/digital-enablement-sandbox-encryption-key.crt";
    const DecryptionKeyFilePath = "./resources/digital-enablement-sandbox-decryption-key.key";

    private static function getFieldLevelEncryptionConfig() {
        $encryptionCertificate = EncryptionUtils::LoadEncryptionCertificate(self::EncryptionCertificateFilePath);
        $decryptionKey =  EncryptionUtils::LoadDecryptionKey(self::DecryptionKeyFilePath);

        return FieldLevelEncryptionConfigBuilder::aFieldLevelEncryptionConfig()
            ->withEncryptionPath('$.fundingAccountInfo.encryptedPayload.encryptedData', '$.fundingAccountInfo.encryptedPayload')
            ->withEncryptionPath('$.encryptedPayload.encryptedData', '$.encryptedPayload')
            ->withDecryptionPath('$.tokenDetail', '$.tokenDetail.encryptedData')
            ->withDecryptionPath('$.encryptedPayload', '$.encryptedPayload.encryptedData')
            ->withEncryptionCertificate($encryptionCertificate)
            ->withDecryptionKey($decryptionKey)
            ->withOaepPaddingDigestAlgorithm('SHA-512')
            ->withEncryptedValueFieldName('encryptedData')
            ->withEncryptedKeyFieldName('encryptedKey')
            ->withIvFieldName('iv')
            ->withOaepPaddingDigestAlgorithmFieldName('oaepHashingAlgorithm')
            ->withEncryptionCertificateFingerprintFieldName('publicKeyFingerprint')
            ->withFieldValueEncoding(FieldValueEncoding::HEX)
            ->build();
    }
    
    private function createClientOptions() {
        $signingKey = AuthenticationUtils::loadSigningKey(self::SigningKeyPkcs12FilePath, self::SigningKeyAlias, self::SigningKeyPassword);
        $stack = new GuzzleHttp\HandlerStack();
        $stack->setHandler(new GuzzleHttp\Handler\CurlHandler());
        $fieldLevelEncryptionInterceptor = new PsrHttpMessageEncryptionInterceptor(self::getFieldLevelEncryptionConfig());
        $stack->push(GuzzleHttp\Middleware::mapRequest([$fieldLevelEncryptionInterceptor, 'interceptRequest']));
        $stack->push(GuzzleHttp\Middleware::mapResponse([$fieldLevelEncryptionInterceptor, 'interceptResponse']));
        $stack->push(GuzzleHttp\Middleware::mapRequest([new PsrHttpMessageSigner(self::ConsumerKey, $signingKey), 'sign']));
        $options = [
            'verify' => false, // Do not verify the server certificate (to be removed)
            'handler' => $stack
        ];
        return $options;
    }

    private function createClient() {
        $this->client = new GuzzleHttp\Client($this->createClientOptions());
    }

    private function createConfig() {
        $this->config = new Configuration();
        $this->config->setDebug(true);
        $this->config->setDebugFile("./out.trace");
        $this->config->setHost("https://sandbox.api.mastercard.com/mdes");
    }

    /**
     * Setup before running each test case
     */
    public function setUp() {
        ini_set('xdebug.var_display_max_depth', '10');
        ini_set('xdebug.var_display_max_children', '256');
        ini_set('xdebug.var_display_max_data', '1024');
        self::createClient();
        self::createConfig();
    }

    /**
     * Test case for createTokenize
     *
     * Used to digitize a card to create a server-based Token..
     *
     */
    public function testCreateTokenize()
    {
        try {
            $tokenizeApi = new TokenizeApi($this->client, $this->config);
            $response = $tokenizeApi->createTokenize(self::buildTokenizeRequestSchema());
            var_dump($response);
            $this->assertNotEmpty($response);
            $this->assertEquals('APPROVED', $response->getDecision());
            $this->assertEquals('500181d9f8e0629211e3949a08002', $response->getTokenDetail()->getEncryptedData()->getPaymentAccountReference());
        } catch(ApiException $e) {
            $this->fail($e->getResponseBody());
        }
    }

    static function buildTokenizeRequestSchema(){
        $data = [
            'request_id' => '123456',
            'response_host' => 'site1.your-server.com',
            'task_id' => '123456',
            'token_type' => 'CLOUD',
            'funding_account_info' => self::buildFundingAccountInfo(),
            'consumer_language' => 'en',
            'tokenization_authentication_value' => 'RHVtbXkgYmFzZSA2NCBkYXRhIC0gdGhpcyBpcyBub3QgYSByZWFsIFRBViBleGFtcGxl',
            'token_requestor_id' => '98765432101'
        ];
        return new TokenizeRequestSchema($data);
    }

    static function buildFundingAccountInfo(){
        $data = [
            'encrypted_payload' => self::buildFundingAccountInfoEncryptedPayload()
        ];
        return new FundingAccountInfo($data);
    }

    static function buildFundingAccountInfoEncryptedPayload(){
        $data = [
            'encrypted_data' => self::buildFundingAccountData()
        ];
        return new FundingAccountInfoEncryptedPayload($data);
    }

    static function buildFundingAccountData(){
        $data = [
            'account_holder_data' => self::buildAccountHolderData(),
            'source' => 'ACCOUNT_ON_FILE',
            'card_account_data' => self::buildCardAccountDataInbound()
        ];
        return new FundingAccountData($data);
    }

    static function buildAccountHolderData(){
        $data = [
            'account_holder_address' => self::buildBillingAddress(),
            'account_holder_name' => 'John Doe'
        ];
        return new AccountHolderData($data);
    }

    static function buildCardAccountDataInbound(){
        $data = [
            'account_number' => '5123456789012345',
            'security_code' => '123',
            'expiry_year' => '21',
            'expiry_month' => '09'
        ];
        return new CardAccountDataInbound($data);
    }

    static function buildBillingAddress(){
        $data = [
            'line1' => '100 1st Street',
            'line2' => 'Apt. 4B',
            'city' => 'St. Louis',
            'country_subdivision' => 'MO',
            'postal_code' => '61000',
            'country' => 'USA'
        ];
        return new BillingAddress($data);
    }
}
