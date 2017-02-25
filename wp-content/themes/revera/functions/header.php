<?php

	$tt_title = $tt_subtitle = $tt_ttl_type = '';
	
	if (is_tag()){
									
	$tt_title = __('Tag search for: ','revera');
	$tt_subtitle = single_tag_title('',FALSE);
	
	} elseif (is_search()){
		
		$tt_title = __('Search for: ','revera');
		$tt_subtitle = get_search_query();
		
	} elseif (is_category()){

		$tt_title = __('Category: ','revera');
		$tt_subtitle = single_cat_title('', false);
		
	} elseif (is_day()){

		$tt_title = __('Archive for: ','revera');
		$tt_subtitle = get_the_time('d') . ' / ' . get_the_time('F') . ' / ' . get_the_time('Y');
		
	} elseif (is_month()){

		$tt_title = __('Archive for: ','revera');
		$tt_subtitle = get_the_time('F'). ' / ' . get_the_time('Y');
		
	} elseif (is_year()){

		$tt_title = __('Archive for: ','revera');
		$tt_subtitle = get_the_time('Y');
		
	} elseif (is_author()){
		
		global $author;
		$userdata = get_userdata($author);
		$tt_title = __('Articles posted by: ','revera');
		$tt_subtitle = $userdata->display_name;
	
	} elseif (is_singular('portfolio')){
		
		$tt_ttl_type= 'portfolio';
		$tt_title = get_the_title();
		$tt_subtitle = '';	
			
	} elseif (is_singular('post')){
		
		$tt_ttl_type= 'post';
		$tt_title = get_the_title();
		$tt_subtitle = '';
		
	} else {
		
	if (rwmb_meta('revera_title')){
		$header_type = rwmb_meta('revera_title');
		$header_cat = rwmb_meta('revera_header_cat');
	}else{
		$header_type = 'cpmb_title';
		$header_cat = '';	

	}
	

	if ($header_type !='cpmb_no' && $header_type !='cpmb_title'){
		
		
		//Query ------------------------------------
		
		$orderby_posts = _option( 'orderby_header_slide', 'menu_order' );
		$order_posts = _option( 'order_header_slide', 'ASC' );
		
		$slide_args = array( 
			'post_type' => 'slide',
			'posts_per_page' => 10,
			'paged' => 1,
			'order' => $order_posts,
			'orderby' => $orderby_posts,
		);
		
		if ($header_cat !=''){
			$slide_args['tax_query'][] = array(
						'taxonomy' 	=> 'header_types',
						'terms' 	=> $header_cat
			);
		}	
		
		$wp_query = new WP_Query();
		$wp_query->query( $slide_args );
		$str = '';
		
		if( $wp_query->have_posts() ) :  
		while( $wp_query->have_posts() ) : $wp_query->the_post(); 
				 		
			$slide_style=get_post_meta($post->ID, 'revera_slide_style', true);
			$slide_title=get_post_meta($post->ID, 'revera_slide_title', true);
			$slide_subtitle=get_post_meta($post->ID, 'revera_slide_subtitle', true);
			$slide_bg_color=get_post_meta($post->ID, 'revera_slide_bg_color', true);
			$slide_button1_text=get_post_meta($post->ID, 'revera_slide_button1_text', true);
			$slide_button1_style=get_post_meta($post->ID, 'revera_slide_button1_style', true);
			$slide_button1_color=get_post_meta($post->ID, 'revera_slide_button1_color', true);
			$slide_button1_link=get_post_meta($post->ID, 'revera_slide_button1_link', true);
			$slide_button1_link_type=get_post_meta($post->ID, 'revera_slide_button1_link_type', true);
			$slide_button2_text=get_post_meta($post->ID, 'revera_slide_button2_text', true);
			$slide_button2_style=get_post_meta($post->ID, 'revera_slide_button2_style', true);
			$slide_button2_color=get_post_meta($post->ID, 'revera_slide_button2_color', true);
			$slide_button2_link=get_post_meta($post->ID, 'revera_slide_button2_link', true);
			$slide_button2_link_type=get_post_meta($post->ID, 'revera_slide_button2_link_type', true);
			$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'img1600n'); 
			$text_color = 'text-white';
			if ($slide_style=='dark'){$text_color = 'text-dark';}
			
			// Switch Header Types
			switch ($header_type) {
				
				case 'cpmb_single_slide':
				
				$bg_img='';
				if ($image[0]){$bg_img='style="background-image:url('.$image[0].');"';}else{$bg_img='style="background-color:'.$slide_bg_color.';"';}
				
				?>
				<div id="home" class="home">
					<div class="header bg-img fixed" <?php echo themetor_sanitize($bg_img); ?> >
				
						<div class="header-container bigtext <?php echo esc_attr($text_color); ?>">
							<h1><?php echo esc_html($slide_title); ?></h1>
							<?php if($slide_subtitle!=''){ ?>
                            <p class="h2 responsive-txt serif italic mb0"><?php echo esc_html($slide_subtitle); ?></p>
                            <?php } ?>
							
							<?php
								if ($slide_button1_text!=''){
									echo themetor_get_button($slide_button1_text,$slide_button1_style,$slide_button1_color,$slide_button1_link,$slide_button1_link_type,$slide_style);
								}
								
								if ($slide_button2_text!=''){
									echo themetor_get_button($slide_button2_text,$slide_button2_style,$slide_button2_color,$slide_button2_link,$slide_button2_link_type,$slide_style);
								}
                            ?>	
                            
						</div>
					</div>
				</div>
				<?php
				
				
				break;
				
				
				case 'cpmb_bg_slide':
				?>
                <div id="home" class="home z-fix">


                    <!-- Content -->
                    <div class="header-container bigtext <?php echo esc_attr($text_color); ?>">
                        <h1><?php echo esc_html($slide_title); ?></h1>
                        <?php if($slide_subtitle!=''){ ?>
                            <p class="h2 responsive-txt serif italic mb0"><?php echo esc_html($slide_subtitle); ?></p>
                        <?php } ?>
                        <?php
							if ($slide_button1_text!=''){
								echo themetor_get_button($slide_button1_text,$slide_button1_style,$slide_button1_color,$slide_button1_link,$slide_button1_link_type,$slide_style);
							}
							
							if ($slide_button2_text!=''){
								echo themetor_get_button($slide_button2_text,$slide_button2_style,$slide_button2_color,$slide_button2_link,$slide_button2_link_type,$slide_style);
							}
						?>
                    </div>
            
            
                    <!-- Background slider -->
                    <div class="bg-slider slides">
                    	<ul class="slides-container">
						<?php
							$images = rwmb_meta( 'revera_header_bg_slide', array('type'=>'image','size'=>'img1600n') );
							foreach( $images as $image ) :
								$bg_img='style="background-image:url('.$image['url'].');"';
								echo '<li><div class="header bg-img" '. $bg_img .'></div></li>';
                            endforeach;
						?>
                        </ul>

                    </div>
                </div>
				
				
				<?php
				break;
				
				
				case 'cpmb_slider':

					
					$bg_img='';
					if ($image[0]){$bg_img='style="background-image:url('.$image[0].');"';}else{$bg_img='style="background-color:'.$slide_bg_color.';"';}
					

					$str .='<li><div class="header bg-img " '. $bg_img .'><div class="header-container bigtext '.$text_color.'">
								<h1>'. $slide_title .'</h1><p class="h2 responsive-txt serif italic mb0">'. $slide_subtitle .'</p>';
								
					if ($slide_button1_text!=''){
						$str .= themetor_get_button($slide_button1_text,$slide_button1_style,$slide_button1_color,$slide_button1_link,$slide_button1_link_type,$slide_style);
					}
					
					if ($slide_button2_text!=''){
						$str .= themetor_get_button($slide_button2_text,$slide_button2_style,$slide_button2_color,$slide_button2_link,$slide_button2_link_type,$slide_style);
					}
									
					$str .='</div></div></li>';

				break;
				
				
				case 'cpmb_video':

					
					$bg_img='';
					if ($image[0]){$bg_img='style="background-image:url('.$image[0].');"';}else{$bg_img='style="background-color:'.$slide_bg_color.';"';}

					$slide_video_url=get_post_meta($post->ID, 'revera_slide_video_url', true);
					$slide_video_type=get_post_meta($post->ID, 'revera_slide_video_type', true);
					
					if ($slide_video_type=='bg'){
						
						$str ='<div id="hide-mobile" class="home">
							<div id="before-video" class="header bg-img" '. $bg_img .'>
								<div class="header-container bigtext '.$text_color.'">
									<h1>'. $slide_title .'</h1>
									<p class="h2 responsive-txt serif italic mb0">'. $slide_subtitle .'</p>
									<a id="play-the-video" class="btn-play"><i class="fa fa-play"></i></a>
								</div>
							</div>
							<a id="video" class="player" data-property="{videoURL:\''.$slide_video_url.'\'}"></a>
							<div class="video-controls">
								<i id="pause-the-video" class="fa fa-pause"></i>
								<i id="toggle-volume-video" class="fa fa-volume-up"></i>
							</div>
						</div>
						<div id="show-mobile" class="home">
							<div class="header bg-img" '. $bg_img .'>
								<div class="header-container bigtext '.$text_color.'">
									<h1>'. $slide_title .'</h1>
									<p class="h2 responsive-txt serif italic mb0">'. $slide_subtitle .'</p>
									<a class="popup-iframe btn-play" href="'.$slide_video_url.'"><i class="fa fa-play"></i></a>
								</div>
							</div>
						</div>';
					
						wp_enqueue_script('jquery.ytplayer');
						wp_enqueue_script('jquery.index-video');
						
					}elseif($slide_video_type=='bgauto'){
						
						$btn1 = $btn2 = '';
						if ($slide_button1_text!=''){
							$btn1 = themetor_get_button($slide_button1_text,$slide_button1_style,$slide_button1_color,$slide_button1_link,$slide_button1_link_type,$slide_style);
						}
						
						if ($slide_button2_text!=''){
							$btn2 = themetor_get_button($slide_button2_text,$slide_button2_style,$slide_button2_color,$slide_button2_link,$slide_button2_link_type,$slide_style);
						}
						$str = '<div id="home" class="home">
								<div id="hide-mobile" class="header">
									<div class="header-container bigtext '.$text_color.'">
										<h1>'. $slide_title .'</h1>
										<p class="h2 responsive-txt serif italic mb0">'. $slide_subtitle .'</p>
										'. $btn1 . $btn2 .'
									</div>
								</div>
								<a id="video" class="player" data-property="{videoURL:\''.$slide_video_url.'\'}"></a>
								<div id="show-mobile" class="header bg-img" '. $bg_img .'>
									<div class="header-container bigtext '.$text_color.'">
										<h1>'. $slide_title .'</h1>
										<p class="h2 responsive-txt serif italic mb0">'. $slide_subtitle .'</p>
										'. $btn1 . $btn2 .'
									</div>
								</div>
							</div>';
							
						wp_enqueue_script('jquery.ytplayer');
						wp_enqueue_script('jquery.index-video-autoplay');
					
					}else{
						
					}
					
	
					echo themetor_sanitize($str);

				break;
				
			
			}// End Switch
		
                    
     	endwhile; 
		endif;
		wp_reset_query();

		
		if ($header_type=='cpmb_slider'){
			
			
			?>
            <div id="home" class="home z-fix">
                <div class="bg-content-slider slides">
                    <ul class="slides-container">
						<?php echo themetor_sanitize($str); ?>
                    </ul>

                    
                    <!-- Slides navigation -->
                    <nav class="slides-navigation">
                        <a href="#" class="next"><i class="fa fa-long-arrow-right"></i></a>
                        <a href="#" class="prev"><i class="fa fa-long-arrow-left"></i></a>
                    </nav>
        
        
                </div>
            </div>        
			<?php
			
			}

	} elseif ($header_type=='cpmb_title'){
			$tt_title = get_the_title();
			$tt_subtitle = '';
			$tt_ttl_type = 'page';
	}

}

