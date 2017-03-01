<?php

//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// Shortcode : Section (Parallax)
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

function revera_tt_wrap_shortcode( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'id' => 'section-' . rand(),
		'bg_color'	 => '',
		'border_color'	 => '',
		'image'	 => '',
		'parallax' => '',
		'ratio' => '0.6'
    ), $atts));
	
	
	
	  if($bg_color != '') {
		$return1 = 'background-color:' . $bg_color . ';';
	   } else{
		$return1 = '';
	   }
	
	if($border_color != '') {
		$return2 = 'border-top:solid 1px ' . $border_color . ' !important;border-bottom:solid 1px ' . $border_color . ' !important;';
	   } else{
		$return2 = '';
	   }
	   
	if($image != '') {
		if(is_numeric($image)){$imgsrc = wp_get_attachment_url( $image );}else{$imgsrc= $image;}
		$return3 = 'background-image:url(' . $imgsrc . ') !important;';
	   } else{
		$return3 = '';
	   }
	   
	$return4 = ' style="' .$return1 . $return2 . $return3 .'"';
	
	$return5= '';
	$return6= '';
	if ($parallax=='yes'){
		$return6 = ' data-stellar-background-ratio="'. $ratio .'" ';
		$return5 .= ' parallax ';
		
		wp_enqueue_script('jquery.stellar', get_template_directory_uri() . '/js/lib/jquery.stellar.min.js','jquery','0.6.2',true);
		add_action( 'wp_footer', 'revera_parallax_cutoms_javascript' ,98);
		}
		
	   
	$out = '<div class="section'.$return5.'" ' . $return4 . $return6 . ' id="' . $id . '"  ><div class="row clearfix">' . do_shortcode($content) . '</div></div>';
    return $out;
}

add_shortcode('tt_wrap', 'revera_tt_wrap_shortcode');


function revera_parallax_cutoms_javascript() {
	?>
	<script>
		// Stellar (Parallax)
		jQuery(document).ready(function($) {
			try {
				if( isDesktop ){
					$.stellar({
						horizontalScrolling: false
					});
				}	
			} catch(e){}
		});	
	</script>
	<?php		
}


//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// Shortcode : Title
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function revera_tt_title_shortcode( $atts, $content = null) {
      extract( shortcode_atts( array(
	  'big_sub'=>'' ,
	  'small_sub'=>'' ,
	  'align' => 'center',
      ), $atts ) );
	  
	  $r3 = '';
	  if ($big_sub!=''){$r3 = '<h3>'.$big_sub.'</h3>';}
	  
	  $r4 = '';
	  if ($small_sub!=''){$r4 = '<h4>'.$small_sub.'</h4>';}
	  
	  return '<div class="title '.$align.'"><h2>' . $content . '</h2>'. $r3 . $r4 .'</div>';

}

add_shortcode( 'tt_title', 'revera_tt_title_shortcode' );






//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// Shortcode : Service Box
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

function revera_tt_service_shortcode( $atts, $content = null) {
extract( shortcode_atts( array(
	'title' 	=> 'Your Title',
	'subtitle' 	=> '',
	'icon'	=>	'',
	'icon_pos' 	=> 'top',
	'image'	=>	'',
	'button_text'	=> '',
	'url' => '',
	'target' => '_self'
	), $atts ) );
      
	  
	$return1 ='';
	if($subtitle!=''){
		$return1 = '<p class="serif italic text-light mb0">'. $subtitle.'</p>';
		}
	
	
	$return2 = '';
	if($image != '') {
		if(is_numeric($image)){$imgsrc = wp_get_attachment_url( $image );}else{$imgsrc= $image;}
		$return2 = '<img src="'. $imgsrc .'" class="service-icon" />';
	}elseif ($icon != ''){
		$return2 = '<i class="fa fa-'.$icon.'"></i>';
	}
	
	$tr = '';
	if ($target !='_self'){$tr = ' target="_blank" ';}
	
	$btn='';
	if($button_text !=''){
	  $btn ='<a href="'.$url.'"' . $tr . ' class="read-more">'.$button_text.'</a>';
	}
	
	
	if ($icon_pos=='top'){
	  
	  return '<div class="service-item grid-mb">'.$return2.'
			<h3>'.$title.'</h3>
			'.$return1.'
			<hr class="small">
			<p>'.$content.'</p>
			'.$btn.'
		</div>';
	  
	}else{
		return '<div class="icon-list grid-mb">'.$return2.'
			<div class="il-text">
			<h3>'.$title.'</h3>
			'.$return1.'
			<hr class="small">
			<p>'.$content.'</p>
			'.$btn.'
		</div></div>';  
	}
	

}

