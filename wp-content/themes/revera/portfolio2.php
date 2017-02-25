<?php
// Template Name: Portfolio (2 Columns)
get_header();
?>
<div class="page-content">
	<div id="more" class="section-blog">
        <div class="row">
   
	<?php 
		$sc = rwmb_meta('revera_content');
		if ($sc=='top'){ get_template_part('functions/portfolio-content');}
	?>
	
	
	<?php
	
	global $thdglkr_pc_col,$thdglkr_pc_items,$thdglkr_pc_cat,$thdglkr_pc_filter,$thdglkr_pc_orderby,$thdglkr_pc_order;
	
	$thdglkr_pc_col='2';
	$thdglkr_pc_items= _option('number_of_portfolio_item',12); // Get Items per Page Value
	$thdglkr_pc_cat=get_post_meta(get_the_ID(), 'revera_portfoliocat', false);
	$thdglkr_pc_filter=_option('filtering','1');
	$thdglkr_pc_orderby= _option('orderby_portfolio','date');
	$thdglkr_pc_order=_option('order_portfolio','DESC');
	
	get_template_part('functions/portfolio');
	
	pagination($pages = '', $range = 4); wp_reset_query();
	
	?>
      
 	<?php if ($sc=='bottom'){ get_template_part('functions/portfolio-content');} ?>

		</div>
	</div>
</div><!-- end page-content -->

<?php get_footer(); ?>