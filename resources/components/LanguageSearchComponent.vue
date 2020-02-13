<template>
	<div class="mw-language-search">
		<input
			v-model="search"
			type="search"
			class="mw-language-search-input"
			v-bind:placeholder="$i18n( 'vuetest-language-search-placeholder' )"
		>
		<div class="mw-language-search-results">
			<div
				v-for="result in results"
				v-bind:key="result.code"
				class="mw-language-search-result"
			>
				<span class="mw-language-search-result-name">
					{{ result.name }}
				</span>
				<span class="mw-language-search-result-code">
					{{ result.code }}
				</span>
			</div>
		</div>
	</div>
</template>

<script>
var languageNames = mw.language.getData( mw.config.get( 'wgUserLanguage' ), 'languageNames' ),
	languageResults = Object.keys( languageNames ).map( function ( code ) {
		return { code: code, name: languageNames[ code ] };
	} );

module.exports = {
	data: function () {
		return {
			search: ''
		};
	},
	computed: {
		results: function () {
			var query = this.search.toLowerCase();
			return languageResults.filter( function ( result ) {
				return result.code.toLowerCase().substring( 0, query.length ) === query ||
					result.name.toLowerCase().substring( 0, query.length ) === query;
			} );
		}
	}
};
</script>

<style lang="less">
@import 'mediawiki.ui/variables';

.mw-language-search {
	width: 500px;

	&-input {
		display: block;
		width: 100%;
		padding: 6px 8px;
		border: 1px solid @colorGray10;
		line-height: 18/14em;
		font-size: inherit;
		font-family: inherit;

		&:focus {
			border-color: @colorProgressive;
		}
	}

	&-results {
		padding: 1em;
		height: 200px;
		overflow-y: auto;
	}

	&-result {
		padding: 0.5em 0;

		&-code {
			float: right;
			color: @colorGray7;
		}
	}
}
</style>
