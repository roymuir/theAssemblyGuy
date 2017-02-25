<?php
/*
 * Theme post types.
 *
 * Theme: Revera
 * Author: ThemeTor
 * Website: http://themetor.com
 */

/* ---------------------------------------------------------------------------
 * Create new post type: Portfolio
 * --------------------------------------------------------------------------- */
function revera_post_type_portfolio() 
{
	$portfolio_item_slug = _option( 'portfolio_item_slug', 'portfolio', true );
	
	$labels = array(
		'name' => __('Portfolio','revera'),
		'singular_name' => __('Portfolio item','revera'),
		'add_new' => __('Add New','revera'),
		'add_new_item' => __('Add New Portfolio item','revera'),
		'edit_item' => __('Edit Portfolio item','revera'),
		'new_item' => __('New Portfolio item','revera'),
		'view_item' => __('View Portfolio item','revera'),
		'search_items' => __('Search Portfolio items','revera'),
		'not_found' =>  __('No portfolio items found','revera'),
		'not_found_in_trash' => __('No portfolio items found in Trash','revera'), 
		'parent_item_colon' => ''
	  );
		
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'rewrite' => array( 'slug' => $portfolio_item_slug),
		'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'comments' ),
	); 
	  
	register_post_type( 'portfolio' ,$args);
}	
  
register_taxonomy(
	'portfolio_types',
	array('portfolio'),
	array(
	'hierarchical' => true, 
	'label' =>  __('Portfolio categories','revera'), 
	'singular_label' =>  __('Portfolio category','revera'), 
	'rewrite' => true
	)
);

add_action( 'init', 'revera_post_type_portfolio' );


/* ---------------------------------------------------------------------------
 * Portfolio edit columns
 * --------------------------------------------------------------------------- */
function revera_edit_columns_portfolio($columns)
{
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => __('Title','revera'),
		"portfolio_thumbnail" => __('Thumbnail','revera'),
		"portfolio_types" => __('Categories','revera'),
		"comments" => __('Comments', 'revera'),
		"portfolio_order" =>  __('Order','revera'),
	);
	$columns= array_merge($newcolumns, $columns);	
	
	return $columns;
}
add_filter("manage_edit-portfolio_columns", "revera_edit_columns_portfolio");  


/* ---------------------------------------------------------------------------
 * Portfolio custom columns
 * --------------------------------------------------------------------------- */
function revera_custom_columns_portfolio($column)
{
	global $post;
	switch ($column)
	{
		case "portfolio_thumbnail":
			if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); }
			break;
		case "portfolio_types":
			echo themetor_sanitize(get_the_term_list($post->ID, 'portfolio_types', '', ', ',''));
			break;
		case "portfolio_order":
			echo esc_html($post->menu_order);
			break;		
	}
}
add_action("manage_posts_custom_column",  "revera_custom_columns_portfolio"); 

// Add Filter to admin page //////////////////////////////////////////////////////////////
add_action( 'restrict_manage_posts', 'portfolio_add_taxonomy_filters' ); 

function portfolio_add_taxonomy_filters() {
	global $typenow;
	$taxonomies = array( 'portfolio_types' );

	if ( $typenow == 'portfolio' ) {
		foreach ( $taxonomies as $tax_slug ) {
			$current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
			$tax_obj = get_taxonomy( $tax_slug );
			$tax_name = $tax_obj->labels->name;
			$terms = get_terms($tax_slug);
			if ( count( $terms ) > 0) {
				echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
				echo "<option value=''>$tax_name</option>";
				foreach ( $terms as $term ) {
					echo '<option value=' . $term->slug, $current_tax_slug == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
				}
				echo "</select>";
			}
		}
	}
}




/* ---------------------------------------------------------------------------
 * Create new post type: Headers
 * --------------------------------------------------------------------------- */
function revera_post_type_header() 
{
	$header_item_slug = 'header-item';
	
	$labels = array(
		'name' => __('Headers','revera'),
		'singular_name' => __('Header','revera'),
		'add_new' => __('Add New','revera'),
		'add_new_item' => __('Add New Header','revera'),
		'edit_item' => __('Edit Header','revera'),
		'new_item' => __('New Header','revera'),
		'view_item' => __('View Header','revera'),
		'search_items' => __('Search Headers','revera'),
		'not_found' =>  __('No header found','revera'),
		'not_found_in_trash' => __('No header found in Trash','revera'), 
		'parent_item_colon' => ''
	  );	
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'rewrite' => array( 'slug' => $header_item_slug, 'with_front'=>true ),
		'supports' => array( 'title', 'thumbnail',  'page-attributes' ),
	  ); 
	  
	  register_post_type( 'slide' ,$args);
	  
	  register_taxonomy('header_types','slide',array(
		'hierarchical' => true, 
		'label' =>  __('Header Categories','revera'), 
		'singular_label' =>  __('Header Category','revera'), 
		'rewrite' => true,
		'query_var' => true
	  ));
}
add_action( 'init', 'revera_post_type_header' );


