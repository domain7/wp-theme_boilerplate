<?php

/**
 * MENUS
 *
 * Documentation:http://codex.wordpress.org/Function_Reference/register_nav_menus
 *
 */

add_action('init', 'd7_register_menus');

function d7_register_menus() {
	register_nav_menus(array(
		'primary' => __('Primary Nav')
	));
}

?>