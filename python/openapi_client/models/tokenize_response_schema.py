# coding: utf-8

"""
    MDES for Merchants

    The MDES APIs are designed as RPC style stateless web services where each API endpoint represents an operation to be performed.  All request and response payloads are sent in the JSON (JavaScript Object Notation) data-interchange format. Each endpoint in the API specifies the HTTP Method used to access it. All strings in request and response objects are to be UTF-8 encoded.  Each API URI includes the major and minor version of API that it conforms to.  This will allow multiple concurrent versions of the API to be deployed simultaneously.    # noqa: E501

    The version of the OpenAPI document: 1.2.7
    Generated by: https://openapi-generator.tech
"""


import pprint
import re  # noqa: F401

import six


class TokenizeResponseSchema(object):
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
        'response_id': 'str',
        'decision': 'str',
        'authentication_methods': 'list[AuthenticationMethods]',
        'token_unique_reference': 'str',
        'pan_unique_reference': 'str',
        'product_config': 'ProductConfig',
        'token_info': 'TokenInfo',
        'token_detail': 'TokenDetailTokenizeResponse',
        'error_code': 'str',
        'error_description': 'str',
        'errors': 'Error'
    }

    attribute_map = {
        'response_host': 'responseHost',
        'response_id': 'responseId',
        'decision': 'decision',
        'authentication_methods': 'authenticationMethods',
        'token_unique_reference': 'tokenUniqueReference',
        'pan_unique_reference': 'panUniqueReference',
        'product_config': 'productConfig',
        'token_info': 'tokenInfo',
        'token_detail': 'tokenDetail',
        'error_code': 'errorCode',
        'error_description': 'errorDescription',
        'errors': 'errors'
    }

    def __init__(self, response_host=None, response_id=None, decision=None, authentication_methods=None, token_unique_reference=None, pan_unique_reference=None, product_config=None, token_info=None, token_detail=None, error_code=None, error_description=None, errors=None):  # noqa: E501
        """TokenizeResponseSchema - a model defined in OpenAPI"""  # noqa: E501

        self._response_host = None
        self._response_id = None
        self._decision = None
        self._authentication_methods = None
        self._token_unique_reference = None
        self._pan_unique_reference = None
        self._product_config = None
        self._token_info = None
        self._token_detail = None
        self._error_code = None
        self._error_description = None
        self._errors = None
        self.discriminator = None

        if response_host is not None:
            self.response_host = response_host
        if response_id is not None:
            self.response_id = response_id
        if decision is not None:
            self.decision = decision
        if authentication_methods is not None:
            self.authentication_methods = authentication_methods
        if token_unique_reference is not None:
            self.token_unique_reference = token_unique_reference
        if pan_unique_reference is not None:
            self.pan_unique_reference = pan_unique_reference
        if product_config is not None:
            self.product_config = product_config
        if token_info is not None:
            self.token_info = token_info
        if token_detail is not None:
            self.token_detail = token_detail
        if error_code is not None:
            self.error_code = error_code
        if error_description is not None:
            self.error_description = error_description
        if errors is not None:
            self.errors = errors

    @property
    def response_host(self):
        """Gets the response_host of this TokenizeResponseSchema.  # noqa: E501

        The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host.    # noqa: E501

        :return: The response_host of this TokenizeResponseSchema.  # noqa: E501
        :rtype: str
        """
        return self._response_host

    @response_host.setter
    def response_host(self, response_host):
        """Sets the response_host of this TokenizeResponseSchema.

        The MasterCard host that originated the request. Future calls in the same conversation may be routed to this host.    # noqa: E501

        :param response_host: The response_host of this TokenizeResponseSchema.  # noqa: E501
        :type: str
        """

        self._response_host = response_host

    @property
    def response_id(self):
        """Gets the response_id of this TokenizeResponseSchema.  # noqa: E501

        Unique identifier for the response.   # noqa: E501

        :return: The response_id of this TokenizeResponseSchema.  # noqa: E501
        :rtype: str
        """
        return self._response_id

    @response_id.setter
    def response_id(self, response_id):
        """Sets the response_id of this TokenizeResponseSchema.

        Unique identifier for the response.   # noqa: E501

        :param response_id: The response_id of this TokenizeResponseSchema.  # noqa: E501
        :type: str
        """

        self._response_id = response_id

    @property
    def decision(self):
        """Gets the decision of this TokenizeResponseSchema.  # noqa: E501

        The tokenization decision for this digitization request. Must be either APPROVED (Digitization request was approved), DECLINED (Digitization request was declined) OR REQUIRE_ADDITIONAL_AUTHENTICATION Digitization request was approved but optionally requires additional authentication. One or more Authentication methods may be provided).   # noqa: E501

        :return: The decision of this TokenizeResponseSchema.  # noqa: E501
        :rtype: str
        """
        return self._decision

    @decision.setter
    def decision(self, decision):
        """Sets the decision of this TokenizeResponseSchema.

        The tokenization decision for this digitization request. Must be either APPROVED (Digitization request was approved), DECLINED (Digitization request was declined) OR REQUIRE_ADDITIONAL_AUTHENTICATION Digitization request was approved but optionally requires additional authentication. One or more Authentication methods may be provided).   # noqa: E501

        :param decision: The decision of this TokenizeResponseSchema.  # noqa: E501
        :type: str
        """

        self._decision = decision

    @property
    def authentication_methods(self):
        """Gets the authentication_methods of this TokenizeResponseSchema.  # noqa: E501


        :return: The authentication_methods of this TokenizeResponseSchema.  # noqa: E501
        :rtype: list[AuthenticationMethods]
        """
        return self._authentication_methods

    @authentication_methods.setter
    def authentication_methods(self, authentication_methods):
        """Sets the authentication_methods of this TokenizeResponseSchema.


        :param authentication_methods: The authentication_methods of this TokenizeResponseSchema.  # noqa: E501
        :type: list[AuthenticationMethods]
        """

        self._authentication_methods = authentication_methods

    @property
    def token_unique_reference(self):
        """Gets the token_unique_reference of this TokenizeResponseSchema.  # noqa: E501

        The unique reference allocated to the new Token. Serves as a unique identifier for all subsequent queries or management functions relating to this Token. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.    __Max Length:64__   # noqa: E501

        :return: The token_unique_reference of this TokenizeResponseSchema.  # noqa: E501
        :rtype: str
        """
        return self._token_unique_reference

    @token_unique_reference.setter
    def token_unique_reference(self, token_unique_reference):
        """Sets the token_unique_reference of this TokenizeResponseSchema.

        The unique reference allocated to the new Token. Serves as a unique identifier for all subsequent queries or management functions relating to this Token. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.    __Max Length:64__   # noqa: E501

        :param token_unique_reference: The token_unique_reference of this TokenizeResponseSchema.  # noqa: E501
        :type: str
        """

        self._token_unique_reference = token_unique_reference

    @property
    def pan_unique_reference(self):
        """Gets the pan_unique_reference of this TokenizeResponseSchema.  # noqa: E501

        The unique reference allocated to the Account Primary Account Number. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.  __Max Length:64__   # noqa: E501

        :return: The pan_unique_reference of this TokenizeResponseSchema.  # noqa: E501
        :rtype: str
        """
        return self._pan_unique_reference

    @pan_unique_reference.setter
    def pan_unique_reference(self, pan_unique_reference):
        """Sets the pan_unique_reference of this TokenizeResponseSchema.

        The unique reference allocated to the Account Primary Account Number. Provided if the decision was APPROVED or REQUIRE_ADDITIONAL_AUTHENTICATION.  __Max Length:64__   # noqa: E501

        :param pan_unique_reference: The pan_unique_reference of this TokenizeResponseSchema.  # noqa: E501
        :type: str
        """

        self._pan_unique_reference = pan_unique_reference

    @property
    def product_config(self):
        """Gets the product_config of this TokenizeResponseSchema.  # noqa: E501


        :return: The product_config of this TokenizeResponseSchema.  # noqa: E501
        :rtype: ProductConfig
        """
        return self._product_config

    @product_config.setter
    def product_config(self, product_config):
        """Sets the product_config of this TokenizeResponseSchema.


        :param product_config: The product_config of this TokenizeResponseSchema.  # noqa: E501
        :type: ProductConfig
        """

        self._product_config = product_config

    @property
    def token_info(self):
        """Gets the token_info of this TokenizeResponseSchema.  # noqa: E501


        :return: The token_info of this TokenizeResponseSchema.  # noqa: E501
        :rtype: TokenInfo
        """
        return self._token_info

    @token_info.setter
    def token_info(self, token_info):
        """Sets the token_info of this TokenizeResponseSchema.


        :param token_info: The token_info of this TokenizeResponseSchema.  # noqa: E501
        :type: TokenInfo
        """

        self._token_info = token_info

    @property
    def token_detail(self):
        """Gets the token_detail of this TokenizeResponseSchema.  # noqa: E501


        :return: The token_detail of this TokenizeResponseSchema.  # noqa: E501
        :rtype: TokenDetailTokenizeResponse
        """
        return self._token_detail

    @token_detail.setter
    def token_detail(self, token_detail):
        """Sets the token_detail of this TokenizeResponseSchema.


        :param token_detail: The token_detail of this TokenizeResponseSchema.  # noqa: E501
        :type: TokenDetailTokenizeResponse
        """

        self._token_detail = token_detail

    @property
    def error_code(self):
        """Gets the error_code of this TokenizeResponseSchema.  # noqa: E501

        __CONDITIONAL__<br> Returned in the event of and error and contains the reason the operation failed. Only use if errors object is not present.<br> __Max Length: 32__   # noqa: E501

        :return: The error_code of this TokenizeResponseSchema.  # noqa: E501
        :rtype: str
        """
        return self._error_code

    @error_code.setter
    def error_code(self, error_code):
        """Sets the error_code of this TokenizeResponseSchema.

        __CONDITIONAL__<br> Returned in the event of and error and contains the reason the operation failed. Only use if errors object is not present.<br> __Max Length: 32__   # noqa: E501

        :param error_code: The error_code of this TokenizeResponseSchema.  # noqa: E501
        :type: str
        """

        self._error_code = error_code

    @property
    def error_description(self):
        """Gets the error_description of this TokenizeResponseSchema.  # noqa: E501

        __CONDITIONAL__<br> Returned in the event of and error and contains a description of why the operation failed. Only use if errors object is not present.<br> __Max Length: 32__     # noqa: E501

        :return: The error_description of this TokenizeResponseSchema.  # noqa: E501
        :rtype: str
        """
        return self._error_description

    @error_description.setter
    def error_description(self, error_description):
        """Sets the error_description of this TokenizeResponseSchema.

        __CONDITIONAL__<br> Returned in the event of and error and contains a description of why the operation failed. Only use if errors object is not present.<br> __Max Length: 32__     # noqa: E501

        :param error_description: The error_description of this TokenizeResponseSchema.  # noqa: E501
        :type: str
        """

        self._error_description = error_description

    @property
    def errors(self):
        """Gets the errors of this TokenizeResponseSchema.  # noqa: E501


        :return: The errors of this TokenizeResponseSchema.  # noqa: E501
        :rtype: Error
        """
        return self._errors

    @errors.setter
    def errors(self, errors):
        """Sets the errors of this TokenizeResponseSchema.


        :param errors: The errors of this TokenizeResponseSchema.  # noqa: E501
        :type: Error
        """

        self._errors = errors

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
        if not isinstance(other, TokenizeResponseSchema):
            return False

        return self.__dict__ == other.__dict__

    def __ne__(self, other):
        """Returns true if both objects are not equal"""
        return not self == other