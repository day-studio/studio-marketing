<?php
/**
 * Template Name: Web-About
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
                <?php get_template_part( 'template-parts/company-fact'); ?>
                <?php get_template_part( 'template-parts/company-service'); ?>
                <?php get_template_part( 'template-parts/company-client'); ?>
                <?php get_template_part( 'template-parts/company-founder'); ?>
                <?php get_template_part( 'template-parts/company-testimonial'); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
