<?php
	
/*
Plugin Name: Feature This Post 
Description: Just another feature this post plugin.
Author: Philip Rudy
Version: 1.0
*/

define( 'FTP_PLUGIN', __FILE__ );

define( 'FTP_PLUGIN_DIR', untrailingslashit( dirname( WPCF7_PLUGIN ) ) );

add_action('admin_menu', 'ftp_menu');

function ftp_menu() {
	add_options_page('My Plugin Options', 'Featured Posts Options', 'manage_options', 'my-unique-identifier', 'ftp_options');
}

function ftp_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo "<img src=" . plugins_url('images/aircraft.jpg', __FILE__) . " />";
	echo '</div>';
}