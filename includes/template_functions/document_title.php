<?php

	/**
	 * Return document title, used in the title tag. This is legacy and should be revamped/
	 *
 	 * @package d7
	 * @subpackage boilerplate-theme
	 *
	 * @todo Look into replacing most of this with wp_title
	 * @link https://codex.wordpress.org/Function_Reference/wp_title WordPress's wp_title() function
	 * @return string 	Title for the head
	 *
	 */
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

	/**
	 * Print the document title. This is legacy and needs revamping.
	 *
	 * ### Usage
	 * ```php
	 * <title><?php document_title(); ?></title>
	 * ```
	 * @package d7
	 * @subpackage boilerplate-theme
	 *
	 * @uses get_document_title()
	 * @todo Look into replacing most of this with wp_title
	 * @link https://codex.wordpress.org/Function_Reference/wp_title WordPress's wp_title() function
	 *
	 */
	function document_title() {
		echo get_document_title();
	}
