<?php
    add_action( 'after_setup_theme', 'setup' );
    function setup() { 
        // ... 
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'custom-image', 300, 300, true );
        add_image_size( 'gallery-thumbnail', 600, 400, true );  
		
		add_image_size( 'custom-image-400x300', 400, 300, true ); 
		add_image_size( 'custom-image-480x480', 480, 480, true ); 
		add_image_size( 'custom-image-640x480', 640, 480, true ); 
		add_image_size( 'custom-image-640', 640, true );   
		
        // ... 
    } 

    add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' ); 
    function custom_image_sizes_choose( $sizes ) { 
        $custom_sizes = array( 
            'custom-image' => 'Custom Image'  ,
            'gallery-thumbnail' => 'Gallery Thumbnail'
        ); 
        return array_merge( $sizes, $custom_sizes ); 
    }      
?>