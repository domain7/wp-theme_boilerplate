<?php

	/**
	 * Page title used in the content area of each page
	 */

	// Return custom page title
	function get_page_title() {

		$title = '';

		if ( is_category() ) {
			$title .= single_cat_title("", false);
		} elseif( is_tag() ) {
			$title .= 'Content tagged: ' . single_tag_title("", false);
		} elseif (is_day()) {
			$title .= 'Archive for ' . get_the_time('F jS, Y');
		} elseif (is_month()) {
			$title .= __('Archive for') . ' ' . get_the_time('F, Y');
		} elseif (is_year()) {
			$title .= __('Archive for') . ' ' . get_the_time('Y');
		} elseif (is_search()) {
			$title .= __('Search results');
			if ( isset($_GET['s']) ) {
				$title .= ' ' . __('for') . ' <span class="search_term">&quot;' . $_GET['s'] . '&quot;</span>';
			}
		} elseif (is_author()) {
			$title .= __('Author archive');
		} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
			$title .= __('Archives');
		} elseif (is_404()) {
			$title .= __('Oh darn!');
		} else {
			$title .= bloginfo('name');
		}

		return $title;

	}

	// Print page title
	function page_title() {
		echo get_page_title();
	}
