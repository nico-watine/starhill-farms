<?php
/* Template Name: Slider Revolution fullscreen */
?>
<?php get_header(); ?>
<?php 
$rev_slider = get_post_meta($post->ID, 'rev_slider', true);
$slider_alias = isset($rev_slider) ? $rev_slider : null;
if($slider_alias!=''){
echo do_shortcode('[rev_slider alias="'.$slider_alias.'"]');
}
?>
<?php get_footer(); ?>