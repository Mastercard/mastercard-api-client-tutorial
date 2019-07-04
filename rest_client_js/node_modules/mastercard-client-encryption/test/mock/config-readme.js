module.exports = {
  paths: [
    {
      path: "/resource",
      toEncrypt: [
        {
          element: "path.to.encryptedData",
          obj: "path.to"
        }],
      toDecrypt: [
        {
          element: "path.to.encryptedFoo",
          obj: "path.to.foo"
        }
      ]
    }
  ],
  oaepPaddingDigestAlgorithm: 'SHA-512',
  ivFieldName: 'iv',
  encryptedKeyFieldName: 'encryptedKey',
  encryptedValueFieldName: 'encryptedData',
  oaepHashingAlgorithmFieldName: 'oaepHashingAlgorithm',
  publicKeyFingerprintFieldName: 'publicKeyFingerprint',
  publicKeyFingerprintType: 'certificate',
  dataEncoding: 'hex',
  encryptionCertificate: "./test/res/test_certificate.cert",
  privateKey: "./test/res/test_key.der"

};
