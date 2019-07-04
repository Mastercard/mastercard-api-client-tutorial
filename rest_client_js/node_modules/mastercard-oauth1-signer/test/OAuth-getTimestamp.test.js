const assert = require("assert");
const OAuth = require("../src/OAuth");
const getTimestamp = require("../src/OAuth").getTimestamp;

describe("OAuth Signer", function() {
	describe("#getTimestamp()", function() {
		it("Creates a UNIX timestamp (UTC)", function() {
			const timestamp = getTimestamp();
			assert.equal(typeof timestamp, "string");
			assert.equal(parseInt(timestamp) > 0, true);
		});
	});
});
