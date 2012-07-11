<?php
class ApiQueryExample extends ApiQueryBase {

	/**
	 * Constructor is optional. Only needed if we give
	 * this module properties a prefix (in this case we're using
	 * "ex" as the prefix for the module's properties.
	 * Query modules have the convention to use a property prefix.
	 * Base modules generally don't use a prefix, and as such don't
	 * need the constructor in most cases.
	 */
	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'ex' );
	}

	/**
	 * In this example we're returning one ore more properties
	 * of wgExampleFooStuff. In a more realistic example, this
	 * method would probably
	 */
	public function execute() {
		global $wgExampleFooStuff;
		$params = $this->extractRequestParams();

		$stuff = array();

		// This is a filtered request, only show this key if it exists,
		// (or none, if it doesn't exist)
		if ( isset( $params['key'] ) ) {
			$key = $params['key'];
			if ( isset( $wgExampleFooStuff[$key] ) ) {
				$stuff[$key] = $wgExampleFooStuff[$key];
			}

		// This is an unfiltered request, replace the array with the total
		// set of properties instead.
		} else {
			$stuff = $wgExampleFooStuff;
		}

		$r = array( 'stuff' => $stuff );
		$this->getResult()->addValue( null, $this->getModuleName(), $r );
	}

	public function getAllowedParams() {
		return array(
			'key' => array(
				ApiBase::PARAM_TYPE => 'string',
			),
		);
	}

	public function getParamDescription() {
		return array(
			'key' => 'Reduce the result to only one of the foo properties.',
		);
	}

	public function getDescription() {
		return 'Get information about foo';
	}

	protected function getExamples() {
		return array(
			'api.php?action=query&list=example',
			'api.php?action=query&list=example&key=do',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
}
