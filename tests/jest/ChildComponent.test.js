const VueTestUtils = require( '@vue/test-utils' );
const ChildComponent = require( '../../resources/components/ChildComponent.vue' );
const i18n = require( '../../resources/plugins/i18n' );

const localVue = VueTestUtils.createLocalVue();
localVue.use( i18n );

// Note the use of mount() instead of shallowMount() here; shallowMount will
// stub out all child components while mount will actually render them. In this
// case we want to test the interaction between parent and child components so
// mount() is better.
describe( 'ParentChildCommunicationModule', () => {
	const wrapper = VueTestUtils.shallowMount( ChildComponent, {
		localVue,
		propsData: {
			message: 'mock message prop'
		}
	} );

	it( 'fires an "update-count" event each time that button is clicked', () => {
		const button = wrapper.find( 'button' );
		expect( wrapper.emitted( 'update-count' ) ).toBeFalsy();

		button.trigger( 'click' );
		button.trigger( 'click' );

		expect( wrapper.emitted( 'update-count' ) ).toBeTruthy();
		expect( wrapper.emitted( 'update-count' ).length ).toBe( 2 );
	} );
} );
