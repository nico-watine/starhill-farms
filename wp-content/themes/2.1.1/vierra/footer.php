<?php
	
	$de_data = get_option( 'theme_mods_'.wp_get_theme() );
	$de_footer = $de_data['DE_footer_text'];
	$de_bgpage = $de_data['DE_page_background_image'];
	$de_bgpage = get_site_url().substr($de_bgpage,10);
	$show_footer = isset($de_data['DE_slide_show_footer']) ? $de_data['DE_slide_show_footer'] : null;
	$de_custom_script = isset($de_data['DE_custom_script']) ? $de_data['DE_custom_script'] : null;

	$de_bg_single_room = isset($de_data['DE_single_room_background']) ? $de_data['DE_single_room_background'] : null;
	$de_bg_single_room_url = get_site_url().substr($de_bg_single_room,10);
?>
		<div class="clear"></div>
		<?php if((!is_page_template('page_slider_revolution.php')&&!is_page_template('page_no_content.php')&&!is_page_template('video_background_vimeo.php')&&!is_page_template('page_slider.php')&&!is_page_template('page_video.php'))or(is_page_template('page_slider.php')&&$show_footer==1)){ ?>
            <div id="footer" <?php if(is_page_template('page_slider.php')){echo 'class="page-slider"';} ?>>
         		<div class="container">
                <div class="row">
                	<div class="col-md-12">
                    	<div class="footer-inner">
                	<div class="col-md-6 text">
					
					
					<?php if ( has_nav_menu('secondary')) {
                       $defaults = array(
                            'theme_location'  => 'secondary',
                            'menu'            => 'second-menu', 
                            'container'       => '', 
                            'container_class' => '', 
                            'container_id'    => '',
                            'menu_class'      => 'de-secondary-menu', 
                            'menu_id'         => 'de-secondary-menu',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul id="nav-2" class="de-secondary-menu">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => ''
							); 
							
							// display secondary menu
							wp_nav_menu( $defaults );
						}
					?>
                        
					
                <?php if ($de_footer) { ?>
                <?php echo do_shortcode(stripslashes($de_footer));   ?>
                <?php ;} else{ echo 'yourwebsite.com'; } ?>
                	</div>
                    
                    <div class="col-md-6 social-icon-footer">
                    	<?php 
						
			$de_rss = isset($de_data['DE_rss']) ? $de_data['DE_rss'] : null;
			$de_twitter = isset($de_data['DE_twitter']) ? $de_data['DE_twitter'] : null;
			$de_facebook = isset($de_data['DE_facebook']) ? $de_data['DE_facebook'] : null;
			$de_gplus = isset($de_data['DE_gplus']) ? $de_data['DE_gplus'] : null;
			$de_vimeo = isset($de_data['DE_vimeo']) ? $de_data['DE_vimeo'] : null;
			$de_youtube = isset($de_data['DE_youtube']) ? $de_data['DE_youtube'] : null;
			$de_linkedin = isset($de_data['DE_linkedin']) ? $de_data['DE_linkedin'] : null;
			$de_flickr = isset($de_data['DE_flickr']) ? $de_data['DE_flickr'] : null;
			$de_pinterest = isset($de_data['DE_pinterest']) ? $de_data['DE_pinterest'] : null;
			$de_deviantart = isset($de_data['DE_deviantart']) ? $de_data['DE_deviantart'] : null;
			$de_dribbble = isset($de_data['DE_dribbble']) ? $de_data['DE_dribbble'] : null;
			$de_digg = isset($de_data['DE_digg']) ? $de_data['DE_digg'] : null;
			$de_instagram = isset($de_data['DE_instagram']) ? $de_data['DE_instagram'] : null;
			$de_lastfm = isset($de_data['DE_lastfm']) ? $de_data['DE_lastfm'] : null;
			$de_myspace = isset($de_data['DE_myspace']) ? $de_data['DE_myspace'] : null;
			$de_reddit = isset($de_data['DE_reddit']) ? $de_data['DE_reddit'] : null;
			$de_stumbleupon = isset($de_data['DE_stumbleupon']) ? $de_data['DE_stumbleupon'] : null;
			$de_tumblr = isset($de_data['DE_tumblr']) ? $de_data['DE_tumblr'] : null;
			$de_tripadvisor = isset($de_data['DE_tripadvisor']) ? $de_data['DE_tripadvisor'] : null;
			$de_yelp = isset($de_data['DE_yelp']) ? $de_data['DE_yelp'] : null;
			$de_foursquare = isset($de_data['DE_foursquare']) ? $de_data['DE_foursquare'] : null;
			
		if ($de_rss): echo '<a href="'.$de_rss.'" target="_blank"><img src="http://starhillfarms.wpengine.com/wp-content/uploads/2015/01/tad.png" id="tripadvisor"/></a>';endif;
		if ($de_twitter): echo '<a href="http://twitter.com/'.$de_twitter.'"><img src="'.get_template_directory_uri().'/images/social-icons/twitter.png"/></a>';endif;
		if ($de_facebook): echo '<a href="http://facebook.com/'.$de_facebook.'" target="blank"><img src="'.get_template_directory_uri().'/images/social-icons/facebook.png"/ id="facebook-icon"></a>';endif;
		if ($de_gplus): echo '<a href="https://plus.google.com/'.$de_gplus.'"><img src="'.get_template_directory_uri().'/images/social-icons/gplus.png"/></a>';endif;
		if ($de_vimeo): echo '<a href="http://vimeo.com/'.$de_vimeo.'"><img src="'.get_template_directory_uri().'/images/social-icons/vimeo.png"/></a>';endif;
		if ($de_youtube): echo '<a href="http://youtube.com/'.$de_youtube.'"><img src="'.get_template_directory_uri().'/images/social-icons/youtube.png"/></a>';endif;
		if ($de_flickr): echo '<a href="http://www.flickr.com/photos/'.$de_flickr.'"><img src="'.get_template_directory_uri().'/images/social-icons/flickr.png"/></a>';endif;
		if ($de_pinterest): echo '<a href="http://pinterest.com/'.$de_pinterest.'"><img src="'.get_template_directory_uri().'/images/social-icons/pinterest.png"/></a>';endif;
		if ($de_deviantart): echo '<a href="http://'.$de_deviantart.'.deviantart.com/"><img src="'.get_template_directory_uri().'/images/social-icons/deviantart.png"/></a>';endif;
		if ($de_dribbble): echo '<a href="http://dribbble.com/'.$de_dribbble.'"><img src="'.get_template_directory_uri().'/images/social-icons/dribbble.png"/></a>';endif;
		if ($de_digg): echo '<a href="'.$de_digg.'"><img src="'.get_template_directory_uri().'/images/social-icons/digg.png"/></a>';endif;
		if ($de_instagram): echo '<a href="http://instagram.com/'.$de_instagram.'" target="blank"><img src="'.get_template_directory_uri().'/images/social-icons/instagram.png" id="instagram-icon" /></a>';endif;
		if ($de_linkedin): echo '<a href="'.$de_linkedin.'"><img src="'.get_template_directory_uri().'/images/social-icons/linkedin.png"/></a>';endif;
		if ($de_lastfm): echo '<a href="http://last.fm/music/'.$de_lastfm.'"><img src="'.get_template_directory_uri().'/images/social-icons/lastfm.png"/></a>';endif;
		if ($de_myspace): echo '<a href="http://myspace.com/'.$de_myspace.'"><img src="'.get_template_directory_uri().'/images/social-icons/myspace.png"/></a>';endif;
		if ($de_reddit): echo '<a href="'.$de_reddit.'"><img src="'.get_template_directory_uri().'/images/social-icons/reddit.png"/></a>';endif;
		if ($de_stumbleupon): echo '<a href="'.$de_stumbleupon.'"><img src="'.get_template_directory_uri().'/images/social-icons/stumbleupon.png"/></a>';endif;
		if ($de_tumblr): echo '<a href="http://'.$de_tumblr.'.tumblr.com/"><img src="'.get_template_directory_uri().'/images/social-icons/tumblr.png"/></a>';endif;
		if ($de_foursquare): echo '<a href="'.$de_foursquare.'"><img src="'.get_template_directory_uri().'/images/social-icons/foursquare.png"/></a>';endif;
		if ($de_tripadvisor): echo '<a href="'.$de_tripadvisor.'"><img src="'.get_template_directory_uri().'/images/social-icons/tripadvisor.png"/></a>';endif;
		if ($de_yelp): echo '<a href="'.$de_yelp.'"><img src="'.get_template_directory_uri().'/images/social-icons/yelp.png"/></a>';endif;

			?>
            
                	</div>  
             <div class="clearfix"></div>
            	</div>            
            </div>
    	</div>
    </div>
    </div>       
            <?php } ?>

