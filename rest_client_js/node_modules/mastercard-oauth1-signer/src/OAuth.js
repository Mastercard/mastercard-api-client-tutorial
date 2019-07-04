const crypto = require("crypto");
const url = require("url");

const EMPTY_STRING = "";
const SHA_BITS = "256";

class OAuth {
	/**
	 * Creates a Mastercard API compliant OAuth Authorization header
	 *
	 * @param {String} uri Target URI for this request
	 * @param {String} method HTTP method of the request
	 * @param {Any} payload Payload (nullable)
	 * @param {String} consumerKey Consumer key set up in a Mastercard Developer Portal project
	 * @param {String} signingKey The private key that will be used for signing the request that corresponds to the consumerKey
	 * @return {String} Valid OAuth1.0a signature with a body hash when payload is present
	 */

	static getAuthorizationHeader(uri, method, payload, consumerKey, signingKey) {
		const queryParams = this.extractQueryParams(uri);
		const oauthParams = this.getOAuthParams(consumerKey, payload);

		// Combine query and oauth_ parameters into lexicographically sorted string
		const paramString = this.toOAuthParamString(queryParams, oauthParams);

		// Normalized URI without query params and fragment
		const baseUri = this.getBaseUriString(uri);

		// Signature base string
		const sbs = this.getSignatureBaseString(method, baseUri, paramString);

		// Signature
		const signature = this.signSignatureBaseString(sbs, signingKey);
		const encodedSignature = encodeURIComponent(signature);
		oauthParams.set("oauth_signature", encodedSignature);

		// Return
		return this.getAuthorizationString(oauthParams);
	}
}
module.exports = OAuth;

/**
 * Parse query parameters out of the URL.
 * https://tools.ietf.org/html/rfc5849#section-3.4.1.3
 *
 * @param {String} uri URL containing all query parameters that need to be signed
 * @return {Map<String, Set<String>} Sorted map of query parameter key/value pairs. Values for parameters with the same name are added into a list.
 */
OAuth.extractQueryParams = function extractQueryParams(uri) {
	uri = url.parse(uri);
	const queryParams = uri.query;

	if (!queryParams) {
		return new Map();
	}

	const queryPairs = new Map();
	const pairs = queryParams
		.split("&")
		.sort((a, b) => a.toLowerCase().localeCompare(b.toLowerCase()));

	for(let pair of pairs) {
		const idx = pair.indexOf("=");
		let key = idx > 0 ? pair.substring(0, idx) : pair;
		if(!queryPairs.has(key)) {
			queryPairs.set(key, new Set());
		}
		let value = idx > 0 && pair.length > idx + 1 ? pair.substring(idx + 1) : EMPTY_STRING;
		queryPairs.get(key).add(value);
	}

	return queryPairs;
};

/**
 * Constructs a valid Authorization header as per
 * https://tools.ietf.org/html/rfc5849#section-3.5.1
 *
 * @param {Map<String, String>} oauthParams Map of OAuth parameters to be included in the Authorization header
 * @return {String} Correctly formatted header
 */
OAuth.getAuthorizationString = function getAuthorizationString(oauthParams) {
	let header = "OAuth ";
	for (const entry of oauthParams) {
		const entryKey = entry[0];
		const entryVal = entry[1];
		header = `${header}${entryKey}="${entryVal}",`;
	}
	// Remove trailing ,
	header = header.slice(0, header.length - 1);
	return header;
};

/**
 * Normalizes the URL as per
 * https://tools.ietf.org/html/rfc5849#section-3.4.1.2
 *
 * @param {String} uri URL that will be called as part of this request
 * @return {String} Normalized URL
 */
OAuth.getBaseUriString = function getBaseUriString(uri) {
	const uriAsUrl = url.parse(uri);
	// Lowercase scheme and authority
	const protocol = uriAsUrl.protocol.toLowerCase();
	const hostname = uriAsUrl.hostname.toLowerCase();
	const pathname = uriAsUrl.pathname;

	// Remove query and fragment
	let baseUri=`${protocol}//${hostname}`;
	const hasNonStandardPort = (
		uriAsUrl.port !== undefined &&
		uriAsUrl.port !== null &&
		uriAsUrl.port!==443 &&
		uriAsUrl.port!==80
	);
	if(hasNonStandardPort) {
		baseUri = `${baseUri}:${uriAsUrl.port}`
	}
	baseUri = `${baseUri}${pathname}`;

	return baseUri;
};

/**
 * Generates a hash based on request payload as per
 * https://tools.ietf.org/id/draft-eaton-oauth-bodyhash-00.html
 *
 * @param {Any} payload Request payload
 * @return {String} Base64 encoded cryptographic hash of the given payload
 */
OAuth.getBodyHash = function getBodyHash(payload) {
	const bodyHash = crypto.createHash(`sha${SHA_BITS}`);
	bodyHash.update(payload, "utf8");
	return bodyHash.digest("base64");
};

/**
 * Generates a random string for replay protection as per
 * https://tools.ietf.org/html/rfc5849#section-3.3
 *
 * @return {String} UUID with dashes removed
 */
