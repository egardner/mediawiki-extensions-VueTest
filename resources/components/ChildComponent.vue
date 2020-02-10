<!--
	This component demonstrates how to receive props from and emit events to
	a parent component.
-->
<template>
	<div id="child-component" class="child-component">
		<span>{{ message }}</span>
		<button v-on:click="$emit( 'update-count' )">
			{{ $i18n( 'vuetest-child-component-button' ) }}
		</button>
	</div>
</template>

<script>
module.exports = {
	name: 'ChildComponent',

	// Props attributes allow data to be passed down from a parent component to
	// its children. More information here:
	// https://vuejs.org/v2/guide/components.html#Passing-Data-to-Child-Components-with-Props

	// Props can optionally have their types defined and can even have custom
	// validation rules:
	// https://vuejs.org/v2/guide/components-props.html
	props: {
		message: {
			type: String,
			required: true
		}
	}

};
</script>

<style lang="less">
.child-component {
	background-color: #2b84e3;
	color: #fff;
	padding: 1em;
	margin-bottom: 1em;

	button {
		float: right;
	}
}
</style>
