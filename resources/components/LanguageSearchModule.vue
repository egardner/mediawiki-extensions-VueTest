<template>
	<div id="language-search-module">
		<h2>
			{{ $i18n( 'vuetest-language-search-title' ) }}
		</h2>

		<p>
			{{ $i18n( 'vuetest-language-search-intro', numLangs ) }}
		</p>

		<language-search />
	</div>
</template>

<script>
var LanguageSearchComponent = require( './LanguageSearchComponent.vue' );

module.exports = {
	name: 'LanguageSearchModule',
	components: {
		'language-search': LanguageSearchComponent
	},
	data: function () {
		var languageNames = mw.language.getData( mw.config.get( 'wgUserLanguage' ), 'languageNames' );
		return {
			numLangs: Object.keys( languageNames ).length
		};
	}
};
</script>
