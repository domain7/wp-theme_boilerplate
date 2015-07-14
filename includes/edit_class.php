<?php

add_filter('edit_post_link', function($output) {

	$output = str_replace('class="post-edit-link"', 'class="editable__link"', $output);
	return $output;

});
