<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$www = get_stylesheet_directory_uri();
?>

<div class="hamburger-panel">
        <div class="menu-container">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary_menu',
                ) );
            ?>
        </div>
</div>