<?php

/**
 * A class for getting and setting the Waiver Alert subsite options.
 *
 * @package WordPress
 * @subpackage Waiver_Alert
 * @since Waiver_Alert 0.1
 */

namespace Waiver_Alert;

class SubsiteSettings {

	public function __construct() {}

	/**
	 * Get the unique namespace for our plugin subsite settings.  What you'd call in get_option( $slug ).
	 * 
	 * @return string The unique namespace for our plugin subsite settings.
	 */
	public function get_settings_slug() { return WAIVER_ALERT . '_subsite'; }

	/**
	 * Define our multidimensional array of sections and settings.
	 * 
	 * @return array A multidimensional array of sections and settings.
	 */
	public function get_settings_array() {

		$out = array();

		// Create the "section_1" section.
		$out['section_1'] = array(

			// The label for this settings section.
			'label' => esc_html__( 'Section 1', 'waiver_alert' ),
			
			// The array of settings for this section.
			'settings' => array(

	            // A setting.
				'setting_1' => array(

					// The user-facing label text for this setting.
					'label'    => esc_html__( 'Setting 1', 'waiver_alert' ),
					
					// The type of form input.
					'type'     => 'text',
					
					// Some notes for this setting.
					'notes'    => esc_html__( 'A setting in section 1', 'waiver_alert' ),

				// End this setting.
				),	

				// Another setting.
				'setting_2' => array(
					
					// The user-facing label text for this setting.
					'label'    => esc_html__( 'Setting 2', 'waiver_alert' ),
					
					// The type of form input.
					'type'     => 'textarea',
					
					// Some notes for this setting.
					'notes'    => esc_html__( 'Hello', 'waiver_alert' ),

				// End this setting.
				),
				
			// End the list of settings for this section.
			)

		// End this section.
		);
		
		// Create the "section_2" section.
		$out['section_2'] = array(

			// The label for this settings section.
			'label' => esc_html__( 'Section 2', 'waiver_alert' ),
			
			// The array of settings for this section.
			'settings' => array(

	            // A setting.
				'setting_1' => array(

					// The user-facing label text for this setting.
					'label'    => esc_html__( 'Setting 1', 'waiver_alert' ),
					
					// The type of form input.
					'type'     => 'text',
					
					// Some notes for this setting.
					'notes'    => esc_html__( 'A setting in section 2', 'waiver_alert' ),

				// End this setting.
				),	

				// Another setting.
				'setting_2' => array(
					
					// The user-facing label text for this setting.
					'label'    => esc_html__( 'Setting 2', 'waiver_alert' ),
					
					// The type of form input.
					'type'     => 'textarea',
					
					// Some notes for this setting.
					'notes'    => esc_html__( 'World', 'waiver_alert' ),

				// End this setting.
				),
				
			// End the list of settings for this section.
			)

		// End this section.
		);

		return $out;

	}

	/**
	 * Grab the values for all of our plugin settings.
	 * 
	 * @return array A call to get_option();
	 */
	public function get_settings_values() {

		$out = get_option( $this -> get_settings_slug() );

		return $out;

	}

}