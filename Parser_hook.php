<?php
if ( !defined( 'MEDIAWIKI' ) ) die();
/**
 * A parser hook example, use it on a page like
 * <hook arg1="foo" arg2="bar" ...>input</hook>
 *
 * @file
 * @ingroup Extensions
 *
 * @author Ævar Arnfjörð Bjarmason <avarab@gmail.com>
 * @author Niklas Laxström
 * @copyright Copyright © 2005, Ævar Arnfjörð Bjarmason
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,
	'name' => 'Parser hook',
	'description' => 'a sample parser hook',
	'author' => 'Ævar Arnfjörð Bjarmason'
);

$wgHooks['ParserFirstCallInit'][] = 'wfParserHook';

function wfParserHook( $parser ) {
	$parser->setHook( 'hook' , 'wfParserHookParse' );
	return true;
}

/**
 * @param string $in The input passed to <hook>
 * @param array $argv The attributes of the <hook> element in array form
 */
function wfParserHookParse( $data, $params, $parser ) {
	if ( !count( $params ) ) {
		return $data;
	} else {
		return '<pre>' . $data . "\n" . print_r( $params, true ) . '</pre>';
	}
}

