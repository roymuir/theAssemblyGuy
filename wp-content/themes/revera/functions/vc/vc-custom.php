<?php 
//-------------------------------------
// Custom Visucal Composer Shortcodes
// Theme: Revera
// Version: 1.0
// Author: ThemeTor (Tohid Golkar)
// Author URL: http://themetor.com
//-------------------------------------




//-------------------------------------- 
// Custom Revera Elements
//--------------------------------------
add_action( 'init', 'revera_vc_tt_wrap_shortcode' );
add_action( 'init', 'revera_vc_tt_title_shortcode' );
add_action( 'init', 'revera_vc_tt_button_shortcode' );
add_action( 'init', 'revera_vc_tt_divider_shortcode' );
add_action( 'init', 'revera_vc_tt_service_shortcode' );
add_action( 'init', 'revera_vc_tt_process_shortcode' );
add_action( 'init', 'revera_vc_tt_portfolio_shortcode' );
add_action( 'init', 'revera_vc_tt_slider_shortcode' );
add_action( 'init', 'revera_vc_tt_members_shortcode' );
add_action( 'init', 'revera_vc_tt_testimonial_shortcode' );
add_action( 'init', 'revera_vc_tt_pricingtable_shortcode' );

/*


add_action( 'init', 'revera_vc_tt_anchor_shortcode' );
add_action( 'init', 'revera_vc_tt_message_shortcode' );
add_action( 'init', 'revera_vc_tt_actionbox_shortcode' );
add_action( 'init', 'revera_vc_tt_social_shortcode' );
add_action( 'init', 'revera_vc_tt_gfont_shortcode' );
add_action( 'init', 'revera_vc_tt_gmap_shortcode' );
add_action( 'init', 'revera_vc_tt_toggle_shortcode' );
add_action( 'init', 'revera_vc_tt_clients_shortcode' );


add_action( 'init', 'revera_vc_tt_recentposts_shortcode' );
add_action( 'init', 'revera_vc_tt_member_shortcode' );
add_action( 'init', 'revera_vc_tt_newsticker_shortcode' );
add_action( 'init', 'revera_vc_tt_countdown_shortcode' );
*/



if(class_exists('WPBakeryShortCodesContainer')){
	
	class WPBakeryShortCode_tt_wrap extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_tt_process extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_tt_members extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_tt_testimonial extends WPBakeryShortCodesContainer {}
	
}


//-------------------------------------- 
// Custom Title 
//-------------------------------------- 
/*
add_filter('wpb_widget_title', 'override_widget_title', 10, 2);
function override_widget_title($output = '', $params = array('')) {
  $extraclass = (isset($params['extraclass'])) ? " ".$params['extraclass'] : "";
  return '<div class="clearfix"><h3 class="col-title'.$extraclass.'">'.$params['title'].'</h3></div>';
}
*/


//-------------------------------------- 
// Wrap Section
//-------------------------------------- 
function revera_vc_tt_wrap_shortcode() {
   vc_map( array(
      "name" => __("Section (Parallax)","revera"),
      "base" => "tt_wrap",
	  "icon" => "tt-wrap",
	  'admin_enqueue_css' => array(get_template_directory_uri().'/functions/vc/vc.css'),
	  'front_enqueue_css' => get_template_directory_uri().'/functions/vc/vc.css',
	  "content_element" => true,	
	  "is_container" => true,
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
		 array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("ID","revera"),
            "param_name" => "id",
            "description" => __("Please set anchor ID and then set link to it by # tag","revera")
         ),
         array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Background color","revera"),
            "param_name" => "bg_color",
            "value" => '#F5F5F5',
            "description" => __("Choose Background color","revera")
         ),array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Border color","revera"),
            "param_name" => "border_color",
            "value" => '',
            "description" => __("Choose border color","revera")
         ),array(
            "type" => "attach_image",
            "heading" => __("Background Image","revera"),
            "param_name" => "image",
            "value" => "",
            "description" => __("Add background image","revera")
         ),array(
            "type" => "checkbox",
            "heading" => __("Parallax?","revera"),
            "param_name" => "parallax",
            "value" => array( __( "Yes, please", "revera" ) => "yes" ),
            "description" => __("Turn On Parallax effect?","revera"),
			'dependency' => array(
				'element' => 'image',
				'not_empty' => true
			),
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Parallax Ratio","revera"),
            "param_name" => "ratio",
            "value" => "0.6",
			'dependency' => array(
				'element' => 'parallax',
				'not_empty' => true
			),
            "description" => __("Enter Parallax movement ratio , Number only, for fix background use 0, default is 0.6","revera")
         ) 
      ),"js_view" => 'VcColumnView'
   ));
}



//-------------------------------------- 
// Title
//-------------------------------------- 
function revera_vc_tt_title_shortcode() {
   vc_map( array(
      "name" => __("Title","revera"),
      "base" => "tt_title",
	  "icon" => "tt-title",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("Content","revera"),
            "param_name" => "content",
            "value" => __("Your Title","revera"),
            "description" => __("Enter your title here","revera")
         ),array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("Content","revera"),
            "param_name" => "big_sub",
            "value" => __("Big Sub Title","revera")
         ),array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("Content","revera"),
            "param_name" => "small_sub",
            "value" => __("Small Sub Title","revera")
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Align","revera"),
            "param_name" => "align",
            "value" => array(
				'Center' => 'center',
				'Left' => 'left',
				'Right' => 'right'	
			)
		)
      )
   ));
}


//-------------------------------------- 
// Service Box
//-------------------------------------- 
function revera_vc_tt_service_shortcode() {
   vc_map( array(
      "name" => __("Service Box (Featured Box)","revera"),
      "base" => "tt_service",
	  "icon" => "tt-service",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "textfield",
            "heading" => __("Title","revera"),
            "param_name" => "title",
            "value" => "Your Title"
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Sub Title","revera"),
            "param_name" => "subtitle",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Icon","revera"),
            "param_name" => "icon",
            "value" => "",
            "description" => __("You can set Icon for your box","revera")
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Icon Position","revera"),
            "param_name" => "icon_pos",
            "value" => array(
				'Top'=>'top',
				'Left'=>'left'
				)
         ),
		 array(
            "type" => "attach_image",
            "heading" => __("Image","revera"),
            "param_name" => "image",
            "value" => "",
            "description" => __("You can add Image instead of Icon, if you add Image it will be override the icon ","revera")
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Button Text","revera"),
            "param_name" => "button_text",
            "value" => "",
            "description" => __("You can set button in bottom of box","revera")
         ),
		 array(
            "type" => "textfield",
            "heading" => __("URL","revera"),
            "param_name" => "url",
            "value" =>""
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Target","revera"),
            "param_name" => "target",
            "value" => array(
				'Current Window (_self)'=>'_self',
				'New Window (_blank)'=>'_blank'
				),
            "description" => __("Link open in New window or Current window","revera"),
			'dependency' => array(
				'element' => 'url',
				'not_empty' => true
			)
         ),
         array(
            "type" => "textarea_html",
            "heading" => __("Content","revera"),
            "param_name" => "content",
            "value" => "Lorem ipsum dolor sit...",
            "description" => __("Enter your content.","revera")
         ) 
      )
   ));
}



//-------------------------------------- 
// Process
//-------------------------------------- 
function revera_vc_tt_process_shortcode() {
   
   vc_map( array(
      "name" => __("Process","revera"),
      "base" => "tt_process",
	  "icon" => "tt-process",
	  "as_parent" => array('only' => 'tt_process_item'),
	  "content_element" => true,
	  "is_container" => true,
	  "show_settings_on_create" => false,
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
		 array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("ID","revera"),
            "param_name" => "id",
            "description" => __("Please set anchor ID and then set link to it by # tag","revera")
         ),array(
            "type" => "dropdown",
            "heading" => __("Columns","revera"),
            "param_name" => "width",
            "value" => array('Full Width'=>'twelve','3/4'=>'nine','2/3'=>'eight','1/2'=>'six'),
			'description' => __('Please select your wanted width', 'revera'),
         )
      ),"js_view" => 'VcColumnView'
   ));
   
   // Process Item
   vc_map( array(
      "name" => __("Process Item","revera"),
      "base" => "tt_process_item",
	  "icon" => "tt-process_item",
	  "content_element" => true,
	  "as_child" => array('only' => 'tt_process'),
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "textfield",
            "heading" => __("Number","revera"),
            "param_name" => "number",
            "value" => "1"
         ),array(
            "type" => "textfield",
            "heading" => __("Title","revera"),
            "param_name" => "title",
            "value" => "Your Title"
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Icon","revera"),
            "param_name" => "icon",
            "value" => "send",
            "description" => __("You can set Icon for your box","revera")
         ),
		 array(
            "type" => "attach_image",
            "heading" => __("Image","revera"),
            "param_name" => "image",
            "value" => "",
            "description" => __("You can add Image instead of Icon, if you add Image it will be override the icon ","revera")
         ),
         array(
            "type" => "textarea_html",
            "heading" => __("Content","revera"),
            "param_name" => "content",
            "value" => "Lorem ipsum dolor sit...",
            "description" => __("Enter your content.","revera")
         ) 
      )
   ));
}




