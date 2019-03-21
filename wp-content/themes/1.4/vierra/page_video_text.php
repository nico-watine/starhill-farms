<?php
/* Template Name: Video Background (self hosted) With Text */
?>
<?php get_header(); ?>
<?php 
$cover = get_post_meta($post->ID, 'cover', true); 
$webm = get_post_meta($post->ID, 'file_webm', true); 
$mp4 = get_post_meta($post->ID, 'file_mp4', true); 
$ogg = get_post_meta($post->ID, 'file_ogg', true); 
?>
<?php  $sb = get_post_meta($post->ID, 'my_select_1', true); ?>
<div id="content-wrapper">
  <div class="container">
    <div class="row">
      <?php 
	
	if($sb=="None"){
		echo '<div class="col-md-12"><div class="page-inner">';
	} else {
		echo '<div class="col-md-8"><div class="page-inner">';
	}

	?>
      <!-- ********** content *********** -->
      <?php 
	
	if ( have_posts() ) :
	while ( have_posts() ) :
	the_post();
	?>
      <?php  the_content(); ?>
      <?php edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?>
      <?php  endwhile; else : ?>
      <h2>Woops...</h2>
      <p>
        <?php  echo __('Sorry, no posts found.','Vierra'); ?>
      </p>
      <?php  endif; ?>
      <div class="clearfix"></div>
      <!-- ********** close content *********** -->
      <?php  if($sb=="None") echo '</div>'; ?>
    </div>
  </div>
  <?php 
	
	if($sb!="None"){
		echo '<div class="col-md-4"><div class="sb inner">';
		dynamic_sidebar( $sb );
		echo '</div></div></div>' ;
	}

	?>
</div>
</div>

<!-- load your video here -->
<video class="video-self-hosted" autoplay="" loop="" muted="" poster=""
  <?php echo $cover; ?>">
  <?php if($webm!=''){ ?><source src=""<?php echo $webm; ?>" type="video/webm" /><?php } ?>
  <?php if($mp4!=''){ ?><source src=""<?php echo $mp4; ?>" type="video/mp4" /><?php } ?>
  <?php if($ogg!=''){ ?><source src=""<?php echo $ogg; ?>" type="video/ogg" /><?php } ?>
</video>
<?php get_footer(); ?>
