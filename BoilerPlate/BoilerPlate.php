<?php
/**
 * BoilerPlate extension - the thing that needs you.
 *
 * For more info see http://mediawiki.org/wiki/Extension:BoilerPlate
 *
 * @file
 * @ingroup Extensions
 * @author Your Name, 2015
 */

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'BoilerPlate',
	'author' => array(
		'Your Name',
	),
	'version'  => '0.0.0',
	'url' => 'https://www.mediawiki.org/wiki/Extension:BoilerPlate',
	'descriptionmsg' => 'boilerplate-desc',
	'license-name' => 'MIT',
);

/* Setup */

// Register files
$wgAutoloadClasses['BoilerPlateHooks'] = __DIR__ . '/BoilerPlate.hooks.php';
$wgAutoloadClasses['SpecialHelloWorld'] = __DIR__ . '/specials/SpecialHelloWorld.php';
$wgMessagesDirs['BoilerPlate'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['BoilerPlateAlias'] = __DIR__ . '/BoilerPlate.i18n.alias.php';

// Register hooks
#$wgHooks['NameOfHook'][] = 'BoilerPlateHooks::onNameOfHook';

// Register special pages
$wgSpecialPages['HelloWorld'] = 'SpecialHelloWorld';

// Register modules
$wgResourceModules['ext.boilerPlate.foo'] = array(
	'scripts' => array(
		'modules/ext.boilerPlate.js',
		'modules/ext.boilerPlate.foo.js',
	),
	'styles' => array(
		'modules/ext.boilerPlate.foo.css',
	),
	'messages' => array(
	),
	'dependencies' => array(
	),

	'localBasePath' => __DIR__,
	'remoteExtPath' => 'examples/BoilerPlate',
);


/* Configuration */

// Enable Foo
#$wgBoilerPlateEnableFoo = true;
