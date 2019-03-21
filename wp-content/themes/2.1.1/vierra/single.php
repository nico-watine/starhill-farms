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

        
                                    <div class="date">
                                      <h4><?php echo get_the_time('d') ?></h4>
                                      <span><?php $month = substr( get_the_time('F'), 0, 3 ); echo $month; ?></span> 
                                    </div>
                                    <div class="text">
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
                      <div class="blog-info">
                  	<span class="by"><?php echo __('By','Vierra'); ?> <?php the_author(); ?></a></span><span class="separator">|</span><span class="cat"><a href="style/#link"><?php the_category(', ') ?></a></span><span class="separator">|</span><span class="comment-count"><?php comments_number( '0 comment', '1 comment', '% comments' ); ?></span>
                    <div class="clear"></div>
                </div>
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
            
            
            
            </div></div> <?php 				
			 $sb_blog =  $de_data ['DE_blog_sidebar'];
			 if($sb_blog!="None"){
			 echo '<div class="col-md-4"><div class="page-inner single-post-sidebar">';	
				dynamic_sidebar($sb_blog);
			 echo '</div></div>' ;
			 }?> 
		<?php 		endwhile; endif;?>
        
        </div></div></div>
        
        <!-- ********** close content *********** -->
<?php get_footer(); ?>