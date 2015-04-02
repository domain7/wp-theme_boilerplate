<?php

	/**
	 * Generates the excerpt portion of what gets printed in the template
	 *
	 *
	 * @package d7
	 * @subpackage boilerplate-theme
	 *
	 * @param int $limit Character limit for excerpt
	 * @param int $id post ID
	 *
	 * @return string HTML of excerpt
	 * @todo Rewrite this whole thing. It was stoled from the internet 5 years ago and has only been maintained a little bit
	 *
	 */
	function d7_excerpt($limit, $id) {

		if ( has_excerpt($id) ) {
			$content = get_post_field('post_excerpt', $id);
		} else {
			$content = get_post_field('post_content', $id);
		}

		$excerpt = explode(' ', $content, $limit);

		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		} else {
			$excerpt = implode(" ",$excerpt);
		}

		$excerpt = preg_replace('`\[[^\]]*]`','',$excerpt);
		$excerpt = preg_replace("/<img(.*?)>/si", "", $excerpt);
		$excerpt = preg_replace("/<em(.*?)>/si", "", $excerpt);

		return $excerpt;preg_replace('`\[[^\]]*]`','',$excerpt);

	}

	/**
	 * This function gets called in the template.
	 *
	 * ### Usage
	 * ```php
	 * d7_custom_excerpt($length=50,$more_txt='Read More',$echo=true);
	 * ```
	 *
	 * @package d7
	 * @subpackage boilerplate-theme
	 *
	 * @param int $length Excerpt length
	 * @param string $more_text Read more text
	 * @param bool $echo Echo or return the excerpt
	 * @param bool $id Get the excerpt by ID
	 *
	 * @uses d7_excerpt()
	 * @todo Rewrite this function to follow the pattern I've been using lately
	 * @return string|nill 	Echos the html or returns it
	 *
	 */
	function d7_custom_excerpt($length='',$more_txt='Read More',$echo=true, $id=false) {

		$post_id = $id ? $id : get_post()->ID;

		$default_length = 30;
		if (empty($length)) {
				$excerpt_length = $default_length;
			} else {
				$excerpt_length = $length;
			}
		$excerpt = d7_excerpt($excerpt_length, $post_id);

		if ( $more_txt ) {
			$link = '<a href="'.get_permalink(get_post()->ID).'" class="more_link">'.$more_txt.'</a>';
		}

		$output = $excerpt;
		if ( $more_txt ) {
			$output .= $link;
		}

		if ( $echo ) {
			echo wpautop($output, true);
		} else {
			return wpautop($output, true);
		}

	}
