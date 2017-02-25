<?php get_header(); ?>
	
    <?php 
	$bg_img = '';
	if(_option('e404_img')!=''){
		$bg_img = 'style="background-image:url(\''._option('e404_img').'\');"';
	} ?>
            
	<!-- 404 -->
	<div class="fourofour">
		<div class="header bg-img fixed" <?php echo themetor_sanitize($bg_img); ?>>
        
			<!-- Content -->
			<div class="header-container text-white">
				<p class="digits"><?php echo esc_html(_option('e404_title')); ?></p>
				<hr>
				<p class="h2 responsive-txt serif italic"><?php echo esc_html(_option('e404_text')); ?></p>
				<a href="javascript:history.back()"><i class="fa fa-long-arrow-left"></i></a>
				<a href="<?php echo home_url(); ?>"><i class="fa fa-home"></i></a>
			</div>


		</div>
	</div>

<?php get_footer(); ?>