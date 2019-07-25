<?php

namespace Mastercard\Developer\Interceptors;

use PHPUnit\Framework\TestCase;

class PsrStreamInterfaceImplTest extends TestCase {

    private $instanceUnderTest;

    protected function setUp() {
        $this->instanceUnderTest = new PsrStreamInterfaceImpl();
        $this->instanceUnderTest->write('content');
    }

    public function testClose() {
        $this->instanceUnderTest->close();
        $this->assertEmpty($this->instanceUnderTest->__toString());
        $this->assertEquals(0, $this->instanceUnderTest->getSize());
    }

    public function testDetach() {
        $this->instanceUnderTest->detach();
        $this->assertEmpty($this->instanceUnderTest->__toString());
        $this->assertEquals(0, $this->instanceUnderTest->getSize());
    }

    public function testGetSize() {
        $this->assertEquals(7, $this->instanceUnderTest->getSize());
    }

    public function testTell() {
        $this->assertNull($this->instanceUnderTest->tell());
    }

    public function testEof() {
        $this->assertFalse($this->instanceUnderTest->eof());
    }

    public function testIsSeekable() {
        $this->assertFalse($this->instanceUnderTest->isSeekable());
    }

    public function testSeek() {
        $this->assertNull($this->instanceUnderTest->seek(0));
    }

    public function testRewind() {
        $this->instanceUnderTest->rewind();
    }

    public function testIsWritable() {
        $this->assertFalse($this->instanceUnderTest->isWritable());
    }

    public function testWrite() {
        $this->instanceUnderTest->write('new');
        $this->assertEquals('new', $this->instanceUnderTest->__toString());
        $this->assertEquals(3, $this->instanceUnderTest->getSize());
    }

    public function testIsReadable() {
        $this->assertTrue($this->instanceUnderTest->isReadable());
    }

    public function testRead() {
        $this->assertEquals('cont', $this->instanceUnderTest->read(4));
    }

    public function testGetContents() {
        $this->assertEquals('content', $this->instanceUnderTest->getContents());
    }

    public function testGetMetadata() {
        $this->assertEquals([], $this->instanceUnderTest->getMetadata());
    }
}