//-------------------------------------- 
// Divider
//-------------------------------------- 
function revera_vc_tt_divider_shortcode() {
   vc_map( array(
      "name" => __("Divider","revera"),
      "base" => "tt_divider",
	  "icon" => "tt-divider",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Color","revera"),
            "param_name" => "color",
            "value" => '#eeeeee',
         )
      )
   ));
}




//-------------------------------------- 
// Portfolio Carousel
//-------------------------------------- 
function revera_vc_tt_portfolio_shortcode() {
   vc_map( array(
      "name" => __("Portfolio","revera"),
      "base" => "tt_portfolio",
	  "icon" => "tt-portfolio",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "dropdown",
            "heading" => __("Columns","revera"),
            "param_name" => "columns",
            "value" => array(3,4),
			'description' => __('How many columns would you like?', 'revera'),
         ),array(
            "type" => "dropdown",
            "heading" => __("Number of Items","revera"),
            "param_name" => "items",
            "value" => array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40)
         ),array(
            "type" => "textfield",
            "heading" => __("Category","revera"),
            "param_name" => "category",
            "description" => __('Please enter the portfolio category slug for filtering the result. (optional)', 'revera')
         ),
		 array(
            "type" => "checkbox",
            "heading" => __("Show Filtering?","revera"),
            "param_name" => "filter",
            "value" => array( __( "Yes, please", "revera" ) => 'true' )
         ),array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'revera' ),
			'param_name' => 'orderby',
			'value' => array(
				__( 'Date', 'revera' ) => 'date',
				__( 'ID', 'revera' ) => 'ID',
				__( 'Author', 'revera' ) => 'author',
				__( 'Title', 'revera' ) => 'title',
				__( 'Modified', 'revera' ) => 'modified',
				__( 'Random', 'revera' ) => 'rand',
				__( 'Comment count', 'revera' ) => 'comment_count',
				__( 'Menu order', 'revera' ) => 'menu_order'
			),
			'description' => sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'revera' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order way', 'revera' ),
			'param_name' => 'order',
			'value' => array(
				__( 'Descending', 'revera' ) => 'DESC',
				__( 'Ascending', 'revera' ) => 'ASC'
			),
			'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'revera' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		)
      )
   ));
}



//-------------------------------------- 
// Button
//-------------------------------------- 
function revera_vc_tt_button_shortcode() {
   vc_map( array(
      "name" => __("Button","revera"),
      "base" => "tt_button",
	  "icon" => "tt-button",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         
		 array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("Button Text","revera"),
            "param_name" => "text",
            "value" => "Button Text"
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Button Style","revera"),
            "param_name" => "style",
            "value" => array(
				'Solid Color (Round)'=>'solid',
				'Solid Color (Square)'=>'solid-square',
				'Outlined (Round)'=>'outlined',
				'Outlined (Square)'=>'outlined-square'
			)
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Button Default Color","revera"),
            "param_name" => "button_default_color",
            "value" => array(
				'Default Color'=>'color',
				'Black'=>'black',
				'White'=>'white',
				'Custom Color'=>'customcolor'
				
			)
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Button Custom Color","revera"),
            "param_name" => "button_custom_color",
            "value" => '',
			'dependency' => array(
				'element' => 'button_default_color',
				'value'=>array('customcolor')
			)
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Button Align","revera"),
            "param_name" => "align",
            "value" => array(
				'Center' => 'center',
				'Left' => 'left',
				'Right' => 'right',
			)
		),
		 array(
            "type" => "textfield",
            "heading" => __("Icon","revera"),
            "param_name" => "icon",
            "value" => "",
            "description" => __("You can set Icon for your button","revera"),
			
         ),
		 array(
            "type" => "textfield",
            "heading" => __("URL","revera"),
            "param_name" => "url",
            "value" =>""
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Target","revera"),
            "param_name" => "target",
            "value" => array(
				'Current Window (_self)'=>'_self',
				'New Window (_blank)'=>'_blank'
				),
            "description" => __("Link open in New window or Current window","revera"),
			'dependency' => array(
				'element' => 'url',
				'not_empty' => true
			)
         )
      )
   ));
}




//-------------------------------------- 
// Slider
//-------------------------------------- 
function revera_vc_tt_slider_shortcode() {
   vc_map( array(
      "name" => __("Slider","revera"),
      "base" => "tt_slider",
	  "icon" => "tt-slider",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
		 array(
            "type" => "attach_images",
            "heading" => __("Images","revera"),
            "param_name" => "images",
            "value" => "",
            "description" => __("Please add your slider images","revera")
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Transition Mode","revera"),
            "param_name" => "mode",
            "value" => array(
				'Fade' => 'fade',
				'Horizontal' => 'horizontal',
				'Vertical' => 'vertical',
			),
			"description" => __("Type of transition between slides","revera")
		),
		 array(
            "type" => "textfield",
            "heading" => __("Speed","revera"),
            "param_name" => "speed",
            "value" => "500",
            "description" => __("Slide transition duration (in ms)","revera")
         ),
		 array(
            "type" => "checkbox",
            "heading" => __("Show Controls?","revera"),
            "param_name" => "controls",
            "value" => array( __( "Yes, please", "revera" ) => true )
         ),
		 array(
            "type" => "checkbox",
            "heading" => __("Auto Play?","revera"),
            "param_name" => "auto",
            "value" => array( __( "Yes, please", "revera" ) => true ),
			'dependency' => array(
				'element' => 'pause',
				'not_empty' => true
			)
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Pause Time","revera"),
            "param_name" => "pause",
            "value" => "4000",
            "description" => __("The amount of time (in ms) between each auto transition","revera")
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Image Size","revera"),
            "param_name" => "image_size",
            "description" => __("You can set your wanted image size such as thumbnail, medium, large, full (Optional)","revera")
         )
      )
   ));
}




//-------------------------------------- 
// Member
//-------------------------------------- 
function revera_vc_tt_members_shortcode() {
	
	vc_map( array(
      "name" => __("Members","revera"),
      "base" => "tt_members",
	  "icon" => "tt-members",
	  "as_parent" => array('only' => 'tt_members_item'),
	  "content_element" => true,
	  "is_container" => true,
	  "show_settings_on_create" => true,
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
	  	array(
            "type" => "dropdown",
            "heading" => __("Columns","revera"),
            "param_name" => "columns",
            "value" => array('1','2','3','4','5'),
			'description' => __('Please select your wanted columns to display the members', 'revera'),
         )
      ),"js_view" => 'VcColumnView'
   ));
   
   // Member Item
   vc_map( array(
      "name" => __("Member Item","revera"),
      "base" => "tt_members_item",
	  "icon" => "tt-members_item",
	  "content_element" => true,
	  "as_child" => array('only' => 'tt_members'),
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("Full Name","revera"),
            "param_name" => "name",
            "value" => "Full Name"
         ),array(
            "type" => "textfield",
            "heading" => __("Job Role","revera"),
            "param_name" => "role",
            "value" => "Job",
			"description" => __("e.g. CEO, Manager, Designer and ...)","revera")
         ),array(
            "type" => "attach_image",
            "heading" => __("Image","revera"),
            "param_name" => "image",
            "value" => ""
         ),array(
            "type" => "textfield",
            "heading" => __("Facebook URL","revera"),
            "param_name" => "facebook",
            "value" => "",
			"description" => __("e.g. http://www.facebook.com/envato (with http://)","revera")
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Twitter URL","revera"),
            "param_name" => "twitter",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Google+","revera"),
            "param_name" => "google_plus",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Linkedin","revera"),
            "param_name" => "linkedin",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Skype","revera"),
            "param_name" => "skype",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Dribbble","revera"),
            "param_name" => "dribbble",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Flickr","revera"),
            "param_name" => "flickr",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Instagram","revera"),
            "param_name" => "instagram",
            "value" => ""
         )
		 ,
		 array(
            "type" => "textfield",
            "heading" => __("Email","revera"),
            "param_name" => "email",
            "value" => ""
         ),
         array(
            "type" => "textarea_html",
            "heading" => __("Content","revera"),
            "param_name" => "content",
            "value" => __("your content goes here!","revera"),
            "description" => __("Enter your content.","revera")
         )
      )
   ));
   

}



