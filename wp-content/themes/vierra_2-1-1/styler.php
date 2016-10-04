<?php

$de_data = get_option( 'theme_mods_'.wp_get_theme()); 
$accent_color = isset($de_data ['DE_accent_color']) ? $de_data ['DE_accent_color'] : null; 
$button_color = isset($de_data ['DE_button_color']) ? $de_data ['DE_button_color'] : null; 
$custom_css = isset($de_data ['custom_css']) ? $de_data ['custom_css'] : null; 
if (isset($show_text_mobile))$show_text_mobile = $de_data['DE_slider_text_mobile'];

/* DEFINE VARIABLES */ 

/* body css */ 
$DE_body_font = isset($de_data ['DE_body_font']) ? $de_data ['DE_body_font'] : null; 
$body_font_face = isset($DE_body_font ['face']) ? $DE_body_font ['face'] : null; 
$body_font_size = isset($DE_body_font ['size']) ? $DE_body_font ['size'] : null; 
$body_font_style = isset($DE_body_font ['style']) ? $DE_body_font ['style'] : null; 
$body_font_color = isset($DE_body_font ['color']) ? $DE_body_font ['color'] : null; 

/* heading 1 */
$DE_heading_1_font = isset($de_data ['DE_heading_1_font']) ? $de_data ['DE_heading_1_font'] : null; 
$h1_font_face = isset($DE_heading_1_font ['face']) ? $DE_heading_1_font ['face'] : null; 
$h1_font_size = isset($DE_heading_1_font ['size']) ? $DE_heading_1_font ['size'] : null; 
$h1_font_style = isset($DE_heading_1_font ['style']) ? $DE_heading_1_font ['style'] : null; 
$h1_font_color = isset($DE_heading_1_font ['color']) ? $DE_heading_1_font ['color'] : null; 
/* heading 2 */
$DE_heading_2_font = isset($de_data ['DE_heading_2_font']) ? $de_data ['DE_heading_2_font'] : null; 
$h2_font_face = isset($DE_heading_2_font ['face']) ? $DE_heading_2_font ['face'] : null; 
$h2_font_size = isset($DE_heading_2_font ['size']) ? $DE_heading_2_font ['size'] : null; 
$h2_font_style = isset($DE_heading_2_font ['style']) ? $DE_heading_2_font ['style'] : null; 
$h2_font_color = isset($DE_heading_2_font ['color']) ? $DE_heading_2_font ['color'] : null; 
/* heading 3 */
$DE_heading_3_font = isset($de_data ['DE_heading_3_font']) ? $de_data ['DE_heading_3_font'] : null; 
$h3_font_face = isset($DE_heading_3_font ['face']) ? $DE_heading_3_font ['face'] : null; 
$h3_font_size = isset($DE_heading_3_font ['size']) ? $DE_heading_3_font ['size'] : null; 
$h3_font_style = isset($DE_heading_3_font ['style']) ? $DE_heading_3_font ['style'] : null; 
$h3_font_color = isset($DE_heading_3_font ['color']) ? $DE_heading_3_font ['color'] : null; 
/* heading 4 */
$DE_heading_4_font = isset($de_data ['DE_heading_4_font']) ? $de_data ['DE_heading_4_font'] : null; 
$h4_font_face = isset($DE_heading_4_font ['face']) ? $DE_heading_4_font ['face'] : null; 
$h4_font_size = isset($DE_heading_4_font ['size']) ? $DE_heading_4_font ['size'] : null; 
$h4_font_style = isset($DE_heading_4_font ['style']) ? $DE_heading_4_font ['style'] : null; 
$h4_font_color = isset($DE_heading_4_font ['color']) ? $DE_heading_4_font ['color'] : null; 
/* heading 5 */
$DE_heading_5_font = isset($de_data ['DE_heading_5_font']) ? $de_data ['DE_heading_5_font'] : null; 
$h5_font_face = isset($DE_heading_5_font ['face']) ? $DE_heading_5_font ['face'] : null; 
$h5_font_size = isset($DE_heading_5_font ['size']) ? $DE_heading_5_font ['size'] : null; 
$h5_font_style = isset($DE_heading_5_font ['style']) ? $DE_heading_5_font ['style'] : null; 
$h5_font_color = isset($DE_heading_5_font ['color']) ? $DE_heading_5_font ['color'] : null; 
/* heading 6 */
$DE_heading_6_font = isset($de_data ['DE_heading_6_font']) ? $de_data ['DE_heading_6_font'] : null; 
$h6_font_face = isset($DE_heading_6_font ['face']) ? $DE_heading_6_font ['face'] : null; 
$h6_font_size = isset($DE_heading_6_font ['size']) ? $DE_heading_6_font ['size'] : null; 
$h6_font_style = isset($DE_heading_6_font ['style']) ? $DE_heading_6_font ['style'] : null; 
$h6_font_color = isset($DE_heading_6_font ['color']) ? $DE_heading_6_font ['color'] : null; 

