<?php  
				 
if (get_post_meta( get_the_ID(), 'revera_embed', true ) != '') {
 
	if (get_post_meta( get_the_ID(), 'revera_portfolio-video', true ) == 'vimeo') {  
		echo '<div class="responsive-video"><iframe src="http://player.vimeo.com/video/'.get_post_meta( get_the_ID(), 'revera_embed', true ).'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="790" height="440" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen class="iframe"></iframe></div>';  
	}  
	else if (get_post_meta( get_the_ID(), 'revera_portfolio-video', true ) == 'youtube') {  
		echo '<div class="responsive-video" ><iframe width="790" height="440" src="http://www.youtube.com/embed/'.get_post_meta( get_the_ID(), 'revera_embed', true ).'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" frameborder="0" allowfullscreen class="iframe"></iframe></div>';  
	}  
	else {  
		echo '<div class="responsive-video" >'.get_post_meta( get_the_ID(), 'revera_embed', true ).'</div>'; 
	}  
	
} else {
	
  	$img_type='img720n';
    if (_option('portfolio_sidebar')=='nosidebar'){$img_type='img1080n';}
	
	$images = rwmb_meta( 'revera_portfolio-gallery', array('type'=>'image','size'=>$img_type) ); 
    if($images){?>
        <ul class="img-slider">
            <?php foreach( $images as $image ) :  ?>
                <li><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="responsive-img"/></li>
            <?php endforeach; ?>
        </ul>
	<?php
	}elseif(has_post_thumbnail()){ ?>
		<figure >
			<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $img_type); ?>
			<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" class="responsive-img"/>
		</figure>
	<?php } ?>
	
<?php } ?>