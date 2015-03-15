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
			$acf = get_fields($id);
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

			// Skip arrays since we're just using text fields
			if ( is_array($value) ) {
				continue;
			}

			$custom_fields[$key][] = $value;

		}

		return $custom_fields;

	}
