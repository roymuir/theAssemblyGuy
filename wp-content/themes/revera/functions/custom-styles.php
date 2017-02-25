<?php
function revera_custom_styles() {
?>

<!-- Custom CSS Codes
========================================================= -->
	
<style type="text/css" media="all">


	<?php

	$font_text = _option('font_text');
	$font_menu = _option('font_menu');
	$font_h1 = _option('font_h1');
	$font_h2 = _option('font_h2');
	$font_h3 = _option('font_h3');
	$font_h4 = _option('font_h4');
	$font_h5 = _option('font_h5');
	$font_h6 = _option('font_h6');
	?>
	
	body{ font-family: <?php echo str_replace('+', ' ', $font_text['face']); ?>, Helvetica, Arial, sans-serif;
		  font-size: <?php echo esc_attr($font_text['size']); ?>;
		  font-weight: <?php echo esc_attr($font_text['style']); ?>;
		  color: <?php echo themetor_sanitize($font_text['color']); ?>;
	}
	
	<?php 
		
	// SET COLORS  
	$theme_color = get_option('theme_color','#FF6347');
	$links_color = get_option('links_color','#AAAAAA');
	$hover_color = get_option('hover_color','#222222');
	$icon_color = get_option('icon_color','#CCCCCC');
	
	$menu_bg_color = get_option('menu_bg_color','#222222');
	$menu_border_color = get_option('menu_border_color','#444444');
	$menu_text_color = get_option('menu_text_color','#777777');
	$menu_hover_text_color = get_option('menu_hover_text_color','#FFFFFF');
	$menu_icon_color = get_option('menu_icon_color','#777777');
	$menu_ind_color_light = get_option('menu_ind_color_light','#FFFFFF');
	$menu_ind_color_dark = get_option('menu_ind_color_dark','#222222');
	
	// Footer Colors
	$footer_bg_color = get_option('footer_bg_color','#222222');
	$footer_text_color = get_option('footer_text_color','#FFFFFF');
	$footer_title_color = get_option('footer_title_color','#FFFFFF');
	$footer_links_color = get_option('footer_links_color','#888888');
	$footer_hover_color = get_option('footer_hover_color','#FFFFFF');
	$copyright_text_color = get_option('copyright_text_color','#888888');
	$footer_bottom_bg_color = get_option('footer_bottom_bg_color','#222222');
	$footer_bottom_border_color = get_option('footer_bottom_border_color','#444444');
	$footer_icon_color = get_option('footer_icon_color','#888888');
		
	?>

	::selection{
		background:<?php echo themetor_color_sanitize($theme_color); ?> !important;
		color:#fff;
	}
	::-moz-selection{
		background:<?php echo themetor_color_sanitize($theme_color); ?> !important;
		color:#fff;
	}
	h1,.title h1{ font-family: <?php echo str_replace('+', ' ', $font_h1['face']); ?>, Arial, Helvetica, sans-serif; font-size: <?php echo esc_attr($font_h1['size']); ?>; font-weight: <?php echo esc_attr($font_h1['style']); ?>; color: <?php echo themetor_color_sanitize($font_h1['color']); ?>; }        
	h2,.title h2{ font-family: <?php echo str_replace('+', ' ', $font_h2['face']); ?>, Arial, Helvetica, sans-serif; font-size: <?php echo esc_attr($font_h2['size']); ?>; font-weight: <?php echo esc_attr($font_h2['style']); ?>; color: <?php echo themetor_color_sanitize($font_h2['color']); ?>; }
	h3,.title h3{ font-family: <?php echo str_replace('+', ' ', $font_h3['face']); ?>, Arial, Helvetica, sans-serif; font-size: <?php echo esc_attr($font_h3['size']); ?>; font-weight: <?php echo esc_attr($font_h3['style']); ?>; color: <?php echo themetor_color_sanitize($font_h3['color']); ?>; }
	h4,.title h4{ font-family: <?php echo str_replace('+', ' ', $font_h4['face']); ?>, Arial, Helvetica, sans-serif; font-size: <?php echo esc_attr($font_h4['size']); ?>; font-weight: <?php echo esc_attr($font_h4['style']); ?>; color: <?php echo themetor_color_sanitize($font_h4['color']); ?>; }
	h5{ font-family: <?php echo str_replace('+', ' ', $font_h5['face']); ?>, Arial, Helvetica, sans-serif; font-size: <?php echo esc_attr($font_h5['size']); ?>; font-weight: <?php echo esc_attr($font_h5['style']); ?>; color: <?php echo themetor_color_sanitize($font_h5['color']); ?>; }
	h6{ font-family: <?php echo str_replace('+', ' ', $font_h6['face']); ?>, Arial, Helvetica, sans-serif; font-size: <?php echo esc_attr($font_h6['size']); ?>; font-weight: <?php echo esc_attr($font_h6['style']); ?>; color: <?php echo themetor_color_sanitize($font_h6['color']); ?>; }

	h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1 a:visited, h2 a:visited, h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited  { font-weight: inherit; color: inherit; }

	a{ color: <?php echo themetor_color_sanitize($links_color); ?>; }
	a:hover, a:focus{ color: <?php echo themetor_color_sanitize($hover_color); ?>; }


	.text-color,.text-color h1,.text-color h2,.text-color h3,.text-color h4,.text-color h5,.text-color h6,.text-color p,
	.btn.outline.color,.no-touch .icon-list:hover i,
	.no-touch ul.points li:hover:before,
	.no-touch .menu-wrap .logo a:hover,
	.no-touch .menu-wrap.menu-white .logo a:hover,
	.no-touch .mh-logo h1 a:hover,
	.no-touch .menu-white .mh-logo h1 a:hover,
	.no-touch .service-item:hover > i,
	.no-touch .c-links a:hover,
	.no-touch .post-title a:hover,
	.no-touch .aa-details h3 a:hover,
	.no-touch #footer .c-links a:hover{
		color: <?php echo themetor_color_sanitize($theme_color); ?>;
	}

	.bg-color, .btn.color,.no-touch .row-icons i:hover,.no-touch ul.circle li:hover i,.no-touch .tags a:hover,
	.no-touch .tagcloud a:hover,.no-touch .pagination a:hover{background:<?php echo themetor_color_sanitize($theme_color); ?>;}

	.btn.outline.color,.no-touch .row-icons i:hover,.no-touch ul.circle li:hover i,.no-touch .pagination a:hover {
		border-color: <?php echo themetor_color_sanitize($theme_color); ?>;
	}
	
	.no-touch .icon-list i,
	.no-touch .service-item i{
		color: <?php echo themetor_color_sanitize($icon_color); ?>;
	}
	
	.menu-wrap,.menu-horizontal{background:<?php echo themetor_color_sanitize($menu_bg_color); ?>;}
	.menu-items a{font-size: <?php echo themetor_color_sanitize($font_menu['size']); ?>;font-family: <?php echo str_replace('+', ' ', $font_menu['face']); ?>, Arial, Helvetica, sans-serif;font-weight: <?php echo esc_attr($font_menu['style']); ?>;}
	.menu-items a,.menu-close,.menu ul li a{color: <?php echo themetor_color_sanitize($menu_text_color); ?>;}
	.no-touch .menu-items a:hover,.no-touch .menu-close:hover,
	.no-touch .menu-icons i:hover,.menu-search input:focus,.no-touch .menu ul li:hover a{color: <?php echo themetor_color_sanitize($menu_hover_text_color); ?>;}
	.menu-search input:focus,.no-touch .menu-icons i:hover{border-color: <?php echo themetor_color_sanitize($menu_hover_text_color); ?>;}
	.menu-icons i{color: <?php echo themetor_color_sanitize($menu_icon_color); ?>;border-color: <?php echo themetor_color_sanitize($menu_bg_color); ?>;}
	.menu-icons,.menu-search,.menu-search input,.menu-horizontal{border-color: <?php echo themetor_color_sanitize($menu_border_color); ?>;}
	#toggle-left,#toggle-right{color: <?php echo themetor_color_sanitize($menu_ind_color_dark); ?>;border-color: <?php echo themetor_color_sanitize($menu_ind_color_dark); ?>;}
	#toggle-left.toggle-light,#toggle-right.toggle-light{color: <?php echo themetor_color_sanitize($menu_ind_color_light); ?>;border-color: <?php echo themetor_color_sanitize($menu_ind_color_light); ?>;}

	#footer{background:<?php echo themetor_color_sanitize($footer_bg_color); ?>;color: <?php echo themetor_color_sanitize($footer_text_color); ?>}
	#footer a,a.backtotop{color: <?php echo themetor_color_sanitize($footer_links_color); ?>}
	a.backtotop{border-color: <?php echo themetor_color_sanitize($footer_links_color); ?>}
	#footer p.serif{color: <?php echo themetor_color_sanitize($footer_title_color); ?>}
	.no-touch #footer a:hover,.no-touch a.backtotop:hover{color: <?php echo themetor_color_sanitize($footer_hover_color); ?>}
	.no-touch a.backtotop:hover{border-color: <?php echo themetor_color_sanitize($footer_hover_color); ?>}
	.credits{background:<?php echo themetor_color_sanitize($footer_bottom_bg_color); ?>;border-color:<?php echo themetor_color_sanitize($footer_bottom_border_color); ?>}
	.c-icons i{color: <?php echo themetor_color_sanitize($footer_icon_color); ?>;border-color: <?php echo themetor_color_sanitize($footer_icon_color); ?>}
	.credits p{color: <?php echo themetor_color_sanitize($copyright_text_color); ?>}
	
	</style>

	<?php if(_option('custom_css')){ echo '<style>' . _option('custom_css') . '</style>';} ?>

<?php }
add_action( 'wp_head', 'revera_custom_styles', 100 );

function themetor_color_sanitize($hex) {
   $hex = str_replace(" ", "", $hex);
   return $hex;
}
?>