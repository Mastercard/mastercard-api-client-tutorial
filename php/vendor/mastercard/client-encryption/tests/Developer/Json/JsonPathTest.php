<?php
namespace Mastercard\Developer\Json;

use PHPUnit\Framework\TestCase;

class JsonPathTest extends TestCase {

    public function testNormalizePath() {

        // GIVEN
        $jsonPath0 = '$[\'obj1\']';
        $jsonPath1 = '$[\'obj1\'][\'obj2\']';
        $jsonPath2 = '$';
        $jsonPath3 = 'obj1.obj2';
        $jsonPath4 = '$.obj1.obj2';
        $jsonPath5 = 'obj1';

        // WHEN
        $normalizedJsonPath0 = JsonPath::normalizePath($jsonPath0);
        $normalizedJsonPath1 = JsonPath::normalizePath($jsonPath1);
        $normalizedJsonPath2 = JsonPath::normalizePath($jsonPath2);
        $normalizedJsonPath3 = JsonPath::normalizePath($jsonPath3);
        $normalizedJsonPath4 = JsonPath::normalizePath($jsonPath4);
        $normalizedJsonPath5 = JsonPath::normalizePath($jsonPath5);

        // THEN
        $this->assertEquals($jsonPath0, $normalizedJsonPath0);
        $this->assertEquals($jsonPath1, $normalizedJsonPath1);
        $this->assertEquals($jsonPath2, $normalizedJsonPath2);
        $this->assertEquals($jsonPath1, $normalizedJsonPath3);
        $this->assertEquals($jsonPath1, $normalizedJsonPath4);
        $this->assertEquals($jsonPath0, $normalizedJsonPath5);
    }

    public function testNormalizePath_ShouldThrowInvalidArgumentException_WhenJsonPathEmpty() {

        // GIVEN
        $jsonPath = '';

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('JSON path must be a non-empty string!');

        // WHEN
        JsonPath::normalizePath($jsonPath);
    }

    public function testNormalizePath_ShouldThrowInvalidArgumentException_WhenJsonPathIsNotAString() {

        // GIVEN
        $jsonPath = [];

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('JSON path must be a non-empty string!');

        // WHEN
        JsonPath::normalizePath($jsonPath);
    }

    public function testGetElementKey() {
        
        // GIVEN
        $jsonPath1 = '$[\'obj0\'][\'obj1\'][\'obj2\']';
        $jsonPath2 = 'obj1.obj2';
        $jsonPath3 = '$.obj1.obj2';
        $jsonPath4 = 'obj2';

        // WHEN
        $jsonElementKey1 = JsonPath::getElementKey($jsonPath1);
        $jsonElementKey2 = JsonPath::getElementKey($jsonPath2);
        $jsonElementKey3 = JsonPath::getElementKey($jsonPath3);
        $jsonElementKey4 = JsonPath::getElementKey($jsonPath4);

        // THEN
        $this->assertEquals('obj2', $jsonElementKey1);
        $this->assertEquals('obj2', $jsonElementKey2);
        $this->assertEquals('obj2', $jsonElementKey3);
        $this->assertEquals('obj2', $jsonElementKey4);
    }

    public function testGetParent() {

        // GIVEN
        $jsonPath0 = '$[\'obj1\']';
        $jsonPath1 = '$[\'obj1\'][\'obj2\']';
        $jsonPath2 = '$[\'obj1\'][\'obj2\'][\'obj3\']';
        $jsonPath3 = 'obj1.obj2';
        $jsonPath4 = '$.obj1.obj2';
        $jsonPath5 = 'obj1';

        // WHEN
        $parentJsonPath0 = JsonPath::getParentPath($jsonPath0);
        $parentJsonPath1 = JsonPath::getParentPath($jsonPath1);
        $parentJsonPath2 = JsonPath::getParentPath($jsonPath2);
        $parentJsonPath3 = JsonPath::getParentPath($jsonPath3);
        $parentJsonPath4 = JsonPath::getParentPath($jsonPath4);
        $parentJsonPath5 = JsonPath::getParentPath($jsonPath5);

        // THEN
        $this->assertEquals('$', $parentJsonPath0);
        $this->assertEquals($jsonPath0, $parentJsonPath1);
        $this->assertEquals($jsonPath1, $parentJsonPath2);
        $this->assertEquals($jsonPath0, $parentJsonPath3);
        $this->assertEquals($jsonPath0, $parentJsonPath4);
        $this->assertEquals('$', $parentJsonPath5);
    }

