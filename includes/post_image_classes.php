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

				// Only work with arrays
				if ( is_array($field_content) ) {

					// For normal ACF images
					if ( isset($field_content['sizes']) && count($field_content['sizes']) ) {
						if ( !in_array('has-image', $classes) ) {
							$classes[] = 'has-image';
						}
						$classes[] = 'has-image--' . $field;
					} elseif (is_array($field_content)) {

						// Loop through the nested fields
						foreach ( $field_content as $nested_field => $nested_field_content ) {
							// Each repeater field
							foreach ($nested_field_content as $repeater_field => $repeater_field_content) {
								// If the nested field is an image, add that class too
								if ( is_array($repeater_field_content) && isset($repeater_field_content['sizes']) && count($repeater_field_content['sizes']) ) {
									if ( !in_array('has-iamge', $classes) ) {
										$classes[] = 'has-image';
									} // !in_array
									if ( !in_array($repeater_field, $classes) ) {
										$classes[] = 'has-image--' . $repeater_field;
									} // !in_array
								} // if it's an image field
							} // each repeater field
						} // foreach nested fields

					} // elseif

				} // field content is array

			} // foreach

		} // if get_fields

		// Return the classes array
		return $classes;

	}
