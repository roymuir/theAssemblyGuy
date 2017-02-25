<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--[if IE 7]><html <?php language_attributes(); ?> class="ie7"><![endif]-->
<!--[if IE 8]><html <?php language_attributes(); ?> class="ie8"><![endif]-->
<!--[if IE 9]><html <?php language_attributes(); ?> class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><html <?php language_attributes(); ?>><![endif]-->
<!--[if !IE]><html <?php language_attributes(); ?>><![endif]-->
<head>


	<!-- Basic Page Needs -->
	<meta charset="<?php bloginfo('charset'); ?>">
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/lib/modernizr.js"></script>
	<title><?php wp_title(' | ', true, 'right'); ?></title>
    
	<?php if (!defined('WPSEO_VERSION')){ ?>
    <?php $pg_desc = get_post_meta( get_the_ID(), 'revera_pg_desc', true );?>
	<?php if(is_front_page() && _option('meta_description')): ?>
    <meta name="description" content="<?php echo esc_attr(_option('meta_description'));?>" /> 
    <?php elseif ($pg_desc): ?>
    <meta name="description" content="<?php echo esc_attr($pg_desc); ?>" /> 
	<?php endif; ?>
    
    
    <?php $pg_key = get_post_meta( get_the_ID(), 'revera_pg_key', true );?>
	<?php if(is_front_page() && _option('meta_keywords')): ?>
    <meta name="keywords" content="<?php echo _option('meta_keywords'); ?>" /> 
    <?php elseif ($pg_key): ?>
    <meta name="keywords" content="<?php echo esc_attr($pg_key); ?>" /> 
	<?php endif; ?>
	
    <?php 
	$seo = _option('meta_robots',array('index'=>1,'follow'=>1));	
	if( $seo['follow'] ) { $seo['follow'] = 'follow'; } else { $seo['follow'] = 'nofollow'; }
	if( $seo['index'] ) { $seo['index'] = 'index'; } else { $seo['index'] = 'noindex'; }
	echo '<meta name="robots" content="'.$seo['index'].', '.$seo['follow'].'" />'."\n";
    
	}?>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    
    <?php if(_option('zoom')!=1): ?>
	<!-- Mobile Specific Metas  -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <?php endif; ?>
    
    
    
	<!-- Favicons  -->
    <?php if(_option('favicon')): ?>
	<link href="<?php echo _option('favicon'); ?>" rel="shortcut icon" /> 
	<?php endif; ?>
    
    <?php if(_option('touch-icon57')): ?>
	<link rel="apple-touch-icon" href="<?php echo _option('touch-icon57'); ?>" /> 
	<?php endif; ?>
    
    <?php if(_option('touch-icon114')): ?>
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo _option('touch-icon114'); ?>" /> 
	<?php endif; ?>
    
    <?php if(_option('touch-icon72')): ?>
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo _option('touch-icon72'); ?>" /> 
	<?php endif; ?>
    
    <?php if(_option('touch-icon144')): ?>
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo _option('touch-icon144'); ?>" /> 
	<?php endif; ?>
    

    <?php get_template_part( 'functions/googlefonts'); ?>
   
    <?php wp_head(); ?>
    
</head>


<body <?php  body_class('body-push'); ?>>


	<!-- Top of the page -->
	<div id="top"></div>

	
	<?php 
		$menu_style = rwmb_meta('revera_menu');
		if($menu_style==''){$menu_style='v1';};
		if(is_singular('post')){$menu_style=_option('blog_single_menu','v1');}
		if(is_singular('portfolio')){$menu_style=_option('portfolio_single_menu','v1');}
		get_template_part('functions/menu',$menu_style); 
	?>
    
    <?php get_template_part('functions/header'); ?>