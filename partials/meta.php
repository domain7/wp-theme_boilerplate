<ul class="post_meta">
	<li class="date"><?php echo get_the_date(); ?></li>
	<li class="category"><?php the_category(', ') ?></li>
	<?php
	$post_tags = wp_get_post_tags($post->ID);
		if(!empty($post_tags)) { ?>
			<li class="tags"><?php the_tags('',', ',''); ?></li>
		<?php }
	?>
</ul><!-- .post-meta -->