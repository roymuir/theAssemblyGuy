<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	global $_thdglkr_of_name,$_thdglkr_of_id;
	$optionsframework_settings = get_option( $_thdglkr_of_name );
	$optionsframework_settings['id'] = $_thdglkr_of_id;
	update_option( $_thdglkr_of_name, $optionsframework_settings );


}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {	


	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages['default'] = 'Default Maintenance Page';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
	
	
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';
	$admin_images_url = get_template_directory_uri().'/admin/images/';
	
	// TitleTypes 
	$title_type = array(
		'cpmb_no' => 'No Title',
		'cpmb_title' => 'Page Title',
		'cpmb_single_slide' => 'Single Static Slide',
		'cpmb_bg_slide' => 'Background Slider single Slide',
		'cpmb_slider' => 'Content Slider'
		);
	
	if(class_exists('RevSlider')){
		$slider = new RevSlider();
		$arrSliders = $slider->getArrSliders();
		foreach($arrSliders as $revSlider) { 
			$title_type[$revSlider->getAlias()] = $revSlider->getTitle().' (Revolution Slider)';
		}
	}

	
	$options = array();

	// Layout Settings /////////////////////////////////	
	$options[] = array("name" => __("Layout","revera"),
						"class" => "layout",
						"type" => "heading");
			
										
	$options[] = array( "name" => __("Responsive?","revera"),
						"desc" => __("Turn On/Off the Responsive","revera"),
						"id" => "responsive",
						"type" => "checkbox",
						"std" => 1);

	$options[] = array( "name" => __("Zoom on Small Devices?","revera"),
						"desc" => __("Turn On/Off the Zoom ability on small devices","revera"),
						"id" => "zoom",
						"type" => "checkbox",
						"std" => 0);
						

	
	// SEO SETTINGS /////////////////////////////////	
	$options[] = array("name" => __("SEO Settings","revera"),
						"class" => "seo",
						"type" => "heading");
						
	
	
	$options[] = array( "name" => __("Meta Description","revera"),
						"desc" => __("Description about your website (Good for SEO)","revera"),
						"id" => "meta_description",
						"std" => get_bloginfo( 'description' ),
						"type" => "textarea");
	
	$options[] = array( "name" => __("Meta Keywords","revera"),
						"desc" => __("Keywords about your website, Separate them with comma ( , )","revera"),
						"id" => "meta_keywords",
						"std" => "",
						"type" => "textarea");
						
						
	$meta_robots_array = array( "index" => "Index", "follow" => "Follow" );
	$meta_robots_defaults = array( "index" => "1", "follow" => "1" );

	$options[] = array( "name" => __("Meta Robots","revera"),
						"desc" => __("Should the robots index your site or not? Maybe you don`t want to let robots follow all your pages/folders?","revera"),
						"id" => "meta_robots",
						"type" => "multicheck",
						"options" => $meta_robots_array,
						"std" => $meta_robots_defaults);
											
	
	$options[] = array("name" => __("Apple Devices Icons","revera"),
						"type" => "info");
					
						
	$options[] = array( "name" => __("Apple iPhone Icon","revera"),
						"desc" => __("This is a hidden image that Apple iPhone use this icon as a shortcut icon. (57x57 pixel .PNG or .JPG format)","revera"),
						"id" => "touch-icon57",
						"std" => "",
						"type" => "upload");
						
	$options[] = array( "name" => __("Apple iPhone Retina Icon","revera"),
						"desc" => __("This is a hidden image that Retina Apple iPhone use this icon as a shortcut icon. (114x114 pixel .PNG or .JPG format)","revera"),
						"id" => "touch-icon114",
						"std" => "",
						"type" => "upload");
	
	$options[] = array( "name" => __("Apple iPad Icon","revera"),
						"desc" => __("This is a hidden image that Apple iPad use this icon as a shortcut icon. (72x72 pixel .PNG or .JPG format)","revera"),
						"id" => "touch-icon72",
						"std" => "",
						"type" => "upload");
	
	
	$options[] = array( "name" => __("Apple iPad Retina Icon","revera"),
						"desc" => __("This is a hidden image that Retina Apple iPad use this icon as a shortcut icon. (144x144 pixel .PNG or .JPG format)","revera"),
						"id" => "touch-icon144",
						"std" =>  "",
						"type" => "upload");


		
	
	// Header ////////////////////////////////////////
	$options[] = array("name" => __("Header","revera"),
						"class" => "header",
						"type" => "heading");
	
	
	
	$options[] = array( "name" => __("Logo Text","revera"),
						"desc" => __("Enter your logo text","revera"),
						"id" => "logo_text",
						"std" => "REVERA",
						"class" => "mini",
						"type" => "text");
					
	$options[] = array( "name" => __("Logo","revera"),
						"desc" => __("Use the upload button to upload your site's logo and then click '<strong>Use this image</strong>. (If you leave it blank Logo Text will show.)","revera"),
						"id" => "logo",
						"std" => "",
						"type" => "upload");
			
											
	$options[] = array( "name" => __("Custom Favicon","revera"),
						"desc" => __("Site favicon. (32x32 pixel or 16x16 pixel .PNG or .ICO file)","revera"),
						"id" => "favicon",
						"type" => "upload",
						"std" => $imagepath . "favicon.ico");
	
	
	$options[] = array("name" => __("Navigation Menu","revera"),
						"type" => "info");
	
						
	$options[] = array( "name" => __("Show Search?","revera"),
						"desc" => __("Turn On/Off the Search bar on menu","revera"),
						"id" => "search",
						"type" => "checkbox",
						"std" => 1);
						
	$options[] = array("name" => __("Pages Title","revera"),
						"type" => "info");
	
	$options[] = array( "name" => __("Pages Title Type","revera"),
						"desc" => __("Please select page template title type such as Portfolio, About, Contact, ... ","revera"),
						"id" => "pages_title_type",
						"std" => "simple_light",
						"type" => "select",
						"class" => "mini",
						"options" => array(
							'notitle' => 'No Title',
							'simple_light' => 'Simple Light',
							'simple_dark' => 'Simple Dark',
							'featured_light' => 'Background Image (Light)',
							'featured_dark' => 'Background Image (Dark)'
						));	
						
	$options[] = array( "name" => __("Show Arrow Down Icon?","revera"),
						"desc" => __("Turn On/Off the Title Arrow Down Icon","revera"),
						"id" => "pages_arrow",
						"type" => "checkbox",
						"std" => 1);
	
	
	$options[] = array("name" => __("Search Pages Title","revera"),
						"type" => "info");						
										
	$options[] = array( "name" => __("Search Page Title Type","revera"),
						"desc" => __("Please select search page title type such as Pages: Search, Category, Tag, Date and ...","revera"),
						"id" => "search_title_type",
						"std" => "simple_light",
						"type" => "select",
						"class" => "mini",
						"options" => array(
							'notitle' => 'No Title',
							'simple_light' => 'Simple Light',
							'simple_dark' => 'Simple Dark',
							'featured_light' => 'Background Image (Light)',
							'featured_dark' => 'Background Image (Dark)'
						));	
						
	$options[] = array( "name" => __("Custom Search Title Image","revera"),
						"desc" => __("If you select Image as a title, you should add your image here.","revera"),
						"id" => "search_title_image",
						"std" => "",
						"type" => "upload");
	
	$options[] = array( "name" => __("Image Repeat","revera"),
						"desc" => __("Select Background Repeat for image above","revera"),
						"id" => "search_bg_repeat",
						"std" => "stretch",
						"type" => "select",
						"class" => "mini",
						"options" => array('stretch' => __('Stretch Image','revera'), 'repeat' => __('Repeat','revera'), 'no-repeat' => __('No Repeat','revera'), 'repeat-x' => __('Repeat Horizontal (X)','revera'), 'repeat-y' => __('Repeat Vertical (Y)','revera')));	
	
	$options[] = array( "name" => __("Show Arrow Down Icon?","revera"),
						"desc" => __("Turn On/Off the Title Arrow Down Icon","revera"),
						"id" => "search_arrow",
						"type" => "checkbox",
						"std" => 1);



									   					
	// Colors ////////////////////////////////////////
	$options[] = array("name" => __("Colors","revera"),
						"class" => "appearance",
						"type" => "heading");

											
	$options[] = array( 'name' => __('Note', 'revera'),
						'type' => 'note',
						'class' =>'note_info',
						'desc' => __('For Live Colors settings please go to <a href="customize.php">Theme Customize</a> &gt; <strong>Colors</strong> ','revera')
						);
						
						
	
	// Typography
	$options[] = array( 'name' => __('Typography', 'revera'),
						'class' =>'typography',
						'type' => 'heading');
	
	$options[] = array( 'desc' => __('Body font', 'revera'),
						'name' =>__('Text font:', 'revera'),
						'id' => 'font_text',
						'class' => 'hty',
						'std' => array('size' => '12px','face' => 'Raleway','style' => 'normal','color' => '#777777'),
						'type' => 'typography');
	
	$options[] = array( 'name' =>__('Menu font:', 'revera'),
						'id' => 'font_menu',
						'class' => 'hty',
						'std' => array('size' => '14px','face' => 'Raleway','style' => 'bold','color' => '#777777'),
						'type' => 'typography');

						
	
	$options[] = array("name" => __("Heading","revera"),
						"type" => "info");
											
							
	$options[] = array( 'name' =>__('H1 font:', 'revera'),
						'id' => 'font_h1',
						'class' => 'hty',
						'std' => array('size' => '16px','face' => 'Raleway','style' => 'bold','color' => '#CCCCCC'),
						'type' => 'typography');
	
	$options[] = array( 'name' =>__('H2 font:', 'revera'),
						'id' => 'font_h2',
						'class' => 'hty',
						'std' => array('size' => '16px','face' => 'Raleway','style' => 'bold','color' => '#CCCCCC'),
						'type' => 'typography');
	
	$options[] = array( 'name' =>__('H3 font:', 'revera'),
						'id' => 'font_h3',
						'class' => 'hty',
						'std' => array('size' => '30px','face' => 'Lora','style' => 'normal','color' => '#222222'),
						'type' => 'typography');
	
	$options[] = array( 'name' =>__('H4 font:', 'revera'),
						'id' => 'font_h4',
						'class' => 'hty',
						'std' => array('size' => '18px','face' => 'Lora','style' => 'normal','color' => '#aaaaaa'),
						'type' => 'typography');
	
	$options[] = array( 'name' =>__('H5 font:', 'revera'),
						'id' => 'font_h5',
						'class' => 'hty',
						'std' => array('size' => '13px','face' => 'Lora','style' => 'bold','color' => '#222222'),
						'type' => 'typography');
	
	$options[] = array( 'name' =>__('H6 font:', 'revera'),
						'id' => 'font_h6',
						'class' => 'hty',
						'std' => array('size' => '12px','face' => 'Lora','style' => 'bold','color' => '#222222'),
						'type' => 'typography');	
	
	
	$options[] = array( 'name' =>__('Subtitle:', 'revera'),
						'id' => 'font_subtitle',
						'class' => 'hty',
						'std' => array('size' => '14px','face' => 'Raleway','style' => 'bold','color' => '#FFFFFF'),
						'desc' =>'Header Subtitle and also Portfolio items subtitles',
						'type' => 'typography');
						
						
	$options[] = array( 'name' => __('Note', 'revera'),
						'type' => 'note',
						'class' =>'note_info',
						'desc' => __('For Other Colors settings please <a href="customize.php" >Click Here</a>  ','revera')
						);
						
	
	
	
	// Blog Page Settings /////////////////////////////////	
	$options[] = array("name" => __("Blog Settings","revera"),
						"class" => "blog",
						"type" => "heading");
						
										
	$options[] = array( "name" => __("Blog Sidebar Position","revera"),
						"desc" => __("Choose which side you would like the sidebar to appear on the Blog.","revera"),
						"id" => "blog_sidebar",
						"std" => "right",
						"type" => "images",
						"options" => array('nosidebar'=> $admin_images_url.'ns.png','right' =>$admin_images_url.'rs.png','left' => $admin_images_url.'ls.png' ));	
	
	$options[] = array( "name" => __("Number of Blog items?","revera"),
						"desc" => __("Number of blog items per page in blog pages for pagination.","revera"),
						"id" => "number_of_blog_item",
						"std" => "10",
						"class" => "mini",
						"type" => "text");
	
	
	
	$options[] = array( "name" => __("Blog Excerpt Length","revera"),
						"desc" => __("Default is 30 words. Used for blog page, archives, Tags, Category Search and ... ","revera"),
						"id" => "excerpt_blog",
						"std" => "30",
						"class" => "mini",
						"type" => "text"); 

						
	$options[] = array( "name" => __("Show Read More button?","revera"),
						"desc" => __("This will display the Read More button in the blogs page.","revera"),
						"id" => "blog_more_button",
						"std" => 1,
						"type" => "checkbox"); 		

	$options[] = array( "name" => __("Read More Button Text","revera"),
						"desc" => __("This is the text that will appear on the Blog \"More button\".  Default text is <strong>Continue Reading</strong>","revera"),
						"id" => "blog_button",
						"std" => __("Continue Reading","revera"),
						"class" => "mini",
						"type" => "text");
					
	$options[] = array( "name" => __("Show Tags in Posts page?","revera"),
						"desc" => __("This will display the Tags in the bolg posts.","revera"),
						"id" => "blog_tags",
						"std" => 1,
						"type" => "checkbox");
						
	$options[] = array( "name" => __("Show meta data in Blog page?","revera"),
						"desc" => __("This will display the the meta data such as date and category in blog posts","revera"),
						"id" => "blog_metadata",
						"std" => 1,
						"type" => "checkbox");
						

						
	$options[] = array( 'name' => __('Blog Details', 'revera'),
						'type' => 'info');
	
	$options[] = array( "name" => __("Blog Details Menu Style","revera"),
						"desc" => __("Please select the blog single page menu style","revera"),
						"id" => "blog_single_menu",
						"std" => "v1",
						"type" => "select",
						"class" => "mini",
						"options" => array('v1' => __('Right Toggle','revera'), 'v2' => __('Left Toggle','revera'), 'v3' => __('Top Horizontal','revera')));
										
	$options[] = array( "name" => __("Show meta data in Blog details?","revera"),
						"desc" => __("This will display the the meta data such as date and category in blog details page","revera"),
						"id" => "blog_single_metadata",
						"std" => 1,
						"type" => "checkbox"); 
															
	$options[] = array( "name" => __("Show Author Info on Blog Details?","revera"),
						"desc" => __("This will display the Author Name &amp; Biography in the Blog Posts. You can edit the Author Biography under Users > Profiles.","revera"),
						"id" => "author_info",
						"std" => 1,
					    "type" => "checkbox"); 
	
	
	$options[] = array( "name" => __("Show Next and Previous buttons?","revera"),
						"desc" => __("This will display the next and previous Post links on blog details page.","revera"),
						"id" => "blog_nav",
						"std" => 1,
					    "type" => "checkbox"); 
						
						
	$options[] = array( "name" => __("Enable Comments?","revera"),
						"desc" => __("This will display the Comments in the Blog Posts.","revera"),
						"id" => "blog_comment",
						"std" => 1,
					    "type" => "checkbox"); 
						

	
	// Portfolio Settings /////////////////////////////////	
	$options[] = array("name" => __("Portfolio Settings","revera"),
						"class" => "portfolio",
						"type" => "heading");
									
	
	
	$options[] = array( "name" => __("Portfolio slug","revera"),
					"desc" => __("Portfolio slug is URL friendly string that will shows in your portfolio details link.","revera"),
					"id" => "portfolio_item_slug",
					"std" => "portfolio",
					"class" => "mini",
					"type" => "text");
					
	$options[] = array( "name" => __("Portfolio Page Name","revera"),
					"desc" => __("Portfolio Page Name.","revera"),
					"id" => "portfolio_page_name",
					"std" => "Portfolio",
					"class" => "mini",
					"type" => "text");
	
	$options[] = array( 'name' => __('Note', 'revera'),
						'type' => 'note',
						'class' =>'note_alert',
						'desc' => __('After Changing the <strong>Portfolio Slug</strong> you should go to <strong>Settings</strong> > <strong>Permalinks</strong> and click on <strong>Save Changes</strong> to set the new slug.','revera')
						);
						
					
	$options[] = array( "name" => __("Portfolio Filtering?","revera"),
						"desc" => __("Turn On/Off the Filtering Portfolio by Categories.","revera"),
						"id" => "filtering",
						"type" => "checkbox",
						"std" => 1);
						
	$options[] = array( "name" => __("Portfolio Order by:","revera"),
						"desc" => __("Choose Date or Menu Order for Portfolio carousel sort order.","revera"),
						"id" => "orderby_portfolio",
						"std" => "date",
						"type" => "select",
						"class" => "mini",
						"options" => array('date' => __('Date','revera'), 'menu_order' => __('Menu Order','revera'), 'rand' => __('Random','revera'), 'title' => __('Title','revera')));	
						
						
	$options[] = array( "name" => __("Portfolio Order","revera"),
						"desc" => __("Choose ASC (Ascending) or DESC (Descending) for Portfolio order in carousel .","revera"),
						"id" => "order_portfolio",
						"std" => "DESC",
						"type" => "select",
						"class" => "mini",
						"options" => array('ASC' => __('ASC','revera'), 'DESC' => __('DESC','revera')));
									
	$options[] = array( "name" => __("Number of Portfolio items?","revera"),
					"desc" => __("Number of portfolio items per page in portfolio pages for pagination.","revera"),
					"id" => "number_of_portfolio_item",
					"std" => "12",
					"class" => "mini",
					"type" => "text");		
	
	$options[] = array( "name" => __("Portfolio Excerpt Length","revera"),
						"desc" => __("Default is 30 words. Used for Portfolio pages.","revera"),
						"id" => "excerpt_portfolio",
						"std" => "30",
						"class" => "mini",
						"type" => "text");
	

	$options[] = array( 'name' => __('Portfolio Details', 'revera'),
						'type' => 'info');
	
	$options[] = array( "name" => __("Portfolio Details Menu Style","revera"),
						"desc" => __("Please select the Portfolio single page menu style","revera"),
						"id" => "portfolio_single_menu",
						"std" => "v1",
						"type" => "select",
						"class" => "mini",
						"options" => array('v1' => __('Right Toggle','revera'), 'v2' => __('Left Toggle','revera'), 'v3' => __('Top Horizontal','revera')));
						
	$options[] = array( "name" => __("Portfolio Details Page Sidebar Position","revera"),
						"desc" => __("Choose which side you would like the sidebar to appear on the Portfolio Details page.","revera"),
						"id" => "portfolio_sidebar",
						"std" => "left",
						"type" => "images",
						"options" => array('nosidebar'=> $admin_images_url.'ns.png','right' =>$admin_images_url.'rs.png','left' => $admin_images_url.'ls.png' ));	
	
	
	$options[] = array( "name" => __("Show Next and Previous buttons?","revera"),
						"desc" => __("This will display the next and previous Project links on project Details page.","revera"),
						"id" => "portfolio_nav",
						"std" => 1,
					    "type" => "checkbox"); 
															
	$options[] = array( "name" => __("Show Author Info on Project Details?","revera"),
						"desc" => __("This will display the Author Name & Biography in the Project Details page. You can edit the Author Biography under Users > Profiles.","revera"),
						"id" => "portfolio_author_info",
						"std" => 0,
					    "type" => "checkbox"); 
	


	$options[] = array( "name" => __("Show Related Projects on Portfolio Detail?","revera"),
						"desc" => __("Related projects show in the bottom of project details page.","revera"),
						"id" => "related_portfolio",
						"std" => 1,
						"type" => "checkbox"); 
	
	$options[] = array( "name" => __("Related Projects Title","revera"),
						"desc" => __("The Title of Related Projects, Default is <strong>Related Projects</strong>","revera"),
						"id" => "related_portfolio_title",
						"std" => __("Related Projects","revera"),
						"class" => "mini",
						"type" => "text");
						
						
						
	$options[] = array( "name" => __("Enable Comments?","revera"),
						"desc" => __("This will display the Comments in the Portfolio details page.","revera"),
						"id" => "portfolio_comment",
						"std" => 1,
					    "type" => "checkbox"); 	
						
	
				
											
	// Footer Settings /////////////////////////////////	
	$options[] = array("name" =>  __("Footer Settings","revera"),
						"class" => "footer",
						"type" => "heading");

	$options[] = array( "name" => __("Show Footer Widgets?","revera"),
						"desc" => __("Turn On/Off the footer widgets","revera"),
						"id" => "footer_widgets",
						"std" => 1,
					    "type" => "checkbox");
						
						
	$col_images = array('1'=>$admin_images_url.'1c.png','2'=>$admin_images_url.'2c.png','3'=>$admin_images_url.'3c.png','4'=>$admin_images_url.'4c.png');
	$options[] = array( "name" => __("Number of Footer Columns","revera"),
						"desc" => __("Select how many columns you want to display in the footer.","revera"),
						"id" => "footer_col",
						"type" => "images",
						"std" =>"3",
						"options" => $col_images);		

	
	$options[] = array( "name" =>  __("Footer Above Widgets Text","revera"),
						"desc" =>  __("Add your content that shows on top of Footer Widgets","revera"),
						"id" => "footer_top_text",
						"std" => "<div class='c-links'><h3 class='uber'><a class='popup-form' href='#the-form'>Send a message</a></h3><h3 class='uber'>Call us: <a href='tel:+22155590210'>+221 555 90210</a></h3></div>",
						"type" => "editor");
						
						
	$options[] = array( "name" =>  __("Footer Bottom Text","revera"),
						"desc" =>  __("Add your copyright phrase or any text to be displayed below the footer.","revera"),
						"id" => "footer_text",
						"std" => "Copyright &copy; 2014 revera Theme. Designed by <a href='http://themeforest.net/user/themetor?ref=themetor' target='_blank'>ThemeTor</a>.",
						"type" => "editor");
	
	
	$options[] = array( "name" => __("Show Go To Top button?","revera"),
						"desc" => __("Turn On/Off the <strong>Got To Top</strong> button","revera"),
						"id" => "footer_gototop",
						"std" => 1,
					    "type" => "checkbox"); 
	
	
						
	$options[] = array( 'name' => __('Note', 'revera'),
						'type' => 'note',
						'class' =>'note_info',
						'desc' => __('For Footer Social Icons, you can go to <strong>Social &amp; Shares</strong> section','revera')
						);
	
	
	// Contact Form					
	$options[] = array("name" => __("Contact Form","revera"),
						"class" => "contact",
						"type" => "heading");
						
	$options[] = array( "name" => __("Enable Contact Form Popup?","revera"),
						"desc" => __("Turn On/Off the <strong>Popup Contact  Fomr</strong>","revera"),
						"id" => "pcf_enable",
						"std" => 1,
					    "type" => "checkbox"); 
	
	$options[] = array( "name" => __("Contact Form Popup ID","revera"),
						"desc" => __("Please enter popup ID, you should use this ID for linking the popup href by #ID<br/>(e.g. &lt;a class=\"popup-form\" href=\"#ID\"&gt;Send a message&lt;/a&gt;)","revera"),
						"id" => "pcf_id",
						"std" => "the-form",
						"class"=>"mini",
						"type" => "text");
	
	$options[] = array( "name" => __("Title","revera"),
						"id" => "pcf_title",
						"std" => "Send a message",
						"type" => "text");
	
	$options[] = array( "name" => __("Sub Title","revera"),
						"id" => "pcf_subtitle",
						"std" => "Get in touch and see if we\'re a good match",
						"type" => "text");
														
	$options[] = array( "name" => __("Contact Form Popup","revera"),
						"desc" => __("Please enter the popup contact form content form shortcode. (Contact Form 7 Shortcode)","revera"),
						"id" => "pcf_shortcode",
						"std" => "",
						"type" => "text");
						
						
																				
						
	// Social Icons Settings /////////////////////////////////	
	$options[] = array("name" => __("Social &amp; Shares","revera"),
						"class" => "social",
						"type" => "heading");

	$options[] = array( "name" => __("Show Social Icons in Header?","revera"),
						"desc" => __("Turn On/Off the Social icons in the Header.  Note: They will only appear if you have set a link below.","revera"),
						"id" => "header_social_icons",
						"std" => 1,
					    "type" => "checkbox"); 
						
	$options[] = array( "name" => __("Show Social Icons in Footer?","revera"),
						"desc" => __("Turn On/Off the Social icons in the Footer.  Note: They will only appear if you have set a link below.","revera"),
						"id" => "footer_social_icons",
						"std" => 1,
					    "type" => "checkbox"); 
						
		
	$options[] = array( "name" => __("Open links in new window?","revera"),
						"desc" => __("Turn On/Off the links target (Open links in new window or in current window)","revera"),
						"id" => "social_icons_link_target",
						"std" => 1,
					    "type" => "checkbox"); 	
						
					
															
    $options[] = array( "name" => __("Twitter Link","revera"),
						"desc" => __("Enter the Twitter Link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "twitter_link",
						"std" => "#",
						"type" => "text");
						
	$options[] = array( "name" => __("Facebook Link","revera"),
						"desc" => __("Enter the Facebook Link that you would like to use for the social-networking icons. Note: Use http://","revera"),
						"id" => "facebook_link",
						"std" => "#",
						"type" => "text");

	$options[] = array( "name" => __("Vimeo Link","revera"),
						"desc" => __("Enter the Vimeo Link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "vimeo_link",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => __("SoundColud Link","revera"),
						"desc" => __("Enter the SoundColud Link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "soundcloud_link",
						"std" => "",
						"type" => "text");
															
	$options[] = array( "name" => __("Pinterest Link","revera"),
						"desc" => __("Enter the Pinterest Link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "pinterest_link",
						"std" => "",
						"type" => "text");
		
	
	$options[] = array( "name" => __("Flickr Link","revera"),
						"desc" => __("Enter the Flickr Link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "flickr_link",
						"std" => "#",
						"type" => "text");
						
	$options[] = array( "name" => __("Google Plus Link","revera"),
						"desc" => __("Enter the Google Plus Link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "google_link",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => __("YouTube Link","revera"),
						"desc" => __("Enter the YouTube Link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "youtube_link",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => __("Dribbble Link","revera"),
						"desc" => __("Enter the Dribbble Link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "dribbble_link",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => __("Behance Link","revera"),
						"desc" => __("Enter the Behance Link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "behance_link",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __("Instagram Link","revera"),
						"desc" => __("Enter the Instagram Link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "instagram_link",
						"std" => "",
						"type" => "text");
											
	$options[] = array( "name" => __("LinkedIn Link","revera"),
						"desc" => __("Enter the LinkedIn Link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "linkedin_link",
						"std" => "",
						"type" => "text");

	
	$options[] = array( "name" => __("Skype Link","revera"),
						"desc" => __("Enter the Skype Link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "skype_link",
						"std" => "",
						"type" => "text");										
	

	$options[] = array( "name" => __("Tumblr Link","revera"),
						"desc" => __("Enter the Tumblr Link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "tumblr_link",
						"std" => "",
						"type" => "text");
				
	$options[] = array( "name" => __("GitHub Link","revera"),
						"desc" => __("Enter the GitHub Link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "github_link",
						"std" => "",
						"type" => "text");
											
	$options[] = array( "name" => __("RSS Feed","revera"),
						"desc" => __("Enter the RSS Feed that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "rss_link",
						"std" => "#",
						"type" => "text");
	
	
	$options[] = array( "name" => __("Email Address","revera"),
						"desc" => __("Enter the email address that you would like to use for the social-networking icons.","revera"),
						"id" => "email_address",
						"std" => "",
						"type" => "text");
						
											
	$options[] = array( "name" => __("Sitemap","revera"),
						"desc" => __("Enter the Sitemap link that you would like to use for the social-networking icons. Use http://","revera"),
						"id" => "sitemap_link",
						"std" => "",
						"type" => "text");
	
	
						
	// TOOLS //////////////////////////////////////////////////////////////////////					
	$options[] = array("name" => __("Tools","revera"),
						"class" => "tools",
						"type" => "heading");
	
	$options[] = array( "name" => __("Date and Time Format","revera"),
						"desc" => __('Date and Time format, <a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank" >Documentation on date and time formatting</a>','revera'),
						"id" => "date_format",
						"std" => "jS M Y",
						"class" => "mini",
						"type" => "text");
				
	
	$options[] = array("name" => __("Error 404","revera"),
						"type" => "info");
									

	$options[] = array( "name" => __("404 Error Title","revera"),
						"desc" => __("Enter your custom 404 error title.","revera"),
						"id" => "e404_title",
						"std" => __("404","revera"),
						"type" => "text");
	
	$options[] = array( "name" => __("404 Error Message Text","revera"),
						"desc" => __("Enter your custom 404 error message.","revera"),
						"id" => "e404_text",
						"std" =>__("Page Not Found","revera"),
						"type" => "textarea"); 
	
	
	$options[] = array( "name" => __("Custom Background Image","revera"),
						"desc" => __("Upload Background Image or paste Image URL","revera"),
						"id" => "e404_img",
						"std" => "",
						"type" => "upload");
		
						
						
						
	//Custom Codes //////////////////////////////////////////////////////////////
	$options[] = array("name" => __("Custom Codes","revera"),
						"class" => "custom",
						"type" => "heading");	
				

	$options[] = array( "name" => __("Custom CSS","revera"),
						"desc" => __("Paste your custom css here... <br /><strong>NOTE:</strong> You don't need to add &lt;style&gt; tags","revera"),
						"id" => "custom_css",
						"std" => "",
						"type" => "textarea"); 
	
	$options[] = array( "name" => __("Custom Javascript","revera"),
						"desc" => __("Paste your custom JavaScript code here... <br /><strong>NOTE:</strong> You don't need to add &lt;script&gt; tags<br/><br/>This will add to Footer of page.","revera"),
						"id" => "custom_js",
						"std" => "",
						"type" => "textarea"); 
						
						
	$options[] = array( "name" => __("Track Code","revera"),
						"desc" => __("Paste your Track Code here (for example: Google Analytics) <br /><strong>NOTE:</strong> You don't need to add &lt;script&gt; tags<br/><br/>This will add to Footer of page.","revera"),
						"id" => "track_code",
						"type" => "textarea"); 							
	
	
	
	
	// Maintenance ////////////////////////////////////////
	$options[] = array("name" => __("Maintenance","revera"),
						"class" => "main",
						"type" => "heading");
	


	$options[] = array( "name" => __("Maintenance Mode","revera"),
						"desc" => __("Turn On/Off Maintenace mode.","revera"),
						"id" => "main_mode",
						"type" => "checkbox",
						"std" => 0);
	
	
	$options[] = array( "name" => __("Maintenance Page","revera"),
						"desc" => __("Please select maintenace mode page","revera"),
						"id" => "main_page",
						"std" => "default",
						"type" => "select",
						"class" => "mini",
						"options" => $options_pages
						);
	
	$options[] = array( "name" => __("Default Maintenance Page Text","revera"),
						"desc" => __("Please set your own text for Default Maintenance Page","revera"),
						"id" => "main_html",
						"std" => '<p style="text-align:center">We are currently in maintenance mode, please check back shortly.</p>',
						"type" => "editor");									
	
	// Sample Importer ////////////////////////////////////////////////////
	$options[] = array("name" => __("Import Demo","revera"),
						"class" => "demo",
						"type" => "heading");
	
	$demo_images = array(
		'revera'=>$admin_images_url.'demo/d1.jpg'
	);
	$options[] = array( "name" => __("One Click Demo Intaller","revera"),
						"desc" => __("Please select your sample demo and click on <strong>Import Demo</strong> button.<br/><br/><strong>NOTE:</strong> It will take some minutes, please wait for finishing the import process.","revera"),
						"id" => "demo",
						"type" => "demo",
						"options" => $demo_images); 
						
	
	// Backup //////////////////////////////////////////////////////////////
	$options[] = array("name" => __("Backup","revera"),
						"class" => "backup",
						"type" => "heading");
	
	
	$options[] = array( "name" => __("Backup","revera"),
						"desc" => __("Backup and restore your theme options<br /><strong>NOTE:</strong>For WPML Users: You should get backup for each language.","revera"),
						"id" => "track_code",
						"type" => "backup"); 
						
	
	return $options;
	
	
}