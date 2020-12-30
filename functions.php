<?php 
/**
 * daybyday functions and definitions
 * *
 * @package daybyday
*/

defined( 'ABSPATH' ) || exit;

$theme_includes = array(
    '/setup.php',
);

foreach($theme_includes as $file){
    require_once get_template_directory() . '/inc' .$file;
}


add_image_size( 'screen_square', 1600, 1600, array('center', 'top') );
add_image_size( 'screen_scroll', 800, 1600, array('center', 'top') );

add_filter( 'big_image_size_threshold', '__return_false' );
add_filter('jpeg_quality', function($arg){return 100;});


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