<?php
$prefix = 'pf_';
function my_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', get_template_directory_uri() . '/js/upload.js', array('jquery','media-upload','thickbox'));
wp_enqueue_script('my-upload');
}
function my_admin_styles() {
wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');
?>
<?php
add_action( 'add_meta_boxes', 'de_meta_box_add' );
function de_meta_box_add(){		
	add_meta_box( 'room-meta-1', 'Settings', 'room_meta', 'room', 'normal', 'high' ); // room custom post	
	add_meta_box( 'gallery-meta-1', 'Gallery Item Settings', 'gallery_meta', 'gallery', 'normal', 'high' ); // gallery custom post	
	add_meta_box( 'slider-meta-1', 'Slider Settings', 'add_pictures_slider', 'slider', 'normal', 'high' ); // slider custom post 	
	add_meta_box( 'page-meta-1', 'Page Settings', 'add_background', 'page', 'normal', 'high' ); // page
	add_meta_box( 'page-meta-2', 'Video Background (self hosted) Template', 'add_video_html5', 'page', 'normal', 'high' ); // page
	add_meta_box( 'post-meta-1', 'Custom Page Background', 'add_background', 'post', 'normal', 'high' ); // post
}
?>
<?php
function room_meta( $post ){
	$values = get_post_custom( $post->ID );
	$pic_1 = isset( $values['pic_1'] ) ? esc_attr( $values['pic_1'][0] ) : '';
	$pic_2 = isset( $values['pic_2'] ) ? esc_attr( $values['pic_2'][0] ) : '';
	$pic_3 = isset( $values['pic_3'] ) ? esc_attr( $values['pic_3'][0] ) : '';
	$pic_4 = isset( $values['pic_4'] ) ? esc_attr( $values['pic_4'][0] ) : '';
	$pic_5 = isset( $values['pic_5'] ) ? esc_attr( $values['pic_5'][0] ) : '';
	$pic_6 = isset( $values['pic_6'] ) ? esc_attr( $values['pic_6'][0] ) : '';
	$pic_7 = isset( $values['pic_7'] ) ? esc_attr( $values['pic_7'][0] ) : '';
	$pic_8 = isset( $values['pic_8'] ) ? esc_attr( $values['pic_8'][0] ) : '';
	$pic_9 = isset( $values['pic_9'] ) ? esc_attr( $values['pic_9'][0] ) : '';
	$pic_10 = isset( $values['pic_10'] ) ? esc_attr( $values['pic_10'][0] ) : '';
	$pic_11 = isset( $values['pic_11'] ) ? esc_attr( $values['pic_11'][0] ) : '';
	$pic_12 = isset( $values['pic_12'] ) ? esc_attr( $values['pic_12'][0] ) : '';
	$pic_13 = isset( $values['pic_13'] ) ? esc_attr( $values['pic_13'][0] ) : '';
	$pic_14 = isset( $values['pic_14'] ) ? esc_attr( $values['pic_14'][0] ) : '';
	$pic_15 = isset( $values['pic_15'] ) ? esc_attr( $values['pic_15'][0] ) : '';
	$pic_16 = isset( $values['pic_16'] ) ? esc_attr( $values['pic_16'][0] ) : '';
	$pic_17 = isset( $values['pic_17'] ) ? esc_attr( $values['pic_17'][0] ) : '';
	$pic_18 = isset( $values['pic_18'] ) ? esc_attr( $values['pic_18'][0] ) : '';
	$pic_19 = isset( $values['pic_19'] ) ? esc_attr( $values['pic_19'][0] ) : '';
	$pic_20 = isset( $values['pic_20'] ) ? esc_attr( $values['pic_20'][0] ) : '';
	$pic_21 = isset( $values['pic_21'] ) ? esc_attr( $values['pic_21'][0] ) : '';
	$pic_22 = isset( $values['pic_22'] ) ? esc_attr( $values['pic_22'][0] ) : '';
	$pic_23 = isset( $values['pic_23'] ) ? esc_attr( $values['pic_23'][0] ) : '';
	$pic_24 = isset( $values['pic_24'] ) ? esc_attr( $values['pic_24'][0] ) : '';
	$pic_25 = isset( $values['pic_25'] ) ? esc_attr( $values['pic_25'][0] ) : '';
	$bg_image = isset( $values['bg_image'] ) ? esc_attr( $values['bg_image'][0] ) : '';
	
	$price = isset( $values['price'] ) ? esc_attr( $values['price'][0] ) : '';
	// ==========
	$text = isset( $values['my_meta_box_text'] ) ? esc_attr( $values['my_meta_box_text'][0] ) : '';
	$selected = isset( $values['my_select_1'] ) ? esc_attr( $values['my_select_1'][0] ) : '';
	$check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <div class="wrap-content">
      <table>
        <tr>
          <th>
            <div class="title">Price</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="price" id="price" value="<?php echo $price; ?>" />
          </td>
          </tr>
      </table> 
      
	<div class="spacer-20"></div>
	
	<h3 class="de_title">Background Image</h3>	
    <div class="upload-pic">
    	<?php if($bg_image!=''):?><div class="display-pic"><img src="<?php echo $bg_image; ?>" width="100px;" /></div> <?php endif; ?>
    	<label class="label" for="pic_1">Background image url</label>
		<input class="text" type="text" name="bg_image" id="bg_image" value="<?php echo $bg_image; ?>" />
        <input class="button" type="button" value="browse" id="upload_bg_image" />
	</div>
    
    <h3 class="de_title">Additional Image</h3>
    <?php for ($i = 1; $i <= 25; $i++) { ?>   
	
		<div class="upload-pic">
			<?php if(${'pic_' . $i}!=''):?><div class="display-pic"><img src="<?php echo ${'pic_' . $i}; ?>" width="100px;" /></div> <?php endif; ?>
			<label class="label" for="pic_1">Picture <?php echo $i ?></label>
			<input class="text" type="text" name="pic_<?php echo $i ?>" id="pic_<?php echo $i ?>" value="<?php echo ${'pic_' . $i}; ?>" />
			<input class="button" type="button" value="browse" id="upload_<?php echo $i ?>" />
		</div>
	
    <?php } ?>
	
	</div>
	
	<?php	}
function add_picture( $post ){
		$values = get_post_custom( $post->ID );
	
	$main_pic = isset( $values['main_pic'] ) ? esc_attr( $values['main_pic'][0] ) : '';
	$main_pic = isset( $values['main_pic'] ) ? esc_attr( $values['main_pic'][0] ) : '';
	
	$text = isset( $values['my_meta_box_text'] ) ? esc_attr( $values['my_meta_box_text'][0] ) : '';
	$selected = isset( $values['my_select_1'] ) ? esc_attr( $values['my_select_1'][0] ) : '';
	$check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <div class="upload-pic main">
    <?php if($main_pic!=''):?><div class="display-pic"><img src="<?php echo $main_pic; ?>" width="100px;" /></div> 
	<?php endif; ?>    	
    <label class="label" for="main_pic">Main picture</label>
		<input class="text" type="text" name="main_pic" id="main_pic" value="<?php echo $main_pic; ?>" />
        <input class="button" type="button" value="browse" id="upload_main" />
        <span class="info-text">Image size must be <strong>600 x 600px</strong></span>
	</div>
<?php }
function add_options( $post ){
	$values = get_post_custom( $post->ID );
	
	$project_url = isset( $values['project_url'] ) ? esc_attr( $values['project_url'][0] ) : '';
	
	$text = isset( $values['my_meta_box_text'] ) ? esc_attr( $values['my_meta_box_text'][0] ) : '';
	$selected = isset( $values['my_select_1'] ) ? esc_attr( $values['my_select_1'][0] ) : '';
	$check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    
    <div class="wrap-content">
    	<label class="label" for="project_url">Project URL</label>
		<input class="text" type="text" name="project_url" id="project_url" value="<?php echo $project_url; ?>" />
        <span class="info-text">Enter project url or leave it blank (use "http://")</strong></span>
    </div>
	<?php	}
function add_video( $post ){
	$values = get_post_custom( $post->ID );
	
	$video_url = isset( $values['video_url'] ) ? esc_attr( $values['video_url'][0] ) : '';
	
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<div class="wrap-content">
      <table>
        <tr>
          <th>
            <div class="title">Youtube/Vimeo URL</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="video_url" id="video_url" value="<?php echo $video_url; ?>" />
          </td>
          </tr>
      </table> 
	</div>
	<?php	}
function gallery_meta( $post ){
	$values = get_post_custom( $post->ID );
	$opt_gallery_single = isset( $values['opt_gallery_single'] ) ? esc_attr( $values['opt_gallery_single'][0] ) : '';
	$url = isset( $values['url'] ) ? esc_attr( $values['url'][0] ) : '';
	$video_url = isset( $values['video_url'] ) ? esc_attr( $values['video_url'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	
	<div class="wrap-content">
	
		<table>
        <tr>
          <th>
            <div class="title">Open single page</div>
            <div class="info-text"></div>
          </th>
          <td>
			<select class="select" type="text" name="opt_gallery_single" id="opt_gallery_single"/>
          		<option <?php if($opt_gallery_single=='no'){?>selected="selected"<?php } ?>>no</option>
                <option <?php if($opt_gallery_single=='yes'){?>selected="selected"<?php } ?>>yes</option>
			</select>
          </td>
          </tr>
      </table> 
	  
	  <div class="separator"></div>
	  
	  <table>
        <tr>
          <th>
            <div class="title">Video url</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="video_url" id="video_url" value="<?php echo $video_url; ?>" />
          </tr>
      </table>
	  
	  <div class="separator"></div>
	  
	  <table>
        <tr>
          <th>
            <div class="title">Custom URL</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="url" id="url" value="<?php echo $url; ?>" />
          </td>
          </tr>
      </table> 
	</div>
	
<?php }
add_action( 'save_post', 'de_meta_box_save' );
function de_meta_box_save( $post_id )
{
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	if( !current_user_can( 'edit_post' ) ) return;
	$allowed = array( 
		'a' => array( 
			'href' => array() 
		)
	);
	
	if( isset( $_POST['my_meta_box_text'] ) )
		update_post_meta( $post_id, 'my_meta_box_text', wp_kses( $_POST['my_meta_box_text'], $allowed ) );
	if( isset( $_POST['bg_image'] ) )
		update_post_meta( $post_id, 'bg_image', wp_kses( $_POST['bg_image'], $allowed ) );
	if( isset( $_POST['main_pic'] ) )
		update_post_meta( $post_id, 'main_pic', wp_kses( $_POST['main_pic'], $allowed ) );		
	if( isset( $_POST['pic_1'] ) )
		update_post_meta( $post_id, 'pic_1', wp_kses( $_POST['pic_1'], $allowed ) );
	
	for ($i = 1; $i <= 25; $i++) {
    	if( isset( $_POST['pic_'.$i] ) )
			update_post_meta( $post_id, 'pic_'.$i, wp_kses( $_POST['pic_'.$i], $allowed ) );
    } 	
		
	if( isset( $_POST['thumbnail'] ) )
		update_post_meta( $post_id, 'thumbnail', wp_kses( $_POST['thumbnail'], $allowed ) );
	if( isset( $_POST['bg_image'] ) )
		update_post_meta( $post_id, 'bg_image', wp_kses( $_POST['bg_image'], $allowed ) );	
	
	if( isset( $_POST['url'] ) )
		update_post_meta( $post_id, 'url', wp_kses( $_POST['url'], $allowed ) );
	
	if( isset( $_POST['project_url'] ) )
		update_post_meta( $post_id, 'project_url', wp_kses( $_POST['project_url'], $allowed ) );
	
	if( isset( $_POST['extra_url'] ) )
		update_post_meta( $post_id, 'extra_url', wp_kses( $_POST['extra_url'], $allowed ) );
		
	if( isset( $_POST['quote'] ) )
		update_post_meta( $post_id, 'quote', wp_kses( $_POST['quote'], $allowed ) );
		
	if( isset( $_POST['price'] ) )
		update_post_meta( $post_id, 'price', wp_kses( $_POST['price'], $allowed ) );
		
	
	if( isset( $_POST['video'] ) )
		update_post_meta( $post_id, 'video', wp_kses( $_POST['video'], $allowed ) );
		
	if( isset( $_POST['video_url'] ) )
		update_post_meta( $post_id, 'video_url', wp_kses( $_POST['video_url'], $allowed ) );	
	
	if( isset( $_POST['audio_meta_mp3'] ) )
		update_post_meta( $post_id, 'audio_meta_mp3', wp_kses( $_POST['audio_meta_mp3'], $allowed ) );

	if( isset( $_POST['audio_meta_ogg'] ) )
		update_post_meta( $post_id, 'audio_meta_ogg', wp_kses( $_POST['audio_meta_ogg'], $allowed ) );
		
	if( isset( $_POST['link_meta'] ) )
		update_post_meta( $post_id, 'link_meta', wp_kses( $_POST['link_meta'], $allowed ) );
			
	if( isset( $_POST['my_select_1'] ) )
		update_post_meta( $post_id, 'my_select_1', esc_attr( $_POST['my_select_1'] ) );
	
	if( isset( $_POST['opt_gallery_single'] ) )
		update_post_meta( $post_id, 'opt_gallery_single', esc_attr( $_POST['opt_gallery_single'] ) );

	if( isset( $_POST['cover'] ) )
		update_post_meta( $post_id, 'cover', wp_kses( $_POST['cover'], $allowed ) );
	
	if( isset( $_POST['text_align'] ) )
		update_post_meta( $post_id, 'text_align', wp_kses( $_POST['text_align'], $allowed ) );

	if( isset( $_POST['file_webm'] ) )
		update_post_meta( $post_id, 'file_webm', wp_kses( $_POST['file_webm'], $allowed ) );

	if( isset( $_POST['file_mp4'] ) )
		update_post_meta( $post_id, 'file_mp4', wp_kses( $_POST['file_mp4'], $allowed ) );

	if( isset( $_POST['file_ogg'] ) )
		update_post_meta( $post_id, 'file_ogg', wp_kses( $_POST['file_ogg'], $allowed ) );
		
	if( isset( $_POST['youtube_id'] ) )
		update_post_meta( $post_id, 'youtube_id', wp_kses( $_POST['youtube_id'], $allowed ) );
	
	if( isset( $_POST['rev_slider'] ) )
		update_post_meta( $post_id, 'rev_slider', wp_kses( $_POST['rev_slider'], $allowed ) );
	
		
	$chk = ( isset( $_POST['my_meta_box_check'] ) && $_POST['my_meta_box_check'] ) ? 'on' : 'off';
	update_post_meta( $post_id, 'my_meta_box_check', $chk );
	
	$mute = ( isset( $_POST['mute'] ) && $_POST['mute'] ) ? 'on' : 'off';
	update_post_meta( $post_id, 'mute', $mute );
}
?>
<?php // GALLERY METABOX
function add_pictures_gallery( $post ){
	$values = get_post_custom( $post->ID );
	$main_pic = isset( $values['main_pic'] ) ? esc_attr( $values['main_pic'][0] ) : '';
	$thumbnail = isset( $values['thumbnail'] ) ? esc_attr( $values['thumbnail'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <div class="wrap-content">
      <table>
        <tr>
          <th>
            <div class="title">Main picture</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="main_pic" id="main_pic" value="<?php echo $main_pic; ?>" />
          <input class="button" type="button" value="browse" id="upload_main" />
          </td>
          </tr>
      </table> 
      <div class="separator"></div>
       <table>
        <tr>
          <th>
            <div class="title">Thumbnail</div>
            <div class="info-text">Image size (300 x 225 px)</div>
          </th>
          <td><input class="text" type="text" name="thumbnail" id="thumbnail" value="<?php echo $thumbnail; ?>" />
          <input class="button" type="button" value="browse" id="btn_thumbnail" />
          </td>
          </tr>
      </table>          
	  <?php if($main_pic!=''):?><div class="separator"></div><div class="display-pic"><img src="<?php echo $main_pic; ?>" class="preview_big" /></div> 
	<?php endif; ?>    	
	</div>
	<?php } ?>
<?php // ========== SLIDER METABOX ==========
function add_pictures_slider( $post ){
	$values = get_post_custom( $post->ID );
	$pic_1 = isset( $values['pic_1'] ) ? esc_attr( $values['pic_1'][0] ) : '';
	$url = isset( $values['url'] ) ? esc_attr( $values['url'][0] ) : '';
	$text_align = isset( $values['text_align'] ) ? esc_attr( $values['text_align'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <div class="wrap-content">
	  <table>
        <tr>
          <th>
            <div class="title">Text Align</div>
          </th>
          <td><select class="select" type="text" name="text_align" id="text_align"/>
          			<option <?php if($text_align=='center'){?>selected="selected"<?php } ?>>center</option>
                    <option <?php if($text_align=='left'){?>selected="selected"<?php } ?>>left</option>
                    <option <?php if($text_align=='right'){?>selected="selected"<?php } ?>>right</option>
                </select>
          </td>
          
          </tr>
      </table>   
    	<div class="separator"></div>
      <table>
          <tr>
          <th>
            <div class="title">Click URL (optional)</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="url" id="url" value="<?php echo $url; ?>" />
          </td>
          </tr>
       		
      </table>          
	</div>
	<?php } ?>
<?php // ========== custom page/post background ==========
function add_background( $post ){
	$values = get_post_custom( $post->ID );
	$bg_image = isset( $values['bg_image'] ) ? esc_attr( $values['bg_image'][0] ) : '';
	$my_select_1 = isset( $values['my_select_1'] ) ? esc_attr( $values['my_select_1'][0] ) : '';
	$youtube_id = isset( $values['youtube_id'] ) ? esc_attr( $values['youtube_id'][0] ) : '';
	$rev_slider = isset( $values['rev_slider'] ) ? esc_attr( $values['rev_slider'][0] ) : '';
	$mute = isset( $values['mute'] ) ? esc_attr( $values['mute'][0] ) : '';

	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <div class="wrap-content">
    <table>
        <tr>
          <th>
            <div class="title">Select Sidebar</div>
          </th>
          <td><select class="select" type="text" name="my_select_1" id="my_select_1"/>
          			<option <?php if($my_select_1=='None'){?>selected="selected"<?php } ?>>None</option>
                    <option <?php if($my_select_1=='Sidebar One'){?>selected="selected"<?php } ?>>Sidebar One</option>
                    <option <?php if($my_select_1=='Sidebar Two'){?>selected="selected"<?php } ?>>Sidebar Two</option>
                    <option <?php if($my_select_1=='Sidebar Three'){?>selected="selected"<?php } ?>>Sidebar Three</option>
                    <option <?php if($my_select_1=='Sidebar Four'){?>selected="selected"<?php } ?>>Sidebar Four</option>
                    <option <?php if($my_select_1=='Sidebar Five'){?>selected="selected"<?php } ?>>Sidebar Five</option>
                </select>
          </td>
          
          </tr>
      </table>   
    	<div class="separator"></div>
      <table>
        <tr>
          <th>
            <div class="title">Image background</div>
            <div class="info-text">Choose an image or insert external image url to use as background for current page.</div>
          </th>
          <td><input class="text" type="text" name="bg_image" id="bg_image" value="<?php echo $bg_image; ?>" />
          <input class="button" type="button" value="browse" id="upload_bg_image" />
          </td>
          </tr>
      </table>
		<div class="separator"></div>
	  <table>
        <tr>
          <th>
            <div class="title">Youtube ID</div>
            <div class="info-text">Insert Youtube video id to use as video background for current page.</div>
          </th>
          <td><input class="text" type="text" name="youtube_id" id="youtube_id" value="<?php echo $youtube_id; ?>" />
          </td>
          </tr>
      </table>      
		
		<div class="divider"></div>
		
		<div class="checkbox">
			<div class="box_l">
				<h4>Video sound</h4>
			</div>
			<div class="box_r">
				<input name="mute" type="checkbox" id="mute" <?php checked( $mute, 'on' ); ?> />
				<label>Check this box to mute video sound</label>
			</div>
        </div>    
		
		<div class="divider"></div>
		
		<div class="separator"></div>
	  <table>
        <tr>
          <th>
            <div class="title">Revolution Slider</div>
            <div class="info-text">Insert Revolution slider alias (example: slider-1).</div>
          </th>
          <td><input class="text" type="text" name="rev_slider" id="rev_slider" value="<?php echo $rev_slider; ?>" />
          </td>
          </tr>
      </table> 
		
	  <?php if($bg_image!=''):?><div class="separator"></div><div class="display-pic"><img src="<?php echo $bg_image; ?>" class="preview_big" /></div> 
	<?php endif; ?>    	
	</div>
	<?php } ?>
<?php // ========== custom page/post video background ==========
function add_video_html5( $post ){
	$values = get_post_custom( $post->ID );
	$cover = isset( $values['cover'] ) ? esc_attr( $values['cover'][0] ) : '';
	$file_webm = isset( $values['file_webm'] ) ? esc_attr( $values['file_webm'][0] ) : '';
	$file_mp4 = isset( $values['file_mp4'] ) ? esc_attr( $values['file_mp4'][0] ) : '';
	$file_ogg = isset( $values['file_ogg'] ) ? esc_attr( $values['file_ogg'][0] ) : '';
	$bg_image = isset( $values['bg_image'] ) ? esc_attr( $values['bg_image'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <div class="wrap-content">
      <table>
      	<tr>
          <th>
            <div class="title">Cover</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="cover" id="cover" value="<?php echo $cover; ?>" />
          <input class="button" type="button" value="browse" id="upload_cover" />
          </td>
          </tr>
          
        <tr>
          <th>
            <div class="title">webm</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="file_webm" id="file_webm" value="<?php echo $file_webm; ?>" />
          </td>
          </tr>
          
          <tr>
          <th>
            <div class="title">mp4</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="file_mp4" id="file_mp4" value="<?php echo $file_mp4; ?>" />
          </td>
          </tr>
          
          <tr>
          <th>
            <div class="title">ogg</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="file_ogg" id="file_ogg" value="<?php echo $file_ogg; ?>" />
          </td>
          </tr>
      </table> 
      
            
	  <?php if($cover!=''):?><div class="separator"></div><div class="display-pic"><img src="<?php echo $cover; ?>" class="preview_big" /></div> 
	<?php endif; ?>    	
	</div>
	<?php } ?>