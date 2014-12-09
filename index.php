<?php get_header(); ?>

	<section id="main">

		<section id="main_content">

			<?php if ( !is_single() && !is_page() ): ?>
				<h2 class="page_title"><?php page_title(); ?></h2>
			<?php endif; ?>

			<?php
				if ( have_posts() ) :

					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post type-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post type) and that will be used instead. For post type content layout
						 * create a new partials/content-POSTTYPE.php file. If none is found content.php will be used.
						 */
						get_template_part( 'partials/content', get_post_type() );

					endwhile;

					// Pagination
					get_template_part('partials/pagination');

				else :

					// If no content, include the "No posts found" template.
					get_template_part( 'partials/content', 'none' );

				endif;
			?>

		</section><!--  #main_content-->

		<?php get_sidebar(); ?>

	</section><!--  #main -->

<?php get_footer(); ?>
