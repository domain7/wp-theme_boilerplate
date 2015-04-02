<!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 lt-ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 lt-ie6 lt-ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 lt-ie6 lt-ie7 lt-ie8 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="<?php bloginfo('language') ?>"><!--<![endif]-->
<head>

	<title><?php d7_document_title(); ?></title>

	<meta name="description" content="<?php bloginfo('description') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico?ver=2">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo get_bloginfo('rss2_url'); ?>" />

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

	<header id="masthead">
		<h1 class="site_name"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		<?php

			wp_nav_menu( array(
				'container' => 'nav',
				'container_id' => 'primary_nav',
				'theme_location' => 'primary'
				)
			);

			get_search_form();
		?>
	</header><!-- #masthead -->
