<?php if (  $wp_query->max_num_pages > 1 ) : ?>

	<?php $page_number = get_query_var('paged'); ?>

	<nav class="navigation">
		<ul>
			<?php if ( $wp_query->max_num_pages > $page_number): ?>
				<li class="next"><?php next_posts_link( __( 'Next', 0 ) ); ?></li>
			<?php endif; ?>

			<?php if ( $page_number > 1 ): ?>
				<li class="previous"><?php previous_posts_link( __( 'Previous', 0 ) ); ?></li>
			<?php endif; ?>
		</ul>
	</nav><!-- #nav-below -->
<?php endif; ?>
