<?php

if(is_admin()) {
    wp_enqueue_script('custom-meta-boxes', get_template_directory_uri() . '/js/custom-meta-boxes.js', array('jquery'),'', true);
}

add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
	add_meta_box( 'post-details', 'Post Details', 'cd_meta_box_cb', 'post', 'normal', 'high' );
}

function cd_meta_box_cb( $post )
{
	$values = get_post_custom( $post->ID );
	$link_url = isset( $values['link_post_url'] ) ? esc_attr( $values['link_post_url'][0] ) : '';
	$link_caption = isset( $values['link_post_caption'] ) ? esc_attr( $values['link_post_caption'][0] ) : '';
	$video_embed = isset( $values['video_post_embed'] ) ? esc_attr( $values['video_post_embed'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<p id="link-post-url" style="display:none;">
		<label for="link_post_url">Link URL</label><br/>
		<input type="text" name="link_post_url" id="link_post_url" value="<?php echo $link_url; ?>" style="width:400px;"/><br/>
                <small>Enter the URL to be used for this Link post.</small>
	</p>
	<p id="link-post-caption" style="display:none;">
		<label for="link_post_caption">Link Caption</label><br/>
		<input type="text" name="link_post_caption" id="link_post_caption" value="<?php echo $link_caption; ?>" style="width:400px;"/><br/>
                <small>Enter the Caption to be used for this link.</small>
	</p>
	<p id="video-post-code" style="display:none;">
		<label for="video_post_embed">Video Embed Code</label><br/>
		<textarea name="video_post_embed" id="video_post_embed" style="width:400px;" rows="5"><?php echo $video_embed; ?></textarea><br/>
                <small>Paste the emdbed/iframe code you want to display, into this field, and we'll take care of the rest.</small>
	</p>
	<?php	
}


add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id )
{
	// Bail out if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// If our nonce isn't there, or we can't verify it, bail out
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// If our current user can't edit this post, bail out
	if( !current_user_can( 'edit_post' ) ) return;
	
	// Now, actually save the data
	$allowed = array( 
		'a' => array(
                    'href' => array(), 'title' => array()),
                'iframe' => array(
                    'src' => array(),'name' => array(),'width' => array(),'height' => array(),'frameborder' => array(),'longdesc' => array(),'align' => array(),'marginwidth' => array(),'marginheight' => array(),'scrolling' => array())
	);
	
	// Make sure your data is set
	if( isset( $_POST['link_post_url'] ) )
	update_post_meta( $post_id, 'link_post_url', wp_kses( $_POST['link_post_url'], $allowed ) );

	if( isset( $_POST['link_post_caption'] ) )
	update_post_meta( $post_id, 'link_post_caption', wp_kses( $_POST['link_post_caption'], $allowed ) );

	if( isset( $_POST['video_post_embed'] ) )
	update_post_meta( $post_id, 'video_post_embed', wp_kses( $_POST['video_post_embed'], $allowed ) );
		
}
?>