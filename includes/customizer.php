<?php

// Remove the 'static front page' option from the customizer
add_action('customize_register', function($wp_customize) {
  $wp_customize->remove_section('static_front_page');
});
