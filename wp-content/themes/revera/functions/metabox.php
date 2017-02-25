<?php
function revera_register_meta_boxes(){
	
$prefix = 'revera_';

// Fetching the Portfolio Categories ////////////////////////////////////////////////////////
$types = get_terms('portfolio_types', 'hide_empty=0');
$types_array['all'] = 'All categories';
if($types) {
	foreach($types as $type) {
		$types_array[$type->term_id] = $type->name;
	}
}

// Fetching the Header Categories //////////////////////////////////////////////////////////
$header_cat[''] = '';
$h_types = get_terms('header_types', 'hide_empty=0');
if($h_types) {
	foreach($h_types as $h_type) {
		$header_cat[$h_type->term_id] = $h_type->name;
	}
}

// Header Types for Page Settings //////////////////////////////////////////////////////////
$header_type = array(
	'cpmb_no' => 'No Title',
	'cpmb_title' => 'Page Title',
	'cpmb_single_slide' => 'Single Static Slide',
	'cpmb_bg_slide' => 'Background Slider single Slide',
	'cpmb_slider' => 'Content Slider',
	'cpmb_video' => 'Video Background'
	);



// Page Metabox /////////////////////////////////////////////////////////////////////////////
$meta_boxes[] = array(
	'id' => 'pagesettings',
	'title' => 'Page Advanced Settings',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name'		=> 'Header (Title)',
			'id'		=> "{$prefix}title",
			'type'		=> 'select',
			'options'	=> $header_type,
			'multiple'	=> false,
			'desc'		=> 'Please select the Header (Title) type',
			'std' => 'cpmb_title'
		),
		array(
			'name' => 'Header Category',
			'id' => "{$prefix}header_cat",
			'type' => 'select',
			'options' => $header_cat,
			'desc' => '',
		),
		array(
			'name'     => 'Menu Style',
			'id'       => $prefix . 'menu',
			'type'     => 'select',
			'options'  => array(
				'v1' => 'Right',
				'v2' => 'Left',
				'v3' => 'Top'
			),
			'multiple' => false,
			'desc'	 => 'Please select Menu Position',
			'std'      => 'v1'
		),
		array(
			'name'     => 'Menu Type',
			'id'       => $prefix . 'menu_type',
			'type'     => 'select',
			'options'  => array(
				'primary' => 'Main Menu (Multi-Page)',
				'onepage' => 'One Page'
			),
			'multiple' => false,
			'desc'	 => 'Please select Menu Type',
			'std'      => 'primary'
		)
	)
);


// Page Metabox /////////////////////////////////////////////////////////////////////////////
$meta_boxes[] = array(
	'id' => 'portfolio_page_settings',
	'title' => 'Portfolio Settings',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(
		array(
			'name' => 'Select Portfolio Categories',
			'id' => $prefix . "portfoliocat",
			'type' => 'select',
			'options' => $types_array,
			'multiple' => true,
			'desc' => 'Select portfolio category for <strong>Portfolio Template only</strong><br/>Select multiple by holding ctrl key <br/> (optional).',
		),
		array(
			'name'     => 'Content Display?',
			'id'       => $prefix . 'content',
			'type'     => 'select',
			'options'  => array(
				'no' => 'No',
				'top' => 'Show on Top',
				'bottom' => 'Show on Bottom'
			),
			'multiple' => false,
			'desc'	 => 'Please select your position of page content show.',
			'std'      => 'no'
		)
	)
);

// Post Format Settings  //////////////////////////////////////////////////////////////////
$meta_boxes[] = array(
	'id' => 'poststitletype',
	'title' => 'Single Post Title Type',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name'     => 'Details Page Title',
			'id'       => $prefix . 'post-title',
			'type'     => 'select',
			'options'  => array(
				'notitle' => 'No Title',
				'simple_light' => 'Simple Light',
				'simple_dark' => 'Simple Dark',
				'featured_light' => 'Featured Image (Light)',
				'featured_dark' => 'Featured Image (Dark)'
			),
			'multiple' => false,
			'desc'	 => 'Please select Portfolio single page (Details) Title type.',
			'std'      => 'featured_dark'
		),
		array(
			'name' => 'Show Arrow down icon in title?',
			'id'   => "{$prefix}post-arrow",
			'type' => 'checkbox',
			'desc' => 'Do you want to show arrow down icon in title of portfolio single page?',
			'std'  => 1,
		)
	)
);

