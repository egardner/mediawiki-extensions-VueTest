<?php
if (!defined('MEDIAWIKI')) die();
/**
 * An example parser hook that defines a new variable, {{EXAMPLE}}
 *
 * @package MediaWiki
 * @subpackage Extensions
 *
 * @author Ævar Arnfjörð Bjarmason <avarab@gmail.com>
 * @copyright Copyright © 2005, Ævar Arnfjörð Bjarmason
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgHooks['MagicWordMagicWords'][] = 'wfVariableHookWords';
$wgHooks['MagicWordwgVariableIDs'][] = 'wfVariableHookVariables';
$wgHooks['LanguageGetMagic'][] = 'wfVariableHookRaw';
$wgHooks['ParserGetVariableValueSwitch'][] = 'wfVariableHookSwitch';
$wgExtensionCredits['variable'][] = array(
	'name' => 'Parser hook',
	'description' => 'a sample variable hook',
	'author' => 'Ævar Arnfjörð Bjarmason'
);

function wfVariableHookWords( &$magicWords ) {
	$magicWords[] = 'MAG_EXAMPLE';
	
	return true;
}

function wfVariableHookVariables( &$wgVariableIDs ) {
	$wgVariableIDs[] = MAG_EXAMPLE;

	return true;
}

function wfVariableHookRaw( &$raw ) {
	$raw[MAG_EXAMPLE] = array( 0, 'EXAMPLE' );;

	return true;
}

function wfVariableHookSwitch( &$parser, &$varCache, &$index, &$ret ) {
	if ( $index === MAG_EXAMPLE )
		$ret = $varCache[$index] = wfVariableHookRet();
	
	return true;
}

function wfVariableHookRet() {
	return 'example';
}
