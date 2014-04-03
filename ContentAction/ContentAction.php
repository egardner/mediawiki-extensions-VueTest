<?php
/**
 * An extension that demonstrates how to use the SkinTemplateContentActions
 * hook to add a new content action
 *
 * @author Ævar Arnfjörð Bjarmason <avarab@gmail.com>
 * @copyright Copyright © 2005, Ævar Arnfjörð Bjarmason
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Content action hook',
	'author' => 'Ævar Arnfjörð Bjarmason',
	'descriptionmsg' => 'contentaction-desc',
);

$wgHooks['UnknownAction'][] = 'wfAddactActionHook';
$wgHooks['SkinTemplateNavigation'][] = 'wfAddactionContentHook';

$wgMessagesDirs['ContentAction'] = __DIR__ . '/i18n';

function wfAddActionContentHook( $skin, &$content_actions ) {
	$action = $skin->getRequest->getText( 'action' );

	if ( $skin->getTitle()->getNamespace() != NS_SPECIAL ) {
		$content_actions['actions']['myact'] = array(
			'class' => $action === 'myact' ? 'selected' : false,
			'text' => wfMessage( 'contentaction-myact' )->text(),
			'href' => $skin->getTitle()->getLocalUrl( 'action=myact' )
		);
	}

	return true;
}

function wfAddactActionHook( $action, $article ) {
	$title = $article->getTitle();

	if ( $action === 'myact' ) {
		$article->getContext()->getOutput()->addWikiText(
			'The page name is ' . $title->getText() . ' and you are ' . $article->getUserText()
		);
		return false;
	}

	return true;
}
