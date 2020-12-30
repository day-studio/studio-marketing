<?php
/**
 * The main template file
 *
 * @package goday
 */

get_header(); 


?>
<?php get_template_part( 'template-parts/page-header'); ?>
<main>
    <section>
        <div class="container">
            <div class="row">
                <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) :the_post(); ?>
                <div class="col-md-12">
                    <h3>
                        <?php the_title(); ?>
                    </h3>
                </div>
                <?php endwhile; ?>
                <div class="col-md-12">
                    <?php 
                        the_posts_pagination(array(
                            'prev_text' =>'Previous',
                            'next_text' =>'Next',
                        ));
                    ?>
                </div>
                <?php else : ?>
                no post
                <?php endif; ?>

            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