/* general */
$header_bg = isset($de_data ['DE_header_background']) ? $de_data ['DE_header_background'] : null; 
$header_fullwidth = isset($de_data['DE_header_fullwidth']) ? $de_data['DE_header_fullwidth'] : null;
$page_bg = isset($de_data ['DE_page_background']) ? $de_data ['DE_page_background'] : null; 
$footer_bg = isset($de_data ['DE_footer_background']) ? $de_data ['DE_footer_background'] : null; 
/* menu font */
$menu_font_color = isset($de_data ['DE_menu_font_color']) ? $de_data ['DE_menu_font_color'] : null; 
$menu_bg_color = isset($de_data ['DE_menu_background']) ? $de_data ['DE_menu_background'] : null; 
$menu_font_color_hover = isset($de_data ['DE_menu_font_color_hover']) ? $de_data ['DE_menu_font_color_hover'] : null; 
$menu_bg_hover_color = isset($de_data ['DE_menu_background_hover']) ? $de_data ['DE_menu_background_hover'] : null; 
/* sub menu font */
$submenu_font_color = isset($de_data ['DE_submenu_font_color']) ? $de_data ['DE_submenu_font_color'] : null; 
$submenu_bg_color = isset($de_data ['DE_submenu_background']) ? $de_data ['DE_submenu_background'] : null; 
$submenu_font_color_hover = isset($de_data ['DE_submenu_font_color_hover']) ? $de_data ['DE_submenu_font_color_hover'] : null; 
$submenu_bg_hover_color = isset($de_data ['DE_submenu_background_hover']) ? $de_data ['DE_submenu_background_hover'] : null; 
/* mainmenu css */ 
$DE_menu_font = isset($de_data ['DE_menu_font']) ? $de_data ['DE_menu_font'] : null; 
$menu_font_face = isset($DE_menu_font['face']) ? $DE_menu_font['face'] : null; 
$menu_font_size = isset($DE_menu_font['size']) ? $DE_menu_font['size'] : null; 
$menu_font_style = isset($DE_menu_font['style']) ? $DE_menu_font['style'] : null; 

/* slider css */ 
$supersized_slider_font = isset($de_data ['DE_supersized_slider_font']) ? $de_data ['DE_supersized_slider_font'] : null; 
$supersized_font_face = isset($supersized_slider_font['face']) ? $supersized_slider_font['face'] : null; 
$supersized_font_size = isset($supersized_slider_font['size']) ? $supersized_slider_font['size'] : null; 
$supersized_font_color = isset($supersized_slider_font['color']) ? $supersized_slider_font['color'] : null; 

$slider_bg_font_color_1 = isset($de_data ['DE_slider_bg_font_color_1']) ? $de_data ['DE_slider_bg_font_color_1'] : null; 
$slider_bg_font_color_2 = isset($de_data ['DE_slider_bg_font_color_2']) ? $de_data ['DE_slider_bg_font_color_2'] : null; 

