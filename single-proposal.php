<?php
get_header(); 

?>
<main>
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">


                    <h5>표준양식</h5>
                    <?php 
                            $the_query = new WP_Query( array(
                                'post_type' => 'proposal',
                                'tax_query' => array(
                                    array (
                                        'taxonomy' => 'proposal_cat',
                                        'field' => 'slug',
                                        'terms' => 'template',
                                    )
                                ),
                                'meta_key'			=> 'proposal_price',
                                'orderby'			=> 'meta_value_num',
                                'order'				=> 'desc'

                            ) );                
                            ?>
                    <?php if ( $the_query->have_posts() ) : ?>
                    <ul class="nav-proposal">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <?php get_template_part( 'template-parts/nav', 'proposal' ); ?>
                        <?php endwhile; ?>
                    </ul>
                    <?php else : ?>
                    no post
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                    <div class="mb-5"></div>


                    <h5>계약 성공</h5>
                    <?php 
                            $the_query = new WP_Query( array(
                                'post_type' => 'proposal',
                                'tax_query' => array(
                                    array (
                                        'taxonomy' => 'proposal_cat',
                                        'field' => 'slug',
                                        'terms' => 'contract',
                                    )
                                ),
                                'meta_key'			=> 'proposal_price',
                                'orderby'			=> 'meta_value_num',
                                'order'				=> 'desc'

                            ) );                
                            ?>
                    <?php if ( $the_query->have_posts() ) : ?>
                    <ul class="nav-proposal">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php get_template_part( 'template-parts/nav', 'proposal' ); ?>
                        <?php endwhile; ?>
                    </ul>
                    <?php else : ?>
                    no post
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                    <div class="mb-5"></div>
                    <h5>미팅</h5>
                    <?php 
                            $the_query = new WP_Query( array(
                                'post_type' => 'proposal',
                                'tax_query' => array(
                                    array (
                                        'taxonomy' => 'proposal_cat',
                                        'field' => 'slug',
                                        'terms' => 'meeting',
                                    )
                                ),
                                'meta_key'			=> 'proposal_price',
                                'orderby'			=> 'meta_value_num',
                                'order'				=> 'desc'

                            ) );                
                            ?>
                    <?php if ( $the_query->have_posts() ) : ?>
                    <ul class="nav-proposal">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php get_template_part( 'template-parts/nav', 'proposal' ); ?>
                        <?php endwhile; ?>
                    </ul>
                    <?php else : ?>
                    no post
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                    <div class="mb-5"></div>

                    <h5>환불</h5>
                    <?php 
                            $the_query = new WP_Query( array(
                                'post_type' => 'proposal',
                                'tax_query' => array(
                                    array (
                                        'taxonomy' => 'proposal_cat',
                                        'field' => 'slug',
                                        'terms' => 'failure',
                                    )
                                ),
                                'meta_key'			=> 'proposal_price',
                                'orderby'			=> 'meta_value_num',
                                'order'				=> 'desc'

                            ) );                
                            ?>
                    <?php if ( $the_query->have_posts() ) : ?>
                    <ul class="nav-proposal">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php get_template_part( 'template-parts/nav', 'proposal' ); ?>
                        <?php endwhile; ?>
                    </ul>
                    <?php else : ?>
                    no post
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>

                    <div class="mb-5"></div>
                    <h5>반응 없음</h5>
                    <?php 
                            $the_query = new WP_Query( array(
                                'post_type' => 'proposal',
                                'tax_query' => array(
                                    array (
                                        'taxonomy' => 'proposal_cat',
                                        'field' => 'slug',
                                        'terms'    => array( 'meeting', 'contract', 'failure', 'template' ),
                                        'operator' => 'NOT IN',
                                    )
                                ),
                                'meta_key'			=> 'proposal_price',
                                'orderby'			=> 'date',
                                'order'				=> 'desc'
                            ) );                
                            ?>
                    <?php if ( $the_query->have_posts() ) : ?>
                    <ul class="nav-proposal">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php get_template_part( 'template-parts/nav', 'proposal' ); ?>
                        <?php endwhile; ?>
                    </ul>
                    <?php else : ?>
                    no post
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="col-lg-8">
                    <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) :the_post(); ?>
                    <h4><?php the_title(); ?></h4>

                    <?php $the_terms = get_the_term_list( get_the_id(), 'sales_channel', __( "" ) . "", "", "" );?>
                    <p>
                    <span class="btn btn-light"> <?php echo $the_terms; ?>
                    </span>
                   
                    <a href="<?php the_field('project_lead_channel') ?>" target="_blank"><?php the_field('project_lead_channel') ?></a>
                    
                    
                    </p>


                   

                    

                    <ul class="mt-3 border-bottom pb-3">
                        <?php $output = get_field('proposal_price'); ?>
                        <?php if($output): ?>
                            <?php
                                $price = number_format( $output, 0, ',', ',');
                            ?>
                        <li>금액 : <?php echo $price; ?>원</li>
                        <?php endif; ?>
                        <li>기간 : <?php the_field('proposal_period') ?>일</li>
                        <li>고객사 : <?php the_field('proposal_success_client') ?></li>
                    </ul>
                 


                    <?php if(get_field('proposal_success_factor')): ?>
                    <div class="alert alert-primary" role="alert">
                        <?php the_field('propsal_success_factor') ?>
                    </div>
                    <?php endif; ?>
                    <div class="pb-5">
                        <?php the_field('proposal_header') ?>
                    </div>
                    <div class="pb-5">
                        <h6 class="mb-2">[ 프로젝트 개요 ] </h6>
                        <?php the_field('proposal_specification') ?>
                    </div>
                    <div class="pb-5">
                        <h6 class="mb-2">[ 진행 일정 ] </h6>
                        <?php the_field('proposal_schedule') ?>
                    </div>

                    <div class="pb-5">
                        <h6 class="mb-2">[ 주요 수행 실적 ]</h6>
                        <?php the_field('proposal_footer') ?>
                    </div>
                    <div class="pb-5">
                        <h6 class="mb-2">[ 사용 기술과 툴 ]</h6>
                        <?php the_field('proposal_tech') ?>
                    </div>
                    <div class="mt-4">
                        <h6 class="mb-4">[ 관련 프로젝트 ]</h6>
                        <?php 
                            $projects = get_field('proposal_project_selected');
                        ?>
                        <?php if( $projects ): ?>
                        <ul class="list-unstyled">
                            <?php foreach( $projects as $project ): ?>
                            <li class="mb-4">
                                <h6><?php echo get_the_title( $project->ID ); ?></h6>
                                <p class="mb-3"><?php the_field( 'project_url' , $project->ID ); ?></p>

                                <?php the_field( 'project_brief' , $project->ID ); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        </ul>
                    </div>
                    <p><?php the_field('proposal_memo') ?></p>
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
