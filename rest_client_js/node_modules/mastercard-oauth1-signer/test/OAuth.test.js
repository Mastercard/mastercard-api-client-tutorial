const assert = require('assert');
const OAuth = require("../src/OAuth");

OAuth.getNonce = () => "uTeLPs6K";
OAuth.getTimestamp = () => "1524771555";
OAuth.signSignatureBaseString = () => "XXX";

describe("OAuth Signer", function() {
	describe("#getAuthorizationHeader()", function() {
		const uri = "HTTPS://SANDBOX.api.mastercard.com/merchantid/v1/merchantid?MerchantId=GOOGLE%20LTD%20ADWORDS%20%28CC%40GOOGLE.COM%29&Type=ExactMatch&Format=JSON";
		const method = "GET";
		const consumerKey = "aaa!aaa";
		const signingKey = "XXX";

		it("Creates a valid OAuth1.0a signature with a body hash when payload is present", function() {
			const header = OAuth.getAuthorizationHeader(uri, method, null, consumerKey, signingKey);
			assert.equal(header, `OAuth oauth_consumer_key="aaa!aaa",oauth_nonce="uTeLPs6K",oauth_signature_method="RSA-SHA256",oauth_timestamp="1524771555",oauth_version="1.0",oauth_signature="XXX"`);
		});
	});
});
