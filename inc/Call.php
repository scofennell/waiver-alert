<?php

/**
 * A class for managing calls to ESPN.com.
 *
 * @package WordPress
 * @subpackage Waiver_Alert
 * @since Waiver_Alert 0.1
 */
namespace Waiver_Alert;

class Call {

	function __construct() {

		$this -> set_base();

		$this -> set_league_id();		

		$this -> set_url();

	}

	function get_league_id() {

		return $this -> league_id;

	}

	function set_league_id() {

		$this -> league_id = get_wa() -> subsite_settings -> get_value( 'setup', 'league_id' );

	}

	function set_base() {

		$this -> base = untrailingslashit( 'http://games.espn.com/ffl/waiverreport' );

	}

	function get_base() {

		return $this -> base;

	}

	function set_url() {

		$base = $this -> get_base();

		$out = add_query_arg( array( 'leagueId' => $this -> get_league_id() ), $base );

		$this -> url = $out;

	}

	function get_url() {

		return $this -> url;

	}

	function get() {

		$url = $this -> get_url();

		$get = wp_remote_get( $url );

		$body = $get['body'];

		@$classname    = 'games-pageheader';
		@$domdocument  = new \DOMDocument();
		@$domdocument -> loadHTML( $body );
		@$a            = new \DOMXPath( $domdocument );
		@$spans        = $a -> query( "//*[contains(@class, '$classname')]" );

		$out = $spans[0] -> textContent;

		return $out;

	}

}