OAuth.getNonce = function getNonce() {
	const NONCE_LENGTH = 8;
	const VALID_CHARS = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

	const bytes = crypto.randomBytes(NONCE_LENGTH);
	const value = new Array(NONCE_LENGTH).fill(0);

	return value.reduce((acc, val, i) => {
		acc.push(VALID_CHARS[bytes[i] % VALID_CHARS.length]);
		return acc;
	}, []).join("");
};

/**
 * @param {String} consumerKey Consumer key set up in a Mastercard Developer Portal project
 * @param {Any} payload Payload (nullable)
 * @return {Map}
 */
OAuth.getOAuthParams = function getOAuthParams(consumerKey, payload) {
	const oauthParams = new Map();
	if (payload) oauthParams.set("oauth_body_hash", OAuth.getBodyHash(payload));
	oauthParams.set("oauth_consumer_key", consumerKey);
	oauthParams.set("oauth_nonce", OAuth.getNonce());
	oauthParams.set("oauth_signature_method", `RSA-SHA${SHA_BITS}`);
	oauthParams.set("oauth_timestamp", OAuth.getTimestamp());
	oauthParams.set("oauth_version", "1.0");
	return oauthParams;
};

/**
 * Generate a valid signature base string as per
 * https://tools.ietf.org/html/rfc5849#section-3.4.1
 *
 * @param {String} httpMethod HTTP method of the request
 * @param {String} baseUri Base URI that conforms with https://tools.ietf.org/html/rfc5849#section-3.4.1.2
 * @param {String} paramString OAuth parameter string that conforms with https://tools.ietf.org/html/rfc5849#section-3.4.1.3
 * @return {String} A correctly constructed and escaped signature base string
 */
OAuth.getSignatureBaseString = function getSignatureBaseString(httpMethod, baseUri, paramString) {
	const sbs =
		// Uppercase HTTP method
		`${httpMethod.toUpperCase()}&` +
		// Base URI
		`${encodeURIComponent(baseUri)}&` +
		// OAuth parameter string
		`${encodeURIComponent(paramString)}`;

	return sbs.replace(/!/, "%21");
};

/**
 * Returns UNIX Timestamp as required per
 * https://tools.ietf.org/html/rfc5849#section-3.3
 *
 * @return {String} UNIX timestamp (UTC)
 */
OAuth.getTimestamp = function getTimestamp() {
	return Math.floor(Date.now() / 1000);
};

/**
 * Signs the signature base string using an RSA private key. The methodology is described at
 * https://tools.ietf.org/html/rfc5849#section-3.4.3 but Mastercard uses the stronger SHA-256 algorithm
 * as a replacement for the described SHA1 which is no longer considered secure.
 *
 * @param {String} sbs Signature base string formatted as per https://tools.ietf.org/html/rfc5849#section-3.4.1
 * @param {String} signingKey Private key of the RSA key pair that was established with the service provider
 * @return {String} RSA signature matching the contents of signature base string
 */
OAuth.signSignatureBaseString = function signSignatureBaseString(sbs, signingKey) {
	let signer = crypto.createSign("RSA-SHA256");
	signer = signer.update(new Buffer(sbs));

	let signature;
	try {
		signature = signer.sign(signingKey, "base64");
	} catch (e) {
		throw new Error("Unable to sign the signature base string.");
	}

	return signature;
};

/**
 * Lexicographically sort all parameters and concatenate them into a string as per
 * https://tools.ietf.org/html/rfc5849#section-3.4.1.3.2
 *
 * @param {Map<String, Set<String>>} queryParamsMap Map of all oauth parameters that need to be signed
 * @param {Map<String, String>} oauthParamsMap Map of OAuth parameters to be included in Authorization header
 * @return {String} Correctly encoded and sorted OAuth parameter string
 */
OAuth.toOAuthParamString = function toOAuthParamString(queryParamsMap, oauthParamsMap) {
	const consolidatedParams = new Map(queryParamsMap);

	// Add OAuth params to consolidated params map
	for (const entry of oauthParamsMap) {
		const entryKey = entry[0];
		const entryValue = entry[1];

		if (consolidatedParams.has(entryKey)) {
			consolidatedParams.get(entryKey).add(entryValue);
		} else {
			consolidatedParams.set(entryKey, new Set().add(entryValue));
		}
	}

	let consolidatedParamsAsc = new Map([...consolidatedParams.entries()].sort());
	let allParams = "";

	// Add all parameters to the parameter string for signing
	for (const entry of consolidatedParamsAsc) {
		const entryKey = entry[0];
		let entryValues = entry[1];

		// Keys with same name are sorted by their values
		if (entryValues.size > 1) {
			entryValues = new Set(Array.from(entryValues).sort());
		}

		for (const entryValue of entryValues) {
			allParams = `${allParams}${entryKey}=${entryValue}&`;
		}
	}

	// Remove trailing ampersand
	const stringLength = allParams.length - 1;
	if (allParams.endsWith("&")) {
		allParams = allParams.slice(0, stringLength);
	}

	return allParams;
};
