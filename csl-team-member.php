<?php
/*
Plugin Name: Cornerstone Library: Team Members
Plugin URI:  http://cornerstonelibrary.com/
Description: Adds a new element to Cornerstone - a team member promo box which shows the bio in a lightbox when clicked on. Based on the promo box which comes default with Cornerstone
Version:     0.1
Author:      William Cobb
Author URI:  http://bigwilliam.com
Author Email: hello@bigwilliam.com
Text Domain: __x__
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
 * => Enqueue Scripts
 * ---------------------------------------------------------------------------*/
function csl_team_member_scripts() {
	wp_enqueue_script( 'csl-teammember-script', plugins_url( '/assets/js/custom.js', __FILE__ ), array( 'jquery' ), null, true );
	wp_enqueue_style( 'csl-teammember-css', plugins_url( '/assets/css/custom.css', __FILE__ ), array(), '1.1' );
}
add_action( 'wp_enqueue_scripts', 'csl_team_member_scripts', 100 );


/*
 * => Load Shortcodes
 * ---------------------------------------------------------------------------*/
require_once('shortcodes/teammember.php');

/*
 * => ADD CUSTOM ELEMENTS TO CORNERSTONE
 * ---------------------------------------------------------------------------*/
function csl_team_member_elements() {
	require_once( 'elements/teammember.php' );
  cornerstone_add_element( 'CSL_Team_Member' );
}
add_action( 'cornerstone_load_elements', 'csl_team_member_elements' );
