
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
        <script src="<?php echo $www ?>/vendors/jquery/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="<?php echo $www ?>/vendors/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $www ?>/vendors/paper-css/paper.css">
        <link rel="stylesheet" href="<?php echo $www ?>/css/style.css">
        <?php wp_head(); ?>
    </head> 
    <body class="A4 landscape single-presentation" >

        