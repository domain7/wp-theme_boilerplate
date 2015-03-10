<?php

// Includes
include_once 'includes/theme_setup.php'; // stylesheet_uri, after_setup_theme, cleanup head
include_once 'includes/scripts.php'; // Enqued Scripts
include_once 'includes/bodyclass.php'; // Add page slug as body class. Also include the page parent
include_once 'includes/menus.php';
include_once 'includes/image_sizes.php';
include_once 'includes/sidebars.php';
include_once 'includes/cpt_archives.php';

// Template functions
require_once 'includes/template_functions/custom_excerpt.php';
require_once 'includes/template_functions/document_title.php';
require_once 'includes/template_functions/page_title.php';

?>
