<?php

/**
 * A class for managing plugin dependencies and loading the plugin.
 *
 * @package WordPress
 * @subpackage Waiver_Alert
 * @since Waiver_Alert 0.1
 */
namespace Waiver_Alert;

class Bootstrap {

	public function __construct() {

		add_action( 'plugins_loaded', array( $this, 'create' ), 100 );

	}

	/**
	 * Instantiate and store a bunch of our plugin classes.
	 */
	function create() {

		global $waiver_alert;

		$waiver_alert -> meta                  = new Meta;
		$waiver_alert -> post_meta_fields      = new PostMetaFields;		
		$waiver_alert -> config                = new Config;
		$waiver_alert -> subsite_settings      = new SubsiteSettings;
		$waiver_alert -> subsite_control_panel = new SubsiteControlPanel;
		
		return $waiver_alert;

	}

}