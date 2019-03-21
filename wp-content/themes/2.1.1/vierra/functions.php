<?php
ob_start();
$de_data = get_option('Vierra_options');
if (!current_user_can('edit_posts'));
if (is_admin()) {
    include('admin/index.php');
}

/* -------------------------------------------------------------------------------- */
/* load css function
/* -------------------------------------------------------------------------------- */
function de_include_css()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', false, '1.0', 'screen');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', false, '1.0', 'screen');
    wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', false, '1.0', 'screen');
    wp_enqueue_style('supersized', get_template_directory_uri() . '/js/supersized/css/supersized.css', false, '1.0', 'screen');
    wp_enqueue_style('supersized_shutter', get_template_directory_uri() . '/js/supersized/theme/supersized.shutter.css', false, '1.0', 'screen');
    wp_enqueue_style('datepicker', get_template_directory_uri() . '/css/datepicker.css', false, '1.0', 'screen');
    wp_enqueue_style('override', get_template_directory_uri() . '/css/override.css', false, '1.0', 'screen');
    wp_enqueue_style('slider_text_n_desription_2', get_template_directory_uri() . '/css/slider_text_n_desription.css', false, '1.0', 'screen');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.css', false, '1.0', 'screen');
    wp_enqueue_style('flexslider-css', get_template_directory_uri() . '/css/flexslider.css', false, '1.0', 'screen');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.css', false, '1.0', 'screen');
}


/* -------------------------------------------------------------------------------- */
/* load javascript function
/* -------------------------------------------------------------------------------- */
function de_include_js(){
	wp_enqueue_script('custom_script-2', get_template_directory_uri() . '/js/easing.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-4', get_template_directory_uri() . '/js/jquery.prettyPhoto.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-5', get_template_directory_uri() . '/js/jquery.prettyPhoto.setting.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-14', get_template_directory_uri() . '/js/twitter.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-15', get_template_directory_uri() . '/js/selectnav.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-16', get_template_directory_uri() . '/js/ender.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-17', get_template_directory_uri() . '/js/video.resize.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-19', get_template_directory_uri() . '/js/jquery.tubular.1.0.js',array('jquery'),"",true);
	wp_enqueue_script('isotop', get_template_directory_uri() . '/js/jquery.isotope.min.js',array('jquery'),"",true);
	wp_enqueue_script('lazyload', get_template_directory_uri() . '/js/jquery.lazyload.js',array('jquery'),"",true);
	wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-DE', get_template_directory_uri() . '/js/designesia.js',array('jquery'),"",true);
	wp_enqueue_script('backstretch', get_template_directory_uri() . '/js/jquery.backstretch.min.js',array('jquery'),"",false);
	
	
	
	if (is_page_template('page_reservation.php')||is_page_template('page_reservation_2.php')||is_singular('room')){
		wp_enqueue_script('bootstrap-datepicker', get_template_directory_uri() . '/js/bootstrap-datepicker.js',array('jquery'),"",true);
		wp_enqueue_script('datepicker-settings', get_template_directory_uri() . '/js/datepicker-settings.js',array('jquery'),"",true);
    }

	
	if (is_page_template('page_slider.php') or is_page_template('page_slider_extended.php')  ){
		wp_enqueue_script('supersized', get_template_directory_uri() . '/js/supersized/js/supersized.3.2.7.js',array('jquery'),"",false);
		wp_enqueue_script('supersized-shutter', get_template_directory_uri() . '/js/supersized/theme/supersized.shutter.min.js',array('jquery'),"",false);
    }

}

function de_admin_style()
{
    wp_enqueue_style("de-panel", get_template_directory_uri() . "/css/de-panel.css", false, "1.0", "all");
}

function de_styler()
{
    include('styler.php');
}
/* -------------------------------------------------------------------------------- */
/* call css and js
/* -------------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'de_include_css');
add_action('wp_enqueue_scripts', 'de_include_js');
add_action('admin_enqueue_scripts', 'de_admin_style');
add_action('wp_head', 'de_styler');

//
function de_home_page_menu_args($args)
{
    $args['show_home'] = true;
    return $args;
}
add_filter('wp_page_menu_args', 'de_home_page_menu_args');
?>
<?php
include('designesia/de-theme-post-type.php');
include('designesia/de-theme-post-meta.php');
include('designesia/de-custom-image-size.php');
include('designesia/de-admin-custom-field.php');
include('designesia/de-widget-social.php');
include ('designesia/de-shortcode/de-shortcode.php');
require_once 'tgm/example.php';
?>
<?php // P A G I N A T I O N
function de_pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2) + 1;
    
    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo "<div class=\"pagination\">";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link(1) . "'>&laquo; First</a>";
        if ($paged > 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo; Previous</a>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<span class=\"current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a>";
            }
        }
        if ($paged < $pages && $showitems < $pages)
            echo "<a href=\"" . get_pagenum_link($paged + 1) . "\">Next &rsaquo;</a>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($pages) . "'>Last &raquo;</a>";
        echo "</div>";
    }
}

/* ----------------------------------------------------------------------------- */
/* register sidebar /* 
-------------------------------------------------------------------------------- */
// The first sidebar
if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Sidebar One', // The sidebar name to register
		'id' => 'sidebar-1',
		'description' => 'The widget area will be displayed on page sidebar.',
        'before_widget' => '<div class="my-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
// The second sidebar
if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Sidebar Two', // The sidebar name to register
		'id' => 'sidebar-2',
		'description' => 'The widget area will be displayed on page sidebar.',
        'before_widget' => '<div class="my-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
// The third sidebar
if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Sidebar Three', // The sidebar name to register
		'id' => 'sidebar-3',
		'description' => 'The widget area will be displayed on page sidebar.',
		'before_widget' => '<div class="my-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
// The Fourth sidebar
if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Sidebar Four', // The sidebar name to register
		'id' => 'sidebar-4',
		'description' => 'The widget area will be displayed on page sidebar.',
		'before_widget' => '<div class="my-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
// The Fifth sidebar
if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Sidebar Five', // The sidebar name to register
		'id' => 'sidebar-5',
		'description' => 'The widget area will be displayed on page sidebar.',
		'before_widget' => '<div class="my-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

/* ----------------------------------------------------------------------------- */
/* register menu /* 
-------------------------------------------------------------------------------- */
register_nav_menu('primary', __('Primary Menu', 'Vierra'));
register_nav_menu('secondary', __('Secondary Menu', 'Vierra'));
function de_current_to_active($text)
{
    $replace = array(
        'current_page_item' => 'active',
        'current_page_parent' => 'active',
        'current_page_ancestor' => 'active'
    );
    $text    = str_replace(array_keys($replace), $replace, $text);
    return $text;
}
add_filter('wp_nav_menu', 'de_current_to_active');
load_theme_textdomain('Vierra', get_template_directory().'/languages');


?>
