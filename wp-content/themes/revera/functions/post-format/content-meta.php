<div class="post-title">
    <h3 class="h1 responsive-txt mb0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php if (_option('blog_metadata',1)==1){ ?>
    <div class="post-meta">
	<?php if($post->post_type == 'post') :?>
       <?php _e('By','revera');?> <?php the_author_posts_link(); ?>
       <?php _e('on','revera');?> <?php the_time(_option("date_format","jS M Y")); ?>
       <?php _e('in','revera'); ?> <?php the_category(', ');
		elseif($post->post_type == 'page'):
        	_e('in Pages','revera');
     	elseif($post->post_type == 'portfolio'):
       		_e('in Portfolio','revera');
    	endif; ?>
    </div>
    <?php } ?>
</div>