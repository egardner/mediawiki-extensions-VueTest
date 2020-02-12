<?php
/**
 * VueTest Special page.
 *
 * @file
 */

namespace MediaWiki\Extension\VueTest;

class SpecialVueSandbox extends \SpecialPage {

	/**
	 * Initialize the special page.
	 */
	public function __construct() {
		// A special page should at least have a name.
		// We do this by calling the parent class (the SpecialPage class)
		// constructor method with the name as first and only parameter.
		parent::__construct( 'VueTest' );
	}

	/**
	 * Shows the page to the user.
	 * @param string $sub The subpage string argument (if any).
	 *  [[Special:HelloWorld/subpage]].
	 */
	public function execute( $sub ) {
        $out = $this->getOutput();
        $markup = <<<EOM
        <div id="vue-root">
            <p>This message will disappear once Vue.js initializes.</p>
        </div>
EOM;

		$out->setPageTitle( $this->msg( 'vuetest' ) );
		$out->addSubtitle( $this->msg( 'vuetest-summary' ) );
        $out->addHTML( $markup );
        $out->addModules( 'ext.vueTest' );
	}

	protected function getGroupName() {
		return 'other';
	}
}
