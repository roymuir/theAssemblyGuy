<?php 
get_header(); 
?>

    <div id="more" class="section-blog">
        <div class="row">
            	
			<?php if (_option('blog_sidebar','right')=='left'): ?>
        	<!-- Sidebar -->
        	<div class="four col">
            	<div class="sidebar">
					<?php 
                    
                        if ( ! dynamic_sidebar ( 'sidebar-blog' ) ){
                            thdglkr_emptysidebar('Blog');
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
					get_template_part( 'functions/post-format/single', get_post_format() );
				endwhile; ?>
                
				<?php else : ?>
            
                    <h3><?php _e('Not Found', 'revera') ?></h3>
            
                <?php endif; wp_reset_query(); ?>
				
                <?php 
				wp_link_pages(array(
					'before' => '<div class="pagination pages mbf mtf">'. __('Pages: ','revera'),
					'after' => '</div>' ,
					'next_or_number' => 'number',
					'link_before'	=> '<span>',
					'link_after'	=> '</span>',
				)); 
			?>
            
            
            <?php if(_option('author_info') == 1): ?>
                <div class="about-author grid-mb">
                    <div class="aa-avatar">
                        <?php echo themetor_sanitize(get_avatar( get_the_author_meta('user_email'), '80', '' )); ?>
                    </div>
                    <div class="aa-details">
                        <h3><?php the_author_link(); ?></h3>
                        <hr class="small">
                        <p><?php the_author_meta("description"); ?></p>
                    </div>
                </div>
            <?php endif; ?>
                    

            <?php if (_option('blog_comment')==1):?>
                <div class="comments"><?php comments_template(); ?></div>
            <?php endif; ?>
            
            
			</div>
				
                
                
			<?php if (_option('blog_sidebar','right')=='right'): ?>
        	<!-- Sidebar -->
        	<div class="four col">
            	<div class="sidebar">
					<?php 
						if ( ! dynamic_sidebar ( 'sidebar-blog' ) ){
							thdglkr_emptysidebar('Blog');
						}        				
                    ?>	
				</div>
            </div>
			<?php endif; ?>
            

        </div><!-- row -->
    </div><!-- end page content #more -->
        
        
  <?php get_footer(); ?>