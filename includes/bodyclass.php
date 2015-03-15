<?php

add_filter('body_class','expand_body_classes');

function expand_body_classes($classes, $class='') {
	global $wp_query;

	if ( isset($wp_query->queried_object) ) {

		// Post type
		if ( isset($wp_query->queried_object->post_type) ) {
			$classes[] = 'post_type-' . $wp_query->queried_object->post_type;
		}

		// Post name
		if ( isset($wp_query->queried_object->post_name) ) {
			$classes[] = 'post_name-' . $wp_query->queried_object->post_name;
		}

		// Taxonomy
		if ( isset($wp_query->queried_object->taxonomy) ) {
			$classes[] = 'taxonomy-' . $wp_query->queried_object->taxonomy;
		}

		// Taxonomy term
		if ( isset($wp_query->queried_object->taxonomy) ) {
			$classes[] = 'taxonomy_term-' . $wp_query->queried_object->slug;
		}

		// Taxonomy ID
		if ( isset($wp_query->queried_object->cat_ID) ) {
			$classes[] = 'taxonomy_id-' . $wp_query->queried_object->cat_ID;
		}

		// Taxonomy term ID
		if ( isset($wp_query->queried_object->term_id) ) {
			$classes[] = 'taxonomy_term_id-' . $wp_query->queried_object->term_id;
		}

	} // if isset

	return $classes;// return the $classes array
}
