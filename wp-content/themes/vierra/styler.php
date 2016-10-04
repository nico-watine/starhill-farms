<?php

$de_data = get_option( 'theme_mods_'.get_current_theme()); 
$accent_color = isset($de_data ['DE_accent_color']) ? $de_data ['DE_accent_color'] : null; 
$button_color = isset($de_data ['DE_button_color']) ? $de_data ['DE_button_color'] : null; 
$custom_css = $de_data['custom_css'];
if (isset($show_text_mobile))$show_text_mobile = $de_data['DE_slider_text_mobile'];
/* DEFINE VARIABLES */ 
/* body css */ 
$DE_body_font = $de_data['DE_body_font'];
$body_font_face = $DE_body_font['face']; 
$body_font_size = $DE_body_font['size'];
$body_font_color = $DE_body_font['color'];

/* heading 1 */
$DE_heading_1_font = $de_data['DE_heading_1_font'];
$h1_font_face = $DE_heading_1_font['face']; 
$h1_font_size = $DE_heading_1_font['size'];
$h1_font_style = $DE_heading_1_font['style'];
$h1_font_color = $DE_heading_1_font['color'];
/* heading 2 */
$DE_heading_2_font = $de_data['DE_heading_2_font'];
$h2_font_face = $DE_heading_2_font['face']; 
$h2_font_size = $DE_heading_2_font['size'];
$h2_font_style = $DE_heading_2_font['style'];
$h2_font_color = $DE_heading_2_font['color'];
/* heading 3 */
$DE_heading_3_font = $de_data['DE_heading_3_font'];
$h3_font_face = $DE_heading_3_font['face']; 
$h3_font_size = $DE_heading_3_font['size'];
$h3_font_style = $DE_heading_3_font['style'];
$h3_font_color = $DE_heading_3_font['color'];
/* heading 4 */
$DE_heading_4_font = $de_data['DE_heading_4_font'];
$h4_font_face = $DE_heading_4_font['face']; 
$h4_font_size = $DE_heading_4_font['size'];
$h4_font_style = $DE_heading_4_font['style'];
$h4_font_color = $DE_heading_4_font['color'];
/* heading 5 */
$DE_heading_5_font = $de_data['DE_heading_5_font'];
$h5_font_face = $DE_heading_5_font['face']; 
$h5_font_size = $DE_heading_5_font['size'];
$h5_font_style = $DE_heading_5_font['style'];
$h5_font_color = $DE_heading_5_font['color'];
/* heading 6 */
$DE_heading_6_font = $de_data['DE_heading_6_font'];
$h6_font_face = $DE_heading_6_font['face']; 
$h6_font_size = $DE_heading_6_font['size'];
$h6_font_style = $DE_heading_6_font['style'];
$h6_font_color = $DE_heading_6_font['color'];

/* general */
$header_bg = $de_data ['DE_header_background']; 
$page_bg = $de_data ['DE_page_background']; 
$footer_bg = $de_data ['DE_footer_background']; 
//$logo_bg = $de_data ['DE_logo_background']; 

$menu_font_color = $de_data ['DE_menu_font_color']; 
$menu_bg_color = $de_data ['DE_menu_background']; 
$menu_font_color_hover = $de_data ['DE_menu_font_color_hover']; 
$menu_bg_hover_color = $de_data ['DE_menu_background_hover'];

$submenu_font_color = $de_data ['DE_submenu_font_color']; 
$submenu_bg_color = $de_data ['DE_submenu_background']; 
$submenu_font_color_hover = $de_data ['DE_submenu_font_color_hover']; 
$submenu_bg_hover_color = $de_data ['DE_submenu_background_hover'];

/* mainmenu css */ 
$DE_menu_font = $de_data ['DE_menu_font'];
$menu_font_face = $DE_menu_font['face']; 
$menu_font_size = $DE_menu_font['size'];
$menu_font_style = $DE_menu_font['style'];

/* slider css */ 

$supersized_slider_font = $de_data['DE_supersized_slider_font'];
$supersized_font_face = $supersized_slider_font['face']; 
$supersized_font_size = $supersized_slider_font['size'];
$supersized_font_color = $supersized_slider_font['color'];

$slider_bg_font_color_1 = $de_data['DE_slider_bg_font_color_1']; 
$slider_bg_font_color_2 = $de_data['DE_slider_bg_font_color_2'];


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
header .header-inner,
#footer .footer-inner,
.logo-container,	
::-moz-selection,
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

header .header-inner{background:<?php echo $header_bg;?>;}
#footer .footer-inner{background:<?php echo $footer_bg;?>;}

.logo-container{background:<?php echo $header_bg;?>;}

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

<?php if($de_data['DE_slider_element_play_pause']=="0"){?>#play-button,#pause-button{ display:none; width:0; height:0;} <?php } ?>
<?php if($de_data['DE_slider_element_number']=="0"){?>#slidecounter{ display:none; width:0; height:0;} <?php } ?>
<?php if($de_data['DE_slider_element_list']=="0"){?>#slide-list{ display:none; width:0; height:0;} <?php } ?>
<?php if($de_data['DE_slider_element_arrow']=="0"){?>#prevslide.load-item,#nextslide.load-item{ display:none; width:0; height:0;} <?php } ?>
<?php if($de_data['DE_slider_element_progress_bar']=="0"){?>#progress-back.load-item,.separator-b{ display:none; width:0; height:0;} <?php } ?>


@media only screen and (max-width: 767px) {
<?php if(isset($show_text_mobile)==1): ?>
.slide_text{ display:block; margin-top:100px;}
<?php endif; ?>
header{background:<?php echo $header_bg;?>;}
}


<?php echo $custom_css; ?>
</style>
   
	