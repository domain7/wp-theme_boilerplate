<?php

// Includes
include_once 'includes/theme_setup.php'; // stylesheet_uri, after_setup_theme, cleanup head
include_once 'includes/scripts.php'; // Enqued Scripts
include_once 'includes/bodyclass.php'; // Add page slug as body class. Also include the page parent
include_once 'includes/menus.php';
include_once 'includes/image_sizes.php';
include_once 'includes/sidebars.php';

// Template functions
require_once 'includes/template_functions/custom_excerpt.php';
require_once 'includes/template_functions/document_title.php';
require_once 'includes/template_functions/page_title.php';

// Remove some dangerous admin menu items
add_action('admin_menu', 'remove_customizer'); 
add_action('admin_init', 'remove_dangerous_items');

function remove_customizer() {
	global $submenu;
	unset($submenu['themes.php'][6]); // Customize
}

function remove_dangerous_items() {
	remove_submenu_page('themes.php', 'themes.php');
	remove_submenu_page('themes.php', 'theme-editor.php');
	remove_submenu_page('themes.php', 'customize.php');
	remove_submenu_page('plugins.php', 'plugin-editor.php');
}

?>

