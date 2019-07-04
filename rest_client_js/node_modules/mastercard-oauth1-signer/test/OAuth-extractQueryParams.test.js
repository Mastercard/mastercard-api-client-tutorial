const assert = require("assert");
const extractQueryParams = require("../src/OAuth").extractQueryParams;

describe("OAuth Signer", function() {
	describe("#extractQueryParams()", function() {
		const href="https://sandbox.api.mastercard.com/merchantid/v1/merchantid?MerchantId=GOOGLE%20LTD%20ADWORDS%20%28CC%40GOOGLE.COM%29&Format=XML&Type=ExactMatch&Format=JSON&EmptyVal=";
		const queryParams = extractQueryParams(href);

		it("Should return a Map", function() {
			assert.equal(queryParams instanceof Map, true);
		});

		it("Query parameter keys should be sorted", function() {
			const mapKeysArray = Array.from(queryParams.keys());
			assert.deepEqual(mapKeysArray, ["EmptyVal", "Format", "MerchantId", "Type"]);
		});

		it("Query parameter values should be sorted. Parameters should support duplicate keys", function() {
			// Format
			const valuesFormat = queryParams.get("Format");
			const valuesFormatArray = Array.from(valuesFormat.values());
			assert.equal(valuesFormat instanceof Set, true);
			assert.equal(valuesFormat.size, 2);
			assert.deepEqual(valuesFormatArray, ["JSON", "XML"]);

			// MerchantId
			const valuesMerchantId = queryParams.get("MerchantId");
			const valuesMerchantIdArray = Array.from(valuesMerchantId.values());
			assert.equal(valuesMerchantId instanceof Set, true);
			assert.equal(valuesMerchantId.size, 1);
			assert.deepEqual(valuesMerchantIdArray, ["GOOGLE%20LTD%20ADWORDS%20%28CC%40GOOGLE.COM%29"]);

			// Type
			const valuesType = queryParams.get("Type");
			const valuesTypeArray = Array.from(valuesType.values());
			assert.equal(valuesType instanceof Set, true);
			assert.equal(valuesType.size, 1);
			assert.deepEqual(valuesTypeArray, ["ExactMatch"]);
		});

		it("Query should support empty parameters", function() {
			// Blank Value
			const emptyVal = queryParams.get("EmptyVal");
			const emptyValArray = Array.from(emptyVal.values());
			assert.deepEqual(emptyValArray, [""])
		});

		it("Should support RFC Example", function () {
			const rfcHref = "https://example.com/request?b5=%3D%253D&a3=a&c%40=&a2=r%20b";
			const rfcQueryParams = extractQueryParams(rfcHref);

			assert.equal(4, rfcQueryParams.size);

			assert.deepEqual(Array.from(rfcQueryParams.get("b5").values()), ["%3D%253D"]);
			assert.deepEqual(Array.from(rfcQueryParams.get("a3").values()), ["a"]);
			assert.deepEqual(Array.from(rfcQueryParams.get("c%40").values()), [""]);
			assert.deepEqual(Array.from(rfcQueryParams.get("a2").values()), ["r%20b"]);
		});

		it("Should not encode params when URI created from string with non-encoded params", function() {
			const nonEncodedUri = "https://example.com/request?colon=:&plus=+&comma=,";

			const nonEncodedParams = extractQueryParams(nonEncodedUri);

			assert.equal(3, nonEncodedParams.size);

			assert.deepEqual([":"], Array.from(nonEncodedParams.get("colon").values()));
			assert.deepEqual(["+"], Array.from(nonEncodedParams.get("plus").values()));
			assert.deepEqual([","], Array.from(nonEncodedParams.get("comma").values()));
		});

		it("Should encode params when URI created from string with encoded params", function() {
			const encodedUri = "https://example.com/request?colon=%3A&plus=%2B&comma=%2C";

			const encodedParams = extractQueryParams(encodedUri);

			assert.equal(3, encodedParams.size);

			assert.deepEqual(["%3A"], Array.from(encodedParams.get("colon").values()));
			assert.deepEqual(["%2B"], Array.from(encodedParams.get("plus").values()));
			assert.deepEqual(["%2C"], Array.from(encodedParams.get("comma").values()));
		});
	});
});