$meta_boxes[] = array(
	'id' => 'gallerypostformat',
	'title' => 'Gallery Post Format',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => 'Gallery Images (Slider Images)',
			'id' => $prefix ."gallery",
			'type' => 'image_advanced',
			'max_file_uploads' => 10,
		)
	)
);


$meta_boxes[] = array(
	'id' => 'quotepostformat',
	'title' => 'Quote Post Format',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name'  => "Source Name",
			'id'    => "{$prefix}format_quote_source_name",
			'desc'  => "Enter source name",
			'type'  => 'text'
		),array(
			'name'  => 'URL',
			'id'    => "{$prefix}format_quote_source_url",
			'desc'  => "Please enter source URL",
			'type'  => 'url',
			'std'   => '',
		)
	)
);

$meta_boxes[] = array(
	'id' => 'videopostformat',
	'title' => 'Video Post Format',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => "Video Embed",
			'desc' => "Please enter video embed",
			'id'   => "{$prefix}format_video_embed",
			'type' => 'textarea',
			'cols' => 20,
			'rows' => 3,
		)
	)
);


$meta_boxes[] = array(
	'id' => 'audiopostformat',
	'title' => 'Audio Post Format',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => "Audio URL",
			'desc' => "Please enter audio url",
			'id'   => "{$prefix}format_audio_embed",
			'type' => 'textarea',
			'cols' => 20,
			'rows' => 1,
		)
	)
);




// SEO Settings ///////////////////////////////////////////////////////////////////////////
$meta_boxes[] = array(
	'id' => 'seometa',
	'title' => 'SEO Settings',
	'pages' => array( 'page','post','portfolio'),
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(
		array(
			'name' => 'Page Description',
			'id'   => $prefix . "pg_desc",
			'type' => 'textarea',
			'desc' => 'Please enter an abstract description about this page or post. (Good for SEO)',
			'cols' => '20',
			'rows' => '3',
		),
		array(
			'name' => 'Page Keywords',
			'id'   => $prefix . "pg_key",
			'type' => 'textarea',
			'desc' => 'Please enter keywords seperated by comma (,) ',
			'cols' => '20',
			'rows' => '3',
		)

	)
);


