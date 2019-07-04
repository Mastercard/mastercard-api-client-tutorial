const Crypto = require('../crypto/crypto');
const utils = require('../utils/utils');

/**
 * @class
 * Performs field level encryption on HTTP payloads.
 *
 * @module fle/FieldLevelEncryption
 * @version 1.0.0
 */
function FieldLevelEncryption(config) {
  this.encrypt = encrypt;
  this.decrypt = decrypt;
  this.config = config;
  this.crypto = new Crypto(config);
  this.isWithHeader = config.hasOwnProperty("ivHeaderName") && config.hasOwnProperty("encryptedKeyHeaderName");
  this.encryptionResponseProperties = [this.config.ivFieldName, this.config.encryptedKeyFieldName,
    this.config.publicKeyFingerprintFieldName, this.config.oaepHashingAlgorithmFieldName];
}

/**
 * @private
 */
function hasConfig(config, endpoint) {
  if (config && endpoint) {
    endpoint = endpoint.split("?").shift();
    let conf = config.paths.find((elem) => {
        // TODO grep from last index
        let regex = new RegExp(elem.path, "g");
        return endpoint.match(regex);
      }
    );
    return (conf) ? conf : null;
  }
  return null;
}

/**
 * @private
 */
function elemFromPath(path, obj) {
  try {
    let parent = null;
    let paths = path.split(".");
    if (path && paths.length > 0) {
      paths.forEach((e) => {
          parent = obj;
          obj = obj[e];
        }
      );
    }
    return {
      node: obj,
      parent: parent
    };
  } catch (e) {
    return null;
  }
}

/**
 * Set encrpytion header parameters
 *
 * @param header HTTP header
 * @param params Encryption parameters
 */
function setHeader(header, params) {
  header[this.config.encryptedKeyHeaderName] = params.encoded.encryptedKey;
  header[this.config.ivHeaderName] = params.encoded.iv;
  header[this.config.oaepHashingAlgorithmHeaderName] = params.oaepHashingAlgorithm.replace("-", "");
  header[this.config.publicKeyFingerprintHeaderName] = params.publicKeyFingerprint;
}


/**
 * Encrypt parts of a HTTP request using the given config
 *
 * @param endpoint HTTP URL for the current call
 * @param header HTTP Header
 * @param body HTTP Body
 * @returns {{header: *, body: *}}
 */
function encrypt(endpoint, header, body) {
  const fleConfig = hasConfig(this.config, endpoint);
  if (fleConfig) {
    if (!this.isWithHeader) {
      fleConfig.toEncrypt.forEach((v) => {
        encryptBody.call(this, v, body);
      });
    } else {
      let encParams = this.crypto.newEncryptionParams({});
      fleConfig.toEncrypt.forEach((v) => {
        body = encryptWithHeader.call(this, encParams, v, body);
      });
      setHeader.call(this, header, encParams);
    }
  }
  return {
    header: header,
    body: body
  };
}

/**
 * Decrypt part of the HTTP response using the given config
 *
 * @public
 * @param response HTTP response to decrypt
 * @returns {*}
 */
function decrypt(response) {
  const body = response.body;
  const fleConfig = hasConfig(this.config, response.request.url);
  if (fleConfig) {
    if (!this.isWithHeader) {
      fleConfig.toDecrypt.forEach((v) => {
        decryptBody.call(this, v, body);
      });
    } else {
      fleConfig.toDecrypt.forEach((v) => {
        decryptWithHeader.call(this, v, body, response);
      });
    }
  }
  return body;
}

/**
 * Encrypt body nodes inplace with given path
 *
 * @private
 * @param path Config json path
 * @param body Body to encrypt
 */
function encryptBody(path, body) {
  let elem = elemFromPath(path.element, body);
  let encryptedData = this.crypto.encryptData({data: elem.node});
  utils.mutateObjectProperty(path.obj,
    encryptedData,
    body);
  // delete encrypted field if not overridden
  if (path.element !== path.obj + "." + this.config.encryptedValueFieldName) {
    utils.deleteNode(path.element, body);
  }
}

/**
 * Encrypt body nodes inplace with given path, without setting crypto info in the body
 *
 * @private
 * @param encParams encoding params to use
 * @param path Config json path
 * @param body body to encrypt
 * @returns {Object} Encrypted body
 */
function encryptWithHeader(encParams, path, body) {
  let elem = elemFromPath(path.element, body).node;
  let encrypted = this.crypto.encryptData({data: elem}, encParams);
  return {[path.obj]: {[this.config.encryptedValueFieldName]: encrypted[this.config.encryptedValueFieldName]}};
}

/**
 * Decrypt body nodes inplace with given path
 *
 * @private
 * @param path Config json path
 * @param body encrypted body
 */
function decryptBody(path, body) {
  const elem = elemFromPath(path.element, body);
  if (elem && elem.node) {
    let decryptedObj = this.crypto.decryptData(
      elem.node[this.config.encryptedValueFieldName], // encrypted data
      elem.node[this.config.ivFieldName], // iv field
      elem.node[this.config.oaepHashingAlgorithmFieldName], // oaepHashingAlgorithm
      elem.node[this.config.encryptedKeyFieldName] // encryptedKey
    );
    utils.mutateObjectProperty(path.obj, decryptedObj, body, path.element, this.encryptionResponseProperties);
  }
}

/**
 * Decrypt body nodes inplace with given path, getting crypto info from the header
 *
 * @private
 * @param path Config json path
 * @param body encrypted body
 * @param response Response with header to update
 */
function decryptWithHeader(path, body, response) {
  const elemEncryptedNode = elemFromPath(path.obj, body);
  if (elemEncryptedNode.node[path.element]) {
    const encryptedData = elemEncryptedNode.node[path.element][this.config.encryptedValueFieldName];
    for (let k in body) {
      // noinspection JSUnfilteredForInLoop
      delete body[k];
    }
    Object.assign(body, this.crypto.decryptData(
      encryptedData,
      response.header[this.config.ivHeaderName],
      response.header[this.config.oaepHashingAlgorithmHeaderName],
      response.header[this.config.encryptedKeyHeaderName]
    ));
  }
}

module.exports = FieldLevelEncryption;
