<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header>

		<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', get_bloginfo('name') ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

		<?php get_template_part('partials/meta', get_post_type()); ?>

	</header>

	<div class="post-summary">
		<?php d7_custom_excerpt(45, "More Info"); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
