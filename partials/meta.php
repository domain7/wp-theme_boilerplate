<?php

	// Post category
	$category = get_the_category($post->ID);

	// Tags
	$tags = wp_get_post_tags($post->ID);

	// Custom fields
	$custom_fields = d7_get_custom_fields($post->ID);

?>

<ul class="post_meta">

	<!-- Post date -->
	<li class="date"><?php echo get_the_date(); ?></li>

	<!-- Category -->
	<?php if ( $category ): ?>
		<li class="post_meta-item category">
			<span class="post_meta-key"><?php _e('Category'); ?>: </span>
			<span class="post_meta-value"><?php the_category(', ') ?></span>
		</li>
	<?php endif; ?>

	<!-- Tags -->
	<?php if ( $tags ): ?>
		<li class="post_meta-item tags"><?php the_tags('',', ',''); ?></li>
	<?php endif; ?>

	<!-- Custom fields -->
	<?php foreach ( $custom_fields as $field => $value ) : ?>
		<li class="post_meta-item custom_field">
			<span class="post_meta-key"><?php echo $field; ?>: </span>
			<span class="post_meta-value"><?php echo $value[0]; ?></span>
		</li>
	<?php endforeach; ?>

</ul><!-- .post-meta -->
