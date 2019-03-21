<?php
/* Template Name: Video Background (self hosted) */
?>
<?php get_header(); ?>
<?php 
$cover = get_post_meta($post->ID, 'cover', true); 
$webm = get_post_meta($post->ID, 'file_webm', true); 
$mp4 = get_post_meta($post->ID, 'file_mp4', true); 
$ogg = get_post_meta($post->ID, 'file_ogg', true); 
?>
<!-- load your video here -->
<video class="video-self-hosted" autoplay="" loop="" muted="" poster="<?php echo $cover; ?>">
<?php if($webm!=''){ ?><source src="<?php echo $webm; ?>" type="video/webm" /><?php } ?>
<?php if($mp4!=''){ ?><source src="<?php echo $mp4; ?>" type="video/mp4" /><?php } ?>
<?php if($ogg!=''){ ?><source src="<?php echo $ogg; ?>" type="video/ogg" /><?php } ?>
</video>
<?php get_footer(); ?>