<?php

/**
 * Load scripts. First we have a really complex method of loading jQuery from the CDN or local
 * should the CDN fail. The code is adapted from https://gist.github.com/wpsmith/4083811.
 * Then we load basic styles.
 */

add_action( 'wp_enqueue_scripts', 'wps_enqueue_jquery' );

/**
 * Enqueue jQuery from Google CDN with fallback to local WordPress
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @link http://codex.wordpress.org/Function_Reference/wp_register_script
 * @link http://codex.wordpress.org/Function_Reference/wp_deregister_script
 * @link http://codex.wordpress.org/Function_Reference/get_bloginfo
 * @link http://codex.wordpress.org/Function_Reference/is_wp_error
 * @link http://codex.wordpress.org/Function_Reference/set_transient
 * @link http://codex.wordpress.org/Function_Reference/get_transient
 *
 * @uses get_transient()        Get the value of a transient.
 * @uses set_transient()        Set/update the value of a transient.
 * @uses is_wp_error()          Check whether the passed variable is a WordPress Error.
 * @uses get_bloginfo()         returns information about your site.
 * @uses wp_deregister_script() Deregisters javascripts for use with wp_enqueue_script() later.
 * @uses wp_register_script()   Registers javascripts for use with wp_enqueue_script() later.
 * @uses wp_enqueue_script()    Enqueues javascript.
 */
function wps_enqueue_jquery() {
	// Setup Google URI, default
	$protocol = ( isset( $_SERVER['HTTPS'] ) && 'on' == $_SERVER['HTTPS'] ) ? 'https' : 'http';
	// Get Latest Version
	$url = $protocol . '://code.jquery.com/jquery-1.11.1.min.js';

	// Get Specific Version
	//$url      = $protocol . '://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js';

	// Setup WordPress URI
	$wpurl =  get_bloginfo('template_directory') . '/js/jquery-1.11.1.min.js';

	// Setup version
	$ver = null;

	// Deregister WordPress default jQuery
	wp_deregister_script( 'jquery' );

	// Check transient, if false, set URI to WordPress URI
	delete_transient( 'google_jquery' );

	if ( 'false' == ( $google = get_transient( 'google_jquery' ) ) ) {
		$url = $wpurl;
	}
	// Transient failed
	elseif ( false === $google ) {
		// Ping Google
		$resp = wp_remote_head( $url );

		// Use Google jQuery
		if ( ! is_wp_error( $resp ) && 200 == $resp['response']['code'] ) {
			// Set transient for 5 minutes
			set_transient( 'google_jquery', 'true', 60 * 5 );
		}

		// Use WordPress jQuery
		else {
			// Set transient for 5 minutes
			set_transient( 'google_jquery', 'false', 60 * 5 );

			// Use WordPress URI
			$url = $wpurl;

			// Set jQuery Version, WP stanards
			$ver = '1.8.2';
		}
	}

	// Register surefire jQuery
	wp_register_script( 'jquery', $url, array(), $ver, true );

	// Enqueue jQuery
	wp_enqueue_script( 'jquery' );

	// Now load basic site js
	wp_enqueue_script('basic', get_bloginfo('template_directory').'/js/main.js', array('jquery'), '1.0');

	// For comment reply form
	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
