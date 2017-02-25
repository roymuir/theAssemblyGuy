
<div id="post-<?php the_ID(); ?>" <?php post_class('grid-mb'); ?> >

	<?php get_template_part('functions/post-format/content-meta'); ?>

    <div class="post-media">
        <?php $images = rwmb_meta( 'revera_gallery', array('type'=>'image','size'=>'img720n') ); ?>
        <ul class="img-slider">
            <?php foreach( $images as $image ) :  ?>
                <li><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></li>
            <?php endforeach; ?>
        </ul>
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