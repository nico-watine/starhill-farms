jQuery(document).ready(function() {
	for (var i = 1; i <= 25; i++) {
		 jQuery('#upload_'+i).click(function() {
		 id = '#'+jQuery(this).prev().attr("id");
		 window.send_to_editor = function(html) {
		 imgurl = jQuery('img',html).attr('src');
		 jQuery(id).val(imgurl);
		 tb_remove();
		 }
		 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		 return false;
		});
	}
});
 

jQuery(document).ready(function() {
 jQuery('#btn_thumbnail').click(function() {
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#thumbnail').val(imgurl);
 tb_remove();
 }
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
});

jQuery(document).ready(function() {
 jQuery('#upload_bg_image').click(function() {
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#bg_image').val(imgurl);
 tb_remove();
 }
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
});