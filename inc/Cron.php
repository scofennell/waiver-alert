<?php

/**
 * Register our cron.
 *
 * @package WordPress
 * @subpackage Waiver_Alert
 * @since Waiver_Alert 0.1
 */

namespace Waiver_Alert;

class Cron {

	public function __construct() {

		add_filter( 'cron_schedules', array( $this, 'minutely' ) ); 

		add_action( 'init', array( $this, 'remove_event' ) );

		add_action( 'init', array( $this, 'add_event' ) );

		add_action( WAIVER_ALERT, array( $this, 'the_event' ) );

	}

	function minutely( $schedules ) {
		$schedules['minutely'] = array(
			'interval' => 60,
			'display'  => esc_html__( 'Minutely', 'cm' ),
		);
		return $schedules;
	}

	function the_event() {

		$call     = new Call;
		$get_call = $call -> get();

		$report = new Report( $get_call );
		$get_report = $report -> get();

	}

	function remove_event() {

		$update = get_wa() -> update;
		if( ! $update -> is_update() ) { return FALSE; }

		wp_clear_scheduled_hook( WAIVER_ALERT );

		return TRUE;

	}

	function add_event() {

		$update = get_wa() -> update;
		if( ! $update -> is_update() ) { return FALSE; }

		if ( ! wp_next_scheduled ( WAIVER_ALERT ) ) {
			wp_schedule_event( time(), 'minutely', WAIVER_ALERT );
		}

		return TRUE;

	}

}