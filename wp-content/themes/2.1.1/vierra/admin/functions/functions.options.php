<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction",
						"std" 		=> "<h3 style=\"margin: 0 0 0px;\">Welcome to the Vierra theme options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
					
$of_options[] = array( 	"name" 		=> "Logo",
						"desc" 		=> "Upload an image to use as logo",
						"id" 		=> "DE_logo",
						"std" 		=> "",
						"type" 		=> "media"
				);


$of_options[] = array( 	"name" 		=> "General Page Background",
						"desc" 		=> "",
						"id" 		=> "DE_page_background_image",
						"std" 		=> "",
						"type" 		=> "media"
				);

$of_options[] = array( 	"name" 		=> "Favicon",
						"desc" 		=> "Upload an image to use as favion",
						"id" 		=> "DE_favicon",
						"std" 		=> "",
						"type" 		=> "media"
				);

				
$of_options[] = array( 	"name" 		=> "Website Description",
						"desc" 		=> "Enter your website description here",
						"id" 		=> "DE_website_description",
						"std" 		=> "",
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> "Website Keywords",
						"desc" 		=> "Enter your website keywords here, separated by comma (,)",
						"id" 		=> "DE_website_keywords",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
	
$of_options[] = array( 	"name" 		=> "Footer Text",
						"desc" 		=> "Enter text for footer",
						"id" 		=> "DE_footer_text",
						"std" 		=> "",
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> "Custom Script",
						"desc" 		=> "Enter custom script here",
						"id" 		=> "DE_custom_script",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Color Options",
						"type" 		=> "heading"
				);

/*
$of_options[] = array( 	"name" 		=> "Scheme Color",
						"desc" 		=> "",
						"id" 		=> "DE_scheme_color",
						"std" 		=> "color-red.css",
						"type" 		=> "select",
						"options" => array("color-red.css","color-black.css","color-brown.css","color-purple.css"),
				);
*/

$of_options[] = array( 	"name" 		=> "Accent Color",
						"desc" 		=> "Pick an accent color for overall colors (default: #513D32).",
						"id" 		=> "DE_accent_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
				
$of_options[] = array( 	"name" 		=> "Page Background Color",
						"desc" 		=> "Pick a background color for the theme (default: blank).",
						"id" 		=> "DE_page_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Header Background Color",
						"desc" 		=> "Pick a background color for the header (default: #513D32).",
						"id" 		=> "DE_header_background",
						"std" 		=> "",
						"type" 		=> "color"
				);


$of_options[] = array( 	"name" 		=> "Footer Background Color",
						"desc" 		=> "Pick a background color for the footer (default: #513D32).",
						"id" 		=> "DE_footer_background",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Button Color",
						"desc" 		=> "Pick a background color for button (default: #513D32).",
						"id" 		=> "DE_button_color",
						"std" 		=> "",
						"type" 		=> "color"
				);


$of_options[] = array(  "name" 		=> "menu-color",
						"desc" 		=> "",
						"id" 		=> "menu-color",
						"std" 		=> "<h3>Menu Color</h3>",
						"type" 		=> "info"
				);

$of_options[] = array( 	"name" 		=> "Menu Background Color",
						"desc" 		=> "Pick a background color for the menu (default: #513D32).",
						"id" 		=> "DE_menu_background",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Menu Background Hover Color",
						"desc" 		=> "Pick a background color for the menu hover (default: #64483E).",
						"id" 		=> "DE_menu_background_hover",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Menu Font Color",
						"desc" 		=> "Pick a background color for the menu font (default: #fff).",
						"id" 		=> "DE_menu_font_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Menu Font Hover Color",
						"desc" 		=> "Pick a background color for the menu font hover (default: #fff).",
						"id" 		=> "DE_menu_font_color_hover",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array(  "name" 		=> "submenu-color",
						"desc" 		=> "",
						"id" 		=> "submenu-color",
						"std" 		=> "<h3>Menu Color</h3>",
						"type" 		=> "info"
				);

$of_options[] = array( 	"name" 		=> "Submenu Background Color",
						"desc" 		=> "Pick a background color for the menu (default: #845737).",
						"id" 		=> "DE_submenu_background",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Submenu Background Hover Color",
						"desc" 		=> "Pick a background color for the menu hover (default: #6b462c).",
						"id" 		=> "DE_submenu_background_hover",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Submenu Font Color",
						"desc" 		=> "Pick a background color for the menu font (default: #fff).",
						"id" 		=> "DE_submenu_font_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Submenu Font Hover Color",
						"desc" 		=> "Pick a background color for the menu font hover (default: #fff).",
						"id" 		=> "DE_submenu_font_color_hover",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array(  "name" 		=> "slider-color",
						"desc" 		=> "",
						"id" 		=> "slider-color",
						"std" 		=> "<h3>Slider Color</h3>",
						"type" 		=> "info"
				);

$of_options[] = array( 	"name" 		=> "Background Color 1",
						"desc" 		=> "Pick a background color for the menu font hover (default: #D38C23).",
						"id" 		=> "DE_slider_bg_font_color_1",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Background Color 2",
						"desc" 		=> "Pick a background color for the menu font hover (default: #342621).",
						"id" 		=> "DE_slider_bg_font_color_2",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Custom CSS",
						"type" 		=> "heading"
				);				

$of_options[] = array( 	"name" 		=> "Custom CSS",
						"desc" 		=> "Quickly add some CSS to your theme by adding it to this block.",
						"id" 		=> "custom_css",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Typography",
						"type" 		=> "heading"
				);
				

$of_options[] = array( 	"name" 		=> "Body Font",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "DE_body_font",
						"std" 		=> array('size' => '13px','face' => 'default','style' => 'normal','color' => '#333333'),
						"type" 		=> "typography"
						
				);  

$of_options[] = array( 	"name" 		=> "Menu Font",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "DE_menu_font",
						"std" 		=> array('size' => '12px','face' => 'default','style' => 'normal'),
						"type" 		=> "typography"
				); 

$of_options[] = array( 	"name" 		=> "Slider Font",
						"desc" 		=> "Specify the slider font properties",
						"id" 		=> "DE_supersized_slider_font",
						"std" 		=> array('size' => '32px','face' => 'default','color' => '#ffffff'),
						"type" 		=> "typography"
				); 
				
$of_options[] = array( 	"name" 		=> "Heading 1 Font",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "DE_heading_1_font",
						"std" 		=> array('size' => '28px','face' => 'default','style' => 'normal','color' => '#333333'),
						"type" 		=> "typography"
				);  
				 
$of_options[] = array( 	"name" 		=> "Heading 2 Font",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "DE_heading_2_font",
						"std" 		=> array('size' => '26px','face' => 'default','style' => 'normal','color' => '#333333'),
						"type" 		=> "typography"
				);  


$of_options[] = array( 	"name" 		=> "Heading 3 Font",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "DE_heading_3_font",
						"std" 		=> array('size' => '22px','face' => 'default','style' => 'normal','color' => '#333333'),
						"type" 		=> "typography"
				);  


$of_options[] = array( 	"name" 		=> "Heading 4 Font",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "DE_heading_4_font",
						"std" 		=> array('size' => '18px','face' => 'default','style' => 'normal','color' => '#333333'),
						"type" 		=> "typography"
				);  


$of_options[] = array( 	"name" 		=> "Heading 5 Font",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "DE_heading_5_font",
						"std" 		=> array('size' => '14px','face' => 'default','style' => 'normal','color' => '#333333'),
						"type" 		=> "typography"
				);  


$of_options[] = array( 	"name" 		=> "Heading 6 Font",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "DE_heading_6_font",
						"std" 		=> array('size' => '12px','face' => 'default','style' => 'normal','color' => '#333333'),
						"type" 		=> "typography"
				);  

// header settings

$of_options[] = array( 	"name" 		=> "Header Settings",
						"type" 		=> "heading"
				);				

$of_options[] = array( 	"name" 		=> "Fullwidth Header",
						"desc" 		=> "Check this box to set header width to 100% of browser width.",
						"id" 		=> "DE_header_fullwidth",
						"std" 		=> 0,
						"type" 		=> "checkbox"
				);

				
$of_options[] = array( 	"name" 		=> "Sticky Header",
						"desc" 		=> "Check this box to set header stay on top of page when scroll down page.",
						"id" 		=> "DE_header_sticky",
						"std" 		=> 0,
						"type" 		=> "checkbox"
				);				

$of_options[] = array( 	"name" 		=> "No Background",
						"desc" 		=> "Check this box to force hide header background.",
						"id" 		=> "DE_header_no_background",
						"std" 		=> 0,
						"type" 		=> "checkbox"
				);	
				
// room settings
$of_options[] = array( 	"name" 		=> "Room Settings",
						"type" 		=> "heading"
				);				

$of_options[] = array( 	"name" 		=> "Rooms Per Page",
						"desc" 		=> "Number of room item per page. Insert -1 to show unlimited item per page.",
						"id" 		=> "DE_room_per_page",
						"std" 		=> "6",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Single Room Background",
						"desc" 		=> "This will overide all single room background",
						"id" 		=> "DE_single_room_background",
						"std" 		=> "",
						"type" 		=> "media"
				);

$of_options[] = array( 	"name" 		=> "Room Thumbnail Action",
						"desc" 		=> "Normal Select Box.",
						"id" 		=> "DE_room_thumbnail_action",
						"std" 		=> "popup",
						"type" 		=> "select",
						"options" 	=> array('image popup','open room details'),
				);			
								
// gallery page settings
$of_options[] = array( 	"name" 		=> "Gallery Settings",
						"type" 		=> "heading"
				);				

$of_options[] = array( 	"name" 		=> "Gallery Per Page",
						"desc" 		=> "Number of gallery item per page. Insert -1 to show unlimited item per page.",
						"id" 		=> "DE_gallery_per_page",
						"std" 		=> "12",
						"type" 		=> "text"
				);

// blog page settings
$of_options[] = array( 	"name" 		=> "Blog Page",
						"type" 		=> "heading"
				);				

$of_options[] = array( 	"name" 		=> "Blog (read page) Background",
						"desc" 		=> "Upload an image to use as blog read page background",
						"id" 		=> "DE_blog_background",
						"std" 		=> "",
						"type" 		=> "media"
				);

$of_options[] = array( 	"name" 		=> "Select Sidebar",
						"desc" 		=> "Normal Select Box.",
						"id" 		=> "DE_blog_sidebar",
						"std" 		=> "Sidebar One",
						"type" 		=> "select",
						"options" 	=> array('Sidebar One','Sidebar Two','Sidebar Three','Sidebar Four','Sidebar Five','none'),
				);				
				
// contact page settings
$of_options[] = array( 	"name" 		=> "Contact Page",
						"type" 		=> "heading"
				);				


$of_options[] = array( 	"name" 		=> "Contact form email",
						"desc" 		=> "Email destination for contact form",
						"id" 		=> "DE_email_contact",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Reservation form email",
						"desc" 		=> "Email destination for reservation form",
						"id" 		=> "DE_email_reservation",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Google Map",
						"desc" 		=> "Insert Google Map embed code here.",
						"id" 		=> "DE_google_map",
						"std" 		=> "https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=envato&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=37.188995,86.572266&amp;ie=UTF8&amp;hq=envato&amp;hnear=&amp;radius=15000&amp;t=m&amp;ll=-37.817942,144.964977&amp;spn=0.071946,0.071946",
						"type" 		=> "textarea"
				);


// reservation page settings
$of_options[] = array( 	"name" 		=> "Reservation",
						"type" 		=> "heading"
				);		
				
$of_options[] = array( 	"name" 		=> "Reservation Success Message",
						"desc" 		=> "",
						"id" 		=> "DE_booking_success_message",
						"std" 		=> "Thank You! Your reservation was successfully sent.",
						"type" 		=> "text"
				);
				
$of_options[] = array(  "name" 		=> "reservation-email",
						"desc" 		=> "",
						"id" 		=> "reservation-email",
						"std" 		=> "<h3>Reservation Email Styler</h3>",
						"type" 		=> "info"
				);

$of_options[] = array( 	"name" 		=> "Email Border Color",
						"desc" 		=> "default: #CCCCCC.",
						"id" 		=> "DE_mail_wrapper_color",
						"std" 		=> "#CCCCCC",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Email Heading Color",
						"desc" 		=> "default: #513D32.",
						"id" 		=> "DE_mail_header_color",
						"std" 		=> "#513D32",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Email Heading Font Color",
						"desc" 		=> "default: #FFFFFF.",
						"id" 		=> "DE_mail_header_font_color",
						"std" 		=> "#FFFFFF",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Email Heading Text",
						"desc" 		=> "",
						"id" 		=> "DE_mail_header_text",
						"std" 		=> "New Reservation",
						"type" 		=> "text"
				);			
				
$of_options[] = array( 	"name" 		=> "Email Body Color 1",
						"desc" 		=> "default: #EAEAEA",
						"id" 		=> "DE_mail_body_color_1",
						"std" 		=> "#EAEAEA",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Email Body Color 2",
						"desc" 		=> "default: #F5F5F5",
						"id" 		=> "DE_mail_body_color_2",
						"std" 		=> "#F5F5F5",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Email Body Font Color",
						"desc" 		=> "default: #555555",
						"id" 		=> "DE_mail_body_font_color",
						"std" 		=> "#555555",
						"type" 		=> "color"
				);		

$of_options[] = array( 	"name" 		=> "Email Footer Color",
						"desc" 		=> "default: #CFAB5A",
						"id" 		=> "DE_mail_footer_color",
						"std" 		=> "#CFAB5A",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Email Footer Font Color",
						"desc" 		=> "default: #555555",
						"id" 		=> "DE_mail_footer_font_color",
						"std" 		=> "#555555",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Email Footer Text",
						"desc" 		=> "",
						"id" 		=> "DE_mail_footer_text",
						"std" 		=> "Thank You! We will confirm your reservation shortly.",
						"type" 		=> "text"
				);			

// slider page settings
$of_options[] = array( 	"name" 		=> "Slider Options",
						"type" 		=> "heading"
				);				

$of_options[] = array( 	"name" 		=> "Transition Effect",
						"desc" 		=> "",
						"id" 		=> "DE_transition_type",
						"std" 		=> "1-Fade",
						"type" 		=> "select",
						"options" => array("1-Fade","2-Slide Top","3-Slide Right","4-Slide Bottom","5-Slide Left","6-Carousel Right","7-Carousel Left","8-None"),
				);				

$of_options[] = array( 	"name" 		=> "Slide Interval",
						"desc" 		=> "Length between transitions",
						"id" 		=> "DE_slide_interval",
						"std" 		=> "3000",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "6000",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> "Transition Speed",
						"desc" 		=> "Speed of transition",
						"id" 		=> "DE_slider_transition_speed",
						"std" 		=> "500",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "2000",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array( 	"name" 		=> "Autoslide",
						"desc" 		=> "Check this box to make slider play directly on page load.",
						"id" 		=> "DE_slider_autoplay",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);

$of_options[] = array( 	"name" 		=> "No Crop Images",
						"desc" 		=> "Prevents the image from ever being cropped. Ignores minimum width and height.",
						"id" 		=> "DE_slider_fit_always",
						"std" 		=> 0,
						"type" 		=> "checkbox"
				);

$of_options[] = array( 	"name" 		=> "Show Play/Pause Button",
						"desc" 		=> "Check this box to show play/pause button on slider.",
						"id" 		=> "DE_slider_element_play_pause",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);

$of_options[] = array( 	"name" 		=> "Show Number",
						"desc" 		=> "Check this box to show number of slider item and current active slider item.",
						"id" 		=> "DE_slider_element_number",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);

$of_options[] = array( 	"name" 		=> "Show Bullets",
						"desc" 		=> "Check this box to show bullet navigaton on slider.",
						"id" 		=> "DE_slider_element_list",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);

$of_options[] = array( 	"name" 		=> "Show Arrow",
						"desc" 		=> "Check this box to show arrow navigation on slider.",
						"id" 		=> "DE_slider_element_arrow",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);

$of_options[] = array( 	"name" 		=> "Show Progress Bar",
						"desc" 		=> "Check this box to show timer bar on slider.",
						"id" 		=> "DE_slider_element_progress_bar",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);

$of_options[] = array( 	"name" 		=> "Show Footer",
						"desc" 		=> "Check this box to show footer above the slider.",
						"id" 		=> "DE_slide_show_footer",
						"std" 		=> 0,
						"type" 		=> "checkbox"
				);


// social media settings
$of_options[] = array( 	"name" 		=> "Social Media",
						"type" 		=> "heading"
				);	

$of_options[] = array( 	"name" => "Digg URL","desc"=> "", "id"=> "DE_digg", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Deviantart ID","desc"=> "", "id"=> "DE_deviantart", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Dribbble ID","desc"=> "", "id"=> "DE_dribbble", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Facebook ID","desc"=> "", "id"=> "DE_facebook", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Feedburner URL","desc"=> "", "id"=> "DE_rss", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Foursquare URL","desc"=> "", "id"=> "DE_foursquare", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Flickr ID","desc"=> "", "id"=> "DE_flickr", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Google Plus ID","desc"=> "", "id"=> "DE_gplus", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Instagram ID","desc"=> "", "id"=> "DE_instagram", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Last FM ID","desc"=> "", "id"=> "DE_lastfm", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Linkedin URL","desc"=> "", "id"=> "DE_linkedin", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "My Space ID","desc"=> "", "id"=> "DE_myspace", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Pinterest ID","desc"=> "", "id"=> "DE_pinterest", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Reddit URL","desc"=> "", "id"=> "DE_reddit", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Stumbleupon URL","desc"=> "", "id"=> "DE_stumbleupon", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "TripAdvisor URL","desc"=> "", "id"=> "DE_tripadvisor", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Tumblr ID","desc"=> "", "id"=> "DE_tumblr", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Twitter ID","desc"=> "", "id"=> "DE_twitter", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Vimeo ID","desc"=> "", "id"=> "DE_vimeo", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Yelp URL","desc"=> "", "id"=> "DE_yelp", "std"=> "", "type"=> "text");
$of_options[] = array( 	"name" => "Youtube ID","desc"=> "", "id"=> "DE_youtube", "std"=> "", "type"=> "text");


// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
