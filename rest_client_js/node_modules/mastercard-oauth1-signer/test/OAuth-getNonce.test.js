const assert = require("assert");
const OAuth = require("../src/OAuth");
const getNonce = require("../src/OAuth").getNonce;

describe("OAuth Signer", function() {
	describe("#getNonce()", function() {
		const NONCE_LENGTH = 8;
		const VALID_CHARS = new RegExp(`^[a-zA-Z0-9]+$`);
		const nonce = getNonce();

		it("Creates a UUID with dashes removed", function() {
			assert.equal(nonce.length, NONCE_LENGTH);
			assert.equal(VALID_CHARS.test(nonce), true);
		});
	});
});
