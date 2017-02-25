<?php 
get_header(); 
?>

    <!-- Search -->
    <div id="more" class="section-search">
        <div class="row">
            	
			<?php if (_option('blog_sidebar','right')=='left'): ?>
        	<!-- Sidebar -->
        	<div class="four col">
            	<div class="sidebar">
					<?php 
                    
                        if ( ! dynamic_sidebar ( 'sidebar-search' ) ){
                            thdglkr_emptysidebar('Search');
                        }        				
                    ?>	
				</div>
            </div>
			<?php endif; ?>
                
                
			<!-- Post area -->
			<div class="eight col">

				<?php
        
                // begin the loop
                if ( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'functions/post-format/content', get_post_format() );
				endwhile; ?>
                    
                
                <!-- PAGINATION -->
                <?php pagination($pages = '', $range = 4); ?>
                <p class="hide"><?php posts_nav_link(); ?></p>
                <!-- END PAGINATION -->

				<?php else : ?>
            
                    <h3><?php _e('Not Found', 'revera') ?></h3>
            
                <?php endif; wp_reset_query(); ?>

			</div>
				
                
                
			<?php if (_option('blog_sidebar','right')=='right'): ?>
        	<!-- Sidebar -->
        	<div class="four col">
            	<div class="sidebar">
					<?php 
						if ( ! dynamic_sidebar ( 'sidebar-search' ) ){
							thdglkr_emptysidebar('Search');
						}        				
                    ?>	
				</div>
            </div>
			<?php endif; ?>
            
 
        </div><!-- row -->
    </div><!-- end page content #more -->
        
        
  <?php get_footer(); ?>