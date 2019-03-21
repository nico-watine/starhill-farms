<?php
/**
Hook into WordPress
*/

add_action('init', 'designesia_button');  
/**
Create Our Initialization Function
*/

function designesia_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
     return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
     add_filter( 'mce_external_plugins', 'add_plugin' );
     add_filter( 'mce_buttons', 'register_button' );
   }

}
/**
Register Button
*/

function register_button( $buttons ) {
 array_push( $buttons, "|", "designesia" );
 return $buttons;
}
/**
Register TinyMCE Plugin
*/

function add_plugin( $plugin_array ) {
   $plugin_array['designesia'] = get_template_directory_uri() . '/designesia/de-shortcode/de_shortcode-plugin.js';
   return $plugin_array;
}
?>