<!--
	This is a basic example of how Computed Properties work in Vue.
	More info here: https://vuejs.org/v2/guide/computed.html
-->
<template>
	<div id="computed-property-module">
		<h2>
			{{ $i18n( 'vuetest-computed-property-title' ) }}
		</h2>

		<p>
			{{ $i18n( 'vuetest-computed-property-intro' ) }}
		</p>

		<pre>{{ sum }}</pre>

		<input v-model="a" type="number">
		<input v-model="b" type="number">
	</div>
</template>

<script>
module.exports = {
	name: 'ComputedPropertyModule',

	data: function () {
		return {
			a: 1,
			b: 2
		};
	},

	computed: {
		sum: function () {
			return Number( this.a ) + Number( this.b );
		}
	}

};
</script>
