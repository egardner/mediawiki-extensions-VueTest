const VueTestUtils = require( '@vue/test-utils' );
const TwoWayBindingModule = require( '../../resources/components/TwoWayBindingModule.vue' );
const i18n = require( '../../resources/plugins/i18n' );

const localVue = VueTestUtils.createLocalVue();
localVue.use( i18n );

describe( 'TwoWayBindingModule', () => {
	const wrapper = VueTestUtils.shallowMount( TwoWayBindingModule, { localVue } );
	const textInput = wrapper.find( 'input[type="text"]' );

	it( 'contains an H2 element', () => {
		expect( wrapper.contains( 'h2' ) ).toBe( true );
	} );

	it( 'contains a p element', () => {
		expect( wrapper.contains( 'p' ) ).toBe( true );
	} );

	it( 'Updates its data when new input is entered', () => {
		const testString = 'foo bar baz';

		textInput.setValue( testString );
		expect( wrapper.vm.input ).toBe( testString );
	} );
} );