//-------------------------------------- 
// Testimonial
//-------------------------------------- 
function revera_vc_tt_testimonial_shortcode() {
   
   vc_map( array(
      "name" => __("Testimonial","revera"),
      "base" => "tt_testimonial",
	  "icon" => "tt-testimonial",
	  "as_parent" => array('only' => 'tt_testimonial_item'),
	  "content_element" => true,
	  "is_container" => true,
	  "show_settings_on_create" => false,
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
		 array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("ID","revera"),
            "param_name" => "id",
            "description" => __("Please set an ID (Optional)","revera")
         ),array(
            "type" => "dropdown",
            "heading" => __("Columns","revera"),
            "param_name" => "width",
            "value" => array('Full Width'=>'twelve','3/4'=>'nine','2/3'=>'eight','1/2'=>'six'),
			'description' => __('Please select your wanted width', 'revera'),
         )
      ),"js_view" => 'VcColumnView'
   ));
   
   // Testimonial Item
   vc_map( array(
      "name" => __("Testimonial Item","revera"),
      "base" => "tt_testimonial_item",
	  "icon" => "tt-testimonial_item",
	  "content_element" => true,
	  "as_child" => array('only' => 'tt_testimonial'),
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
		 array(
            "type" => "textfield",
            "heading" => __("Name","revera"),
            "param_name" => "name",
            "value" => "Your Name"
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Role (Job)","revera"),
            "param_name" => "role",
            "value" => "Company or Job"
         ),
		 array(
            "type" => "attach_image",
            "heading" => __("Image","revera"),
            "param_name" => "image",
            "value" => "",
            "description" => __("You can add Image instead of Icon, if you add Image it will be override the icon ","revera")
         ),
         array(
            "type" => "textarea_html",
            "heading" => __("Content","revera"),
            "param_name" => "content",
            "value" => "Lorem ipsum dolor sit...",
            "description" => __("Enter your content.","revera")
         ) 
      )
   ));
}



//-------------------------------------- 
// Pricing Table
//-------------------------------------- 
function revera_vc_tt_pricingtable_shortcode() {
	/*
	vc_map( array(
      "name" => __("Pricing Table","revera"),
      "base" => "tt_pricingtable",
	  "icon" => "tt-pricingtable",
	  "as_parent" => array('only' => 'tt_pricingtable_item'),
	  "content_element" => true,
	  "is_container" => true,
	  "show_settings_on_create" => true,
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
	  	array(
            "type" => "dropdown",
            "heading" => __("Columns","revera"),
            "param_name" => "columns",
            "value" => array('1','2','3','4','5'),
			'description' => __('Please select your wanted columns to display the tables', 'revera'),
         )
      ),"js_view" => 'VcColumnView'
   ));*/
   
   // Member Item
   vc_map( array(
      "name" => __("Pricing Table Item","revera"),
      "base" => "tt_pricingtable_item",
	  "icon" => "tt-pricingtable_item",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("Title","revera"),
            "param_name" => "title",
            "value" => "Plan Name"
         ),array(
            "type" => "textfield",
            "heading" => __("Price","revera"),
            "param_name" => "price",
            "value" => "9.99"
         ),array(
            "type" => "textfield",
            "heading" => __("Currency Unit","revera"),
            "param_name" => "currency",
            "value" => "$"
         ),array(
            "type" => "textfield",
            "heading" => __("Peroid","revera"),
            "param_name" => "period",
            "value" => "/mo",
			"description" => __("e.g. /mo, /hr, Yearly ...","revera")
         ),array(
            "type" => "textfield",
            "heading" => __("Button Text","revera"),
            "param_name" => "text",
            "value" => "Order Now"
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Button Style","revera"),
            "param_name" => "style",
            "value" => array(
				'Solid Color (Round)'=>'solid',
				'Solid Color (Square)'=>'solid-square',
				'Outlined (Round)'=>'outlined',
				'Outlined (Square)'=>'outlined-square'
			)
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Button Default Color","revera"),
            "param_name" => "button_default_color",
            "value" => array(
				'Default Color'=>'color',
				'Black'=>'black',
				'White'=>'white',
				'Custom Color'=>'customcolor'
				
			)
         ),
		 array(
            "type" => "colorpicker",
            "heading" => __("Button Custom Color","revera"),
            "param_name" => "button_custom_color",
            "value" => '',
			'dependency' => array(
				'element' => 'button_default_color',
				'value'=>array('customcolor')
			)
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Icon","revera"),
            "param_name" => "icon",
            "description" => __("You can set Icon for your button","revera"),
			
         ),
		 array(
            "type" => "textfield",
            "heading" => __("URL","revera"),
            "param_name" => "url",
            "value" =>""
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Target","revera"),
            "param_name" => "target",
            "value" => array(
				'Current Window (_self)'=>'_self',
				'New Window (_blank)'=>'_blank'
				),
            "description" => __("Link open in New window or Current window","revera"),
			'dependency' => array(
				'element' => 'url',
				'not_empty' => true
			)
		 ),
         array(
            "type" => "textarea_html",
            "heading" => __("Content","revera"),
            "param_name" => "content",
            "value" => __("your content goes here!","revera"),
            "description" => __("Enter your content.","revera")
         )
      )
   ));

}
















/*************************************************************************************************************/
/*************************************************************************************************************/
/*************************************************************************************************************/












//-------------------------------------- 
// Action Box
//-------------------------------------- 
function revera_vc_tt_actionbox_shortcode() {
   vc_map( array(
      "name" => __("Action Box","revera"),
      "base" => "tt_actionbox",
	  "icon" => "tt-actionbox",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "dropdown",
            "heading" => __("Type","revera"),
            "param_name" => "type",
            "value" => array(
				'Light'=>'light',
				'Dark'=>'dark'
			)
         ),array(
            "type" => "dropdown",
            "holder" => "div",
            "heading" => __("Style","revera"),
            "param_name" => "style",
            "value" => array(
				'Text in Left | Button in Right'=>'style1',
				'Text in Right | Button in Left'=>'style2',
				'Center Style'=>'style3'
			),
            "description" => __("Please Select the Style of Action Box","revera")
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Title","revera"),
            "param_name" => "title",
            "value" => ""
         )
		 ,
		 array(
            "type" => "textfield",
            "heading" => __("Sub Title","revera"),
            "param_name" => "sub_text",
            "value" => "",
         )
		 ,
		 array(
            "type" => "textfield",
            "heading" => __("Icon","revera"),
            "param_name" => "icon",
            "value" => "",
            "description" => __("You can set Icon for your box","revera")
         ),array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Icon Color","revera"),
            "param_name" => "icon_color",
            "value" => '',
			'dependency' => array(
				'element' => 'icon',
				'not_empty' => true
			)
         ),
		 array(
            "type" => "attach_image",
            "heading" => __("Image","revera"),
            "param_name" => "image",
            "value" => "",
            "description" => __("You can add Image instead of Icon, if you add Image it will be override the icon","revera")
         )
		 ,
		 array(
            "type" => "textfield",
            "heading" => __("Button Text","revera"),
            "param_name" => "button_text",
            "value" => ""
         ),array(
            "type" => "dropdown",
            "heading" => __("Button Style","revera"),
            "param_name" => "button_style",
            "value" => array(
				'Default (Rounded)'=>'tbutton1',
				'Square'=>'tbutton2',
				'Round'=>'tbutton3',
				'Oval'=>'tbutton4',
				'Outlined'=>'tbutton5',
				'Outlined (Round)'=>'tbutton6',
				'Outlined (Square)'=>'tbutton7',
			),
			'dependency' => array(
				'element' => 'button_text',
				'not_empty' => true
			)
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Button Default Color","revera"),
            "param_name" => "button_default_color",
            "value" => array(
				'Default Color'=>'color1',
				'Black'=>'color10',
				'Green'=>'color2',
				'Orange'=>'color3',
				'Blue'=>'color4',
				'Red'=>'color5',
				'Aqua'=>'color6',
				'Pharlap'=>'color7',
				'Gumbo'=>'color8',
				'Turquoise'=>'color9',
				'Custom Color'=>'customcolor'
				
			),
			'dependency' => array(
				'element' => 'button_text',
				'not_empty' => true
			)
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Button Custom Color","revera"),
            "param_name" => "button_color",
            "value" => '',
			'dependency' => array(
				'element' => 'button_default_color',
				'value'=>array('customcolor')
			)
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Button Icon","revera"),
            "param_name" => "button_icon",
            "value" => "",
            "description" => __("You can set Icon for your button","revera"),
			'dependency' => array(
				'element' => 'button_text',
				'not_empty' => true
			)
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Button Size","revera"),
            "param_name" => "button_size",
            "value" => array(
				'Small'=>'small',
				'Medium'=>'medium',
				'Large'=>'large'
				),
			'dependency' => array(
				'element' => 'button_text',
				'not_empty' => true
			)
         ),
		 array(
            "type" => "textfield",
            "heading" => __("URL","revera"),
            "param_name" => "url",
            "value" =>""
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Target","revera"),
            "param_name" => "target",
            "value" => array(
				'Current Window (_self)'=>'_self',
				'New Window (_blank)'=>'_blank'
				),
            "description" => __("Link open in New window or Current window","revera"),
			'dependency' => array(
				'element' => 'url',
				'not_empty' => true
			)
         )
      )
   ));
}



















