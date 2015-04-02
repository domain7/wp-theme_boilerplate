<?php

add_action('widgets_init', 'd7_register_sidebars');

/**
 * Register WordPress Sitebars
 *
 * @package d7
 * @subpackage boilerplate-theme_filters+hooks
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function d7_register_sidebars() {
	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Primary Sidebar' ),
			'description' => __( 'The following widgets will appear in the main sidebar div.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		)
	);
}
