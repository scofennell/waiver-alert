<?php

/**
 * A wa for starting new plugins.
 *
 * @package WordPress
 * @subpackage Waiver_Alert
 * @since Waiver_Alert 0.1
 * 
 * Plugin Name: Waiver Alert
 * Plugin URI: https://www.lexblog.com
 * Description: A wa for starting new plugins.
 * Author: Angelo Carosio & Scott Fennell
 * Version: 0.1
 * Author URI: http://www.lexblog.com
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as 
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
	
// Peace out if you're trying to access this up front.
if( ! defined( 'ABSPATH' ) ) { exit; }

// Watch out for plugin naming collisions.
if( defined( 'WAIVER_ALERT' ) ) { exit; }
if( isset( $waiver_alert ) ) { exit; }

// A slug for our plugin.
define( 'WAIVER_ALERT', 'Waiver_Alert' );

// Establish a value for plugin version to bust file caches.
define( 'WAIVER_ALERT_VERSION', '0.1' );

// A constant to define the paths to our plugin folders.
define( 'WAIVER_ALERT_FILE', __FILE__ );
define( 'WAIVER_ALERT_PATH', trailingslashit( plugin_dir_path( WAIVER_ALERT_FILE ) ) );

// A constant to define the urls to our plugin folders.
define( 'WAIVER_ALERT_URL', trailingslashit( plugin_dir_url( WAIVER_ALERT_FILE ) ) );

// Our master plugin object, which will own instances of various classes in our plugin.
$waiver_alert  = new stdClass();
$waiver_alert -> bootstrap = WAIVER_ALERT . '\Bootstrap';

function get_wa() {

	global $waiver_alert;

	return $waiver_alert;

}

// Register an autoloader.
require_once( WAIVER_ALERT_PATH . 'autoload.php' );

// Execute the plugin code!
new $waiver_alert -> bootstrap;