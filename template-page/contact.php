<?php
/**
 * Template Name: Web-Cotact
 * Template Post Type: post, page
 */
$www = get_stylesheet_directory_uri();
get_header(); 
?>

<main class="page-contact" data-barba="container" data-barba-namespace="contact"  id="container">

    <section class="contact-info">
        <div class="container-fluid">
            <div class="row section__title">
                <div class="col-lg-12">
                    <h1 class="mask-text">
                        <span class="serif italic">
                        Contact Us
                        </span>
                    </h1>
                    <div class="horizontal-line" ></div>
                </div>
            </div>
            <div class="row fade-item">
                <div class="col-lg-6">
                    <article>
                        <h6><span>프로젝트 문의</span></h6>

                        <h4 >
                            <span><a class="mail-link "
                                    href="mailto:<?php the_field('fact_email', 'option'); ?>"><?php the_field('fact_email', 'option'); ?></a></span>
                        </h4>
                    </article>
                    <article>
                        <h6><span>전화 상담</span></h6>
                        <h4 >

                            <a
                                href="tel:<?php the_field('fact_tel', 'option'); ?>">tel.<?php the_field('fact_tel', 'option'); ?></a>


                    </article>

                    <article>
                        <h6 ><span>3호선 양재역 4번 출구 50m (주차가능)</span>
                        </h6>
                        <h4 >
                            <span>
                                <a href="http://naver.me/Gw5GUMI1" target="_blank">
                                    <?php the_field('fact_addr', 'option'); ?></a>
                            </span>
                        </h4>
                    </article>
                </div>
                <div class="col-lg-6">
                    <div class="anim">
                        <div class="pendulum fade-item">
                            <div class="piece"></div>
                            <div class="piece"></div>
                            <div class="piece"></div>
                            <div class="piece"></div>
                            <div class="piece"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


</main>

<?php get_footer(); ?>
