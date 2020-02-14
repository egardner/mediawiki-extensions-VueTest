<!--
	App.vue

	This is the top-level "App" component in our demo Vue application.
	This component and all of its children are written in Vue's single-file
	component format. You can read more about single-file components here:
	https://vuejs.org/v2/guide/single-file-components.html

	Below is the <template> portion of the component, which defines what gets
	rendered.
-->
<template>
	<div id="app" class="app">
		<!--
			The $i18n instance method is defined by a plugin, so it's
			available in all components. Calling it with the appropriate key
			returns a mw.message object. This can be output directly into a
			template inside curly brackets.
		-->
		<h1>{{ $i18n( 'vuetest-app-welcome') }}</h1>

		<!--
			The same plugin also defines a custom directive, v-i18n-html.
			Vue includes some built-in directives like v-if, v-else, v-for, etc.
			This custom directive will automatically output the desired message
			as HTML inside of the element it is attached to. This is
			equivalent to (and more concise than) writing:

			<p v-html="$i18n( 'vuetest-app-welcome' ).parse()" />

			The text after the colon is the argument passed to the directive.
		-->
		<p v-i18n-html:vuetest-app-intro />

		<!--
			A second usage of vue-i18n-html is also supported. Uncomment
			below to see in action. One caveat is that Vue interprets
			everything inside the attribute quotes as a JS expression, so
			if you're passing in a string value this way as opposed to a
			number or a variable you will need to wrap in an additional set
			of quotes.
		-->
		<!-- <p v-i18n-html="'vuetest-app-intro'" /> -->

		<!--
			Child Components. Components must be registered either
			locally (see below) or globally at the root-level Vue instance
			before they can be used in templates in this way.
		-->
		<two-way-binding-module />
		<computed-property-module />
		<api-request-module />
		<parent-child-communication-module />
		<language-search-module />
	</div>
</template>

<!--
	The <script> portion of the component is where all of the data and
	methods live. This component has no data or methods of its own, only
	a series of child components.
-->
<script>
var ApiRequestModule = require( './ApiRequestModule.vue' ),
	ComputedPropertyModule = require( './ComputedPropertyModule.vue' ),
	TwoWayBindingModule = require( './TwoWayBindingModule.vue' ),
	ParentChildCommunicationModule = require( './ParentChildCommunicationModule.vue' ),
	LanguageSearchModule = require( './LanguageSearchModule.vue' );

module.exports = {
	name: 'App',
	components: {
		'api-request-module': ApiRequestModule,
		'computed-property-module': ComputedPropertyModule,
		'two-way-binding-module': TwoWayBindingModule,
		'parent-child-communication-module': ParentChildCommunicationModule,
		'language-search-module': LanguageSearchModule
	}
};
</script>

<!--
	Components can optionally include <style> tags. Uncomment the code below
	to see one in action.

	NOTE: scoped styles are not currently supported in ResourceLoader. LESS
	compilation is, however.
-->
<!--
<style lang="less">
@background-color: #ccc;

.app {
	background-color: @background-color;
	padding: 1em;
}
</style>
-->
