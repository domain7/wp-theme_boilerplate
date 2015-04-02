<?php

	/**
	 *	Add link name to css class of menu items
	 *
 	 * @package d7
	 * @subpackage boilerplate-theme_filters+hooks
	 *
	 * @internal called by `nav_menu_css_class` filter
	 *
	 */
	function d7_nav_class( $classes, $item ) {

		$classes[] = strtolower(str_replace("--", "", preg_replace("([^a-zA-Z])", "-", $item->title)));

	    return $classes;

	}

	add_filter('nav_menu_css_class', 'd7_nav_class', 10, 2);
