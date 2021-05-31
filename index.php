<?php
/**
 * The main template file
 *
 * @package goday
 */

get_header(); 


?>

<main class="post">
    <section>
        <div class="container">
            <div class="row">
                <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) :the_post(); ?>
                <div class="col-md-12">
                    <h3>
                        <?php the_title(); ?>
                    </h3>
                    <?php the_content(); ?>
                </div>
                <?php endwhile; ?>

                <?php else : ?>
                no post
                <?php endif; ?>

            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
