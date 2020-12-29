<?php
/**
 * @package daybyday
 */

get_header();
?>
    <main >
        <section>
            <div class="container-lg">
                <div class="row">
                <div class="col-lg-12">
                    <?php if ( have_posts() ) : ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        제목
                                    </th>
                                    <th>
                                        날짜
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <tr>
                                    <td>
                                    <a href="<?php the_permalink();?>">
                                        <?php the_title(); ?>     
                                    </a>  
                                    </td>
                                    <td>
                                        <?php echo get_the_date('Y.m.d'); ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                        no post
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>


<?php get_footer(); ?>
