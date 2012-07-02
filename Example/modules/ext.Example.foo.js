/**
 * JavaScript for Foo in Example.
 */
( function ( mw, $ ) {

	var foo = {
		init: function () {
			var $box, $table, $tbody;

			$box = $( '<div class="mw-example-foo"></div>' ).append(
				$( '<h3>', {
					text: mw.user.anonymous() ?
						mw.msg( 'example-foo-title-loggedout') :
						mw.msg( 'example-foo-title-user', mw.user.name() )
				} )
			);

			$table = $( '<table class="wikitable"><tbody></tbody></table>' );
			$tbody = $table.children( 'tbody' );

			$.each( mw.config.get( 'ExampleFooStuff' ), function ( key, val ) {
				$tbody.append(
					$( '<tr>' ).append(
						$( '<th>' ).text( key ),
						$( '<td>' ).text( val )
					)
				);
			} );

			$( '#content' ).append( $box, $table );
		}
	};

	mw.libs.foo = foo;

}( mediaWiki, jQuery ) );