/* slider elements */
$DE_slider_element_play_pause = isset($de_data ['DE_slider_element_play_pause']) ? $de_data ['DE_slider_element_play_pause'] : null; 
$DE_slider_element_number = isset($de_data ['DE_slider_element_number']) ? $de_data ['DE_slider_element_number'] : null; 
$DE_slider_element_list = isset($de_data ['DE_slider_element_list']) ? $de_data ['DE_slider_element_list'] : null; 
$DE_slider_element_arrow = isset($de_data ['DE_slider_element_arrow']) ? $de_data ['DE_slider_element_arrow'] : null; 
$DE_slider_element_progress_bar = isset($de_data ['DE_slider_element_progress_bar']) ? $de_data ['DE_slider_element_progress_bar'] : null; 

?>
<?php if($body_font_face<>""&&$body_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $body_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($menu_font_face<>""&&$menu_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $menu_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($supersized_font_face<>""&&$supersized_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $supersized_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($h1_font_face<>""&&$h1_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $h1_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($h2_font_face<>""&&$h2_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $h2_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($h3_font_face<>""&&$h3_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $h3_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($h4_font_face<>""&&$h4_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $h4_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($h5_font_face<>""&&$h5_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $h5_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($h6_font_face<>""&&$h6_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $h6_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
    

<style type="text/css">
header .bg-header,
#footer .footer-inner,
.page a:hover,
.page .active a,
#portfolio li .btnquit,
.deco-line,
#contact input.btn,
#tab-content ul li a:hover,
#tab-content .nav li a,
.btn-contact a,
#respond input.button,
.de_pagination a:hover,
.de_pagination .current,
.page a:hover,
.page .active a,
.btn,
.menu-item .price,
#menu-grid-view .price,
.category li a:hover,
.category li.active a,
.separator-b,
a.btn_readmore,
.blog_format_quote,
#bloglist .date,#blogread .date,
span.overlay,
a.btn-custom,
a.btn-custom-2,
.room-list.type-1 .btn-custom,
.room-list.type-1 .btn-custom-2,
#btn-book-now.btn-custom
{background-color:<?php echo $accent_color;?>;}

#contact input.btn,
.btn-contact a,
#respond input.button,
.btn,
a.btn_readmore,
a.btn-custom,
a.btn-custom-2,
.room-list.type-1 .btn-custom,
.room-list.type-1 .btn-custom-2,
#btn-book-now.btn-custom
{background-color:<?php echo $button_color;?>;}

span.overlay{
background-image: url(../images/hover_pic.png) center no-repeat;
}

a,
.idcolor,
#twitter span a
{color:<?php echo $accent_color;?>;}

code:hover,
#contact input:focus,
#contact textarea:focus,
#respond textarea:focus
{border:solid 1px <?php echo $accent_color;?>;}

body {
	  <?php if($body_font_face!='default' && $body_font_face!=''):?>font-family:'<?php echo $body_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $body_font_size;?>;
	  font-style:<?php echo $body_font_style;?>;
	  color:<?php echo $body_font_color;?>;
}
#content-wrapper{background:<?php echo $page_bg;?>;}
h1 {
	  <?php if($h1_font_face!='default'):?>font-family:'<?php echo $h1_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $h1_font_size;?>;
	  font-style:<?php echo $h1_font_style;?>;
	  color:<?php echo $h1_font_color;?>;
}
h2 {
	  <?php if($h2_font_face!='default'):?>font-family:'<?php echo $h2_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $h2_font_size;?>;
	  font-style:<?php echo $h2_font_style;?>;
	  color:<?php echo $h2_font_color;?>;
}
h3 {
	  <?php if($h3_font_face!='default'):?>font-family:'<?php echo $h3_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $h3_font_size;?>;
	  font-style:<?php echo $h3_font_style;?>;
	  color:<?php echo $h3_font_color;?>;
}
h4 {
	  <?php if($h4_font_face!='default'):?>font-family:'<?php echo $h4_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $h4_font_size;?>;
	  font-style:<?php echo $h4_font_style;?>;
	  color:<?php echo $h4_font_color;?>;
}
h5 {
	  <?php if($h5_font_face!='default'):?>font-family:'<?php echo $h5_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $h5_font_size;?>;
	  font-style:<?php echo $h5_font_style;?>;
	  color:<?php echo $h5_font_color;?>;
}
h6 {
	  <?php if($h6_font_face!='default'):?>font-family:'<?php echo $h6_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $h6_font_size;?>;
	  font-style:<?php echo $h6_font_style;?>;
	  color:<?php echo $h6_font_color;?>;
}

header .bg-header{background:<?php echo $header_bg;?>;}
#footer .footer-inner{background:<?php echo $footer_bg;?>;}

<?php if($header_fullwidth==1){
	
	if($header_bg!=''){
		echo 'header {background:'.$header_bg.';}';
	}else if($accent_color!=''){
		echo 'header {background:'.$accent_color.';}';
	}else{
		echo 'header {background:#513D32;}';
	}
	
} ?>


.de-menu {
	  <?php if($menu_font_face!='default' && $menu_font_face!=''):?>font-family:'<?php echo $menu_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $menu_font_size;?>;
	  font-style:<?php echo $menu_font_style;?>;
}

.de-menu a{ color:<?php echo $menu_font_color;?>; background:<?php echo $menu_bg_color;?>;}
.de-menu a:hover,.de-menu li:hover a,.de-menu li li a:hover{ color:<?php echo $menu_font_color_hover;?>; background:<?php echo $menu_bg_hover_color;?>;}

.de-menu li li a{color:<?php echo $submenu_font_color;?>; <?php if($submenu_bg_color): ?>background:<?php echo $submenu_bg_color.' !important'; endif?>;}
.de-menu li li a:hover{color:<?php echo $submenu_font_color_hover;?>; <?php if($submenu_bg_hover_color): ?>background:<?php echo $submenu_bg_hover_color.' !important'; endif?>;}

<?php if($slider_bg_font_color_1!=''){ ?>
#slidecaption h2 {
	background:<?php echo $slider_bg_font_color_1; ?>
}
<?php } ?>
<?php if($slider_bg_font_color_2!=''){ ?>
.slide-desc {
	background:<?php echo $slider_bg_font_color_2; ?>
}
<?php } ?>

#slidecaption h2, .slide-desc{
	<?php if($supersized_font_face!='default' && $supersized_font_face!=''):?>font-family:'<?php echo $supersized_font_face;?>';<?php endif; ?>
	font-size:<?php echo $supersized_font_size;?>;
	color:<?php echo $supersized_font_color;?>;
}

<?php if($DE_slider_element_play_pause=="0"){?>#play-button,#pause-button{ display:none; width:0; height:0;} <?php } ?>
<?php if($DE_slider_element_number=="0"){?>#slidecounter{ display:none; width:0; height:0;} <?php } ?>
<?php if($DE_slider_element_list=="0"){?>#slide-list{ display:none; width:0; height:0;} <?php } ?>
<?php if($DE_slider_element_arrow=="0"){?>#prevslide.load-item,#nextslide.load-item{ display:none; width:0; height:0;} <?php } ?>
<?php if($DE_slider_element_progress_bar=="0"){?>#progress-back.load-item,.separator-b{ display:none; width:0; height:0;} <?php } ?>


@media only screen and (max-width: 992px) {
<?php if(isset($show_text_mobile)==1): ?>
.slide_text{ display:block; margin-top:100px;}
<?php endif; ?>
header{background:<?php if($header_bg!=''){echo $header_bg;}else{echo $accent_color;} ?>;}
}

@media (max-width: 767px) {
header{background:<?php if($header_bg!=''){echo $header_bg;}else{echo $accent_color;} ?>;}
}

<?php echo $custom_css; ?>
</style>
   
	