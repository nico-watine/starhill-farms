<?php
include 'de-sc.php'
?>
<?php // S H O R T C O D E

add_filter("the_content", "the_content_filter");
 
	function the_content_filter($content) {
	 
	// array of custom shortcodes requiring the fix
	$block = join("|",array("de_tab","tab_item","de_big_title","one_half"));
	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
	 
	return $rep;
 
}


// blocks
// =========================================
function row( $atts, $content = null ) { return '<div class="row">'.do_shortcode($content).'</div>';  }  
add_shortcode("row", "row");
// 1/1
function fullwidth( $atts, $content = null ) { return '<div class="col-md-12">'.do_shortcode($content).'</div>';  }  
add_shortcode("fullwidth", "fullwidth");
/*
// 1/4
function one_fourth( $atts, $content = null ) { return '<div class="col-md-3">'.do_shortcode($content).'</div>';  }  
add_shortcode("one_fourth", "one_fourth");
// 1/3
function one_third( $atts, $content = null ) { return '<div class="col-md-4">'.do_shortcode($content).'</div>';  }  
add_shortcode("one_third", "one_third");
// 1/2
function one_half( $atts, $content = null ) { return '<div class="col-md-6">'.do_shortcode($content).'</div>';  }  
add_shortcode("one_half", "one_half");
// 2/3
function two_third( $atts, $content = null ) { return '<div class="col-md-8">'.do_shortcode($content).'</div>';  }  
add_shortcode("two_third", "two_third");
// 3/4
function three_fourth( $atts, $content = null ) { return '<div class="col-md-9">'.do_shortcode($content).'</div>';  }  
add_shortcode("three_fourth", "three_fourth");
*/
// custom for vierra theme
function de_row( $atts, $content = null ) { return '<div class="de_row">'.do_shortcode($content).'</div>';  }  
add_shortcode("de_row", "de_row");

function one_half( $atts, $content = null ) { return '<div class="col-md-6">'.do_shortcode($content).'</div>';  }  
add_shortcode("one_half", "one_half");

	function one_half_last( $atts, $content = null ) { return '<div class="col-md-6">'.do_shortcode($content).'</div>';  }  
	add_shortcode("one_half_last", "one_half_last");

function one_third( $atts, $content = null ) { return '<div class="col-md-4">'.do_shortcode($content).'</div>';  }  
add_shortcode("one_third", "one_third");

	function one_third_last( $atts, $content = null ) { return '<div class="col-md-4">'.do_shortcode($content).'</div>';  }  
	add_shortcode("one_third_last", "one_third_last");

function two_third( $atts, $content = null ) { return '<div class="col-md-8">'.do_shortcode($content).'</div>';  }  
add_shortcode("two_third", "two_third");

	function two_third_last( $atts, $content = null ) { return '<div class="col-md-8">'.do_shortcode($content).'</div>';  }  
	add_shortcode("two_third_last", "two_third_last");

function one_fourth( $atts, $content = null ) { return '<div class="col-md-3">'.do_shortcode($content).'</div>';  }  
add_shortcode("one_fourth", "one_fourth");

	function one_fourth_last( $atts, $content = null ) { return '<div class="col-md-3">'.do_shortcode($content).'</div>';  }  
	add_shortcode("one_fourth_last", "one_fourth_last");

function three_fourth( $atts, $content = null ) { return '<div class="col-md-9">'.do_shortcode($content).'</div>';  }  
add_shortcode("three_fourth", "three_fourth");

	function three_fourth_last( $atts, $content = null ) { return '<div class="col-md-9">'.do_shortcode($content).'</div>';  }  
	add_shortcode("three_fourth_last", "three_fourth_last");


// close custom for vierra theme

// button
// =========================================
function btn( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'title' => '',  
	'style' => '', 
	'url' 	=> '',
	'size'	=> '',
	'target'=> '',
	'icon'  => '',
  ), $atts ) );

 if($icon){
	 $vicon = '<i class="fa '.$icon.'"></i>';
 }else{
 	$vicon = '';
 }
	
 return '<a href="'.$url.'" class="btn '.$style .' '. $size.'" target="'.$target.'">'.$vicon.$title.'</a>';
}
add_shortcode( 'btn', 'btn' );



