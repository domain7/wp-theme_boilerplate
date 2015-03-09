<?php

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


// Add custom CSS & JS to login page
// Use the CSS to change the logo
function custom_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/stylesheets/css/login-page.css' );
    wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/js/src/login-page.js' );
}
add_action( 'login_enqueue_scripts', 'custom_login_stylesheet' );
