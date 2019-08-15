<?php

namespace Mastercard\Developer\Encryption;

use Mastercard\Developer\Test\TestUtils;
use Mastercard\Developer\Utils\EncryptionUtils;
use PHPUnit\Framework\TestCase;

class FieldLevelEncryptionTest extends TestCase {

    private static function callEncryptBytes($params) {
        return TestUtils::callPrivateStatic('\FieldLevelEncryption', 'encryptBytes', $params);
    }

    private static function callDecryptBytes($params) {
        return TestUtils::callPrivateStatic('\FieldLevelEncryption', 'decryptBytes', $params);
    }

    private function assertDecryptedPayloadEquals($expectedPayload, $encryptedPayload, $config) {
        $payloadString = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);
        $this->assertJsonStringEqualsJsonString($expectedPayload, $payloadString);
    }

    public function testEncryptBytes_InteroperabilityTest() {

        // GIVEN
        $ivValue = 'VNm/scgd1jhWF0z4+Qh6MA==';
        $keyValue = 'mZzmzoURXI3Vk0vdsPkcFw==';
        $dataValue = 'some data ù€@';

        // WHEN
        $encryptedBytes = self::callEncryptBytes(array(base64_decode($keyValue), base64_decode($ivValue), $dataValue));

        // THEN
        $expectedEncryptedBytes = base64_decode('Y6X9YneTS4VuPETceBmvclrDoCqYyBgZgJUdnlZ8/0g=');
        $this->assertEquals($expectedEncryptedBytes, $encryptedBytes);
    }

    public function testDecryptBytes_InteroperabilityTest() {

        // GIVEN
        $ivValue = 'VNm/scgd1jhWF0z4+Qh6MA==';
        $keyValue = 'mZzmzoURXI3Vk0vdsPkcFw==';
        $encryptedDataValue = 'Y6X9YneTS4VuPETceBmvclrDoCqYyBgZgJUdnlZ8/0g=';

        // WHEN
        $decryptedBytes = self::callDecryptBytes(array(base64_decode($keyValue), base64_decode($ivValue), base64_decode($encryptedDataValue)));

        // THEN
        $expectedBytes = 'some data ù€@';
        $this->assertEquals($expectedBytes, $decryptedBytes);
    }

    public function testEncryptPayload_Nominal() {

        // GIVEN
        $payload = '{
            "data": {
                "field1": "value1",
                "field2": "value2"
            },
            "encryptedData": {}
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'encryptedData')
            ->withDecryptionPath('encryptedData', 'data')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data'));
        $encryptedData = $encryptedPayloadObject->encryptedData;
        $this->assertNotEmpty($encryptedData);
        $this->assertEquals(6, count((array)$encryptedData));
        $this->assertEquals('SHA256', $encryptedData->oaepHashingAlgorithm);
        $this->assertEquals('761b003c1eade3a5490e5000d37887baa5e6ec0e226c07706e599451fc032a79', $encryptedData->encryptionKeyFingerprint);
        $this->assertEquals('80810fc13a8319fcf0e2ec322c82a4c304b782cc3ce671176343cfe8160c2279', $encryptedData->encryptionCertificateFingerprint);
        $this->assertNotEmpty($encryptedData->encryptedValue);
        $this->assertNotEmpty($encryptedData->encryptedKey);
        $this->assertNotEmpty($encryptedData->iv);
        self::assertDecryptedPayloadEquals('{"data":{"field1":"value1","field2":"value2"}}', $encryptedPayload, $config);
    }

    public function testEncryptPayload_ShouldSupportBase64FieldValueEncoding() {

        // GIVEN
        $payload = '{
            "data": {},
            "encryptedData": {}
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'encryptedData')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->withFieldValueEncoding(FieldValueEncoding::BASE64)
            ->withEncryptionCertificateFingerprint(null)
            ->withEncryptionKeyFingerprint(null)
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data'));
        $encryptedData = $encryptedPayloadObject->encryptedData;
        $this->assertNotEmpty($encryptedData);
        $this->assertEquals('SHA256', $encryptedData->oaepHashingAlgorithm);
        $this->assertEquals('761b003c1eade3a5490e5000d37887baa5e6ec0e226c07706e599451fc032a79', $encryptedData->encryptionKeyFingerprint);
        $this->assertEquals('80810fc13a8319fcf0e2ec322c82a4c304b782cc3ce671176343cfe8160c2279', $encryptedData->encryptionCertificateFingerprint);
        $this->assertEquals(16, strlen(base64_decode($encryptedData->encryptedValue)));
        $this->assertEquals(256, strlen(base64_decode($encryptedData->encryptedKey)));
        $this->assertEquals(16, strlen(base64_decode($encryptedData->iv)));
    }

    public function testEncryptPayload_ShouldEncryptPrimitiveTypes_String() {

        // GIVEN
        $payload = '{
            "data": "string",
            "encryptedData": {}
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'encryptedData')
            ->withDecryptionPath('encryptedData', 'data')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data'));
        $this->assertNotEmpty($encryptedPayloadObject->encryptedData);
        self::assertDecryptedPayloadEquals('{"data": "string"}', $encryptedPayload, $config);
    }

    public function testEncryptPayload_ShouldEncryptPrimitiveTypes_Integer() {

        // GIVEN
        $payload = '{
            "data": 1984,
            "encryptedData": {}
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'encryptedData')
            ->withDecryptionPath('encryptedData', 'data')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data'));
        $this->assertNotEmpty($encryptedPayloadObject->encryptedData);
        self::assertDecryptedPayloadEquals('{"data": 1984}', $encryptedPayload, $config);
    }

    public function testEncryptPayload_ShouldEncryptPrimitiveTypes_Boolean() {

        // GIVEN
        $payload = '{
            "data": false,
            "encryptedData": {}
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'encryptedData')
            ->withDecryptionPath('encryptedData', 'data')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data'));
        $this->assertNotEmpty($encryptedPayloadObject->encryptedData);
        self::assertDecryptedPayloadEquals('{"data": false}', $encryptedPayload, $config);
    }

    public function testEncryptPayload_ShouldEncryptArrays() {

        // GIVEN
        $payload = '{
            "items": [
                {},
                {}
            ]
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('items', 'encryptedItems')
            ->withDecryptionPath('encryptedItems', 'items')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $this->assertFalse(property_exists($encryptedPayloadObject, 'items'));
        $this->assertNotEmpty($encryptedPayloadObject->encryptedItems);
        self::assertDecryptedPayloadEquals('{"items": [{},{}]}', $encryptedPayload, $config);
    }

    public function testEncryptPayload_ShouldDoNothing_WhenInPathDoesNotExistInPayload() {

        // GIVEN
        $payload = '{
            "data": {},
            "encryptedData": {}
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('objectNotInPayload', 'encryptedData')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $this->assertJsonStringEqualsJsonString('{"data":{},"encryptedData":{}}', $encryptedPayload);
    }

    public function testEncryptPayload_ShouldCreateEncryptionFields_WhenOutPathParentExistsInPayload() {

        // GIVEN
        $payload = '{
            "data": {},
            "encryptedDataParent": {}
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'encryptedDataParent.encryptedData')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data'));
        $this->assertNotEmpty($encryptedPayloadObject->encryptedDataParent->encryptedData);
    }

    public function testEncryptPayload_ShouldThrowInvalidArgumentException_WhenOutPathParentDoesNotExistInPayload() {

        // GIVEN
        $payload = '{"data": {}}';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'parentNotInPayload.encryptedData')
            ->build();

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Parent path not found in payload: \'$[\'parentNotInPayload\']\'!');

        // WHEN
        FieldLevelEncryption::encryptPayload($payload, $config);
    }

    public function testEncryptPayload_ShouldThrowInvalidArgumentException_WhenOutPathIsPathToJsonPrimitive() {

        // GIVEN
        $payload = '{
            "data": {},
            "encryptedData": "string"
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'encryptedData')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->build();

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('JSON object expected at path: \'encryptedData\'!');

        // WHEN
        FieldLevelEncryption::encryptPayload($payload, $config);
    }

    public function testEncryptPayload_ShouldNotSetCertificateAndKeyFingerprints_WhenFieldNamesNotSetInConfig() {

        // GIVEN
        $payload = '{"data": {}, "encryptedData": {}}';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'encryptedData')
            ->withEncryptionCertificateFingerprintFieldName(null)
            ->withEncryptionKeyFingerprintFieldName(null)
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $encryptedData = $encryptedPayloadObject->encryptedData;
        $this->assertFalse(property_exists($encryptedData, 'encryptionKeyFingerprint'));
        $this->assertFalse(property_exists($encryptedData, 'encryptionCertificateFingerprint'));
    }

    public function testEncryptPayload_ShouldSupportMultipleEncryptions() {

        // GIVEN
        $payload = '{"data1": {}, "data2": {}, "encryptedData1": {}, "encryptedData2": {}}';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data1', 'encryptedData1')
            ->withEncryptionPath('data2', 'encryptedData2')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data1'));
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data2'));
        $encryptedData1 = $encryptedPayloadObject->encryptedData1;
        $this->assertNotEmpty($encryptedData1->encryptedValue);
        $encryptedData2 = $encryptedPayloadObject->encryptedData2;
        $this->assertNotEmpty($encryptedData2->encryptedValue);
        // The 2 should use a different set of params (IV and symmetric key)
        $iv1 = $encryptedData1->iv;
        $iv2 = $encryptedData2->iv;
        $this->assertNotEquals($iv1, $iv2);
    }

    public function testEncryptPayload_ShouldSupportBasicExistingJsonPaths() {

        // GIVEN
        $payload = '{
            "data1": {},
            "encryptedData1": {},
            "data2": {},
            "encryptedData2": {},
            "data3": {},
            "encryptedData3": {},
            "data4": {
                "object": {}
            },
            "encryptedData4": {
                "object": {}
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('$.data1', '$.encryptedData1')
            ->withEncryptionPath('data2', 'encryptedData2')
            ->withEncryptionPath('$[\'data3\']', '$[\'encryptedData3\']')
            ->withEncryptionPath('$[\'data4\'][\'object\']', '$[\'encryptedData4\'][\'object\']')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data1'));
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data2'));
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data3'));
        $this->assertFalse(property_exists($encryptedPayloadObject->data4, 'object'));
        $this->assertNotEmpty($encryptedPayloadObject->encryptedData1->encryptedValue);
        $this->assertNotEmpty($encryptedPayloadObject->encryptedData2->encryptedValue);
        $this->assertNotEmpty($encryptedPayloadObject->encryptedData3->encryptedValue);
        $this->assertNotEmpty($encryptedPayloadObject->encryptedData4->object->encryptedValue);
    }

    public function testEncryptPayload_ShouldSupportBasicNotExistingJsonPaths() {

        // GIVEN
        $payload = '{
            "data1": {},
            "data2": {},
            "data3": {},
            "data4": {
                "object": {}
            },
            "encryptedData4": {}
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('$.data1', '$.encryptedData1')
            ->withEncryptionPath('data2', 'encryptedData2')
            ->withEncryptionPath('$[\'data3\']', '$[\'encryptedData3\']')
            ->withEncryptionPath('$[\'data4\'][\'object\']', '$[\'encryptedData4\'][\'object\']')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data1'));
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data2'));
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data3'));
        $this->assertFalse(property_exists($encryptedPayloadObject->data4, 'object'));
        $this->assertNotEmpty($encryptedPayloadObject->encryptedData1->encryptedValue);
        $this->assertNotEmpty($encryptedPayloadObject->encryptedData2->encryptedValue);
        $this->assertNotEmpty($encryptedPayloadObject->encryptedData3->encryptedValue);
        $this->assertNotEmpty($encryptedPayloadObject->encryptedData4->object->encryptedValue);
    }

    public function testEncryptPayload_ShouldMergeJsonObjects_WhenOutPathAlreadyContainData() {

        // GIVEN
        $payload = '{
            "data": {},
            "encryptedData": {
                "field1": "field1Value",
                "iv": "previousIvValue"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'encryptedData')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $encryptedData = $encryptedPayloadObject->encryptedData;
        $this->assertNotEmpty($encryptedData);
        $this->assertEquals('field1Value', $encryptedData->field1);
        $this->assertNotEquals('previousIvValue', $encryptedData->iv);
    }

    public function testEncryptPayload_ShouldOverwriteInputObject_WhenOutPathSameAsInPath() {

        // GIVEN
        $payload = '{
            "data": {
                "encryptedData": {}
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data.encryptedData', 'data')
            ->withEncryptedValueFieldName('encryptedData')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $dataObject = $encryptedPayloadObject->data;
        $this->assertNotEmpty($dataObject->iv);
        $this->assertNotEmpty($dataObject->encryptedKey);
        $this->assertNotEmpty($dataObject->encryptionCertificateFingerprint);
        $this->assertNotEmpty($dataObject->encryptionKeyFingerprint);
        $this->assertNotEmpty($dataObject->oaepHashingAlgorithm);
        $this->assertNotEmpty($dataObject->encryptedData);
    }

    public function testEncryptPayload_ShouldNotAddOaepPaddingDigestAlgorithm_WhenOaepPaddingDigestAlgorithmFieldNameNotSet() {

        // GIVEN
        $payload = '{"data": {}, "encryptedData": {}}';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'encryptedData')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->withOaepPaddingDigestAlgorithmFieldName(null)
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $encryptedData = $encryptedPayloadObject->encryptedData;
        $this->assertNotEmpty($encryptedData);
        $this->assertEquals(5, count((array)$encryptedData));
    }

    public function testEncryptPayload_ShouldSupportRootAsInputPath() {

        // GIVEN
        $payload = '{
            "field1": "value1",
            "field2": "value2"
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('$', 'encryptedData')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $this->assertFalse(property_exists($encryptedPayloadObject, 'field1'));
        $this->assertFalse(property_exists($encryptedPayloadObject, 'field2'));
        $encryptedData = $encryptedPayloadObject->encryptedData;
        $this->assertNotEmpty($encryptedData);
        $this->assertEquals(6, count((array)$encryptedData));
    }

    public function testEncryptPayload_ShouldSupportRootAsInputPathAndOutputPath() {

        // GIVEN
        $payload = '{
            "field1": "value1",
            "field2": "value2"
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('$', '$')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $this->assertFalse(property_exists($encryptedPayloadObject, 'field1'));
        $this->assertFalse(property_exists($encryptedPayloadObject, 'field2'));
        $this->assertEquals(6, count((array)$encryptedPayloadObject));
    }

    public function testEncryptPayload_ShouldThrowEncryptionException_WhenEncryptionErrorOccurs() {

        // GIVEN
        $payload = '{"data": {}, "encryptedData": {}}';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'encryptedData')
            ->withEncryptionCertificate(TestUtils::getTestInvalidEncryptionCertificate()) // Invalid certificate
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->build();

        // THEN
        $this->expectException(EncryptionException::class);
        $this->expectExceptionMessage('Failed to wrap secret key!');

        // WHEN
        FieldLevelEncryption::encryptPayload($payload, $config);
    }

    public function testEncryptPayload_ShouldUseProvidedEncryptionParams_WhenPassedAsArgument() {

        // GIVEN
        $payload = '{"data": {}, "encryptedData": {}}';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'encryptedData')
            ->build();
        $params = FieldLevelEncryptionParams::generate($config);

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config, $params);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $encryptedData = $encryptedPayloadObject->encryptedData;
        $this->assertEquals($params->getIvValue(), $encryptedData->iv);
        $this->assertEquals($params->getEncryptedKeyValue(), $encryptedData->encryptedKey);
        $this->assertEquals($params->getOaepPaddingDigestAlgorithmValue(), $encryptedData->oaepHashingAlgorithm);
    }

    public function testEncryptPayload_ShouldGenerateEncryptionParams_WhenNullArgument() {

        // GIVEN
        $payload = '{
            "data": {
                "field1": "value1",
                "field2": "value2"
            },
            "encryptedData": {}
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'encryptedData')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config, null);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data'));
        $encryptedData = $encryptedPayloadObject->encryptedData;
        $this->assertNotEmpty($encryptedData);
        $this->assertEquals(6, count((array)$encryptedData));
    }

    public function testEncryptPayload_ShouldNotAddEncryptionParamsToPayload_WhenFieldNamesNotSetInConfig() {

        // GIVEN
        $payload = '{
            "data": {
                "field1": "value1",
                "field2": "value2"
            },
            "encryptedData": {}
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withEncryptionPath('data', 'encryptedData')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->withOaepPaddingDigestAlgorithmFieldName(null)
            ->withEncryptedKeyFieldName(null)
            ->withEncryptedKeyHeaderName('x-encrypted-key')
            ->withEncryptionKeyFingerprintFieldName(null)
            ->withEncryptionCertificateFingerprintFieldName(null)
            ->withIvFieldName(null)
            ->withIvHeaderName('x-iv')
            ->build();

        // WHEN
        $encryptedPayload = FieldLevelEncryption::encryptPayload($payload, $config);

        // THEN
        $encryptedPayloadObject = json_decode($encryptedPayload);
        $this->assertFalse(property_exists($encryptedPayloadObject, 'data'));
        $encryptedData = $encryptedPayloadObject->encryptedData;
        $this->assertNotEmpty($encryptedData);
        $this->assertEquals(1, count((array)$encryptedData)); // 'encryptedValue' only
    }

    public function testDecryptPayload_Nominal() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "ba574b07248f63756bce778f8a115819",
                "encryptedKey": "26687f6d03d27145451d20bdaa29cc199e2533bb9eb7351772e31d1290b98380b43dbf47b9a337cc2ecaff9d3d9fb45305950f13382c5ad822ee6df79e1a57b14a3c58c71090121994a9f771ef96472669671718b55a0fa8d9f76de9e172fedcabbc87d64b5a994899e43abb19afa840269012c397b5b18d4babc0e41c1ad698db98c89121bbe5b2d227cfc5d3c3c87f4f4c8b04b509d326199b39adfbd8bca8bf0a150fcf3c37b9717382af502ad8d4d28b17b91762bf108d34aba0fb40ca410c2ecaeb30d68003af20dce27d9d034e4c557b8104e85f859de0eb709b23f9978869bae545c7f1b62173887eae9e75e4b6d6b4b01d7172ccc8c5774c0db51c24",
                "encryptedValue": "2867e67545b2f3d0708500a1cea649e3",
                "encryptionCertificateFingerprint": "80810fc13a8319fcf0e2ec322c82a4c304b782cc3ce671176343cfe8160c2279",
                "encryptionKeyFingerprint": "761b003c1eade3a5490e5000d37887baa5e6ec0e226c07706e599451fc032a79",
                "oaepHashingAlgorithm": "SHA256"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $this->assertJsonStringEqualsJsonString('{"data": {}}', $payload);
    }

    public function testDecryptPayload_ShouldDecryptPrimitiveTypes_String() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "a32059c51607d0d02e823faecda5fb15",
                "encryptedKey": "a31cfe7a7981b72428c013270619554c1d645c04b9d51c7eaf996f55749ef62fd7c7f8d334f95913be41ae38c46d192670fd1acb84ebb85a00cd997f1a9a3f782229c7bf5f0fdf49fe404452d7ed4fd41fbb95b787d25893fbf3d2c75673cecc8799bbe3dd7eb4fe6d3f744b377572cdf8aba1617194e10475b6cd6a8dd4fb8264f8f51534d8f7ac7c10b4ce9c44d15066724b03a0ab0edd512f9e6521fdb5841cd6964e457d6b4a0e45ba4aac4e77d6bbe383d6147e751fa88bc26278bb9690f9ee84b17123b887be2dcef0873f4f9f2c895d90e23456fafb01b99885e31f01a3188f0ad47edf22999cc1d0ddaf49e1407375117b5d66f1f185f2b57078d255",
                "encryptedValue": "21d754bdb4567d35d58720c9f8364075",
                "oaepHashingAlgorithm": "SHA256"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $this->assertJsonStringEqualsJsonString('{"data": "string"}', $payload);
    }

    public function testDecryptPayload_ShouldDecryptPrimitiveTypes_Integer() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "5bb681fb4ca4a8f85a9c80b8f234e87c",
                "encryptedKey": "d6819275d3a692bddce0baa10187769e0d683c351fb4e1857ab30f2572fbe1db95c34583d20ea5b224a638e99d26f6935104500b49fc1e855b7af30f34ac1d148090c6393e77e0f16d710614d00817ac862f9af730e9b3596d2c0dacf1349abd18717792ac3040f4ef1cc2e8fd9e0d685a192bfc6800e79022393eb3ce326757ba556107be28c02590390fad73117f7da3d96c05f54aaa36541b05680f23a222f1b7bbe54f1b070515dfbea8e5312708d5c27bfe9d9350e7bb72914351a6db1d83cdefee7d7514d04b73b6e285f334b27c674ad50ec830494ebc2901f1fe1738863b2d7940c98a15e1467d501545bffa724fd97b2d673e92629c9be79ca7381f",
                "encryptedValue": "072b6ef69afd42d43b89afdf8f8bb172",
                "oaepHashingAlgorithm": "SHA256"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $this->assertJsonStringEqualsJsonString('{"data": 1984}', $payload);
    }

    public function testDecryptPayload_ShouldDecryptPrimitiveTypes_Boolean() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "683c1559d6b9366f21efc4dec682cca2",
                "encryptedKey": "631f0729018db2aa4f02823eeac6c1bf4bc766897dfd8159ec831086acb68cf37d91427347db77869fe1088e4cd8553b5bb0308accb43e92a3977245e0005385fc538aacea323cb62d44d21c932b7fbb3fc2039de44d18fff130108b30bd5c9925a3463ace729099ce63375dfa1dd9ec9f1e277de6b4ace5161a0e47ae81908aa2f8b44a654be2b863d6dfc5112a422dda065d8fbc0d5e47ea435409262c608edfc28a49e90fbda035c1743ec8cabd453d75775b0ab7b660b20b3a1f37c6eecffa32a26b07adf78432e1dd479a2ce19002846cb2fa2488ade423265ce7c4b003373837971c7b803925624f8eeb9254dad347941ebab8f641522b5b1efe53f572",
                "encryptedValue": "cc8bb0cc778d508f198c39364cce9137",
                "oaepHashingAlgorithm": "SHA256"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $this->assertJsonStringEqualsJsonString('{"data": false}', $payload);
    }

    public function testDecryptPayload_ShouldDecryptArrays() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedItems": {
                "iv": "34010a3ea7231126a0d1e088ec8db173",
                "encryptedKey": "072aee9f7dd6cf381eb61e6d93c2e19e4032e1166d36d3ccb32ec379815f472e27d82a0de48617ff440d37a534bb38b170cf236a78148a375971e83b087eb7d05807863e70b43baa446934fe6f70150e3ca4e49e70fecabb1969c1fc5a38f13a75e318077760e4fe53e25ca011781d1038d19bb3a16928d35302bc7e389c8fb089230b8c0acc3c7e59c120cfe3aece6ff346aaa598a2baf003026f0a32307af022b9515fea564bb5d491b0159b20d909deb9cb5e8077d6471ad1ad3d7e743d6c3cf09f999c22006038980268b9d0cac1fd2e53b1a6e8e4d63b0a3e4457ff27ffab7cd025011b678e0ff56537c29e81ed087fe11988c2c92a7c7695f1fc6f856a",
                "encryptedValue": "d91268566c92621d394b5e5d94069387",
                "oaepHashingAlgorithm": "SHA256"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('$.encryptedItems', '$.items')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $this->assertJsonStringEqualsJsonString('{"items":[{},{}]}', $payload);
    }

    public function testDecryptPayload_ShouldSupportBase64FieldValueDecoding() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "uldLBySPY3VrznePihFYGQ==",
                "encryptedKey": "Jmh/bQPScUVFHSC9qinMGZ4lM7uetzUXcuMdEpC5g4C0Pb9HuaM3zC7K/509n7RTBZUPEzgsWtgi7m33nhpXsUo8WMcQkBIZlKn3ce+WRyZpZxcYtVoPqNn3benhcv7cq7yH1ktamUiZ5Dq7Ga+oQCaQEsOXtbGNS6vA5Bwa1pjbmMiRIbvlstInz8XTw8h/T0yLBLUJ0yYZmzmt+9i8qL8KFQ/PPDe5cXOCr1Aq2NTSixe5F2K/EI00q6D7QMpBDC7K6zDWgAOvINzifZ0DTkxVe4EE6F+FneDrcJsj+ZeIabrlRcfxtiFziH6unnXktta0sB1xcszIxXdMDbUcJA==",
                "encryptedValue": "KGfmdUWy89BwhQChzqZJ4w==",
                "encryptionCertificateFingerprint": "gIEPwTqDGfzw4uwyLIKkwwS3gsw85nEXY0PP6BYMInk=",
                "encryptionKeyFingerprint": "dhsAPB6t46VJDlAA03iHuqXm7A4ibAdwblmUUfwDKnk=",
                "oaepHashingAlgorithm": "SHA256"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->withFieldValueEncoding(FieldValueEncoding::BASE64)
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $this->assertJsonStringEqualsJsonString('{"data": {}}', $payload);
    }

    public function testDecryptPayload_ShouldDoNothing_WhenInPathDoesNotExistInPayload() {

        // GIVEN
        $encryptedPayload = '{"data": {}}';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('objectNotInPayload', 'data')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $this->assertJsonStringEqualsJsonString('{"data": {}}', $payload);
    }

    public function testDecryptPayload_ShouldDoNothing_WhenEncryptedValueDoesNotExistInPayload() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "ba574b07248f63756bce778f8a115819",
                "encryptedKey": "26687f6d03d27145451d20bdaa29cc199e2533bb9eb7351772e31d1290b98380b43dbf47b9a337cc2ecaff9d3d9fb45305950f13382c5ad822ee6df79e1a57b14a3c58c71090121994a9f771ef96472669671718b55a0fa8d9f76de9e172fedcabbc87d64b5a994899e43abb19afa840269012c397b5b18d4babc0e41c1ad698db98c89121bbe5b2d227cfc5d3c3c87f4f4c8b04b509d326199b39adfbd8bca8bf0a150fcf3c37b9717382af502ad8d4d28b17b91762bf108d34aba0fb40ca410c2ecaeb30d68003af20dce27d9d034e4c557b8104e85f859de0eb709b23f9978869bae545c7f1b62173887eae9e75e4b6d6b4b01d7172ccc8c5774c0db51c24",
                "oaepHashingAlgorithm": "SHA256"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $payloadObject = json_decode($payload);
        $this->assertNotEmpty($payloadObject->encryptedData);
        $this->assertNotEmpty($payloadObject->encryptedData->iv);
    }

    public function testDecryptPayload_ShouldCreateDataFields_WhenOutPathParentExistsInPayload() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "ba574b07248f63756bce778f8a115819",
                "encryptedKey": "26687f6d03d27145451d20bdaa29cc199e2533bb9eb7351772e31d1290b98380b43dbf47b9a337cc2ecaff9d3d9fb45305950f13382c5ad822ee6df79e1a57b14a3c58c71090121994a9f771ef96472669671718b55a0fa8d9f76de9e172fedcabbc87d64b5a994899e43abb19afa840269012c397b5b18d4babc0e41c1ad698db98c89121bbe5b2d227cfc5d3c3c87f4f4c8b04b509d326199b39adfbd8bca8bf0a150fcf3c37b9717382af502ad8d4d28b17b91762bf108d34aba0fb40ca410c2ecaeb30d68003af20dce27d9d034e4c557b8104e85f859de0eb709b23f9978869bae545c7f1b62173887eae9e75e4b6d6b4b01d7172ccc8c5774c0db51c24",
                "encryptedValue": "2867e67545b2f3d0708500a1cea649e3",
                "oaepHashingAlgorithm": "SHA256"
            },
            "dataParent": {}
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'dataParent.data')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $payloadObject = json_decode($payload);
        $this->assertFalse(property_exists($payloadObject, 'encryptedData'));
        $this->assertEquals(json_decode('{}'), $payloadObject->dataParent->data);
    }

    public function testDecryptPayload_ShouldThrowInvalidArgumentException_WhenOutPathParentDoesNotExistInPayload() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "ba574b07248f63756bce778f8a115819",
                "encryptedKey": "26687f6d03d27145451d20bdaa29cc199e2533bb9eb7351772e31d1290b98380b43dbf47b9a337cc2ecaff9d3d9fb45305950f13382c5ad822ee6df79e1a57b14a3c58c71090121994a9f771ef96472669671718b55a0fa8d9f76de9e172fedcabbc87d64b5a994899e43abb19afa840269012c397b5b18d4babc0e41c1ad698db98c89121bbe5b2d227cfc5d3c3c87f4f4c8b04b509d326199b39adfbd8bca8bf0a150fcf3c37b9717382af502ad8d4d28b17b91762bf108d34aba0fb40ca410c2ecaeb30d68003af20dce27d9d034e4c557b8104e85f859de0eb709b23f9978869bae545c7f1b62173887eae9e75e4b6d6b4b01d7172ccc8c5774c0db51c24",
                "encryptedValue": "2867e67545b2f3d0708500a1cea649e3",
                "oaepHashingAlgorithm": "SHA256"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'parentNotInPayload.data')
            ->build();

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Parent path not found in payload: \'$[\'parentNotInPayload\']\'!');

        // WHEN
        FieldLevelEncryption::decryptPayload($encryptedPayload, $config);
    }

    public function testDecryptPayload_ShouldThrowInvalidArgumentException_WhenOutPathIsPathToJsonPrimitive() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "ba574b07248f63756bce778f8a115819",
                "encryptedKey": "26687f6d03d27145451d20bdaa29cc199e2533bb9eb7351772e31d1290b98380b43dbf47b9a337cc2ecaff9d3d9fb45305950f13382c5ad822ee6df79e1a57b14a3c58c71090121994a9f771ef96472669671718b55a0fa8d9f76de9e172fedcabbc87d64b5a994899e43abb19afa840269012c397b5b18d4babc0e41c1ad698db98c89121bbe5b2d227cfc5d3c3c87f4f4c8b04b509d326199b39adfbd8bca8bf0a150fcf3c37b9717382af502ad8d4d28b17b91762bf108d34aba0fb40ca410c2ecaeb30d68003af20dce27d9d034e4c557b8104e85f859de0eb709b23f9978869bae545c7f1b62173887eae9e75e4b6d6b4b01d7172ccc8c5774c0db51c24",
                "encryptedValue": "2867e67545b2f3d0708500a1cea649e3",
                "oaepHashingAlgorithm": "SHA256"
            },
            "data": "string"
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->build();

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('JSON object expected at path: \'data\'!');

        // WHEN
        FieldLevelEncryption::decryptPayload($encryptedPayload, $config);
    }

    public function testDecryptPayload_ShouldThrowInvalidArgumentException_WhenInPathIsPathToJsonPrimitive() {

        // GIVEN
        $encryptedPayload = '{ "encryptedData": "string" }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->build();

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('JSON object expected at path: \'encryptedData\'!');

        // WHEN
        FieldLevelEncryption::decryptPayload($encryptedPayload, $config);
    }

    public function testDecryptPayload_ShouldUseOaepDigestAlgorithmFromConfig_WhenOaepDigestAlgorithmNotReturnedInPayload() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "ba574b07248f63756bce778f8a115819",
                "encryptedKey": "26687f6d03d27145451d20bdaa29cc199e2533bb9eb7351772e31d1290b98380b43dbf47b9a337cc2ecaff9d3d9fb45305950f13382c5ad822ee6df79e1a57b14a3c58c71090121994a9f771ef96472669671718b55a0fa8d9f76de9e172fedcabbc87d64b5a994899e43abb19afa840269012c397b5b18d4babc0e41c1ad698db98c89121bbe5b2d227cfc5d3c3c87f4f4c8b04b509d326199b39adfbd8bca8bf0a150fcf3c37b9717382af502ad8d4d28b17b91762bf108d34aba0fb40ca410c2ecaeb30d68003af20dce27d9d034e4c557b8104e85f859de0eb709b23f9978869bae545c7f1b62173887eae9e75e4b6d6b4b01d7172ccc8c5774c0db51c24",
                "encryptedValue": "2867e67545b2f3d0708500a1cea649e3"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $this->assertJsonStringEqualsJsonString('{"data": {}}', $payload);
    }

    public function testDecryptPayload_ShouldSupportMultipleDecryptions() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData2": {
                "iv": "c1ffb457798714b679e5b59e5b8fb62c",
                "encryptedKey": "f16425f1550c28515bc83e25f7f63ca8102a2cbbadd6452c610f03d920563856f1a7318d98bc0939a3a6a84922caebc3691b34aa96ed4d2d016727a30d3622966dec3cb13f9da9d149106afc2b81846e624aa6134551bca169fa539df4034b48e47923cb4f2636b993c805b851cc046a7e98a70ff1c6b43207ac8dcbfbf6132a070860040093d4399af70b0d45cf44854390df9c24f2eb17aa6e745da1a2b7a765f8b4970f6764731d6a7d51af85be669e35ad433ff0942710764265253c956797cd1e3c8ba705ee8578373a14bbab368426d3797bd68076f6ec9c4ef8d43c2959f4fd4c17897a9d6d0622ffc662d5f5c304fb6d5ca84de63f7cf9b9dfe700d2",
                "encryptedValue": "a49dff0a6f9ca58bdd3e991f13eb8e53"
            },
            "encryptedData1": {
                "iv": "4c278e7b0c0890973077960f682181b6",
                "encryptedKey": "c2c4a40433e91d1175ba933ddb7eb014e9839e3bf639c6c4e2ea532373f146ee6a88515103cb7aeb9df328c67b747c231bfdf4a6b3d366792b6e9ec0f106447f28518a864cc9dd59ed6e1a9ed017229166f23389b4c141b4492981e51ad6863ed48e8c93394378a8e8ab922b8c96dfdf6c683c334eef4c668d9f059b6ac6c26a7d623032ef0bac0e3d4fde5a735d4c09879364efb723c2f2bd3288f8619f9f1a63ed1e283ae7cb40726632fe271fea08252991a158bce3aeca90a4ce7b6895f7b94516ada042de80942ddbc3462baeee49c4169c18c0024fec48743610281cec0333906953da783b3bcd246226efccff4cdefa62c26753db228e0120feff2bdc",
                "encryptedValue": "1ea73031bc0cf9c67b61bc1684d78f2b"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData1', 'data1')
            ->withDecryptionPath('encryptedData2', 'data2')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $payloadObject = json_decode($payload);
        $this->assertFalse(property_exists($payloadObject, 'encryptedData1'));
        $this->assertFalse(property_exists($payloadObject, 'encryptedData2'));
        $this->assertTrue(property_exists($payloadObject, 'data1'));
        $this->assertTrue(property_exists($payloadObject, 'data2'));
    }

    public function testDecryptPayload_ShouldMergeJsonObjects_WhenOutPathAlreadyContainData() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "17492f69d92d2008ee9289cf3e07bd36",
                "encryptedKey": "22b3df5e70777cef394c39ac74bacfcdbfc8cef4a4da771f1d07611f18b4dc9eacde7297870acb421abe77b8b974f53b2e5b834a68e11a4ddab53ece2d37ae7dee5646dc3f4c5c17166906258615b9c7c52f7242a1afa6edf24815c3dbec4b2092a027de11bcdab4c47de0159ce76d2449394f962a07196a5a5b41678a085d77730baee0d3d0e486eb4719aae8f1f1c0fd7026aea7b0872c049e8df1e7eed088fa84fc613602e989fa4e7a7b77ac40da212a462ae5d3df5078be96fcf3d0fe612e0ec401d27a243c0df1feb8241d49248697db5ec79571b9d52386064ee3db11d200156bfd3af03a289ea37ec2c8f315840e7804669a855bf9e34190e3b14d28",
                "encryptedValue": "9cad34c0d7b2443f07bb7b7e19817ade132ba3f312b1176c09a312e5b5f908198e1e0cfac0fd8c9f66c70a9b05b1a701",
                "oaepHashingAlgorithm": "SHA256"
            },
            "data": {
                "field1": "previousField1Value",
                "field3": "field3Value"
            }
        }';

        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $payloadObject = json_decode($payload);
        $this->assertFalse(property_exists($payloadObject, 'encryptedData'));
        $dataObject = $payloadObject->data;
        $this->assertNotEmpty($dataObject);
        $this->assertEquals('field1Value', $dataObject->field1);
        $this->assertEquals('field2Value', $dataObject->field2);
        $this->assertEquals('field3Value', $dataObject->field3);
    }

    public function testDecryptPayload_ShouldKeepInputObject_WhenContainsAdditionalFields() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "ba574b07248f63756bce778f8a115819",
                "encryptedKey": "26687f6d03d27145451d20bdaa29cc199e2533bb9eb7351772e31d1290b98380b43dbf47b9a337cc2ecaff9d3d9fb45305950f13382c5ad822ee6df79e1a57b14a3c58c71090121994a9f771ef96472669671718b55a0fa8d9f76de9e172fedcabbc87d64b5a994899e43abb19afa840269012c397b5b18d4babc0e41c1ad698db98c89121bbe5b2d227cfc5d3c3c87f4f4c8b04b509d326199b39adfbd8bca8bf0a150fcf3c37b9717382af502ad8d4d28b17b91762bf108d34aba0fb40ca410c2ecaeb30d68003af20dce27d9d034e4c557b8104e85f859de0eb709b23f9978869bae545c7f1b62173887eae9e75e4b6d6b4b01d7172ccc8c5774c0db51c24",
                "encryptedValue": "2867e67545b2f3d0708500a1cea649e3",
                "oaepHashingAlgorithm": "SHA256",
                "field": "fieldValue"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $payloadObject = json_decode($payload);
        $this->assertEquals('fieldValue', $payloadObject->encryptedData->field);
    }

    public function testDecryptPayload_ShouldOverwriteInputObject_WhenOutPathSameAsInPath() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "17492f69d92d2008ee9289cf3e07bd36",
                "encryptedKey": "22b3df5e70777cef394c39ac74bacfcdbfc8cef4a4da771f1d07611f18b4dc9eacde7297870acb421abe77b8b974f53b2e5b834a68e11a4ddab53ece2d37ae7dee5646dc3f4c5c17166906258615b9c7c52f7242a1afa6edf24815c3dbec4b2092a027de11bcdab4c47de0159ce76d2449394f962a07196a5a5b41678a085d77730baee0d3d0e486eb4719aae8f1f1c0fd7026aea7b0872c049e8df1e7eed088fa84fc613602e989fa4e7a7b77ac40da212a462ae5d3df5078be96fcf3d0fe612e0ec401d27a243c0df1feb8241d49248697db5ec79571b9d52386064ee3db11d200156bfd3af03a289ea37ec2c8f315840e7804669a855bf9e34190e3b14d28",
                "encryptedValue": "9cad34c0d7b2443f07bb7b7e19817ade132ba3f312b1176c09a312e5b5f908198e1e0cfac0fd8c9f66c70a9b05b1a701",
                "oaepHashingAlgorithm": "SHA256"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'encryptedData')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $payloadObject = json_decode($payload);
        $this->assertEquals('field1Value', $payloadObject->encryptedData->field1);
        $this->assertEquals('field2Value', $payloadObject->encryptedData->field2);
    }

    public function testDecryptPayload_ShouldSupportRootAsInputPath() {

        // GIVEN
        $encryptedPayload = '{
            "iv": "6fef040c8fe8ad9ec56b74efa194b5f7",
            "encryptedKey": "b04c69e1ca944fd7641ea79f03e5cd540144759212fa50d07c8a97ab30ca8bded324e2d4b8cd2613b25cd6bceac35b76c2fa1b521ff205b5f33eafaf4102efbefd35cae6707f985953d6dac366cca36295b29d8af3d94d5d5d1532158066b9fecfc2cc000f10e4757967e84c043d7db164d7488f5bef28f59c989c4cd316c870da7b7c1d10cfd73b6d285cd43447e9e96702e3e818011b45b0ecda21b02286db04b7c77ab193dcc4a9036beff065a404689b7cea40b6a348554900ae3eb819af9cb53ab800e158051aac8d8075045a06808e3730cd8cbc1b5334dcdc922d0227f6da1518442914ac5f3abf6751dfb5721074459d0626b62e934f6a6e6fd96020",
            "encryptedValue": "386cdb354a33a5b5ae44fa73622297d0372857d1f7634b45010f691964958e2afca0f7391742dc1243768ccf0b4fce8b",
            "encryptionCertificateFingerprint": "80810fc13a8319fcf0e2ec322c82a4c304b782cc3ce671176343cfe8160c2279",
            "encryptionKeyFingerprint": "761b003c1eade3a5490e5000d37887baa5e6ec0e226c07706e599451fc032a79",
            "oaepHashingAlgorithm": "SHA256"
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('$', '$.encryptedData')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $payloadObject = json_decode($payload);
        $this->assertFalse(property_exists($payloadObject, 'iv'));
        $this->assertFalse(property_exists($payloadObject, 'encryptedKey'));
        $this->assertFalse(property_exists($payloadObject, 'encryptedValue'));
        $this->assertFalse(property_exists($payloadObject, 'oaepHashingAlgorithm'));
        $this->assertFalse(property_exists($payloadObject, 'encryptionCertificateFingerprint'));
        $this->assertFalse(property_exists($payloadObject, 'encryptionKeyFingerprint'));
        $this->assertEquals('value1', $payloadObject->encryptedData->field1);
        $this->assertEquals('value2', $payloadObject->encryptedData->field2);
    }

    public function testDecryptPayload_ShouldSupportRootAsInputPathAndOutputPath() {

        // GIVEN
        $encryptedPayload = '{
            "iv": "6fef040c8fe8ad9ec56b74efa194b5f7",
            "encryptedKey": "b04c69e1ca944fd7641ea79f03e5cd540144759212fa50d07c8a97ab30ca8bded324e2d4b8cd2613b25cd6bceac35b76c2fa1b521ff205b5f33eafaf4102efbefd35cae6707f985953d6dac366cca36295b29d8af3d94d5d5d1532158066b9fecfc2cc000f10e4757967e84c043d7db164d7488f5bef28f59c989c4cd316c870da7b7c1d10cfd73b6d285cd43447e9e96702e3e818011b45b0ecda21b02286db04b7c77ab193dcc4a9036beff065a404689b7cea40b6a348554900ae3eb819af9cb53ab800e158051aac8d8075045a06808e3730cd8cbc1b5334dcdc922d0227f6da1518442914ac5f3abf6751dfb5721074459d0626b62e934f6a6e6fd96020",
            "encryptedValue": "386cdb354a33a5b5ae44fa73622297d0372857d1f7634b45010f691964958e2afca0f7391742dc1243768ccf0b4fce8b",
            "encryptionCertificateFingerprint": "80810fc13a8319fcf0e2ec322c82a4c304b782cc3ce671176343cfe8160c2279",
            "encryptionKeyFingerprint": "761b003c1eade3a5490e5000d37887baa5e6ec0e226c07706e599451fc032a79",
            "oaepHashingAlgorithm": "SHA256"
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('$', '$')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $this->assertJsonStringEqualsJsonString('{"field1": "value1","field2": "value2"}', $payload);
    }

    public function testDecryptPayload_ShouldThrowEncryptionException_WhenDecryptionErrorOccurs() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "ba574b07248f63756bce778f8a115819",
                "encryptedKey": "26687f6d03d27145451d20bdaa29cc199e2533bb9eb7351772e31d1290b98380b43dbf47b9a337cc2ecaff9d3d9fb45305950f13382c5ad822ee6df79e1a57b14a3c58c71090121994a9f771ef96472669671718b55a0fa8d9f76de9e172fedcabbc87d64b5a994899e43abb19afa840269012c397b5b18d4babc0e41c1ad698db98c89121bbe5b2d227cfc5d3c3c87f4f4c8b04b509d326199b39adfbd8bca8bf0a150fcf3c37b9717382af502ad8d4d28b17b91762bf108d34aba0fb40ca410c2ecaeb30d68003af20dce27d9d034e4c557b8104e85f859de0eb709b23f9978869bae545c7f1b62173887eae9e75e4b6d6b4b01d7172ccc8c5774c0db51c24",
                "encryptedValue": "2867e67545b2f3d0708500a1cea649e3"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->withOaepPaddingDigestAlgorithm('SHA-256')
            // Not the right key
            ->withDecryptionKey(EncryptionUtils::loadDecryptionKey('./resources/Keys/Pkcs12/test_key.p12', 'mykeyalias', 'Password1'))
            ->build();

        // THEN
        $this->expectException(EncryptionException::class);
        $this->expectExceptionMessage('Failed to unwrap secret key!');

        // WHEN
        FieldLevelEncryption::decryptPayload($encryptedPayload, $config);
    }

    public function testDecryptPayload_ShouldKeepCertificateAndKeyFingerprints_WhenFieldNamesNotSetInConfig() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "ba574b07248f63756bce778f8a115819",
                "encryptedKey": "26687f6d03d27145451d20bdaa29cc199e2533bb9eb7351772e31d1290b98380b43dbf47b9a337cc2ecaff9d3d9fb45305950f13382c5ad822ee6df79e1a57b14a3c58c71090121994a9f771ef96472669671718b55a0fa8d9f76de9e172fedcabbc87d64b5a994899e43abb19afa840269012c397b5b18d4babc0e41c1ad698db98c89121bbe5b2d227cfc5d3c3c87f4f4c8b04b509d326199b39adfbd8bca8bf0a150fcf3c37b9717382af502ad8d4d28b17b91762bf108d34aba0fb40ca410c2ecaeb30d68003af20dce27d9d034e4c557b8104e85f859de0eb709b23f9978869bae545c7f1b62173887eae9e75e4b6d6b4b01d7172ccc8c5774c0db51c24",
                "encryptedValue": "2867e67545b2f3d0708500a1cea649e3",
                "encryptionCertificateFingerprint": "80810fc13a8319fcf0e2ec322c82a4c304b782cc3ce671176343cfe8160c2279",
                "encryptionKeyFingerprint": "761b003c1eade3a5490e5000d37887baa5e6ec0e226c07706e599451fc032a79",
                "oaepHashingAlgorithm": "SHA256"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->withEncryptionCertificateFingerprintFieldName(null)
            ->withEncryptionKeyFingerprintFieldName(null)
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config);

        // THEN
        $payloadObject = json_decode($payload);
        $encryptedDataObject = $payloadObject->encryptedData;
        $this->assertNotEmpty($encryptedDataObject);
        $this->assertNotEmpty($encryptedDataObject->encryptionCertificateFingerprint);
        $this->assertNotEmpty($encryptedDataObject->encryptionKeyFingerprint);
        $this->assertEquals('{}', json_encode($payloadObject->data));
    }

    public function testDecryptPayload_ShouldUseProvidedEncryptionParams_WhenPassedAsArgument() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "encryptedValue": "2867e67545b2f3d0708500a1cea649e3"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->build();

        $ivValue = 'ba574b07248f63756bce778f8a115819';
        $encryptedKeyValue = '26687f6d03d27145451d20bdaa29cc199e2533bb9eb7351772e31d1290b98380b43dbf47b9a337cc2ecaff9d3d9fb45305950f13382c5ad822ee6df79e1a57b14a3c58c71090121994a9f771ef96472669671718b55a0fa8d9f76de9e172fedcabbc87d64b5a994899e43abb19afa840269012c397b5b18d4babc0e41c1ad698db98c89121bbe5b2d227cfc5d3c3c87f4f4c8b04b509d326199b39adfbd8bca8bf0a150fcf3c37b9717382af502ad8d4d28b17b91762bf108d34aba0fb40ca410c2ecaeb30d68003af20dce27d9d034e4c557b8104e85f859de0eb709b23f9978869bae545c7f1b62173887eae9e75e4b6d6b4b01d7172ccc8c5774c0db51c24';
        $oaepHashingAlgorithmValue = 'SHA256';
        $params = new FieldLevelEncryptionParams($config, $ivValue, $encryptedKeyValue, $oaepHashingAlgorithmValue);

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config, $params);

        // THEN
        $this->assertJsonStringEqualsJsonString('{"data": {}}', $payload);
    }

    public function testDecryptPayload_ShouldUseEncryptionParamsFromPayload_WhenNullArgument() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "iv": "ba574b07248f63756bce778f8a115819",
                "encryptedKey": "26687f6d03d27145451d20bdaa29cc199e2533bb9eb7351772e31d1290b98380b43dbf47b9a337cc2ecaff9d3d9fb45305950f13382c5ad822ee6df79e1a57b14a3c58c71090121994a9f771ef96472669671718b55a0fa8d9f76de9e172fedcabbc87d64b5a994899e43abb19afa840269012c397b5b18d4babc0e41c1ad698db98c89121bbe5b2d227cfc5d3c3c87f4f4c8b04b509d326199b39adfbd8bca8bf0a150fcf3c37b9717382af502ad8d4d28b17b91762bf108d34aba0fb40ca410c2ecaeb30d68003af20dce27d9d034e4c557b8104e85f859de0eb709b23f9978869bae545c7f1b62173887eae9e75e4b6d6b4b01d7172ccc8c5774c0db51c24",
                "encryptedValue": "2867e67545b2f3d0708500a1cea649e3",
                "encryptionCertificateFingerprint": "80810fc13a8319fcf0e2ec322c82a4c304b782cc3ce671176343cfe8160c2279",
                "encryptionKeyFingerprint": "761b003c1eade3a5490e5000d37887baa5e6ec0e226c07706e599451fc032a79",
                "oaepHashingAlgorithm": "SHA256"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->build();

        // WHEN
        $payload = FieldLevelEncryption::decryptPayload($encryptedPayload, $config, null);

        // THEN
        $this->assertJsonStringEqualsJsonString('{"data": {}}', $payload);
    }

    public function testDecryptPayload_ShouldThrowInvalidArgumentException_WhenEncryptionParamsAreMissing() {

        // GIVEN
        $encryptedPayload = '{
            "encryptedData": {
                "encryptedValue": "2867e67545b2f3d0708500a1cea649e3"
            }
        }';
        $config = TestUtils::getTestFieldLevelEncryptionConfigBuilder()
            ->withDecryptionPath('encryptedData', 'data')
            ->withEncryptedKeyFieldName(null)
            ->withEncryptedKeyHeaderName('x-encrypted-key')
            ->withIvFieldName(null)
            ->withIvHeaderName('x-iv')
            ->build();

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Encryption params have to be set when not stored in HTTP payloads!');

        // WHEN
        FieldLevelEncryption::decryptPayload($encryptedPayload, $config, null);
    }
}