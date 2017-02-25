<div class="meta-box">
    <?php 
		if (_option('blog_author_avatar',1)==1):
			echo themetor_sanitize(get_avatar( get_the_author_meta('user_email'), '80', '' )); 
		endif;
	?>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

	<?php if (_option('blog_single_metadata',1)==1){ ?>
    <div class="meta-more">
        <span><i class="icon-user"></i> <?php the_author_posts_link(); ?></span>
        <span><i class="icon-time"></i><a href="<?php echo esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))); ?>"><?php the_time(_option("date_format","jS M Y")); ?></a></span>
        <span><i class="icon-comments"></i> <?php comments_popup_link(__('No Comment','revera'), __('1 Comment','revera'), __('% Comments','revera')); ?></span>
        <span><i class="icon-link"></i> in <?php the_category(', '); ?></span>
    </div><!-- meta date -->
    <?php } ?>    
        
</div><!-- meta-box -->

<div class="post-content">
    <?php the_content(); ?>
</div><!-- post content -->


	
