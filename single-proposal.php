<?php
get_header(); 

?>
<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) :the_post(); ?>
                        <?php get_template_part( 'template-parts/proposal-single'); ?>
    
                    <?php endwhile; ?>
                    <?php else : ?>
                    no post
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
