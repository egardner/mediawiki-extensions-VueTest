<?php
/**
 * BoilerPlate extension - the thing that needs you.
 *
 * For more info see http://mediawiki.org/wiki/Extension:BoilerPlate
 *
 * @file
 * @ingroup Extensions
 * @author John Doe, 2012
 * @license GNU General Public Licence 2.0 or later
 */

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'BoilerPlate',
	'author' => array(
		'John Doe',
	),
	'version'  => '0.1.0',
	'url' => 'https://www.mediawiki.org/wiki/Extension:BoilerPlate',
	'descriptionmsg' => 'boilerplate-desc',
);


/* Setup */

$dir = dirname( __FILE__ );

// Register files
$wgAutoloadClasses['BoilerPlateHooks'] = $dir . '/BoilerPlate.hooks.php';
$wgAutoloadClasses['SpecialHelloWorld'] = $dir . '/specials/SpecialHelloWorld.php';
$wgExtensionMessagesFiles['BoilerPlate'] = $dir . '/BoilerPlate.i18n.php';
$wgExtensionMessagesFiles['BoilerPlateAlias'] = $dir . '/BoilerPlate.i18n.alias.php';

// Register hooks
#$wgHooks['NameOfHook'][] = 'BoilerPlateHooks::onNameOfHook';

// Register special pages
$wgSpecialPages['HelloWorld'] = 'SpecialHelloWorld';
$wgSpecialPageGroups['HelloWorld'] = 'other';

// Register modules
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

// Enable Foo
#$wgBoilerPlateEnableFoo = true;
