<?php get_header(); ?>

		<?php $de_data = get_option( 'theme_mods_'.wp_get_theme() ); ?>
       	<?php $btn_visit = get_option('DE_btn_view '); ?>
   		<?php $btn_more_images = get_option('DE_btn_more_images');?>

        
 		<div id="content-wrapper" class="no-bg">
		<div class="container">
        	<div class="row">
				<div class="col-md-8">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        	<?php if ( has_post_thumbnail() ) { ?>
                    <div class="de-pic-blog">
						<?php the_post_thumbnail('full'); ?>
                    </div>
            <?php } ?>
        <div class="page-inner">     
        <div id="blogread">

        
                                    
                                    <div class="gallery-text">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      
                      <div class="blog-content">
                      
                      <?php $file = get_post_meta($post->ID, 'main_pic', true); ?>
                      <?php if($file!=''){ ?>
                      <img class="blogpic" src="<?php echo $file ?>" />
                      <?php } ?>
                      <?php $vid = get_post_meta($post->ID, 'extra_url', true); ?>
                      <?php if($vid!=''){ ?>
                      <iframe src="<?php echo $vid ?>" frameborder="0" width="580" height="435" allowfullscreen></iframe>
                      <?php } ?>
                      <?php the_content();?>

                      </div>
                        <?php	edit_post_link(esc_html__('Edit this entry.', 'vierra'), '<p class="editLink">', '</p>'); ?><br />
                        </div></div>
                        
                        <?php
					$defaults = array(
						'before'           => '<p>' . __( 'Pages:' ),
						'after'            => '</p>',
						'link_before'      => '',
						'link_after'       => '',
						'next_or_number'   => 'number',
						'separator'        => ' ',
						'nextpagelink'     => __( 'Next page' ),
						'previouspagelink' => __( 'Previous page' ),
						'pagelink'         => '%',
						'echo'             => 1
					);
					
					 wp_link_pages( $defaults );
				 ?>
            
                    <?php	edit_post_link(esc_html__('Edit this entry.', 'vierra'), '<p class="editLink">', '</p>'); ?>
                    
                  
			 	 <?php comments_template(); ?>
                 
            <?php	edit_post_link(esc_html__('Edit this entry.', 'vierra'), '<p class="editLink">', '</p>'); ?>
        	</div>
            
            
            
            </div></div>
			
			<div class="col-md-4">
				<div class="page-inner single-post-sidebar">
						<h4><?php echo __('Recent Gallery', 'vierra') ?>
						<div class="divider20"></div>
						<?php echo do_shortcode('[de_gallery_small category="" count="8"]'); ?>
				</div>
			</div>
			
		<?php 		endwhile; endif;?>
        
        </div></div></div>
        
        <!-- ********** close content *********** -->
<?php get_footer(); ?>