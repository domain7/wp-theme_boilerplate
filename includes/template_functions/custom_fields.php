<?php

	/**
	 * Get array of custom fields
	 */
	function d7_get_custom_fields($id = false) {

		// Get the post ID
		if ( !$id ) {
			$id = get_the_ID();
		}

		// Get custom fields
		$custom = get_post_custom($id);

		// Grab ACF fields
		$acf = false;
		if ( function_exists('get_fields') ) {
			$acf = get_field_objects($id);
		}

		// We're going to filter a bit and store the result here
		$custom_fields = array();

		// Loop through and exclude underscore prefixed fields and ACF fields
		foreach ( $custom as $key => $value ) {

			// Exclude underscore prefixed keys
			if ( substr($key, 0, 1) == '_' ) {
				continue;
			}

			// Skip acf fields
			if ( $acf && isset($acf[$key]) ) {
				continue;
			}

			$custom_fields[$key] = $value;

		}

		// Loop through ACF fields too
		foreach ( $acf as $key => $value ) {

			// Exclude underscore prefixed keys
			if ( substr($key, 0, 1) == '_' ) {
				continue;
			}

			// Only doing text fields
			if ( $value['type'] == 'text' ) {
				$custom_fields[$value['label']][] = get_field($value['name']);
			}
		}

		return $custom_fields;

	}