add_shortcode('tt_service', 'revera_tt_service_shortcode');



//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// Shortcode : Process
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

function revera_tt_process_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'width'      => 'twelve',
		'id' => 'process-' . rand()
    ), $atts));
	
	global $themetor_process_str, $themetor_process_str_index, $themetor_process_id;
	$themetor_process_id = $id;
	$themetor_process_str_index = 0;
	 
	$themetor_process_str = '<div class="'.$width.' col center process-steps"><ul id="'. $id .'" class="process-slider">
			<!-- Process step -->
			</ul></div></div>
			<div class="row"><div class="'.$width.' center col process-controls process-icons">
			<!-- Process icon -->
			</div>';
			
	do_shortcode($content);
	
	//add_action( 'wp_footer', 'revera_process_cutoms_javascript' ,99);
	revera_process_cutoms_javascript();
	
	return $themetor_process_str;

}

function revera_tt_process_item_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'number'      => '1',
        'title'      => '',
		'icon' => '',
		'image' =>''
    ), $atts));
	
	global $themetor_process_str ;
	global $themetor_process_str_index ;
	
    $ph1 = '<!-- Process step -->';
	$ph2 = '<!-- Process icon -->';
	
	$str1 = '<li>
				<p class="serif digit">'.$number.'</p>
				<h3 class="uber">'.$title.'</h3>
				<p class="h2 responsive-txt serif text-light">'.$content.'</p>
			</li>'.$ph1;
	
	$return = '';
	if($image != '') {
		if(is_numeric($image)){$imgsrc = wp_get_attachment_url( $image );}else{$imgsrc= $image;}
		$return = '<img src="'. $imgsrc .'" class="process-img" />';
	}elseif ($icon != ''){
		$return = '<i class="fa fa-'.$icon.'"></i>';
	}
	$str2 = '<a data-slide-index="'.$themetor_process_str_index.'" href="">'.$return.'</a>'.$ph2;
	
	$themetor_process_str_index++;
	
	$themetor_process_str = str_replace($ph1,$str1,$themetor_process_str);
	$themetor_process_str = str_replace($ph2,$str2,$themetor_process_str);
	

}

add_shortcode('tt_process', 'revera_tt_process_shortcode');
add_shortcode('tt_process_item', 'revera_tt_process_item_shortcode');

function revera_process_cutoms_javascript() {
	global $themetor_process_id;
	?>
	<script>
		// Process Code 
		jQuery(document).ready(function($) {
			try {
				$('#<?php echo esc_js($themetor_process_id); ?>').bxSlider({
					mode: 'horizontal',
					adaptiveHeight: true,
					controls: false,
					pagerCustom: '.process-controls',
					slideWidth: 270
				});	
			} catch(e){}
		});	
	</script>
	<?php		
}





//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// Shortcode : HR Line (divider)
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

function revera_tt_divider_shortcode( $atts, $content = null) {
extract( shortcode_atts( array(
		'color'      => '#eeeeee',
	), $atts ) );

	$r2 = '';
	if ($color!='#eee'){
		$r2 = 'style="background-color:'.$color.';"';
		}
	
	
	return '<hr class="divider" ' . $r2 . '>';

	
}

add_shortcode('tt_divider', 'revera_tt_divider_shortcode');




//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// Shortcode : Portfolio
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

