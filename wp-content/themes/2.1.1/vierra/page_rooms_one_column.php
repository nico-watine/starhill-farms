<?php
/**
* Template Name: Rooms 1 Column
*
*/
?>
<?php get_header(); ?>
<?php 
$de_data = get_option( 'theme_mods_'.wp_get_theme()); 
$thumbnail_action = isset($de_data ['DE_room_thumbnail_action']) ? $de_data ['DE_room_thumbnail_action'] : null; 
?>


<div id="content-wrapper">

  <!-- ********** content *********** -->
  <?php 
					if ( have_posts() ) :
					while ( have_posts() ) :
					the_post();
					$cc = get_the_content();
					if($cc):
					?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="inner-page">
          <?php  the_content(); ?>
          <?php edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?>
        </div>
      </div>
    </div>
  </div>
  <?php endif; endwhile; endif; ?>
  <div class="clearfix"></div>
  <!-- ********** close content *********** -->

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-inner">
          <div id="room-list" class="gallery room-list type-1 ">
            <?php 
		$de_data = get_option( 'theme_mods_'.wp_get_theme() );
		$item_per_page = $de_data['DE_room_per_page'];
		if(!$item_per_page){
			$item_per_page = -1;
		}
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$wp_query = new WP_Query(array( 'posts_per_page'=> $item_per_page,	'post_type' => 'room','paged' => $paged));
		while ($wp_query->have_posts()) : $wp_query->the_post();	?>

            <div class="box room-item-one-column">
              <div class="row">
                <div class="inner">
                  <div class="col-md-4">
                    <div class="pic_hover">
                      <?php if($thumbnail_action=='open room details'){ ?>
                      <a class="image autosize" href="<?php the_permalink(); ?>">
                      <?php }else{ ?>
                      <a class="image autosize" href="<?php $image_popup = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); echo $image_popup[0]; ?>" rel="prettyPhoto[gallery]" title="<?php the_title();?>">
                        <?php } ?>
                        <span class="overlay"></span><img src="<?php $pic_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'gallery-thumbnail' ); echo $pic_thumb[0]  ?>"  />
                      </a>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="text">
                      <a href="<?php the_permalink(); ?>">
                      	<h3>
                          <?php the_title(); ?>
                        </h3>
                      </a>
                      <?php 
					  	$content = get_the_content();
						$trim_content = wp_trim_words( $content, 50 );
						echo $trim_content;
					  ?>
                      <br />
                      <a href="<?php the_permalink(); ?>" class="btn-custom-2"><?php echo __('View Room Details','Vierra'); ?></a>
                    </div>

                    <?php	edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?>
                  </div>
                </div>

                <div class="col-md-4">
                  <h4 class="title-room-facilites">
                    <?php  echo __('Room Facilities:','Vierra'); ?>
                  </h4>
                  <ul class="room-features-list">
                    <?php
	$terms = get_the_terms( $post->ID, 'room_features' );
	
	if($terms){
		foreach ( $terms as $term ) {
			echo '<li><i class="fa fa-check"></i>'.$term->name.'</li>' . '' . '';
		}

	}

	?>
                  </ul>

                  <?php  if(get_post_meta($post->ID, 'price', true)): ?>
                  <div class="price">
                    <h3>
                      <?php  echo get_post_meta($post->ID, 'price', true); ?>
                    </h3>
                    <span>
                      / <?php  echo __('night','Vierra'); ?>
                    </span>
                  </div>
                  <?php  endif; ?>
                </div>
              </div>
              <div class="de_divider div-single"></div>
            </div>
            <?php 		endwhile;	?>

          </div>


          <?php if (function_exists("de_pagination")) { ?>
          <?php de_pagination(); ?>
          <?php } ?>


          <?php wp_reset_query(); ?>
        </div>


      </div>
    </div>
  </div>
</div>
<!-- ********** close content *********** -->

<?php require_once "rev_slider.php"; ?>
<?php get_footer(); ?>