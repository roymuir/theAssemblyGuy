<?php 

/*
 * Related Portfolio Carousel
 *
 * Theme: Revera
 * Author: ThemeTor
 * Website: http://themetor.com
 */


$carousel_id = 'pc_' . rand();


?>

<div class="section section-grey section-related">
    <div class="row">
    
    <?php 
	
	if (_option('related_portfolio_title')){
		echo '<div class="title center"><h2>'. _option('related_portfolio_title') .'</h2></div>';
	}
	
	?>

	<script>
		jQuery(document).ready(function($) {	
			try {
				$("#<?php echo esc_js($carousel_id) ; ?>").owlCarousel({
					items:3,
					loop: true,
					margin:0,
					nav:true,
					navSpeed:<?php echo _option('portfolio_carousel_speed',1000); ?>,
					navText:['<i class="icon-angle-right"></i>','<i class="icon-angle-left"></i>'],
					dots:false,
					autoplay:true,
					rtl:false,
					autoplayTimeout:<?php echo _option('portfolio_carousel_pause_time',4000); ?>,
					autoplaySpeed:<?php echo _option('portfolio_carousel_speed',1000); ?>,
					autoplayHoverPause:true,
					responsive : {0 : {items : 1,nav : false}, 480 : {items : 2}, 768 : {items : 3}}
					
				});
			} catch(e){}
		});	
	</script>

    
	<?php 
	$terms = get_the_terms( $post->ID , 'portfolio_types', 'string');
	$term_ids = array_values( wp_list_pluck( $terms,'term_id' ) );
	$related_query = new WP_Query( array(
		  'post_type' => 'portfolio',
		  'tax_query' => array(
						array(
							'taxonomy' => 'portfolio_types',
							'field' => 'id',
							'terms' => $term_ids,
							'operator'=> 'IN' //Or 'AND' or 'NOT IN'
						 )),
		  'posts_per_page' => 10,
		  'ignore_sticky_posts' => 1,
		  'orderby' => 'date',  // 'rand' for random order
		  'post__not_in'=>array($post->ID)
	));
	?>

            <div class="owl-carousel nav_off grab"  id="<?php echo esc_attr($carousel_id); ?>">
  
            <?php

				while ( $related_query->have_posts() ) : $related_query->the_post(); 
				
				$portfolio_to=get_post_meta( get_the_ID(), 'revera_portfolio-to', true );          	
				$terms = get_the_terms( get_the_ID(), 'portfolio_types' ); 
				if ( has_post_thumbnail()) {
				
					if ($portfolio_to=='lightbox'){
						
						$thdglkr_embed = get_post_meta( get_the_ID(), 'revera_embed', true );
						if( $thdglkr_embed != "") {
							
							if ( get_post_meta( get_the_ID(), 'revera_portfolio-video', true ) == 'youtube' ) {
								$ahref = '<a class="popup-iframe" href="http://www.youtube.com/watch?v='.$thdglkr_embed.'" >'; 
							} else if ( get_post_meta( get_the_ID(), 'revera_portfolio-video', true ) == 'vimeo' ) {
								$ahref = '<a class="popup-iframe" href="http://vimeo.com/'. $thdglkr_embed .'" >';
							} else if ( get_post_meta( get_the_ID(), 'revera_portfolio-video', true ) == 'other' ) {
								$ahref = '<a class="popup-iframe" href="'.$thdglkr_embed.'" >';
							}
							
						} else {
							$image = wp_get_attachment_url( get_post_thumbnail_id());
							$ahref = '<a class="popup" href="'. esc_url($image).'">';
						}
						
					}elseif ($portfolio_to=='details'){
						$ahref = '<a href="'. get_permalink() .'">';
					}elseif ($portfolio_to=='projecturl'){
						$projecturl = get_post_meta( get_the_ID(), 'revera_portfolio-url', true );
						$ahref = '<a href="'. esc_url($projecturl) .'">';
					}else{
						$ahref = '<a href="#" onclick="return false;">';
					}

				?>
				
				<div class="grid-ms">
                    <div class="work-item">
                        <?php echo themetor_sanitize($ahref); ?>
                            <?php the_post_thumbnail('img360q',array('class'=>'responsive-img'));?>
                            <span class="overlay"></span>
                            <span class="wi-txt">
                                <b><?php the_title();?></b>
                                <em><?php $cat_arr=array();foreach ($terms as $term) { $cat_arr[] .= $term->name; }echo implode(', ',$cat_arr)?></em>
                            </span>
                            <span class="wi-view"><?php echo esc_attr(get_post_meta( get_the_ID(), 'revera_portfolio-button', true )); ?> <i class="fa fa-long-arrow-right"></i></span>
                        </a>
                    </div>
                </div>  

			<?php } ?>
                    
			<?php endwhile;  wp_reset_query(); ?>
 
            </div>

     </div>
 </div>
