/* eslint-disable no-irregular-whitespace */
'use strict';

/**
 * This is a basic example of a Vue plugin. Plugins add global functionality to
 * Vue. This can be done in several ways: adding global methods or properties,
 * adding custom directives that can be used in templates ("v-whatever"),
 * adding component options via global mixin, and adding instance methods to
 * all Vue components.
 *
 * More information about Vue plugins is available here:
 * https://vuejs.org/v2/guide/plugins.html
 */
var apiPlugin = {
	/**
	 * @param {Object} Vue constructor
	 * @param {Object} options
	 */
	install: function ( Vue, options ) {
		options = options || {};

		// Create a mediawiki API object with appropriate options and stash it
		// as a global property
		Vue.api = new mw.Api( options );

		// Add a global instance property for use within individual components.
		// Every component now has the ability to call `this.$api.get`,
		// `this.$api.post`, etc.
		Vue.prototype.$api = Vue.api;
	}
};

module.exports = apiPlugin;
