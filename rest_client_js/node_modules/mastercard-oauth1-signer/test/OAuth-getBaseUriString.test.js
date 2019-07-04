const assert = require("assert");
const OAuth = require("../src/OAuth");
const getBaseUriString = require("../src/OAuth").getBaseUriString;

describe("OAuth Signer", function() {
	describe("#getBaseUriString()", function() {
		const href="HTTPS://SANDBOX.api.mastercard.com/merchantid/v1/merchantid?MerchantId=GOOGLE%20LTD%20ADWORDS%20%28CC%40GOOGLE.COM%29&Format=XML&Type=ExactMatch&Format=JSON";
		const baseUri = getBaseUriString(href);

		it("Creates a normalized URL", function() {
			assert.equal(baseUri, "https://sandbox.api.mastercard.com/merchantid/v1/merchantid");
		});
	});
});