    public function testFind() {

        // GIVEN
        $json = '{
            "child1": {
                "field1": "value1",
                "field2": "value2"
            },
            "child2": {},
            "child3": {
                "grandchild1": [],
                "grandchild2": [ "value1", "value2" ]
            }
        }';
        $jsonObject = json_decode($json);

        // WHEN
        $jsonElement1 = JsonPath::find($jsonObject, '$');
        $jsonElement2 = JsonPath::find($jsonObject, '$.child1');
        $jsonElement3 = JsonPath::find($jsonObject, '$.child2');
        $jsonElement4 = JsonPath::find($jsonObject, '$.child3');
        $jsonElement5 = JsonPath::find($jsonObject, '$.child3.grandchild1');
        $jsonElement6 = JsonPath::find($jsonObject, '$.child3.grandchild2');
        $jsonElement7 = JsonPath::find($jsonObject, '$.not.existing.path');

        // THEN
        $this->assertSame($jsonObject, $jsonElement1);
        $this->assertSame($jsonObject->child1, $jsonElement2);
        $this->assertSame($jsonObject->child2, $jsonElement3);
        $this->assertSame($jsonObject->child3, $jsonElement4);
        $this->assertSame($jsonObject->child3->grandchild1, $jsonElement5);
        $this->assertSame($jsonObject->child3->grandchild2, $jsonElement6);
        $this->assertNull($jsonElement7);
    }

    public function testDelete() {

        // GIVEN
        $json = '{
            "child1": {
                "field1": "value1",
                "field2": "value2"
            },
            "child2": {},
            "child3": {
                "grandchild1": [],
                "grandchild2": [ "value1", "value2" ]
            }
        }';
        $jsonObject = json_decode($json);

        // WHEN
        JsonPath::delete($jsonObject, '$.child3.grandchild2');

        // THEN
        $this->assertNull(JsonPath::find($jsonObject, '$.child3.grandchild2'));
    }

    public function testDelete_ShouldDoNothing_WhenElementDoesNotExist() {

        // GIVEN
        $json = '{
            "child": {}
        }';
        $jsonObject = json_decode($json);

        // WHEN
        JsonPath::delete($jsonObject, '$.child3.grandchild2');

        // THEN
        $this->assertEquals(json_decode($json), $jsonObject);
    }

    public function testFind_ShouldThrowInvalidArgumentException_WhenArrayPassedAsArgument() {

        // GIVEN
        $json = '{}';
        $jsonArray = json_decode($json, true);

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('An object was expected!');

        // WHEN
        JsonPath::find($jsonArray, '$');
    }

    public function testGetParentPath_ShouldThrowInvalidArgumentException_WhenJsonPathEmpty() {

        // GIVEN
        $jsonPath = '';

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('JSON path must be a non-empty string!');

        // WHEN
        JsonPath::getParentPath($jsonPath);
    }

    public function testGetElementKey_ShouldThrowInvalidArgumentException_WhenJsonPathEmpty() {

        // GIVEN
        $jsonPath = '';

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('JSON path must be a non-empty string!');

        // WHEN
        JsonPath::getElementKey($jsonPath);
    }

    public function testGetParentPath_ShouldThrowInvalidArgumentException_WhenNoParent() {
        
        // GIVEN
        $jsonPath = '$';

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unable to find parent for: $');

        // WHEN
        JsonPath::getParentPath($jsonPath);
    }

    public function testGetElementKey_ShouldThrowInvalidArgumentException_WhenNoKey() {
        
        // GIVEN
        $jsonPath = '$';

        // THEN
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unable to find object key for: $');


        // WHEN
        JsonPath::getElementKey($jsonPath);
    }
}