function revera_tt_portfolio_shortcode( $atts, $content = null)
{
	extract(shortcode_atts(array(
		'columns' =>'3',
		'items' => '6',
		'category' => '',
		'filter' =>'false',
		'orderby' => 'date',
		'order' => 'DESC',
    ), $atts));
	
	global $thdglkr_pc_col,$thdglkr_pc_items,$thdglkr_pc_cat,$thdglkr_pc_filter,$thdglkr_pc_orderby,$thdglkr_pc_order;
	$thdglkr_pc_col = $columns;
	$thdglkr_pc_items = $items;
	$thdglkr_pc_cat = $category;
	$thdglkr_pc_filter = $filter;
	$thdglkr_pc_orderby = $orderby;
	$thdglkr_pc_order = $order;
	
	$file_pc = locate_template('functions/portfolio.php');


    ob_start();
    include $file_pc;
    $template_pc = ob_get_contents();
    ob_end_clean();
    return $template_pc;

	
}

add_shortcode('tt_portfolio', 'revera_tt_portfolio_shortcode');



//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// Shortcode : Button
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

add_shortcode('tt_button', 'revera_tt_button_shortcode');

function revera_tt_button_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
			'style' => 'solid',
			'button_default_color'	=> '',
	  		'button_custom_color'	=> '',
			'align' =>'center',
			'url' => '#',
			'text' => '',
			'target' => '_self',
			'icon' => ''
			
		), $atts));
	
		$str_style='';
	    if ($style=='solid' || $style=='solid-square'){
			$str_class =' color';
			if($button_default_color=='customcolor'){
				$str_style='style="background-color:'.$button_custom_color.';"';
			}
		}else{
			$str_class =' outline';
			if($button_default_color=='customcolor'){
				$str_style='style="border-color:'.$button_custom_color.';color:'.$button_custom_color.';"';
			}
		}
		  
		$return_icon ='';
		if ($icon!='') {
			$return_icon ='<i class="fa fa-'.$icon.'" ></i> ';
			}
	  
	  
		return "<a class='btn " . $str_class . " " . $button_default_color . "' href='".$url."' target='" . $target . "' " . $str_style . ">" . $return_icon . $text . "</a>";
}



//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// Shortcode : Slider
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function revera_tt_slider_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'mode'=>'fade',
		'speed'=>'500',
		'controls'=>'true',
		'auto'=>'false',
		'pause'=>'4000',
		'images' =>'',
		'image_size' =>'img1080n'
    ), $atts));
	
	global $themetor_slider_id,$themetor_slider_mode,$themetor_slider_speed,$themetor_slider_controls,$themetor_slider_auto,$themetor_slider_pause;
	$themetor_slider_id = 'slider_'.rand();
	$themetor_slider_mode=$mode;
	$themetor_slider_speed=$speed;
	$themetor_slider_controls=$controls;
	$themetor_slider_auto=$auto;
	$themetor_slider_pause=$pause;
	
	$str = '<div class="twelve col tt_slider"><ul class="" id="'.$themetor_slider_id.'">';
	
	$imgs = explode(',',$images);
	foreach ($imgs as $img){
		$img_attr=wp_get_attachment_image_src( $img , $image_size);
		$str .='<li><img src="'.$img_attr[0].'" alt="" class="responsive-img" /></li>';
	 }
	
	$str .= '</ul></div>';
	
	//add_action( 'wp_footer', 'revera_slider_cutoms_javascript' ,99);
	revera_slider_cutoms_javascript();
	return $str;
	

}

add_shortcode('tt_slider', 'revera_tt_slider_shortcode');


function revera_slider_cutoms_javascript() {
	global $themetor_slider_id,$themetor_slider_mode,$themetor_slider_speed,$themetor_slider_controls,$themetor_slider_auto,$themetor_slider_pause;
	?>
	<script>
		// Slider Code
		jQuery(document).ready(function($) {
			try {
				$('#<?php echo esc_js($themetor_slider_id); ?>').bxSlider({
					mode: '<?php echo esc_js($themetor_slider_mode); ?>',
					pager: true,
					controls: <?php if ($themetor_slider_controls==1){echo 'true';}else{echo 'false';}; ?>,
					speed:<?php echo esc_js($themetor_slider_speed); ?>,
					auto:<?php if ($themetor_slider_auto==1){echo 'true';}else{echo 'false';}; ?>,
					pause:<?php echo esc_js($themetor_slider_pause); ?>,
					nextText: '<i class="fa fa-long-arrow-right"></i>',
					prevText: '<i class="fa fa-long-arrow-left"></i>'
				});	
			} catch(e){}
		});	
	</script>
	<?php		
}



