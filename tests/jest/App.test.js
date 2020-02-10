const VueTestUtils = require( '@vue/test-utils' );
const App = require( '../../resources/components/App.vue' );
const TwoWayBindingModule = require( '../../resources/components/TwoWayBindingModule.vue' );
const i18n = require( '../../resources/plugins/i18n' );

const localVue = VueTestUtils.createLocalVue();
localVue.use( i18n );

describe( 'App', () => {
	const wrapper = VueTestUtils.shallowMount( App, { localVue } );

	it( 'contains an H1 element', () => {
		expect( wrapper.contains( 'h1' ) ).toBe( true );
	} );

	it( 'contains a p element', () => {
		expect( wrapper.contains( 'p' ) ).toBe( true );
	} );

	it( 'contains a two-way-binding-module component', () => {
		expect( wrapper.contains( TwoWayBindingModule ) ).toBe( true );
	} );
} );
