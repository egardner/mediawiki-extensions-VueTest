<?php
/**
 * Internationalisation file for the Example extension
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

	# Welcome
	'example-welcome-title-user' => 'Howdy, $1!',
	'example-welcome-title-loggedout' => 'Hi there!',
	'example-welcome-color-label' => "Today's color:",
	'example-welcome-color-value' => '$1',

	# Special:HelloWorld
	'example-helloworld' => 'Bar',
	'example-helloworld-intro' => 'This is the HelloWorld special page, as provided by the Example extension.',
);


/** Message documentation (Message documentation)
 */
$messages['qqq'] = array(
	'example-desc' => '{{desc}}',
	'example-welcome-title-user' => 'Title of the Welcome interface for logged-in users. $1 is the username.',
	'example-welcome-title-loggedout' => 'Title of the Welcome interface logged-out users.',
	'example-helloworld' => 'Title of Special:HelloWorld.',
	'example-helloworld-intro' => 'Intro paragraph shown on Special:HelloWorld.'
);
