<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<?php if ( is_single() || is_page() ): ?>
				<h2 class="page_title"><?php the_title(); ?></h2>
			<?php else: ?>
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'lps' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<?php endif; ?>
	
			<?php 
				if ( get_post_type() != 'page' ) {
					get_template_part('partials/meta');							
				}
			?>
		</header>
	<?php if ( is_single() || is_page() ) : // Only display excerpts for archives and search. ?>
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-summary">
			<?php custom_excerpt(45, "More Info"); ?>
		</div><!-- .entry-content -->
	<?php endif; ?>

	</article><!-- #post-## -->

	<?php comments_template( '', true ); ?>

<?php endwhile; endif; ?>