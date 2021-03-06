# coding: utf-8

"""
    MDES for Merchants

    The MDES APIs are designed as RPC style stateless web services where each API endpoint represents an operation to be performed.  All request and response payloads are sent in the JSON (JavaScript Object Notation) data-interchange format. Each endpoint in the API specifies the HTTP Method used to access it. All strings in request and response objects are to be UTF-8 encoded.  Each API URI includes the major and minor version of API that it conforms to.  This will allow multiple concurrent versions of the API to be deployed simultaneously. <br> __Authentication__ Mastercard uses OAuth 1.0a with body hash extension for authenticating the API clients. This requires every request that you send to  Mastercard to be signed with an RSA private key. A private-public RSA key pair must be generated consisting of: <br> 1 . A private key for the OAuth signature for API requests. It is recommended to keep the private key in a password-protected or hardware keystore. <br> 2. A public key is shared with Mastercard during the project setup process through either a certificate signing request (CSR) or the API Key Generator. Mastercard will use the public key to verify the OAuth signature that is provided on every API call.<br>  An OAUTH1.0a signer library is available on [GitHub](https://github.com/Mastercard/oauth1-signer-java) <br>  __Encryption__<br>  All communications between Issuer web service and the Mastercard gateway is encrypted using TLS. <br> __Additional Encryption of Sensitive Data__ In addition to the OAuth authentication, when using MDES Digital Enablement Service, any PCI sensitive and all account holder Personally Identifiable Information (PII) data must be encrypted. This requirement applies to the API fields containing encryptedData. Sensitive data is encrypted using a symmetric session (one-time-use) key. The symmetric session key is then wrapped with an RSA Public Key supplied by Mastercard during API setup phase (the Customer Encryption Key). <br>  Java Client Encryption Library available on [GitHub](https://github.com/Mastercard/client-encryption-java)   # noqa: E501

    The version of the OpenAPI document: 1.2.10
    Generated by: https://openapi-generator.tech
"""


import pprint
import re  # noqa: F401

import six

from openapi_client.configuration import Configuration


