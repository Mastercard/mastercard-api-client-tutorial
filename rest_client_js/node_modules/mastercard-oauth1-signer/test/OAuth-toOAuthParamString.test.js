const assert = require("assert");
const OAuth = require("../src/OAuth");
const toOAuthParamString = require("../src/OAuth").toOAuthParamString;

OAuth.getNonce = () => "uTeLPs6K";
OAuth.getTimestamp = () => "1524771555";

describe("OAuth Signer", function() {
	describe("#toOAuthParamString()", function() {

		it("Should support the RFC example", function() {
			const queryParams = new Map();
			queryParams.set("b5", new Set([ "%3D%253D" ]));
			queryParams.set("a3", new Set([ "a", "2%20q" ]));
			queryParams.set("c%40", new Set([ "" ]));
			queryParams.set("a2", new Set([ "r%20b" ]));
			queryParams.set("c2", new Set([ "" ]));
			const oauthParams = new Map();
			oauthParams.set("oauth_consumer_key", "9djdj82h48djs9d2");
			oauthParams.set("oauth_token", "kkk9d7dh3k39sjv7");
			oauthParams.set("oauth_signature_method", "HMAC-SHA1");
			oauthParams.set("oauth_timestamp", "137131201");
			oauthParams.set("oauth_nonce", "7d8f3e4a");
			const paramString = toOAuthParamString(queryParams, oauthParams);
			assert.equal(paramString, "a2=r%20b&a3=2%20q&a3=a&b5=%3D%253D&c%40=&c2=&oauth_consumer_key=9djdj82h48djs9d2&oauth_nonce=7d8f3e4a&oauth_signature_method=HMAC-SHA1&oauth_timestamp=137131201&oauth_token=kkk9d7dh3k39sjv7");
		});

		it("Should use ascending byte value ordering", function() {
			const queryParams = new Map();
			queryParams.set("b", new Set("b"));
			queryParams.set("A", new Set(["a", "A" ]));
			queryParams.set("B", new Set("B"));
			queryParams.set("a", new Set([ "A", "a" ]));
			queryParams.set("0", new Set("0"));
			const oauthParams = new Map();
			const paramString = toOAuthParamString(queryParams, oauthParams);
			assert.equal(paramString, "0=0&A=A&A=a&B=B&a=A&a=a&b=b");
		});
	});
});
