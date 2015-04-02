<?php

	/**
	 * Return document title, used in the title tag and og:title.
	 *
 	 * @package d7
	 * @subpackage boilerplate-theme
	 *
	 * @link https://codex.wordpress.org/Function_Reference/wp_title WordPress's wp_title() function
	 *
	 * @return string 	Title for the head
	 *
	 */
	function d7_get_document_title() {

		if ( is_home() ) {
			return get_bloginfo('name');
		} else {
			return wp_title('-', false, 'right') . get_bloginfo('name');
		}


	}

	/**
	 * Print the document title, used in the title tag and og:title.
	 *
	 * ### Usage
	 * ```php
	 * <title><?php document_title(); ?></title>
	 * ```
	 * @package d7
	 * @subpackage boilerplate-theme
	 *
	 * @uses d7_get_document_title()
	 * @link https://codex.wordpress.org/Function_Reference/wp_title WordPress's wp_title() function
	 *
	 */
	function d7_document_title() {
		echo d7_get_document_title();
	}