if ($tt_title!=''){
	
	$bg_img='';
	$tt_arrow = false;
	$title_type = '';
	if ($tt_ttl_type=='post'){
		$title_type = get_post_meta( get_the_ID(), 'revera_post-title', true );
		$tt_arrow = get_post_meta( get_the_ID(), 'revera_post-arrow', true );
	}elseif($tt_ttl_type=='portfolio'){
		$title_type = get_post_meta( get_the_ID(), 'revera_portfolio-title', true );
		$tt_arrow = get_post_meta( get_the_ID(), 'revera_portfolio-arrow', true );
	}elseif($tt_ttl_type=='page'){
		$title_type = _option('pages_title_type','simple_light');
		$tt_arrow = _option('pages_arrow','1');
	}else{
		$title_type = _option('search_title_type','simple_light');
		$tt_arrow = _option('search_arrow','1');
		if (_option('search_title_image','')!=''){
			$bg_img ='style="background-image:url('._option('search_title_image','').');';
			if (_option('search_bg_repeat','stretch')!='stretch'){
				$bg_img .='background-repeat:'._option('search_bg_repeat','stretch').';background-size:auto;background-position: 0 0;';
			}
			$bg_img .='"';
		}
	}
	

	if ($tt_ttl_type =='post' || $tt_ttl_type =='portfolio' || $tt_ttl_type =='page'){
		if ($title_type=='featured_light' || $title_type=='featured_dark' ){			
			if(has_post_thumbnail()){
				$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'img1600n');
				$bg_img='style="background-image:url('.$image[0].');"';
			}
		}
	}
	
	$tt_style = 'single-header-light text-dark';
	if ($title_type=='simple_dark' || $title_type=='featured_dark' ){			
		$tt_style = 'single-header-dark text-white';
	}

	if ($title_type!='notitle'){
	?>
	<!-- Header -->
	<div id="subheader">
		<div class="subheader single-header bg-img fixed <?php echo esc_attr($tt_style);?>" <?php echo themetor_sanitize($bg_img); ?>>
			<div class="header-container">
				<h1 class="bigtext mb0"><?php echo esc_html($tt_title); ?></h1>
				<h3 class="h1 responsive-txt serif italic mb0"><?php echo esc_html($tt_subtitle); ?></h3>
                <?php if($tt_arrow){echo '<a class="scrollto arrow-down" href="#more"><i class="fa fa-long-arrow-down"></i></a>';}; ?>
			</div>

		</div>
	</div>
	<?php
	}
}


