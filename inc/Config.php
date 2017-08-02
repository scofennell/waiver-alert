<?php

/**
 * A class for getting info about the configuration of our plugin.
 *
 * @package WordPress
 * @subpackage Waiver_Alert
 * @since Waiver_Alert 0.1
 */

namespace Waiver_Alert;

class Config {

	function __construct() {

		global $waiver_alert;
		$this -> settings = $waiver_alert -> settings;

	}	

}