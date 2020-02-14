/* eslint-disable no-undef */

/**
 * Mock out a global mediawiki object for use in unit tests
 * Adapted from:
 * https://github.com/wikimedia/mw-node-qunit/blob/master/src/mockMediaWiki.js
 *
 * The basic Jest mock functions here can be overridden with more specific
 * behavior as needed in individual test files.
 */
var mw;

// Mock API (instances created ggwith new mw.Api() )
function Api() {}
Api.prototype.get = jest.fn().mockResolvedValue( {} );
Api.prototype.post = jest.fn().mockResolvedValue( {} );
Api.prototype.getToken = jest.fn().mockResolvedValue( {} );
Api.prototype.postWithToken = jest.fn().mockResolvedValue( {} );

// Mock MW object
mw = {
	Api: Api,
	RegExp: {
		escape: jest.fn()
	},
	Title: {
		newFromText: jest.fn(),
		makeTitle: jest.fn()
	},
	Uri: jest.fn(),
	config: {
		get: jest.fn()
	},
	confirmCloseWindow: jest.fn(),
	hook: jest.fn().mockReturnValue( {
		fire: jest.fn()
	} ),
	experiments: {
		getBucket: jest.fn()
	},
	html: {
		escape: function ( str ) {
			return str.replace( /['"<>&]/g, function ( char ) {
				switch ( char ) {
					case '\'': return '&#039;';
					case '"': return '&quot;';
					case '<': return '&lt;';
					case '>': return '&gt;';
					case '&': return '&amp;';
				}
			} );
		}
	},
	jqueryMsg: {
		parser: jest.fn()
	},
	language: {
		convertNumber: jest.fn(),
		getData: jest.fn().mockReturnValue( {} )
	},
	log: {
		deprecate: jest.fn(),
		warn: jest.fn()
	},
	message: jest.fn().mockReturnValue( {
		text: jest.fn(),
		parse: jest.fn()
	} ),
	msg: jest.fn(),
	now: Date.now.bind( Date ),
	template: {
		get: jest.fn().mockReturnValue( {
			render: jest.fn()
		} )
	},
	user: {
		tokens: {
			get: jest.fn()
		},
		options: {
			get: jest.fn()
		},
		isAnon: jest.fn(),
		generateRandomSessionId: function () { return Math.random().toString(); }
	},
	trackSubscribe: jest.fn(),
	track: jest.fn(),
	util: {
		getParamValue: jest.fn(),
		getUrl: jest.fn()
	},
	loader: {
		load: jest.fn(),
		using: jest.fn(),
		require: jest.fn()
	},
	requestIdleCallback: jest.fn(),
	storage: {
		get: jest.fn(),
		set: jest.fn(),
		remove: jest.fn()
	},
	notify: jest.fn()
};

global.mw = mw;
