<?php

function custom_login_logo() { ?>
	<style type="text/css">
		h1 a {
			background-image:url('<?php get_template_directory_uri() ?>/images/logo.png');
			padding-bottom: 30px;
			background-size: initial;
			width: auto;
			margin-bottom: 0;
		}
	</style>
<?php }

add_filter( 'login_head', 'custom_login_logo' );


// Change login page logo link
function custom_login_url(){
	return get_bloginfo('url');
}

add_filter('login_headerurl', 'custom_login_url');


// Changes login page logo title
function custom_login_title() {
	return get_bloginfo('name');
}

add_filter('login_headertitle', 'custom_login_title');


/*
// Add custom CSS & JS to login page
function custom_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/stylesheets/css/login-page.css' );
    wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/js/src/login-page.js' );
}
add_action( 'login_enqueue_scripts', 'custom_login_stylesheet' );
*/
