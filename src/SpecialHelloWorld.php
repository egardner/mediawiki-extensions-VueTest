<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * @file
 */

namespace MediaWiki\Extension\BoilerPlate;

use HTMLForm;
use MediaWiki\MediaWikiServices;
use SpecialPage;

/**
 * HelloWorld SpecialPage
 */
class SpecialHelloWorld extends SpecialPage {
	public function __construct() {
		parent::__construct( 'HelloWorld' );
	}

	/**
	 * Show the page to the user
	 *
	 * @param string $sub The subpage string argument (if any).
	 *  [[Special:HelloWorld/subpage]].
	 */
	public function execute( $sub ) {
		$out = $this->getOutput();

		$out->setPageTitle( $this->msg( 'boilerplate-helloworld' ) );

		$out->addHelpLink( 'How to become a MediaWiki hacker' );

		$out->addWikiMsg( 'boilerplate-helloworld-intro' );

		$formDescriptor = [
			'myfield1' => [
				'section' => 'section1/subsection',
				'label-message' => 'testform-myfield1',
				'type' => 'text',
				'default' => 'Meep',
			],
			'myfield2' => [
				'section' => 'section1',
				'label-message' => 'testform-myfield2',
				// HTMLTextField class is the same as type 'text'
				'class' => 'HTMLTextField',
			],
			'myfield3' => [
				'class' => 'HTMLTextField',
				'label' => 'Foo bar baz',
			],
			'myfield4' => [
				'class' => 'HTMLCheckField',
				'label' => 'This be a pirate checkbox',
				'default' => true,
			],
			'omgaselectbox' => [
				'class' => 'HTMLSelectField',
				'label' => 'Select an oooption',
				'options' => [
					'pirate' => 'Pirates',
					'ninja' => 'Ninjas',
					'ninjars' => 'Back to the NINJAR!'
				],
			],
			'omgmultiselect' => [
				'class' => 'HTMLMultiSelectField',
				'label' => 'Weapons to use',
				'options' => [ 'Cannons' => 'cannon', 'Swords' => 'sword' ],
				'default' => [ 'sword' ],
			]
		];

		// If foo is enabled, add another form field.
		$config = MediaWikiServices::getInstance()->getConfigFactory()->makeConfig( 'boilerplate' );
		if ( $config->get( 'BoilerPlateEnableFoo' ) ) {
			$formDescriptor['radiolol'] = [
				'class' => 'HTMLRadioField',
				'label' => 'Who do you like?',
				'options' => [
					'pirates' => 'Pirates',
					'ninjas' => 'Ninjas',
					'both' => 'Both'
				],
				'default' => 'pirates',
			];
		}

		// $htmlForm = new HTMLForm( $formDescriptor, $this->getContext(), 'testform' );
		$htmlForm = HTMLForm::factory( 'ooui', $formDescriptor, $this->getContext(), 'testform' );

		$htmlForm->setSubmitText( 'Foo submit' );
		$htmlForm->setSubmitCallback( function ( array $formData, HTMLForm $form ) {
			if ( $formData['myfield1'] === 'Fleep' ) {
				return true;
			}

			return 'HAHA FAIL';
		} );

		$htmlForm->show();
	}

	/**
	 * @return string
	 */
	protected function getGroupName() {
		return 'other';
	}
}
