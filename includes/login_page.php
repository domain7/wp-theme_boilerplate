<?php
function custom_login_logo() {
	$logo = '/images/sprites/common-1x/logo.png';
	$logoPath = get_template_directory() . $logo;
	$logoURL = get_template_directory_uri() . $logo;
	if (file_exists($logoPath)) { ?>
		<style type="text/css">
			.login h1 a {
				background-image:url('<?php echo $logoURL; ?>');
				height: 92px; /* set this to height of logo image */
				width: auto;
				margin-bottom: 0;
				background-size: initial;
				padding-bottom: 20px;
			}
		</style>
	<?php }
}

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


// Uncomment the following to use custom CSS & JS on the login page
/*
function custom_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/stylesheets/css/login-page.css' );
    wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/js/src/login-page.js' );
}
add_action( 'login_enqueue_scripts', 'custom_login_stylesheet' );
*/
