module.exports = {
  paths: [
    {
      path: "/resource",
      toEncrypt: [
        {
          element: "elem1.encryptedData",
          obj: "elem1"
        }],
      toDecrypt: [
        {
          element: "foo.elem1",
          obj: "foo"
        }
      ]
    },
    {
      path: "/mappings/*",
      toEncrypt: [
        {
          element: "elem2.encryptedData",
          obj: "elem2"
        }],
      toDecrypt: [
        {
          element: "foo.elem1",
          obj: "foo"
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
