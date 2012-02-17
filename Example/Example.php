<?php
/**
 * This is an example extension. It doesn't actually do anything useful, but
 * can be copied to provide the basis for your own extension.
 */

/** 
 * Prevent a user from accessing this file directly and provide a helpful 
 * message explaining how to install this extension.
 */
if ( !defined( 'MEDIAWIKI' ) ) { 
	if ( !defined( 'MEDIAWIKI' ) ) {
    	echo <<<EOT
To install the Example extension, put the following line in your 
LocalSettings.php file: 
require_once( "\$IP/extensions/Example/Example.php" );
EOT;
    	exit( 1 );
	}
}

// Extension credits that will show up on Special:Version
$wgExtensionCredits[ 'other' ][] = array(
	'path' => __FILE__,
	'name' => 'Example',
	'author' =>'Your Name Here', 
	'url' => 'https://www.mediawiki.org/wiki/Extension:Example', 
	'description' => 'This extension is an example extension',
	'version'  => 1.0,
);

// Find the full directory path of this extension
$current_dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;

// Autoload this extension's classes
$wgAutoloadClasses[ 'SpecialExample' ] = $current_dir . 'Example.body.php';

// Add the i18n message file
$wgExtensionMessagesFiles[ 'Example' ] = $current_dir . 'Example.i18n.php';

// Tell MediaWiki about the special page
$wgSpecialPages[ 'Example' ] = 'SpecialExample';
