<?php

/**
 * Rewrite the markup for the gallery shortcode so that all gallery images
 * can open with fresco.js. The link to attachment page is not respected,
 * and size/column classes are added.
 *
 * @package d7
 * @subpackage boilerplate-theme_filters+hooks
 *
 * @internal only called by `post_gallery` filter
 *
 */
function d7_gallery_shortcode( $output = '', $atts, $content = false, $tag = false ) {

	// Get thumbnail size
	$size = isset($atts['size']) ? $atts['size'] : 'thumbnail';

	// Get column count. 3 is the default
	$columns = isset($atts['columns']) ? $atts['columns'] : 3;

	$output = '<div class="gallery galery--size-' . $size . ' gallery--columns-' .$columns . '">';

		// Load each item
		$ids = explode(",", $atts['include']);
		foreach ( $ids as $id ) {


			$image_large = wp_get_attachment_image_src($id, 'large');

			$image = wp_get_attachment_image($id, $size);
			$output .= '<figure class="gallery-item galery-item--size-' . $size . ' galery-item--columns-' . $columns . '">';

			// Unless link is set to none, link it!
			if ( $atts['link'] !== 'none' ) {
				$output .= '<a class="fresco" data-fresco-group="' . get_the_ID() . '" href="' . $image_large[0] . '">';
			}

			// Image actual
			$output .= $image;

			// Close link if we're linking
			if ( $atts['link'] !== 'none' ) {
				$output .= '</a>';
			}

			// Close figure
			$output .= '</figure>';

		}

	$output .= '</div>';

	return $output;

}
add_filter( 'post_gallery', 'd7_gallery_shortcode', 10, 4 );


/**
 * Do some regex to add a fresco-image class to linked images, and open them with fresco.
 *
 * @package d7
 * @subpackage boilerplate-theme_filters+hooks
 *
 * @internal only called by `the_content` filter
 * @todo figure out how to write regex to match the link around the image and add a fresco class to that
 *
 */
function d7_add_fresco_class($content) {

   global $post;

   // Do some regex to add a class
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 fresco-image"$3>';
   $content = preg_replace($pattern, $replacement, $content);

   return $content;

}
add_filter('the_content', 'd7_add_fresco_class');


/**
 * Load fresco.js and fresco.css
 *
 * @package d7
 * @subpackage boilerplate-theme_filters+hooks
 *
 * @internal only called by `wp_enqueue_scripts` action
 */
function d7_load_fresco() {

	wp_enqueue_script('fresco_js', get_bloginfo('template_directory') . '/includes/fresco/fresco.js', array('jquery'), '1', true);
	wp_enqueue_script('fresco_js_inline', get_bloginfo('template_directory') . '/includes/fresco/frescoInline.js', array('jquery', 'fresco_js'), '1', true);
	wp_enqueue_style('fresco_css', get_bloginfo('template_directory') . '/includes/fresco/fresco.css');

}

add_action( 'wp_enqueue_scripts', 'd7_load_fresco' );
