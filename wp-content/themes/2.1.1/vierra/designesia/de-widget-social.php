<?php
/**
 * Plugin Name: Social Icons
 * Description: Display your social network icons.
 * Version: 0.1
 * Author: Designesia
 * Author URI: http://themeforest.net/user/designesia
 */


add_action( 'widgets_init', 'my_widget' );


function my_widget() {
	register_widget( 'MY_Widget' );
}

class MY_Widget extends WP_Widget {

	function MY_Widget() {
		$widget_ops = array( 'classname' => 'example', 'description' => __('A widget that displays the social icons', 'example') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'example-widget' );
		
		parent::__construct( 'example-widget', __('DE Social Widget', 'example'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$name = $instance['name'];
		$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;

		echo $before_widget;
		

		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;

		//Display the name 
	
		
		if ( $show_info )
			printf( $name );
			// show social icons
			$de_data = get_option( 'theme_mods_'.wp_get_theme() ); 
			$de_rss = $de_data['DE_rss'];
			$de_twitter = $de_data['DE_twitter'];
			$de_facebook = $de_data['DE_facebook'];
			$de_gplus = $de_data['DE_gplus'];
			$de_vimeo = $de_data['DE_vimeo'];
			$de_youtube = $de_data['DE_youtube'];
			$de_linkedin = $de_data['DE_linkedin'];
			$de_flickr = $de_data['DE_flickr'];
			$de_pinterest = $de_data['DE_pinterest'];
			$de_deviantart = $de_data['DE_deviantart'];
			$de_dribbble = $de_data['DE_dribbble'];
			$de_digg = $de_data['DE_digg'];
			$de_instagram = $de_data['DE_instagram'];
			$de_lastfm = $de_data['DE_lastfm'];
			$de_myspace = $de_data['DE_myspace'];
			$de_reddit = $de_data['DE_reddit'];
			$de_stumbleupon = $de_data['DE_stumbleupon'];
			$de_tumblr = $de_data['DE_tumblr'];
			$de_tripadvisor = $de_data['DE_tripadvisor'];
			$de_yelp = $de_data['DE_yelp'];
			$de_foursquare = $de_data['DE_foursquare'];
		
		echo '<div class="widget-social">';
		if ( $de_rss ) echo '<a href="'.$de_rss.'"><img src="'.get_template_directory_uri().'/images/social-icons/rss.png"/></a>';
		if ( $de_twitter ) echo '<a href="http://twitter.com/'.$de_twitter.'"><img src="'.get_template_directory_uri().'/images/social-icons/twitter.png"/></a>';
		if ( $de_facebook ) echo '<a href="http://facebook.com/'.$de_facebook.'"><img src="'.get_template_directory_uri().'/images/social-icons/facebook.png"/></a>';
		if ( $de_gplus ) echo '<a href="https://plus.google.com/'.$de_gplus.'"><img src="'.get_template_directory_uri().'/images/social-icons/gplus.png"/></a>';
		if ( $de_vimeo ) echo '<a href="http://vimeo.com/'.$de_vimeo.'"><img src="'.get_template_directory_uri().'/images/social-icons/vimeo.png"/></a>';
		if ( $de_youtube ) echo '<a href="http://youtube.com/'.$de_youtube.'"><img src="'.get_template_directory_uri().'/images/social-icons/youtube.png"/></a>';
		if ( $de_flickr ) echo '<a href="http://www.flickr.com/photos/'.$de_flickr.'"><img src="'.get_template_directory_uri().'/images/social-icons/flickr.png"/></a>';
		if ( $de_pinterest ) echo '<a href="http://pinterest.com/'.$de_pinterest.'"><img src="'.get_template_directory_uri().'/images/social-icons/pinterest.png"/></a>';
		if ( $de_deviantart ) echo '<a href="http://'.$de_deviantart.'.deviantart.com/"><img src="'.get_template_directory_uri().'/images/social-icons/deviantart.png"/></a>';
		if ( $de_dribbble ) echo '<a href="http://dribbble.com/'.$de_dribbble.'"><img src="'.get_template_directory_uri().'/images/social-icons/dribbble.png"/></a>';
		if ( $de_digg ) echo '<a href="'.$de_digg.'"><img src="'.get_template_directory_uri().'/images/social-icons/digg.png"/></a>';
		if ( $de_instagram ) echo '<a href="http://instagram.com/'.$de_instagram.'"><img src="'.get_template_directory_uri().'/images/social-icons/instagram.png"/></a>';
		if ( $de_linkedin ) echo '<a href="'.$de_linkedin.'"><img src="'.get_template_directory_uri().'/images/social-icons/linkedin.png"/></a>';
		if ( $de_lastfm ) echo '<a href="http://last.fm/music/'.$de_lastfm.'"><img src="'.get_template_directory_uri().'/images/social-icons/lastfm.png"/></a>';
		if ( $de_myspace ) echo '<a href="http://myspace.com/'.$de_myspace.'"><img src="'.get_template_directory_uri().'/images/social-icons/myspace.png"/></a>';
		if ( $de_reddit ) echo '<a href="'.$de_reddit.'"><img src="'.get_template_directory_uri().'/images/social-icons/reddit.png"/></a>';
		if ( $de_stumbleupon ) echo '<a href="'.$de_stumbleupon.'"><img src="'.get_template_directory_uri().'/images/social-icons/stumbleupon.png"/></a>';
		if ( $de_tumblr ) echo '<a href="http://'.$de_tumblr.'.tumblr.com/"><img src="'.get_template_directory_uri().'/images/social-icons/tumblr.png"/></a>';
		if ($de_foursquare): echo '<a href="'.$de_foursquare.'"><img src="'.get_template_directory_uri().'/images/social-icons/foursquare.png"/></a>';endif;
		if ($de_tripadvisor): echo '<a href="'.$de_tripadvisor.'"><img src="'.get_template_directory_uri().'/images/social-icons/tripadvisor.png"/></a>';endif;
		if ($de_yelp): echo '<a href="'.$de_yelp.'"><img src="'.get_template_directory_uri().'/images/social-icons/yelp.png"/></a>';endif;
		echo '</div>';
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['show_info'] = $new_instance['show_info'];

		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __('Example', 'example'), 'name' => __('Name', 'example'), 'show_info' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- //Widget Title: Text Input. -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'example'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		
       
        <!--
		//Text Input.
		<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Your Name:', 'example'); ?></label>
			<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" style="width:100%;" />
		</p>
		
		//Checkbox.
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_info'], true ); ?> id="<?php echo $this->get_field_id( 'show_info' ); ?>" name="<?php echo $this->get_field_name( 'show_info' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'show_info' ); ?>"><?php _e('Display info publicly?', 'example'); ?></label>
		</p>
		-->

	<?php
	}
}

?>