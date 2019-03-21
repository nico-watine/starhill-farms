<?php
/**
* Template Name: Gallery 3 Columns
*
*/
?> 
<?php get_header(); ?>
<script type="text/javascript">
window.onload = function(event) {
    jQuery('#gallery').isotope({
      itemSelector: '.box',
      // set columnWidth a fraction of the container width
    });
  };	

window.onresize = function(event) {
    jQuery('#gallery').isotope({
      itemSelector: '.box',
      // set columnWidth a fraction of the container width
    });
  };

</script>


       	<div id="content-wrapper" class="no-bg">
        
                <!-- ********** content *********** -->
          		<?php 
					if ( have_posts() ) :
					while ( have_posts() ) :
					the_post();
					$cc = get_the_content();
					if($cc):
					?>                    
                    <div class="container">
					<div class="row">
                   	<div class="col-md-12">
                    <div class="inner-page">
					<?php  the_content(); ?>  
                    <?php edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?>
                    </div>  
                    </div>
                    </div>
                    </div>
                     <?php endif; endwhile; endif; ?>					
                <div class="clearfix"></div>
                <!-- ********** close content *********** -->
                
		<div class="container">
        <div class="row">
        
        <div id="filters" class="col-md-12">
            	<ul>
                <li><a href="" data-filter="*" class="selected"><?php echo __('All','Vierra'); ?></a></li>
				<?php
                $terms = get_terms( 'gallery_category' ); 
                $count_terms = count( $terms );
                ?>	
                <?php if ( $count_terms > 0 ) { ?>
                    <?php foreach ( $terms as $term ) { ?>
                        <li>
                            <a href="" data-filter=".<?php echo $term->slug; ?>">
                                <span class="cat-name"><?php echo $term->name; ?></span>
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>
                </ul>            
            </div>
            
        <div class="clear"></div>
        
        <ul id="gallery" class="pf_gallery gallery">
        <?php 
		$de_data = get_option( 'theme_mods_'.wp_get_theme() );
		$menu_per_page = $de_data['DE_gallery_per_page'];
		if(!$menu_per_page){
			$menu_per_page = -1;
		}
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$wp_query = new WP_Query(array( 'posts_per_page'=> $menu_per_page,	'post_type' => 'gallery','paged' => $paged));
		while ($wp_query->have_posts()) : $wp_query->the_post();	?>
            
        	  <li class="col-md-4 box gallery-item <?php
				$terms = get_the_terms( $item->ID, 'gallery_category' );
				if($terms){
				foreach ( $terms as $term ) { echo ' '.$term->slug. '' . ''; } 
				}
        		?>">
                <div class="pic_hover">
                	<?php  
						$vid_url = get_post_meta($post->ID, 'video_url', true);
						$url = get_post_meta($post->ID, 'url', true);
						$opt_gallery_single = get_post_meta($post->ID, 'opt_gallery_single', true);
						$image_popup = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					?>
					<?php if($url!=""){ ?>
						<a href="<?php echo $url; ?>">
							<span class="overlay"></span><?php echo get_the_post_thumbnail($id, "high", array( 'alt' => false ) ); ?>
						</a>
					<?php }elseif($vid_url!=""){ ?>
						<a class="image" href="<?php echo $vid_url; ?>" rel="prettyPhoto[gallery]" title="<?php the_title();?>">
							<span class="overlay video_play"></span><?php echo get_the_post_thumbnail($id, "high", array( 'alt' => false ) ); ?>
						</a>
					<?php }elseif($opt_gallery_single=="yes"){ ?>
						<a href="<?php echo get_permalink(); ?>">
							<span class="overlay"></span><?php echo get_the_post_thumbnail($id, "high", array( 'alt' => false ) ); ?>
						</a>
					<?php }else{ ?>
						<a class="image" href="<?php if($vid_url==''){echo $image_popup[0];}else{echo $vid_url;} ?>" rel="prettyPhoto[gallery]" title="<?php the_title();?>">
							<span class="overlay"></span><?php echo get_the_post_thumbnail($id, "high", array( 'alt' => false ) ); ?>
						</a>
					<?php } ?>
					
					<div class="info">
						<h4><?php the_title(); ?></h4>
						<?php the_content(); ?>
					</div>
                </div>
            <?php edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?>
           		  <div class="clear"></div>
              </li>
        <?php endwhile;	?>
       	
        </ul>
        
    	<div class="clear"></div>
        
        <?php if (function_exists("de_pagination")) { ?>
    	<div class="col-md-12">
        <?php de_pagination(); ?>
        </div>
		<?php } ?>
        
        
         <?php wp_reset_query(); ?> 
		</div>
        </div>
        </div>
        <!-- ********** close content *********** -->
<?php require_once "rev_slider.php"; ?>		
<?php get_footer(); ?>