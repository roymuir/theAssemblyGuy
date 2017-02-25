<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','revera')?></p>
	<?php
		return;
	}
?>


<?php if ( have_comments() ) : ?>
	
    <div class="user-comments grid-mb">
        <div class="clearfix">
            <h3> Comments <span><?php comments_number('0', '1', '%' );?></span></h3>
        </div>
                        
         
        <div class="navigation">
            <div class="prv"><?php previous_comments_link() ?></div>
            <div class="nxt"><?php next_comments_link() ?></div>
        </div>

    
        <ul class="comment-list clearfix">
            <?php wp_list_comments(array('avatar_size' => 60)); ?>
        </ul>
	
    </div><!-- user comments -->
    
 <?php else : // this is displayed if there are no comments so far ?>

		

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div class="respondform">
    <div class="clearfix">
        <h3><?php _e('Leave a Reply','revera')?></h3>
    </div>


                    
<?php
	
		//Custom Fields
		$fields =  array(
			
			'author' => '<div class="comment-form-author">
							<input class="comment-input" id="user-name" name="author" type="text" value="' . esc_attr($comment_author) . '" size="30" aria-required="true" placeholder="Name" />
							<label class="control-label" for="user-name">'. __('Name','revera').' <span class="required">*</span></label>
						</div>',
			
			'email' => '<div class="comment-form-email">
							<input class="comment-input" id="user-email" name="email" type="text" value="' . esc_attr($comment_author_email) . '" size="30" aria-required="true" placeholder="E-mail" />
							<label class="control-label" for="user-email">'. __('Email','revera').' <span class="required">*</span></label>
						</div>',  
			
			'url' => '<div class="comment-form-url">
						<input class="comment-input" id="user-url" name="url" type="text" value="' . esc_attr($comment_author_url) . '" size="30" placeholder="Website" />
						<label class="control-label" for="user-url">'. __('Website','revera').'</label>
					</div>',
		);

		
		//Comment Form Args
        $comments_args = array(
			'fields' => $fields,
			'comment_notes_before' => '<p class="comment-notes">'. __('Your email address will not be published. Required fields are marked','revera').' <span class="required">*</span></p>',
			'comment_field' => '<div class="comment-form-comment">
								<textarea id="user-comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="'. __('Your comment here...','revera').'"></textarea>
								</div>',
			'label_submit' => __('Post Comment','revera'),
			'title_reply' => ''
		);
		
		// Show Comment Form
		comment_form($comments_args); 
	?>
	
    </div><!-- form -->
    
<?php else: ?>

	<p class="nocomments"><?php _e('Comments are closed.','revera'); ?></p>

<?php endif; // if you delete this the sky will fall on your head ?>