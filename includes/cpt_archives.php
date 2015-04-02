<?php

	/**
	 * This allows you to pass a `post_type` argument to wp_get_archives
	 * as a string or an array.
	 *
	 * @package d7
	 * @subpackage boilerplate-theme_filters+hooks
	 *
	 * @internal only called by `getarchives_where` filter
	 * @link http://codex.wordpress.org/Function_Reference/wp_get_archives Docs on wp_get_archives()
	 *
	 */
	function d7_custom_post_type_archive_where($where,$args){

		if ( isset($args['post_type']) ) {

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

			// Normal WHERE using post
			$where = "WHERE post_type = 'post' AND post_status = 'publish'";

		}

	    return $where;

	}

	add_filter('getarchives_where', 'd7_custom_post_type_archive_where', 10 , 2);