// alert
// =========================================
function de_alert ( $atts, $content = null ) {
  extract( shortcode_atts( array (
	'style' 	=> '', 
    'title' 	=> '',  
	'message' 	=> '',
	'icon' 	=> '',
  ), $atts ) );

 if($title){
	 $vtitle = '<h4>'.$title.'</h4>';
 }else{
 	$vtitle = '';
 }
 
 if($icon){
	 $vicon = '<i class="'.$icon.'"></i>';
 }else{
 	$vicon = '';
 }
	
 return '<div class="alert '.$style.'"><button type="button" class="close" data-dismiss="alert">&times;</button>'
 			.$vicon.
			$message.
		'</div>';
}
add_shortcode( 'de_alert', 'de_alert' );


// title
// =========================================
function de_title( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'href' => '',
	'full' => '',
  ), $atts ) );
  
  
  $vfull = isset($vfull) ? $vfull : null;
  if($full=="yes"){
  	$vfull = 'col-md-12';
  }
  
  return '<h4 class="de_title">'.do_shortcode($content).'</h4>';
}
add_shortcode( 'de_title', 'de_title' );



// progress bar
// =========================================
function de_progress ( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'title' 	=> '',
    'style' 	=> '',
	'percentage' 	=> '',
	'color' 	=> '',
  ), $atts ) );

 if($color){
	 $vcolor = ' style="background:'.$color.'"';
 }else{
 	$vcolor = '';
 }
 
 if($style==2){
	 $vstyle = 'de_style_bar_1';
 }else{
 	$vstyle = '';
 }
	
 return '<div class="de_progress_bar '.$vstyle.'">
		   <div class="de_text">'.$title.' '.$percentage.'%</div>
		   <div class="de_meter">
			  <span style="width:'.$percentage.'%;"><span class="de_progress"'.$vcolor.'></span></span>
		   </div>
		</div>';
}
add_shortcode( 'de_progress', 'de_progress' );




// font awesome icon
// =========================================
function de_icon ( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'icon' 	  => '',
	'size' 	  => '',
    'color'   => '',
	'bgcolor' => '',
	'border'  => '',
	'style'  =>  '',
  ), $atts ) );
	
 if($border){
	 $vborder = 'border:solid 1px '.$border;
 }else{
	 if($style=='circle'&&$border==''){
	 $vborder = 'border:solid 1px '.$bgcolor;
	 }else{
	 $vborder = '';
	 }
 }
 	
 return '<i class="de_icon fa '.$icon.' '.$style.' '.$size.'" style="background:'.$bgcolor.'; color:'.$color.';'.$vborder.'"></i>';
}
add_shortcode( 'de_icon', 'de_icon' );




function clear( $atts, $content = null ) { return '<div class="clear"></div>';  }  
add_shortcode("clear", "clear");


// dividers
// =========================================
function divider( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'style' => '',
	'full'   => '',
  ), $atts ) );
	
	$vfull = isset($vfull) ? $vfull : null;
  	if($full=="yes"){
  		$vfull = 'col-md-12';
  	}
return '<div class="'.$vfull.'"><div class="de_divider '.$style.'"><span></span></div></div>';
}
add_shortcode( 'divider', 'divider' );



// tabs
// =========================================
function de_tab_group( $atts, $content = null ) {
  extract( shortcode_atts( array (
  ), $atts ) );


  $string = do_shortcode($content); 
  $tab_title = preg_replace('%<div.*?</div>%i', '', $string);
  $tab_body  = preg_replace('/<ul>.*?<\/ul>/s','',$string);
   	
  $out = '<div class="de_tab"><ul class="de_nav">';
  $out .= $tab_title;
  $out .= '</ul>';
  $out .= '<div class="de_tab_content">';
  $out .= $tab_body;
  $out .= '</div></div>';
  
  return $out;
  
  
	
}
add_shortcode( 'de_tab', 'de_tab_group' );


