<h2>Estimate</h2>
<?php 
$args = array (
    'post_type'              =>  'estimate' ,
    'posts_per_page'         => '1',
    'orderby' => 'menu_order', 
    'order'   => 'ASC',
);
$query = new WP_Query( $args );?>
<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <h4><?php the_title(); ?></h4>

        <ul>
            <li><?php the_field('estimate_client_name') ?></li>
            <li><?php the_field('estimate_client_company') ?></li>
            <li><?php the_field('estimate_client_contact') ?></li>
        </ul>
        <?php if( have_rows('estimate_spec') ): ?>
            <ul>
            <?php while( have_rows('estimate_spec') ): the_row(); ?>
                <li>
                    <?php the_sub_field('spec_title'); ?>
                    <?php the_sub_field('spec_desc'); ?>
                    <?php the_sub_field('spec_price'); ?>
                </li>
            <?php endwhile; ?>
            </ul>
        <?php endif; ?>

        <p><?php the_field('estimate_memo') ?></p>

    <?php endwhile; ?>
<?php else : ?>
    no post
<?php endif; ?>