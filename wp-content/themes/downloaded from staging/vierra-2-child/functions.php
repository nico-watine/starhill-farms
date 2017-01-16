<?php 
function de_custom_enqueue_child_theme_styles(){
	wp_enqueue_style('main_css', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'de_custom_enqueue_child_theme_styles', 11);
?>