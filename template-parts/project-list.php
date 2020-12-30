<h2>Project List</h2>
<?php 
$args = array (
    'post_type'              =>  'project' ,
    'posts_per_page'         => '-1',
    'orderby' => 'menu_order', 
    'order'   => 'ASC',
);
$query = new WP_Query( $args );?>
<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <h4><?php the_title(); ?></h4>
    <?php endwhile; ?>
<?php else : ?>
    no post
<?php endif; ?>