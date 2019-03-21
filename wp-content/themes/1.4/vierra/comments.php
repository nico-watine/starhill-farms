<div id="comment-list">
<?php if ($comments) : ?>
<h4 id="comment-title"><?php echo __('Comments','Vierra'); ?> (<?php comments_number( '0', '1', '%' ); ?>)</h4>
    <ol class="comment-list">
    <?php foreach ($comments as $comment) : ?>
        <li <?php echo isset($oddcomment); ?>id="comment-<?php comment_ID() ?>">
        
        <div class="comment-info">
            <?php echo get_avatar( $comment, 80 ); ?>
        </div>

        <div class="comment-data">
       	<h5><?php comment_author_link() ?></h5>
        <span class="comment-date"><?php comment_date('F jS, Y') ?></span>
        <?php comment_text() ?>
        <?php if ($comment->comment_approved == '0') : ?> 
        <em><?php echo __('Your comment is awaiting moderation.','Vierra'); ?></em>
        <?php endif; ?>
        <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?>
        </div>
 		<div class="clear"></div>
        </li>
    <?php
        if(isset($oddcomment))$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
    ?>
    <?php endforeach; ?>
    </ol>
 <?php else :  ?>
    <?php if ('open' == $post->comment_status) : ?>
        <!-- If comments are open, but there are no comments. -->
     <?php else : ?>
        <!-- If comments are closed. -->
        <p class="nocomments"><?php echo __('Comments are closed.','Vierra'); ?></p>
    <?php endif; ?>
<?php endif; ?>
<div class="clear"></div>


<?php if ( comments_open() ) : ?>

	<div id="respond" >

		<h4><?php comment_form_title( __('Leave a Comment', 'framework'), __('Leave a Comment to %s', 'framework') ); ?></h4>
	
		<div  class="cancel-comment-reply">
			<?php cancel_comment_reply_link(); ?>
		</div>
	
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p><?php printf(__('You must be %1$slogged in%2$s to post a comment.', 'framework'), '<a href="'.get_option('siteurl').'/wp-login.php?redirect_to='.urlencode(get_permalink()).'">', '</a>') ?></p>
		<?php else : ?>
	
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	
			<?php if ( is_user_logged_in() ) : ?>
		
			<p><?php printf(__('Logged in as %1$s. %2$sLog out &raquo;%3$s', 'framework'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>', '<a href="'.(function_exists('wp_logout_url') ? wp_logout_url(get_permalink()) : get_option('siteurl').'/wp-login.php?action=logout" title="').'" title="'.__('Log out of this account', 'framework').'">', '</a>') ?></p>
		
			<?php else : ?>
			<label for="author"><?php _e('Name', 'framework') ?> <?php if ($req) _e("(required)", 'framework'); ?></label>
			<input class="text" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" />
            <label for="email"><?php _e('Mail (will not be published)', 'framework') ?> <?php if ($req) _e("(required)", 'framework'); ?></label>
			<input class="text" type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" />
            <label for="url"><?php _e('Website', 'framework') ?></label>
			<input class="text" type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
			<?php endif; ?>
            <label for="url"><?php _e('Comment', 'framework') ?></label>
			<div class="textarea-container"><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></div>
		
			<p><input class="button" name="submit" type="submit" id="submit" tabindex="5" value="<?php echo __('Submit Comment','Vierra'); ?>" />
			<?php comment_id_fields(); ?>
			</p>
			<?php do_action('comment_form', $post->ID); ?>
	
		</form>

	<?php endif;?>
	</div>

	<?php endif;?>