function themetor_get_button($slide_button1_text,$slide_button1_style='',$slide_button1_color='',$slide_button1_link='#',$slide_button1_link_type='',$slide_style='light'){
	
	$str_class='btn';
	$str_style='';
	
	if ($slide_button1_style=='solid'){
			$str_class .=' color';
			if($slide_button1_color!=''){
				$str_style='style="background-color:'.$slide_button1_color.';"';
				}
		}else{
			$str_class .=' outline';
			if($slide_button1_color!=''){
				$str_style='style="border-color:'.$slide_button1_color.';color:'.$slide_button1_color.';"';
				}else{
					if ($slide_style=='light'){$str_class .=' light';}else{$str_class .=' black';}
					}
		}
	
	if ($slide_button1_link_type!='url'){$str_class .=' '. $slide_button1_link_type;}
	
	if($slide_button1_style=='video'){ 
		if($slide_button1_link_type=='video-play'){
			return '<a id="play-the-video" class="btn-play"><i class="fa fa-play"></i></a>';
		}else{
			return '<a href="' . $slide_button1_link . '" class="btn-play"><i class="fa fa-play"></i></a>';
		}
		
	}else{
		return '<a href="' . $slide_button1_link . '" class="'. $str_class .'" '.$str_style.'>'.$slide_button1_text.'</a>';
	}

}
	
?>
		
		
