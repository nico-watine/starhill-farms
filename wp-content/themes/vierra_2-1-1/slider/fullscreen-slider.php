<?php 
	$de_data = get_option( 'theme_mods_'.wp_get_theme() ); 
	
	//$trans = $_GET['trans'];
	
	$opt_slider_home = 'Show Title & Description';
	$trans_type = $de_data['DE_transition_type'];
	if($trans_type=="2-Slide Top"){$t=2;}
	elseif($trans_type=="3-Slide Right"){$t=3;} 
	elseif($trans_type=="4-Slide Bottom"){$t=4;} 
	elseif($trans_type=="5-Slide Left"){$t=5;} 
	elseif($trans_type=="6-Carousel Right"){$t=6;} 
	elseif($trans_type=="7-Carousel Left"){$t=7;} 
	elseif($trans_type=="8-None"){$t=0;} 
	else{$t=1;}  
 ?>
		<script type="text/javascript">
			jQuery(function($){
				<?php if ( is_page_template('page_slider.php') or is_page_template('page_slider_extended.php') ): ?>
					<?php $wp_query = new WP_Query(array('posts_per_page'=> 999,'post_type' => 'slider','paged' => $paged) );?>
					
					var slides=[];
					<?php while ($wp_query->have_posts()) : $wp_query->the_post();?> 
					
					<?php if($opt_slider_home=='Show Title Only'){ ?>
					slides.push({image : '<?php echo get_post_meta($post->ID, 'pic_1', true); ?>', title : "<?php the_title(); ?>", thumb : '', url : ''})
					<?php } ?>
					
					<?php 
					// detect if slider has url
					$slide_url = get_post_meta($post->ID, 'url', true);
					if($slide_url!=''){
					$btn_url = "<br><a class='btn' href='".$slide_url."'>Read More</a>";
					}
					?>;
					
					<?php 
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
					
					if($post_thumbnail_url==''){
						$post_thumbnail_url = get_template_directory_uri()."/images/sample.jpg";
					}
					
					$slider_meta = get_post_meta($post->ID, 'url', true);
					$slider_url = isset($slider_meta) ? $slider_meta : null;
					
					if($slider_url!=''){
						$slider_url = "<br /><a href='".$slider_url."' class='btn-slider'>".__('Read More')."</a>";
					}
					
					$content = $post->post_content;
					$content = preg_replace('/\s+/', ' ', $content);
					$content = str_replace('"', "'", $content);					
					$align = isset($align) ? $align : null;
					$align = get_post_meta($post->ID, 'text_align', true);

					?>
					<?php if($opt_slider_home==''||$opt_slider_home=='Show Title & Description'){ ?>
					slides.push({image : '<?php echo $post_thumbnail_url;  ?>', title : "<?php if(htmlspecialchars(stripslashes($post->post_content))!=''){echo "<div class='clear'></div><div class='container'><div class='ten columns'>&nbsp;</div><div class='container'><div class='six columns'><div class='slide_text ".$align."'><h2>".htmlspecialchars(stripslashes($post->post_title))."</h2><br><div class='slide-desc'>".$content."</div>".$slider_url."</div></div></div>"; }?>", thumb : '', url : ''})
					<?php } ?>
					
					<?php if($opt_slider_home=='No Text'){ ?>
					slides.push({image : '<?php echo get_post_meta($post->ID, 'pic_1', true); ?>', title : "", thumb : '', url : ''})
					<?php } ?>
					
					<?php endwhile;?>
					<?php endif; ?>
					<?php wp_reset_query(); ?> 
					
					<?php if($current_post_type=="project"): ?>
        			<?php $cat_name = $current_tax; ?>
					<?php 
					$paged = get_query_var('paged') ? get_query_var('paged') : 1;
					$wp_query = new WP_Query(array(	'posts_per_page'=> 9999,'post_type' => 'project','paged' => $paged,'project_categories' => $cat_name)); ?>
					
					var slides=[];
					<?php while ($wp_query->have_posts()) : $wp_query->the_post();?> 
					
					<?php if($opt_slider_project==''||$opt_slider_project=='Show Title Only'){ ?>
					slides.push({image : '<?php echo get_post_meta($post->ID, 'main_pic', true); ?>', title : "<?php the_title(); ?>", thumb : '', url : ''})
					<?php } ?>
					
					<?php if($opt_slider_project=='Show Title & Description'){ ?>
					
					slides.push({image : '<?php echo get_post_meta($post->ID, 'main_pic', true); ?>', title : "<?php echo "<h2>".htmlspecialchars(stripslashes($post->post_title))."</h2>"; ?><?php if(htmlspecialchars(stripslashes($post->post_content))!=''){echo "<div class='clear'></div><div class='slide_text'>".htmlspecialchars(stripslashes($post->post_content))."</div>".$btn_url; }?>", thumb : '', url : ''})
					<?php } ?>
					
					<?php if($opt_slider_project=='No Text'){ ?>
					slides.push({image : '<?php echo get_post_meta($post->ID, 'main_pic', true); ?>', title : "", thumb : '', url : ''})
					<?php } ?>
					
					<?php endwhile;?>
					<?php endif; ?>
					<?php wp_reset_query(); ?> 	
					
				$.supersized({
					// Functionality
					slide_interval      :  	<?php if($de_data['DE_slide_interval']){echo $de_data['DE_slide_interval'];}else echo 2000; ?>, // Length between transitions
					
					transition          :   <?php if(isset($trans)!=''){echo $trans;}else{echo $t;} ?>, // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed	:	<?php if($de_data['DE_slider_transition_speed']){echo $de_data['DE_slider_transition_speed'];}else echo 500; ?>, // Speed of transition
					// Components							
					slide_links			:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					slides              :   slides,
					autoplay			:	<?php if($de_data['DE_slider_autoplay']!=""){echo $de_data['DE_slider_autoplay'];}else echo 1; ?>,					
					fit_always			:	<?php if($de_data['DE_slider_fit_always']){echo $de_data['DE_slider_fit_always'];}else echo 0; ?> ,
					performance			:	2
					
				});
		    });
		</script>
