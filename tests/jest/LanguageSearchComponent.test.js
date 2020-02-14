// Setup mock API response
const response = require( './fixtures/languages.json' );
global.mw.language.getData.mockReturnValue( response );

const VueTestUtils = require( '@vue/test-utils' );
const LanguageSearchComponent = require( '../../resources/components/LanguageSearchComponent.vue' );
const i18n = require( '../../resources/plugins/i18n' );

const localVue = VueTestUtils.createLocalVue();
localVue.use( i18n );

describe( 'LanguageSearchComponent', () => {
	const wrapper = VueTestUtils.shallowMount( LanguageSearchComponent, { localVue } );
	const input = wrapper.find( 'input' );

	it( 'updates the results property when the user has entered data', () => {
		// Initial value should contain all results
		expect( wrapper.vm.results.length ).toBe( Object.keys( response ).length );

		input.element.value = 'de';
		input.trigger( 'input' );

		// Updated value should contain only matching results
		expect( wrapper.vm.results.length ).toBe( 5 );
	} );
} );
