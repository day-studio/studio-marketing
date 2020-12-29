
<?php
/**
 * @package daybyday
 */
defined( 'ABSPATH' ) || exit;
$www = get_stylesheet_directory_uri();
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="stylesheet" href="<?php echo $www ?>/vendors/bootstrap/css/bootstrap.min.css">
        <script src="<?php echo $www ?>/vendors/jquery/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="<?php echo $www ?>/css/style.css">

        <?php wp_head(); ?>
    </head> 
    <body <?php body_class();?>>
    <header class="site-header light text-dark">
            <div class="header-main no-center">
                <div class="container">
                    <div class="header-left-items header-items has-menu">

                        <div class="site-branding">
                            <a href="<?php echo site_url(); ?>" class="logo">
                               daystudio
                            </a>
                        </div>
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary_menu',
                                'depth'             => 2,
                                'container'         => 'nav',
                                'container_class'   => 'main-navigation',
                                'menu_class'        => 'nav-menu'
                            ) );
                        ?>

                    </div>

                    <div class="header-right-items header-items">
                    </div>
                </div>
            </div>
            <div class="header-mobile custom logo-center">
                <div class="container-fluid">
                    <div class="mobile-menu-hamburger">
                        <button class="mobile-menu-toggle hamburger-menu" data-toggle="off-canvas"
                            data-target="mobile-menu">
                            <span class="hamburger-box">
                                <span class="hamburger-inner">
                                </span>
                            </span>
                        </button>
                    </div>
                    <div class="site-branding">
                        <a href="<?php echo site_url();?>" class="logo">
                            <img src="<?php echo $www; ?>/images/logo.png" >
                        </a>
                    </div>
                    <div class="mobile-header-icons">
                    </div>
                </div>
            </div>
        </header>
        <?php get_template_part( 'template-parts/mobile-menu' ); ?>

        <div class="js-scroll">
            <div data-barba="container">


        