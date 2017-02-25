<?php get_header(); ?>


		<div class="page-content">
        	<div class="row clearfix">
			<?php if ( have_posts() ) : the_post(); ?>

            <?php the_content(); ?>
            <?php 
                
                wp_link_pages(array(
					'before' => '<div class="pagination mbs">'. __('Pages: ','revera') ,
					'after' => '</div>' ,
					'next_or_number' => 'number',
					'link_before'      => '',
					'link_after'       => '',
					'echo'             => 1
				)); 
            ?>
                
            <?php endif; wp_reset_query(); ?>
			</div>
		</div><!-- end page-content -->

<?php get_footer(); ?>