//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// Shortcode : Members Carousel
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function revera_tt_members_shortcode($atts, $content=null) {
	
	extract( shortcode_atts( array(
      'columns' 	=> '3'
      ), $atts ) );
	  
	global $themetor_members_id,$themetor_members_col;
	$themetor_members_id = 'members_' .rand();
	$themetor_members_col = $columns;
	
	//add_action( 'wp_footer', 'revera_members_cutoms_javascript' ,99);
	revera_members_cutoms_javascript();
	
	return '<div class="row center-small"><div id="'.$themetor_members_id.'" class="owlcarousel employee-slider grab">' . do_shortcode($content) . '</div></div>';

}

function revera_tt_members_item_shortcode($atts, $content=null) {

	extract( shortcode_atts( array(
      'image' 	=> '',
      'name' 	=> '',
      'role'	=> '',
	  'facebook' => '',
      'twitter' => '',
      'linkedin' => '',
	  'google_plus' => '',
	  'skype' => '',
	  'dribbble' => '',
	  'flickr' => '',
	  'instagram' => '',
      'email' => '',
	  'grayscale' =>'yes'
      ), $atts ) );

			
	$str = '<div class="employee grid-ms">
				<img src="'.wp_get_attachment_url( $image ).'" alt="'.$name.'" class="responsive-img">
				<h3>'.$name.'</h3>
				<p class="serif italic text-light mb0">'.$role.'</p>
				<hr class="small">
				<p>'.$content.'</p>';
				
	if($twitter != '') {
		$str .= '<p class="mb0 employee-icon"><a href="'.$twitter.'"><i class="fa fa-twitter"></i>'.__('Twitter','revera').'</a></p>';
	}
	 
	if($facebook != '') {
		$str .= '<p class="mb0 employee-icon"><a href="'.$facebook.'"><i class="fa fa-facebook"></i>'.__('Facebook','revera').'</a></p>';
	}
	
	if( $linkedin != '') {
		$str .= '<p class="mb0 employee-icon"><a href="'.$linkedin.'"><i class="fa fa-linkedin"></i>'.__('LinkedIn','revera').'</a></p>';
	}
	
	if($google_plus != '') {
		$str .= '<p class="mb0 employee-icon"><a href="'.$google_plus.'"><i class="fa fa-google-plus"></i>'.__('Google+','revera').'</a></p>';
	}
	
	if($dribbble != '') {
		$str .= '<p class="mb0 employee-icon"><a href="'.$dribbble.'"><i class="fa fa-dribbble"></i>'.__('Dribbble','revera').'</a></p>';
	}
	
	if($skype != '') {
		$str .= '<p class="mb0 employee-icon"><a href="'.$skype.'"><i class="fa fa-skype"></i>'.__('Skype','revera').'</a></p>';
	}
	
	if($flickr != '') {
		$str .= '<p class="mb0 employee-icon"><a href="'.$flickr.'"><i class="fa fa-flickr"></i>'.__('Flickr','revera').'</a></p>';
	}
	
	if($instagram != '') {
		$str .= '<p class="mb0 employee-icon"><a href="'.$instagram.'"><i class="fa fa-instagram"></i>'.__('Instagram','revera').'</a></p>';
	}

	if($email != '') {
		$str .= '<p class="mb0 employee-icon"><a href="mailto:'.$email.'"><i class="fa fa-envelope-o"></i>'.$email.'</a></p>';
	}     
  
	$str .= '</div>';
	
	return $str;
	
}

add_shortcode('tt_members', 'revera_tt_members_shortcode');
add_shortcode('tt_members_item', 'revera_tt_members_item_shortcode');


function revera_members_cutoms_javascript() {
	global $themetor_members_id,$themetor_members_col;
	?>
	<script>
		// Members Code 
		jQuery(document).ready(function($) {
			try {
				$("#<?php echo esc_js($themetor_members_id); ?>").owlCarousel({
					pagination: false,
					navigation: false,
					items: <?php echo esc_js($themetor_members_col); ?>,
					itemsDesktop: [1024,<?php echo esc_js($themetor_members_col); ?>],
					itemsTablet: [768,2],
					itemsMobile: [321,1]
				});
			} catch(e){}
		});	
	</script>
	<?php		
}

