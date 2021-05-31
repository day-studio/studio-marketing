<?php
$www = get_stylesheet_directory_uri();
get_header();
?>
    <main data-barba="container"  data-barba-namespace="archive-project"  id="container">
        <section class="project-list">
            <div class="container-fluid">
                    <div class="row section__title">
                        <div class="col-lg-12">
                            <h1>
                                <div class="mask-text">
                                    <span class="serif italic">
                                        Our Projects
                                    </span>
                                </div>

                            </h1>
                            <div class="horizontal-line" ></div>
                        </div>
                    </div>

                    <?php 
                    $args = array (
                        'post_type'              =>  'project' ,
                        'posts_per_page'         => '-1',
                        'orderby' => 'menu_order', 
                        'order'   => 'ASC',
                    );
                    $query = new WP_Query( $args );?>
                    <?php if ( $query->have_posts() ) : ?>
                        <div class="row">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        
                            
                            <div class="col-lg-4">
                                <div class="loop fade-item">
                                <a href="<?php the_field('project_url') ?>" target="_blank">
                                        <figure class="loop__image">
                                            <?php if(get_field('project_background')):?>
                                                <img src="<?php the_field('project_background'); ?>">
                                            <?php else: ?>
                                                <img src="http://via.placeholder.com/800x800/ ">
                                            <?php endif; ?>
                                        </figure>
                                        <div class="loop__desc">
                                            <h5><?php the_title(); ?></h5>    
                                            <ul >
                                                <li> <span class="key">고객사</span><?php the_field('project_client') ?></li>
                                                <li><span class="key">URL</span><?php the_field('project_url') ?></li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>

                                

                            </div>
                      
                        <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                            no post
                    <?php endif; ?>
                
            </div>
        </section>

    


    </main>


<?php get_footer(); ?>
