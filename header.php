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

        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $www ?>/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $www ?>/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $www ?>/images/favicon-16x16.png">
        <link rel="manifest" href="<?php echo $www ?>/images/site.webmanifest">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" href="<?php echo $www ?>/vendors/bootstrap4/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $www ?>/css/main.css">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113546417-6"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-113546417-6');
        </script>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class('is-loading');?>>
        <header class="site-header">
            <div class="logo">
                <a href="<?php echo site_url();?>" class="logo__symbol">
                    <img src="<?php echo $www; ?>/images/logo.svg">
                </a>
            </div>
            <nav>
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'primary_menu',
                            'menu_id'         => 'main-menu',
                        )
                    );
                ?>
            </nav>
            <div class="burger"><span class="line1"
                    style="background: black; transform: translate(0px, 0px);"></span><span class="line2"
                    style="background: black; transform: translate(0px, 0px);"></span></div>
        </header>



        <div id="hamburger-panel" class="hamburger-panel">
            <div class="menu-container">
                <ul> 

                    <li><a href="<?php echo site_url();?>/about" class="">About</a></li>
                    <li><a href="<?php echo site_url();?>/project" class="">Projects</a></li>
                    <li><a href="<?php echo site_url();?>/contact" class="">Contact</a></li>
                </ul>
            </div>
        </div>



        <div class="js-scroll" data-barba="wrapper">
