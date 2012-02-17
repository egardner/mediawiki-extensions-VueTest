<?php
/**
 * This file defines the SpecialHelloWorld class which handles the functionality for the 
 * HelloWorld special page (Special:HelloWorld).
 *
 * @file
 * @ingroup Extensions
 * @author Ryan Kaldari
 */
class SpecialHelloWorld extends SpecialPage {
	
	/**
	 * Initialize the special page.
	 * In this case, we're just calling the parent class's constructor with the name of the special
	 * page and no extra parameters.
	 */
	public function __construct() {
		parent::__construct( 'HelloWorld' );
	}
	
	/**
	 * Define what happens when the special page is loaded by the user.
	 * @param $sub string The subpage, if any
	 */
	public function execute( $sub ) {
		global $wgOut;
		
		// Output the title of the page
		$wgOut->setPageTitle( wfMsg( 'helloworld' ) );
		// Output a hello world message as the content of the page
		$wgOut->addWikiMsg( 'helloworld-hello' );
	}
	
}
