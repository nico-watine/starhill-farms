<?php 
$youtube_id = isset($youtube_id) ? $youtube_id : null;
$youtube_id = get_post_meta($post->ID, 'youtube_id', true);

$mute = isset($mute) ? $mute : null;
$mute = get_post_meta($post->ID, 'mute', true);
if($mute!=''){
?>
<div class="rev_video_bg">
	<div class="tp-banner-container">
		<div class="tp-banner" >
			<ul>
				<li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-thumb=""  data-saveperformance="on"  data-title="Intro Slide">
					<img src="<?php echo get_template_directory_uri()."/images/blank.png" ?>" alt="">
			
					<div class="tp-caption tp-resizeme fullscreenvideo tp-videolayer"
						data-x="0"
						data-y="0"
						data-width="['auto']"
						data-height="['auto']"
						data-speed="600"
						data-start="500"
						data-autoplay="on"						
						data-ytid="<?php echo $youtube_id; ?>"
						data-videowidth="100%"
						data-videoheight="100%"
						data-videoloop="loop"
						data-videoattributes="enablejsapi=1&html5=1&hd=1&wmode=opaque&showinfo=0&rel=0"
						data-videocontrols="controls"
						data-videowidth="100%"
						data-videoheight="100%"
						data-aspectratio="16:9"
						data-forceCover="1"
						<?php if($mute=="on"){echo 'data-volume="mute"';} ?>
						>
					</div>
				</li>
			</ul>
		<div class="tp-bannertimer"></div>
	</div>
</div>	

			<script type="text/javascript">

				jQuery(document).ready(function() {
				
					
								
					jQuery('.tp-banner').show().revolution(
					{
						dottedOverlay:"none",
						delay:16000,
						startwidth:1170,
						startheight:700,
						hideThumbs:200,
						
						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:5,
						
						navigationType:"bullet",
						navigationArrows:"solo",
						navigationStyle:"preview4",
						
						touchenabled:"on",
						onHoverStop:"on",
						
						swipe_velocity: 0.7,
						swipe_min_touches: 1,
						swipe_max_touches: 1,
						drag_block_vertical: false,
												
												parallax:"mouse",
						parallaxBgFreeze:"on",
						parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
												
						keyboardNavigation:"off",
						
						navigationHAlign:"center",
						navigationVAlign:"bottom",
						navigationHOffset:0,
						navigationVOffset:20,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,
								
						shadow:0,
						fullWidth:"off",
						fullScreen:"on",

						spinner:"spinner4",
						
						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,

						shuffle:"off",
						
						autoHeight:"off",						
						forceFullWidth:"off",						
												
												
												
						hideThumbsOnMobile:"off",
						hideNavDelayOnMobile:1500,						
						hideBulletsOnMobile:"off",
						hideArrowsOnMobile:"off",
						hideThumbsUnderResolution:0,
						
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						startWithSlide:0,
						fullScreenOffsetContainer: ".header"	
					});
					
					
					
									
				});	//ready
				
			</script>
</div>
<?php } ?>