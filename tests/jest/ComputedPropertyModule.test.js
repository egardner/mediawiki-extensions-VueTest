const VueTestUtils = require( '@vue/test-utils' );
const ComputedPropertyModule = require( '../../resources/components/ComputedPropertyModule.vue' );
const i18n = require( '../../resources/plugins/i18n' );

const localVue = VueTestUtils.createLocalVue();
localVue.use( i18n );

describe( 'ComputedPropertyModule', () => {
	const wrapper = VueTestUtils.shallowMount( ComputedPropertyModule, { localVue } );

	it( 'contains an H2 element', () => {
		expect( wrapper.contains( 'h2' ) ).toBe( true );
	} );

	it( 'Updates the `sum` property to the total of the `a` and `b` data', () => {
		const aVal = 10;
		const bVal = 20;

		wrapper.setData( {
			a: aVal,
			b: bVal
		} );

		expect( wrapper.vm.sum ).toEqual( aVal + bVal );
	} );
} );
