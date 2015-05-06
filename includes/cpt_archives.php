<?php

	$is_cpt_archive = false;

	/**
	 * This allows you to pass a `post_type` argument to wp_get_archives
	 * as a string or an array.
	 *
	 * ## Usage:
	 * <code>
	 * 	echo wp_get_archives(array(
	 *		'post_type' => 'car',
	 *	));
	 * </code>
	 *
	 * <code>
	 * 	$archives = wp_get_archives(array(
	 *		'post_type' => array('car', 'board')
	 *	));
	 * </code>
	 *
	 * @package d7
	 * @subpackage boilerplate-theme_filters+hooks
	 *
	 * @internal only called by `getarchives_where` filter
	 * @link http://codex.wordpress.org/Function_Reference/wp_get_archives Docs on wp_get_archives()
	 *
	 */
	function d7_custom_post_type_archive_where($where,$args){

		global $is_cpt_archive;

		if ( isset($args['post_type']) ) {

			$is_cpt_archive = $args['post_type'];

			// If post_type is an array do an IN query, otherwise normal WHERE
			if ( gettype($args['post_type']) == 'array' ) {

				$types = implode('\',\'', $args['post_type']);
			    $where = "WHERE post_type IN ('$types') AND post_status = 'publish'";

			} else {

				// Single posttype passed in as a string
				$post_type = $args['post_type'];
			    $where = "WHERE post_type = '$post_type' AND post_status = 'publish'";

			}

		} else {

			$is_cpt_archive = false;

			// Normal WHERE using post
			$where = "WHERE post_type = 'post' AND post_status = 'publish'";

		}

	    return $where;

	}

	add_filter('getarchives_where', 'd7_custom_post_type_archive_where', 10 , 2);


	/**
	 * Enable monthly archives to be filtered by custom post type set in wp_get_archives
	 *
	 * @todo Make the URL nicer
	 *
	 */

	// Day
	add_filter('day_link', function($daylink = false) {

		global $is_cpt_archive;

		if ( $is_cpt_archive ) {
			$daylink = substr($daylink, 0, -1);
			$daylink .= '?post_type=' . $is_cpt_archive;
		}

		return $daylink;

	});

	// Month
	add_filter('month_link', function($monthlink = false, $year = false, $month = false) {

		global $is_cpt_archive;

		if ( $is_cpt_archive ) {
			$monthlink = substr($monthlink, 0, -1);
			$monthlink .= '?post_type=' . $is_cpt_archive;
		}

		return $monthlink;

	});

	// Year
	add_filter('year_link', function($yearlink = false, $year = false) {

		global $is_cpt_archive;

		if ( $is_cpt_archive ) {
			$yearlink = substr($yearlink, 0, -1);
			$yearlink .= '?post_type=' . $is_cpt_archive;
		}

		return $yearlink;

	});