// tab
// =========================================
function de_tab_item( $atts, $content = null ) {
  extract( shortcode_atts( array (
	'label'   => '',
	'active'   => '',
  ), $atts ) );
	
	if($active=="yes"){
	 $vactive = "active";
	}else{
	$vactive = "";
	}
	
	$out = '<li><a class="'.$vactive.'">'.$label.'</a></li>';
	$out .= '<div>'.do_shortcode($content).'</div>';
	
	return $out;

}
add_shortcode( 'tab_item', 'de_tab_item' );


// centered
// =========================================
function center( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'href' => ''
  ), $atts ) );
  return '<div class="de_center" style="text-align:center;">'.do_shortcode($content).'</div>';
}
add_shortcode( 'center', 'center' );


// testi
// =========================================
function de_testi ( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'review' 	=> '',
	'name' 	  	=> '',
    'company'   => '',
	'photo' 	=> '',
  ), $atts ) );
	
 if(!$photo){
	 $vphoto = get_template_directory_uri().'/images/testi-default.jpg';
 }else{
	 $vphoto = $photo;
 }
 	
 return '<div class="de_testi">
		<blockquote>'.$review.'</blockquote>
		<div class="de_testi_by">
		<div class="de_testi_pic">
		<img src="'.$vphoto.'" alt="" class="img-circle"></img>
		</div>
		<div class="de_testi_company">
		<strong>'.$name.'</strong>, '.$company.'
		</div>
		</div>
		</div>';
}
add_shortcode( 'de_testi', 'de_testi' );


function my_link( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'href' => ''
  ), $atts ) );
  return '<a href="'.$href.'">'.do_shortcode($content).'</a>';
}
add_shortcode( 'my_link', 'my_link' );



// youtube
function youtube( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'width' => '',
	'height' => '',
	'url' => '',
  ), $atts ) );
  return '<iframe src="'.$url.'" frameborder="0" width="'.$width.'" height="'.$height.'" allowfullscreen></iframe>';
}
add_shortcode( 'youtube', 'youtube' );

// vimeo
function vimeo( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'width' => '',
	'height' => '',
	'url' => '',
  ), $atts ) );
  return '<iframe src="'.$url.'" frameborder="0" width="'.$width.'" height="'.$height.'" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
}
add_shortcode( 'vimeo', 'vimeo' );

//blockquote
function blockquote_func( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'align' => ''
  ), $atts ) );
  
   if($align=="right"){
	   $pos = "pos-right"; 
   }elseif($align=="left"){
	   $pos = "pos-left";
   }else{
   		$pos = "";
   }
   
  return '<blockquote class="'.$pos.'">'.do_shortcode($content).'</blockquote>';
}
add_shortcode( 'pullquote', 'blockquote_func' );
add_shortcode( 'blockquote', 'blockquote_func' );

// message
function msgbox( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'type' => ''
  ), $atts ) );
  
   if($type=="success"){$class = "msg-success"; 
   }elseif($type=="warning"){$class = "msg-warning";
   }elseif($type=="error"){$class = "msg-error";
   }else{$class = "msg-info";}
   
  return '<div class="msgbox '.$class.'">'.do_shortcode($content).'</div>';
}
add_shortcode( 'msgbox', 'msgbox' );


// code
function code( $atts, $content = null ) { return '<code>'.$content.'</code>';  }  
add_shortcode("code", "code");

//color{
function color( $atts, $content = null ) {
	extract( shortcode_atts( array (
    'hex' => '',
  ), $atts ) );
  
    return '<span style="color:'.$hex.'">'.do_shortcode($content).'</span>';
}
add_shortcode( 'color', 'color' );