//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// Shortcode : Testimonial
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function revera_tt_testimonial_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'width'      => 'twelve',
		'id' => 'testimonial-' . rand()
    ), $atts));
	
	global $themetor_testimonial_str, $themetor_testimonial_str_index, $themetor_testimonial_id;
	$themetor_testimonial_id = $id;
	$themetor_testimonial_str_index = 0;
	 
	
	$themetor_testimonial_str = '<div class="row"><div class="'.$width.' col center"><ul id="'. $id .'" class="quote-slider quotes">
							<!-- testimonial step -->
							</ul></div></div>
							<div class="row">
							<div class="twelve col quote-controls quote-avatars">
							<!-- testimonial image -->
							</div></div>';
	
	do_shortcode($content);
	
	//add_action( 'wp_footer', 'revera_testimonial_cutoms_javascript' ,99);
	revera_testimonial_cutoms_javascript();
	
	return $themetor_testimonial_str;

}

function revera_tt_testimonial_item_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'name'      => '',
		'role' => '',
		'image' =>''
    ), $atts));
	
	global $themetor_testimonial_str ;
	global $themetor_testimonial_str_index ;
	
    $ph1 = '<!-- testimonial step -->';
	$ph2 = '<!-- testimonial image -->';
	
	$str1 = '<li>
				<q class="h1 responsive-txt serif italic text-light">'.$content.'</q>
				<p><b>'.$name.'</b>'.$role.'</p>
			</li>'.$ph1;
	
	$return = '';
	if($image != '') {
		if(is_numeric($image)){$imgsrc = wp_get_attachment_url( $image );}else{$imgsrc= $image;}
		$return = '<img src="'. $imgsrc .'" />';
	}
	$str2 = '<a data-slide-index="'.$themetor_testimonial_str_index.'" href="">'.$return.'</a>'.$ph2;
	
	$themetor_testimonial_str_index++;
	
	$themetor_testimonial_str = str_replace($ph1,$str1,$themetor_testimonial_str);
	$themetor_testimonial_str = str_replace($ph2,$str2,$themetor_testimonial_str);
	

}

add_shortcode('tt_testimonial', 'revera_tt_testimonial_shortcode');
add_shortcode('tt_testimonial_item', 'revera_tt_testimonial_item_shortcode');

function revera_testimonial_cutoms_javascript() {
	global $themetor_testimonial_id;
	?>
	<script>
		// Testimonial Code 
		jQuery(document).ready(function($) {
			try {
				$('#<?php echo esc_js($themetor_testimonial_id); ?>').bxSlider({
					mode: 'horizontal',
					adaptiveHeight: true,
					controls: false,
					pagerCustom: '.quote-controls',
					auto:false
				});
			} catch(e){}
		});	
	</script>
	<?php		
}




function revera_tt_pricingtable_item_shortcode($atts, $content=null) {

	extract(shortcode_atts(array(
			'title' => '',
			'price' => '',
			'currency' => '',
			'period' => '',
			'style' => 'solid',
			'button_default_color'	=> '',
	  		'button_custom_color'	=> '',
			'url' => '#',
			'text' => '',
			'target' => '_self',
			'icon' => ''
			
		), $atts));
	
	
	$str_btn = do_shortcode('[tt_button style="'.$style.'" button_default_color="'.$button_default_color.'" button_custom_color="'.$button_custom_color.'" url="'.$url.'" text="'.$text.'" target="'.$target.'" icon="'.$icon.'"]');
			
	$str = '<div class="pricing-box">
				<h3>'.$title.'</h3>
				<div class="price">
					<p><sup>'.$currency.'</sup>'.$price.'<sub>'.$period.'</sub></p>
				</div>
				<hr>
				<ul>
					<li><strong>10</strong> Options</li>
					<li><strong>Free</strong> Soda</li>
					<li><strong>100 GB</strong> Data</li>
				</ul>
				'.$str_btn.'
			</div>';

	
	return $str;
	
}

add_shortcode('tt_pricingtable_item', 'revera_tt_pricingtable_item_shortcode');


?>