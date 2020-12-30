<?php
/**
Template Name: data
Template Post Type: post, page, presentation
 */

get_header(); 
?>

<main>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php get_template_part( 'template-parts/company-fact'); ?>
                <?php get_template_part( 'template-parts/company-service'); ?>
                <?php get_template_part( 'template-parts/company-client'); ?>
                <?php get_template_part( 'template-parts/company-testimonial'); ?>
                <?php get_template_part( 'template-parts/company-founder'); ?>


                
                <?php get_template_part( 'template-parts/project-list'); ?>
                <?php get_template_part( 'template-parts/project-single'); ?>


                <?php get_template_part( 'template-parts/proposal-single'); ?>
                <?php get_template_part( 'template-parts/estimate-single'); ?>
            </div>
        </div>
    </div>
</main>


<?php get_footer(); ?>
