
<div id="post-<?php the_ID(); ?>" <?php post_class('grid-mb'); ?> >

	<?php get_template_part('functions/post-format/content-meta'); ?>

	<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'img720n'); ?>
    <?php if ($image): ?>
    	<div class="post-media">
            <img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"/>
        </div>
	<?php endif; ?>

    <!-- Post container -->
    <div class="post-bg">
        <!-- Post body -->
        <div class="post-body">
            <p><?php the_excerpt(); ?></p>
            <?php if (_option('blog_more_button')==1):?>
                <div><a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html(_option('blog_button')); ?></a></div>   
            <?php endif; ?>
        </div>
		
		<?php if(_option('blog_tags','1')=='1'){
				the_tags('<div class="tags">', ' ' , '</div>');
			}
		?>
        
    </div>
</div>
