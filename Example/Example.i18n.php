<?php
/**
 * Internationalisation file for the Example extension.
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 */
$messages['en'] = array(
	# Used on Special:Version
	'example-desc' => 'This is an example extension using the BoilerPlate.',

	# Foo
	'example-foo-title-user' => 'Howdy, $1!',
	'example-foo-title-loggedout' => 'Hi there!',

	# Special:HelloWorld
	'example-helloworld' => 'Bar',
	'example-helloworld-intro' => 'This is the HelloWorld special page, as provided by the Example extension.',
);


/** Message documentation (Message documentation)
 */
$messages['qqq'] = array(
	'example-desc' => '{{desc}}',
	'example-foo-title-user' => 'Title of the foo interface for logged-in users. $1 is the username.',
	'example-foo-title-loggedout' => 'Title of the foo interface logged-out users.',
	'example-helloworld' => 'Title of Special:HelloWorld.',
	'example-helloworld-intro' => 'Intro paragraph shown on Special:HelloWorld.'
);
