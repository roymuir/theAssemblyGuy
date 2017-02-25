<?php
/*
 * Portfolio Items
 *
 * Theme: Revera
 * Author: ThemeTor
 * Website: http://themetor.com
 */
 
	$mixitup_id = 'mix_' . rand();
	global $thdglkr_pc_col,$thdglkr_pc_items,$thdglkr_pc_cat,$thdglkr_pc_filter,$thdglkr_pc_orderby,$thdglkr_pc_order;
	global $paged;
	if(empty($paged)) $paged = 1;
	
	$portfolio_args = array( 
		'post_type' => 'portfolio',
		'posts_per_page' => $thdglkr_pc_items,
		'paged' => $paged,
		'order' => $thdglkr_pc_order,
		'orderby' => $thdglkr_pc_orderby
	);
	

	if($thdglkr_pc_cat){
		
		if (!is_array($thdglkr_pc_cat)){
			$thdglkr_pc_cats = explode(',' , $thdglkr_pc_cat);
			
			$portfolio_args['tax_query'][] = array(
					'taxonomy' 	=> 'portfolio_types',
					'field' 	=> 'slug',
					'terms' 	=> $thdglkr_pc_cats
			);	
			
		}else{
			if($thdglkr_pc_cat && $thdglkr_pc_cat[0] == 0) {
					unset($thdglkr_pc_cat[0]);
			}
			if($thdglkr_pc_cat) {
				$portfolio_args['tax_query'][] = array(
						'taxonomy' 	=> 'portfolio_types',
						'field' 	=> 'ID',
						'terms' 	=> $thdglkr_pc_cat
				);	
			}
		}
		
		
	}
	global $wp_query;
	$wp_query = null;
	$wp_query = new WP_Query();
	$wp_query->query( $portfolio_args );
	
	
	if ($thdglkr_pc_filter=='true' || $thdglkr_pc_filter=='1'){
		get_template_part('functions/portfolio-filtering');
		}
	
	
	if( $wp_query->have_posts() ) : ?>
    	
        <div id="<?php echo esc_attr($mixitup_id);?>" class="mix-container row">
        
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
			
			$portfolio_to=get_post_meta( get_the_ID(), 'revera_portfolio-to', true );
			$terms = get_the_terms( get_the_ID(), 'portfolio_types' );             	
			
			$grid_class='four';
			$tt_image_size='img360q';
			if($thdglkr_pc_col=='4'){$grid_class='three';}elseif($thdglkr_pc_col=='2'){$grid_class='six';$tt_image_size='img720n';}
			
			
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
				
				<div class="<?php echo esc_attr($grid_class);?> col medium-six col grid-mb mix<?php if($terms) : foreach ($terms as $term) { echo ' ' . esc_attr($term->slug); } endif; ?>">
                    <div class="work-item">
                        <?php echo themetor_sanitize($ahref); ?>
                            <?php the_post_thumbnail($tt_image_size,array('class'=>'responsive-img'));?>
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

		<?php endwhile; ?>
		
		</div>

 	<?php endif; ?>
	
    <script>
		// Mixitup Code 
		jQuery(document).ready(function($) {
			try {
				$("#<?php echo esc_attr($mixitup_id);?>").mixItUp();
				
				//Hide empty categories
				$('.project-filters span').hide();   
				$('.project-filters span:last-child').show();
				$('.mix-container div.col').each(function(){
					var dt = $(this).attr('class');
					$.each(dt.split(" "), function(i, j) {
						$('.project-filters span').each(function(){
							$('*[data-filter=".'+j+'"]').show();	
						});
					});
				
				});
	 
			} catch(e){}
		});	
	</script>