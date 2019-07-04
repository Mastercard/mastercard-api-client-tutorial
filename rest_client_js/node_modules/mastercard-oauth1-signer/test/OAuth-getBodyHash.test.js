const assert = require("assert");
const OAuth = require("../src/OAuth");
const getBodyHash = require("../src/OAuth").getBodyHash;

describe("OAuth Signer", function() {
	describe("#getBodyHash()", function() {
		const myPayload = `{ my: "payload" }`;
		const bodyHash = getBodyHash(myPayload);

		it("Creates a base64 encoded cryptographic hash of the given payload", function() {
			assert.equal(bodyHash, "Qm/nLCqwlog0uoCDvypgninzNQ25YHgTmUDl/zOgT1s=");
		});
	});
});