//-------------------------------------- 
// Anchor
//-------------------------------------- 
function revera_vc_tt_anchor_shortcode() {
   vc_map( array(
      "name" => __("Anchor","revera"),
      "base" => "tt_anchor",
	  "icon" => "tt-anchor",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
		 array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("ID","revera"),
            "param_name" => "id",
            "description" => __("Please set anchor ID and then set link to it by # tag","revera")
         ),
		 array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("Padding Top","revera"),
            "param_name" => "padding_top",
			"value" =>"120px",
            "description" => __("Please set padding top (default is 120px)","revera")
         )
      )
   ));
}


//-------------------------------------- 
// Google Font
//-------------------------------------- 
function revera_vc_tt_gfont_shortcode() {
   vc_map( array(
      "name" => __("Google Font","revera"),
      "base" => "tt_gfont",
	  "icon" => "tt-gfont",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("Content","revera"),
            "param_name" => "content",
            "value" => "Your Text",
            "description" => __("Enter your title here","revera")
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Font Family","revera"),
            "param_name" => "font",
            "value" => array(
"helvetica"=>"Helvetica","ABeeZee" => "ABeeZee","Abel" => "Abel","Abril Fatface" => "Abril+Fatface","Aclonica" => "Aclonica","Acme" => "Acme","Actor" => "Actor","Adamina" => "Adamina","Advent Pro" => "Advent+Pro","Aguafina Script" => "Aguafina+Script","Akronim" => "Akronim","Aladin" => "Aladin","Aldrich" => "Aldrich","Alegreya" => "Alegreya","Alegreya SC" => "Alegreya+SC","Alex Brush" => "Alex+Brush","Alfa Slab One" => "Alfa+Slab+One","Alice" => "Alice","Alike" => "Alike","Alike Angular" => "Alike+Angular","Allan" => "Allan","Allerta" => "Allerta","Allerta Stencil" => "Allerta+Stencil","Allura" => "Allura","Almendra" => "Almendra","Almendra Display" => "Almendra+Display","Almendra SC" => "Almendra+SC","Amarante" => "Amarante","Amaranth" => "Amaranth","Amatic SC" => "Amatic+SC","Amethysta" => "Amethysta","Anaheim" => "Anaheim","Andada" => "Andada","Andika" => "Andika","Angkor" => "Angkor","Annie Use Your Telescope" => "Annie+Use+Your+Telescope","Anonymous Pro" => "Anonymous+Pro","Antic" => "Antic","Antic Didone" => "Antic+Didone","Antic Slab" => "Antic+Slab","Anton" => "Anton","Arapey" => "Arapey","Arbutus" => "Arbutus","Arbutus Slab" => "Arbutus+Slab","Architects Daughter" => "Architects+Daughter","Archivo Black" => "Archivo+Black","Archivo Narrow" => "Archivo+Narrow","Arimo" => "Arimo","Arizonia" => "Arizonia","Armata" => "Armata","Artifika" => "Artifika","Arvo" => "Arvo","Asap" => "Asap","Asset" => "Asset","Astloch" => "Astloch","Asul" => "Asul","Atomic Age" => "Atomic+Age","Aubrey" => "Aubrey","Audiowide" => "Audiowide","Autour One" => "Autour+One","Average" => "Average","Average Sans" => "Average+Sans","Averia Gruesa Libre" => "Averia+Gruesa+Libre","Averia Libre" => "Averia+Libre","Averia Sans Libre" => "Averia+Sans+Libre","Averia Serif Libre" => "Averia+Serif+Libre","Bad Script" => "Bad+Script","Balthazar" => "Balthazar","Bangers" => "Bangers","Basic" => "Basic","Battambang" => "Battambang","Baumans" => "Baumans","Bayon" => "Bayon","Belgrano" => "Belgrano","Belleza" => "Belleza","BenchNine" => "BenchNine","Bentham" => "Bentham","Berkshire Swash" => "Berkshire+Swash","Bevan" => "Bevan","Bigelow Rules" => "Bigelow+Rules","Bigshot One" => "Bigshot+One","Bilbo" => "Bilbo","Bilbo Swash Caps" => "Bilbo+Swash+Caps","Bitter" => "Bitter","Black Ops One" => "Black+Ops+One","Bokor" => "Bokor","Bonbon" => "Bonbon","Boogaloo" => "Boogaloo","Bowlby One" => "Bowlby+One","Bowlby One SC" => "Bowlby+One+SC","Brawler" => "Brawler","Bree Serif" => "Bree+Serif","Bubblegum Sans" => "Bubblegum+Sans","Bubbler One" => "Bubbler+One","Buda" => "Buda","Buenard" => "Buenard","Butcherman" => "Butcherman","Butterfly Kids" => "Butterfly+Kids","Cabin" => "Cabin","Cabin Condensed" => "Cabin+Condensed","Cabin Sketch" => "Cabin+Sketch","Caesar Dressing" => "Caesar+Dressing","Cagliostro" => "Cagliostro","Calligraffitti" => "Calligraffitti","Cambo" => "Cambo","Candal" => "Candal","Cantarell" => "Cantarell","Cantata One" => "Cantata+One","Cantora One" => "Cantora+One","Capriola" => "Capriola","Cardo" => "Cardo","Carme" => "Carme","Carrois Gothic" => "Carrois+Gothic","Carrois Gothic SC" => "Carrois+Gothic+SC","Carter One" => "Carter+One","Caudex" => "Caudex","Cedarville Cursive" => "Cedarville+Cursive","Ceviche One" => "Ceviche+One","Changa One" => "Changa+One","Chango" => "Chango","Chau Philomene One" => "Chau+Philomene+One","Chela One" => "Chela+One","Chelsea Market" => "Chelsea+Market","Chenla" => "Chenla","Cherry Cream Soda" => "Cherry+Cream+Soda","Cherry Swash" => "Cherry+Swash","Chewy" => "Chewy","Chicle" => "Chicle","Chivo" => "Chivo","Cinzel" => "Cinzel","Cinzel Decorative" => "Cinzel+Decorative","Clicker Script" => "Clicker+Script","Coda" => "Coda","Coda Caption" => "Coda+Caption","Codystar" => "Codystar","Combo" => "Combo","Comfortaa" => "Comfortaa","Coming Soon" => "Coming+Soon","Concert One" => "Concert+One","Condiment" => "Condiment","Content" => "Content","Contrail One" => "Contrail+One","Convergence" => "Convergence","Cookie" => "Cookie","Copse" => "Copse","Corben" => "Corben","Courgette" => "Courgette","Cousine" => "Cousine","Coustard" => "Coustard","Covered By Your Grace" => "Covered+By+Your+Grace","Crafty Girls" => "Crafty+Girls","Creepster" => "Creepster","Crete Round" => "Crete+Round","Crimson Text" => "Crimson+Text","Croissant One" => "Croissant+One","Crushed" => "Crushed","Cuprum" => "Cuprum","Cutive" => "Cutive","Cutive Mono" => "Cutive+Mono","Damion" => "Damion","Dancing Script" => "Dancing+Script","Dangrek" => "Dangrek","Dawning of a New Day" => "Dawning+of+a+New+Day","Days One" => "Days+One","Delius" => "Delius","Delius Swash Caps" => "Delius+Swash+Caps","Delius Unicase" => "Delius+Unicase","Della Respira" => "Della+Respira","Denk One" => "Denk+One","Devonshire" => "Devonshire","Didact Gothic" => "Didact+Gothic","Diplomata" => "Diplomata","Diplomata SC" => "Diplomata+SC","Domine" => "Domine","Donegal One" => "Donegal+One","Doppio One" => "Doppio+One","Dorsa" => "Dorsa","Dosis" => "Dosis","Dr Sugiyama" => "Dr+Sugiyama","Droid Sans" => "Droid+Sans","Droid Sans Mono" => "Droid+Sans+Mono","Droid Serif" => "Droid+Serif","Duru Sans" => "Duru+Sans","Dynalight" => "Dynalight","EB Garamond" => "EB+Garamond","Eagle Lake" => "Eagle+Lake","Eater" => "Eater","Economica" => "Economica","Electrolize" => "Electrolize","Elsie" => "Elsie","Elsie Swash Caps" => "Elsie+Swash+Caps","Emblema One" => "Emblema+One","Emilys Candy" => "Emilys+Candy","Engagement" => "Engagement","Englebert" => "Englebert","Enriqueta" => "Enriqueta","Erica One" => "Erica+One","Esteban" => "Esteban","Euphoria Script" => "Euphoria+Script","Ewert" => "Ewert","Exo" => "Exo","Expletus Sans" => "Expletus+Sans","Fanwood Text" => "Fanwood+Text","Fascinate" => "Fascinate","Fascinate Inline" => "Fascinate+Inline","Faster One" => "Faster+One","Fasthand" => "Fasthand","Federant" => "Federant","Federo" => "Federo","Felipa" => "Felipa","Fenix" => "Fenix","Finger Paint" => "Finger+Paint","Fjalla One" => "Fjalla+One","Fjord One" => "Fjord+One","Flamenco" => "Flamenco","Flavors" => "Flavors","Fondamento" => "Fondamento","Fontdiner Swanky" => "Fontdiner+Swanky","Forum" => "Forum","Francois One" => "Francois+One","Freckle Face" => "Freckle+Face","Fredericka the Great" => "Fredericka+the+Great","Fredoka One" => "Fredoka+One","Freehand" => "Freehand","Fresca" => "Fresca","Frijole" => "Frijole","Fruktur" => "Fruktur","Fugaz One" => "Fugaz+One","GFS Didot" => "GFS+Didot","GFS Neohellenic" => "GFS+Neohellenic","Gabriela" => "Gabriela","Gafata" => "Gafata","Galdeano" => "Galdeano","Galindo" => "Galindo","Gentium Basic" => "Gentium+Basic","Gentium Book Basic" => "Gentium+Book+Basic","Geo" => "Geo","Geostar" => "Geostar","Geostar Fill" => "Geostar+Fill","Germania One" => "Germania+One","Gilda Display" => "Gilda+Display","Give You Glory" => "Give+You+Glory","Glass Antiqua" => "Glass+Antiqua","Glegoo" => "Glegoo","Gloria Hallelujah" => "Gloria+Hallelujah","Goblin One" => "Goblin+One","Gochi Hand" => "Gochi+Hand","Gorditas" => "Gorditas","Goudy Bookletter 1911" => "Goudy+Bookletter+1911","Graduate" => "Graduate","Grand Hotel" => "Grand+Hotel","Gravitas One" => "Gravitas+One","Great Vibes" => "Great+Vibes","Griffy" => "Griffy","Gruppo" => "Gruppo","Gudea" => "Gudea","Habibi" => "Habibi","Hammersmith One" => "Hammersmith+One","Hanalei" => "Hanalei","Hanalei Fill" => "Hanalei+Fill","Handlee" => "Handlee","Hanuman" => "Hanuman","Happy Monkey" => "Happy+Monkey","Headland One" => "Headland+One","Henny Penny" => "Henny+Penny","Herr Von Muellerhoff" => "Herr+Von+Muellerhoff","Holtwood One SC" => "Holtwood+One+SC","Homemade Apple" => "Homemade+Apple","Homenaje" => "Homenaje","IM Fell DW Pica" => "IM+Fell+DW+Pica","IM Fell DW Pica SC" => "IM+Fell+DW+Pica+SC","IM Fell Double Pica" => "IM+Fell+Double+Pica","IM Fell Double Pica SC" => "IM+Fell+Double+Pica+SC","IM Fell English" => "IM+Fell+English","IM Fell English SC" => "IM+Fell+English+SC","IM Fell French Canon" => "IM+Fell+French+Canon","IM Fell French Canon SC" => "IM+Fell+French+Canon+SC","IM Fell Great Primer" => "IM+Fell+Great+Primer","IM Fell Great Primer SC" => "IM+Fell+Great+Primer+SC","Iceberg" => "Iceberg","Iceland" => "Iceland","Imprima" => "Imprima","Inconsolata" => "Inconsolata","Inder" => "Inder","Indie Flower" => "Indie+Flower","Inika" => "Inika","Irish Grover" => "Irish+Grover","Istok Web" => "Istok+Web","Italiana" => "Italiana","Italianno" => "Italianno","Jacques Francois" => "Jacques+Francois","Jacques Francois Shadow" => "Jacques+Francois+Shadow","Jim Nightshade" => "Jim+Nightshade","Jockey One" => "Jockey+One","Jolly Lodger" => "Jolly+Lodger","Josefin Sans" => "Josefin+Sans","Josefin Slab" => "Josefin+Slab","Joti One" => "Joti+One","Judson" => "Judson","Julee" => "Julee","Julius Sans One" => "Julius+Sans+One","Junge" => "Junge","Jura" => "Jura","Just Another Hand" => "Just+Another+Hand","Just Me Again Down Here" => "Just+Me+Again+Down+Here","Kameron" => "Kameron","Karla" => "Karla","Kaushan Script" => "Kaushan+Script","Kavoon" => "Kavoon","Keania One" => "Keania+One","Kelly Slab" => "Kelly+Slab","Kenia" => "Kenia","Khmer" => "Khmer","Kite One" => "Kite+One","Knewave" => "Knewave","Kotta One" => "Kotta+One","Koulen" => "Koulen","Kranky" => "Kranky","Kreon" => "Kreon","Kristi" => "Kristi","Krona One" => "Krona+One","La Belle Aurore" => "La+Belle+Aurore","Lancelot" => "Lancelot","Lato" => "Lato","League Script" => "League+Script","Leckerli One" => "Leckerli+One","Ledger" => "Ledger","Lekton" => "Lekton","Lemon" => "Lemon","Libre Baskerville" => "Libre+Baskerville","Life Savers" => "Life+Savers","Lilita One" => "Lilita+One","Limelight" => "Limelight","Linden Hill" => "Linden+Hill","Lobster" => "Lobster","Lobster Two" => "Lobster+Two","Londrina Outline" => "Londrina+Outline","Londrina Shadow" => "Londrina+Shadow","Londrina Sketch" => "Londrina+Sketch","Londrina Solid" => "Londrina+Solid","Lora" => "Lora","Love Ya Like A Sister" => "Love+Ya+Like+A+Sister","Loved by the King" => "Loved+by+the+King","Lovers Quarrel" => "Lovers+Quarrel","Luckiest Guy" => "Luckiest+Guy","Lusitana" => "Lusitana","Lustria" => "Lustria","Macondo" => "Macondo","Macondo Swash Caps" => "Macondo+Swash+Caps","Magra" => "Magra","Maiden Orange" => "Maiden+Orange","Mako" => "Mako","Marcellus" => "Marcellus","Marcellus SC" => "Marcellus+SC","Marck Script" => "Marck+Script","Margarine" => "Margarine","Marko One" => "Marko+One","Marmelad" => "Marmelad","Marvel" => "Marvel","Mate" => "Mate","Mate SC" => "Mate+SC","Maven Pro" => "Maven+Pro","McLaren" => "McLaren","Meddon" => "Meddon","MedievalSharp" => "MedievalSharp","Medula One" => "Medula+One","Megrim" => "Megrim","Meie Script" => "Meie+Script","Merienda" => "Merienda","Merienda One" => "Merienda+One","Merriweather" => "Merriweather","Merriweather Sans" => "Merriweather+Sans","Metal" => "Metal","Metal Mania" => "Metal+Mania","Metamorphous" => "Metamorphous","Metrophobic" => "Metrophobic","Michroma" => "Michroma","Milonga" => "Milonga","Miltonian" => "Miltonian","Miltonian Tattoo" => "Miltonian+Tattoo","Miniver" => "Miniver","Miss Fajardose" => "Miss+Fajardose","Modern Antiqua" => "Modern+Antiqua","Molengo" => "Molengo","Molle" => "Molle","Monda" => "Monda","Monofett" => "Monofett","Monoton" => "Monoton","Monsieur La Doulaise" => "Monsieur+La+Doulaise","Montaga" => "Montaga","Montez" => "Montez","Montserrat" => "Montserrat","Montserrat Alternates" => "Montserrat+Alternates","Montserrat Subrayada" => "Montserrat+Subrayada","Moul" => "Moul","Moulpali" => "Moulpali","Mountains of Christmas" => "Mountains+of+Christmas","Mouse Memoirs" => "Mouse+Memoirs","Mr Bedfort" => "Mr+Bedfort","Mr Dafoe" => "Mr+Dafoe","Mr De Haviland" => "Mr+De+Haviland","Mrs Saint Delafield" => "Mrs+Saint+Delafield","Mrs Sheppards" => "Mrs+Sheppards","Muli" => "Muli","Mystery Quest" => "Mystery+Quest","Neucha" => "Neucha","Neuton" => "Neuton","New Rocker" => "New+Rocker","News Cycle" => "News+Cycle","Niconne" => "Niconne","Nixie One" => "Nixie+One","Nobile" => "Nobile","Nokora" => "Nokora","Norican" => "Norican","Nosifer" => "Nosifer","Nothing You Could Do" => "Nothing+You+Could+Do","Noticia Text" => "Noticia+Text","Nova Cut" => "Nova+Cut","Nova Flat" => "Nova+Flat","Nova Mono" => "Nova+Mono","Nova Oval" => "Nova+Oval","Nova Round" => "Nova+Round","Nova Script" => "Nova+Script","Nova Slim" => "Nova+Slim","Nova Square" => "Nova+Square","Numans" => "Numans","Nunito" => "Nunito","Odor Mean Chey" => "Odor+Mean+Chey","Offside" => "Offside","Old Standard TT" => "Old+Standard+TT","Oldenburg" => "Oldenburg","Oleo Script" => "Oleo+Script","Oleo Script Swash Caps" => "Oleo+Script+Swash+Caps","Open Sans" => "Open+Sans","Open Sans Condensed" => "Open+Sans+Condensed","Oranienbaum" => "Oranienbaum","Orbitron" => "Orbitron","Oregano" => "Oregano","Orienta" => "Orienta","Original Surfer" => "Original+Surfer","Oswald" => "Oswald","Over the Rainbow" => "Over+the+Rainbow","Overlock" => "Overlock","Overlock SC" => "Overlock+SC","Ovo" => "Ovo","Oxygen" => "Oxygen","Oxygen Mono" => "Oxygen+Mono","PT Mono" => "PT+Mono","PT Sans" => "PT+Sans","PT Sans Caption" => "PT+Sans+Caption","PT Sans Narrow" => "PT+Sans+Narrow","PT Serif" => "PT+Serif","PT Serif Caption" => "PT+Serif+Caption","Pacifico" => "Pacifico","Paprika" => "Paprika","Parisienne" => "Parisienne","Passero One" => "Passero+One","Passion One" => "Passion+One","Patrick Hand" => "Patrick+Hand","Patrick Hand SC" => "Patrick+Hand+SC","Patua One" => "Patua+One","Paytone One" => "Paytone+One","Peralta" => "Peralta","Permanent Marker" => "Permanent+Marker","Petit Formal Script" => "Petit+Formal+Script","Petrona" => "Petrona","Philosopher" => "Philosopher","Piedra" => "Piedra","Pinyon Script" => "Pinyon+Script","Pirata One" => "Pirata+One","Plaster" => "Plaster","Play" => "Play","Playball" => "Playball","Playfair Display" => "Playfair+Display","Playfair Display SC" => "Playfair+Display+SC","Podkova" => "Podkova","Poiret One" => "Poiret+One","Poller One" => "Poller+One","Poly" => "Poly","Pompiere" => "Pompiere","Pontano Sans" => "Pontano+Sans","Port Lligat Sans" => "Port+Lligat+Sans","Port Lligat Slab" => "Port+Lligat+Slab","Prata" => "Prata","Preahvihear" => "Preahvihear","Press Start 2P" => "Press+Start+2P","Princess Sofia" => "Princess+Sofia","Prociono" => "Prociono","Prosto One" => "Prosto+One","Puritan" => "Puritan","Purple Purse" => "Purple+Purse","Quando" => "Quando","Quantico" => "Quantico","Quattrocento" => "Quattrocento","Quattrocento Sans" => "Quattrocento+Sans","Questrial" => "Questrial","Quicksand" => "Quicksand","Quintessential" => "Quintessential","Qwigley" => "Qwigley","Racing Sans One" => "Racing+Sans+One","Radley" => "Radley","Raleway" => "Raleway","Raleway Dots" => "Raleway+Dots","Rambla" => "Rambla","Rammetto One" => "Rammetto+One","Ranchers" => "Ranchers","Rancho" => "Rancho","Rationale" => "Rationale","Redressed" => "Redressed","Reenie Beanie" => "Reenie+Beanie","Revalia" => "Revalia","Ribeye" => "Ribeye","Ribeye Marrow" => "Ribeye+Marrow","Righteous" => "Righteous","Risque" => "Risque","Roboto" => "Roboto","Roboto Condensed" => "Roboto+Condensed","Rochester" => "Rochester","Rock Salt" => "Rock+Salt","Rokkitt" => "Rokkitt","Romanesco" => "Romanesco","Ropa Sans" => "Ropa+Sans","Rosario" => "Rosario","Rosarivo" => "Rosarivo","Rouge Script" => "Rouge+Script","Ruda" => "Ruda","Rufina" => "Rufina","Ruge Boogie" => "Ruge+Boogie","Ruluko" => "Ruluko","Rum Raisin" => "Rum+Raisin","Ruslan Display" => "Ruslan+Display","Russo One" => "Russo+One","Ruthie" => "Ruthie","Rye" => "Rye","Sacramento" => "Sacramento","Sail" => "Sail","Salsa" => "Salsa","Sanchez" => "Sanchez","Sancreek" => "Sancreek","Sansita One" => "Sansita+One","Sarina" => "Sarina","Satisfy" => "Satisfy","Scada" => "Scada","Schoolbell" => "Schoolbell","Seaweed Script" => "Seaweed+Script","Sevillana" => "Sevillana","Seymour One" => "Seymour+One","Shadows Into Light" => "Shadows+Into+Light","Shadows Into Light Two" => "Shadows+Into+Light+Two","Shanti" => "Shanti","Share" => "Share","Share Tech" => "Share+Tech","Share Tech Mono" => "Share+Tech+Mono","Shojumaru" => "Shojumaru","Short Stack" => "Short+Stack","Siemreap" => "Siemreap","Sigmar One" => "Sigmar+One","Signika" => "Signika","Signika Negative" => "Signika+Negative","Simonetta" => "Simonetta","Sintony" => "Sintony","Sirin Stencil" => "Sirin+Stencil","Six Caps" => "Six+Caps","Skranji" => "Skranji","Slackey" => "Slackey","Smokum" => "Smokum","Smythe" => "Smythe","Sniglet" => "Sniglet","Snippet" => "Snippet","Snowburst One" => "Snowburst+One","Sofadi One" => "Sofadi+One","Sofia" => "Sofia","Sonsie One" => "Sonsie+One","Sorts Mill Goudy" => "Sorts+Mill+Goudy","Source Code Pro" => "Source+Code+Pro","Source Sans Pro" => "Source+Sans+Pro","Special Elite" => "Special+Elite","Spicy Rice" => "Spicy+Rice","Spinnaker" => "Spinnaker","Spirax" => "Spirax","Squada One" => "Squada+One","Stalemate" => "Stalemate","Stalinist One" => "Stalinist+One","Stardos Stencil" => "Stardos+Stencil","Stint Ultra Condensed" => "Stint+Ultra+Condensed","Stint Ultra Expanded" => "Stint+Ultra+Expanded","Stoke" => "Stoke","Strait" => "Strait","Sue Ellen Francisco" => "Sue+Ellen+Francisco","Sunshiney" => "Sunshiney","Supermercado One" => "Supermercado+One","Suwannaphum" => "Suwannaphum","Swanky and Moo Moo" => "Swanky+and+Moo+Moo","Syncopate" => "Syncopate","Tangerine" => "Tangerine","Taprom" => "Taprom","Tauri" => "Tauri","Telex" => "Telex","Tenor Sans" => "Tenor+Sans","Text Me One" => "Text+Me+One","The Girl Next Door" => "The+Girl+Next+Door","Tienne" => "Tienne","Tinos" => "Tinos","Titan One" => "Titan+One","Titillium Web" => "Titillium+Web","Trade Winds" => "Trade+Winds","Trocchi" => "Trocchi","Trochut" => "Trochut","Trykker" => "Trykker","Tulpen One" => "Tulpen+One","Ubuntu" => "Ubuntu","Ubuntu Condensed" => "Ubuntu+Condensed","Ubuntu Mono" => "Ubuntu+Mono","Ultra" => "Ultra","Uncial Antiqua" => "Uncial+Antiqua","Underdog" => "Underdog","Unica One" => "Unica+One","UnifrakturCook" => "UnifrakturCook","UnifrakturMaguntia" => "UnifrakturMaguntia","Unkempt" => "Unkempt","Unlock" => "Unlock","Unna" => "Unna","VT323" => "VT323","Vampiro One" => "Vampiro+One","Varela" => "Varela","Varela Round" => "Varela+Round","Vast Shadow" => "Vast+Shadow","Vibur" => "Vibur","Vidaloka" => "Vidaloka","Viga" => "Viga","Voces" => "Voces","Volkhov" => "Volkhov","Vollkorn" => "Vollkorn","Voltaire" => "Voltaire","Waiting for the Sunrise" => "Waiting+for+the+Sunrise","Wallpoet" => "Wallpoet","Walter Turncoat" => "Walter+Turncoat","Warnes" => "Warnes","Wellfleet" => "Wellfleet","Wendy One" => "Wendy+One","Wire One" => "Wire+One","Yanone Kaffeesatz" => "Yanone+Kaffeesatz","Yellowtail" => "Yellowtail","Yeseva One" => "Yeseva+One","Yesteryear" => "Yesteryear","Zeyada" => "Zeyada"
				)
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Font Size","revera"),
            "param_name" => "size",
            "value" =>"48px",
            "description" => __("e.g. 48px or 3em","revera")
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Color","revera"),
            "param_name" => "color",
            "value" => '#000000',
            "description" => __("Choose text color","revera")
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Margin","revera"),
            "param_name" => "margin",
            "value" =>"",
            "description" => __("Please enter the margin. e.g. 5em or 10px 20px","revera")
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Text Align","revera"),
            "param_name" => "textalign",
            "value" => array(
				'Left' => 'left',
				'Right' => 'right',
				'Center' => 'center',
				'Justify' => 'justify',
			)
		)
      )
   ));
}


