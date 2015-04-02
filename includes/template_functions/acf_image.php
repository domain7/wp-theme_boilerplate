<?php

	/**
	 * Returns html for an ACF image
	 *
	 * ### Usage:
	 * ```php
	 * $image = d7_get_acf_image($image, $size, $classes);
	 * if ( $image ) {
	 *	echo $image;
	 * }
	 * ```
	 *
	 * @package d7
	 * @subpackage boilerplate-theme
	 *
	 * @param array  $image 				Image array as returned by ACF
	 * @param string $size 					Image size
	 * @param string $classes 				Classes to be added
	 * @link http://www.advancedcustomfields.com/resources/image/
	 * @return string 						HTML output
	 *
	 */
	function d7_get_acf_image($image, $size, $classes) {

		$img = '<img src="' . $image['sizes'][$size] . '"';

		// Alt
		if ( !empty($image['alt']) ) {
			$img .= ' alt="' . $image['alt'] . '"';
		}

		// Title
		if ( !empty($image['title']) ) {
			$img .= ' title="' . $image['title'] . '"';
		}

		// Classes
		if ( $classes ) {
			$img .= ' class="' . $classes . '"';
		}

		// width/height
		$img .= ' width="' . $image['sizes'][$size . '-width'] . '"';
		$img .= ' height="' . $image['sizes'][$size . '-height'] . '" />';

		return $img;

	}

	/**
	 * Echos the output from d7_get_acf_image, which returns html for an ACF image
	 *
	 * ### Usage:
	 * ```php
	 * d7_acf_image(get_field('photo'), 'large', 'post-photo');
	 * ```
	 *
	 * @package d7
	 * @subpackage boilerplate-theme
	 *
	 * @param array  $image 				Image array as returned by ACF
	 * @param string $size 					Image size
	 * @param string $classes 				Classes to be added
	 * @uses d7_get_acf_image()
	 * @link http://www.advancedcustomfields.com/resources/image/
	 *
	 */
	function d7_acf_image($image, $size, $classes) {
		echo d7_get_acf_image($image, $size, $classes);
	}
