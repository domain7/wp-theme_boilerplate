<?php

	/**
	 * Document title used in the <title> tag
	 */

	// Return document title
	function get_document_title() {	$title = '';

		$title = '';

		if ( function_exists('is_tag') && is_tag() ) {
			$title .= __('Tag Archive for') . '&quot;' . single_tag_title('', false) . '&quot; - ';
		} elseif ( is_archive() ) {
			$title .= trim(wp_title('', false));
			$title .= ' ' . __('Archive') . ' - ';
		} elseif ( is_search() ) {
			if ( isset($_GET['s']) ) {
				$title .= __('Search for') . ' &quot;' . esc_html($_GET['s']) . '&quot; - ';
			} else {
				$title .= __('Search results');
			}
		} elseif ( !(is_404()) && (is_single()) || (is_page()) ) {
			$title .= trim(wp_title('', false));
			$title .= ' - ';
		} elseif ( is_404() ) {
			$title .= __('Not Found') . ' - ';
		} if ( is_home() ) {
			$title .= get_bloginfo('name');
			$title .= ' - ';
			$title .= get_bloginfo('description');
		} else {
			$title .= get_bloginfo('name');
		}

		return $title;

	}

	// Print document title
	function document_title() {
		echo get_document_title();
	}

?>