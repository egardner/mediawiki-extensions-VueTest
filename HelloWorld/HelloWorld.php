<?php
/**
 * MediaWiki HelloWorld extension
 * http://www.mediawiki.org/wiki/Extension:HelloWorld
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * This program is distributed WITHOUT ANY WARRANTY.
 */

/**
 * This file loads everything needed for the HelloWorld extension to function.
 *
 * @file
 * @ingroup Extensions
 * @author Ryan Kaldari
 */

// Tell the user how to install the extension if they try to access the page directly.
if ( !defined( 'MEDIAWIKI' ) ) {
	echo <<<EOT
To install this extension, put the following line in LocalSettings.php:
require_once( "\$IP/extensions/examples/HelloWorld/HelloWorld.php" );\n
EOT;
	exit( 1 );
}

// Extension credits that will show up on Special:Version
$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'HelloWorld',
	'version' => '1.0',
	'url' => 'https://www.mediawiki.org/wiki/Extension:HelloWorld',
	'author' => array( 'Ryan Kaldari' ),
	'descriptionmsg' => 'helloworld-desc',
);

// The full directory path for this extension
$dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;

// Load the HelloWorld special page class
$wgAutoloadClasses['SpecialHelloWorld'] = $dir . 'SpecialHelloWorld.php';
// Load the i18n file that provides translated messages
$wgExtensionMessagesFiles['HelloWorld'] = $dir . 'HelloWorld.i18n.php';
// Load the alias file that provides localized aliases for the special page
$wgExtensionMessagesFiles['HelloWorldAlias'] = $dir . 'HelloWorld.alias.php';
// Register the HelloWorld special page (Special:HelloWorld)
$wgSpecialPages['HelloWorld'] = 'SpecialHelloWorld';
// Assign the HelloWorld special page to the special page group 'other'
$wgSpecialPageGroups['HelloWorld'] = 'other';
