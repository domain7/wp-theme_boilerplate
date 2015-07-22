<?php

	// Custom fields
	$custom_fields = d7_get_custom_fields($post->ID);

?>

<ul class="post-meta">

	<!-- Custom fields -->
	<?php foreach ( $custom_fields as $field => $value ) : ?>
		<li class="post-meta__item post-meta__item--custom_field">
			<span class="post-meta__key"><?php echo $field; ?>: </span>
			<span class="post-meta__value"><?php echo $value[0	]; ?></span>
		</li>
	<?php endforeach; ?>

</ul><!-- .post-meta -->