/* ---------------------------------------------------------------------------
 * Header edit columns
 * --------------------------------------------------------------------------- */
function revera_edit_columns_slide($columns)
{

	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"header_thumbnail" => __('Thumbnail','revera'),
		"title" => 'Title',
		"header_types" =>  __('Category','revera'),
		"header_order" => __('Order','revera'),
	);
	$columns= array_merge($newcolumns, $columns);	
	
	return $columns;
}
add_filter("manage_edit-slide_columns", "revera_edit_columns_slide");  


/* ---------------------------------------------------------------------------
 * Header custom columns
 * --------------------------------------------------------------------------- */
function revera_custom_columns_slide($column)
{
	global $post;
	switch ($column)
	{
		case "header_thumbnail":
			if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); }
			break;	
		case "header_order":
			echo esc_html($post->menu_order);
			break;
			
		case "header_types":
			$post_type = get_post_type($post->ID);
			$terms = get_the_terms($post->ID, 'header_types');
			if ( !empty($terms) ) {
				foreach ( $terms as $term )
            $post_terms[] = "<a href='edit.php?post_type=slide&header_types={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, 'header_types', 'edit')) . "</a>";
				echo join( ', ', $post_terms );
			}
			else echo '<i>Not Selected!</i>'; 
			break;	
			
				
	}
}
add_action("manage_posts_custom_column",  "revera_custom_columns_slide"); 


/* ---------------------------------------------------------------------------
 * Create new post type: Clients
 * --------------------------------------------------------------------------- */
/*function revera_post_type_clients() 
{
	$clients_item_slug = 'clients-item';
	
	$labels = array(
		'name' => __('Clients','revera'),
		'singular_name' => __('Client','revera'),
		'add_new' => __('Add New','revera'),
		'add_new_item' => __('Add New Client','revera'),
		'edit_item' => __('Edit Client','revera'),
		'new_item' => __('New Client','revera'),
		'view_item' => __('View Client','revera'),
		'search_items' => __('Search Clients','revera'),
		'not_found' =>  __('No Clients found','revera'),
		'not_found_in_trash' => __('No Clients found in Trash','revera'), 
		'parent_item_colon' => ''
	  );	
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'rewrite' => array( 'slug' => $clients_item_slug, 'with_front'=>true ),
		'supports' => array( 'title', 'thumbnail',  'page-attributes' ),
	  ); 
	  
	  register_post_type( 'clients' ,$args);
	  
	  register_taxonomy(
		'clients_types',
		array('clients'),
		array(
		'hierarchical' => true, 
		'label' =>  __('Clients categories','revera'), 
		'singular_label' =>  __('Clients category','revera'), 
		'rewrite' => true
		)
	);
}
add_action( 'init', 'revera_post_type_clients' );

*/
/* ---------------------------------------------------------------------------
 * Clients edit columns
 * --------------------------------------------------------------------------- */
/*function revera_edit_columns_clients($columns)
{
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"clients_thumbnail" => __('Thumbnail','revera'),
		"title" => 'Title',
		"client_url" => 'URL',
		"clients_types" =>  __('Category','revera'),
		"header_order" => __('Order','revera'),
	);
	$columns= array_merge($newcolumns, $columns);	
	
	return $columns;
}
add_filter("manage_edit-clients_columns", "revera_edit_columns_clients");  
*/

/* ---------------------------------------------------------------------------
 * Clients custom columns
 * --------------------------------------------------------------------------- */
/*function revera_custom_columns_clients($column)
{
	global $post;
	switch ($column)
	{
		case "clients_thumbnail":
			if ( has_post_thumbnail() ) { the_post_thumbnail('client'); }
			break;	
			
		case "clients_order":
			echo esc_html($post->menu_order);
			break;	
			
		case "clients_types":
			echo themetor_sanitize(get_the_term_list($post->ID, 'clients_types', '', ', ',''));
			break;
			
		case "client_url":
			$strUrl = get_post_meta( get_the_ID(), 'revera_client-url', true ) ;
			if ($strUrl){
				echo '<a href="' . $strUrl . '" target="_blank" >'  . $strUrl . '</a>';
				} else {
				echo 'N/A';	
				}
			
			break;
	}
}
add_action("manage_posts_custom_column",  "revera_custom_columns_clients"); 
*/

/* Add Default Clients Categories 
function add_custom_term_clients_clients() {
	if(!term_exists('Clients', 'clients_types')){
		wp_insert_term('Clients', 'clients_types');
	}
}

function add_custom_term_clients_sponsors() {
	if(!term_exists('Sponsors', 'clients_types')){
		wp_insert_term('Sponsors', 'clients_types');
	}
}

function add_custom_term_clients_partners() {
	if(!term_exists('Partners', 'clients_types')){
		wp_insert_term('Partners', 'clients_types');
	}
}

add_action( 'init', 'add_custom_term_clients_clients' );
add_action( 'init', 'add_custom_term_clients_sponsors' );
add_action( 'init', 'add_custom_term_clients_partners' );
*/