//-------------------------------------- 
// Google Map
//-------------------------------------- 
function revera_vc_tt_gmap_shortcode() {
   vc_map( array(
      "name" => __("Google Map","revera"),
      "base" => "tt_gmap",
	  "icon" => "tt-gmap",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "textfield",
            "heading" => __("Lat","revera"),
            "param_name" => "lat"
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Long","revera"),
            "param_name" => "long"
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Width","revera"),
            "param_name" => "widht"
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Height","revera"),
            "param_name" => "height"
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Address","revera"),
            "param_name" => "address"
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Zoom","revera"),
            "param_name" => "zoom",
            "value" => array(
				'0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19'
			)
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Style","revera"),
            "param_name" => "style",
            "value" => array(
				__('Full', 'revera')=>'full',
				__('Standard', 'revera')=>'standard'  
			)
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Map Type","revera"),
            "param_name" => "maptype",
            "value" => array(
				'ROADMAP' => 'ROADMAP',
				'SATELLITE' => 'SATELLITE',
				'HYBRID' => 'HYBRID',
				'TERRAIN' => 'TERRAIN'
			)
         ),
		 array(
            "type" => "attach_image",
            "heading" => __("Marker Image","revera"),
            "param_name" => "markerimage",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Info Window Text","revera"),
            "param_name" => "infowindow"
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Show Info Window Open by Default?","revera"),
            "param_name" => "infowindowdefault",
            "value" => array(
				'Yes' => 'yes',
				'No' => 'no'
			)
		),
		 array(
            "type" => "dropdown",
            "heading" => __("Hide Map Controls?","revera"),
            "param_name" => "hidecontrols",
            "value" => array(
				'No' => 'no',
				'Yes' => 'yes'
			)
		),
		 array(
            "type" => "colorpicker",
            "heading" => __("Color Scheme","revera"),
            "param_name" => "color",
            "value" => ''
         ),
		 array(
            "type" => "checkbox",
            "heading" => __("Grayscale Effect?","revera"),
            "param_name" => "grayscale",
            "value" => array( __( "Yes, please", "revera" ) => 'yes' )
         )
      )
   ));
}


