<?php

	/**
	 * Determines if the current listing is the homepage when the homepage is used for
	 * a feed of lates posts
	 *
	 * @package d7
	 * @subpackage boilerplate-theme
	 *
	 * @return bool Whether the current page is the homepage listing
	 *
	 */
	function d7_is_home_listing() {

		if ( is_front_page() && is_home() ) {
			return true;
		} else {
			return false;
		}

	}


	/**
	 * Determines if a certain page is for a listing (search results, archive, homepage feed, etc)
	 * This is useful for creating a single listing UI module. WordPress's core tests fragment this
	 * between archives and search results.
	 *
	 * @package d7
	 * @subpackage boilerplate-theme
	 *
	 * @return bool Whether the current page is a listing or not
	 *
	 */
	function d7_is_listing() {

		if ( is_search() || is_archive() || is_home() ) {
			return true;
		} else {
			return false;
		}

	}
