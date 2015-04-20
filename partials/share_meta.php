<?php

	/**
	 * ===
	 * This first section creates our meta tag values
	 * ===
	 *
	 */


	$meta = array();


	/**
	 * Title
	 */
	$meta['title'] = false;

	// On the homepage use the site name
	if ( is_home() ) {
		$meta['title'] = trim(get_bloginfo('name'));
	} else {

		// Otherwise, use the document title
		$meta['title'] = trim(d7_get_document_title());

	}


	/**
	 * Site name
	 */

	$meta['site_name'] = get_bloginfo('name');


	/**
	 * URL
	 */

	$meta['url'] = empty($_SERVER['HTTPS']) ? 'http' : 'https';
	$meta['url'] .= '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];



	/**
	 * Description
	 */

	$meta['description'] = false;

	// For singles and pages, use the post body
	if ( is_single() || is_page() ) {
		$meta['description'] = $post->post_content;
		$meta['description'] = preg_replace('/\b(https?):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i', '', $meta['description']);
		$meta['description'] = strip_tags(trim(substr($meta['description'], 0, 1500)));
	} else {

		// If there's no post body use the site description
		$meta['description'] = get_bloginfo('description');

	}

	// Trim trim
	$meta['description'] = trim($meta['description']);


	/**
	 * Image
	 *
	 * $default_image can be set here for when there isn't an image.
	 * Feel free to expand this with conditions for images in custom fields.
	 *
	 */

	$meta['image'] = false;
	$default_image = false; // Set to something useful

	// If there's a post thumbnail, use it
	if ( has_post_thumbnail() && !is_archive() ) {
		$meta['image'] = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
		$meta['image'] = $meta['image'][0];
	} elseif($default_image) {

		// Otherwise, use the default
		$meta['image'] = $default_image;
	}



	/**
	 * ===
	 * This section prints the tag values in their various formats
	 * ===
	 *
	 */


	/**
	 * Print open graph tags
	 */

	$open_graph_attributes = array('title', 'site_name', 'url', 'description', 'image');

	foreach ( $meta as $tag => $value ) {
		if ( $value && in_array($tag, $open_graph_attributes) ) {
			echo '<meta property="og:' . $tag . '" content="' . $value . '" />' . "\n";
		}
	}


	/**
	 * Print Twitter card stuff
	 */

	$twitter_card_attributes = array('title', 'description', 'image', 'url');

	echo '<meta name="twitter:card" content="summary" />'  . "\n";

	foreach ( $meta as $tag => $value ) {
		if ( $value && in_array($tag, $twitter_card_attributes) ) {
			echo '<meta property="twitter:' . $tag . '" content="' . $value . '" />' . "\n";
		}
	}
