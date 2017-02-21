<?php
/*
Plugin Name: Forest
Plugin URI:  https://www.georgebuckingham.com/
Description: Forest plugin (in development)
Version:     0.1
Author:      George Buckingham
Author URI:  https://www.georgebuckingham.com/
License:     TBC
License URI: https://www.georgebuckingham.com/
*/

/**
 * Load the Forest classes once all other plugins have loaded. We're waiting for Timber.
 */
add_action( 'plugins_loaded', 'forest_loader' );
function forest_loader()
{
	// Ensure Timber is available
	if( !class_exists( 'Timber\Timber' ) )
	{
		add_action( 'admin_notices', function() {
			echo '<div class="error"><p>Your theme (' . wp_get_theme() . ') is built on Forest, which requires Timber. Forest can\'t find your installation of Timber.</p></div>';
		});

		add_filter('template_include', function($template) {
			// return get_stylesheet_directory() . '/static/no-timber.html';
			return '<p>Your theme (' . wp_get_theme() . ') is built on Forest, which requires Timber. Forest can\'t find your installation of Timber.</p>';
		});

		return;
	}

	// Load the Forest classes
	require_once('loader.php');
}
