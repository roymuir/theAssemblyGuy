<?php

/*
 * Revera Theme Functions
 *
 * Author: ThemeTor.com
 * Website: http://themetor.com
 */


// PUBLIC DEFINES ================================================================================================
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());

define('LIBS_DIR', THEME_DIR. '/functions');
define('LIBS_URI', THEME_URI. '/functions');
define('LANG_DIR', THEME_DIR. '/lang');

define('TG_THEME_NAME', 'revera');
define('TG_THEME_VERSION', '1.6');
define('TG_THEME_EXTERNAL_FILES', 'http://demo.themetor.com/revera/files/t5g2h8o/');


// Loads Theme Textdomain (Localization) ==============================================================================
load_theme_textdomain( 'revera', LANG_DIR );


// Content Width ======================================================================================================
if ( ! isset( $content_width ) ) $content_width = 1140;

function revera_adjust_content_width() {
    global $content_width;
 
    if ( is_page_template( 'page-left-sidebar.php' ) || is_page_template( 'page-right-sidebar.php' ) || is_page_template( 'blog.php' )){
        $content_width = 720;
	}
}
add_action( 'template_redirect', 'revera_adjust_content_width' );




// Options Framework Theme ==========================================================================================
if ( !function_exists( 'optionsframework_init' ) ) {

	define('OPTIONS_FRAMEWORK_URL', THEME_DIR . '/admin/');
	define('OPTIONS_FRAMEWORK_DIRECTORY', THEME_URI  . '/admin/');
		
	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');

}



// Plugins Activation ===========================================================================================
require_once('functions/plugin-activation.php');
	
	add_action('tgmpa_register', 'revera_register_required_plugins');
	function revera_register_required_plugins() {
		$plugins = array(
			array(
				'name'     				=> 'Visual Composer',
				'slug'     				=> 'js_composer',
				'source'   				=> TG_THEME_EXTERNAL_FILES . 'plugins/js_composer.zip',
				'required' 				=> false,
				'version' 				=> '',
				'force_activation' 		=> false,
				'force_deactivation' 	=> false,
				'external_url' 			=> '', 
			),
			array(
            	'name'      => 'Contact Form 7',
            	'slug'      => 'contact-form-7',
            	'required'  => false,
            ),
		);

		$theme_text_domain = 'revera';

		$config = array(
			'domain'       		=> $theme_text_domain,
			'default_path' 		=> '',
			'parent_menu_slug' 	=> 'themes.php',
			'parent_url_slug' 	=> 'themes.php',
			'menu'         		=> 'install-required-plugins',
			'has_notices'      	=> true,
			'is_automatic'    	=> true,
			'message' 			=> '',
			'strings'      		=> array(
				'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
				'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
				'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ),
				'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
				'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
				'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ),
				'nag_type'									=> 'updated'
			)
		);
	
		tgmpa($plugins, $config);
		
	}


	
// Automatic Feed Links ===========================================================================================
if(function_exists('add_theme_support')) {
    add_theme_support('automatic-feed-links');
}


// WP Post Formats=================================================================================================
add_theme_support( 'post-formats', array('gallery', 'quote', 'video'));
	
	

// enqueue ========================================================================================================
require_once(LIBS_DIR.'/enqueue.php');


// Shortcodes =====================================================================================================
add_filter('widget_text', 'do_shortcode');
add_filter('wp_nav_menu', 'do_shortcode');

// Visual Composer
require_once ( LIBS_DIR.'/shortcodes.php' );
if ( function_exists( 'vc_map' ) ) {
	require_once(LIBS_DIR.'/vc/vc-custom.php');
}


// Customizer  ============================================================================================	
require_once(LIBS_DIR.'/customize.php');

// Custom Styles ===========================================================================================
include_once(LIBS_DIR.'/custom-styles.php');
 


// Custom Post Type =======================================================================================
require_once(LIBS_DIR.'/custom-posttype.php');


// Include Meta Box Script ================================================================================
define( 'RWMB_URL', trailingslashit( LIBS_URI . '/metabox' ) );
define( 'RWMB_DIR', trailingslashit( LIBS_DIR . '/metabox' ) );
require_once RWMB_DIR . '/meta-box.php';
require_once(LIBS_DIR.'/metabox.php');


// Post Thumbnails ========================================================================================
if ( function_exists( 'add_theme_support' ) ) {
	
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'img1600n', 1600, 9999, false );
	add_image_size( 'img1080n', 1080, 9999, false );
	add_image_size( 'img360q', 360, 360, true );
	add_image_size( 'img360n', 360, 9999, false );
	add_image_size( 'img720n', 720, 9999, false );

}
function themetor_remove_default_image_sizes( $sizes) {
    unset( $sizes['medium']);
    unset( $sizes['large']);
     
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'themetor_remove_default_image_sizes');



// Custom Navigation Menu =============================================================================
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'primary' => 'Main Menu'
		)
	);
	register_nav_menus(
		array(
		  'onepage' => 'One Page'
		)
	);
}	


// Sidebars =======================================================================================================

