<?php

//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// Scripts Enqueue
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function revera_scripts_enqueue() {  
	


	// Register Scripts ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
	wp_register_script('jquery.magnific-popup', get_template_directory_uri() . '/js/lib/jquery.magnific-popup.min.js','jquery','',true);
	wp_register_script('jquery.mixitup', get_template_directory_uri() . '/js/lib/jquery.mixitup.min.js','jquery','',true);
	wp_register_script('jquery.bxslider', get_template_directory_uri() . '/js/lib/jquery.bxslider.min.js','jquery','',true);
	wp_register_script('jquery.owl.carousel', get_template_directory_uri() . '/js/lib/owl.carousel.min.js','jquery','',true);
	wp_register_script('jquery.fitvids', get_template_directory_uri() . '/js/lib/jquery.fitvids.js','jquery','',true);
	wp_register_script('jquery.equal', get_template_directory_uri() . '/js/lib/jquery.equal.js','jquery','',true);
	wp_register_script('jquery.placeholder', get_template_directory_uri() . '/js/lib/jquery.placeholder.js','jquery','',true);
	wp_register_script('jquery.animate-enhanced', get_template_directory_uri() . '/js/lib/jquery.animate-enhanced.min.js','jquery','',true);
	wp_register_script('jquery.superslides', get_template_directory_uri() . '/js/lib/jquery.superslides.min.js','jquery','',true);
	wp_register_script('jquery.ytplayer', get_template_directory_uri() . '/js/lib/jquery.mb.ytplayer.js','jquery','',true);
	wp_register_script('jquery.index-video', get_template_directory_uri() . '/js/index-video.js','jquery','',true);
	wp_register_script('jquery.index-video-autoplay', get_template_directory_uri() . '/js/index-video-autoplay.js','jquery','',true);
	wp_register_script('revera-custom', get_template_directory_uri() . '/js/main.js','jquery','1.0',true);

	
	// Enqueue Scripts ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
	wp_enqueue_script('jquery',true);
	wp_enqueue_script('jquery.magnific-popup');
	wp_enqueue_script('jquery.mixitup');
	wp_enqueue_script('jquery.bxslider');
	wp_enqueue_script('jquery.owl.carousel');
	wp_enqueue_script('jquery.fitvids');
	wp_enqueue_script('jquery.equal');
	wp_enqueue_script('jquery.placeholder');
	//wp_enqueue_script('jquery.animate-enhanced');
	wp_enqueue_script('jquery.superslides');
	wp_enqueue_script('revera-custom');
	
	
	
	
    // Comment Reply Script
    if ( is_singular()){wp_enqueue_script('comment-reply');} 

	

}

add_action( 'wp_enqueue_scripts', 'revera_scripts_enqueue' );  





//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// Register Styles
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
	
function revera_styles_enqueue()  
{  


	// Register Styles :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
	
	wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/lib/font-awesome.min.css', array(), '1.0', 'all' );
	wp_register_style( 'bxslider', get_template_directory_uri() . '/css/lib/jquery.bxslider.css', array(), '1.0', 'all' );
	wp_register_style( 'owl.carousel', get_template_directory_uri() . '/css/lib/owl.carousel.css', array(), '1.0', 'all' );
	wp_register_style( 'base', get_template_directory_uri() . '/css/lib/base.css', array(), '1.0', 'all' );
	wp_register_style( 'custom-styles', get_template_directory_uri() . '/css/lib/custom-styles.css', array(), '1.0', 'all' );
	wp_register_style( 'responsive-css', get_template_directory_uri() . '/css/responsive.css', array(), '1.0', 'all' );

	
	// Enqueue Default CSSs
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'bxslider' );
	wp_enqueue_style( 'owl.carousel' );
	wp_enqueue_style( 'base' );
	wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), TG_THEME_VERSION, 'all' );
	
	
	/* Responsive */
	if (_option('responsive',1)==1){
		wp_enqueue_style( 'responsive-css' ); 
	}
	

}  


add_action( 'wp_enqueue_scripts', 'revera_styles_enqueue', 1 ); 


//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// Custom JS and Track Code
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function revera_cutoms_javascript() {

	
		if(_option('custom_js')){
	
			echo '<script type="text/javascript">';
			echo _option('custom_js');
			echo '</script>';
		}
		
		
		if(_option('track_code')){
			echo '<script type="text/javascript">';
			echo _option('track_code');
			echo '</script>';
		}
			
	}


add_action( 'wp_footer', 'revera_cutoms_javascript' ,100); 

?>