//-------------------------------------- 
// Social Icons 
//-------------------------------------- 
function revera_vc_tt_social_shortcode() {
   vc_map( array(
      "name" => __("Social Icons","revera"),
      "base" => "tt_social",
	  "icon" => "tt-social",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "dropdown",
            "holder" => "div",
            "heading" => __("Style","revera"),
            "param_name" => "style",
            "value" => array(
				'Square + Border' => 'square',
				'Square' => 'square_wb',
				'Circular + Border' => 'circular',
				'Circular' => 'circular_wb',
				'Colorful Square' =>'colorful_square' ,
				'Colorful Circular' => 'colorful_circular'
			),
            "description" => __("Please Select the Style of Social Icons","revera")
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Target","revera"),
            "param_name" => "target",
            "value" => array(
				'Current Window (_self)'=>'_self',
				'New Window (_blank)'=>'_blank'
				),
            "description" => __("Link open in New window or Current window","revera")
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Tooltip","revera"),
            "param_name" => "tooltip",
            "value" => array(
				'No Tooltip'=>'notip',
				'Top Tooltip'=>'toptip',
				'Right Tooltip'=>'righttip',
				'Bottom Tooltip'=>'bottomtip',
				'Left Tooltip'=>'lefttip'
			)
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Facebook URL","revera"),
            "param_name" => "facebook",
            "value" => "",
			"description" => __("e.g. http://www.facebook.com/envato (with http://)","revera")
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Twitter URL","revera"),
            "param_name" => "twitter",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Google+","revera"),
            "param_name" => "google_plus",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Dribbble","revera"),
            "param_name" => "dribbble",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("RSS","revera"),
            "param_name" => "rss",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Flickr","revera"),
            "param_name" => "flickr",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Linkedin","revera"),
            "param_name" => "linkedin",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Pinterest","revera"),
            "param_name" => "pinterest",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Instagram","revera"),
            "param_name" => "instagram",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Skype","revera"),
            "param_name" => "skype",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Tumblr","revera"),
            "param_name" => "tumblr",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("YouTube","revera"),
            "param_name" => "youtube",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Xing","revera"),
            "param_name" => "xing",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Dropbox","revera"),
            "param_name" => "dropbox",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("StackExchange","revera"),
            "param_name" => "stackexchange",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("BitBucket","revera"),
            "param_name" => "bitbucket",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("Weibo","revera"),
            "param_name" => "weibo",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("GitHub","revera"),
            "param_name" => "github",
            "value" => ""
         ),
		 array(
            "type" => "textfield",
            "heading" => __("FourSquare","revera"),
            "param_name" => "foursquare",
            "value" => ""
         )
      )
   ));
}





