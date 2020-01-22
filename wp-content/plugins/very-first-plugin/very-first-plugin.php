<?php
/**
 * Plugin Name: Very First Plugin
 * Plugin URI: http://kurghenry.ikt.khk.ee/
 * Description: This is the very first plugin I ever created.
 * Version: 1.0
 * Author: Henry Kurg
 * Author URI: http://kurghenry.ikt.khk.ee/
 * */
 
 function nimed_suur_t2ht( $content ) {
	$search  = array( 'Booking', 'Calendar', 'Appointment', 'Hour', 'WpDevArt' );
	$replace = array( 'BOOKING', 'CALENDAR', 'APPOINTMENT', 'HOUR', 'WPDEVART' );
	return str_replace( $search, $replace, $content );
}
add_filter( 'the_content', 'nimed_suur_t2ht' );