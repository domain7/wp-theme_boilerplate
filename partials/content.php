<article id="post-<?php the_ID(); ?>" <?php post_class('post-full'); ?>>

	<header>

		<h2 class="page_title"><?php the_title(); ?></h2>

		<?php get_template_part('partials/meta', get_post_type()); ?>

	</header>

	<div class="post-content">
		<?php the_content(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->

<?php comments_template( '', true ); ?>