//-------------------------------------- 
// Message Box
//-------------------------------------- 
function revera_vc_tt_message_shortcode() {
   vc_map( array(
      "name" => __("Message Box","revera"),
      "base" => "tt_message",
	  "icon" => "tt-message",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "dropdown",
            "holder" => "div",
            "heading" => __("Type","revera"),
            "param_name" => "type",
            "value" => array(
				'Success' =>'success',
				'Info' =>'info',
				'Error' =>'error',
				'Warning' =>'warning'
			)
         ),array(
            "type" => "checkbox",
            "heading" => __("Show Icon?","revera"),
            "param_name" => "icon",
            "value" => array( __( "Yes, please", "revera" ) => true )
         ),array(
            "type" => "checkbox",
            "heading" => __("Show close button?","revera"),
            "param_name" => "close_button",
            "value" => array( __( "Yes, please", "revera" ) => true )
         ),array(
            "type" => "textfield",
            "holder" => "",
            "heading" => __("Message","revera"),
            "param_name" => "message",
            "value" => __("Your message here!","revera")
         )
      )
   ));
}




//-------------------------------------- 
// Toggle
//-------------------------------------- 
function revera_vc_tt_toggle_shortcode() {
   vc_map( array(
      "name" => __("Toggle","revera"),
      "base" => "tt_toggle",
	  "icon" => "tt-toggle",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "textfield",
            "heading" => __("Title","revera"),
            "param_name" => "title"
         ),
		 array(
            "type" => "checkbox",
            "heading" => __("Open?","revera"),
            "param_name" => "open",
            "value" => array( __( "Yes, please", "revera" ) => 'yes' )
         ),
		 array(
            "type" => "textarea_html",
            "heading" => __("Content","revera"),
            "param_name" => "content",
            "value" => __("Lorem ipsum dolor sit...","revera"),
            "description" => __("Enter your content.","revera")
         ) 
      )
   ));
}




