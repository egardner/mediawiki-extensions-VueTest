<template>
	<div class="mw-site-search">
		<input
			ref="input"
			v-model="search"
			type="search"
			class="mw-site-search-input"
			autocomplete="off"
			v-bind:placeholder="placeholder"
			v-bind:title="title"
			v-on:keyup.up="moveSelection(-1)"
			v-on:keyup.down="moveSelection(1)"
			v-on:blur="clearResults"
		>
		<button
			class="mw-site-search-button"
			v-bind:title="buttonTitle"
			v-on:click="$emit( 'click' )"
		>
			{{ buttonLabel }}
		</button>
		<div
			v-show="results.length > 0"
			ref="results"
			class="mw-site-search-results"
		>
			<div
				v-for="(result, index) in results"
				v-bind:key="result.page"
				class="mw-site-search-result"
				v-bind:class="{'mw-site-search-result-current': index === selectedIndex}"
				v-bind:title="result.page"
			>
				<a
					class="mw-site-search-result-link"
					v-bind:href="result.url"
					v-on:mouseenter="setSelection(index)"
					v-on:mouseleave="setSelection(-1)"
				>
					<span class="mw-site-search-highlight">
						{{ result.highlightedPrefix }}
					</span>
					{{ result.suffix }}
				</a>
			</div>
		</div>
	</div>
</template>
<script>
module.exports = {
	props: {
		placeholder: String,
		title: String,
		buttonLabel: String,
		buttonTitle: String
	},
	data: function () {
		return {
			search: '',
			selectedIndex: -1,
			rawResults: {
				pages: [],
				query: ''
			}
		};
	},
	watch: {
		search: function ( newValue ) {
			if ( newValue === '' ) {
				this.rawResults = { pages: [], query: '' };
			}
			this.debouncedGetResults();
		}
	},
	created: function () {
		var timeout = null, func = this.getResults, context = this;
		this.debouncedGetResults = function () {
			if ( timeout !== null ) {
				clearTimeout( timeout );
			}
			timeout = setTimeout( function () {
				timeout = null;
				func.apply( context, arguments );
			}, 250 );
		};
	},
	mounted: function () {
		var input = this.$refs.input,
			resultsDiv = this.$refs.results;
		resultsDiv.style.top = input.offsetHeight + 'px';
	},
	computed: {
		results: function () {
			var query = this.rawResults.query;
			return this.rawResults.pages.map( function ( page ) {
				var possiblePrefix = page.slice( 0, query.length ),
					matches = possiblePrefix.toLowerCase() === query.toLowerCase();
				return {
					page: page,
					url: mw.util.getUrl( page ),
					highlightedPrefix: matches ? possiblePrefix : '',
					suffix: matches ? page.slice( possiblePrefix.length ) : page
				};
			} );
		}
	},
	methods: {
		setSelection: function ( newSelection ) {
			this.selectedIndex = newSelection;
		},
		moveSelection: function ( increment ) {
			var currentValue = this.selectedIndex;
			if ( this.results.length === 0 ) {
				this.selectedIndex = -1;
			}
			if ( currentValue === -1 && increment < 0 ) {
				currentValue = this.results.length;
			}
			this.selectedIndex = ( currentValue + increment + this.results.length ) %
				this.results.length;
		},
		clearSelection: function () {
			this.selectedIndex = -1;
		},
		getResults: function () {
			if ( this.fetchingPromise && this.fetchingPromise.abort ) {
				this.fetchingPromise.abort();
			}
			this.fetchingPromise = this.fetchResults();
			this.fetchingPromise.done( function ( results ) {
				this.rawResults = results;
				this.clearSelection();
			}.bind( this ) );
		},
		fetchResults: function () {
			var query = this.search,
				apiPromise;
			if ( query === '' ) {
				return $.Deferred()
					.resolve( { pages: [], query: '' } )
					.promise( { abort: function () {} } );
			}
			apiPromise = this.$api.get( {
				formatversion: 2,
				action: 'opensearch',
				search: query,
				namespace: 0,
				limit: 10
			} );
			return apiPromise
				.then( function ( response ) {
					return {
						pages: response[ 1 ],
						query: query
					};
				} )
				.promise( { abort: apiPromise.abort } );
		},
		clearResults: function () {
			this.rawResults = { pages: [], query: '' };
			this.clearSelection();
		}
	}
};
</script>
<style lang="less">
@import 'mediawiki.mixins.less';
@import 'mediawiki.ui/variables.less';

@width-search-button: 24px;
@font-size: 13px;

.mw-site-search {
	position: relative;

	&-input {
		direction: ltr;
		width: 100%;
		.box-sizing( border-box );
		border: @border-width-base @border-style-base @colorGray10;
		border-radius: @borderRadius;
		padding: 0.4em @width-search-button 0.4em 0.4em;
		font-size: @font-size;
		background-color: fade( #fff, 50% );
		.box-shadow( @boxShadowWidget );
		.transition( ~'border-color 250ms, box-shadow 250ms' );

		.mixin-placeholder( {
			color: @colorGray7;
			opacity: 1;
		} );
	}

	&:hover &-input {
		border-color: @colorGray7;
	}

	&:hover &-input:focus,
	&-input:focus {
		border-color: @colorProgressive;
		outline: 0;
		.box-shadow( @boxShadowProgressiveFocus );
	}

	&-button {
		position: absolute;
		top: @border-width-base;
		bottom: @border-width-base;
		right: @border-width-base;
		width: @width-search-button;
		border: 0;
		padding: 0;
		font-size: @font-size;
		direction: ltr;
		text-indent: -9999px;
		white-space: nowrap;
		overflow: hidden;
		cursor: pointer;
		background-color: transparent;
		background-image: url( ../images/search.svg );
		background-position: center center;
		background-repeat: no-repeat;
	}

	&-results {
		position: absolute;
		margin-top: -1px;
		background-color: white;
		border: 1px solid @colorGray10;
		width: 20vw;
		box-sizing: border-box;
	}

	&-result {
		a {
			display: block;

			&,
			&:hover,
			&:active,
			&:focus {
				text-decoration: none;
				color: black;
			}
		}

		&-current {
			background-color: @colorProgressiveActive;

			a {
				&,
				&:hover,
				&:active,
				&:focus {
					color: white;
				}
			}
		}
	}

	&-highlight {
		font-weight: bold;
	}
}
</style>
