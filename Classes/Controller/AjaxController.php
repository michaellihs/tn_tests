<?php

class Tx_TnTests_Controller_AjaxController
	extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * Sample actions returns GET and POST vars in json encoding
	 *
	 * @return string JSON encoded GP vars
	 */
	public function testAction() {
		return json_encode(
			array(
				'GET' => t3lib_div::_GET(),
				'POST' => t3lib_div::_POST()
			)
		);
	}

}
?>