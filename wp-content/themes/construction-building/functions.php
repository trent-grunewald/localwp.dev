<?php 
add_action( 'wp_enqueue_scripts', 'construction_building_theme_css',20);
function construction_building_theme_css() {
	wp_enqueue_style( 'construction-building-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'construction-building-style',get_stylesheet_directory_uri() . '/css/red.css');
  
}

