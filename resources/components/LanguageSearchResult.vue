<template>
	<div class="mw-language-search-result">
		<span class="mw-language-search-result-name">
			<strong v-if="highlightedName">{{ highlightedName }}</strong>
			{{ restOfName }}
		</span>
		<span class="mw-language-search-result-otherMatch">
			<strong v-if="highlightedOtherMatch">{{ highlightedOtherMatch }}</strong>
			{{ restOfOtherMatch }}
		</span>
	</div>
</template>
<script>
module.exports = {
	props: {
		result: Object,
		matchProp: String,
		query: String
	},
	computed: {
		otherMatch: function () {
			return this.matchProp === 'autonym' ? this.result.autonym : this.result.code;
		},
		highlightedName: function () {
			return this.matchProp === 'name' ? this.result.name.slice( 0, this.query.length ) : '';
		},
		restOfName: function () {
			return this.matchProp === 'name' ? this.result.name.slice( this.query.length ) : this.result.name;
		},
		highlightedOtherMatch: function () {
			return this.matchProp !== 'name' ? this.otherMatch.slice( 0, this.query.length ) : '';
		},
		restOfOtherMatch: function () {
			return this.matchProp !== 'name' ? this.otherMatch.slice( this.query.length ) : this.otherMatch;
		}
	}
};
</script>
<style lang="less">
@import 'mediawiki.ui/variables';
.mw-language-search-result {
	padding: 0.5em 0;

	&-otherMatch {
		float: right;
		color: @colorGray7;
	}
}
</style>
