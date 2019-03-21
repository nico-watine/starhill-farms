<?php get_header(); ?>

       	<?php $btn_visit = get_option('DE_btn_view '); ?>
   		<?php $btn_more_images = get_option('DE_btn_more_images');?>

        
        <div id="content-wrapper" class="no-bg">
        	<div class="container">
            <div class="row">
            	<div class="col-md-12">
                	<div class="page-inner">
        <?php echo __('Page not found!','Vierra'); ?>
        
        <?php 
		$req = isset($req) ? $req : null;
		if($req=="unpassed"):  
		?>
        <?php if ( ! isset( $content_width ) ) $content_width = 900; ?>
		 <?php wp_list_comments( $args ); ?>
         <?php wp_link_pages( $args ); ?>
          <div id="post-<?php the_ID(); ?>" >
		  <?php post_class();
          	paginate_comments_links();
         	comment_form();
         	posts_nav_link();
        	add_theme_support( 'automatic-feed-links' );
         	dynamic_sidebar( $index );
          	the_tags( $before, $sep, $after ); 
         	add_theme_support( 'custom-header', $args );
         	add_theme_support( 'custom-background', $args );
         	endif; ?>

    	<div class="clear"></div>
        </div>
                </div>
            </div>
        </div>
        </div>
        <!-- ********** close content *********** -->
<?php get_footer(); ?>