<?php 
	$de_data = get_option( 'theme_mods_'.get_current_theme()); 
	
	
	if(!empty($de_data['DE_scheme_color'])){
	$de_scheme = $de_data['DE_scheme_color'];
	}else{
	$de_scheme = '';
	}
	
	$de_logo_file = $de_data ['DE_logo']; 
	$de_logo = get_site_url().substr($de_logo_file,10);
	
	$de_favicon_file = $de_data ['DE_favicon'];
	$de_favicon = get_site_url().substr($de_favicon_file,10);

	$de_description = $de_data ['DE_website_description'];
	$de_keywords = $de_data ['DE_website_keywords'];
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<html <?php language_attributes(); ?>><head>
<?php if($de_description){ ?>
<meta name="description" content="<?php echo $de_description ?>">
<?php } ?>
<?php if($de_keywords){ ?>
<meta name="keywords" content="<?php echo $de_keywords ?>">
<?php } ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<?php if ( $de_favicon_file ) { ?>
<link rel='icon' type='image/png' href='<?php echo $de_favicon ?>'/>
<?php } ?>
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
<!-- ********** wp_head ********** -->
<?php wp_head(); ?>
</head>
<?php $req="" ?>
<?php if($req=="unpassed"):  ?>
<body  <?php body_class( $class );?> >
<?php endif; ?> 
<body <?php if(is_page_template('page_slider_extended.php')){ echo 'class="page_slider_extended"'; }?> >
		
		<?php 	
			$current_post_type = get_post_type( $post );
			$current_tax = get_query_var('project_categories');
		 ?>
        
		<?php if ( is_page_template('page_slider.php') or is_page_template('page_slider_extended.php') ){ ?>
		 <?php 	include 'slider/fullscreen-slider.php'; } ?>
		<?php wp_reset_query(); ?>    
<div <?php if(!is_page_template('page_slider.php')){ echo 'id="canvas"' ?><?php } ?> <?php if(is_page_template('video_background.php') or is_page_template('page_slider_extended.php')){ ?>class="no-bg"<?php } ?>>	
<header>
    <div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="header-inner">
            <div class="col-md-3 logo-container">
                <div id="mainlogo" class="logo"><div class="inner"><a href="<?php echo home_url(); ?>"><img src="<?php if ( $de_logo_file ) { echo $de_logo;} else{ echo get_template_directory_uri();
                if($de_scheme=="color-black.css"){echo '/images/logo-black.png';}
                else if($de_scheme=="color-brown.css"){echo '/images/logo-brown.png';}
                else if($de_scheme=="color-purple.css"){echo '/images/logo-purple.png';}
                else{echo '/images/logo.png';}
                ?><?php } ?>" alt="logo"/></a></div></div>
            </div>
            <div class="col-md-9 menu-container">
            			<div class="lang-switch">
						<?php if(function_exists('qtrans_generateLanguageSelectCode')){
							echo qtrans_generateLanguageSelectCode('both');
						}						
						?>     
                        </div>           
                        
                        <div id="wpml-selector">
                        	<?php do_action('icl_language_selector'); ?>
                        </div> 
                                                
                        <!-- ********** mainmenu ********** -->
                        <?php $defaults = array(
                            'theme_location'  => 'primary',
                            'menu'            => '', 
                            'container'       => '', 
                            'container_class' => '', 
                            'container_id'    => '',
                            'menu_class'      => 'de-menu', 
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',

                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul id="nav" class="de-menu">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => ''
                        ); ?>
                        <?php wp_nav_menu( $defaults ); ?>

				</div>
                
                <div class="clearfix"></div>
                
			</div>
        </div>
    </div>
</div>
</header>
