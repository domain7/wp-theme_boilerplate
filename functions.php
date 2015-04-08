<?php

// Includes
include_once 'includes/theme_setup.php'; // stylesheet_uri, after_setup_theme, cleanup head
include_once 'includes/sidebars.php'; // core sidebar registration
include_once 'includes/menus.php'; // core menu registration
include_once 'includes/image_sizes.php'; // image size definitions
include_once 'includes/scripts.php'; // Enqued Scripts
include_once 'includes/cpt_archives.php'; // Add custom post types to wp_get_archives
include_once 'includes/login_page.php'; // Customize admin login
include_once 'includes/body_class.php'; // Expand body classes
require_once 'includes/post_classes.php'; // Expand post classes
require_once 'includes/menu_classes.php'; // Expand menu classes
require_once 'includes/fresco.php'; // Uses fresco.js for gallery and content images

// Template functions. If order is important, replace this and require each file separately.
foreach (glob(dirname(__FILE__) . '/includes/template_functions/*.php') as $filename) {
	require_once($filename);
}