add_action( 'widgets_init', 'themetor_sidebar_widgets' );
function themetor_sidebar_widgets(){

register_sidebar(
	array(
		'name' => 'Blog Sidebar',
		'id' => 'sidebar-blog',
		'description'   => __( 'Widgets for the Blog sidebar.','revera' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',  
	    'after_widget' => '</div>',  
	    'before_title' => '<h3>',  
	    'after_title' => '</h3>'  
	)
);

// Set Footer Widget Dynamic by Option value
$fw_desc = array(1 => 'Add only 1 Widget',2 => 'Add 2 Widgets',3 => 'Add 3 Widgets',4 => 'Add 4 Widgets');
$fw_class = array(1 => 'twelve',2 => 'six',3 => 'four',4 => 'three');
$footer_columns = 4;
if ( function_exists( '_option' ) ) {$footer_columns = _option('footer_col',4);}


$fw_desc_full = 'Widgets for the Footer. (' . $fw_desc[$footer_columns] . ')';

register_sidebar(
	array(
		'name' => 'Footer Widgets',
		'id' => 'footer_widgets',
		'description'   =>  $fw_desc_full,
		'before_widget' => '<div id="%1$s" class="footer_widget %2$s ' . $fw_class[$footer_columns] . ' col">',  
	    'after_widget' => '</div>',  
	    'before_title' => '<h4 class="serif widget-title-white"><em>',  
	    'after_title' => '</em></h4>'
	));
	
register_sidebar(
	array(
		'name' => 'Search Page Sidebar',
		'id' => 'sidebar-search',
		'description'   => __( 'Widgets for the Search Page sidebar.','revera' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',  
	    'after_widget' => '</div>',  
	    'before_title' => '<h3>',  
	    'after_title' => '</h3>'   
	));

}

function thdglkr_emptysidebar($section)
{
	echo '<h3>No Sidebar</h3><p> This template supports the unlimited sidebar\'s widgets. <br />For adding widgets to <strong>'. $section .'</strong> sidebar <a href="'. home_url() .'/wp-admin/widgets.php">Click Here</a></p>';	
}



// Custom Excerpt Length  =================================================================================
function themetor_custom_excerpt_length( $length ) {
return _option('excerpt_blog',30);
}
add_filter( 'excerpt_length', 'themetor_custom_excerpt_length', 999 );


// Customize the Title =============================================================================================
if ( ! function_exists( 'themetor_filter_wp_title' ) ) {

	function themetor_filter_wp_title( $title, $separator ) {

		if ( is_feed() ) return $title;
			
		global $paged, $page;

		if ( is_search() ) {
		
			$title = sprintf( __( 'Search results for %s', 'revera' ), '"' . get_search_query() . '"' );

			if ( $paged >= 2 ) {
				$title .= " $separator " . sprintf( __( 'Page %s', 'revera' ), $paged );
			}

			$title .= " $separator " . get_bloginfo( 'name', 'display' );

			return $title;

		}

		$title .= get_bloginfo( 'name', 'display' );

		$site_description = get_bloginfo( 'description', 'display' );

		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $separator " . $site_description;
		}

		if ( $paged >= 2 || $page >= 2 ) {
			$title .= " $separator " . sprintf( __( 'Page %s', 'revera' ), max( $paged, $page ) );
		}

		return $title;

	}

}

add_filter( 'wp_title', 'themetor_filter_wp_title', 10, 2 );


// Pagination  ===========================================================================================	
function pagination($pages = '', $range = 4)
{  

	 $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='grid-mb'><div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'><i class='fa fa-angle-double-left'></i></a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'><i class='fa fa-angle-left'></i></a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'><i class='fa fa-angle-right'></i></a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'><i class='fa fa-angle-double-right'></i></a>";
         echo "</div></div>\n";
     }
}
function themetor_sanitize($str){return $str;}

// MAINTENANCE MODE =====================================================================================	
if (!function_exists('themetor_maintenance_mode')) {
	
	function themetor_maintenance_mode() {

		$custom_logo = $custom_logo_output = $maintenance_mode = "";
		
		$custom_logo = _option('logo');
		$custom_logo_output = '<img src="'. $custom_logo .'" alt="maintenance" style="margin: 0 auto; display: block;" />';


		$main_page = _option('main_page','default');

		if ($main_page == 'default') {
			
			if ( !current_user_can( 'edit_themes' ) || !is_user_logged_in() ) {
				wp_die($custom_logo_output . do_shortcode(_option('main_html','<p style="text-align:center">'.__('We are currently in maintenance mode, please check back shortly.', 'revera').'</p>')));
			}

		} else {
			
			$holding_page = _option('main_page');
			$current_page_URL = themetor_current_page_url();
			$holding_page_URL = get_permalink($holding_page);
			
			if ($current_page_URL != $holding_page_URL) {
				if ( !current_user_can( 'edit_themes' ) || !is_user_logged_in() ) {
				wp_redirect( $holding_page_URL );
				exit;
				}
			}
			
		}
	}
	
	if (_option('main_mode',0)==1){
		add_action('get_header', 'themetor_maintenance_mode');
	}
	
}


// GET CURRENT PAGE URL 
function themetor_current_page_url() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

?>