function menus( $atts, $content = null ) {
	extract( shortcode_atts( array (
    'name' => '',
  ), $atts ) );
		if(get_option('DE_count_gallery')!=""){
		$pic_count = get_option('DE_count_gallery');
		}else{
		$pic_count = 9999;	
		};
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$wp_query = new WP_Query(array( 'posts_per_page'=> $pic_count,	'post_type' => 'menu','paged' => $paged,'menu_category' => $name));
		echo '<div class="sixteen columns"><h3 class="menu_category">'.$name.'</h3></div><div class="menu-list">';
		global $post; while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        	  <div class="menu-item eight columns gallery">
                <div class="pic_hover">
                	<a class="image" href="<?php $image_popup = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); echo $image_popup[0]; ?>" rel="prettyPhoto" title="<?php the_title();?>">
				  <span class="rollover"></span><?php echo get_the_post_thumbnail(get_the_ID(), array(70,70) ); ?></a>
                </div>
           		  <div class="menu-info">
                      <div class="price"><?php echo get_post_meta($post->ID, 'price', true); ?></div>
                      <h4><?php the_title();?></h4>
                      <?php the_content(); ?>
                  </div>
            	  <?php	edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?>
                  <div class="clear"></div>
              </div>
			 
        <?php 		endwhile;	?>
        <div class="clear"></div>
        </div>
       	<?php if (function_exists("de_pagination")) {
    	de_pagination();
		} 
        wp_reset_query(); 
		
} 
add_shortcode( 'menus', 'menus' );

// custom gallery
function de_gallery( $atts, $content = null ) {
	extract( shortcode_atts( array (
    'category' => '',
	'count'=> ''
  ), $atts ) ); ?>
  
  <?php ob_start(); ?>
  <ul id="gallery" class="pf_gallery gallery gallery-isotope">
        <?php 
		$de_data = get_option( 'theme_mods_'.wp_get_theme() );
		$menu_per_page = $de_data['DE_gallery_per_page'];
		if(!$menu_per_page){
			$menu_per_page = -1;
		}
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$wp_query = new WP_Query(array( 'posts_per_page'=> $count,	'post_type' => 'gallery','paged' => $paged,'gallery_category' => $category));
		
		while ($wp_query->have_posts()) : $wp_query->the_post();	?>
            
        	  <li class="col-md-3 box gallery-item <?php
				$terms = get_the_terms( $item->ID, 'gallery_category' );
				if($terms){
				foreach ( $terms as $term ) { echo ' '.$term->slug. '' . ''; } 
				}
        		?>">
                <div class="pic_hover">
                	<?php
						global $post;
						$vid_url = get_post_meta($post->ID, 'video_url', true);
						$url = get_post_meta($post->ID, 'url', true);
						$opt_gallery_single = get_post_meta($post->ID, 'opt_gallery_single', true);
						$image_popup = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					?>
					<?php if($url!=""){ ?>
						<a href="<?php echo $url; ?>">
							<span class="overlay"></span><?php echo get_the_post_thumbnail($post->ID, "medium", array( 'alt' => false ) ); ?>
						</a>
					<?php }elseif($vid_url!=""){ ?>
						<a class="image" href="<?php echo $vid_url; ?>" rel="prettyPhoto[gallery]" title="<?php the_title();?>">
							<span class="overlay video_play"></span><?php echo get_the_post_thumbnail($post->ID, "medium", array( 'alt' => false ) ); ?>
						</a>
					<?php }elseif($opt_gallery_single=="yes"){ ?>
						<a href="<?php echo get_permalink(); ?>">
							<span class="overlay"></span><?php echo get_the_post_thumbnail($post->ID, "medium", array( 'alt' => false ) ); ?>
						</a>
					<?php }else{ ?>
						<a class="image" href="<?php if($vid_url==''){echo $image_popup[0];}else{echo $vid_url;} ?>" rel="prettyPhoto[gallery]" title="<?php the_title();?>">
							<span class="overlay"></span><?php echo get_the_post_thumbnail($post->ID, "medium", array( 'alt' => false ) ); ?>
						</a>
					<?php } ?>
					
					<div class="info">
						<h4><?php the_title(); ?></h4>
						<?php the_content(); ?>
					</div>
                </div>
            <?php	edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?>
           		  <div class="clear"></div>
              </li>
        <?php 		endwhile;	
					
		?>
       	
        </ul>
  		<div class="clearfix"></div>
	<?php return ob_get_clean(); ?>

<?php 
} add_shortcode("de_gallery", "de_gallery");


