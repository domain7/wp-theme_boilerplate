<?php get_header(); ?>

	<section id="main">

		<section id="main_content">

			<?php if ( !is_single() && !is_page() ): ?>
				<h2 class="page_title"><?php page_title(); ?></h2>
			<?php endif; ?>

			<?php get_template_part('partials/loop'); ?>

		</section><!--  #main_content-->		

		<?php get_sidebar(); ?>

	</section><!--  #main -->

<?php get_footer(); ?>