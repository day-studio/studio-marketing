<?php
/**
 *
 * @package daybyday
 */
$post_type = get_post_type_object( get_post_type($post) ); 
$www = get_stylesheet_directory_uri();
global $post; 
$post_data = get_post($post->post_parent);
$menu_wp_name = NULL;
$menu_title = '';

if($post_data->post_name == 'about-us' ){
    $menu_title = 'About Us';
    $menu_wp_name = 'about menu';
}elseif($post_data->post_name == 'services'){
    $menu_title = 'Services';
    $menu_wp_name = 'service menu';
}elseif (is_post_type_archive('product')  OR is_singular('product') ){
    $menu_title = 'Products';
    $menu_wp_name = 'product menu';
}elseif($post_data->post_name == 'support'){
    $menu_title = 'Supports';
    $menu_wp_name = 'support menu';
}else{
    $menu_title = get_the_title();
}
?>

<div class="page-header">
    <?php if($menu_title) :?>
        <div class="page-header-title">
            <div class="container">
                <h1 ><?php echo $menu_title;?></h1>
            </div>
        </div>
    <?php endif; ?>
    <?php if($menu_wp_name) :?>
        <div class="page-header-nav">
                <?php 
                    wp_nav_menu( array(
                        'menu' => $menu_wp_name,
                        'depth'             => 2,
                        'container'         => 'nav',
                        'container_class'   => 'page-header-nav-menu-container',
                        'menu_class'        => 'page-header-nav-menu'
                    ) );            
                ?>			
        
        </div>
    <?php endif; ?>
</div>

