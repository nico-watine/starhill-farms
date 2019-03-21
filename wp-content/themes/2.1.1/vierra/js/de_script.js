    jQuery(document).ready(function(){
		jQuery('.de_options').slideUp();
		
		jQuery('.de_section h3').click(function(){		
			if(jQuery(this).parent().next('.de_options').css('display')=='none')
				{	jQuery(this).removeClass('inactive');
					jQuery(this).addClass('active');
					jQuery(this).children('img').removeClass('inactive');
					jQuery(this).children('img').addClass('active');
					
				}
			else
				{	jQuery(this).removeClass('active');
					jQuery(this).addClass('inactive');		
					jQuery(this).children('img').removeClass('active');			
					jQuery(this).children('img').addClass('inactive');
				}
				
			jQuery(this).parent().next('.de_options').slideToggle(200);	
		});
		
		hide_metabox = function(){
		jQuery('#meta_quote').parent().parent().hide();
		jQuery('#meta_link').parent().parent().hide();
		jQuery('#meta_video').parent().parent().hide();
		jQuery('#meta_audio').parent().parent().hide();
		}
		
		hide_metabox();
		
		if(jQuery("#post-format-audio").is(':checked')){
					jQuery("#meta_audio").parent().parent().show();
		}else if(jQuery("#post-format-video").is(':checked')){
					jQuery('#meta_video').parent().parent().show();
		}else if(jQuery("#post-format-link").is(':checked')){
					jQuery('#meta_link').parent().parent().show();
		}else if(jQuery("#post-format-quote").is(':checked')){
					jQuery('#meta_quote').parent().parent().show();
		}
		
		jQuery('#post-format-audio').click(function(){
			hide_metabox();
			jQuery("#meta_audio").parent().parent().show();
		});
		jQuery('#post-format-video').click(function(){
			hide_metabox();
			jQuery("#meta_video").parent().parent().show();
		});
		jQuery('#post-format-link').click(function(){
			hide_metabox();
			jQuery("#meta_link").parent().parent().show();
		});
		jQuery('#post-format-quote').click(function(){
			hide_metabox();
			jQuery("#meta_quote").parent().parent().show();
		});
		jQuery('#post-format-standard').click(function(){
			hide_metabox();
		});
		jQuery('#post-format-image').click(function(){
			hide_metabox();
		});
		
		
});