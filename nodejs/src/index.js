/**
 * MDES Digital Enablement API
 * These APIs are designed as RPC style stateless web services where each API endpoint represents an operation to be performed.  All request and response payloads are sent in the JSON (JavaScript Object Notation) data-interchange format. Each endpoint in the API specifies the HTTP Method used to access it. All strings in request and response objects are to be UTF-8 encoded.  Each API URI includes the major and minor version of API that it conforms to.  This will allow multiple concurrent versions of the API to be deployed simultaneously. <br><br> **Authentication** <br><br> Mastercard uses OAuth 1.0a with body hash extension for authenticating the API clients. This requires every request that you send to  Mastercard to be signed with an RSA private key. A private-public RSA key pair must be generated consisting of: <br><br> 1. A private key for the OAuth signature for API requests. It is recommended to keep the private key in a password-protected or hardware keystore. <br> 2. A public key is shared with Mastercard during the project setup process through either a certificate signing request (CSR) or the API Key Generator. Mastercard will use the public key to verify the OAuth signature that is provided on every API call.<br>  An OAUTH1.0a signer library is available on [GitHub](https://github.com/Mastercard/oauth1-signer-java) <br><br> **Encryption** <br><br> All communications between Issuer web service and the Mastercard gateway is encrypted using TLS. <br><br> **Additional Encryption of Sensitive Data** <br><br> In addition to the OAuth authentication, when using MDES Digital Enablement Service, any PCI sensitive and all account holder Personally Identifiable Information (PII) data must be encrypted. This requirement applies to the API fields containing encryptedData. Sensitive data is encrypted using a symmetric session (one-time-use) key. The symmetric session key is then wrapped with an RSA Public Key supplied by Mastercard during API setup phase (the Customer Encryption Key). <br>  Java Client Encryption Library available on [GitHub](https://github.com/Mastercard/client-encryption-java) 
 *
 * The version of the OpenAPI document: 1.3.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 *
 * OpenAPI Generator version: 5.2.0
 *
 * Do not edit the class manually.
 *
 */

