<?php
/**
Template Name: company introduction
Template Post Type: post, page, presentation
 */

get_header('paper-landscape'); 
?>
<style>
    @page {
        size: A4 landscape
    }
</style>
<main>
    <section class="sheet padding-15mm pt-cover">
        <?php get_template_part( 'template-parts/company-cover'); ?>
    </section>

    <section class="sheet padding-15mm pt-fact">
        <?php get_template_part( 'template-parts/company-fact'); ?>
    </section>

    <section class="sheet padding-15mm pt-service" >
        <?php get_template_part( 'template-parts/company-service'); ?>
    </section>

    <section class="sheet padding-15mm pt-client" >
        <?php get_template_part( 'template-parts/company-client'); ?>
    </section>

    <section class="sheet padding-15mm pt-founder" >
        <?php get_template_part( 'template-parts/company-founder'); ?>
    </section>

    <section class="sheet padding-15mm pt-project-cover" >
        <h1>Works</h1>
    </section>

    <?php 
    $args = array (
            'post_type'              =>  'project' ,
            'posts_per_page'         => '-1',
            'orderby' => 'menu_order', 
            'order'   => 'ASC',
        );
        $query = new WP_Query( $args );
    ?>
    <?php if ( $query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>

            <section class="sheet padding-10mm pt-project-single" >
                <?php get_template_part( 'template-parts/project-single'); ?>
            </section>
            
        <?php endwhile; ?>
    <?php else : ?>
        no post
    <?php endif; ?>
</main>


<?php get_footer('paper'); ?>
