<?php
/**
 * TokenForGetToken
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  DigitalEnablementClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * MDES Digital Enablement API
 *
 * These APIs are designed as RPC style stateless web services where each API endpoint represents an operation to be performed.  All request and response payloads are sent in the JSON (JavaScript Object Notation) data-interchange format. Each endpoint in the API specifies the HTTP Method used to access it. All strings in request and response objects are to be UTF-8 encoded.  Each API URI includes the major and minor version of API that it conforms to.  This will allow multiple concurrent versions of the API to be deployed simultaneously. <br><br> **Authentication** <br><br> Mastercard uses OAuth 1.0a with body hash extension for authenticating the API clients. This requires every request that you send to  Mastercard to be signed with an RSA private key. A private-public RSA key pair must be generated consisting of: <br><br> 1. A private key for the OAuth signature for API requests. It is recommended to keep the private key in a password-protected or hardware keystore. <br> 2. A public key is shared with Mastercard during the project setup process through either a certificate signing request (CSR) or the API Key Generator. Mastercard will use the public key to verify the OAuth signature that is provided on every API call.<br>  An OAUTH1.0a signer library is available on [GitHub](https://github.com/Mastercard/oauth1-signer-java) <br><br> **Encryption** <br><br> All communications between Issuer web service and the Mastercard gateway is encrypted using TLS. <br><br> **Additional Encryption of Sensitive Data** <br><br> In addition to the OAuth authentication, when using MDES Digital Enablement Service, any PCI sensitive and all account holder Personally Identifiable Information (PII) data must be encrypted. This requirement applies to the API fields containing encryptedData. Sensitive data is encrypted using a symmetric session (one-time-use) key. The symmetric session key is then wrapped with an RSA Public Key supplied by Mastercard during API setup phase (the Customer Encryption Key). <br>  Java Client Encryption Library available on [GitHub](https://github.com/Mastercard/client-encryption-java)
 *
 * The version of the OpenAPI document: 1.3.0
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.1.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace DigitalEnablementClient\Model;

use \ArrayAccess;
use \DigitalEnablementClient\ObjectSerializer;

/**
 * TokenForGetToken Class Doc Comment
 *
 * @category Class
 * @package  DigitalEnablementClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class TokenForGetToken implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'token_for_getToken';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'token_unique_reference' => 'string',
        'token_requestor_id' => 'string',
        'status' => 'string',
        'suspended_by' => 'string[]',
        'status_timestamp' => 'string',
        'product_config' => '\DigitalEnablementClient\Model\ProductConfig',
        'token_info' => '\DigitalEnablementClient\Model\TokenInfoForNTUAndGetToken'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'token_unique_reference' => null,
        'token_requestor_id' => null,
        'status' => null,
        'suspended_by' => null,
        'status_timestamp' => null,
        'product_config' => null,
        'token_info' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'token_unique_reference' => 'tokenUniqueReference',
        'token_requestor_id' => 'tokenRequestorId',
        'status' => 'status',
        'suspended_by' => 'suspendedBy',
        'status_timestamp' => 'statusTimestamp',
        'product_config' => 'productConfig',
        'token_info' => 'tokenInfo'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'token_unique_reference' => 'setTokenUniqueReference',
        'token_requestor_id' => 'setTokenRequestorId',
        'status' => 'setStatus',
        'suspended_by' => 'setSuspendedBy',
        'status_timestamp' => 'setStatusTimestamp',
        'product_config' => 'setProductConfig',
        'token_info' => 'setTokenInfo'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'token_unique_reference' => 'getTokenUniqueReference',
        'token_requestor_id' => 'getTokenRequestorId',
        'status' => 'getStatus',
        'suspended_by' => 'getSuspendedBy',
        'status_timestamp' => 'getStatusTimestamp',
        'product_config' => 'getProductConfig',
        'token_info' => 'getTokenInfo'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['token_unique_reference'] = $data['token_unique_reference'] ?? null;
        $this->container['token_requestor_id'] = $data['token_requestor_id'] ?? null;
        $this->container['status'] = $data['status'] ?? null;
        $this->container['suspended_by'] = $data['suspended_by'] ?? null;
        $this->container['status_timestamp'] = $data['status_timestamp'] ?? null;
        $this->container['product_config'] = $data['product_config'] ?? null;
        $this->container['token_info'] = $data['token_info'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['status_timestamp']) && (mb_strlen($this->container['status_timestamp']) > 29)) {
            $invalidProperties[] = "invalid value for 'status_timestamp', the character length must be smaller than or equal to 29.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets token_unique_reference
     *
     * @return string|null
     */
    public function getTokenUniqueReference()
    {
        return $this->container['token_unique_reference'];
    }

    /**
     * Sets token_unique_reference
     *
     * @param string|null $token_unique_reference The unique reference allocated to the Token which is always present even if an error occurs. maxLength: 64
     *
     * @return self
     */
    public function setTokenUniqueReference($token_unique_reference)
    {
        $this->container['token_unique_reference'] = $token_unique_reference;

        return $this;
    }

    /**
     * Gets token_requestor_id
     *
     * @return string|null
     */
    public function getTokenRequestorId()
    {
        return $this->container['token_requestor_id'];
    }

    /**
     * Sets token_requestor_id
     *
     * @param string|null $token_requestor_id Identifies the Token Requestor. <br> minLength: 11 maxLength: 11
     *
     * @return self
     */
    public function setTokenRequestorId($token_requestor_id)
    {
        $this->container['token_requestor_id'] = $token_requestor_id;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status The current status of Token. Must be either:  * 'INACTIVE' (Token has not yet been activated)  * 'ACTIVE' (Token is active and ready to transact)  * 'SUSPENDED' (Token is suspended and unable to transact)  * 'DEACTIVATED' (Token has been permanently deactivated). maxLength: 32
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets suspended_by
     *
     * @return string[]|null
     */
    public function getSuspendedBy()
    {
        return $this->container['suspended_by'];
    }

    /**
     * Sets suspended_by
     *
     * @param string[]|null $suspended_by (CONDITIONAL only supplied if status is SUSPENDED) Who or what caused the Token to be suspended One or more values of:    * ISSUER - Suspended by the Issuer.    * TOKEN_REQUESTOR - Suspended by the Token Requestor    * MOBILE_PIN_LOCKED - Suspended due to the Mobile PIN being locked    * CARDHOLDER - Suspended by the Cardholder
     *
     * @return self
     */
    public function setSuspendedBy($suspended_by)
    {
        $this->container['suspended_by'] = $suspended_by;

        return $this;
    }

    /**
     * Gets status_timestamp
     *
     * @return string|null
     */
    public function getStatusTimestamp()
    {
        return $this->container['status_timestamp'];
    }

    /**
     * Sets status_timestamp
     *
     * @param string|null $status_timestamp The date and time the token status was last updated. Expressed in ISO 8601 extended format as one of the following:    * YYYY-MM-DDThh:mm:ss[.sss]Z    * YYYY-MM-DDThh:mm:ss[.sss]±hh:mm    * Where [.sss] is optional and can be 1 to 3 digits.
     *
     * @return self
     */
    public function setStatusTimestamp($status_timestamp)
    {
        if (!is_null($status_timestamp) && (mb_strlen($status_timestamp) > 29)) {
            throw new \InvalidArgumentException('invalid length for $status_timestamp when calling TokenForGetToken., must be smaller than or equal to 29.');
        }

        $this->container['status_timestamp'] = $status_timestamp;

        return $this;
    }

    /**
     * Gets product_config
     *
     * @return \DigitalEnablementClient\Model\ProductConfig|null
     */
    public function getProductConfig()
    {
        return $this->container['product_config'];
    }

    /**
     * Sets product_config
     *
     * @param \DigitalEnablementClient\Model\ProductConfig|null $product_config product_config
     *
     * @return self
     */
    public function setProductConfig($product_config)
    {
        $this->container['product_config'] = $product_config;

        return $this;
    }

    /**
     * Gets token_info
     *
     * @return \DigitalEnablementClient\Model\TokenInfoForNTUAndGetToken|null
     */
    public function getTokenInfo()
    {
        return $this->container['token_info'];
    }

    /**
     * Sets token_info
     *
     * @param \DigitalEnablementClient\Model\TokenInfoForNTUAndGetToken|null $token_info token_info
     *
     * @return self
     */
    public function setTokenInfo($token_info)
    {
        $this->container['token_info'] = $token_info;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


