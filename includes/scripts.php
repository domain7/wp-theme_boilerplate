<?php

add_action( 'wp_enqueue_scripts', 'd7_enqueue_scripts' );

/**
 * @package d7
 * @subpackage boilerplate-theme_filters+hooks
 * @internal only called by `wp_enqueue_scripts` action
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @link http://codex.wordpress.org/Function_Reference/wp_register_script
 * @link http://codex.wordpress.org/Function_Reference/get_bloginfo
 *
 * @uses get_bloginfo()         returns information about your site.
 * @uses wp_enqueue_script()    Enqueues javascript.
 */
function d7_enqueue_scripts() {
	$script_location = 'js/main.js';
	wp_enqueue_script('basic', get_bloginfo('template_directory') . '/' . $script_location , array('jquery'), '1.0');

	$wp_object = array(
		'templateUrl' => get_bloginfo('template_url'),
		'stylesheetUrl' => get_bloginfo('stylesheet_url'),
		'stylesheetDirectory' => get_bloginfo('stylesheet_directory'),
		'siteName' => get_bloginfo('name'),
		'description' => get_bloginfo('description'),
		'currentTheme' => get_current_theme(),
		'url' => get_bloginfo('url'),
	);

	wp_localize_script('basic', 'D7WP', $wp_object);

	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
