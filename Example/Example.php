<?php
/**
 * Example extension - based on the Example.
 *
 * For more info see mediawiki.org/wiki/Extension:Example
 *
 * @file
 * @ingroup Extensions
 * @author John Doe, 2012
 * @license GNU General Public Licence 2.0 or later
 */
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Example',
	'author' => array(
		'John Doe',
	),
	'version'  => '0.1.0',
	'url' => 'https://www.mediawiki.org/wiki/Extension:Example',
	'descriptionmsg' => 'example-desc',
);


/* Setup */

$dir = dirname( __FILE__ );
$dirbasename = basename( $dir );

// Register files
$wgAutoloadClasses['ExampleHooks'] = $dir . '/Example.hooks.php';
$wgAutoloadClasses['SpecialHelloWorld'] = $dir . '/specials/SpecialHelloWorld.php';
$wgExtensionMessagesFiles['Example'] = $dir . '/Example.i18n.php';
$wgExtensionMessagesFiles['ExampleAlias'] = $dir . '/Example.i18n.alias.php';
$wgExtensionMessagesFiles['ExampleMagic'] = $dir . '/Example.i18n.magic.php';

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

// Enable Foo
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

