<?php

add_action('after_setup_theme', 'd7_theme_setup');
add_filter('stylesheet_uri', 'd7_stylesheet_uri', 10, 2);

function d7_theme_setup() {

	global $content_width;

	// Set the $content_width for things such as video embeds.
	// http://codex.wordpress.org/Content_Width
	if ( !isset( $content_width ) )
		$content_width = 1000;

	add_theme_support('automatic-feed-links'); // http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
	add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption')); 	// http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5

}

// Change the stylesheet url to our compiled stylesheet from Sassyplayte - https://bitbucket.org/domain7/sassyplate
function d7_stylesheet_uri($stylesheet_uri, $stylesheet_dir_uri){
	return $stylesheet_dir_uri . '/stylesheets/css/screen.css';
}

// Clean up <head> and improve security.
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links', 2 );
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
