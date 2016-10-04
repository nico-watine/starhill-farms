<?php
	$de_data = get_option( 'theme_mods_'.get_current_theme()); 
	$de_email = isset($de_data ['DE_email_contact']) ? $de_data ['DE_email_contact'] : null;
	$success_message  = isset($de_data ['DE_booking_success_message']) ? $de_data ['DE_booking_success_message'] : null;
	$DE_mail_wrapper_color  = isset($de_data ['DE_mail_wrapper_color']) ? $de_data ['DE_mail_wrapper_color'] : null;
	$DE_mail_header_color  = isset($de_data ['DE_mail_header_color']) ? $de_data ['DE_mail_header_color'] : null;
	$DE_mail_header_font_color  = isset($de_data ['DE_mail_header_font_color']) ? $de_data ['DE_mail_header_font_color'] : null;
	$DE_mail_header_text  = isset($de_data ['DE_mail_header_text']) ? $de_data ['DE_mail_header_text'] : null;
	$DE_mail_body_color_2  = isset($de_data ['DE_mail_body_color_2']) ? $de_data ['DE_mail_body_color_2'] : null;
	$DE_mail_body_color_1  = isset($de_data ['DE_mail_body_color_1']) ? $de_data ['DE_mail_body_color_1'] : null;
	$DE_mail_body_font_color  = isset($de_data ['DE_mail_body_font_color']) ? $de_data ['DE_mail_body_font_color'] : null;
	$DE_mail_footer_color  = isset($de_data ['DE_mail_footer_color']) ? $de_data ['DE_mail_footer_color'] : null;
	$DE_mail_footer_font_color  = isset($de_data ['DE_mail_footer_font_color']) ? $de_data ['DE_mail_footer_font_color'] : null;
	$DE_mail_footer_text  = isset($de_data ['DE_mail_footer_text']) ? $de_data ['DE_mail_footer_text'] : null;
	
	$nameError = '';
	$countError = '';
	$emailError = '';
	$phoneError = '';
	?>
<?php 	
	if(isset($_POST['submitted'])) {
		// required field
		
		if(trim($_POST['datepick1']) === '') {
			$datepick1Error =  'Please check again!';
			$hasError = true;
		} else {
			$datepick1 = trim($_POST['datepick1']);
		}

		// required field
		
		if(trim($_POST['datepick2']) === '') {
			$datepick2Error =  'Please check again!';
			$hasError = true;
		} else {
			$datepick2 = trim($_POST['datepick2']);
		}

		// required field
		
		if(trim($_POST['contactName']) === '') {
			$contactNameError =  'Please check again!';
			$hasError = true;
		} else {
			$contactName = trim($_POST['contactName']);
		}

		// required field
		
		if(trim($_POST['person_num']) === '') {
			$person_numError =  'Please check again!';
			$hasError = true;
		} else {
			$person_num = trim($_POST['person_num']);
		}

		// required field
		
		if(trim($_POST['phone']) === '') {
			$phoneError =  'Please check again!';
			$hasError = true;
		} else {
			$phone = trim($_POST['phone']);
		}

		// need valid email
		
		if(trim($_POST['email']) === '')  {
			$emailError = 'Forgot to enter in your e-mail address.';
			$hasError = true;
		} else
		if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		$room_type = $_POST['my_select_1'];
		$comment = trim($_POST['comment']);
		// upon no failure errors let's email now!
		
		if(!isset($hasError)) {
			$emailTo = $de_email;
			$subject = $DE_mail_header_text;
			$sendCopy = trim($_POST['sendCopy']);
			$body = "
		<html>
<body>
<div style='padding:12px; display:inline-block; background:".$DE_mail_wrapper_color."'>
<div style='width:300; padding:10px; font-family:Arial, Helvetica, sans-serif; text-align:center; background:".$DE_mail_header_color."; color:".$DE_mail_header_font_color."; font-weight:bold;'>".$DE_mail_header_text."</div>
<div style=' display:inline-block; font-family:Arial, Helvetica, sans-serif;'>
<table width='320' cellpadding='0' cellspacing='0' border='0' style=' color:".$DE_mail_body_font_color."'>
  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'><strong>Room Type</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'>$room_type</td>
  </tr>
  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_2."'><strong>Check In Date</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_2."'>$datepick1</td>
  </tr>
  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'><strong>Check Out Date</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'>$datepick2</td>
  </tr>  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_2."'><strong>Name</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_2."'>$contactName</td>
  </tr>
  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'><strong>Email</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'>$email</td>
  </tr>
  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_2."'><strong>Phone</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_2."'>$phone</td>
  </tr>
  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'><strong>Person</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_1."'>$person_num</td>
  </tr>
  <tr>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_2."'><strong>Comments</strong></td>
    <td valign='top' style='padding:8px 8px 8px 10px;' bgcolor='".$DE_mail_body_color_2."'>$comment</td>
  </tr>
   <tr>
    <td colspan='2' valign='top' style='padding:10px; color:".$DE_mail_footer_font_color."; font-style:italic; text-align:center;' bgcolor='".$DE_mail_footer_color."'><strong>".$DE_mail_footer_text."</strong></td>
  </tr>
</table>
</div>
</div>
</body>
";
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From:'.$contactName.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email ."\r\n" . "Cc: ".$email;
			mail($emailTo, $subject, $body, $headers);
			// set our boolean completion value to TRUE
			$emailSent = true;
		}

	}

	?>
