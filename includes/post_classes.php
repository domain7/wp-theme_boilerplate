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
			$classes[] = 'post-full';
		} else {
			$classes[] = 'listing-item';
		}

		// Has feature image
		if ( has_post_thumbnail() ) {
			// Using a dash instead of underscore because WP turns it
			// into that anyway and I want to be more transparent
			$classes[] = 'has-post-thumbnail';
		}

		// Has other acf images, add classes for those
		$fields = get_fields();

		foreach ( $fields as $field => $field_content ) {

			if ( isset($field_content['sizes']) && count($field_content['sizes']) ) {

				$classes[] = 'has-image-' . $field;

			}

		}

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