// Metabox for Slide Custom Post ////////////////////////////////////////////////////////////
$meta_boxes[] = array(
	'id' => 'slidebox',
	'title' => 'Slide details',
	'pages' => array('slide'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'name'		=> 'Style',
			'id'		=> "{$prefix}slide_style",
			'type'		=> 'select',
			'options'	=> array('light'=>'Light','dark'=>'Dark'),
			'multiple'	=> false,
			'desc'		=> 'Please select the Style of Slide',
			'std' => 'light'
		),
		array(
			'name' => 'Title',
			'desc' => 'Enter the Big Title of Slide',
			'id' => $prefix . 'slide_title',
			'type' => 'text',
			'std' => '',
			'clone' => false 
		),
		array(
			'name' => 'Sub Title',
			'id' => $prefix . 'slide_subtitle',
			'type' => 'text',
			'std' => '',
			'clone' => false 
		),
		array(
			'name' => 'Background Color',
			'id' => "{$prefix}slide_bg_color",
			'desc' => 'Please set Slide Background color instead of Image.',
			'type' => 'color',
		),
		array(
			'type' => 'heading',
			'name' => 'Button 1',
			'id' => 'fake_id',
		),
		array(
			'name' => 'Button 1 Text',
			'id' => $prefix . 'slide_button1_text',
			'type' => 'text',
			'std' => '',
			'clone' => false 
		),
		array(
			'name'		=> 'Button 1 Style',
			'id'		=> "{$prefix}slide_button1_style",
			'type'		=> 'select',
			'options'	=> array('solid'=>'Solid Color','outline'=>'Outline','video'=>'Circle Video'),
			'multiple'	=> false,
			'desc'		=> 'Please select the Button Style',
			'std' => 'cpmb_title'
		),
		array(
			'name' => 'Button 1 Color',
			'id' => "{$prefix}slide_button1_color",
			'type' => 'color',
		),
		array(
			'name' => 'Button 1 Link',
			'id' => $prefix . 'slide_button1_link',
			'type' => 'text',
			'std' => '',
			'clone' => false 
		),
		array(
			'name'		=> 'Button 1 Link Type',
			'id'		=> "{$prefix}slide_button1_link_type",
			'type'		=> 'select',
			'options'	=> array('url'=>'URL','scrollto'=>'Scroll To','popup'=>'Popup Image','popup-iframe'=>'Popup Video &amp; Map','video-play'=>'Play Video in Background'),
			'multiple'	=> false,
			'desc'		=> 'Please select the Button link type',
			'std' => 'cpmb_title'
		),
		array(
			'type' => 'heading',
			'name' => 'Button 2',
			'id' => 'fake_id',
		),
		array(
			'name' => 'Button 2 Text',
			'id' => $prefix . 'slide_button2_text',
			'type' => 'text',
			'std' => '',
			'clone' => false 
		),
		array(
			'name'		=> 'Button 2 Style',
			'id'		=> "{$prefix}slide_button2_style",
			'type'		=> 'select',
			'options'	=> array('solid'=>'Solid Color','outline'=>'Outline','video'=>'Circle Video'),
			'multiple'	=> false,
			'desc'		=> 'Please select the Button Style',
			'std' => 'cpmb_title'
		),
		array(
			'name' => 'Button 2 Color',
			'id' => "{$prefix}slide_button2_color",
			'type' => 'color',
		),
		array(
			'name' => 'Button 2 Link',
			'id' => $prefix . 'slide_button2_link',
			'type' => 'text',
			'std' => '',
			'clone' => false 
		),
		array(
			'name'		=> 'Button 2 Link Type',
			'id'		=> "{$prefix}slide_button2_link_type",
			'type'		=> 'select',
			'options'	=> array('url'=>'URL','scrollto'=>'Scroll To','popup'=>'Popup Image','popup-iframe'=>'Popup Video &amp; Map','video-play'=>'Play Video in Background'),
			'multiple'	=> false,
			'desc'		=> 'Please select the Button link type',
			'std' => 'cpmb_title'
		)
	),
	
);

$meta_boxes[] = array(
	'id' => 'slideboxbg',
	'title' => 'BG Slide',
	'pages' => array('slide'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => 'Background Slide Images',
			'id' => $prefix ."header_bg_slide",
			'type' => 'image_advanced',
			'max_file_uploads' => 10,
		)

	),
	
);

$meta_boxes[] = array(
	'id' => 'slideboxvideo',
	'title' => 'Video Slide',
	'pages' => array('slide'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => 'Video Url',
			'id' => $prefix . 'slide_video_url',
			'type' => 'text',
			'std' => '',
			'clone' => false 
		),
		array(
			'name'		=> 'Type',
			'id'		=> "{$prefix}slide_video_type",
			'type'		=> 'select',
			'options'	=> array('bg'=>'Background Video','bgauto'=>'Background Video (Auto Play)','popup'=>'Popup Video'),
			'multiple'	=> false,
			'std' => 'bg'
		)

	),
	
);


