<?php get_header(); ?>

	<?php 
	
	if (is_home()){
		global $thdglkr_is_blog;
		$thdglkr_is_blog = true;
		get_template_part('blog');
	} else {
		get_template_part('search');
	}
	
	?>

<?php get_footer(); ?>
    
  