<?php if ( is_page_template('page_slider.php') or is_page_template('page_slider_extended.php')): ?>
    		
<!--Slide captions displayed here-->
<div id="slidecaption"></div>

<div class="container">    
<div id="prevthumb"></div>
	<div id="nextthumb"></div>
	
	<!--Arrow Navigation-->
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>
	
<!--Time Bar-->
	<div id="progress-back" class="load-item">
		<div id="progress-bar"></div>
	</div>
	<!--Control Bar-->
	<div id="controls-wrapper" class="load-item">
		<div id="controls">
			
			<a id="play-button"><span id="pauseplay" class="play"></span></a>
		
			<!--Slide counter-->
			<div id="slidecounter">
				<span class="slidenumber"></span> / <span class="totalslides"></span>
			</div>
			
			<!--Navigation-->
			<ul id="slide-list"></ul>
			
		</div>
	</div>
    <?php endif; ?>
    

   
   <?php if(is_page_template('video_background_vimeo.php')){ ?>
    <div id="bg-vimeo" style=" position:absolute; z-index:1; width:100%; height:100%; background:#999;">
	<iframe src="http://player.vimeo.com/video/<?php echo $post->post_content; ?>?autoplay=1" webkitAllowFullScreen mozallowfullscreen allowFullScreen autoplay=1 frameborder="0" width="100%" height="100%"></iframe>
    </div>
    <?php } ?>
    
	<?php if (!is_page_template('page_slider.php') and !is_page_template('page_slider_extended.php')):?>
    
    <?php 	$bg_image = isset($bg_image) ? $bg_image : null;
			$bg_image = get_post_meta($post->ID, 'bg_image', true);	
			$bg_blog_pic = $de_data ['DE_blog_background']; 			
			$bg_blog = isset($bg_blog) ? $bg_blog : null;
			$bg_blog = get_site_url().substr($bg_blog_pic,10);
			
	?>
	
	<?php if($bg_image!=""){ ?>
    <div id="background-image">
		<script>
         jQuery.backstretch("<?php echo $bg_image?>");
        </script>
	</div>
	
	<?php }else if(is_singular('room')){?>
    	 <div id="background-image">
		<script>
		<?php if($de_bg_single_room!=""){ ?>
        jQuery.backstretch("<?php echo $de_bg_single_room_url?>");
		<?php } ?>
        </script>
		</div>
    
    <?php }else if(is_single()&&!is_singular('room')){?>
    	 <div id="background-image">
		<script>
		<?php if($bg_blog_pic!=""){ ?>
        jQuery.backstretch("<?php echo $bg_blog?>");
		<?php } else { ?>
		jQuery.backstretch("<?php echo get_template_directory_uri().'/images/sample_2.jpg' ?>");
		<?php } ?>
        </script>
		</div>
        
    <?php }else if($de_bgpage!=""&&!is_singular('room')&&!is_single()){ ?>
		 <div id="background-image">
		<script>
         jQuery.backstretch("<?php echo $de_bgpage; ?>");
		 jQuery('#bg-page').hide();
        </script>
		</div>
	<?php }else{ ?>
		<script>
		jQuery.backstretch("<?php echo get_template_directory_uri().'/images/sample_2.jpg' ?>");
		</script>
    <?php }endif; ?>
    
    <script type="text/javascript">
        var $ = jQuery.noConflict();
        $("document").ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 35) {
                    $('.header').addClass("f-nav");
					$('.logo').addClass("trans");
                } else {
                    $('.header').removeClass("f-nav");
					$('.logo').removeClass("trans");
                }
            });
        });
    </script>
    <?php if ( is_page_template('video_background.php') ) : ?>
    <script type="text/javascript">
       $('document').ready(function() {
            var options = { videoId: '<?php echo $post->post_content; ?>', start: 3 };
            $('#wrapper').tubular(options);
            // ftc cool sepia hd
            // 49SKbS7Xwf4 beautiful barn sepia
        });
	</script>
    <?php endif; ?>
		</div>
		
	<?php echo $de_custom_script; ?>
		
	<?php wp_footer(); ?>
</body>
</html>


