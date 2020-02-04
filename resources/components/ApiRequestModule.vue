<!--
	This component demonstrates how components can make asynchronous API
	requests to update their internal data. The template will change
	automatically once new data is present.
-->
<template>
	<div id="api-request-module">
		<h2>
			{{ $i18n( 'vuetest-apirequest-title' ) }}
		</h2>

		<p>
			{{ $i18n( 'vuetest-apirequest-intro') }}
		</p>

		<!--
			This is an example of how conditional logic works in Vue
			templates. More information about this can be found here:
			https://vuejs.org/v2/guide/conditional.html
		-->
		<div>
			<pre v-if="wikitext">{{ wikitext }}</pre>
			<pre v-else>{{ $i18n( 'vuetest-apirequest-pending' ) }}</pre>
		</div>

		<input v-model="pageTitle" type="text">

		<button v-on:click="requestWikitext()">
			{{ $i18n( 'vuetest-apirequest-button' ) }}
		</button>
	</div>
</template>

<script>
module.exports = {
	name: 'ApiRequestModule',

	// Every component can have a `data` property. This is the place for any
	// state that we want to keep track of in a reactive way. Here the initial
	// state of the `wikitext` property is null; that will change once we make a
	// successful API request. The component will automatically re-render when
	// that happens.
	data: function () {
		return {
			pageTitle: 'Main_Page',
			wikitext: null
		};
	},

	methods: {
		/**
		 * @param {string} pageTitle
		 */
		requestWikitext: function () {
			this.$api.get( {
				action: 'query',
				format: 'json',
				prop: 'revisions',
				titles: this.pageTitle,
				rvprop: 'content',
				rvslots: '*'
			} ).then( function ( response ) {
				this.wikitext = response.query.pages[ '1' ].revisions[ 0 ].slots.main[ '*' ];
			}.bind( this ) );
		}
	}
};
</script>
