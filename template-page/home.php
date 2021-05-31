<?php
/**
 * Template Name: Web-Home
 * Template Post Type: post, page
 */
$www = get_stylesheet_directory_uri();
get_header(); 
?>
<main data-barba="container" data-barba-namespace="home" id="container" class="home__main">
    <section class="home__banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>
                        <div  class="mask-text job"><span>Design agency<i class="serif italic">for Corporate website</i></span> </div>
                        <!-- <div class="mask-text location"><span><i class="desktop-only">Living</i><i class="serif italic">in Seoul</i></span></div> -->
                    </h1>
                    <div class="banner__line horizontal-line" ></div>
                </div>
            </div>
        </div>
    </section>

    <section class="home__project-list">
        <div class="container-fluid">
            <?php 
                $args = array (
                    'post_type'              =>  'project' ,
                    'posts_per_page'         => '11',
                    'tax_query' => array(
                        array (
                            'taxonomy' => 'project_cat',
                            'field' => 'slug',
                            'terms' => 'featured',
                        )
                    ),
                    'orderby' => 'menu_order', 
                    'order'   => 'ASC',
                );
                $query = new WP_Query( $args );
            ?>

            <?php if ( $query->have_posts() ) : ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <article class="loop fade-item">
                    <div class="row">
                        <div class="col-lg-7 order-lg-2">
                            <div class="loop__image">
                                <figure class="parallax-frame">
                                    <a href="<?php the_field('project_url');?>" target="_blank">
                                        <?php if(get_field('project_background')):?>
                                        <img src="<?php the_field('project_background'); ?>">
                                        <?php else: ?>
                                            <img src="http://via.placeholder.com/800x600/ ">
                                        <?php endif; ?>
                                    </a>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-5 order-lg-1">
                            <div class="loop__desc">
                                <h4><a href="<?php the_field('project_url');?>" target="_blank"><?php the_title(); ?></a></h4>     
                                <h6><a href="<?php the_field('project_url');?>" target="_blank"><?php the_field('project_title_en') ?></a></h6>
                                <p>
                                    <a href="<?php the_field('project_url');?>" target="_blank"><?php the_field('project_brief') ?></a>
                                </p>  
                                <ul>
                                    <li> <span class="key">고객사</span><span class="value"><?php the_field('project_client') ?></span></li>
                                    <li><span class="key">URL </span><a class="value" href="<?php the_field('project_url');?>" target="_blank"><?php the_field('project_url') ?></a></li>
                                </ul> 
                            </div>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php else : ?>
                no post
            <?php endif; ?>
        </div>
    </section>

    <section class="contact-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <article>
                        <h6><span>프로젝트 문의</span></h6>

                        <h4>
                            <span><a class="mail-link " href="mailto:<?php the_field('fact_email', 'option'); ?>"><?php the_field('fact_email', 'option'); ?></a></span>
                        </h4>
                    </article>
                    <article>
                        <h6><span>전화 상담</span></h6>
                        <h4>
                            <a href="tel:<?php the_field('fact_tel', 'option'); ?>">tel.<?php the_field('fact_tel', 'option'); ?></a>
                        </h4>
                    </article>

                    <article>
                        <h6><span>3호선 양재역 4번 출구 50m (주차가능)</span>
                        </h6>
                        <h4>
                            <span >
                                <a href="http://naver.me/Gw5GUMI1" target="_blank"> <?php the_field('fact_addr', 'option'); ?></a>
                            </span>
                        </h4>
                    </article>
                </div>
            </div>
        </div>
    </section>
</main>





       


<?php get_footer(); ?>