(function(factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module.
    define(['ApiClient', 'model/AccountHolderData', 'model/AccountHolderDataOutbound', 'model/AssetResponseSchema', 'model/AuthenticationMethods', 'model/BillingAddress', 'model/CardAccountDataInbound', 'model/CardAccountDataOutbound', 'model/DecisioningData', 'model/DeleteRequestSchema', 'model/DeleteResponseSchema', 'model/EncryptedPayload', 'model/EncryptedPayloadTransact', 'model/Error', 'model/ErrorsResponse', 'model/FundingAccountData', 'model/FundingAccountInfo', 'model/FundingAccountInfoEncryptedPayload', 'model/GatewayError', 'model/GatewayErrorsResponse', 'model/GatewayErrorsSchema', 'model/GetTaskStatusRequestSchema', 'model/GetTaskStatusResponseSchema', 'model/GetTokenRequestSchema', 'model/GetTokenResponseSchema', 'model/MediaContent', 'model/NotifyTokenEncryptedPayload', 'model/NotifyTokenUpdatedRequestSchema', 'model/NotifyTokenUpdatedResponseSchema', 'model/PhoneNumber', 'model/ProductConfig', 'model/SearchTokensRequestSchema', 'model/SearchTokensResponseSchema', 'model/SuspendRequestSchema', 'model/SuspendResponseSchema', 'model/Token', 'model/TokenDetail', 'model/TokenDetailData', 'model/TokenDetailDataGetTokenOnly', 'model/TokenDetailDataPAROnly', 'model/TokenDetailGetTokenOnly', 'model/TokenDetailPAROnly', 'model/TokenForGetToken', 'model/TokenForLCM', 'model/TokenForNTU', 'model/TokenInfo', 'model/TokenInfoForNTUAndGetToken', 'model/TokenizeRequestSchema', 'model/TokenizeResponseSchema', 'model/TransactEncryptedData', 'model/TransactError', 'model/TransactRequestSchema', 'model/TransactResponseSchema', 'model/UnSuspendRequestSchema', 'model/UnSuspendResponseSchema', 'api/DeleteApi', 'api/GetAssetApi', 'api/GetTaskStatusApi', 'api/GetTokenApi', 'api/NotifyTokenUpdatedApi', 'api/SearchTokensApi', 'api/SuspendApi', 'api/TokenizeApi', 'api/TransactApi', 'api/UnsuspendApi'], factory);
  } else if (typeof module === 'object' && module.exports) {
    // CommonJS-like environments that support module.exports, like Node.
    module.exports = factory(require('./ApiClient'), require('./model/AccountHolderData'), require('./model/AccountHolderDataOutbound'), require('./model/AssetResponseSchema'), require('./model/AuthenticationMethods'), require('./model/BillingAddress'), require('./model/CardAccountDataInbound'), require('./model/CardAccountDataOutbound'), require('./model/DecisioningData'), require('./model/DeleteRequestSchema'), require('./model/DeleteResponseSchema'), require('./model/EncryptedPayload'), require('./model/EncryptedPayloadTransact'), require('./model/Error'), require('./model/ErrorsResponse'), require('./model/FundingAccountData'), require('./model/FundingAccountInfo'), require('./model/FundingAccountInfoEncryptedPayload'), require('./model/GatewayError'), require('./model/GatewayErrorsResponse'), require('./model/GatewayErrorsSchema'), require('./model/GetTaskStatusRequestSchema'), require('./model/GetTaskStatusResponseSchema'), require('./model/GetTokenRequestSchema'), require('./model/GetTokenResponseSchema'), require('./model/MediaContent'), require('./model/NotifyTokenEncryptedPayload'), require('./model/NotifyTokenUpdatedRequestSchema'), require('./model/NotifyTokenUpdatedResponseSchema'), require('./model/PhoneNumber'), require('./model/ProductConfig'), require('./model/SearchTokensRequestSchema'), require('./model/SearchTokensResponseSchema'), require('./model/SuspendRequestSchema'), require('./model/SuspendResponseSchema'), require('./model/Token'), require('./model/TokenDetail'), require('./model/TokenDetailData'), require('./model/TokenDetailDataGetTokenOnly'), require('./model/TokenDetailDataPAROnly'), require('./model/TokenDetailGetTokenOnly'), require('./model/TokenDetailPAROnly'), require('./model/TokenForGetToken'), require('./model/TokenForLCM'), require('./model/TokenForNTU'), require('./model/TokenInfo'), require('./model/TokenInfoForNTUAndGetToken'), require('./model/TokenizeRequestSchema'), require('./model/TokenizeResponseSchema'), require('./model/TransactEncryptedData'), require('./model/TransactError'), require('./model/TransactRequestSchema'), require('./model/TransactResponseSchema'), require('./model/UnSuspendRequestSchema'), require('./model/UnSuspendResponseSchema'), require('./api/DeleteApi'), require('./api/GetAssetApi'), require('./api/GetTaskStatusApi'), require('./api/GetTokenApi'), require('./api/NotifyTokenUpdatedApi'), require('./api/SearchTokensApi'), require('./api/SuspendApi'), require('./api/TokenizeApi'), require('./api/TransactApi'), require('./api/UnsuspendApi'));
  }
}(function(ApiClient, AccountHolderData, AccountHolderDataOutbound, AssetResponseSchema, AuthenticationMethods, BillingAddress, CardAccountDataInbound, CardAccountDataOutbound, DecisioningData, DeleteRequestSchema, DeleteResponseSchema, EncryptedPayload, EncryptedPayloadTransact, Error, ErrorsResponse, FundingAccountData, FundingAccountInfo, FundingAccountInfoEncryptedPayload, GatewayError, GatewayErrorsResponse, GatewayErrorsSchema, GetTaskStatusRequestSchema, GetTaskStatusResponseSchema, GetTokenRequestSchema, GetTokenResponseSchema, MediaContent, NotifyTokenEncryptedPayload, NotifyTokenUpdatedRequestSchema, NotifyTokenUpdatedResponseSchema, PhoneNumber, ProductConfig, SearchTokensRequestSchema, SearchTokensResponseSchema, SuspendRequestSchema, SuspendResponseSchema, Token, TokenDetail, TokenDetailData, TokenDetailDataGetTokenOnly, TokenDetailDataPAROnly, TokenDetailGetTokenOnly, TokenDetailPAROnly, TokenForGetToken, TokenForLCM, TokenForNTU, TokenInfo, TokenInfoForNTUAndGetToken, TokenizeRequestSchema, TokenizeResponseSchema, TransactEncryptedData, TransactError, TransactRequestSchema, TransactResponseSchema, UnSuspendRequestSchema, UnSuspendResponseSchema, DeleteApi, GetAssetApi, GetTaskStatusApi, GetTokenApi, NotifyTokenUpdatedApi, SearchTokensApi, SuspendApi, TokenizeApi, TransactApi, UnsuspendApi) {
  'use strict';

  /**
   * These_APIs_are_designed_as_RPC_style_stateless_web_services_where_each_API_endpoint_represents_an_operation_to_be_performed___All_request_and_response_payloads_are_sent_in_the_JSON__JavaScript_Object_Notation_data_interchange_format__Each_endpoint_in_the_API_specifies_the_HTTP_Method_used_to_access_it__All_strings_in_request_and_response_objects_are_to_be_UTF_8_encoded___Each_API_URI_includes_the_major_and_minor_version_of_API_that_it_conforms_to___This_will_allow_multiple_concurrent_versions_of_the_API_to_be_deployed_simultaneously_brbrAuthenticationbrbrMastercard_uses_OAuth_1_0a_with_body_hash_extension_for_authenticating_the_API_clients__This_requires_every_request_that_you_send_to__Mastercard_to_be_signed_with_an_RSA_private_key__A_private_public_RSA_key_pair_must_be_generated_consisting_ofbrbr1__A_private_key_for_the_OAuth_signature_for_API_requests__It_is_recommended_to_keep_the_private_key_in_a_password_protected_or_hardware_keystore_br2__A_public_key_is_shared_with_Mastercard_during_the_project_setup_process_through_either_a_certificate_signing_request__CSR_or_the_API_Key_Generator__Mastercard_will_use_the_public_key_to_verify_the_OAuth_signature_that_is_provided_on_every_API_call_brAn_OAUTH1_0a_signer_library_is_available_on__GitHub_https__github_com_Mastercard_oauth1_signer_javabrbrEncryptionbrbrAll_communications_between_Issuer_web_service_and_the_Mastercard_gateway_is_encrypted_using_TLS_brbrAdditional_Encryption_of_Sensitive_DatabrbrIn_addition_to_the_OAuth_authentication_when_using_MDES_Digital_Enablement_Service_any_PCI_sensitive_and_all_account_holder_Personally_Identifiable_Information__PII_data_must_be_encrypted__This_requirement_applies_to_the_API_fields_containing_encryptedData__Sensitive_data_is_encrypted_using_a_symmetric_session__one_time_use_key__The_symmetric_session_key_is_then_wrapped_with_an_RSA_Public_Key_supplied_by_Mastercard_during_API_setup_phase__the_Customer_Encryption_Key__brJava_Client_Encryption_Library_available_on__GitHub_https__github_com_Mastercard_client_encryption_java.<br>
   * The <code>index</code> module provides access to constructors for all the classes which comprise the public API.
   * <p>
   * An AMD (recommended!) or CommonJS application will generally do something equivalent to the following:
   * <pre>
   * var MdesDigitalEnablementApi = require('index'); // See note below*.
   * var xxxSvc = new MdesDigitalEnablementApi.XxxApi(); // Allocate the API class we're going to use.
   * var yyyModel = new MdesDigitalEnablementApi.Yyy(); // Construct a model instance.
   * yyyModel.someProperty = 'someValue';
   * ...
   * var zzz = xxxSvc.doSomething(yyyModel); // Invoke the service.
   * ...
   * </pre>
   * <em>*NOTE: For a top-level AMD script, use require(['index'], function(){...})
   * and put the application logic within the callback function.</em>
   * </p>
   * <p>
   * A non-AMD browser application (discouraged) might do something like this:
   * <pre>
   * var xxxSvc = new MdesDigitalEnablementApi.XxxApi(); // Allocate the API class we're going to use.
   * var yyy = new MdesDigitalEnablementApi.Yyy(); // Construct a model instance.
   * yyyModel.someProperty = 'someValue';
   * ...
   * var zzz = xxxSvc.doSomething(yyyModel); // Invoke the service.
   * ...
   * </pre>
   * </p>
   * @module index
   * @version 1.3.0
   */
  var exports = {
    /**
     * The ApiClient constructor.
     * @property {module:ApiClient}
     */
    ApiClient: ApiClient,
    /**
     * The AccountHolderData model constructor.
     * @property {module:model/AccountHolderData}
     */
    AccountHolderData: AccountHolderData,
    /**
     * The AccountHolderDataOutbound model constructor.
     * @property {module:model/AccountHolderDataOutbound}
     */
    AccountHolderDataOutbound: AccountHolderDataOutbound,
    /**
     * The AssetResponseSchema model constructor.
     * @property {module:model/AssetResponseSchema}
     */
    AssetResponseSchema: AssetResponseSchema,
    /**
     * The AuthenticationMethods model constructor.
     * @property {module:model/AuthenticationMethods}
     */
    AuthenticationMethods: AuthenticationMethods,
    /**
     * The BillingAddress model constructor.
     * @property {module:model/BillingAddress}
     */
    BillingAddress: BillingAddress,
    /**
     * The CardAccountDataInbound model constructor.
     * @property {module:model/CardAccountDataInbound}
     */
    CardAccountDataInbound: CardAccountDataInbound,
    /**
     * The CardAccountDataOutbound model constructor.
     * @property {module:model/CardAccountDataOutbound}
     */
    CardAccountDataOutbound: CardAccountDataOutbound,
    /**
     * The DecisioningData model constructor.
     * @property {module:model/DecisioningData}
     */
    DecisioningData: DecisioningData,
    /**
     * The DeleteRequestSchema model constructor.
     * @property {module:model/DeleteRequestSchema}
     */
    DeleteRequestSchema: DeleteRequestSchema,
    /**
     * The DeleteResponseSchema model constructor.
     * @property {module:model/DeleteResponseSchema}
     */
    DeleteResponseSchema: DeleteResponseSchema,
    /**
     * The EncryptedPayload model constructor.
     * @property {module:model/EncryptedPayload}
     */
    EncryptedPayload: EncryptedPayload,
    /**
     * The EncryptedPayloadTransact model constructor.
     * @property {module:model/EncryptedPayloadTransact}
     */
    EncryptedPayloadTransact: EncryptedPayloadTransact,
    /**
     * The Error model constructor.
     * @property {module:model/Error}
     */
    Error: Error,
    /**
     * The ErrorsResponse model constructor.
     * @property {module:model/ErrorsResponse}
     */
    ErrorsResponse: ErrorsResponse,
    /**
     * The FundingAccountData model constructor.
     * @property {module:model/FundingAccountData}
     */
    FundingAccountData: FundingAccountData,
    /**
     * The FundingAccountInfo model constructor.
     * @property {module:model/FundingAccountInfo}
     */
    FundingAccountInfo: FundingAccountInfo,
    /**
     * The FundingAccountInfoEncryptedPayload model constructor.
     * @property {module:model/FundingAccountInfoEncryptedPayload}
     */
    FundingAccountInfoEncryptedPayload: FundingAccountInfoEncryptedPayload,
    /**
     * The GatewayError model constructor.
     * @property {module:model/GatewayError}
     */
    GatewayError: GatewayError,
    /**
     * The GatewayErrorsResponse model constructor.
     * @property {module:model/GatewayErrorsResponse}
     */
    GatewayErrorsResponse: GatewayErrorsResponse,
    /**
     * The GatewayErrorsSchema model constructor.
     * @property {module:model/GatewayErrorsSchema}
     */
    GatewayErrorsSchema: GatewayErrorsSchema,
    /**
     * The GetTaskStatusRequestSchema model constructor.
     * @property {module:model/GetTaskStatusRequestSchema}
     */
    GetTaskStatusRequestSchema: GetTaskStatusRequestSchema,
    /**
     * The GetTaskStatusResponseSchema model constructor.
     * @property {module:model/GetTaskStatusResponseSchema}
     */
    GetTaskStatusResponseSchema: GetTaskStatusResponseSchema,
    /**
     * The GetTokenRequestSchema model constructor.
     * @property {module:model/GetTokenRequestSchema}
     */
    GetTokenRequestSchema: GetTokenRequestSchema,
    /**
     * The GetTokenResponseSchema model constructor.
     * @property {module:model/GetTokenResponseSchema}
     */
    GetTokenResponseSchema: GetTokenResponseSchema,
    /**
     * The MediaContent model constructor.
     * @property {module:model/MediaContent}
     */
    MediaContent: MediaContent,
    /**
     * The NotifyTokenEncryptedPayload model constructor.
     * @property {module:model/NotifyTokenEncryptedPayload}
     */
    NotifyTokenEncryptedPayload: NotifyTokenEncryptedPayload,
    /**
     * The NotifyTokenUpdatedRequestSchema model constructor.
     * @property {module:model/NotifyTokenUpdatedRequestSchema}
     */
    NotifyTokenUpdatedRequestSchema: NotifyTokenUpdatedRequestSchema,
    /**
     * The NotifyTokenUpdatedResponseSchema model constructor.
     * @property {module:model/NotifyTokenUpdatedResponseSchema}
     */
    NotifyTokenUpdatedResponseSchema: NotifyTokenUpdatedResponseSchema,
    /**
     * The PhoneNumber model constructor.
     * @property {module:model/PhoneNumber}
     */
    PhoneNumber: PhoneNumber,
    /**
     * The ProductConfig model constructor.
     * @property {module:model/ProductConfig}
     */
    ProductConfig: ProductConfig,
    /**
     * The SearchTokensRequestSchema model constructor.
     * @property {module:model/SearchTokensRequestSchema}
     */
    SearchTokensRequestSchema: SearchTokensRequestSchema,
    /**
     * The SearchTokensResponseSchema model constructor.
     * @property {module:model/SearchTokensResponseSchema}
     */
    SearchTokensResponseSchema: SearchTokensResponseSchema,
    /**
     * The SuspendRequestSchema model constructor.
     * @property {module:model/SuspendRequestSchema}
     */
    SuspendRequestSchema: SuspendRequestSchema,
    /**
     * The SuspendResponseSchema model constructor.
     * @property {module:model/SuspendResponseSchema}
     */
    SuspendResponseSchema: SuspendResponseSchema,
    /**
     * The Token model constructor.
     * @property {module:model/Token}
     */
    Token: Token,
    /**
     * The TokenDetail model constructor.
     * @property {module:model/TokenDetail}
     */
    TokenDetail: TokenDetail,
    /**
     * The TokenDetailData model constructor.
     * @property {module:model/TokenDetailData}
     */
    TokenDetailData: TokenDetailData,
    /**
     * The TokenDetailDataGetTokenOnly model constructor.
     * @property {module:model/TokenDetailDataGetTokenOnly}
     */
    TokenDetailDataGetTokenOnly: TokenDetailDataGetTokenOnly,
    /**
     * The TokenDetailDataPAROnly model constructor.
     * @property {module:model/TokenDetailDataPAROnly}
     */
    TokenDetailDataPAROnly: TokenDetailDataPAROnly,
    /**
     * The TokenDetailGetTokenOnly model constructor.
     * @property {module:model/TokenDetailGetTokenOnly}
     */
    TokenDetailGetTokenOnly: TokenDetailGetTokenOnly,
    /**
     * The TokenDetailPAROnly model constructor.
     * @property {module:model/TokenDetailPAROnly}
     */
    TokenDetailPAROnly: TokenDetailPAROnly,
    /**
     * The TokenForGetToken model constructor.
     * @property {module:model/TokenForGetToken}
     */
    TokenForGetToken: TokenForGetToken,
    /**
     * The TokenForLCM model constructor.
     * @property {module:model/TokenForLCM}
     */
    TokenForLCM: TokenForLCM,
    /**
     * The TokenForNTU model constructor.
     * @property {module:model/TokenForNTU}
     */
    TokenForNTU: TokenForNTU,
    /**
     * The TokenInfo model constructor.
     * @property {module:model/TokenInfo}
     */
    TokenInfo: TokenInfo,
    /**
     * The TokenInfoForNTUAndGetToken model constructor.
     * @property {module:model/TokenInfoForNTUAndGetToken}
     */
    TokenInfoForNTUAndGetToken: TokenInfoForNTUAndGetToken,
    /**
     * The TokenizeRequestSchema model constructor.
     * @property {module:model/TokenizeRequestSchema}
     */
    TokenizeRequestSchema: TokenizeRequestSchema,
    /**
     * The TokenizeResponseSchema model constructor.
     * @property {module:model/TokenizeResponseSchema}
     */
    TokenizeResponseSchema: TokenizeResponseSchema,
    /**
     * The TransactEncryptedData model constructor.
     * @property {module:model/TransactEncryptedData}
     */
    TransactEncryptedData: TransactEncryptedData,
    /**
     * The TransactError model constructor.
     * @property {module:model/TransactError}
     */
    TransactError: TransactError,
    /**
     * The TransactRequestSchema model constructor.
     * @property {module:model/TransactRequestSchema}
     */
    TransactRequestSchema: TransactRequestSchema,
    /**
     * The TransactResponseSchema model constructor.
     * @property {module:model/TransactResponseSchema}
     */
    TransactResponseSchema: TransactResponseSchema,
    /**
     * The UnSuspendRequestSchema model constructor.
     * @property {module:model/UnSuspendRequestSchema}
     */
    UnSuspendRequestSchema: UnSuspendRequestSchema,
    /**
     * The UnSuspendResponseSchema model constructor.
     * @property {module:model/UnSuspendResponseSchema}
     */
    UnSuspendResponseSchema: UnSuspendResponseSchema,
    /**
     * The DeleteApi service constructor.
     * @property {module:api/DeleteApi}
     */
    DeleteApi: DeleteApi,
    /**
     * The GetAssetApi service constructor.
     * @property {module:api/GetAssetApi}
     */
    GetAssetApi: GetAssetApi,
    /**
     * The GetTaskStatusApi service constructor.
     * @property {module:api/GetTaskStatusApi}
     */
    GetTaskStatusApi: GetTaskStatusApi,
    /**
     * The GetTokenApi service constructor.
     * @property {module:api/GetTokenApi}
     */
    GetTokenApi: GetTokenApi,
    /**
     * The NotifyTokenUpdatedApi service constructor.
     * @property {module:api/NotifyTokenUpdatedApi}
     */
    NotifyTokenUpdatedApi: NotifyTokenUpdatedApi,
    /**
     * The SearchTokensApi service constructor.
     * @property {module:api/SearchTokensApi}
     */
    SearchTokensApi: SearchTokensApi,
    /**
     * The SuspendApi service constructor.
     * @property {module:api/SuspendApi}
     */
    SuspendApi: SuspendApi,
    /**
     * The TokenizeApi service constructor.
     * @property {module:api/TokenizeApi}
     */
    TokenizeApi: TokenizeApi,
    /**
     * The TransactApi service constructor.
     * @property {module:api/TransactApi}
     */
    TransactApi: TransactApi,
    /**
     * The UnsuspendApi service constructor.
     * @property {module:api/UnsuspendApi}
     */
    UnsuspendApi: UnsuspendApi
  };

  return exports;
}));
