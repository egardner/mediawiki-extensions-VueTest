<?php
/**
 * Example extension - based on the Example.
 *
 * For more info see mediawiki.org/wiki/Extension:Example
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

	// Name of your Extension:
	'name' => 'Example',

	// Sometime other patches contributors and minor authors are not worth
	// mentionning, you can use the special case '...' to output a localised
	// message 'and others...'.
	'author' => array(
		'George Foo',
		'Jane Bar',
		'...'
	),

	'version'  => '0.1.0',

	// The extension homepage. www.mediawiki.org will be happy to host
	// your extension homepage.
	'url' => 'https://www.mediawiki.org/wiki/Extension:Example',


	# Key name of the message containing the description.
	'descriptionmsg' => 'example-desc',
);

/* Setup */

// Initialize an easy to use shortcut:
$dir = dirname( __FILE__ );
$dirbasename = basename( $dir );

// Register files
// MediaWiki need to know which PHP files contains your class. It has a
// registering mecanism to append to the internal autoloader. Simply use
// $wgAutoLoadClasses as below:
$wgAutoloadClasses['ExampleHooks'] = $dir . '/Example.hooks.php';
$wgAutoloadClasses['SpecialHelloWorld'] = $dir . '/specials/SpecialHelloWorld.php';
$wgAutoloadClasses['ApiQueryExample'] = $dir . '/api/ApiQueryExample.php';

$wgExtensionMessagesFiles['Example'] = $dir . '/Example.i18n.php';
$wgExtensionMessagesFiles['ExampleAlias'] = $dir . '/Example.i18n.alias.php';
$wgExtensionMessagesFiles['ExampleMagic'] = $dir . '/Example.i18n.magic.php';

$wgAPIListModules['example'] = 'ApiQueryExample';

// Register hooks
// See also http://www.mediawiki.org/wiki/Manual:Hooks
$wgHooks['BeforePageDisplay'][] = 'ExampleHooks::onBeforePageDisplay';
$wgHooks['ResourceLoaderGetConfigVars'][] = 'ExampleHooks::onResourceLoaderGetConfigVars';
$wgHooks['ParserFirstCallInit'][] = 'ExampleHooks::onParserFirstCallInit';
$wgHooks['MagicWordwgVariableIDs'][] = 'ExampleHooks::onRegisterMagicWords';
$wgHooks['ParserGetVariableValueSwitch'][] = 'ExampleHooks::onParserGetVariableValueSwitch';

// Register special pages
// See also http://www.mediawiki.org/wiki/Manual:Special_pages
$wgSpecialPages['HelloWorld'] = 'SpecialHelloWorld';
$wgSpecialPageGroups['HelloWorld'] = 'other';

// Register modules
// See also http://www.mediawiki.org/wiki/Manual:$wgResourceModules
// ResourceLoader modules are the de facto standard way to easily
// load JavaScript and CSS files to the client.
$wgResourceModules['ext.Example.foo'] = array(
	'scripts' => array(
		'modules/ext.Example.foo.js',
	),
	'styles' => array(
		'modules/ext.Example.foo.css',
	),
	'messages' => array(
		'example-foo-title-loggedout',
		'example-foo-title-user',
	),
	'dependencies' => array(
		'mediawiki.util',
		'mediawiki.user',
		'mediawiki.Title',
	),

	'localBasePath' => $dir,
	'remoteExtPath' => 'examples/' . $dirbasename,
);

$wgResourceModules['ext.Example.foo.init'] = array(
	'scripts' => 'modules/ext.Example.foo.init.js',
	'dependencies' => array(
		'ext.Example.foo',
	),

	'localBasePath' => $dir,
	'remoteExtPath' => 'examples/' . $dirbasename,
);

/* Configuration */


/** Your extension configuration settings. Since they are going to be global
 * always use a "wg" prefix + your extension name + your setting key.
 * The entire variable name should use "lowerCamelCase".
 */

// Enable Foo
// Example of 'BoilerPlate' global setting to enable the 'Foo' feature:
$wgExampleEnableFoo = true;

// Stuff
$wgExampleFooStuff = array(
	'do' => 're',
	'mi' => 'fa',
	'so' => 'la',
	'ti' => 'do',
);

// Value of {{MYWORD}} constant
$wgExampleMyWord = 'Awesome';
