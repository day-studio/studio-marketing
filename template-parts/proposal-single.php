<h2>Proposal</h2>
<?php 
$args = array (
    'post_type'              =>  'proposal' ,
    'posts_per_page'         => '1',
    'orderby' => 'menu_order', 
    'order'   => 'ASC',
);
$query = new WP_Query( $args );?>
<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

        <h4><?php the_title(); ?></h4>
        <ul>
            <li><?php the_field('project_lead_channel') ?></li>
            <li><?php the_field('proposal_price') ?></li>
            <li><?php the_field('proposal_period') ?></li>
            <li><?php the_field('proposal_header') ?></li>
            <li><?php the_field('proposal_specification') ?></li>
            <li><?php the_field('proposal_schedule') ?></li>
            <li><?php the_field('proposal_tech') ?></li>
            <li><?php the_field('proposal_footer') ?></li>
        </ul>
        <h4>관련 프로젝트</h4>
        <?php 

            $projects = get_field('proposal_project_selected');

            ?>
            <?php if( $projects ): ?>
                <ul>
                <?php foreach( $projects as $project ): ?>
                    <li>
                    
                        <?php echo get_the_title( $project->ID ); ?>
                        <?php the_field( 'project_brief' , $project->ID ); ?>
                    
                    </li>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        </ul>

        <p><?php the_field('proposal_memo') ?></p>


     <?php endwhile; ?>
<?php else : ?>
    no post
<?php endif; ?>