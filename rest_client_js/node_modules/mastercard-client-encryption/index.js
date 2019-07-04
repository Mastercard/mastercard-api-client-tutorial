'use strict';

/**
 * Expose the MC-Api Service
 * @see {module:mcapi/Service}
 */
module.exports = {
  Service: require('./lib/mcapi/mcapi-service'),
  FieldLevelEncryption: require('./lib/mcapi/mcapi-service').FieldLevelEncryption
};
