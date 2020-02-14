// Setup mock API response
const response = require( './fixtures/revisions.json' );
global.mw.Api.prototype.get.mockResolvedValue( response );

const Vue = require( 'vue' );
const VueTestUtils = require( '@vue/test-utils' );
const ApiRequestModule = require( '../../resources/components/ApiRequestModule.vue' );
const i18n = require( '../../resources/plugins/i18n' );
const api = require( '../../resources/plugins/api' );

const localVue = VueTestUtils.createLocalVue();
localVue.use( i18n );
localVue.use( api );

describe( 'ApiRequestModule', () => {
	const wrapper = VueTestUtils.shallowMount( ApiRequestModule, { localVue } );
	const button = wrapper.find( 'button' );

	it( 'contains an H2 element', () => {
		expect( wrapper.contains( 'h2' ) ).toBe( true );
	} );

	it( 'updates the component data with the API response', async () => {
		expect( wrapper.vm.wikitext ).toBeNull();
		button.trigger( 'click' );

		await Vue.nextTick();
		expect( wrapper.vm.wikitext ).toContain( '== Test Files ==' );
	} );
} );
