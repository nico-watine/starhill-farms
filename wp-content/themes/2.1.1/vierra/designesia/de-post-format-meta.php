<?php 
// ===============================================================================
// meta  video
// ===============================================================================
function add_video_meta( $post ){
	$values = get_post_custom( $post->ID );
	$video = isset( $values['video'] ) ? esc_attr( $values['video'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 	
?>
<div id="meta_video" class="wrap-content">
  <table>
    <tr>
      <th>
      	<div class="title">Video URL</div>
      	<div class="info-text"></div>
      </th>
      <td><input class="text" type="" name="video" id="video" value="<?php echo esc_attr($video); ?>"/></td>
    </tr>
  </table>
</div>
<?php } ?>
<?php 
// ===============================================================================
// meta link
// ===============================================================================
function add_link_meta( $post ){
	$values = get_post_custom( $post->ID );
	$link_meta = isset( $values['link_meta'] ) ? esc_attr( $values['link_meta'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 	
?>
<div id="meta_link" class="wrap-content">
  <table>
    <tr>
      <th>
      	<div class="title">Link</div>
      	<div class="info-text"></div>
      </th>
      <td><input class="text" type="" name="link_meta" id="link_meta" value="<?php echo esc_attr($link_meta); ?>"/></td>
    </tr>
  </table>
</div>
<?php } ?>
<?php 
// ===============================================================================
// meta audio
// ===============================================================================
function add_audio_meta( $post ){
	$values = get_post_custom( $post->ID );
	$audio_meta_mp3 = isset( $values['audio_meta_mp3'] ) ? esc_attr( $values['audio_meta_mp3'][0] ) : '';
	$audio_meta_ogg = isset( $values['audio_meta_ogg'] ) ? esc_attr( $values['audio_meta_ogg'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 	
?>
<div id="meta_audio" class="wrap-content">
  <table>
    <tr>
      <th>
      	<div class="title">MP3 URL</div>
      	<div class="info-text">Url to .mp3 file</div>
      </th>
      <td><input class="text" type="" name="audio_meta_mp3" id="audio_meta_mp3" value="<?php echo esc_attr($audio_meta_mp3); ?>"/></td>
    </tr>
   </table>
	<div class="separator"></div>
  <table>
    <tr>
      <th>
      	<div class="title">OGA/OGG URL</div>
      	<div class="info-text">Url to .ogg/.oga file</div>
      </th>
      <td><input class="text" type="" name="audio_meta_ogg" id="audio_meta_ogg" value="<?php echo esc_attr($audio_meta_ogg); ?>"/></td>
    </tr>
   </table>
   
</div>
<?php } ?>
<?php 
// ===============================================================================
// meta quote
// ===============================================================================
function add_quote( $post ){
	$values = get_post_custom( $post->ID );
	$quote = isset( $values['quote'] ) ? esc_attr( $values['quote'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 	
?>
<div id="meta_quote" class="wrap-content">
  <table>
    <tr>
      <th>
      	<div class="title">Quote By</div>
      	<div class="info-text"></div>
      </th>
      <td><input class="text" type="" name="quote" id="quote" value="<?php echo $quote; ?>" /></td>
    </tr>
  </table>
</div>
<?php } ?>