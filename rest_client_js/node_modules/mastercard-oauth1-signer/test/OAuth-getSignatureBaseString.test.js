const assert = require("assert");
const OAuth = require("../src/OAuth");
const getSignatureBaseString = require("../src/OAuth").getSignatureBaseString;
const toOauthParamString = require("../src/OAuth").toOAuthParamString;
const extractQueryParams = require("../src/OAuth").extractQueryParams;

describe("OAuth Signer", function() {
	describe("#getSignatureBaseString()", function() {
		it("Creates a correctly constructed and escaped signature base string", function() {
			const httpMethod = "GET";
			const baseUri = "https://sandbox.api.mastercard.com/merchantid/v1/merchantid";
			const paramString = "Format=JSON&Format=XML&MerchantId=GOOGLE%20LTD%20ADWORDS%20CC%40GOOGLE.COM&Type=ExactMatch&oauth_consumer_key=aaa!aaa&oauth_nonce=uTeLPs6K&oauth_signature_method=RSA-SHA256&oauth_timestamp=1524771555&oauth_version=1.0";
			const sbs = getSignatureBaseString(httpMethod, baseUri, paramString);

			assert.deepEqual(sbs, "GET&https%3A%2F%2Fsandbox.api.mastercard.com%2Fmerchantid%2Fv1%2Fmerchantid&Format%3DJSON%26Format%3DXML%26MerchantId%3DGOOGLE%2520LTD%2520ADWORDS%2520CC%2540GOOGLE.COM%26Type%3DExactMatch%26oauth_consumer_key%3Daaa%21aaa%26oauth_nonce%3DuTeLPs6K%26oauth_signature_method%3DRSA-SHA256%26oauth_timestamp%3D1524771555%26oauth_version%3D1.0");
		});

		it("Should create expected base string when query params are encoded", function() {
			const encodedUri = "https://example.com/?param=token1%3Atoken2";
			const encodedParams = extractQueryParams(encodedUri);
			const paramString = toOauthParamString(encodedParams, new Map());
			const baseString = getSignatureBaseString("GET", "https://example.com", paramString);

			assert.deepEqual("GET&https%3A%2F%2Fexample.com&param%3Dtoken1%253Atoken2", baseString);
		});

		it("Should create expected base string when query params are not encoded", function() {

			const nonEncodedUri = "https://example.com/?param=token1:token2";
			const nonEncodedParams = extractQueryParams(nonEncodedUri);
			const paramString = toOauthParamString(nonEncodedParams, new Map());
			const baseString = getSignatureBaseString("GET", "https://example.com", paramString);

			assert.deepEqual("GET&https%3A%2F%2Fexample.com&param%3Dtoken1%3Atoken2", baseString);
		});
	});
});