class TransactRequestSchema(object):
    """NOTE: This class is auto generated by OpenAPI Generator.
    Ref: https://openapi-generator.tech

    Do not edit the class manually.
    """

    """
    Attributes:
      openapi_types (dict): The key is attribute name
                            and the value is attribute type.
      attribute_map (dict): The key is attribute name
                            and the value is json key in definition.
    """
    openapi_types = {
        'response_host': 'str',
        'request_id': 'str',
        'token_unique_reference': 'str',
        'dsrp_type': 'str',
        'unpredictable_number': 'str'
    }

    attribute_map = {
        'response_host': 'responseHost',
        'request_id': 'requestId',
        'token_unique_reference': 'tokenUniqueReference',
        'dsrp_type': 'dsrpType',
        'unpredictable_number': 'unpredictableNumber'
    }

    def __init__(self, response_host=None, request_id=None, token_unique_reference=None, dsrp_type=None, unpredictable_number=None, local_vars_configuration=None):  # noqa: E501
        """TransactRequestSchema - a model defined in OpenAPI"""  # noqa: E501
        if local_vars_configuration is None:
            local_vars_configuration = Configuration()
        self.local_vars_configuration = local_vars_configuration

        self._response_host = None
        self._request_id = None
        self._token_unique_reference = None
        self._dsrp_type = None
        self._unpredictable_number = None
        self.discriminator = None

        if response_host is not None:
            self.response_host = response_host
        self.request_id = request_id
        self.token_unique_reference = token_unique_reference
        self.dsrp_type = dsrp_type
        if unpredictable_number is not None:
            self.unpredictable_number = unpredictable_number

    @property
    def response_host(self):
        """Gets the response_host of this TransactRequestSchema.  # noqa: E501

        The host that originated the request. Future calls in the same conversation may be routed to this host.   # noqa: E501

        :return: The response_host of this TransactRequestSchema.  # noqa: E501
        :rtype: str
        """
        return self._response_host

    @response_host.setter
    def response_host(self, response_host):
        """Sets the response_host of this TransactRequestSchema.

        The host that originated the request. Future calls in the same conversation may be routed to this host.   # noqa: E501

        :param response_host: The response_host of this TransactRequestSchema.  # noqa: E501
        :type: str
        """

        self._response_host = response_host

    @property
    def request_id(self):
        """Gets the request_id of this TransactRequestSchema.  # noqa: E501

        Unique identifier for the request.   # noqa: E501

        :return: The request_id of this TransactRequestSchema.  # noqa: E501
        :rtype: str
        """
        return self._request_id

    @request_id.setter
    def request_id(self, request_id):
        """Sets the request_id of this TransactRequestSchema.

        Unique identifier for the request.   # noqa: E501

        :param request_id: The request_id of this TransactRequestSchema.  # noqa: E501
        :type: str
        """
        if self.local_vars_configuration.client_side_validation and request_id is None:  # noqa: E501
            raise ValueError("Invalid value for `request_id`, must not be `None`")  # noqa: E501

        self._request_id = request_id

    @property
    def token_unique_reference(self):
        """Gets the token_unique_reference of this TransactRequestSchema.  # noqa: E501

        Globally unique identifier for the Token, as assigned by MDES.    __Max Length:64__   # noqa: E501

        :return: The token_unique_reference of this TransactRequestSchema.  # noqa: E501
        :rtype: str
        """
        return self._token_unique_reference

    @token_unique_reference.setter
    def token_unique_reference(self, token_unique_reference):
        """Sets the token_unique_reference of this TransactRequestSchema.

        Globally unique identifier for the Token, as assigned by MDES.    __Max Length:64__   # noqa: E501

        :param token_unique_reference: The token_unique_reference of this TransactRequestSchema.  # noqa: E501
        :type: str
        """
        if self.local_vars_configuration.client_side_validation and token_unique_reference is None:  # noqa: E501
            raise ValueError("Invalid value for `token_unique_reference`, must not be `None`")  # noqa: E501

        self._token_unique_reference = token_unique_reference

    @property
    def dsrp_type(self):
        """Gets the dsrp_type of this TransactRequestSchema.  # noqa: E501

        What type of DSRP cryptogram to create. Must be either UCAF or M_CHIP.     __Max Length:64__   # noqa: E501

        :return: The dsrp_type of this TransactRequestSchema.  # noqa: E501
        :rtype: str
        """
        return self._dsrp_type

    @dsrp_type.setter
    def dsrp_type(self, dsrp_type):
        """Sets the dsrp_type of this TransactRequestSchema.

        What type of DSRP cryptogram to create. Must be either UCAF or M_CHIP.     __Max Length:64__   # noqa: E501

        :param dsrp_type: The dsrp_type of this TransactRequestSchema.  # noqa: E501
        :type: str
        """
        if self.local_vars_configuration.client_side_validation and dsrp_type is None:  # noqa: E501
            raise ValueError("Invalid value for `dsrp_type`, must not be `None`")  # noqa: E501

        self._dsrp_type = dsrp_type

    @property
    def unpredictable_number(self):
        """Gets the unpredictable_number of this TransactRequestSchema.  # noqa: E501

        __CONDITIONAL__<br>HEX Encoded data (case sensitive) provided by the merchant to provide variability and uniqueness to the generation of a cryptogram.  Required if the shouldGenerateUnpredictableNumber flag is not set during on-boarding.<br> __Length:8__             # noqa: E501

        :return: The unpredictable_number of this TransactRequestSchema.  # noqa: E501
        :rtype: str
        """
        return self._unpredictable_number

    @unpredictable_number.setter
    def unpredictable_number(self, unpredictable_number):
        """Sets the unpredictable_number of this TransactRequestSchema.

        __CONDITIONAL__<br>HEX Encoded data (case sensitive) provided by the merchant to provide variability and uniqueness to the generation of a cryptogram.  Required if the shouldGenerateUnpredictableNumber flag is not set during on-boarding.<br> __Length:8__             # noqa: E501

        :param unpredictable_number: The unpredictable_number of this TransactRequestSchema.  # noqa: E501
        :type: str
        """

        self._unpredictable_number = unpredictable_number

    def to_dict(self):
        """Returns the model properties as a dict"""
        result = {}

        for attr, _ in six.iteritems(self.openapi_types):
            value = getattr(self, attr)
            if isinstance(value, list):
                result[attr] = list(map(
                    lambda x: x.to_dict() if hasattr(x, "to_dict") else x,
                    value
                ))
            elif hasattr(value, "to_dict"):
                result[attr] = value.to_dict()
            elif isinstance(value, dict):
                result[attr] = dict(map(
                    lambda item: (item[0], item[1].to_dict())
                    if hasattr(item[1], "to_dict") else item,
                    value.items()
                ))
            else:
                result[attr] = value

        return result

    def to_str(self):
        """Returns the string representation of the model"""
        return pprint.pformat(self.to_dict())

    def __repr__(self):
        """For `print` and `pprint`"""
        return self.to_str()

    def __eq__(self, other):
        """Returns true if both objects are equal"""
        if not isinstance(other, TransactRequestSchema):
            return False

        return self.to_dict() == other.to_dict()

    def __ne__(self, other):
        """Returns true if both objects are not equal"""
        if not isinstance(other, TransactRequestSchema):
            return True

        return self.to_dict() != other.to_dict()
