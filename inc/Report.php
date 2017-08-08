<?php

/**
 * A class for reporting on calls.
 *
 * @package WordPress
 * @subpackage Waiver_Alert
 * @since Waiver_Alert 0.1
 */
namespace Waiver_Alert;

class Report {

	function __construct( $call ) {

		$this -> call = $call;

	}

	function get() {

		$out = '';

		$call = $this -> call;

		$clutter = 'Waiver Report ';

		$date = str_replace( $clutter, '', $call );

		$last_waiver_time = get_option( 'wa_last_waiver_time' );

		$current_waiver_time = strtotime( $date );

		if( $last_waiver_time < $current_waiver_time ) {

			update_option( 'wa_last_waiver_time', $current_waiver_time );

			$out = esc_html__( 'Waivers have processed.', 'wa' );

		} else {

			$out = esc_html__( 'Waivers have not yet processed.', 'wa' );

		}

		wp_mail( get_bloginfo( 'admin_email' ), 'Waiver Alert', $out );

		return $out;

	}

}