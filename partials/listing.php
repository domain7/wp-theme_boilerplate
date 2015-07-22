<article id="post-<?php the_ID(); ?>" <?php post_class('editable'); ?>>

	<header>

		<h2 class="post__title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', get_bloginfo('name') ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php get_template_part('partials/meta', get_post_type()); ?>

	</header>

	<div class="post__content post__content--summary wysiwyg">
		<?php d7_custom_excerpt(45, "More Info"); ?>
	</div><!-- .entry-content -->

	<?php edit_post_link('Edit'); ?>

</article><!-- #post-## -->
