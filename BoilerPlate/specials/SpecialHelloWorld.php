<?php
/**
 * HelloWorld SpecialPage for BoilerPlate extension
 *
 * @file
 * @ingroup Extensions
 */

class SpecialHelloWorld extends SpecialPage {
	public function __construct() {
		parent::__construct( 'HelloWorld' );
	}

	/**
	 * Shows the page to the user.
	 * @param string $sub: The subpage string argument (if any).
	 *  [[Special:HelloWorld/subpage]].
	 */
	public function execute( $sub ) {
		$out = $this->getOutput();

		$out->setPageTitle( $this->msg( 'boilerplate-helloworld' ) );

		$out->addWikiMsg( 'boilerplate-helloworld-intro' );
	}
}
