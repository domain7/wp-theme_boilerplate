<?php

	/**
	 * Print classes depending on images that might be in a post
	 *
	 * @package d7
	 * @subpackage boilerplate-theme
	 *
	 * @param array $classes The classes array
	 * @return array The updated classes array
	 *
	 */
	function d7_post_image_classes($classes) {

		if ( d7_is_listing() ) {
			return $classes;
		}

		// Has feature image
		if ( has_post_thumbnail() ) {
			// Using a dash instead of underscore because WP turns it
			// into that anyway and I want to be more transparent
			$classes[] = 'has-post-thumbnail';
		}

		// ACF images
		if ( function_exists('get_fields') ) {

			$fields = get_fields();

			foreach ( $fields as $field => $field_content ) {

				if ( is_array($field_content) && isset($field_content['sizes']) && count($field_content['sizes']) ) {
					$classes[] = 'has-image';
					$classes[] = 'has-image-' . $field;
				}

			}

		}

		// Return the classes array
		return $classes;

	}
