const assert = require("assert");
const OAuth = require("../src/OAuth");
const getAuthorizationString = require("../src/OAuth").getAuthorizationString;

OAuth.getNonce = () => "uTeLPs6K";
OAuth.getTimestamp = () => "1524771555";

const consumerKey = "aaa!aaa";
const oauthParams = OAuth.getOAuthParams(consumerKey);
const authorizationString = getAuthorizationString(oauthParams);

describe("OAuth Signer", function() {
	describe("#getAuthorizationString()", function() {
		it("Creates a correctly formatted header", function() {
			assert.equal(authorizationString, `OAuth oauth_consumer_key="aaa!aaa",oauth_nonce="uTeLPs6K",oauth_signature_method="RSA-SHA256",oauth_timestamp="1524771555",oauth_version="1.0"`);
		});
	});
});
