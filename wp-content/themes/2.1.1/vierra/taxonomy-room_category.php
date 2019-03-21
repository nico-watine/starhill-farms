<?php get_header(); ?>
<script type="text/javascript">
window.onload = function(event) {
    jQuery('#room-list').isotope({
      itemSelector: '.box',
      // set columnWidth a fraction of the container width
    });
  };	

window.onresize = function(event) {
    jQuery('#room-list').isotope({
      itemSelector: '.box',
      // set columnWidth a fraction of the container width
    });
  };

</script>

       	<div id="content-wrapper" class="no-bg">
		<div class="container">
        
        <div class="row">
        <div id="room-list" class="gallery room-list type-1">
        <?php 
		$de_data = get_option( 'theme_mods_'.wp_get_theme() );
		$menu_per_page = $de_data['DE_gallery_per_page'];
		if(!$menu_per_page){
			$menu_per_page = -1;
		}
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$wp_query = new WP_Query(array( 'posts_per_page'=> $menu_per_page,	'post_type' => 'room','paged' => $paged,'room_category' => $room_category));
		while ($wp_query->have_posts()) : $wp_query->the_post();	?>
            
        	  <div class="box col-md-4">
                    <div class="inner room-item">
                    <div class="pic_hover">
                        <a class="image autosize" href="<?php $image_popup = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); echo $image_popup[0]; ?>" rel="prettyPhoto[gallery]" title="<?php the_title();?>">
                      <span class="overlay"></span><img src="<?php $pic_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'gallery-thumbnail' ); echo $pic_thumb[0]  ?>"  /></a>
                      </div>
                      <div class="info">
                      <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                      <?php 
					  	$content = get_the_content();
						$trim_content = wp_trim_words( $content, 40 );
						echo $trim_content;
					  ?>
                    </div>
                    
                    
                    <a href="<?php the_permalink(); ?>" class="btn-custom"><?php echo __('View Room Details','Vierra'); ?></a>
                </div>
            <?php	edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?>
           		  <div class="clear"></div>
              </div>
        <?php 		endwhile;	?>
       	
        </div>
        
    	<div class="clear"></div>
        
        <?php if (function_exists("de_pagination")) { ?>
    	<div class="sixteen columns">
        <?php de_pagination(); ?>
        </div>
		<?php } ?>
        
        
         <?php wp_reset_query(); ?> 
		</div>
        </div>
        </div>
        <!-- ********** close content *********** -->
<?php get_footer(); ?>