<?php get_header(); ?>

	<div class="l-main">

		<section class="l-content">

			<h2 class="u-screen-reader">Main content</h2>

			<?php if ( !is_single() && !is_page() && !is_home() ): ?>
				<h1 class="page-title"><?php wp_title(false); ?></h1>
			<?php endif; ?>

			<?php

				if ( have_posts() ) :

					// For listings, add a but of markup
					if ( is_archive() || is_search() ) {
						echo '<div class="listing">';
					}

					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post type-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post type) and that will be used instead. For post type content layout
						 * create a new partials/content-POSTTYPE.php file. If none is found content.php will be used.
						 *
						 * partials/listing is used on archives and search results, while content is used for
						 * full content post/page views.
						 */

						if ( is_archive() || is_search() ) {
							get_template_part('partials/listing', get_post_type());
						} else {
							get_template_part('partials/content', get_post_type());
						}

					endwhile;

					// For listings, add a but of markup
					if ( is_archive() || is_search() ) {
						echo '</div>';
					}

					// Pagination
					get_template_part('partials/pagination', get_post_type());

				else :

					// If no content, include the "No posts found" template.
					get_template_part('partials/content', 'none');

				endif;
			?>

		</section><!--  .l-content-->

		<?php get_sidebar(get_post_type()); ?>

	</div><!--  .l-main -->

<?php get_footer(); ?>
