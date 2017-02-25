
<div id="post-<?php the_ID(); ?>" <?php post_class('grid-mb'); ?> >

	<?php get_template_part('functions/post-format/content-meta'); ?>

    <div class="post-media">
        <div class="responsive-video">
            <?php echo themetor_sanitize(get_post_meta($post->ID, 'revera_format_video_embed', true)); ?>
        </div>
    </div>

    <!-- Post container -->
    <div class="post-bg">
        <!-- Post body -->
        <div class="post-body">
            <?php the_content(); ?>
        </div>

        <!-- Tags -->
		<?php the_tags('<div class="tags">', ' ' , '</div>'); ?>
        
    </div>
</div>