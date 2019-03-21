<?php $hideIDs = get_option('DE_exclude_menu');?>
<div class="sidebar">
            <?php
            $terms = get_terms( 'project_categories' ); 
			$count_terms = count( $terms );
			?>
            
            <div class="separator-b"></div>
            
            <ul id="filter" class="category">
				
			<?php if ( $count_terms > 0 ) { ?>
				<?php foreach ( $terms as $term ) { ?>
					<li <?php if($post_type=='project'){if($term->slug==$project_categories): echo('class="active"'); endif;} ?> >
						<a class="" href="<?php echo get_site_url(); ?>?project_categories=<?php echo $term->slug; ?>&post_type=project">
							<span class="cat-name"><?php echo $term->name; ?></span></a>
							<span class="cat-count"><?php echo $term->count; ?></span>
						
					</li>
				<?php } ?>
			<?php } ?>
					
					<?php if(get_option('DE_pf_hide_all_text')!="yes"){ ?>
            		<li <?php if($post_type=="project"&&$project_categories==""): echo('class="active"'); endif; ?>>
					<a href="<?php echo get_site_url(); ?>?project_categories=&post_type=project" class="all" title="<?php _e( 'View all items', 'designesia' ); ?>">
                    <span class="cat-name"><?php _e( 'All', 'designesia' ); ?></span></a>
					<span class="cat-count"><?php echo wp_count_posts( 'project' )->publish; ?></span>
					</li>
                    <?php } ?>
		</ul>
        
        <div id="social-icons">
            <?php if (get_option('DE_rss') != "") { ?><a href="<?php echo (get_option('DE_rss'));  ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social-icons/rss.png"/></a><?php } ?>
            <?php if (get_option('DE_twitter') != "") { ?><a href="http://www.twitter.com/<?php echo (get_option('DE_twitter'));  ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social-icons/twitter.png"/></a><?php } ?>
            <?php if (get_option('DE_facebook') != "") { ?><a href="http://www.facebook.com/<?php echo (get_option('DE_facebook'));  ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social-icons/facebook.png"/></a><?php } ?>
            <?php if (get_option('DE_google_plus') != "") { ?><a href="http://www.plus.google.com/<?php echo (get_option('DE_google_plus'));  ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social-icons/gplus.png"/></a><?php } ?>
            <?php if (get_option('DE_vimeo') != "") { ?><a href="http://www.vimeo.com/<?php echo (get_option('DE_vimeo'));  ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social-icons/vimeo.png"/></a><?php } ?>
            <?php if (get_option('DE_youtube') != "") { ?><a href="http://www.youtube.com/<?php echo (get_option('DE_youtube'));  ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social-icons/youtube.png"/></a><?php } ?>
            <?php if (get_option('DE_linkedin') != "") { ?><a href="http://www.linkedin.com/<?php echo (get_option('DE_linkedin'));  ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social-icons/linkedin.png"/></a><?php } ?>
            <?php if (get_option('DE_filckr') != "") { ?><a href="http://www.filckr.com/<?php echo (get_option('DE_filckr'));  ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social-icons/filckr.png"/></a><?php } ?>
            
          </div>
		</div>