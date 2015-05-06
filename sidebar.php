<section id="sidebar">

	<?php
		/**
		 * Sub menu using wp_nav_menu with sub_menu added
		 * @link http://domain7.github.io/wp-theme_boilerplate/docs/function-d7_wp_nav_menu_objects_sub_menu.html
		 * @link https://codex.wordpress.org/Function_Reference/wp_nav_menu
		 */
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container' => 'nav',
			'container_class' => 'menu subnav',
			'depth' => 2,
			'sub_menu' => true
			)
		);

		echo wp_get_archives(array(
			'post_type' => 'car',
			'type' => 'monthly'
		));

	?>

	<?php if ( is_active_sidebar( 'primary' ) ) : ?>
		<?php dynamic_sidebar( 'primary' ); ?>
	<?php else : ?>
	<?php endif; ?>
</section><!--  #sidebar -->
