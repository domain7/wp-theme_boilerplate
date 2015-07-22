<?php

	/**
	 * Expand post classes.
	 *
	 * @package d7
	 * @subpackage boilerplate-theme_filters+hooks
	 *
	 * @internal called by `post_class` filter
	 *
	 */
	function d7_add_post_classes($classes) {

		// Full post or listing item
		if (is_single() || is_page()) {
			$classes[] = 'post';
			$classes[] = 'post--full';
		} else {
			$classes[] = 'listing__item';
		}

		// Has post thumbnail or other acf images, add classes for those
		$classes = d7_post_image_classes($classes);

		// Has comments or not
		if ( comments_open() && get_comments_number() ) {
			$classes[] = 'has-comments';
		} else {
			$classes[] = 'no-comments';
		}

		// Comments open/closed
		if ( comments_open() ) {
			$classes[] = 'can-comment';
		}

		return $classes;

	}

	add_filter('post_class', 'd7_add_post_classes');
