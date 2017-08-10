<?php
/**
 * Hooks for BoilerPlate extension
 *
 * @file
 * @ingroup Extensions
 */

class BoilerPlateHooks {

	/**
	 * @return GlobalVarConfig
	 */
	public static function makeConfig() {
		return new GlobalVarConfig( 'boilerplate' );
	}

}
