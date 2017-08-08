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

	function __construct( $date ) {

		$this -> date = $date;

	}

	function get() {

		$out = '';

		$date = $this -> date;

		$format = $this -> get_datetime_format();


		$last_waiver_time = get_option( 'wa_last_waiver_time' );

		$last_waiver_date = date( $format, $last_waiver_time );

		$current_waiver_time = strtotime( $date );
		$current_waiver_date = date( $format, $current_waiver_time );


		if( $last_waiver_time < $current_waiver_time ) {

			update_option( 'wa_last_waiver_time', $current_waiver_time );

			$out = sprintf( esc_html__( 'Waivers recently processed at %s.', 'wa' ), $current_waiver_date );

		} else {

			$out = sprintf( esc_html__( 'Waivers have not processed since %s.', 'wa' ), $last_waiver_date );

		}

		wp_mail( get_bloginfo( 'admin_email' ), 'Waiver Alert', $out );

		return $out;

	}

	function get_datetime_format() {
		
		$d = get_option( 'date_format' );		
		$t = get_option( 'time_format' );

		$out = sprintf( esc_html__( '%s, %s', 'wa' ), $d, $t );

		return $out;

	}

}