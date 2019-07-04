module.exports = {
  paths: [
    {
      path: "/resource",
      toEncrypt: [
        {
          element: "",
          obj: "encrypted_payload"
        }],
      toDecrypt: [
        {
          element: "encrypted_payload",
          obj: ""
        }
      ]
    }
  ],
  oaepPaddingDigestAlgorithm: 'SHA-512',

  ivHeaderName: 'x-iv',
  encryptedKeyHeaderName: 'x-encrypted-key',
  oaepHashingAlgorithmHeaderName: 'x-oaep-hashing-algorithm',
  publicKeyFingerprintHeaderName: 'x-public-key-fingerprint',
  publicKeyFingerprintType: 'certificate',
  encryptedValueFieldName: 'data',
  dataEncoding: 'hex',
  encryptionCertificate: "./test/res/test_certificate.cert",
  privateKey: "./test/res/test_key.der"

};
