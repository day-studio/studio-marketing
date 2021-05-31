<?php 
/**
 * daybyday functions and definitions
 * *
 * @package daybyday
*/

defined( 'ABSPATH' ) || exit;

$theme_includes = array(
    '/setup.php',
	'/class-wp-bootstrap-navwalker.php',
);

foreach($theme_includes as $file){
    require_once get_template_directory() . '/inc' .$file;
}

add_theme_support( 'title-tag' );  
// add_image_size( 'screen_square', 1600, 1600, array('center', 'top') );
// add_image_size( 'screen_scroll', 800, 1600, array('center', 'top') );

// add_filter( 'big_image_size_threshold', '__return_false' );
// add_filter('jpeg_quality', function($arg){return 100;});


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> '일반 정보',
		'menu_title'	=> '일반 정보',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Additional Option',
		'parent_slug'	=> 'theme-general-settings',
	));
}



add_action( 'after_setup_theme', function() {
    add_theme_support( 'responsive-embeds' );
} );



// Add backend styles for Gutenberg.
add_action( 'enqueue_block_editor_assets', 'photographus_add_gutenberg_assets' );


// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

	global $wp_version;
	// if ( $wp_version !== '4.7.1' ) {
	//    return $data;
	// }
  
	$filetype = wp_check_filetype( $filename, $mimes );
  
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
	echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
		  </style>';
  }
  add_action( 'admin_head', 'fix_svg' );
/**
 * Load Gutenberg stylesheet.
 */
function photographus_add_gutenberg_assets() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'photographus-gutenberg', get_theme_file_uri( '/css/gutenberg-editor-style.css' ), false );
}


// add_action('parse_query', 'pmg_ex_sort_posts');

// function pmg_ex_sort_posts($q)
// {
//     if(!$q->is_main_query() || is_admin())
//         return;
    
//     if(
//         !is_post_type_archive('magazine')  && 
//         !is_tax(array('faq_category', 'faq')) 
//     ) return;

//     $q->set('orderby', 'menu_order');
//     $q->set('order', 'ASC');
// }


// function force_type_private($post)
// {
//     if ($post['post_type'] == 'estimate')
//     	$post['post_status'] = 'private';
// 	return $post;
	
//     if ($post['post_type'] == 'proposal')
//     	$post['post_status'] = 'private';
// 	return $post;

// }
// add_filter('wp_insert_post_data', 'force_type_private');

// function force_type_private($post){
//     if ($post['post_type'] == 'estimate' || $post['post_type'] == 'proposal' )
//    		$post['post_status'] = 'private';
//     return $post;
// }
// add_filter('wp_insert_post_data', 'force_type_private');

// function force_type_private($post){
//     if ($post['post_type'] == 'estimate' || $post['post_type'] == 'proposal' )
//    		$post['post_status'] = 'private';
//     return $post;
// }
// add_filter('wp_insert_post_data', 'force_type_private');


// add_action("pre_get_posts", "custom_front_page");
// function custom_front_page($wp_query){
//     //Ensure this filter isn't applied to the admin area
//     if(is_admin()) {
//         return;
//     }

//     if($wp_query->get('page_id') == get_option('page_on_front')):

//         $wp_query->set('post_type', 'project');
//         $wp_query->set('page_id', ''); //

//         $wp_query->is_page = 0;
//         $wp_query->is_singular = 0;
//         $wp_query->is_post_type_archive = 1;
//         $wp_query->is_archive = 1;

//     endif;

// }