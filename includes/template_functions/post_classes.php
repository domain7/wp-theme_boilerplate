<?php

	/**
	 * Add custom classes to post_class()
	 */

	function d7_add_post_classes($classes) {

		// Full post or listing item
		if (is_single() || is_page()) {
			$classes[] = 'post-full';
		} else {
			$classes[] = 'listing-item';
		}

		// Has image
		if ( has_post_thumbnail() ) {
			// Using a dash instead of underscore because WP turns it
			// into that anyway and I want to be more transparent
			$classes[] = 'has-post-thumbnail';
		}

		return $classes;

	}

	add_filter('post_class', 'd7_add_post_classes');
