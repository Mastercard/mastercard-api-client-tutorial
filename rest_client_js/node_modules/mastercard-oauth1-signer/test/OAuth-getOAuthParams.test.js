const assert = require("assert");
const OAuth = require("../src/OAuth");
const getOAuthParams = require("../src/OAuth").getOAuthParams;

describe("OAuth Signer", function() {
	describe("#getOAuthParams()", function() {
		
		const consumerKey = "aaa!aaa";
		const myPayload = `{ my: "payload" }`;

		it("Creates a Map with ordered OAuth parameters", function() {
			const oauthParams = getOAuthParams(consumerKey);
			const mapKeysArray = Array.from(oauthParams.keys());
			const paramsArr = [
				"oauth_consumer_key",
				"oauth_nonce",
				"oauth_signature_method",
				"oauth_timestamp",
				"oauth_version"
			];
			assert.deepEqual(mapKeysArray, paramsArr);
		});

		it("Creates a Map with ordered OAuth parameters (with payload)", function() {
			const oauthParams = getOAuthParams(consumerKey, myPayload);
			const mapKeysArray = Array.from(oauthParams.keys());
			const paramsArr = [
				"oauth_body_hash",
				"oauth_consumer_key",
				"oauth_nonce",
				"oauth_signature_method",
				"oauth_timestamp",
				"oauth_version"
			];
			assert.deepEqual(mapKeysArray, paramsArr);
		});
	});
});
