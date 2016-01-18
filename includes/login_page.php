<?php

/**
 * Customize the login page to match site branding, link to homepage instead of wordpress.org
 *
 * @package d7
 * @subpackage boilerplate-theme_filters+hooks
 * @internal called by add_filter( 'login_head', 'd7_custom_login_logo' );
 *
 */
function d7_custom_login_logo() {

	$logo = false;

	// Create the URL of the logo
	$possible_logos = array(
		'/images/logo-login.png',
		'/images/sprites/common-1x/logo.png',
		'/images/sprites/common-compatibility/logo.png',
		'/images/logo.png',
		'/logo.png'
	);

	// Find the logo!
	foreach ( $possible_logos as $option ) {
		if ( file_exists( get_template_directory() . $option ) ) {
			$logo = $option;
			break;
		}
	}

	// If the logo exists, do some admin CSS
	if ( $logo ):

		// Get the image dimensions
		$logo_dimensions = getimagesize(get_template_directory() . $logo);
		$logo_height = isset($logo_dimensions[1]) ? $logo_dimensions[1] : '92';
		$logo_height = $logo_height . 'px';

	?>

		<style type="text/css">
			.login h1 a {
				background-image:url('<?php echo get_template_directory_uri() . $logo; ?>');
				height: <?php echo $logo_height; ?>;
				width: auto;
				margin-bottom: 0;
				background-size: initial;
				padding-bottom: 20px;
			}
		</style>

	<?php endif;
}

add_filter( 'login_head', 'd7_custom_login_logo' );


/**
 * Change the url when clicking login logo
 *
 * @package d7
 * @subpackage boilerplate-theme_filters+hooks
 * @internal called by login_headerurl filter
 *
 */
function d7_custom_login_url(){
	return get_bloginfo('url');
}

add_filter('login_headerurl', 'd7_custom_login_url');


/**
 * Customize the login title
 *
 * @package d7
 * @subpackage boilerplate-theme_filters+hooks
 * @internal called by login_headertitle filter
 *
 */
function d7_custom_login_title() {
	return get_bloginfo('name');
}

add_filter('login_headertitle', 'd7_custom_login_title');


// Uncomment the following to use custom CSS & JS on the login page
/*
function d7_custom_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/stylesheets/css/login-page.css' );
    wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/js/src/login-page.js' );
}
add_action( 'login_enqueue_scripts', 'd7_custom_login_stylesheet' );
*/
