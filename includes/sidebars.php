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


/**
 * Add classes for the active sidebars
 *
 * @package d7
 * @subpackage boilerplate-theme
 *
 */
function d7_sidebar_classes() {

	$sidebars = $GLOBALS['wp_registered_sidebars'];
	$class = false;
	$active_count = 0;

	// Add the number of sidebars
	if ( count($sidebars) ) {

		// Loop through active sidebars and return a classes string
		foreach ( $sidebars as $sidebar => $settings ) {

			// If it's active
			if ( is_active_sidebar($settings['id']) ) {

				// Name class
				$class .= 'has-sidebar-' . $sidebar . ' ';

				// Increment count
				$active_count++;
			}

		} // foreach

		// If there are sidebars, add the count too
		if ( $active_count ) {
			$class .= 'has-sidebars-' . $active_count;
		}

	} else {

		$class = 'no-sidebars';

	}

	return $class;

}
