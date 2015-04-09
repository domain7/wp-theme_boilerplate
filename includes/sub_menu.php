<?php

/**
 * Add a `sub_menu` option to `wp_nav_menu()`. Great for sidebar sub nav. Several other
 * options are also added
 *
 * Only used in a `wp_nav_menu_objects` hook.
 *
 * ## Usage
 *
 * The following is an example of using `wp_nav_menu` with the added arguments:
 * <code>
 * <?php
 * wp_nav_menu( array(
 *
 *		// Normal wp_nav_menu stuff
 *		'theme_location' => 'primary',
 *		'container' => 'nav',
 *		'container_class' => 'menu subnav',
 *		'depth' => 2,
 *
 *		// Added argument to enable sub-menus
 *		'sub_menu' => true,
 *
 *		// Additional added arguments with defaults
 *		'expand_siblings' => false, // Whether or not sibling menu items's children should be expanded
 *		'direct_parent' => true, // Only use the current item as parent, or climb the tree
 *		'show_parent' => true, // Show the top level parent (probably the section name)
 *		'no_results_hide_parent' => true, // If show_parent is enabled but there's no menu, then hide the parent too
 *		'limit_depth_no_active' => true // If we're on a page where none of the subnav items are open, limit depth to 1
 *		)
 *	);
 *	?>
 * </code>
 *
 * @package d7
 * @subpackage boilerplate-theme_filters+hooks
 * @link https://codex.wordpress.org/Function_Reference/wp_nav_menu
 * @link https://developer.wordpress.org/reference/hooks/wp_nav_menu_objects/
 * @internal Only used in a `wp_nav_menu_objects` hook
 */
function d7_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {

	if ( isset($args->sub_menu) && $args->sub_menu === true ) {

		// Store some info about our menu items
		$root_id = 0;
		$active_in_array = false;
		$current_menu_item_id = 0;

		// find the current menu item
		foreach ( $sorted_menu_items as $menu_item ) {

			if ( $menu_item->current ) {

				// Set $active_in_array
				$active_in_array = true;

				// Set root
				$root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;

				// Set $current_menu_item_id
				$current_menu_item_id = $menu_item->ID;

				break;

			}

		}

		// find the top level parent
		if ( isset($args->direct_parent) && $args->direct_parent === false ) {

			$prev_root_id = $root_id;

			while ( $prev_root_id != 0 ) {

				foreach ( $sorted_menu_items as $menu_item ) {

					if ( $menu_item->ID == $prev_root_id ) {

						$prev_root_id = $menu_item->menu_item_parent;

						// don't set the root_id to 0 if we've reached the top of the menu
						if ( $prev_root_id != 0 ) {
							$root_id = $menu_item->menu_item_parent;
							break;
						}

					}

				} // foreach

			} // while

		} // Not direct_parent

		$menu_item_parents = [];

		// Loop through items and unset ones outside of the tree
		foreach ( $sorted_menu_items as $key => $item ) {

			// init menu_item_parents
			if ( $item->ID == $root_id ) {
				$menu_item_parents[$item->ID] = $item->title;
			}

			if ( array_key_exists($item->menu_item_parent, $menu_item_parents) ) {

				// part of sub-tree: keep!
				$menu_item_parents[$item->ID] = $item->title;

			} else if ( !((isset($args->show_parent) && (isset($args->show_parent) && $args->show_parent !== false) ) && array_key_exists($item->ID, $menu_item_parents)) ) {

				// not part of sub-tree: away with it!
				unset($sorted_menu_items[$key]);

		  }

		} // foreach

		// Figure out if there's an active item in the menu

		// Loop through the items and check if there is no active item in the array. If not, limit depth to 1.
		$active_in_array = false;
		foreach ( $sorted_menu_items as $key => $item ) {

			// Found an active one
			if ( $item->current == true ) {
				$active_in_array = true;
			}

		}

		// If show parent is set but that'd be the only thing returned, and no_results_hide_parent is true
		if ( (isset($args->no_results_hide_parent) && $args->no_results_hide_parent === true) && (isset($args->show_parent) && $args->show_parent === true) && count( $sorted_menu_items ) == 1 ) {
			unset($sorted_menu_items);
		}

		if ( !isset($args->limit_depth_no_active) || $args->limit_depth_no_active == true ) {

			// Time to unset some things
			if ( !$active_in_array ) {

				foreach ( $sorted_menu_items as $key => $item ) {

					// Unset ones that aren't direct children of the current item
					if ( $item->menu_item_parent != $root_id ) {
						unset($sorted_menu_items[$key]);
					}

				}

			}

		} // limit_depth_no_active

		// If there is an active item in the menu, only expand it's children (don't expand siblings)
		if ( $active_in_array && (!isset($args->expand_siblings) || $args->expand_siblings == false) ) {

			// Loop through items, unset some
			foreach ( $sorted_menu_items as $key => $item ) {

				// Unset items that aren't children of the root or current item
				if ( $item->menu_item_parent != $current_menu_item_id && $item->menu_item_parent != $root_id ) {
					unset($sorted_menu_items[$key]);
				}

			}

		}

		return $sorted_menu_items;

	// end if $args->sub_menu
	} else {
		return $sorted_menu_items;
	}

}

// add hook
add_filter( 'wp_nav_menu_objects', 'd7_wp_nav_menu_objects_sub_menu', 10, 2 );
