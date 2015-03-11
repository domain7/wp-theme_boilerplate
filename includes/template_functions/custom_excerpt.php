<?php

	/**
	 * Custom excerpts
	 */

	// excerpt() generates the excerpt portion of what gets printed in the template
	function excerpt($limit, $id) {

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

	// This function gets called in the template
	function custom_excerpt($length='',$more_txt='Read More',$echo=true, $id=false) {

		$post_id = $id ? $id : get_post()->ID;

		$default_length = 30;
		if (empty($length)) {
				$excerpt_length = $default_length;
			} else {
				$excerpt_length = $length;
			}
		$excerpt = excerpt($excerpt_length, $post_id);

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
