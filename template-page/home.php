<?php
/**
 * Template Name: Web-Home
 * Template Post Type: post, page
 */
$www = get_stylesheet_directory_uri();
get_header(); 
?>
<?php get_template_part( 'template-parts/page-header'); ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php get_template_part( 'template-parts/project-list'); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
