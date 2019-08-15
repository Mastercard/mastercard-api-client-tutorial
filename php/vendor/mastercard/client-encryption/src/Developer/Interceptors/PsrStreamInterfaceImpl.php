<?php

namespace Mastercard\Developer\Interceptors;

use Psr\Http\Message\StreamInterface;

class PsrStreamInterfaceImpl implements StreamInterface {

    private $content;

    public function __toString() {
        return isset($this->content) ? $this->content : '';
    }

    public function close() {
        unset($this->content);
    }

    public function detach() {
        unset($this->content);
    }

    public function getSize() {
        return isset($this->content) ? strlen($this->content) : 0;
    }

    public function tell() {
        return null;
    }

    public function eof() {
        return false;
    }

    public function isSeekable() {
        return false;
    }

    public function seek($offset, $whence = SEEK_SET) {
        return null;
    }

    public function rewind() {}

    public function isWritable() {
        return false;
    }

    public function write($string) {
        $this->content = $string;
    }

    public function isReadable() {
        return true;
    }

    public function read($length) {
        return isset($this->content) ? substr($this->content, 0, $length) : '';
    }

    public function getContents() {
        return $this->__toString();
    }

    public function getMetadata($key = null) {
        return [];
    }
}