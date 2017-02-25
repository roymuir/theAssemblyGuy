<?php
/*
 * Theme Customize
 *
 * Theme: Revera
 * Author: Tohid Golkar
 * Website: http://tohidgolkar.com
 */
 
if (!function_exists('color_customize_register')) {
	function color_customize_register($wp_customize){
		
		
		// Main Colors ------------------------------------------------
		$colors = array();
		$colors[] = array( 'slug'=>'theme_color', 'default' => '#ff6347', 'label' => __( 'Theme Color', 'revera' ) );
		$colors[] = array( 'slug'=>'links_color', 'default' => '#AAAAAA', 'label' => __( 'Links Color', 'revera' ) );
		$colors[] = array( 'slug'=>'hover_color', 'default' => '#222222', 'label' => __( 'Links Hover Color', 'revera' ) );
		$colors[] = array( 'slug'=>'icon_color', 'default' => '#CCCCCC', 'label' => __( 'Icons Color', 'revera' ) );

		   // SECTION //
		   $wp_customize->add_section('revera_color', array(
			'title' => __('Main Colors', 'revera'),
			'description' => __('Select the colors of each part of page that you want.', 'revera'),
			'priority' => 30
		   ));
		
	
		  foreach($colors as $color)
		  {
			// SETTINGS //
			$wp_customize->add_setting(
				$color['slug'],
				array( 'default' => $color['default'],
					   'type'		   => 'option',
					   'transport'      => 'postMessage',
						'capability'    => 'edit_theme_options',
						'sanitize_callback' => 'maybe_hash_hex_color'
					  )
				);
		
			// CONTROLS //
			$wp_customize->add_control(
				new WP_Customize_Color_Control( $wp_customize, $color['slug'],
				array('label' => $color['label'],
					  'section' => 'revera_color',
					  'settings' => $color['slug']
					  )
				));
		  }
		  
		
		// Header Colors ------------------------------------------------
		$colors = array();
		$colors[] = array( 'slug'=>'menu_bg_color', 'default' => '#222222', 'label' => __( 'Menu Background Color', 'revera' ) );
		$colors[] = array( 'slug'=>'menu_border_color', 'default' => '#444444', 'label' => __( 'Menu Border Color', 'revera' ) );
		$colors[] = array( 'slug'=>'menu_text_color', 'default' => '#777777', 'label' => __( 'Menu Text Color', 'revera' ) );
		$colors[] = array( 'slug'=>'menu_hover_text_color', 'default' => '#FFFFFF', 'label' => __( 'Menu Hover Text Color', 'revera' ) );
		$colors[] = array( 'slug'=>'menu_icon_color', 'default' => '#777777', 'label' => __( 'Menu Inside Icons Color', 'revera' ) );
		$colors[] = array( 'slug'=>'menu_ind_color_light', 'default' => '#FFFFFF', 'label' => __( 'Menu Indicator Icons Color (Light)', 'revera' ) );
		$colors[] = array( 'slug'=>'menu_ind_color_dark', 'default' => '#222222', 'label' => __( 'Menu Indicator Icons Color (Dark)', 'revera' ) );

  
		   // SECTION //
		   $wp_customize->add_section('revera_h_color', array(
			'title' => __('Menu Colors', 'revera'),
			'description' => __('Select the colors of Menu', 'revera'),
			'priority' => 35
		   ));
		
	
		  foreach($colors as $color)
		  {
			// SETTINGS //
			$wp_customize->add_setting(
				$color['slug'],
				array( 'default' => $color['default'],
					   'type'		   => 'option',
					   'transport'      => 'postMessage',
						'capability'    => 'edit_theme_options',
						'sanitize_callback' => 'maybe_hash_hex_color'
					  )
				);
		
			// CONTROLS //
			$wp_customize->add_control(
				new WP_Customize_Color_Control( $wp_customize, $color['slug'],
				array('label' => $color['label'],
					  'section' => 'revera_h_color',
					  'settings' => $color['slug']
					  )
				));
		  }
		  
		// Footer Colors ----------------------------------------------
		$f_colors = array();
		$f_colors[] = array( 'slug'=>'footer_bg_color', 'default' => '#222222', 'label' => __( 'Footer Background Color', 'revera' ) );
		$f_colors[] = array( 'slug'=>'footer_title_color', 'default' => '#FFFFFF', 'label' => __( 'Footer Title Color', 'revera' ) );
		$f_colors[] = array( 'slug'=>'footer_text_color', 'default' => '#FFFFFF', 'label' => __( 'Footer Text Color', 'revera' ) );
		$f_colors[] = array( 'slug'=>'footer_links_color', 'default' => '#888888', 'label' => __( 'Footer Links Color', 'revera' ) );
		$f_colors[] = array( 'slug'=>'footer_hover_color', 'default' => '#FFFFFF', 'label' => __( 'Footer Links Hover Color', 'revera' ) );
		$f_colors[] = array( 'slug'=>'copyright_text_color', 'default' => '#888888', 'label' => __( 'Footer Copyright Text Color', 'revera' ) );
		$f_colors[] = array( 'slug'=>'footer_bottom_bg_color', 'default' => '#222222', 'label' => __( 'Footer Bottom Background Color', 'revera' ) );
		$f_colors[] = array( 'slug'=>'footer_bottom_border_color', 'default' => '#444444', 'label' => __( 'Footer Bottom Top Border Color', 'revera' ) );
		$colors[] = array( 'slug'=>'footer_icon_color', 'default' => '#888888', 'label' => __( 'Footer Icons Color', 'revera' ) );

		   // SECTION //
		   $wp_customize->add_section('revera_f_color', array(
			'title' => __('Footer Colors', 'revera'),
			'description' => __('Select the colors of each part of Footer you want.', 'revera'),
			'priority' => 40
		   ));
		
	
		  foreach($f_colors as $f_color)
		  {
			// SETTINGS //
			$wp_customize->add_setting(
				$f_color['slug'],
				array( 'default' => $f_color['default'],
					   'type'		   => 'option',
					   'transport'      => 'postMessage',
						'capability'    => 'edit_theme_options',
						'sanitize_callback' => 'maybe_hash_hex_color'
					  )
				);
		
			// CONTROLS //
			$wp_customize->add_control(
				new WP_Customize_Color_Control( $wp_customize, $f_color['slug'],
				array('label' => $f_color['label'],
					  'section' => 'revera_f_color',
					  'settings' => $f_color['slug']
					  )
				));
		  }
		  
  
	}
	
	
	add_action( 'customize_register', 'color_customize_register' );
 
}


	function thdglkr_customizer_live_preview() {
		wp_enqueue_script( 'thdglkr-customizer',	get_template_directory_uri().'/js/live-customizer.js', array( 'jquery','customize-preview' ), NULL, true);
	}
	add_action( 'customize_preview_init', 'thdglkr_customizer_live_preview' );


?>