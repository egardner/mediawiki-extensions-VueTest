<template>
	<div class="mw-language-search">
		<input
			v-model="search"
			type="search"
			class="mw-language-search-input"
			v-bind:placeholder="$i18n( 'vuetest-language-search-placeholder' )"
		>
		<div class="mw-language-search-results">
			<language-search-result
				v-for="result in results"
				v-show="result.match"
				v-bind:key="result.code"
				v-bind:result="result.result"
				v-bind:match-prop="result.matchProp"
				v-bind:query="search"
			/>
		</div>
	</div>
</template>

<script>
var languageNames = mw.language.getData( mw.config.get( 'wgUserLanguage' ), 'languageNames' ),
	autonyms = $.uls.data.getAutonyms(),
	languageResults = Object.keys( languageNames ).map( function ( code ) {
		return { code: code, name: languageNames[ code ], autonym: autonyms[ code ] };
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
			return languageResults.map( function ( result ) {
				var i, prop,
					props = [ 'name', 'autonym', 'code' ];
				for ( i = 0; i < props.length; i++ ) {
					prop = props[ i ];
					if (
						result[ prop ] !== undefined &&
						result[ prop ].toLowerCase().substring( 0, query.length ) === query
					) {
						return { result: result, match: true, matchProp: prop };
					}
				}
				return { result: result, match: false };
			} );
		}
	},
	components: {
		'language-search-result': require( './LanguageSearchResult.vue' )
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
}
</style>
