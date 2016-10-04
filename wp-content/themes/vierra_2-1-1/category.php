<?php get_header(); ?>
		<?php if(!is_home()): ?>

 		<div id="content-wrapper">
        <div class="container">
			<div class="row">
         
            
				<div class="col-md-12">
             <div class="blog-list">       	   
            <ul id="bloglist">
            <?php 
			
		    if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <li class="box">
                                	<div class="pic_hover">
                                	<a class="image" href="<?php the_permalink(); ?>">                                    
                                    <span class="overlay"></span>
                                	<?php the_post_thumbnail('full'); ?>
                                    </a>
                                    </div>
                                    <div class="inner">
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
                      <?php 
					  	$content = get_the_content();
						$trim_content = wp_trim_words( $content, 45 );
						echo $trim_content;
					  ?>
                      <div class="blog-info">
                  	<span class="by"><?php echo __('By','Vierra'); ?> <?php the_author(); ?></a></span><span class="separator">|</span><span class="cat"><a href="style/#link"><?php the_category(', ') ?></a></span><span class="separator">|</span><span class="comment-count"><?php comments_number( '0 comment', '1 comment', '% comments' ); ?></span><span class="readmore-span"><a href="<?php the_permalink(); ?>" class="readmore-align-right"><?php echo __('Read More','Vierra'); ?></a></span>
                    <div class="clear"></div>
                </div>
                      </div>
                        <?php	edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?><br />
                        </div>
                        </div>
                    </li>
            <?php 		endwhile;endif; 	?>
            <?php if (function_exists("de_pagination")) {
            de_pagination(); } ?>
             <?php wp_reset_query(); ?> 
            </ul>
            </div>
        
    	<div class="clear"></div>
		</div>
        </div>
       <?php endif; ?>

        <!-- ********** close content *********** -->
<?php get_footer(); ?>
