
<div id="post-<?php the_ID(); ?>" <?php post_class('grid-mb'); ?> >

	<blockquote>
        <?php the_content(); ?>
        <small>
            <a href="<?php echo esc_url(get_post_meta($post->ID, 'revera_format_quote_source_url', true)); ?>" target="_blank">
             <?php echo esc_html(get_post_meta($post->ID, 'revera_format_quote_source_name', true)); ?>
            </a>
        </small>
    </blockquote>
    
</div>