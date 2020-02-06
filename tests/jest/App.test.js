/* eslint-disable one-var */

const VueTestUtils = require( '@vue/test-utils' );
const App = require( '../../resources/components/App.vue' );
const i18n = require( '../../resources/plugins/i18n' );

const localVue = VueTestUtils.createLocalVue();
localVue.use( i18n );

describe( 'App', () => {
	const wrapper = VueTestUtils.shallowMount( App, { localVue } );

	it( 'contains an H1 element', () => {
		expect( wrapper.html() ).toContain( 'h1' );
	} );
} );
