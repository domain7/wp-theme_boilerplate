<section id="sidebar">

	<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container' => 'nav',
			'container_class' => 'menu subnav',
			'depth' => 2,
			'sub_menu' => true
			)
		);
	?>

	<?php if ( is_active_sidebar( 'primary' ) ) : ?>
		<?php dynamic_sidebar( 'primary' ); ?>
	<?php else : ?>
	<?php endif; ?>
</section><!--  #sidebar -->
