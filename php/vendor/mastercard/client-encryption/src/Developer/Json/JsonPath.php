<?php
namespace Mastercard\Developer\Json;

use Mastercard\Developer\Utils\StringUtils;

/**
 * A very basic implementation of JSON Path which handles simple paths like: "$", "$.path.to.object",
 * "$['path']['to']['object']", "path.to.object".
 * @link https://goessner.net/articles/JsonPath/
 * @package Mastercard\Developer\Json
 */
class JsonPath {

    const LAST_CHILD_KEY = "/.*(?:\[')(.*)(?:'\])/";      // Returns "obj2" for "$['obj1']['obj2']"
    const LAST_TOKEN_IN_PATH = "/.*(\['.*'\])/";          // Returns "['obj2']" for "$['obj1']['obj2']"
    const FIRST_CHILD_KEY = "/(?:\[')([^\[\]]*)(?:'\])/"; // Returns "obj1" for "$['obj1']['obj2']"
    const FIRST_TOKEN_IN_PATH = "/(\['[^\[\]]*'\])/";     // Returns "['obj1']" for "$['obj1']['obj2']"

    private function __construct() {}

    /**
     * Convert the given JSON path to the following form: $['path']['to']['object'].
     * @throws \InvalidArgumentException
     */
    static function normalizePath($path) {
        if (empty($path) || !is_string($path)) {
            throw new \InvalidArgumentException('JSON path must be a non-empty string!');
        }
        if ($path === '$') {
            return $path;
        }
        $normalizedPath = $path;
        if (!StringUtils::startsWith($normalizedPath, '$')) {
            $normalizedPath = '$.' . $normalizedPath;
        }
        $normalizedPath = str_replace('$.', '$[\'', $normalizedPath);
        $normalizedPath = str_replace('.', '\'][\'', $normalizedPath);
        if (!StringUtils::endsWith($normalizedPath, '\']')) {
            $normalizedPath .= '\']';
        }
        return $normalizedPath;
    }

    /**
     * Return the element at the given path, return null if not found.
     * @throws \InvalidArgumentException
     */
    static function find($jsonObject, $path) {
        if (!is_object($jsonObject)) {
            throw new \InvalidArgumentException('An object was expected!');
        }

        $normalizedPath = self::normalizePath($path);
        $currentPath = $normalizedPath;
        $currentElement = $jsonObject;
        while ($currentPath !== '$') {
            preg_match(self::FIRST_CHILD_KEY, $currentPath, $matches);
            if (sizeof($matches) <= 0) {
                return null;
            }
            $childKey = $matches[1];
            if (!property_exists($currentElement, $childKey)) {
                return null;
            }
            $currentElement = $currentElement->$childKey;
            $currentPath = str_replace('[\'' . $childKey . '\']', '', $currentPath);
        }
        return $currentElement;
    }

    /**
     * Delete the element at the given path.
     * @throws \InvalidArgumentException
     */
    static function delete($jsonObject, $path) {
        $parent = self::find($jsonObject, self::getParentPath($path));
        if (is_null($parent)) {
            // Nothing to delete
            return;
        }
        $key = self::getElementKey($path);
        unset($parent->$key);
    }

    /**
     * Get JSON path to the parent of the object at the given JSON path. Example:
     * - Input: "$.['path'].['to'].['object']"
     * - Output: "$.['path'].['to']"
     */
    static function getParentPath($path) {
        if ('$' === $path) {
            throw new \InvalidArgumentException('Unable to find parent for: ' . $path);
        }

        $normalizedPath = self::normalizePath($path);
        preg_match(self::LAST_TOKEN_IN_PATH, $normalizedPath, $matches);
        $size = sizeof($matches);
        if ($size > 0) {
            return str_replace($matches[1], '', $normalizedPath);
        }

        throw new \InvalidArgumentException('Unsupported JSON path: ' . $path . '!');
    }

    /**
     * Get object key at the given JSON path. Example:
     * - Input: "$.['path'].['to'].['object']"
     * - Output: "object"
     */
    static function getElementKey($path) {
        if ('$' === $path) {
            throw new \InvalidArgumentException('Unable to find object key for: ' . $path);
        }

        $normalizedPath = self::normalizePath($path);
        preg_match(self::LAST_CHILD_KEY, $normalizedPath, $matches);
        $size = sizeof($matches);
        if ($size > 0) {
            return $matches[1];
        }

        throw new \InvalidArgumentException('Unsupported JSON path: ' . $path . '!');
    }
        
    /**
     * Checks if a JSON path points to a single item or if it potentially returns multiple items.
     * @link https://github.com/json-path/JsonPath
     */
    static function isPathDefinite($path) {
        return strpos($path, '*') === false && strpos($path, '..') === false
            && strpos($path, '@') === false && strpos($path, ',') === false;
    }
}