<?php
/**
 * BoilerPlate extension - the thing that needs you.
 *
 * For more info see http://mediawiki.org/wiki/Extension:BoilerPlate
 *
 * You should add a nice comment explaining what the file contains and
 * what it is for. MediaWiki core uses the doxygen documentation engine
 * so you can add various tags to complement your comment. See the online
 * documentation at http://www.stack.nl/~dimitri/doxygen/manual.html
 *
 * Here are some tags, most of them are optionals though:
 *
 * First tag this document block as describing the file:
 * @file
 *
 * We regroup all extensions documentation in the obvious `Extensions`
 * group of documentation:
 * @ingroup Extensions
 *
 * The author would let everyone know who wrote the code, if you want to
 * mention several authors, add a second line.
 * @author Jane Roe
 * @author John Doe
 *
 * Eventually the date range, gives a hint about how fresh the code is:
 * @date 2011-2012
 *
 * To mention the file version in the documentation:
 * @version 1.0
 *
 * The license governing the extension code:
 * @copyright GNU General Public Licence 2.0 or later
 */

/**
 * MediaWiki has several global variables which can be reused or even altered
 * by your extension. The very first one is the $wgExtensionCredits which will
 * expose to MediaWiki metadata about your extension. For additional
 * documentation, see its documentation block in includes/DefaultSettings.php
 */
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,

	# Name of your Extension:
	'name' => 'BoilerPlate',
	# Sometime other patches contributors and minor authors are not worth
	# mentionning, you can use the special case '...' to output a localised
	# message 'and others...'.
	'author' => array(
		'John Doe', 'Jane Roe', '...'
	),

	'version'  => '0.1.0',

	# The extension homepage. www.mediawiki.org will be happy to host
	# your extension homepage.
	'url' => 'https://www.mediawiki.org/wiki/Extension:BoilerPlate',

	# Key name of the message containing the description.
	'descriptionmsg' => 'boilerplate-desc',
);


/* Setup */

// Initialize an easy to use shortcut:
$dir = dirname( __FILE__ );

// MediaWiki need to know which PHP files contains your class. It has a
// registering mecanism to append to the internal autoloader. Simply use
// $wgAutoLoadClasses as below:
$wgAutoloadClasses['BoilerPlateHooks'] = $dir . '/BoilerPlate.hooks.php';
$wgAutoloadClasses['SpecialHelloWorld'] = $dir . '/specials/SpecialHelloWorld.php';
$wgExtensionMessagesFiles['BoilerPlate'] = $dir . '/BoilerPlate.i18n.php';
$wgExtensionMessagesFiles['BoilerPlateAlias'] = $dir . '/BoilerPlate.i18n.alias.php';

// Register hooks
#$wgHooks['NameOfHook'][] = 'BoilerPlateHooks::onNameOfHook';

// Register special pages
// Advertise MediaWiki your extension about special pages you are providing:
$wgSpecialPages['HelloWorld'] = 'SpecialHelloWorld';
$wgSpecialPageGroups['HelloWorld'] = 'other';

// Register resource loader modules, an 'easy' way to send your JavaScript
// and CSS files to the client.
$wgResourceModules['ext.BoilerPlate.foo'] = array(
	'scripts' => array(
		'modules/ext.BoilerPlate.foo.js',
	),
	'styles' => array(
		'modules/ext.BoilerPlate.foo.css',
	),
	'messages' => array(
	),
	'dependencies' => array(
	),

	'localBasePath' => $dir,
	'remoteExtPath' => 'examples/BoilerPlate',
);


/* Configuration */

/** Your extension configuration settings. Since they are going to be global
 * always use a wg prefix then your extension name then your setting name. The
 * variable name should use camelcase.
 */
// Example of 'Boiler Plate' global setting to enable the 'Foo' feature:
// Enable Foo
#$wgBoilerPlateEnableFoo = true;