<?php  get_header(); ?>
	<?php  $sb = get_post_meta($post->ID, 'my_select_1', true); ?>
    <?php  $btn_visit = get_option('DE_btn_view '); ?>
   	<?php  $btn_more_images = get_option('DE_btn_more_images'); ?>
	<?php 
	
	if (have_posts()) :
	while (have_posts()) :
	the_post();
	?>
 		<div id="content-wrapper" class="no-bg">
		<div class="container single-room">
            <div class="row">
            <!-- ********** menu image *********** -->
            <div class="col-md-4">
                <div class="page-inner">
                <h3><?php  the_title(); ?></h3>
                <?php  the_content(); ?>
                <hr />
                <h3 class="title-room-facilites"><?php  echo __('Room Facilities:','Vierra'); ?></h3>
                	<ul class="room-features-list">
                    	<?php
	$terms = get_the_terms( $post->ID, 'room_features' );
	
	if($terms){
		foreach ( $terms as $term ) {
			echo __('<li><i class="fa fa-check"></i>'.$term->name.'</li>' . '' . '');
		}

	}

	?>
                    </ul>
                <?php  if(get_post_meta($post->ID, 'price', true)): ?>
                <div class="price">
				<h3><?php  echo get_post_meta($post->ID, 'price', true); ?></h3>
                <span>/ <?php  echo __('night','Vierra'); ?></span>
                </div>
                <?php  endif; ?>  
                </div>
                <div class="totop">
				<a href=" https://reserve4.resnexus.com/resnexus/reservations/lodging/78C4C5DD-3C8E-4A79-8F06-ECAB8E395F96" class="btn-custom btn-book-now"><i class="fa fa-calendar"></i><?php  echo __('Reserve Now','Vierra'); ?></a>
                </div>
            </div>
            <!-- ********** menu info *********** -->
            <div class="col-md-8">
            	<div id="booking-form" class="booking-form">
					<form id="contact-us" action='<?php the_permalink(); ?>' method="post">
                    <?php if(isset($hasError) || isset($captchaError) ) { ?>
                        <p class="col-md-12 email-alert"><?php echo __('Error submitting the form','Vierra'); ?></p>
                    <?php } ?>
                    
                	<div class="booking-inner row">
                    	
					<div class="col-md-12">
                    		
                        	<span class="text-label"><i class="fa fa-bookmark"></i><?php echo __('Select Room','Vierra'); ?></span>
                            <select name="my_select_1" id="my_select_1" class="form-control">
                            	<?php
								            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
											$wp_query = new WP_Query(array(	'posts_per_page'=> -1,  'post_type' => 'room','paged' => $paged));
											if (have_posts()) : while (have_posts()) : the_post(); ?>
															<option>
																<?php the_title(); ?>
															</option>
															
															<?php 		endwhile;endif; 	?>
                                                            <?php wp_reset_query(); ?> 
															</select>
                            
                            
                        </div>
                        
                        <div class="clearfix"></div>
                        
          				<div class="col-md-6">
                        	<span class="text-label"><i class="fa fa-calendar"></i><?php echo __('Check In Date','Vierra'); ?></span>
                        	<input type="text" name="datepick1" id="datepick1" value="<?php if(isset($_POST['datepick1']))  echo $_POST['datepick1'];?>" class="requiredField form-control" />
          				</div>
                        
						<div class="col-md-6">
                        	<span class="text-label"><i class="fa fa-calendar"></i><?php echo __('Check Out Date','Vierra'); ?></span>
                        	<input type="text" name="datepick2" id="datepick2" value="<?php if(isset($_POST['datepick2']))  echo $_POST['datepick2'];?>" class="requiredField form-control" />
						</div>
                        
                      	<div class="clearfix"></div>
                      
                    	<div class="col-md-6">
                            <span class="text-label"><i class="fa fa-user"></i><?php echo __('Name','Vierra'); ?></span>
                              <input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField form-control" />
                              <?php if($nameError != '') { ?>
                              <span class="error"></span>
                              <?php } ?>
                   	  	</div>
                        
                    	<div class="col-md-6">
                            <span class="text-label"><i class="fa fa-group"></i><?php echo __('Number of Person','Vierra'); ?></span>
                            <input type="text" name="person_num" id="person_num" value="<?php if(isset($_POST['person_num']))  echo $_POST['person_num'];?>" class="requiredField form-control" />
							  <?php if($countError != '') { ?>
                              <span class="error"></span>
                              <?php } ?>
                    	</div>
                        <div class="clearfix"></div>
                        <div class="col-md-6">
                            <span class="text-label"><i class="fa fa-envelope"></i><?php echo __('Email','Vierra'); ?></span>
                              <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email form-control" />
								  <?php if($emailError != '') { ?>
                                  <span class="error"></span>
                                  <?php } ?>
                    	</div>
                        
                    	<div class="col-md-6">
                            <span class="text-label"><i class="fa fa-phone"></i><?php echo __('Phone','Vierra'); ?></span>
                            <input type="text" name="phone" id="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>" class="requiredField form-control" />
								  <?php if($phoneError != '') { ?>
                                  <span class="error"></span>
                                  <?php } ?>
                    	</div>
                        
                        <div class="clearfix"></div>
                        
                        <div class="col-md-12">
							<span class="text-label"><i class="fa fa-comment"></i><?php echo __('Comment','Vierra'); ?></span>
                            <textarea name="comment" id="comment" value="<?php if(isset($_POST['comment'])) echo $_POST['comment'];?>" class="form-control"></textarea>
                        </div>

                        
                        <div class="clearfix"></div>
                        
                        
                        <div class="col-md-6">
							<button name="submit" type="submit" class="btn btn-custom btn-large"><?php echo __('Book Now','Vierra'); ?></button>
							<input type="hidden" name="submitted" id="submitted" value="true" />
                        </div>
                        
                  </div>
               		<div class="clearfix"></div>
                    </form>
                </div>
                <section class="slider">
        <div id="slider" class="flexslider">
           <ul class="slides view">
           		<li><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" /></li>
           		
                <?php for ($i = 1; $i <= 25; $i++) { ?>
                
					<?php  
                    if(get_post_meta($post->ID, 'pic_'.$i, true)):
                    ${'pic_' . $i} = get_post_meta($post->ID, 'pic_'.$i, true);				
                    echo '<li><img src="'.${'pic_' . $i}.'" alt="'.${'pic_' . $i}.'"></li>';
                    endif; ?>
                
                <?php } ?>
                   
          </ul>
        </div>
        <div id="carousel" class="flexslider">
          <ul class="slides">
          		<li><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" /></li>
           		
               
                <?php for ($i = 1; $i <= 25; $i++) { ?>
                
					<?php  
                    if(get_post_meta($post->ID, 'pic_'.$i, true)):
                    ${'pic_' . $i} = get_post_meta($post->ID, 'pic_'.$i, true);				
                    echo '<li><img src="'.${'pic_' . $i}.'" alt="'.${'pic_' . $i}.'"></li>';
                    endif; ?>
                
                <?php } ?>
          </ul>
        </div>
      </section>
            </div>
            </div>
            </div>
        </div>
        	<script type='text/javascript' src='<?php  echo get_template_directory_uri() ?>/js/bootstrap-datepicker.js'></script>
        	<script>
				jQuery(document).ready(function () {
					jQuery('#datepick1').datepicker();
					jQuery('#datepick2').datepicker();
				});
            </script>
			<script type='text/javascript' src='<?php  echo get_template_directory_uri() ?>/js/jquery.backstretch.min.js'></script>
        <!-- ********** custom bg *********** -->
        <div class="bg_pattern"></div>
        <div id="background-image">
		<script>
         jQuery.backstretch("http://starhillfarms.com/wp-content/uploads/2014/09/Starhillfarms_23.jpg");
		 jQuery('#bg-page').hide();
        </script>
		</div>
	<?php 
	endwhile;
	endif;
	?>
<?php  get_footer(); ?>