/* ---------------------------------------------------------------------------
 * Create new post type: Testimonial
 * --------------------------------------------------------------------------- */
function revera_post_type_testimonial() 
{
	$testimonial_item_slug = 'testimonial-item';
	
	$labels = array(
		'name' => __('Testimonials','revera'),
		'singular_name' => __('Testimonial','revera'),
		'add_new' => __('Add New','revera'),
		'add_new_item' => __('Add New Testimonial','revera'),
		'edit_item' => __('Edit Testimonial','revera'),
		'new_item' => __('New Testimonial','revera'),
		'view_item' => __('View Testimonial','revera'),
		'search_items' => __('Search Testimonials','revera'),
		'not_found' =>  __('No Testimonial found','revera'),
		'not_found_in_trash' => __('No Testimonial found in Trash','revera'), 
		'parent_item_colon' => ''
	  );	
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'rewrite' => array( 'slug' => $testimonial_item_slug, 'with_front'=>true ),
		'supports' => array( 'title', 'thumbnail',  'page-attributes' ),
	  ); 
	  
	  register_post_type( 'testimonial' ,$args);
	  
	  register_taxonomy('testimonial_types','testimonial',array(
		'hierarchical' => true, 
		'label' =>  __('Testimonial types','revera'), 
		'singular_label' =>  __('Testimonial type','revera'), 
		'rewrite' => true,
		'query_var' => true
	  ));
}
add_action( 'init', 'revera_post_type_testimonial' );


function add_custom_term_testimonial_testimonial() {
	if(!term_exists('Testimonial', 'testimonial_types')){
		wp_insert_term('Testimonial', 'testimonial_types');
	}
}

function add_custom_term_testimonial_quote() {
	if(!term_exists('Quote', 'testimonial_types')){
		wp_insert_term('Quote', 'testimonial_types');
	}
}

add_action( 'init', 'add_custom_term_testimonial_testimonial' );
add_action( 'init', 'add_custom_term_testimonial_quote' );


/* ---------------------------------------------------------------------------
 * Testimonial edit columns
 * --------------------------------------------------------------------------- */
function revera_edit_columns_testimonial($columns)
{

	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"testimonial_thumbnail" => __('Thumbnail','revera'),
		"testimonial_name" => 'Author',
		"testimonial_types" =>  __('Category','revera'),
		"testimonial_order" => __('Order','revera'),
	);
	$columns= array_merge($newcolumns, $columns);	
	
	return $columns;
}
add_filter("manage_edit-testimonial_columns", "revera_edit_columns_testimonial");  


/* ---------------------------------------------------------------------------
 * Testimonial custom columns
 * --------------------------------------------------------------------------- */
function revera_custom_columns_testimonial($column)
{
	global $post;
	switch ($column)
	{
		case "testimonial_thumbnail":
			if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); }
			break;	
		case "testimonial_order":
			echo esc_html($post->menu_order);
			break;
			
		case "testimonial_types":
			$post_type = get_post_type($post->ID);
			$terms = get_the_terms($post->ID, 'testimonial_types');
			if ( !empty($terms) ) {
				foreach ( $terms as $term )
            $post_terms[] = "<a href='edit.php?post_type=testimonial&testimonial_types={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, 'testimonial_types', 'edit')) . "</a>";
				echo join( ', ', $post_terms );
			}
			else echo '<i>Not Selected!</i>'; 
			break;	
			
		case "testimonial_name":
			echo themetor_sanitize(get_post_meta( get_the_ID(), 'revera_testimonial_name', true )) ;	
			break;	
				
	}
}
add_action("manage_posts_custom_column",  "revera_custom_columns_testimonial"); 


/* ---------------------------------------------------------------------------
 * Custom Post Types Icon
 * --------------------------------------------------------------------------- */
 add_action( 'admin_head', 'custom_icons' );
 function custom_icons() { ?>
	    <style type="text/css">
			#menu-posts-clients .menu-icon-post div.wp-menu-image:before {content: "\f307";color:#2EA2CC}
			#menu-posts-testimonial .menu-icon-post div.wp-menu-image:before {content: "\f122";color:#2EA2CC}
			#menu-posts-slide .menu-icon-post div.wp-menu-image:before {content: "\f169";color:#2EA2CC}
			#menu-posts-portfolio .menu-icon-post div.wp-menu-image:before {content: "\f322";color:#2EA2CC}
			#adminmenu .wp-has-current-submenu div.wp-menu-image:before {color:#FFFFFF}
			#wp-admin-bar-of_theme_options .ab-item:before{content: "\f107";top:2px}
			.updated.rs-update-notice-wrap,.updated.vc_license-activation-notice{display:none !important}
	    </style>
	<?php } 

?>