// PORTFOLIO ///////////////////////////////////////////////////////////
$meta_boxes[] = array(
	'id' => 'portfolio',
	'title' => 'Portfolio details',
	'pages' => array('portfolio'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array(
			'name'		=> 'Client',
			'id'		=> $prefix . 'portfolio-client',
			'desc'		=> 'Project\'s Client Name. (optional)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Year',
			'id'		=> $prefix . 'portfolio-year',
			'desc'		=> 'The year of project. (optional)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Project URL',
			'id'		=> $prefix . 'portfolio-url',
			'desc'		=> 'URL to the Project. (optional) (with http://)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'     => 'Thumbnail link to?',
			'id'       => $prefix . 'portfolio-to',
			'type'     => 'select',
			'options'  => array(
				'nothing' => 'Nothing',
				'details' => 'Project Details',
				'lightbox' => 'Show Image in Lightbox (or Video)',
				'projecturl' => 'Project URL'
			),
			'multiple' => false,
			'desc'	 => 'Select the action that you want when click on portfolio thumbnails.',
			'std'      => 'details'
		),
		array(
			'name'		=> 'View Details Button Text',
			'id'		=> $prefix . 'portfolio-button',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> 'View Details'
		),
		array(
			'name'     => 'Details Page Title',
			'id'       => $prefix . 'portfolio-title',
			'type'     => 'select',
			'options'  => array(
				'notitle' => 'No Title',
				'simple_light' => 'Simple Light',
				'simple_dark' => 'Simple Dark',
				'featured_light' => 'Featured Image (Light)',
				'featured_dark' => 'Featured Image (Dark)'
			),
			'multiple' => false,
			'desc'	 => 'Please select Portfolio single page (Details) Title type.',
			'std'      => 'featured_dark'
		),
		array(
			'name' => 'Show Arrow down icon in title?',
			'id'   => "{$prefix}portfolio-arrow",
			'type' => 'checkbox',
			'desc' => 'Do you want to show arrow down icon in title of portfolio single page?',
			'std'  => 1,
		),
		array(
			'name' => 'Project Details Slider',
			'id' => $prefix ."portfolio-gallery",
			'type' => 'image_advanced',
			'max_file_uploads' => 10,
			'desc'	 => 'Project details slider images only (Please add main image as Featured Image)',
		)

	)
	
);



$meta_boxes[] = array(
	'id'		=> 'portfolio_video',
	'title'		=> 'Portfolio Video or Audio',
	'pages'		=> array( 'portfolio' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'		=> 'Video Source',
			'id'		=> $prefix . 'portfolio-video',
			'type'		=> 'select',
			'options'	=> array(
				'youtube'		=> 'Youtube',
				'vimeo'			=> 'Vimeo',
				'other'			=> 'Other Embed Code'
			),
			'multiple'	=> false,
			'std'		=> array( 'no' )
		),
		array(
			'name'	=> 'Video URL or Embed Code (Video or Audio)',
			'id'	=> $prefix . 'embed',
			'desc'	=> 'Paste the ID of the video (E.g. http://www.youtube.com/watch?v=<strong>gOlgRapHiC4</strong>) <br /> Or <br /> Insert your own Embed Code. <br />You can also insert your <strong>Audio</strong> Embedd Code.',
			'type' 	=> 'textarea',
			'std' 	=> "",
			'cols' 	=> "40",
			'rows' 	=> "8"
		)
	)
);




// TESTIMONIALS ///////////////////////////////////////////////////////////
$meta_boxes[] = array(
	'id' => 'testimonial',
	'title' => 'Testimonial details',
	'pages' => array('testimonial'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array(
			'name'		=> 'Author Name',
			'id'		=> $prefix . 'testimonial_name',
			'desc'		=> '',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Job',
			'id'		=> $prefix . 'testimonial_job',
			'desc'		=> 'Testimonial author\'s job. (optional)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name' => 'Testimonial or Quote',
			'id'   => $prefix . "testimonial",
			'type' => 'textarea',
			'desc' => 'Please enter Testimonial or Quote here.',
			'cols' => '20',
			'rows' => '3',
		)

	)
	
);

return $meta_boxes;

}

add_filter( 'rwmb_meta_boxes', 'revera_register_meta_boxes' );

?>