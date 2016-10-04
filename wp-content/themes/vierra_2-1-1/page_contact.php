<?php
/**
* Template Name: Contact
*
*/

$de_data = get_option( 'theme_mods_'.wp_get_theme() ); 
if (isset($de_data['DE_email_contact'])):$de_email = $de_data['DE_email_contact'];endif;
if (isset($de_data['DE_google_map'])):$de_google_map = $de_data['DE_google_map'];endif;

$nameError = '';
$emailError = '';
$commentError = '';
$sendCopy = '';
$sb = get_post_meta($post->ID, 'my_select_1', true);
?>
<?php 
if(isset($_POST['submitted'])) {

	
		if(trim($_POST['contactName']) === '') {
			$nameError = 'You forgot to enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		if(trim($_POST['email']) === '')  {
			$emailError = 'You forgot to enter your email address.';
			$hasError = true;
		} else if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		if(trim($_POST['comments']) === '') {
			$commentError = 'You forgot to enter your comments.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		if(!isset($hasError)) {
			
			if($de_email):
  			$email_address = $de_email;
			else:
			$email_address = 'designesia@gmail.com';
    		endif;

			$emailTo = $email_address;
			$subject = 'You Got Contact Message!';
			//$sendCopy = trim($_POST['sendCopy']);
			$message = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			
			$headers = "MIME-Version: 1.1";
			$headers .= "Content-type: text/plain; charset=iso-8859-1";
			$headers .= "From:".$emailTo;
			$headers .= "Return-Path:".$emailTo;
			mail($emailTo, $subject, $message, $headers, "-r".$emailTo);

			if($sendCopy == true) {
				$subject = 'You emailed Your Name';
				$headers = 'From: Your Name <noreply@somedomain.com>';
				mail($email, $subject, $message, $headers);
			}

			$emailSent = true;

		}
} ?>


<?php get_header(); ?>
	<div id="content-wrapper" >
		<div class="container">
        	<div class="row">
              
            
             <?php if($sb=="None"){
				 echo '<div class="col-md-12">';
				 }else{
				 echo '<div class="col-md-8">';	 
			 }?>
             
             <?php if(isset($de_google_map)!=''): ?>
              <div class="map">
                <?php echo $de_google_map; ?>          
              </div>
              <?php endif; ?>
            
            <div class="page-inner">
              
              
              <!-- ********** content *********** -->
             		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
					<?php the_content(); ?>  
                    <?php	edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?>
                    <?php endwhile; else: ?>  
                    <h2>Woops...</h2>  
                    <p><?php echo __('Sorry, no posts found.','Vierra'); ?></p>  
                    <?php endif; ?>  
        <!-- ********** close content *********** -->
              
              <div class="contact_form_holder">
		             
		<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
              <table class="table-form">
  <tr>
    <td><?php echo __('Name','Vierra'); ?></td>
    <td><input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" />
      <?php if($nameError != '') { ?>
      <span class="error-2"><?php echo __('Please check again.','Vierra'); ?></span>
      <?php } ?></td>
  </tr>
  <tr>
    <td><?php echo __('Email','Vierra'); ?></td>
    <td><input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />
      <?php if($emailError != '') { ?>
      <span class="error-2"><?php echo __('Please check again.','Vierra'); ?></span>
      <?php } ?></td>
  </tr>
  <tr>
    <td><?php echo __('Message','Vierra'); ?></td>
    <td><textarea name="comments" id="commentsText" rows="6" cols="30" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
      <?php if($commentError != '') { ?>
      <span class="error-2"><?php echo __('Please check again.','Vierra'); ?></span>
      <?php } ?></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td><!--<input style="width:24px; display:inline-block;" type="checkbox" name="sendCopy" id="sendCopy" value="true"<?php //if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> />Send a copy of this email to yourself
				<input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" /> -->
      <input type="hidden" name="submitted" id="submitted" value="true" />
      <button class="btn btn-custom" type="submit"><?php echo __('SEND','Vierra'); ?></button></td>
  </tr>
  
</table>

  </form> 
        <?php if(isset($emailSent) && $emailSent == true) { ?>

        <div class="thanks">
         <?php echo __('Thank You! Your email was successfully sent.','Vierra'); ?>
      </div>
        
        <?php } ;?>
        	</div>
              	</div>
             	</div>
                
                <?php if($sb!="None"){
			 echo '<div class="col-md-4"><div class="sb inner">';	
				dynamic_sidebar( $sb );
			 echo '</div></div>' ;
			 }?>
            </div>
      </div>
        
        
        
  <div class="clear"></div>
        
        </div>

<?php require_once "rev_slider.php"; ?>		
<?php get_footer(); ?>