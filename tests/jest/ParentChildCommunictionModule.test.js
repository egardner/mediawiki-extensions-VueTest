const VueTestUtils = require( '@vue/test-utils' );
const ParentChildCommunicationModule = require( '../../resources/components/ParentChildCommunicationModule.vue' );
const i18n = require( '../../resources/plugins/i18n' );

const localVue = VueTestUtils.createLocalVue();
localVue.use( i18n );

// Note the use of mount() instead of shallowMount() here; shallowMount will
// stub out all child components while mount will actually render them. In this
// case we want to test the interaction between parent and child components so
// mount() is better.
describe( 'ParentChildCommunicationModule', () => {
	const wrapper = VueTestUtils.mount( ParentChildCommunicationModule, { localVue } );

	it( 'contains an H2 element', () => {
		expect( wrapper.contains( 'h2' ) ).toBe( true );
	} );

	it( 'updates the clickCount when a child component button is clicked', () => {
		const firstButton = wrapper.findAll( 'button' ).at( 0 );
		const secondButton = wrapper.findAll( 'button' ).at( 1 );

		firstButton.trigger( 'click' );
		secondButton.trigger( 'click' );
		firstButton.trigger( 'click' );

		expect( wrapper.vm.clickCount ).toBe( 3 );
	} );
} );
