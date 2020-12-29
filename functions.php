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




add_action( 'after_setup_theme', function() {
    add_theme_support( 'responsive-embeds' );
} );


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