//-------------------------------------- 
// Clients Carousel
//-------------------------------------- 
function revera_vc_tt_clients_shortcode() {
   vc_map( array(
      "name" => __("Clients Carousel","revera"),
      "base" => "tt_clients",
	  "icon" => "tt-clients",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "dropdown",
            "heading" => __("Columns","revera"),
            "param_name" => "columns",
            "value" => array(1,2,3,4,5,6),
			'description' => __('How many columns would you like?', 'revera'),
         ),array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("Title","revera"),
            "param_name" => "title",
            "value" => ""
         ),array(
            "type" => "textfield",
            "heading" => __("Category","revera"),
            "param_name" => "category",
            "description" => __('Please enter the testimonial category slug for filtering the result. (optional)', 'revera')
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Next and Previuse Icon Position","revera"),
            "param_name" => "nav",
            "value" => array(
				"Right and Left Side" => "side",
				"Top in Title Bar" => "titlebar",
				"Turn Off" => "off"
			),
			'dependency' => array(
				'element' => 'title',
				'not_empty' => true
			)
         )
      )
   ));
}










//-------------------------------------- 
// Recent Posts + Carousel
//-------------------------------------- 
function revera_vc_tt_recentposts_shortcode() {
   vc_map( array(
      "name" => __("Recent Posts & Carousel","revera"),
      "base" => "tt_recentposts",
	  "icon" => "tt-recentposts",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("Title","revera"),
            "param_name" => "title",
            "value" => __("Recent Posts","revera")
         ),array(
            "type" => "dropdown",
            "heading" => __("Columns","revera"),
            "param_name" => "columns",
            "value" => array(1,2,3,4),
			'description' => __('How many columns would you like?', 'revera'),
         ),array(
            "type" => "dropdown",
            "heading" => __("Number of Items","revera"),
            "param_name" => "items",
            "value" => array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40)
         ),array(
            "type" => "textfield",
            "holder" => "",
            "heading" => __("Category","revera"),
            "param_name" => "category",
            "description" => __('Please enter the Category slug for filtering the result. (optional)', 'revera')
         ),
		 array(
            "type" => "checkbox",
            "heading" => __("Turn it to Carousel?","revera"),
            "param_name" => "carousel",
            "value" => array( __( "Yes, please", "revera" ) => 'true' )
         ),
		 array(
            "type" => "dropdown",
            "heading" => __("Next and Previuse Icon Position","revera"),
            "param_name" => "nav",
            "value" => array(
				"Right and Left Side" => "side",
				"Top in Title Bar" => "titlebar",
				"Turn Off" => "off"
			),
			'dependency' => array(
				'element' => 'carousel',
				'not_empty' => true
			)
         )
		 
      )
   ));
}



//-------------------------------------- 
// News Ticker
//-------------------------------------- 
function revera_vc_tt_newsticker_shortcode() {
   vc_map( array(
      "name" => __("News Ticker","revera"),
      "base" => "tt_newsticker",
	  "icon" => "tt-newsticker",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("Title","revera"),
            "param_name" => "title",
            "value" => __("Breaking News","revera")
         ),array(
            "type" => "dropdown",
            "heading" => __("Number of Items","revera"),
            "param_name" => "items",
            "value" => array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20)
         ),array(
            "type" => "textfield",
            "holder" => "",
            "heading" => __("Category","revera"),
            "param_name" => "category",
            "description" => __('Please enter the Category slug for filtering the result. (optional)', 'revera')
         ),
		 array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'revera' ),
			'param_name' => 'orderby',
			'value' => array(
				__( 'Date', 'revera' ) => 'date',
				__( 'ID', 'revera' ) => 'ID',
				__( 'Author', 'revera' ) => 'author',
				__( 'Title', 'revera' ) => 'title',
				__( 'Modified', 'revera' ) => 'modified',
				__( 'Random', 'revera' ) => 'rand',
				__( 'Comment count', 'revera' ) => 'comment_count',
				__( 'Menu order', 'revera' ) => 'menu_order'
			),
			'description' => sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'revera' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order way', 'revera' ),
			'param_name' => 'order',
			'value' => array(
				__( 'Descending', 'revera' ) => 'DESC',
				__( 'Ascending', 'revera' ) => 'ASC'
			),
			'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'revera' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Title Color","revera"),
            "param_name" => "title_color",
            "value" => '#CC0000',
            "description" => __("Choose title color","revera")
         ),
		 array(
            "type" => "checkbox",
            "heading" => __("Blinking Title?","revera"),
            "param_name" => "blink",
            "value" => array( __( "Yes, please", "revera" ) => 'true' )
         )
      )
   ));
}




//-------------------------------------- 
// Countdown Timer
//-------------------------------------- 
function revera_vc_tt_countdown_shortcode() {
   vc_map( array(
      "name" => __("Countdown Timer","revera"),
      "base" => "tt_countdown",
	  "icon" => "tt-countdown",
      "category" => __('Revera Custom Shortcodes',"revera"),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("Date","revera"),
            "param_name" => "date",
            "value" => "30 December 2015 23:59:59",
			"description"=>__("Please enter your target date like this: 30 December 2015 23:59:59 (Your time must be in future)","revera")
         ),
		 array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'revera' ),
			'param_name' => 'size',
			'value' => array(
				__( 'Small', 'revera' ) => 'small',
				__( 'Medium', 'revera' ) => 'medium',
				__( 'Large', 'revera' ) => 'large',
				__( 'Extra Large', 'revera' ) => 'xlarge'
			)
		),
		 array(
            "type" => "dropdown",
            "heading" => __("Align","revera"),
            "param_name" => "align",
            "value" => array(
				'Left' => 'left',
				'Right' => 'right',
				'Center' => 'center'
			)
		)
      )
   ));
}







?>