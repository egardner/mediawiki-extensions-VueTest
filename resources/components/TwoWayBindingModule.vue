<!--
	This component demonstrates one of Vue's core features, two-way data
	binding for form inputs. More info about this feature can be found at:
	https://vuejs.org/v2/guide/forms.html
-->
<template>
	<div id="two-way-binding-module">
		<h2>
			{{ $i18n( 'vuetest-two-way-binding-title' ) }}
		</h2>

		<p v-i18n-html:vuetest-two-way-binding-intro />

		<pre>{{ input }}</pre>

		<input v-model="input" type="text">
	</div>
</template>

<script>
module.exports = {
	name: 'TwoWayBindingModule',

	data: function () {
		return {
			input: 'test test'
		};
	}

};
</script>
