<h3><?php the_title();?></h3>
<hr class="small">
<?php the_content(); ?>
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