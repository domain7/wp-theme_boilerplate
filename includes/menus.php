<?php

add_action('init', 'd7_register_menus');

/**
 * Core menu registration.
 *
 * @package d7
 * @subpackage boilerplate-theme_filters+hooks
 * @internal called by init action
 * @link https://codex.wordpress.org/Function_Reference/register_nav_menus
 */
function d7_register_menus() {
	register_nav_menus(array(
		'primary' => __('Primary Nav', 'Admin - ' . get_bloginfo('name')  )
	));
}
