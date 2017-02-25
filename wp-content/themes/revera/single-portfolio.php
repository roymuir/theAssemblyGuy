<?php get_header(); ?>

<div id="more" class="section-blog">
    <div class="row">
            
	<?php 
    $portfolio_sidebar = _option('portfolio_sidebar'); 
    
	if (have_posts()) : while (have_posts()) : the_post();
	
		if ($portfolio_sidebar=='nosidebar'){
			?>
			<div class="twelve col mb30">
				<?php get_template_part('functions/portfolio-media');?>
			</div>
            <div class="twelve col mb30">
				<?php the_content(); ?>
			</div>
            <div class="twelve col">
				<ul class="circle">
					<?php if( get_post_meta( get_the_ID(), 'revera_portfolio-client', true ) != "") { ?>
                    <li><i class="fa fa-user"></i> <?php echo esc_html(get_post_meta( get_the_ID(), 'revera_portfolio-client', true )); ?></li>
                    <?php } ?>
                    <?php if( get_post_meta( get_the_ID(), 'revera_portfolio-year', true ) != "") { ?>
                    <li><i class="fa fa-clock-o"></i> <?php echo esc_html(get_post_meta( get_the_ID(), 'revera_portfolio-year', true )); ?></li>
                    <?php } ?>
                    <li><i class="fa fa-tags"></i> <?php echo themetor_sanitize(get_the_term_list($post->ID, 'portfolio_types', '', ', ', '')); ?></li>
                    <?php if( get_post_meta( get_the_ID(), 'revera_portfolio-url', true ) != "") { ?>
                    <li><i class="fa fa-globe"></i> <a href="<?php echo esc_url(get_post_meta( get_the_ID(), 'revera_portfolio-url', true )); ?>" target="_blank"><?php echo esc_url(get_post_meta( get_the_ID(), 'revera_portfolio-url', true )); ?></a></li>
                    <?php } ?>
                </ul>
			</div>
			<?php
		} elseif($portfolio_sidebar=='left') {
			?>
			<div class="four col center-small">
				<?php get_template_part('functions/portfolio-details');?>
			</div>
			<div class="eight col">
				<?php get_template_part('functions/portfolio-media');?>
			</div>
			<?php
		}else{
			?>
			<div class="eight col">
				<?php get_template_part('functions/portfolio-media');?>
			</div>
			<div class="four col center-small">
				<?php get_template_part('functions/portfolio-details');?>
			</div>
			<?php
		}
	endwhile; endif; wp_reset_query(); 
    ?>
    </div><!-- row -->
</div><!-- end page content #more -->

<?php
if(_option('related_portfolio') == 1) {
  get_template_part( 'functions/related-portfolio' );
}


if (_option('portfolio_nav')==1){ ?>
    <!-- Project navigation -->
    <div class="project-nav">
        <div class="row">
            <div class="twelve col">
                <?php previous_post_link('%link','<span class="project-prev" ><i class="fa fa-long-arrow-left"></i></span>'); ?>
                <a class="project-back" href="<?php echo esc_url(home_url()); ?>/<?php echo esc_attr(_option( 'portfolio_item_slug', 'portfolio' )); ?>/"><i class="fa fa-th"></i></a>            
                <?php next_post_link('%link','<span class="project-next" ><i class="fa fa-long-arrow-right"></i></span>'); ?> 
            </div>
        </div>
    </div>   
<?php } 



get_footer(); ?>