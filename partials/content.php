<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header>

		<h1 class="page__title"><?php the_title(); ?></h1>

		<?php get_template_part('partials/meta', get_post_type()); ?>

	</header>

	<div class="post__content wysiwyg">
		<?php the_content(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->

<?php comments_template(); ?>
