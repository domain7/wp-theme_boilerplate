<?php

	// Custom fields
	$custom_fields = d7_get_custom_fields($post->ID);

?>

<ul class="post_meta">

	<!-- Custom fields -->
	<?php foreach ( $custom_fields as $field => $value ) : ?>
		<li class="post_meta-item custom_field">
			<span class="post_meta-key"><?php echo $field; ?>: </span>
			<span class="post_meta-value"><?php echo $value[0	]; ?></span>
		</li>
	<?php endforeach; ?>

</ul><!-- .post-meta -->
