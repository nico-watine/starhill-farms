<?php  get_header(); ?>
<?php  $sb = get_post_meta($post->ID, 'my_select_1', true); ?>
	<div id="content-wrapper">
		<div class="container">
        	<div class="row">
             <?php 
	
	if($sb=="None"){
		echo '<div class="col-md-12"><div class="page-inner">';
	} else {
		echo '<div class="col-md-8"><div class="page-inner">';
	}

	?>
    	<!-- ********** content *********** -->
             		<?php 
	
	if ( have_posts() ) :
	while ( have_posts() ) :
	the_post();
	?>  
					<?php  the_content(); ?>  
                    <?php edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?>
                    <?php  endwhile; else : ?>  
                    <h2>Woops...</h2>  
                    <p><?php  echo __('Sorry, no posts found.','Vierra'); ?></p>  
                    <?php  endif; ?>  
        <div class="clearfix"></div>
        <!-- ********** close content *********** -->
        <?php  if($sb=="None") echo '</div>'; ?>
        </div>
</div>
                     <?php 
	
	if($sb!="None"){
		echo '<div class="col-md-4"><div class="sb inner">';
		dynamic_sidebar( $sb );
		echo '</div></div></div>' ;
	}

	?> 
</div>
</div>
<?php  get_footer(); ?>