// custom gallery
function de_gallery_small( $atts, $content = null ) {
	extract( shortcode_atts( array (
    'category' => '',
	'count'=> ''
  ), $atts ) ); ?>
  
  <?php ob_start(); ?>  
  <ul id="gallery" class="pf_gallery gallery gallery-isotope">
        <?php 
		$de_data = get_option( 'theme_mods_'.wp_get_theme() );
		$menu_per_page = $de_data['DE_gallery_per_page'];
		if(!$menu_per_page){
			$menu_per_page = -1;
		}
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$wp_query = new WP_Query(array( 'posts_per_page'=> $count,	'post_type' => 'gallery','paged' => $paged,'gallery_category' => $category));
		
		while ($wp_query->have_posts()) : $wp_query->the_post();	?>
            
        	  <li class="one-third box gallery-item <?php
				$terms = get_the_terms( $item->ID, 'gallery_category' );
				if($terms){
				foreach ( $terms as $term ) { echo ' '.$term->slug. '' . ''; } 
				}
        		?>">
                <div class="pic_hover">
                	<?php
						global $post;
						$vid_url = get_post_meta($post->ID, 'video_url', true);
						$url = get_post_meta($post->ID, 'url', true);
						$opt_gallery_single = get_post_meta($post->ID, 'opt_gallery_single', true);
						$image_popup = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					?>
					<?php if($url!=""){ ?>
						<a href="<?php echo $url; ?>">
							<span class="overlay"></span><?php echo get_the_post_thumbnail($post->ID, "medium", array( 'alt' => false ) ); ?>
						</a>
					<?php }elseif($vid_url!=""){ ?>
						<a class="image" href="<?php echo $vid_url; ?>" rel="prettyPhoto[gallery]" title="<?php the_title();?>">
							<span class="overlay video_play"></span><?php echo get_the_post_thumbnail($post->ID, "medium", array( 'alt' => false ) ); ?>
						</a>
					<?php }elseif($opt_gallery_single=="yes"){ ?>
						<a href="<?php echo get_permalink(); ?>">
							<span class="overlay"></span><?php echo get_the_post_thumbnail($post->ID, "medium", array( 'alt' => false ) ); ?>
						</a>
					<?php }else{ ?>
						<a class="image" href="<?php if($vid_url==''){echo $image_popup[0];}else{echo $vid_url;} ?>" rel="prettyPhoto[gallery]" title="<?php the_title();?>">
							<span class="overlay"></span><?php echo get_the_post_thumbnail($post->ID, "medium", array( 'alt' => false ) ); ?>
						</a>
					<?php } ?>
                </div>
           		  <div class="clear"></div>
              </li>
        <?php 		endwhile;	
					
		?>
       	
        </ul>
  		<div class="clearfix"></div>
		<?php return ob_get_clean(); ?>

<?php 
} add_shortcode("de_gallery_small", "de_gallery_small");

// custom for vierra theme
function f_nav( $atts, $content = null ) { return wp_nav_menu( 'sort_column=menu_order&menu_class=secondary-menu&theme_location=secondary' ); }  
add_shortcode("f_nav", "f_nav");

// custom featured box
function featured( $atts, $content = null ) { return '<div class="featured">'.do_shortcode($content).'</div>';  }  
add_shortcode("featured", "featured");

function f_title( $atts, $content = null ) { return '<h4 class="f_title">'.do_shortcode($content).'</h4>';  }  
add_shortcode("f_title", "f_title");

function f_pic( $atts, $content = null ) { return '<img src="'.do_shortcode($content).'" class="img-responsive">';  }  
add_shortcode("f_pic", "f_pic");


function f_content( $atts, $content = null ) { return '<div>'.do_shortcode($content).'</div>';  }  
add_shortcode("f_content", "f_content");


// custom big title
function de_big_title( $atts, $content = null ) { return '<h1 class="de_big_title"><span>'.do_shortcode($content).'</span></h1>';  }  
add_shortcode("de_big_title", "de_big_title");
?>